<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Adminlist;
use App\Models\Adoptlist;
use App\Models\Fosterlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{


    //後台登入畫面
    public function showLoginPage()
    {
        if (session('username')) {
            return redirect("/admin/memberlist");
        }
        return view("admin.login");
    }

    //後台登入請求
    public function login(Request $request)
    {

        //記錄使用者輸入的帳號密碼
        $username = $request->input("UserName");
        $password = $request->input("PassWord");

        $userData =  Adminlist::where('username', $username)->first();

        // return dd($password, $userData->password);

        //收到請求時先從資料庫查詢這個 UserName 有沒有資料，如果沒有就回傳錯誤訊息
        if (!$userData) {

            return view('admin.login', ['err' => "帳號不存在!"]);

            //判斷密碼是否正確，正確就寫入Session
        } elseif (password_verify($password, $userData->password)) {
            //             使用者輸入的密碼,資料庫中加密過後的密碼

            session()->put('username', $userData->username);
            session()->put('userpk', $userData->pk);
            return redirect('/admin/memberlist');

            //不正確就回傳錯誤訊息
        } else {

            return view('admin.login', ['err' => "密碼輸入錯誤!"], compact("username"));
        }
    }

    //清除 Session
    public function logout()
    {
        session()->forget('username');
        return redirect('/admin/login');
    }

    //後台修改密碼頁面
    public function showchangepwd()
    {

        $userpk = session('userpk');

        return view("admin.showchangepwd", compact('userpk'));
    }

    //後台修改密碼請求
    public function changepwd(Request $req, $id)
    {

        $admin = Adminlist::find($id);
        $secretpwd = Hash::make($req->input("new2_pwd"));
        $admin->password = $secretpwd;
        $admin->save();

        session()->forget('username');
        session()->forget('userpk');
        return redirect("/admin/login");
    }



    //後台會員清單
    public function memberlist()
    {
        $memberList = Member::orderBy('pk')->paginate(5);
        $searchwords = "";
        $statusvalue = "";
        return view("admin.memberlist", compact('memberList', 'searchwords', 'statusvalue'), ['key' => "search"]);
    }

    //搜尋會員清單
    public function membersearch(Request $request)
    {
        $searchwords = $request->input("search");
        $statusvalue = $request->input("status");
        $memberList = Member::where('status', 'like', "%{$statusvalue}%")
            ->Where('pk', 'like', "%{$searchwords}%")
            ->get();

        //  return dd($results);
        return view('admin.memberlist', compact('memberList', 'searchwords', 'statusvalue'));
    }

    //編輯會員資料
    public function memberupdate(Request $request)
    {

        $member = Member::find($request->input("pk"));

        $member->gender = $request->input("gender");
        $member->job = $request->input("job");
        $member->name = $request->input("name");
        $member->birth = $request->input("birth");
        $member->city = $request->input("city");
        $member->remark = $request->input("remark");
        $member->status = $request->input("status");

        $member->save();

        // return dd($member);

        return redirect("/admin/memberlist");
    }

    //刪除會員資料
    public function memberdelete(Request $request)
    {
        $memberList = Member::orderBy('pk')->get();
        $member = Member::find($request->input("pk"));

        $searchwords = $request->input("search");
        $statusvalue = $request->input("status");

        //確認此會員是否有刊登送養or申請領養
        $membercheckfos = Fosterlist::where('member_fk', $request->input("pk"))->first();
        $membercheckado = Adoptlist::where('member_fk', $request->input("pk"))->first();

        if (!$membercheckfos && !$membercheckado) {
            //如果此會員沒刊登，就可以刪除
            $member->delete();
            return redirect("/admin/memberlist");
        } else {
            //如果此會員有刊登資料，則提醒要先刪除所有刊登&申請資料
            return view("admin.memberlist", compact('memberList', 'searchwords', 'statusvalue'), ['err' => "無法刪除會員編號： " . $request->input("pk") . " 的會員資料，請先刪除此會員的所有送養刊登&領養申請!"]);
        }
    }

    //後台送養清單頁
    public function fosterlist()
    {
        $fosterList = Fosterlist::orderBy('pk')->paginate(5);
        $searchwords = "";
        $statusvalue = "";

        //將json圖檔解析並放到$fosterList中
        foreach ($fosterList as $item) {
            $data = json_decode($item->pic, true);
            $item->pic = $data;
        }

        return view("admin.fosterlist", compact('fosterList', 'searchwords', 'statusvalue'), ['key' => "search"]);
    }

    //搜尋送養清單
    public function fostersearch(Request $request)
    {
        //有重新return view("admin.fosterlist")的都要加上
        $statusvalue = $request->input("status");
        $searchwords = $request->input("search");

        $fosterList = Fosterlist::where('status', 'like', "%{$statusvalue}%")->where('pk', 'like', "%{$searchwords}%")->get();

        //有重新return view("admin.fosterlist")的都要重新解析json
        foreach ($fosterList as $item) {
            $data = json_decode($item->pic, true);
            $item->pic = $data;
        }

        //  return dd($status,$searchwords);

        return view('admin.fosterlist', compact('fosterList', 'searchwords', 'statusvalue'));
    }

    //編輯送養清單
    public function fosterlistupdate(Request $request)
    {

        $foster = Fosterlist::find($request->input("pk"));

        $foster->pet_type = $request->input("pet_type");
        $foster->pet_name = $request->input("pet_name");
        $foster->pet_variety = $request->input("pet_variety");
        $foster->pet_age = $request->input("pet_age");
        $foster->pet_gender = $request->input("pet_gender");

        $foster->pet_bodytype = $request->input("pet_bodytype");

        $foster->pet_ligation = $request->input("pet_ligation");
        $foster->pet_city = $request->input("pet_city");
        $foster->status = $request->input("status");

        $foster->adopt_date = $request->input("adopt_date");
        $foster->adopt_name = $request->input("adopt_name");
        $foster->adopt_phone = $request->input("adopt_phone");
        $foster->adopt_city = $request->input("adopt_city");
        $foster->introduction = $request->input("introduction");
        $foster->remark = $request->input("remark");

        $foster->save();

        // return dd($foster);

        return redirect("/admin/fosterlist");
    }

    //刪除送養清單
    public function fosterlistdelete(Request $request)
    {
        $foster = Fosterlist::find($request->input("pk"));

        //確認是否有人申請這筆訂單的領養(領養清單裡是否有送養清單的pk)
        $adopt = Adoptlist::where('fosterlist_fk', $request->input("pk"))->first();

        // return dd($adoptList);

        if (!$adopt) {
            //如果沒人申請，就可以刪除
            $foster->delete();
            return redirect("/admin/fosterlist");

        } else {
            //如果有人想領養這筆，不能刪除
            $fosterList = Fosterlist::orderBy('pk')->get();

            //有重新return view("admin.fosterlist")的都要加上
            $searchwords = "";
            $statusvalue = "";

            //有重新return view("admin.fosterlist")的都要重新解析json
            foreach ($fosterList as $item) {
                $data = json_decode($item->pic, true);
                $item->pic = $data;
            }

            return view("admin.fosterlist", ['err' => "無法刪除編號 " . $request->input("pk") . " 的送養訂單，請先刪除此送養清單的所有領養申請!"], compact("fosterList", 'searchwords', 'statusvalue'));
        }
    }


    //後台領養清單頁
    public function adoptlist()
    {
        $searchwords = "";
        $statusvalue = "";
        $adoptList = Adoptlist::orderBy('pk')->paginate(5);
        return view("admin.adoptlist", compact('adoptList', 'searchwords', 'statusvalue'), ['key' => "search"]);
    }

    //搜尋領養清單
    public function adoptsearch(Request $request)
    {

        $statusvalue = $request->input("status");
        $searchwords = $request->input("search");

        $adoptList = Adoptlist::where('status', 'like', "%{$statusvalue}%")->where('pk', 'like', "%{$searchwords}%")->get();

        //  return dd($status,$searchwords);

        return view('admin.adoptlist', compact('adoptList', 'searchwords', 'statusvalue'));
    }

    //編輯領養清單
    public function adoptlistupdate(Request $request)
    {
        $adopt = Adoptlist::find($request->input("pk"));

        $adopt->status = $request->input("status");
        $adopt->phone = $request->input("phone");
        $adopt->reason = $request->input("reason");
        $adopt->remark = $request->input("remark");

        $adopt->save();

        // return dd($adopt);

        return redirect("/admin/adoptlist");
    }

    //刪除領養清單
    public function adoptlistdelete(Request $request)
    {
        $adopt = Adoptlist::find($request->input("pk"));
        $adopt->delete();
        return redirect("/admin/adoptlist");
    }
}
