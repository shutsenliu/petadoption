<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendChkmaMail;
use App\Mail\sendForgetpwdMail;

class MailController extends Controller
{
    public function sendMail(Request $req) {

        $details = [
            'title' => $req->input("feedbackSubject"),
            'body' => $req->input("feedbackContent"),
            'from' => $req->input("feedbackName")

        ];

        Mail::to("petadopttestmail@gmail.com")->send(new SendMail($details));
        return redirect("/home/index");
    }

    // 寄送註冊驗證碼
    // 寄送OK 前端須加上顯示err
    public function sendChkMail(Request $req){
        // $content ="";
        $account =  $req->input("email");

        $memberData =  Member::where('email', $account)->first();
        // 找這個要註冊的email帳號存不存在
        if($memberData){
            return view('auth/login', ['err'=>"帳號已存在，請直接登入"]);
        }else{
    
            //寄送驗證碼
            $random=6;
            $checkma ="";
            //設定for迴圈的執行次數，等於是產生幾位驗證碼
            for ($i=1;$i<=$random;$i=$i+1)
            {                     
                $x=rand(1,3);
                //用三種亂數去設定資料格式是大寫/小寫/數字，為隨機產生
                if($x==1){
                    $y=rand(97,122);$z=chr($y);
                }
                //在$x==1的情況下，設定$y亂數隨機在97-122之間取值、$a==2則$y取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$z。$x==3設定亂數取值為0-9之間的數字，儲存在$z。
                if($x==2){
                    $y=rand(65,90);$z=chr($y);
                }
                if($x==3){
                    $z=rand(0,9);
                }

                global $checkma;
                $checkma = $checkma.$z;
            }
        }
        global $checkma;
        // $content = $checkma;
        Mail::to($account)->send(new sendChkmaMail($checkma));
        
        // 把註冊信箱、驗證碼寫入session
        session()->put('checkma', $checkma);
        session()->put('registeremail', $account);
        
        $registeremailacc = $req->input("email");
        return view("/auth/register",compact('registeremailacc'));
    }

    // 寄送忘記密碼驗證碼
    // 寄送OK 前端須加上顯示err
    public function sendForgetpwdMail(Request $req){
        $account =  $req->input("email");
      
        $memberData =  Member::where('email', $account)->first();
        
        if(!$memberData){
            
            return view('/auth/registersendemail', ['err'=>"帳號尚未註冊，請先註冊"]);
            
        }else{
            $checkma ="";
            $usename = $memberData->name;
            $random=6;
            //設定for迴圈的執行次數，等於是產生幾位驗證碼
            for ($i=1;$i<=$random;$i=$i+1)
            {                     
                $x=rand(1,3);
                //用三種亂數去設定資料格式是大寫/小寫/數字，為隨機產生
            if($x==1){
                $y=rand(97,122);$z=chr($y);
            }
            //在$x==1的情況下，設定$y亂數隨機在97-122之間取值、$a==2則$y取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$z。$x==3設定亂數取值為0-9之間的數字，儲存在$z。
            if($x==2){
                $y=rand(65,90);$z=chr($y);
            }
            if($x==3){
                $z=rand(0,9);
            }

            global $checkma;
            $checkma = $checkma.$z;
            }

            $content =[
                'usename' => $usename,
                'chkma' => $checkma,
            ];

            session()->put('forgetpwdemail', $account);
            session()->put('checkma', $checkma);
            Mail::to($account)->send(new sendForgetpwdMail($content));
            return view("auth.forgetpwd", compact("account"));
        }
        
    }
}
