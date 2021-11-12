<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Fosterlist;
use App\Models\Adoptlist;

class HomeController extends Controller
{
    //TEAM 2

    //首頁
    public function index() {
        $account = session('account');
        return view("home.index", compact("account"));
    }




    //登入頁
    public function login() {
        return view("home.login");
    }

    //註冊
    public function register() {
        return view("home.register");
    }

    //送養資訊
    public function fosterinformation() {
        return view("home.fosterinformation");
    }

    //領養資訊
    public function adoptinformation() {
        return view("home.adoptinformation");
    }




    //TEAM 1

    // 宣導頁首頁
    public function educate() {
        return view("home.educate");
    }
    
    // 宣導頁現有問題1
    public function educatenp1() {
        return view("home.educatenp1");
    }

    // 宣導頁現有問題2
    public function educatenp2() {
        return view("home.educatenp2");
    }

    // 宣導頁現有問題3
    public function educatenp3() {
        return view("home.educatenp3");
    }

    // 宣導頁現有問題4
    public function educatenp4() {
        return view("home.educatenp4");
    }

    // 宣導頁幫助浪浪
    public function educatehowtohelp() {
        return view("home.educatehowtohelp");
    }

    // 宣導頁領養途徑
    public function educateadoptaway() {
        return view("home.educateadoptaway");
    }

    // 宣導頁飼養問題
    public function educatehowtopet() {
        return view("home.educatehowtopet");
    }

    // 宣導頁貓1
    public function educatecat1() {
        return view("home.educatecat1");
    }

    // 宣導頁貓2
    public function educatecat2() {
        return view("home.educatecat2");
    }

    // 宣導頁貓3
    public function educatecat3() {
        return view("home.educatecat3");
    }

    // 宣導頁狗1
    public function educatedog1() {
        return view("home.educatedog1");
    }

    // 宣導頁狗2
    public function educatedog2() {
        return view("home.educatedog2");
    }

    // 宣導頁狗3
    public function educatedog3() {
        return view("home.educatedog3");
    }

    

    

    //TEAM 3

    //我要送養須知
    public function wantfoster() {
        return view("home.wantfosterinformation");
    }
}
