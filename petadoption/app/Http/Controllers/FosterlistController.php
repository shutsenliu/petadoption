<?php

namespace App\Http\Controllers;

use App\Models\Adoptlist;
use App\Models\fosterlist;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\each;

class FosterlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userpk = session('userpk');

        $fosterList = Fosterlist::where('status', "送養中")->get();
        //抓出會員領養過的清單
        $adoptList = Adoptlist::where('member_fk', $userpk)->get();
        // return dd($adoptList);

        //json圖檔
        foreach($fosterList as $foster){
            $data = json_decode($foster->pic, true);
            $foster->pic = $data;
        };

        //篩選
        $cityvalue = "";
        $typevalue = "";
        $varietyvalue = "";
        $gendervalue = "";
        return view('home.wantadopt', compact('fosterList', 'adoptList', 'cityvalue','typevalue','varietyvalue','gendervalue', 'userpk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("home.wantfoster");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $foster = new fosterlist();
        $foster->pet_type = $request->Type;
        $foster->pet_name = $request->NickName;
        $foster->pet_variety = $request->Variety;
        $foster->pet_age = $request->Age;
        $foster->pet_gender = $request->Male;
        $foster->pet_bodytype = $request->Body;
        $foster->pet_ligation = $request->Ligation;
        $foster->pet_city = $request->City;

        //判斷登入使用者的pk
        $account = session("account");
        $memberData =  Member::where('email', $account)->first();

        $foster->member_fk = $memberData->pk;
        $foster->publish_date = date("Y-m-d");
        $foster->status = "審核中(刊登)";

        //$foster->pic = $request->uploadImg;
        $foster->introduction = $request->Note;
        // 檔案上傳
        $files = $request->file('imageFile');

        // 將上傳的檔案命名，並移到public/images
        // 將新的檔名依序存到陣列
        foreach ($files as $file) {

            $name = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            $imgData[] = $name;
        }

        //將圖片欄位存入json格式的檔名
        $foster->pic = json_encode($imgData);
        $foster->save();



        return redirect("/index/fosterinformation");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fosterlist  $fosterlist
     * @return \Illuminate\Http\Response
     */
    public function show(fosterlist $fosterlist)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fosterlist  $fosterlist
     * @return \Illuminate\Http\Response
     */
    public function edit(fosterlist $fosterlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fosterlist  $fosterlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fosterlist $fosterlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fosterlist  $fosterlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(fosterlist $fosterlist)
    {
        //
    }
}
