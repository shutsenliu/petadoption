@extends('layout.adminmaster')

@section('head')
    <title>送養平台_後台系統_修改管理者密碼</title>

    <style>
        .login_icon {
            position: relative;
            display: inline-block;
        }

        i {
            position: absolute;
            left: 10px;
            top: calc(35% - 0.5em);
            color: #ac7047b2;
        }

        .login_icon input {
            text-indent: 20px;
        }

        textarea:focus,
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="time"]:focus,
        input[type="week"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="search"]:focus,
        input[type="tel"]:focus,
        input[type="color"]:focus,
        .uneditable-input:focus {
            border-color: #d0a98a;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.075) inset, 0 0 10px #d0a98a;
            outline: 0 none;
        }

    </style>
@endsection

@section('nav')

@endsection

@section('content')

    <div class="container py-5 px-lg-3">

        <!-- 管理者登入面板 -->
        <div class="mx-auto row mb-5 mt-2">
            <div class="mx-auto row gx-0 col-lg-4 justify-content-center">

                <div class="card text-center"
                    style="border-color: #f5eadf; border-width: 2px;border-radius: 1rem; width: 20rem">
                    <div class="card-header pt-4" style="border-bottom: 0px; background-color: #ffffff00;">
                        <img src="/admin/img/db_login_1.png" height="40px">
                    </div>
                    <div class="card-body py-3">
                        <p class="card-title h5 text-color-1" style="font-weight: 600; font-size: 25px;">管理者登入</p>
                        <div class="container py-3">
                            <form action="/admin/login" method="post" class="mx-3 row g-3" name="db_login1">
                                <!-- 登入icon -->
                                <div class="gx-0" style="text-align: center;">
                                    <label class="login_icon">
                                        <i class="fas fa-user"></i>
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" name="UserName"
                                                style="border-color: #d0a98a; width: 15rem;" placeholder="帳號"
                                                required="required" id="db_acc1"
                                                value="{{ isset($username) ? $username : '' }}">
                                        </div>
                                    </label>
                                </div>
                                <!-- 鎖頭icon -->
                                <div class="gx-0" style="text-align: center;">
                                    <label class="login_icon">
                                        <i class="fas fa-lock"></i>
                                        <div class="form-group mb-3">
                                            <input type="password" class="form-control" name="PassWord"
                                                style="border-color: #d0a98a; width: 15rem;" placeholder="密碼"
                                                required="required" id="db_pwd1">
                                        </div>
                                    </label>
                                </div>
                                <input type="submit" class="btn_k btn-k1" name="db_login_btn" value="登入">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="www mx-auto" style="text-align: center; font-size: medium;">
            @if (@isset($err))
                <a class="fas fa-exclamation-circle" style="display: inline-block; color: #e6a565;">&nbsp</a>
                {{ $err }}
            @endif
        </div>

    </div>



@endsection
