<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthpageController extends Controller
{
    //需登入才可觀看的頁面
    //送養資訊
    public function fosterinformation() {
        return view("home.fosterinformation");
    }

    //領養資訊
    public function adoptinformation() {
        return view("home.adoptinformation");
    }

    //個人資訊
    public function memberpersonal() {
        return view("home.memberpersonal");
    }
    
    //顯示忘記密碼頁
    public function showresetpwd() {
        return view("home.resetpwd");
    }
    
    //忘記密碼
    public function resetpwd() {
        // return view("home.resetpwd");
    }

    //前台送養資訊個別明細(未送出)
    public function petdetail() {
        return view("home.petdetail");
    }

    //前台想領養XXX(動物暱稱)的清單
    public function wantpetlist() {
        return view("home.wantpetlist");
    }

    //前台申請領養明細
    public function petapply() {
        return view("home.petapply");
    }

    //前台送養資訊管理-個別明細(已送出)
    public function applysent() {
        return view("home.applysent");
    }

}
