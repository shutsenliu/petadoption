<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Adoptlist;
use App\Models\Fosterlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

//需登入才可觀看的頁面
class AuthpageController extends Controller
{


    //顯示個人資訊
    // 顯示OK
    public function showmemberpersonal()
    {
        $account = session('account');
        $member = member::where('email', $account)->first();

        //抓出資料庫內的會員資料
        $gender = $member->gender;

        if ($gender == "F") {
            $gender = "生理女";
        } else {
            $gender = "生理男";
        }

        // 去找該會員有送養且已送出的動物資料計算天數
        $memberfosterlist = Fosterlist::where('member_fk', session('userpk'))->where('status', '已送養')->get();
        
        // 計算送養天數
        foreach ($memberfosterlist as $item) {
            $adoptdate = Carbon::parse($item->adopt_date)->toDateTimeString();
            $adopthowlong = intval((Carbon::today()->diffInDays($adoptdate, true)));

            if (($adopthowlong >= 30 && $adopthowlong <= 45) or ($adopthowlong >= 60 && $adopthowlong <= 75)) {
                $item->remark = " $item->pet_name 已送養滿 $adopthowlong 天";
            }
        }
        return view("home.memberpersonal", compact('gender', 'member', 'memberfosterlist'));
    }

    //更新個人資訊
    // 更新OK 前端需再把job跟city預設進去
    public function memberpersonal(Request $req)
    {
        $account = session('account');
        $member = member::where('email', $account)->first();

        //更新會員資料
        $member->name = $req->input('name');
        $member->job = $req->input('job');
        $member->city = $req->input('city');
        $member->save();

        // 重新抓一次會員資料傳給更新的個人資訊
        $member = member::where('email', $account)->first();
        $gender = $member->gender;

        if ($gender == "F") {
            $gender = "生理女";
        } else {
            $gender = "生理男";
        }

        // 去找該會員有送養且已送出的動物資料計算天數
        $memberfosterlist = Fosterlist::where('member_fk', session('userpk'))->where('status', '已送養')->get();

        // 計算送養天數
        foreach ($memberfosterlist as $item) {
            $adoptdate = Carbon::parse($item->adopt_date)->toDateTimeString();
            $adopthowlong = intval((Carbon::today()->diffInDays($adoptdate, true)));

            if (($adopthowlong >= 30 && $adopthowlong <= 45) or ($adopthowlong >= 60 && $adopthowlong <= 75)) {
                $item->remark = " $item->pet_name 已送養滿 $adopthowlong 天，請記得追蹤領養人哦";
            }
        }

        return view("home.memberpersonal", compact('gender', 'member', 'memberfosterlist'));
    }

    //顯示重設密碼頁
    public function showresetpwd()
    {

        $account = session('account');
        return view("home.resetpwd", compact("account"));
    }

    //重設密碼
    // 重設OK
    public function resetpwd(Request $req)
    {
        $account = session('account');

        $member = member::where('email', $account)->first();

        $oldpwd = $req->input("pwd"); //輸入的原密碼
        $newpwd = Hash::make($req->input("newPwd")); //輸入的新密碼

        // return dd($account,$oldpwd,$newpwd,$member->pwd);
        if (password_verify($oldpwd, $member->pwd)) {
            $member->pwd = $newpwd;
            $member->save();

            // 抓資訊回傳給個人資訊頁
            $member = member::where('email', $account)->first();
            $gender = $member->gender;

            // 去找該會員有送養且已送出的動物資料計算天數
            $memberfosterlist = Fosterlist::where('member_fk', session('userpk'))->where('status', '已送養')->get();

            // 計算送養天數
            foreach ($memberfosterlist as $item) {
                $adoptdate = Carbon::parse($item->adopt_date)->toDateTimeString();
                $adopthowlong = intval((Carbon::today()->diffInDays($adoptdate, true)));

                if (($adopthowlong >= 30 && $adopthowlong <= 45) or ($adopthowlong >= 60 && $adopthowlong <= 75)) {
                    $item->remark = " $item->pet_name 已送養滿 $adopthowlong 天，請記得追蹤領養人哦";
                }
            }

            return view("home.memberpersonal", compact('gender', 'member', 'memberfosterlist'));
        } else {
            return view('home.resetpwd', ['err' => "密碼錯誤"]);
        }
    }

    //領養資訊
    // 資料OK前端整合OK
    public function adoptinformation()
    {
        $usepk = session('userpk');

        // 列出送養表單fk和送養日期欄位，條件為領養表單中欲領養會員fk=$usepk
        $Adoptlist = Adoptlist::select('fosterlist_fk', 'application_date')->where('member_fk', $usepk)->get();

        return view("home.adoptinformation", compact('Adoptlist'));
    }

    //送養資訊
    //資料OK 要跟前端整合
    public function fosterinformation()
    {
        $usepk = session('userpk');
        $Fosterlist = Fosterlist::where("member_fk", $usepk)->orderby('pk', 'desc')->get();

        // return dd($Fosterlist);
        // $Fosterlist = Fosterlist::where('pk',$usepk)->first();

        foreach ($Fosterlist as $item) {

            $status = $item->status;
            if ($status == "送養中") {
                $item->remark = "編輯";
            } else if ($status == "已送養") {
                $item->remark = "查看";
            } else if ($status == "審核中(刊登)" || $status == "審核中(更新)" || $status == "審核中(送出)") {
                $item->remark = "不可編輯";
            }
        }

        return view("home.fosterinformation", compact('Fosterlist'));
    }

    // 處理查看/編輯明細、已送出或未送出頁面分流
    public function fosterinformationdetail(Request $req)
    {

        $ppk = $req->input("ppk");
        $Fosterlist = Fosterlist::where('pk', $ppk)->first();
        $status = $Fosterlist->status;

        // 先確認狀態是送養中還是已送養
        if ($status == "送養中") {

            //抓到傳進來的寵物Pk，去送養清單中抓他的送養資訊
            $data = json_decode($Fosterlist->pic, true);
            $Fosterlist->pic = $data;

            // 導到未送出可編輯的明細頁面
            return view("home.petdetail", compact('Fosterlist'));
        } else if ($status == "已送養") {

            //已送養

            // 計算送出多久
            $adoptdate = Carbon::parse($Fosterlist->adopt_date)->toDateTimeString();
            $adopthowlong = intval((Carbon::today()->diffInDays($adoptdate, true)));

            // 抓照片
            $data = json_decode($Fosterlist->pic, true);
            $Fosterlist->pic = $data;

            // 導到已送出明細頁面
            return view("home.applysent", compact('Fosterlist', 'adopthowlong'));
        }
    }

    //更新前台送養資訊個別明細(未送出)
    public function updatepetdetail(Request $req)
    {

        // 抓傳進來的寵物PK
        $ppk = $req->input("ppk");
        $Fosterlist = Fosterlist::where('pk', $ppk)->first();

        // 如果狀態改成已送養導到填送養資料頁面
        $fosterstatus = $req->input("status");
        // return dd($fosterstatus);

        if ($fosterstatus == "已送養") {
            return view("home.adoptdetail", compact('ppk', 'Fosterlist'));
        } else {
            // 如果狀態仍為送養中，進後台審核，狀態改為審核中(更新)
            // 把更新的資料更新進資料庫
            $Fosterlist->pet_type = $req->input("fosterpet_type");
            $Fosterlist->pet_name = $req->input("fosterNickName");
            $Fosterlist->pet_variety = $req->input("fosterVariety");
            $Fosterlist->pet_age = $req->input("fosterAge");
            $Fosterlist->pet_gender = $req->input("fostergender");
            $Fosterlist->pet_bodytype = $req->input("fosterBody");
            $Fosterlist->pet_ligation = $req->input("fosterLigation");
            $Fosterlist->pet_city = $req->input("fosterCity");
            $Fosterlist->introduction = $req->input("fosterNote");
            $Fosterlist->status = "審核中(更新)";
            

            // 檔案上傳
            $files = $req->file('uploadImg');

            // 判斷有沒有上傳新的圖片
            if (!$files) {
                $Fosterlist->save();
            } else {

                //先抓到資料庫裡原有圖片的陣列
                $imgdata = json_decode($Fosterlist->pic);

                //將新的檔名依序存到陣列
                foreach ($files as $key => $file) {

                    $name = time() . '.' . $file->getClientOriginalName();
                    $file->move(public_path() . '/images/', $name);
                    //將新的檔名取代舊的
                    $imgdata[$key] = $name;
                }

                //將陣列轉json再存回資料庫中
                $Fosterlist->pic = json_encode($imgdata);
                $Fosterlist->save();
            }

            return redirect("/index/fosterinformation");
            
        }

        // $Fosterlist = Fosterlist::where('pk',$ppk)->first();
        // return dd($Fosterlist);

        //去送養清單中抓更新的送養資訊
        // $Fosterlist = Fosterlist::where('pk', $ppk)->first();

        // // 解析照片
        // $data = json_decode($Fosterlist->pic, true);
        // $Fosterlist->pic = $data;
    }

    // 顯示新增送出寵物領養明細頁
    // public function showadoptdetail(){
    //     $ppk = session('ppk');
    //     // $Fosterlist = Fosterlist::where('pk',$ppk)->first();
    //     // return view("home.adoptdetail",compact('Fosterlist'));
    //     return dd($ppk);
    // }

    // 新增送出寵物領養明細
    public function adoptdetail(Request $req)
    {

        $ppk = $req->input('ppk');

        $Fosterlist = Fosterlist::where('pk', $ppk)->first();
        // return dd($ppk);
        $Fosterlist->adopt_date = $req->input("adopt_date");
        $Fosterlist->adopt_name = $req->input("adopt_name");
        $Fosterlist->adopt_phone = $req->input("adopt_phone");
        $Fosterlist->adopt_city = $req->input("adopt_city");
        $Fosterlist->status = "審核中(送出)";
        $Fosterlist->save();

        // session()->forget('ppk');

        // 回到送養資訊頁
        return redirect("/index/fosterinformation");
        // $usepk = session('userpk');
        // $Fosterlist = Fosterlist::where("member_fk", $usepk)->orderby('pk','desc')->get();

        // foreach( $Fosterlist as $item){

        //     $status = $item-> status;
        //     if($status == "送養中"){
        //         $item-> remark = "編輯";
        //     }else if($status == "已送養"){
        //         $item-> remark = "查看";
        //     }else if($status == "審核中"){
        //         $item-> remark = "不可編輯";
        //     }
        // }

        // return view("home.fosterinformation",compact('Fosterlist'));
    }

    //前台想領養XXX(動物暱稱)的清單
    public function wantpetlist(Request $req)
    {

        // 撈寵物資料
        $ppk = $req->input("ppk");
        $Fosterlist = Fosterlist::where('pk', $ppk)->first();

        // 撈想領養該寵物的會員pk
        $Adoptlist = Adoptlist::where('fosterlist_fk', $ppk)->where('status', "已通過")->get();

        foreach ($Adoptlist as $item) {

            $member = Member::where('pk', $item->member_fk)->first();
            $memberbirth = Carbon::parse($member->birth)->toDateTimeString();

            // 年齡計算
            $memberage = intval((Carbon::today()->diffInDays($memberbirth, true)) / 365);
            $item->remark = $memberage;
        }
        return view("home.wantpetlist", compact('Fosterlist', 'Adoptlist'));
        // return dd($memberage);
    }

    //前台申請領養明細
    // 資料OK 待前端顯示
    public function petapply(Request $req)
    {

        // $fpk = "3";
        $apk = $req->input("apk");
        $Adoptlist = Adoptlist::where('pk', $apk)->first();

        // $member = Member::where('pk',$Adoptlist->member_fk)->first();
        // 年齡計算
        $memberbirth = Carbon::parse($Adoptlist->member['birth'])->toDateTimeString();
        $memberage = intval((Carbon::today()->diffInDays($memberbirth, true)) / 365);

        $Adoptlist->member['birth'] = $memberage;

        return view("home.petapply", compact('Adoptlist'));
    }
}
