@extends('layout.adminmaster')

@section('head')
    <style>
        textarea:focus,
        select:focus,
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
            border-color: #d0a98a !important;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.075) inset, 0 0 10px #d0a98a !important;
            outline: 0 none !important;
        }

        .form-select:focus {
            border-color: #d0a98a !important;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.075) inset, 0 0 10px #d0a98a !important;
            outline: 0 none !important;
        }

        .form-select-sm:focus {
            border-color: #d0a98a !important;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.075) inset, 0 0 10px #d0a98a !important;
            outline: 0 none !important;
        }


        .form-control:focus {
            border-color: #d0a98a !important;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.075) inset, 0 0 10px #d0a98a !important;
            outline: 0 none !important;
        }


        /* 分頁設定 */

        nav ul {
            list-style: none !important;
            padding: 0.08rem 0.3rem !important;
            font-size: 0.9rem !important;
        }

        nav a {
            color: #854c0b !important;
            text-decoration: none !important;
            background-color: #fff !important;
            border: 0px solid #dee2e6 !important;
        }

        nav a:hover {
            color: #c98860 !important;
            background-color: #ffffff00 !important;
            border-color: #dee2e600 !important;
        }

        .page-link:focus {
            color: #c98860 !important;
            background-color: #e9ecef00 !important;
            outline: 0 !important;
            box-shadow: 0 0 0 0 !important;

        }

        .page-item.active .page-link {
            color: #fff !important;
            background-color: #e6a565 !important;
            border-radius: 50% 50% 50% 50% !important;
            border-color: #e6a565 !important;
        }

        .page-item.disabled .page-link {
            color: #c7c1bcfa !important;
            pointer-events: none !important;
            background-color: #fff !important;
            border-color: #dee2e600 !important;
        }

        /* 狀態下拉選單 */
        @media (max-width: 500px) {
            .woo {
                flex-direction: column-reverse !important;
                align-items: flex-end !important;

            }
        }

        /* 各斷點 */
        @media (max-width: 800px) {
            .btn-sm {
                font-size: .400rem !important;
            }

            .btn_k {
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

        /* 改radio顏色 */
        .form-check-input:focus {
            border-color: #c9ac98 !important;
            outline: 0 !important;
            box-shadow: 0 0 0 0.25rem #ac70473b !important;
        }

        .form-check-input:checked {
            background-color: #cf8756 !important;
            border-color: #cf8756 !important;
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
                    <a href="/admin/changepwd"><button type="submit" class="btn_k btn-k4 btn-sm"
                            name="db_change_pwd">修改密碼</button></a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')

    <header>

        <div class="container pt-5 pb-3 px-lg-3">

            <div class="mx-auto row">
                <div class="row gx-0 justify-content-start">

                    <!-- 導覽頁籤-->
                    <ul class="nav nav-tabs1 nav-justified">
                        <li class="nav-item">
                            <a class="nav-link2 active" aria-current="page" href="/admin/memberlist">會員清單</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link2" href="/admin/fosterlist">送養清單</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link2" href="/admin/adoptlist">申請領養清單</a>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="mx-auto row pt-5">

                <div class="www mx-auto pb-1" style="text-align: center; font-size: medium;">

                    @if (@isset($err))
                        <a class="fas fa-exclamation-circle" style="display: inline-block; color: #e6a565;">&nbsp</a>
                        {{ $err }}
                    @endif
                </div>

                <!-- 狀態下拉選單+搜尋框 -->
                <div class="container">
                    <form action="" method="post" class="row mx-auto justify-content-end pb-4">
                        @csrf
                        <div class="col-lg-3">

                            <!-- 狀態下拉選單 -->
                            <div class="input-group ms-4">
                                <select class="arr" name="status" aria-label="Example select with button addon">
                                    <option value="" selected>全部</option>
                                    <option value="啟用" {{ $statusvalue == '啟用' ? 'selected' : '' }}>啟用</option>
                                    <option value="停用" {{ $statusvalue == '停用' ? 'selected' : '' }}>停用</option>
                                </select>

                                <!-- 搜尋框 -->
                                <input type="search" name="search" class="form-control form-control-sm ts"
                                    style="border-color: #d0a98a; font-size: small;" placeholder="請輸入會員編號..."
                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                    value="{{ $searchwords }}">
                                <button class="btn_k btn-k5" type="submit" id="button-addon2"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- 會員清單表格 -->
                <table class="table table-hover table-bordered table-sm vertical-align: middle tbs"
                    style="text-align: center; vertical-align: middle; color: #ac6f47; border-color: #d0aa8ab7; font-size: small;">

                    <thead style="height: 50px; text-align: center; vertical-align: middle; background-color: #f5eadf42;">

                        <tr>
                            <th scope="col">會員編號</th>
                            <th scope="col">暱稱</th>
                            <th scope="col">E-mail帳號</th>
                            <th scope="col">狀態</th>
                            <th scope="col" colspan="2">操作</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- 表格資料 -->
                        @foreach ($memberList as $item)

                            <tr>
                                <th scope="row">{{ $item->pk }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <!-- 啟用/停用 -->
                                    {{ $item->status }}
                                </td>
                                <td>
                                    <!--  編輯鈕 導向modal -->
                                    <button type="button" class="btn_k btn-k1 btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#member_edit{{ $item->pk }}">
                                        編輯
                                    </button>
                                </td>
                                <td>
                                    <!--  刪除鈕 導向modal -->
                                    <button type="button" class="btn_k btn-k4 btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#member_delete{{ $item->pk }}">
                                        刪除
                                    </button>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

        <!-- modal相關 -->

        @foreach ($memberList as $item)
            <!-- Modal #member_edit1-->
            <div class="modal fade" id="member_edit{{ $item->pk }}" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header"
                            style="background-color: #f5eadf; color: #854c0b; justify-content: center;">
                            <span class="h5 modal-title" id="staticBackdropLabel" style=" font-weight: 700;">編輯會員清單</span>
                        </div>
                        <div class="modal-body">
                            <!-- 表單 -->
                            <div class="container py-3">
                                <form class="mx-auto row g-2" action="/admin/memberlist/update" method="post">
                                    @csrf
                                    <!-- 分欄 -->
                                    <div class="row">

                                        <div class="col-lg-6">

                                            <!-- 會員編號 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pk" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">會員編號：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="pk" value="{{ $item->pk }}"
                                                            class="form-control"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 會員mail -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="email" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">E-mail：</label>
                                                    <div class="col-lg-8">
                                                        <input type="email" name="email" value="{{ $item->email }}"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 密碼 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pwd" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">密碼：</label>
                                                    <div class="col-lg-8">
                                                        <input type="password" name="pwd" value="{{ $item->pwd }}"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 性別 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="gender" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">性別：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="gender"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="M"
                                                                {{ $item->gender == 'M' ? 'selected' : '' }}>男
                                                            </option>
                                                            <option value="F"
                                                                {{ $item->gender == 'F' ? 'selected' : '' }}>女
                                                            </option>>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 職業 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="job" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">職業：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="job"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="學生" {{ $item->job == '學生' ? 'selected' : '' }}>學生</option>
                                                            <option value="上班族"  {{ $item->job == '上班族' ? 'selected' : '' }}>上班族</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="col-lg-1"></div>

                                            <!-- 暱稱 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="name" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">暱稱：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="name" value="{{ $item->name }}"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; ">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 生日 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="birth" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">生日：</label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="birth" value="{{ $item->birth }}"
                                                            min="1900-01-01" max="2020-01-01" class="form-control"
                                                            style="border-color: #d0a98a; font-size: small;">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 所在地 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="city" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">所在地：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="city"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="台北市"
                                                                {{ $item->city == '台北市' ? 'selected' : '' }}>台北市
                                                            </option>
                                                            <option value="新北市"
                                                                {{ $item->city == '新北市' ? 'selected' : '' }}>新北市
                                                            </option>
                                                            <option value="桃園市"
                                                                {{ $item->city == '桃園市' ? 'selected' : '' }}>桃園市
                                                            </option>
                                                            <option value="台中市"
                                                                {{ $item->city == '台中市' ? 'selected' : '' }}>台中市
                                                            </option>
                                                            <option value="台南市"
                                                                {{ $item->city == '台南市' ? 'selected' : '' }}>台南市
                                                            </option>
                                                            <option value="高雄市"
                                                                {{ $item->city == '高雄市' ? 'selected' : '' }}>高雄市
                                                            </option>
                                                            <option value="基隆市"
                                                                {{ $item->city == '基隆市' ? 'selected' : '' }}>基隆市
                                                            </option>
                                                            <option value="新竹市"
                                                                {{ $item->city == '新竹市' ? 'selected' : '' }}>新竹市
                                                            </option>
                                                            <option value="新竹縣"
                                                                {{ $item->city == '新竹縣' ? 'selected' : '' }}>新竹縣
                                                            </option>
                                                            <option value="嘉義市"
                                                                {{ $item->city == '嘉義市' ? 'selected' : '' }}>嘉義市
                                                            </option>
                                                            <option value="嘉義縣"
                                                                {{ $item->city == '嘉義縣' ? 'selected' : '' }}>嘉義縣
                                                            </option>
                                                            <option value="苗栗縣"
                                                                {{ $item->city == '苗栗縣' ? 'selected' : '' }}>苗栗縣
                                                            </option>
                                                            <option value="彰化縣"
                                                                {{ $item->city == '彰化縣' ? 'selected' : '' }}>彰化縣
                                                            </option>
                                                            <option value="南投縣"
                                                                {{ $item->city == '南投縣' ? 'selected' : '' }}>南投縣
                                                            </option>
                                                            <option value="雲林縣"
                                                                {{ $item->city == '雲林縣' ? 'selected' : '' }}>雲林縣
                                                            </option>
                                                            <option value="屏東縣"
                                                                {{ $item->city == '屏東縣' ? 'selected' : '' }}>屏東縣
                                                            </option>
                                                            <option value="宜蘭縣"
                                                                {{ $item->city == '宜蘭縣' ? 'selected' : '' }}>宜蘭縣
                                                            </option>
                                                            <option value="花蓮縣"
                                                                {{ $item->city == '花蓮縣' ? 'selected' : '' }}>花蓮縣
                                                            </option>
                                                            <option value="台東縣"
                                                                {{ $item->city == '台東縣' ? 'selected' : '' }}>台東縣
                                                            </option>
                                                            <option value="澎湖縣"
                                                                {{ $item->city == '澎湖縣' ? 'selected' : '' }}>澎湖縣
                                                            </option>
                                                            <option value="金門縣"
                                                                {{ $item->city == '金門縣' ? 'selected' : '' }}>金門縣
                                                            </option>
                                                            <option value="馬祖縣"
                                                                {{ $item->city == '馬祖縣' ? 'selected' : '' }}>馬祖縣
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 備註 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="remark" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">備註：</label>

                                                    <div class="col-lg-8">
                                                        <textarea name="remark" value="" class="form-control" rows="1"
                                                            placeholder="限100字以內"
                                                            style="border-color: #d0a98a; font-size: small; text-align: start;">{{ $item->remark }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 啟用/停用 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="city" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">狀態：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="status"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="啟用"
                                                                {{ $item->status == '啟用' ? 'selected' : '' }}>啟用</option>
                                                            <option value="停用"
                                                                {{ $item->status == '停用' ? 'selected' : '' }}>停用</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="modal-footer" style="justify-content: center;">
                                        <input type="hidden" name="pk" value="{{ $item->pk }}">
                                        <input type="submit" class="btn_k btn-k1 btn-sm" value="確認修改">
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            data-bs-dismiss="modal">取消</button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <!-- Modal #member_delete1-->
            <div class="modal fade" id="member_delete{{ $item->pk }}" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header"
                            style="background-color: #eb6c78; color: #ffffff; justify-content: center;">
                            <span class="h5 modal-title" id="staticBackdropLabel" style=" font-weight: 700;">
                                &#9888&nbsp確定要刪除此清單嗎？&#9888</span>
                        </div>
                        <div class="modal-body">
                            <!-- 表單 -->
                            <div class="container py-3">
                                <form class="mx-auto row g-2" action="/admin/memberlist/delete" method="post">
                                    @csrf
                                    <!-- 分欄 -->
                                    <div class="row">

                                        <div class="col-lg-6">

                                            <!-- 會員編號 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pk" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">會員編號：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="pk" value="{{ $item->pk }}"
                                                            class="form-control"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 會員mail -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="email" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">E-mail：</label>
                                                    <div class="col-lg-8">
                                                        <input type="email" name="email" value="{{ $item->email }}"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 密碼 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pwd" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">密碼：</label>
                                                    <div class="col-lg-8">
                                                        <input type="password" name="pwd" value="{{ $item->pwd }}"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 性別 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="gender" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">性別：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="gender"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="M"
                                                                {{ $item->gender == 'M' ? 'selected' : '' }}>男
                                                            </option>
                                                            <option value="F"
                                                                {{ $item->gender == 'F' ? 'selected' : '' }}>女
                                                            </option>>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 職業 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="job" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">職業：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="job"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="學生" {{ $item->job == '學生' ? 'selected' : '' }}>學生</option>
                                                            <option value="上班族" {{ $item->job == '上班族' ? 'selected' : '' }}>上班族</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="col-lg-1"></div>

                                            <!-- 暱稱 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="name" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">暱稱：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="name" value="{{ $item->name }}"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 生日 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="birth" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">生日：</label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="birth" value="{{ $item->birth }}"
                                                            min="1900-01-01" max="2020-01-01" class="form-control"
                                                            style="border-color: #d0a98a; font-size: small;" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 所在地 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="city" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">所在地：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="city"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="c1"
                                                                {{ $item->city == '台北市' ? 'selected' : '' }}>台北市
                                                            </option>
                                                            <option value="c2"
                                                                {{ $item->city == '新北市' ? 'selected' : '' }}>新北市
                                                            </option>
                                                            <option value="c3"
                                                                {{ $item->city == '桃園市' ? 'selected' : '' }}>桃園市
                                                            </option>
                                                            <option value="c4"
                                                                {{ $item->city == '台中市' ? 'selected' : '' }}>台中市
                                                            </option>
                                                            <option value="c5"
                                                                {{ $item->city == '台南市' ? 'selected' : '' }}>台南市
                                                            </option>
                                                            <option value="c6"
                                                                {{ $item->city == '高雄市' ? 'selected' : '' }}>高雄市
                                                            </option>
                                                            <option value="c7"
                                                                {{ $item->city == '基隆市' ? 'selected' : '' }}>基隆市
                                                            </option>
                                                            <option value="c8"
                                                                {{ $item->city == '新竹市' ? 'selected' : '' }}>新竹市
                                                            </option>
                                                            <option value="c9"
                                                                {{ $item->city == '新竹縣' ? 'selected' : '' }}>新竹縣
                                                            </option>
                                                            <option value="c10"
                                                                {{ $item->city == '嘉義市' ? 'selected' : '' }}>嘉義市
                                                            </option>
                                                            <option value="c11"
                                                                {{ $item->city == '嘉義縣' ? 'selected' : '' }}>嘉義縣
                                                            </option>
                                                            <option value="c12"
                                                                {{ $item->city == '苗栗縣' ? 'selected' : '' }}>苗栗縣
                                                            </option>
                                                            <option value="c13"
                                                                {{ $item->city == '彰化縣' ? 'selected' : '' }}>彰化縣
                                                            </option>
                                                            <option value="c14"
                                                                {{ $item->city == '南投縣' ? 'selected' : '' }}>南投縣
                                                            </option>
                                                            <option value="c15"
                                                                {{ $item->city == '雲林縣' ? 'selected' : '' }}>雲林縣
                                                            </option>
                                                            <option value="c16"
                                                                {{ $item->city == '屏東縣' ? 'selected' : '' }}>屏東縣
                                                            </option>
                                                            <option value="c17"
                                                                {{ $item->city == '宜蘭縣' ? 'selected' : '' }}>宜蘭縣
                                                            </option>
                                                            <option value="c18"
                                                                {{ $item->city == '花蓮縣' ? 'selected' : '' }}>花蓮縣
                                                            </option>
                                                            <option value="c19"
                                                                {{ $item->city == '台東縣' ? 'selected' : '' }}>台東縣
                                                            </option>
                                                            <option value="c20"
                                                                {{ $item->city == '澎湖縣' ? 'selected' : '' }}>澎湖縣
                                                            </option>
                                                            <option value="c21"
                                                                {{ $item->city == '金門縣' ? 'selected' : '' }}>金門縣
                                                            </option>
                                                            <option value="c22"
                                                                {{ $item->city == '馬祖縣' ? 'selected' : '' }}>馬祖縣
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 備註 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="remark" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">備註：</label>

                                                    <div class="col-lg-8">
                                                        <textarea name="remark" value="" class="form-control" rows="1"
                                                            placeholder="限100字以內"
                                                            style="border-color: #d0a98a; font-size: small; text-align: start;"
                                                            disabled>{{ $item->remark }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 啟用/停用 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="city" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">狀態：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="city"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="啟用"
                                                                {{ $item->status == '啟用' ? 'selected' : '' }}>啟用</option>
                                                            <option value="停用"
                                                                {{ $item->status == '停用' ? 'selected' : '' }}>停用</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="modal-footer" style="justify-content: center;">
                                        <input type="hidden" name="pk" value="{{ $item->pk }}">
                                        <input type="submit" class="btn_k btn-k3 btn-sm" value="確認刪除">
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            data-bs-dismiss="modal">取消</button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        <!-- modal相關結束 -->

    </header>

    @if (isset($key))
        <div class="row mx-auto" style="width: 150px">
            <div class="col-md-4 justify-content-center">
                {{ $memberList->links('pagination::bootstrap-4') }}
            </div>
        </div>
    @endif


    <!--分頁導覽鈕-->
    {{-- <nav>
        <ul class="pagination pagination-sm1 justify-content-center py-3">
          <li class="page-item disabled1"><a class="page-link1" href="#"><span>&laquo;</span></a></li>
          <li class="page-item active1"><a class="page-link1" href="#">1</a></li><!-- 停留在該分頁時的設定 -->
          <!-- <li class="page-item"><a class="page-link1" href="#">2</a></li>
          <li class="page-item disabled1"><a class="page-link1" href="#">3</a></li> 到最後一頁時的設定 -->
          <li class="page-item disabled1"><a class="page-link1" href="#"><span>&raquo;</span></a></li>
        </ul>
      </nav> --}}



    <!-- 引用jquery -->
    <script src="/admin/js/jquery-1.12.4.js"></script>
    <script src="/admin/js/jquery-3.4.1.js"></script>
    <script src="/admin/js/jquery-migrate-1.4.1.js"></script>


    <script>
        // textarea限制字數
        $('textarea').keyup(function() {
            inputLimit($(this));
        });
        $('textarea').keydown(function() {
            inputLimit($(this));
        });
        inputLimit($('textarea')); //初始化
        functioninputLimit(obj) {
            varlimit = 10;
            varnum = obj.val().length;
            varrest = limit - num;
        }
    </script>

@endsection
