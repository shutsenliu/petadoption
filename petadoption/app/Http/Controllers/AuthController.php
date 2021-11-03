<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //顯示登入頁
    public function showlogin() {
        return view("auth.login");
    }

    //登入頁
    public function login() {
        // return view("home.login");
    }

    //顯示註冊頁
    public function showregister() {
        return view("auth.register");
    }

    //註冊頁
    public function register() {
        // return view("home.login");
    }

    //顯示忘記密碼頁
    public function showforgetpwd() {
        return view("auth.forgetpwd");
    }

    //忘記密碼
    public function forgetpwd() {
        // return view("home.forgetpwd");
    }
    
}
