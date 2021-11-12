<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Adoptlist;
use App\Models\Fosterlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysqli;

class AuthController extends Controller
{
    //顯示登入頁
    public function showlogin() {
        if(session('account')) {
            return redirect("/index/memberpersonal");
        }
        return view("/auth/login");
    }

    //登入頁
    // 登入OK 前端須加上顯示err
    public function login(Request $req) {
        //取得會員輸入的帳號密碼
        $account = $req->input("email");
        $password = $req->input("pwd");
         
        $memberData =  Member::where('email', $account)->first();

        // return dd($password, $memberData->pwd);

        //先去資料庫找這個信箱有沒有註冊過，如沒有就要回傳錯誤訊息
        if(!$memberData){

            return view('auth.login', ['err'=>"帳號尚未註冊，請先註冊"]);

        //確認帳號狀態，是否遭停用 
        }else if($memberData->status == "停用"){
            
            return view('auth.login', ['err'=>"此帳號已停用，請聯絡我們"]);
            
            //檢查密碼是否正確，正確就登入並寫入Session
        }elseif(password_verify($password, $memberData->pwd)){
            //             使用者輸入的密碼,資料庫中加密過後的密碼
            
            session()->put('account', $memberData->email);
            session()->put('userpk', $memberData->pk);

            return redirect('/index/memberpersonal');//寫入seesion並導到會員資訊頁

        }else{//密碼錯誤就回傳錯誤訊息

            return view('auth/login', ['err'=>"密碼輸入錯誤!"], compact("account"));

        }
    }

    //顯示註冊信箱頁
    public function showregistersendemail() {
        return view("auth/registersendemail");
    }

    //顯示註冊頁
    public function showregister() {
        return view("auth/register");
    }

    //註冊頁
    // 註冊OK 前端須加上顯示err
    public function register(Request $req) {
        // $memberList = Member::all();
        // return view("/index/register", compact('memberList'));
        if(!session('registeremail')){//先檢查有沒有session資料
            return redirect('/index/registersendemail');
        }else{
            $check = $req->input('registerCheck');
        
            $checkma = session('checkma');
            // $account = session('registeremail');

            // return dd($check,$checkma);

            if($check==$checkma){

                //新增資料進資料表
                $newmember = new Member();
                $newmember->email = $req->input('email');
                $newmember->pwd =  Hash::make($req->input('pwd'));
                $newmember->name = $req->input('nickname');
                $newmember->gender = $req->input('gender');
                $newmember->birth = $req->input('birth');
                $newmember->job = $req->input('job');
                $newmember->city = $req->input('city');
                $newmember->status = "啟用";
                $newmember->save();

                session()->forget('checkma');//清除session資料
                session()->forget('registeremail');//清除session資料

                return redirect("/index/login");

            }else{
                $registeremailacc = $req->input('email');
                return view("auth.register", compact("registeremailacc"), ['err'=>"驗證碼輸入錯誤!"]);
            }
        }
    }

    //顯示忘記密碼填信箱頁
    public function forgetpwdsendmail() {
        return view("auth/forgetpwdsendemail");
    }

    //顯示忘記密碼頁
    public function showforgetpwd() {
        return view("auth/forgetpwd");
    }

    //忘記密碼
    // 重設忘記密碼OK 前端須加上顯示err
    public function forgetpwd(Request $req) {
        if(!session('forgetpwdemail')){//先檢查有沒有session資料
            return redirect('/index/forgetpwdsendemail');
        }else{
            $newpwd = Hash::make($req->input("newPwd"));
            $chkma = $req->input("forgetCheck");
            //取得使用者輸入的信箱
            $account = session('forgetpwdemail');
            $checkma = session('checkma');

            $member = member::where('email', $account)->first();

            // return dd($checkma,$chkma,$newpwd,$member -> pwd);

            // 檢查驗證碼與輸入的驗證碼是否一致
            if($chkma == $checkma){
                    $member -> pwd = $newpwd;
                    $member -> save();

                    session()->forget('checkma');//清除session資料
                    session()->forget('registeremail');//清除session資料
                    return redirect('/index/login');
            }else{
                return view('auth.forgetpwd', ['err'=>"驗證碼錯誤"]);
            }
        }        
    }

    public function logout() {
        // session()->forget('account');//清除session資料
        // session()->forget('userpk');
        session()->flush();//清除所有session資料
        return redirect('/home/index');
    }
    
}
