@extends('layout.adminmaster')

@section('head')

    <style>
        .lock_icon {
            position: relative;
            display: inline-block;
        }

        i {
            position: absolute;
            left: 10px;
            top: calc(35% - 0.5em);
            color: #ac7047b2;
        }

        .lock_icon input {
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

        /* 各斷點 */
        @media (max-width: 800px) {
            .btn-sm {
                font-size: .400rem !important;
            }

            .ts {
                font-size: .200rem !important;
            }

            .arr {
                font-size: .200rem !important;
                height: 35px;
            }

            .tbs {
                font-size: .200rem !important;
            }

            .nav-link2 {
                font-size: .800rem !important;
            }

            nav ul {
                font-size: 0.7rem !important;
            }
        }


    </style>
@endsection

@section('nav')
    <div class="row gx-0" id="navbar1">
        <div class="mx-auto px-4 ms-1 justify-content-end">

            <div class="d-flex me-4">

                <div class="col-sm-8 py-1">
                    <a href="/admin/logout"><button type="button" class="btn_k btn-k1 btn-sm"
                            name="db_logout">登出</button></a>
                </div>
                <div class="col-sm-12 py-1">
                    <a href="/admin/memberlist"><button type="submit" class="btn_k btn-k4 btn-sm"
                            name="db_change_pwd">返回後台</button></a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')

    <div class="container py-5 px-lg-3">

        <!-- 修改密碼 -->
        <div class="mx-auto row mb-5 mt-2">
            <div class="mx-auto row gx-0 col-lg-4 justify-content-center">

                <div class="card text-center"
                    style="border-color: #f5eadf; border-width: 2px;border-radius: 1rem; width: 20rem">
                    <div class="card-header pt-4" style="border-bottom: 0px; background-color: #ffffff00;">
                        <img src="/admin/img/db_login_1.png" height="40px">
                    </div>
                    <div class="card-body py-3">
                        <p class="card-title h5 text-color-1" style="font-weight: 600; font-size: 25px;">修改管理者密碼</p>
                        <div class="container py-3">
                            <form class="mx-3 row g-3" name="change_pwd" action="/admin/changepwd/{{ $userpk }}"
                                method="post">
                                @csrf
                                <!-- 鎖頭icon -->
                                <div class="gx-0" style="text-align: center;">
                                    <label class="lock_icon">
                                        <i class="fas fa-lock"></i>
                                        <div class="form-group mb-3">
                                            <input type="password" class="form-control" name="new1_pwd"
                                                style="border-color: #d0a98a; width: 15rem;" placeholder="輸入新密碼"
                                                required="required" id="db_old_pwd">
                                        </div>
                                    </label>
                                </div>
                                <div class="gx-0" style="text-align: center;">
                                    <label class="lock_icon">
                                        <i class="fas fa-lock"></i>
                                        <div class="form-group mb-3">
                                            <input type="password" class="form-control" name="new2_pwd"
                                                style="border-color: #d0a98a; width: 15rem;" placeholder="重複新密碼"
                                                required="required" id="db_new_pwd">
                                        </div>
                                    </label>
                                </div>
                                <input type="submit" class="btn_k btn-k1" name="cpassword" value="確認修改"
                                    onclick="return changepassword()">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection
