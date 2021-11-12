<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//TEAM 2

//前台首頁
Route::get('/home/index', "App\Http\Controllers\HomeController@index");

//聯絡我們
Route::post("/send-email", "App\Http\Controllers\MailController@sendMail");



//TEAM 1

//前台登入頁
Route::get('/index/login', "App\Http\Controllers\AuthController@showlogin");

//前台登入頁
Route::post('/index/login', "App\Http\Controllers\AuthController@login");

//前台登出頁
Route::get('/index/logout', "App\Http\Controllers\AuthController@logout");

//前台註冊信箱頁
Route::get('/index/registersendemail', "App\Http\Controllers\AuthController@showregistersendemail");

//前台註冊發送驗證碼
Route::post("/send-chkmaemail", "App\Http\Controllers\MailController@sendChkMail");

//前台註冊頁
Route::get('/index/register', "App\Http\Controllers\AuthController@showregister");

//前台註冊頁
Route::post('/index/register', "App\Http\Controllers\AuthController@register");

//前台忘記密碼頁
Route::get('/index/forgetpwd', "App\Http\Controllers\AuthController@showforgetpwd");

//前台忘記密碼頁
Route::post('/index/forgetpwd', "App\Http\Controllers\AuthController@forgetpwd");

//前台忘記密碼填信箱送驗證碼頁
Route::get("/index/forgetpwdsendemail", "App\Http\Controllers\AuthController@forgetpwdsendmail");

//前台忘記密碼頁送驗證碼
Route::post("/send-forgetpwdemail", "App\Http\Controllers\MailController@sendForgetpwdMail");

//前台會員個人資訊頁
Route::get('/index/memberpersonal', "App\Http\Controllers\AuthpageController@showmemberpersonal")->middleware('memberAuth');

//前台會員個人資訊頁更新
Route::post('/index/memberpersonal', "App\Http\Controllers\AuthpageController@memberpersonal");

//前台重設密碼頁
Route::get('/index/resetpwd', "App\Http\Controllers\AuthpageController@showresetpwd")->middleware('memberAuth');

//前台重設密碼頁
Route::post('/index/resetpwd', "App\Http\Controllers\AuthpageController@resetpwd");

//前台送養資訊頁
Route::get('/index/fosterinformation', "App\Http\Controllers\AuthpageController@fosterinformation")->middleware('memberAuth');

// 接收查看/編輯的pk
Route::post('/index/fosterinformation', "App\Http\Controllers\AuthpageController@fosterinformationdetail")->middleware('memberAuth');

//前台領養資訊頁 
Route::get('/index/adoptinformation', "App\Http\Controllers\AuthpageController@adoptinformation")->middleware('memberAuth');

// 抓pk給顯示想領養XXX領養清單
Route::post('/viewwantpetlist', "App\Http\Controllers\AuthpageController@wantpetlist")->middleware('memberAuth');

//更新前台送養資訊個別明細(未送出)
Route::post('/index/petdetail', "App\Http\Controllers\AuthpageController@updatepetdetail");

// 顯示前台送養資訊個別明細(未送出)
Route::get('/index/petdetail', "App\Http\Controllers\AuthpageController@fosterinformationdetail");

// // 顯示前台領養資訊明細
// Route::get('/index/adoptdetail', "App\Http\Controllers\AuthpageController@showadoptdetail")->middleware('memberAuth');

// 前台領養資訊明細
Route::post('/index/adoptdetail', "App\Http\Controllers\AuthpageController@adoptdetail")->middleware('memberAuth');

//前台想領養XXX(動物暱稱)的清單
Route::get('/index/wantpetlist', "App\Http\Controllers\AuthpageController@wantpetlist")->middleware('memberAuth');

Route::post('/index/wantpetlist', "App\Http\Controllers\AuthpageController@petapply")->middleware('memberAuth');

//前台申請領養明細
Route::get('/index/petapply', "App\Http\Controllers\AuthpageController@petapply")->middleware('memberAuth');


// 宣導頁首頁
Route::get('/index/educate', "App\Http\Controllers\HomeController@educate");

//宣導頁幫助浪浪
Route::get('/index/educatehowtohelp', "App\Http\Controllers\HomeController@educatehowtohelp");

//宣導頁現有問題1
Route::get('/index/educatenp1', "App\Http\Controllers\HomeController@educatenp1");

//宣導頁現有問題2
Route::get('/index/educatenp2', "App\Http\Controllers\HomeController@educatenp2");

//宣導頁現有問題3
Route::get('/index/educatenp3', "App\Http\Controllers\HomeController@educatenp3");

//宣導頁現有問題4
Route::get('/index/educatenp4', "App\Http\Controllers\HomeController@educatenp4");

//宣導頁領養途徑
Route::get('/index/educateadoptaway', "App\Http\Controllers\HomeController@educateadoptaway");

//宣導頁飼養問題
Route::get('/index/educatehowtopet', "App\Http\Controllers\HomeController@educatehowtopet");

//宣導頁貓1
Route::get('/index/educatecat1', "App\Http\Controllers\HomeController@educatecat1");

//宣導頁貓2
Route::get('/index/educatecat2', "App\Http\Controllers\HomeController@educatecat2");

//宣導頁貓3
Route::get('/index/educatecat3', "App\Http\Controllers\HomeController@educatecat3");

//宣導頁狗1
Route::get('/index/educatedog1', "App\Http\Controllers\HomeController@educatedog1");

//宣導頁狗2
Route::get('/index/educatedog2', "App\Http\Controllers\HomeController@educatedog2");

//宣導頁狗3
Route::get('/index/educatedog3', "App\Http\Controllers\HomeController@educatedog3");









//TEAM 3

//我要領養頁
Route::get('/fosterlist', "App\Http\Controllers\FosterlistController@index");

//篩選
Route::post('/fosterlist', "App\Http\Controllers\WantadoptformController@search");

//我要領養-填寫資料
Route::get('/wantadoptform/{a}', "App\Http\Controllers\WantadoptformController@index")->middleware('memberAuth');

//我要領養store
Route::post('/wantadoptform/{a}', "App\Http\Controllers\WantadoptformController@store");


//刊登須知
Route::get('/notice', "App\Http\Controllers\HomeController@wantfoster")->middleware('memberAuth');

//我要送養頁
Route::get('/fosterlist/create', "App\Http\Controllers\FosterlistController@create")->middleware('memberAuth');
Route::post('/fosterlist/create', "App\Http\Controllers\FosterlistController@store")->middleware('memberAuth');












//TEAM 2

//後台會員清單
Route::get('/admin/memberlist', "App\Http\Controllers\AdminController@memberlist")->middleware('userAuth');

//搜尋會員清單
Route::post('/admin/memberlist', "App\Http\Controllers\AdminController@membersearch")->middleware('userAuth');

//編輯會員資料
Route::post('/admin/memberlist/update', "App\Http\Controllers\AdminController@memberupdate")->middleware('userAuth');

//刪除會員資料
Route::post('/admin/memberlist/delete', "App\Http\Controllers\AdminController@memberdelete")->middleware('userAuth');



//後台送養清單
Route::get('/admin/fosterlist', "App\Http\Controllers\AdminController@fosterlist")->middleware('userAuth');

//搜尋送養清單
Route::post('/admin/fosterlist', "App\Http\Controllers\AdminController@fostersearch")->middleware('userAuth');

//編輯送養清單
Route::post('/admin/fosterlist/update', "App\Http\Controllers\AdminController@fosterlistupdate")->middleware('userAuth');

//刪除送養清單
Route::post('/admin/fosterlist/delete', "App\Http\Controllers\AdminController@fosterlistdelete")->middleware('userAuth');




//後台領養清單
Route::get('/admin/adoptlist', "App\Http\Controllers\AdminController@adoptlist")->middleware('userAuth');

//搜尋送養清單
Route::post('/admin/adoptlist', "App\Http\Controllers\AdminController@adoptsearch")->middleware('userAuth');

//編輯領養清單
Route::post('/admin/adoptlist/update', "App\Http\Controllers\AdminController@adoptlistupdate")->middleware('userAuth');

//編輯領養清單
Route::post('/admin/adoptlist/delete', "App\Http\Controllers\AdminController@adoptlistdelete")->middleware('userAuth');




//後台修改密碼頁面
Route::get('/admin/changepwd', 'App\Http\Controllers\AdminController@showchangepwd')->middleware('userAuth');

//後台修改密碼頁面
Route::post('/admin/changepwd/{id}', 'App\Http\Controllers\AdminController@changepwd')->middleware('userAuth');



//後台登入請求
Route::post('/admin/login', 'App\Http\Controllers\AdminController@login');

//後台登入頁
Route::get('/admin/login', 'App\Http\Controllers\AdminController@showLoginPage');

//後台登出
Route::get('/admin/logout', 'App\Http\Controllers\AdminController@logout');


