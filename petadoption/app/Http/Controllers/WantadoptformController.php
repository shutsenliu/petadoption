<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Adminlist;
use App\Models\Adoptlist;
use App\Models\Fosterlist;
use Illuminate\Http\Request;

class WantadoptformController extends Controller
{
    public function index(Request $request, $a) {
        //假設會員已領養過此寵物，取出$adopt->fosterlist_fk
        $repeatfosterpk = $request->repeatfosterpk;

        $fosterList = fosterlist::find($a);
        $data = json_decode($fosterList->pic, true);
        $fosterList->pic = $data;
        $userpk = session('userpk');
        $member = Member::find($userpk);
        // return dd($repeatfosterpk);
        return view("home.wantadoptform",compact('fosterList'),compact('member', 'repeatfosterpk'));
    }

    public function store(Request $request) {
        $adopt = new Adoptlist();
        $userpk = session('userpk');
        $adopt -> fosterlist_fk = $request -> fosterpk;
        $adopt -> member_fk = $userpk;
        $adopt -> application_date = date("Y-m-d");
        $adopt -> phone = $request -> Tel;
        $adopt -> reason = $request -> Reason;
        $adopt -> status = "審核中";

        $adopt->save();
        
        return redirect("/index/adoptinformation");
    }
    public function search(Request $request){

        $userpk = session('userpk');
        //抓出會員領養過的清單
        $adoptList = Adoptlist::where('member_fk', $userpk)->get();

        $cityvalue = $request->input("City");
        $typevalue = $request->input("Type");
        $varietyvalue = $request->input("Variety");
        $gendervalue = $request->input("Male");
        $fosterList = Fosterlist::where('pet_city', 'like', "%{$cityvalue}%")
        ->where('pet_type', 'like', "%{$typevalue}%")
        ->where('pet_variety', 'like', "%{$varietyvalue}%")
        ->where('pet_gender', 'like', "%{$gendervalue}%")
        ->where('status', "送養中")
        ->get();

        //json圖檔
        foreach($fosterList as $foster){
            $data = json_decode($foster->pic, true);
            $foster->pic = $data;
        };
        return view('home.wantadopt', compact('fosterList', 'cityvalue','typevalue','varietyvalue','gendervalue', 'userpk', 'adoptList'));
    }
}
