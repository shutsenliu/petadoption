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
                            <a class="nav-link2" aria-current="page" href="/admin/memberlist">會員清單</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link2 active" href="/admin/fosterlist">送養清單</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link2" href="/admin/adoptlist">申請領養清單</a>
                        </li>
                    </ul>

                </div>
            </div>


            <div class="mx-auto row pt-5">

                {{-- <div class="www mx-auto pb-1" style="text-align: center; font-size: medium;">
                    @if (@isset($err))
                        <a class="fas fa-exclamation-circle" style="display: inline-block; color: #e6a565;">&nbsp</a>
                        {{ $err }}
                    @endif
                </div> --}}

                <!-- 狀態下拉選單+搜尋框 -->
                <div class="container">
                    <form action="" method="post" class="row mx-auto justify-content-end pb-4">
                        @csrf
                        <div class="col-lg-4">

                            <!-- 狀態下拉選單 -->
                            <div class="input-group ms-4">
                                <select class="arr" name="status">
                                    <option value="" selected>全部</option>
                                    <option value="送養中" {{ $statusvalue == '送養中' ? 'selected' : '' }}>送養中</option>
                                    <option value="已送養" {{ $statusvalue == '已送養' ? 'selected' : '' }}>已送養</option>
                                    <option value="審核中(刊登)" {{ $statusvalue == '審核中(刊登)' ? 'selected' : '' }}>審核中(刊登)</option>
                                    <option value="審核中(更新)" {{ $statusvalue == '審核中(更新)' ? 'selected' : '' }}>審核中(更新)</option>
                                    <option value="審核中(送出)" {{ $statusvalue == '審核中(送出)' ? 'selected' : '' }}>審核中(送出)</option>
                                </select>

                                <!-- 搜尋框 -->
                                <input type="search" name="search" class="form-control form-control-sm ts"
                                    style="border-color: #d0a98a; font-size: small;" placeholder="請輸入清單編號..."
                                    aria-label="Recipient's username" aria-describedby="button-addon2"
                                    value="{{ $searchwords }}">
                                <button class="btn_k btn-k5" type="submit" id="button-addon2"><i
                                        class="fas fa-search"></i></button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

            <!-- 送養清單表格 -->
            <table class="table table-hover table-bordered table-sm vertical-align: middle tbs"
                style="text-align: center; vertical-align: middle; color: #ac6f47; border-color: #d0aa8ab7; font-size: small;">

                <thead style="height: 50px; text-align: center; vertical-align: middle; background-color: #f5eadf42;">

                    <tr>
                        <th scope="col">清單編號</th>
                        <th scope="col">刊登日期</th>
                        <th scope="col">會員編號</th>
                        <th scope="col">會員帳號</th>
                        <th scope="col">動物暱稱</th>
                        <th scope="col">種類</th>
                        <th scope="col">品種</th>
                        <th scope="col">狀態</th>
                        <th scope="col" colspan="2">操作</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- 表格資料 -->
                    @foreach ($fosterList as $item)
                        <tr id="pet3">
                            <th scope="row">{{ $item->pk }}</th>
                            <td>{{ $item->publish_date }}</td>
                            <td>{{ $item->member['pk'] }}</td>
                            <td>{{ $item->member['email'] }}</td>
                            <td>{{ $item->pet_name }}</td>
                            <td>{{ $item->pet_type }}</td>
                            <td>{{ $item->pet_variety }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <!--  編輯鈕 導向modal -->
                                <button type="button" class="btn_k btn-k1 btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#forster_edit{{ $item->pk }}">
                                    編輯
                                </button>
                            </td>
                            <td>
                                <!--  刪除鈕 導向modal -->
                                <button type="button" class="btn_k btn-k4 btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#forster_delete{{ $item->pk }}">
                                    刪除
                                </button>
                            </td>
                        </tr>
                    @endforeach

        </div>

        </tbody>
        </table>


        <!-- modal相關 -->

        @foreach ($fosterList as $item)

            <!-- Modal #forster_edit1-->
            <div class="modal fade" id="forster_edit{{ $item->pk }}" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header"
                            style="background-color: #f5eadf; color: #854c0b; justify-content: center;">
                            <span class="h5 modal-title" id="staticBackdropLabel" style=" font-weight: 700;">編輯送養清單</span>
                        </div>
                        <div class="modal-body">
                            <!-- 表單 -->
                            <div class="container py-3">
                                <form class="mx-auto row g-2" action="/admin/fosterlist/update" method="post">
                                    @csrf
                                    <!-- 分欄 -->
                                    <div class="row">

                                        <div class="col-lg-1"></div>

                                        <div class="col-lg-5">

                                            <!-- 送養清單編號 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pk" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: small;">送養清單編號：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="pk" value="{{ $item->pk }}"
                                                            class="form-control"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 會員帳號 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="member_fk" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">會員帳號：</label>
                                                    <div class="col-lg-8">
                                                        <input type="email" name="member_fk"
                                                            value="{{ $item->member['email'] }}" class="form-control"
                                                            required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 刊登日期 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="publish_date" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">刊登日期：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="publish_date"
                                                            value="{{ $item->publish_date }}" min="1900-01-01"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 動物種類 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_type" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物種類：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_type" id="s1"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="狗"
                                                                {{ $item->pet_type == '狗' ? 'selected' : '' }}>狗
                                                            </option>
                                                            <option value="貓"
                                                                {{ $item->pet_type == '貓' ? 'selected' : '' }}>貓
                                                            </option>>
                                                            <option value="其他"
                                                                {{ $item->pet_type == '其他' ? 'selected' : '' }}>其他
                                                            </option>>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- 動物暱稱 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_name" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物暱稱：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="pet_name" value="{{ $item->pet_name }}"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; ">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 動物品種 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_variety" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物品種：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_variety"
                                                            id="s2"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <optgroup label="狗">
                                                                <option value="混種"
                                                                    {{ $item->pet_type == '狗' && $item->pet_variety == '混種' ? 'selected' : '' }}>
                                                                    混種</option>
                                                                <option value="馬爾濟斯"
                                                                    {{ $item->pet_variety == '馬爾濟斯' ? 'selected' : '' }}>
                                                                    馬爾濟斯</option>
                                                                <option value="米格魯"
                                                                    {{ $item->pet_variety == '米格魯' ? 'selected' : '' }}>
                                                                    米格魯</option>
                                                                <option value="博美"
                                                                    {{ $item->pet_variety == '博美' ? 'selected' : '' }}>
                                                                    博美</option>
                                                                <option value="柴犬"
                                                                    {{ $item->pet_variety == '柴犬' ? 'selected' : '' }}>
                                                                    柴犬</option>
                                                                <option value="拉不拉多"
                                                                    {{ $item->pet_variety == '拉不拉多' ? 'selected' : '' }}>
                                                                    拉不拉多</option>
                                                                <option value="臘腸"
                                                                    {{ $item->pet_variety == '臘腸' ? 'selected' : '' }}>
                                                                    臘腸</option>
                                                                <option value="吉娃娃"
                                                                    {{ $item->pet_variety == '吉娃娃' ? 'selected' : '' }}>
                                                                    吉娃娃</option>
                                                                <option value="其他"
                                                                    {{ $item->pet_type == '狗' && $item->pet_variety == '其他' ? 'selected' : '' }}>
                                                                    其他</option>
                                                            </optgroup>

                                                            <optgroup label="貓">
                                                                <option value="混種"
                                                                    {{ $item->pet_type == '貓' && $item->pet_variety == '混種' ? 'selected' : '' }}>
                                                                    混種</option>
                                                                <option value="金吉拉"
                                                                    {{ $item->pet_variety == '金吉拉' ? 'selected' : '' }}>
                                                                    金吉拉</option>
                                                                <option value="俄羅斯藍"
                                                                    {{ $item->pet_variety == '俄羅斯藍' ? 'selected' : '' }}>
                                                                    俄羅斯藍</option>
                                                                <option value="英國藍貓"
                                                                    {{ $item->pet_variety == '英國藍貓' ? 'selected' : '' }}>
                                                                    英國藍貓</option>
                                                                <option value="加菲貓"
                                                                    {{ $item->pet_variety == '加菲貓' ? 'selected' : '' }}>
                                                                    加菲貓</option>
                                                                <option value="折耳貓"
                                                                    {{ $item->pet_variety == '折耳貓' ? 'selected' : '' }}>
                                                                    折耳貓</option>
                                                                <option value="波斯"
                                                                    {{ $item->pet_variety == '波斯' ? 'selected' : '' }}>
                                                                    波斯</option>
                                                                <option value="短毛"
                                                                    {{ $item->pet_variety == '短毛' ? 'selected' : '' }}>
                                                                    短毛</option>
                                                                <option value="其他"
                                                                    {{ $item->pet_type == '貓' && $item->pet_variety == '其他' ? 'selected' : '' }}>
                                                                    其他</option>
                                                            </optgroup>

                                                            <optgroup label="其他">
                                                                <option value="烏類"
                                                                    {{ $item->pet_variety == '烏類' ? 'selected' : '' }}>
                                                                    烏類
                                                                </option>
                                                                <option value="寵物鼠"
                                                                    {{ $item->pet_variety == '寵物鼠' ? 'selected' : '' }}>
                                                                    寵物鼠
                                                                </option>
                                                                <option value="寵物兔"
                                                                    {{ $item->pet_variety == '寵物兔' ? 'selected' : '' }}>
                                                                    寵物兔
                                                                </option>
                                                                <option value="陸龜"
                                                                    {{ $item->pet_variety == '陸龜' ? 'selected' : '' }}>
                                                                    陸龜
                                                                </option>
                                                                <option value="觀賞魚"
                                                                    {{ $item->pet_variety == '觀賞魚' ? 'selected' : '' }}>
                                                                    觀賞魚
                                                                </option>
                                                                <option value="其他"
                                                                    {{ $item->pet_type == '其他' && $item->pet_variety == '其他' ? 'selected' : '' }}>
                                                                    其他
                                                                </option>
                                                            </optgroup>

                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- 動物年紀 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_age" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物年紀：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_age"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="1歲以下"
                                                                {{ $item->pet_age == '1歲以下' ? 'selected' : '' }}>1歲以下
                                                            </option>
                                                            <option value="1～3歲"
                                                                {{ $item->pet_age == '1～3歲' ? 'selected' : '' }}>1～3歲
                                                            </option>
                                                            <option value="3～6歲"
                                                                {{ $item->pet_age == '3～6歲' ? 'selected' : '' }}>3～6歲
                                                            </option>
                                                            <option value="6～10歲"
                                                                {{ $item->pet_age == '6～10歲' ? 'selected' : '' }}>
                                                                6～10歲</option>
                                                            <option value="10歲以上"
                                                                {{ $item->pet_age == '10歲以上' ? 'selected' : '' }}>
                                                                10歲以上</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--動物性別 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_gender" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物性別：</label>
                                                    <div class="col-lg-8" style="padding-top: 8px;">
                                                        <div class="form-check form-check-inline" style="">
                                                            <input type="radio" name="pet_gender" value="公" id="M"
                                                                class="form-check-input"
                                                                style="color: #d0a98a; font-size: small;"
                                                                {{ $item->pet_gender == '公' ? 'checked' : '' }}>
                                                            <label for="M">公</label>
                                                        </div>
                                                        <div class="form-check form-check-inline" style="">
                                                            <input type="radio" name="pet_gender" value="母" id="F"
                                                                class="form-check-input"
                                                                style="color: #d0a98a; font-size: small;"
                                                                {{ $item->pet_gender == '母' ? 'checked' : '' }}>
                                                            <label for="F">母</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 動物體型(種類選狗才會出現) -->

                                            <div class="col-lg-12" id="dog1">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_bodytype" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物體型：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_bodytype"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value=""
                                                                {{ $item->pet_bodytype == '小型' ? 'selected' : '' }}>
                                                                小型</option>
                                                            <option value=""
                                                                {{ $item->pet_bodytype == '中型' ? 'selected' : '' }}>
                                                                中型</option>
                                                            <option value=""
                                                                {{ $item->pet_bodytype == '大型' ? 'selected' : '' }}>
                                                                大型</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>




                                            <!--是否結紮 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_ligation" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">是否結紮：</label>
                                                    <div class="col-lg-8" style="padding-top: 8px;">
                                                        <div class="form-check form-check-inline" style="">
                                                            <input type="radio" name="pet_ligation" value="是" id="O"
                                                                class="form-check-input"
                                                                style="color: #d0a98a; font-size: small;"
                                                                {{ $item->pet_ligation == '是' ? 'checked' : '' }}>
                                                            <label for="O">是</label>
                                                        </div>
                                                        <div class="form-check form-check-inline" style="">
                                                            <input type="radio" name="pet_ligation" value="否" id="X"
                                                                class="form-check-input"
                                                                style="color: #d0a98a; font-size: small;"
                                                                {{ $item->pet_ligation == '否' ? 'checked' : '' }}>
                                                            <label for="X">否</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 所在地區 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-5">
                                                    <label for="pet_city" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">所在地區：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_city"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="台北市"
                                                                {{ $item->pet_city == '台北市' ? 'selected' : '' }}>台北市
                                                            </option>
                                                            <option value="新北市"
                                                                {{ $item->pet_city == '新北市' ? 'selected' : '' }}>新北市
                                                            </option>
                                                            <option value="桃園市"
                                                                {{ $item->pet_city == '桃園市' ? 'selected' : '' }}>桃園市
                                                            </option>
                                                            <option value="台中市"
                                                                {{ $item->pet_city == '台中市' ? 'selected' : '' }}>台中市
                                                            </option>
                                                            <option value="台南市"
                                                                {{ $item->pet_city == '台南市' ? 'selected' : '' }}>台南市
                                                            </option>
                                                            <option value="高雄市"
                                                                {{ $item->pet_city == '高雄市' ? 'selected' : '' }}>高雄市
                                                            </option>
                                                            <option value="基隆市"
                                                                {{ $item->pet_city == '基隆市' ? 'selected' : '' }}>基隆市
                                                            </option>
                                                            <option value="新竹市"
                                                                {{ $item->pet_city == '新竹市' ? 'selected' : '' }}>新竹市
                                                            </option>
                                                            <option value="新竹縣"
                                                                {{ $item->pet_city == '新竹縣' ? 'selected' : '' }}>新竹縣
                                                            </option>
                                                            <option value="嘉義市"
                                                                {{ $item->pet_city == '嘉義市' ? 'selected' : '' }}>嘉義市
                                                            </option>
                                                            <option value="嘉義縣"
                                                                {{ $item->pet_city == '嘉義縣' ? 'selected' : '' }}>嘉義縣
                                                            </option>
                                                            <option value="苗栗縣"
                                                                {{ $item->pet_city == '苗栗縣' ? 'selected' : '' }}>苗栗縣
                                                            </option>
                                                            <option value="彰化縣"
                                                                {{ $item->pet_city == '彰化縣' ? 'selected' : '' }}>彰化縣
                                                            </option>
                                                            <option value="南投縣"
                                                                {{ $item->pet_city == '南投縣' ? 'selected' : '' }}>南投縣
                                                            </option>
                                                            <option value="雲林縣"
                                                                {{ $item->pet_city == '雲林縣' ? 'selected' : '' }}>雲林縣
                                                            </option>
                                                            <option value="屏東縣"
                                                                {{ $item->pet_city == '屏東縣' ? 'selected' : '' }}>屏東縣
                                                            </option>
                                                            <option value="宜蘭縣"
                                                                {{ $item->pet_city == '宜蘭縣' ? 'selected' : '' }}>宜蘭縣
                                                            </option>
                                                            <option value="花蓮縣"
                                                                {{ $item->pet_city == '花蓮縣' ? 'selected' : '' }}>花蓮縣
                                                            </option>
                                                            <option value="台東縣"
                                                                {{ $item->pet_city == '台東縣' ? 'selected' : '' }}>台東縣
                                                            </option>
                                                            <option value="澎湖縣"
                                                                {{ $item->pet_city == '澎湖縣' ? 'selected' : '' }}>澎湖縣
                                                            </option>
                                                            <option value="金門縣"
                                                                {{ $item->pet_city == '金門縣' ? 'selected' : '' }}>金門縣
                                                            </option>
                                                            <option value="馬祖縣"
                                                                {{ $item->pet_city == '馬祖縣' ? 'selected' : '' }}>馬祖縣
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-1"></div>

                                        <!-- 分欄 -->
                                        <div class="col-lg-5">

                                            <!-- 刊登狀態 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="status " class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">刊登狀態：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="status"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="送養中"
                                                                {{ $item->status == '送養中' ? 'selected' : '' }}>送養中
                                                            </option>
                                                            <option value="已送養"
                                                                {{ $item->status == '已送養' ? 'selected' : '' }}>已送養
                                                            </option>
                                                            <option value="審核中(刊登)"
                                                                {{ $item->status == '審核中(刊登)' ? 'selected' : '' }}>審核中(刊登)
                                                            </option>
                                                            <option value="審核中(更新)"
                                                                {{ $item->status == '審核中(更新)' ? 'selected' : '' }}>審核中(更新)
                                                            </option>
                                                            <option value="審核中(送出)"
                                                                {{ $item->status == '審核中(送出)' ? 'selected' : '' }}>審核中(送出)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- 送養日期 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="adopt_date" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">送養日期：</label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="adopt_date"
                                                            value="{{ $item->adopt_date }}" min="1900-01-01"
                                                            class="form-control"
                                                            style="border-color: #d0a98a; font-size: small; ">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 領養者暱稱 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="adopt_name" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">領養者暱稱：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="adopt_name"
                                                            value="{{ $item->adopt_name }}" class="form-control"
                                                            style="border-color: #d0a98a; font-size: small; ">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 領養者手機 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="adopt_phone" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">領養者手機：</label>
                                                    <div class="col-lg-8">
                                                        <input type="tel" name="adopt_phone"
                                                            value="{{ $item->adopt_phone }}" class="form-control"
                                                            style="border-color: #d0a98a; font-size: small; ">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 領養者所在地 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="adopt_city" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: small;">領養者所在地：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="adopt_city"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;">
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="台北市"
                                                                {{ $item->adopt_city == '台北市' ? 'selected' : '' }}>
                                                                台北市</option>
                                                            <option value="新北市"
                                                                {{ $item->adopt_city == '新北市' ? 'selected' : '' }}>
                                                                新北市</option>
                                                            <option value="桃園市"
                                                                {{ $item->adopt_city == '桃園市' ? 'selected' : '' }}>
                                                                桃園市</option>
                                                            <option value="台中市"
                                                                {{ $item->adopt_city == '台中市' ? 'selected' : '' }}>
                                                                台中市</option>
                                                            <option value="台南市"
                                                                {{ $item->adopt_city == '台南市' ? 'selected' : '' }}>
                                                                台南市</option>
                                                            <option value="高雄市"
                                                                {{ $item->adopt_city == '高雄市' ? 'selected' : '' }}>
                                                                高雄市</option>
                                                            <option value="基隆市"
                                                                {{ $item->adopt_city == '基隆市' ? 'selected' : '' }}>
                                                                基隆市</option>
                                                            <option value="新竹市"
                                                                {{ $item->adopt_city == '新竹市' ? 'selected' : '' }}>
                                                                新竹市</option>
                                                            <option value="新竹縣"
                                                                {{ $item->adopt_city == '新竹縣' ? 'selected' : '' }}>
                                                                新竹縣</option>
                                                            <option value="嘉義市"
                                                                {{ $item->adopt_city == '嘉義市' ? 'selected' : '' }}>
                                                                嘉義市</option>
                                                            <option value="嘉義縣"
                                                                {{ $item->adopt_city == '嘉義縣' ? 'selected' : '' }}>
                                                                嘉義縣</option>
                                                            <option value="苗栗縣"
                                                                {{ $item->adopt_city == '苗栗縣' ? 'selected' : '' }}>
                                                                苗栗縣</option>
                                                            <option value="彰化縣"
                                                                {{ $item->adopt_city == '彰化縣' ? 'selected' : '' }}>
                                                                彰化縣</option>
                                                            <option value="南投縣"
                                                                {{ $item->adopt_city == '南投縣' ? 'selected' : '' }}>
                                                                南投縣</option>
                                                            <option value="雲林縣"
                                                                {{ $item->adopt_city == '雲林縣' ? 'selected' : '' }}>
                                                                雲林縣</option>
                                                            <option value="屏東縣"
                                                                {{ $item->adopt_city == '屏東縣' ? 'selected' : '' }}>
                                                                屏東縣</option>
                                                            <option value="宜蘭縣"
                                                                {{ $item->adopt_city == '宜蘭縣' ? 'selected' : '' }}>
                                                                宜蘭縣</option>
                                                            <option value="花蓮縣"
                                                                {{ $item->adopt_city == '花蓮縣' ? 'selected' : '' }}>
                                                                花蓮縣</option>
                                                            <option value="台東縣"
                                                                {{ $item->adopt_city == '台東縣' ? 'selected' : '' }}>
                                                                台東縣</option>
                                                            <option value="澎湖縣"
                                                                {{ $item->adopt_city == '澎湖縣' ? 'selected' : '' }}>
                                                                澎湖縣</option>
                                                            <option value="金門縣"
                                                                {{ $item->adopt_city == '金門縣' ? 'selected' : '' }}>
                                                                金門縣</option>
                                                            <option value="馬祖縣"
                                                                {{ $item->adopt_city == '馬祖縣' ? 'selected' : '' }}>
                                                                馬祖縣</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 其他說明 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-4">
                                                    <label for="introduction" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">其他說明：</label>
                                                    <div class="col-lg-8">

                                                        <p class=""
                                                            style="font-size: x-small; height: 25px; background-color: #f5eadf; color: #854c0b; margin-bottom: 5px;">
                                                            &nbsp<a class="fas fa-exclamation-circle"
                                                                style="display: inline-block; color: #854c0b;"></a>建議填寫照顧注意事項or其他健康狀況。
                                                        </p>

                                                        <textarea name="introduction" value="" class="form-control"
                                                            rows="6" placeholder="限100字以內"
                                                            style="border-color: #d0a98a; font-size: small; text-align: start;">{{ $item->introduction }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 備註 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-5">
                                                    <label for="remark" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">備註：</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="remark" value="1" class="form-control" rows="5"
                                                            placeholder="限100字以內"
                                                            style="border-color: #d0a98a; font-size: small; text-align: start;">{{ $item->remark }}</textarea>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- 動物照片 -->
                                        <div class="col-lg-12">
                                            <div class="ml-auto row mb-3">
                                                <div class="col-lg-1"></div>
                                                <label for="pic" class="col-form-label col-lg-2"
                                                    style="color: #ac6f47; font-weight: 600; font-size: medium;">動物照片：</label>
                                                <div class="col-lg-1"></div>

                                                @foreach ($item->pic as $value)
                                                    <div class="col-lg-2">
                                                        <img class="img-fluid img-thumbnail" style="border-color: #d0a98a;"
                                                            src="/images/{{ $value }}" alt="">
                                                    </div>
                                                @endforeach


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

            <!-- Modal #forster_delete1 -->
            <div class="modal fade" id="forster_delete{{ $item->pk }}" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header"
                            style="background-color: #eb6c78; color: #ffffff; justify-content: center;">
                            <span class="h5 modal-title" id="staticBackdropLabel" style=" font-weight: 700;">
                                &#9888&nbsp確定要刪除此清單嗎？&#9888</span>
                        </div>
                        <div class="modal-body">
                            <!-- 表單 -->
                            <div class="container py-3">
                                <form class="mx-auto row g-2" action="/admin/fosterlist/delete" method="post">
                                    @csrf

                                    <!-- 分欄 -->
                                    <div class="row">

                                        <div class="col-lg-1"></div>

                                        <div class="col-lg-5">

                                            <!-- 送養清單編號 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pk" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: small;">送養清單編號：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="pk" value="{{ $item->pk }}"
                                                            class="form-control"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 會員帳號 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="member_fk" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">會員帳號：</label>
                                                    <div class="col-lg-8">
                                                        <input type="email" name="member_fk"
                                                            value="{{ $item->member['email'] }}" class="form-control"
                                                            required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 領養清單編號 -->
                                            {{-- <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="adoptlist_fk" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: small;">領養清單編號：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="adoptlist_fk" value=""
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; "
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <!-- 刊登日期 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="publish_date" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">刊登日期：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="publish_date"
                                                            value="{{ $item->publish_date }}" min="1900-01-01"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 動物種類 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_type" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物種類：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_type" id="s1"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="#dog1"
                                                                {{ $item->pet_type == '狗' ? 'selected' : '' }}>狗
                                                            </option>
                                                            <option value="#cat"
                                                                {{ $item->pet_type == '貓' ? 'selected' : '' }}>貓
                                                            </option>>
                                                            <option value="#other1"
                                                                {{ $item->pet_type == '其他' ? 'selected' : '' }}>其他
                                                            </option>>
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-lg-4" id="other1">
                                                        <input type="text" name="pet_type_other" value=""
                                                            class="form-control" placeholder="請輸入種類"
                                                            style="border-color: #d0a98a; font-size: small; ">
                                                    </div> --}}
                                                </div>
                                            </div>

                                            <!-- 動物暱稱 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_name" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物暱稱：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="pet_name" value="{{ $item->pet_name }}"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 動物品種 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_variety" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物品種：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_variety"
                                                            id="s2"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <optgroup label="狗">
                                                                <option value="pv1"
                                                                    {{ $item->pet_type == '狗' && $item->pet_variety == '混種' ? 'selected' : '' }}>
                                                                    混種</option>
                                                                <option value="pv2"
                                                                    {{ $item->pet_variety == '馬爾濟斯' ? 'selected' : '' }}>
                                                                    馬爾濟斯</option>
                                                                <option value="pv3"
                                                                    {{ $item->pet_variety == '米格魯' ? 'selected' : '' }}>
                                                                    米格魯</option>
                                                                <option value="pv4"
                                                                    {{ $item->pet_variety == '博美' ? 'selected' : '' }}>
                                                                    博美</option>
                                                                <option value="pv5"
                                                                    {{ $item->pet_variety == '柴犬' ? 'selected' : '' }}>
                                                                    柴犬</option>
                                                                <option value="pv6"
                                                                    {{ $item->pet_variety == '拉不拉多' ? 'selected' : '' }}>
                                                                    拉不拉多</option>
                                                                <option value="pv7"
                                                                    {{ $item->pet_variety == '臘腸' ? 'selected' : '' }}>
                                                                    臘腸</option>
                                                                <option value="pv8"
                                                                    {{ $item->pet_variety == '吉娃娃' ? 'selected' : '' }}>
                                                                    吉娃娃</option>
                                                                <option value="pv9"
                                                                    {{ $item->pet_type == '狗' && $item->pet_variety == '其他' ? 'selected' : '' }}>
                                                                    其他</option>
                                                            </optgroup>

                                                            <optgroup label="貓">
                                                                <option value="pv10"
                                                                    {{ $item->pet_type == '貓' && $item->pet_variety == '混種' ? 'selected' : '' }}>
                                                                    混種</option>
                                                                <option value="pv11"
                                                                    {{ $item->pet_variety == '金吉拉' ? 'selected' : '' }}>
                                                                    金吉拉</option>
                                                                <option value="pv12"
                                                                    {{ $item->pet_variety == '俄羅斯藍' ? 'selected' : '' }}>
                                                                    俄羅斯藍</option>
                                                                <option value="pv13"
                                                                    {{ $item->pet_variety == '英國藍貓' ? 'selected' : '' }}>
                                                                    英國藍貓</option>
                                                                <option value="pv14"
                                                                    {{ $item->pet_variety == '加菲貓' ? 'selected' : '' }}>
                                                                    加菲貓</option>
                                                                <option value="pv15"
                                                                    {{ $item->pet_variety == '折耳貓' ? 'selected' : '' }}>
                                                                    折耳貓</option>
                                                                <option value="pv16"
                                                                    {{ $item->pet_variety == '波斯' ? 'selected' : '' }}>
                                                                    波斯</option>
                                                                <option value="pv17"
                                                                    {{ $item->pet_variety == '短毛' ? 'selected' : '' }}>
                                                                    短毛</option>
                                                                <option value="pv18"
                                                                    {{ $item->pet_type == '貓' && $item->pet_variety == '其他' ? 'selected' : '' }}>
                                                                    其他</option>
                                                            </optgroup>

                                                            <optgroup label="其他">
                                                                <option value="pv19"
                                                                    {{ $item->pet_variety == '烏類' ? 'selected' : '' }}>
                                                                    烏類
                                                                </option>
                                                                <option value="pv20"
                                                                    {{ $item->pet_variety == '寵物鼠' ? 'selected' : '' }}>
                                                                    寵物鼠
                                                                </option>
                                                                <option value="pv21"
                                                                    {{ $item->pet_variety == '寵物兔' ? 'selected' : '' }}>
                                                                    寵物兔
                                                                </option>
                                                                <option value="pv22"
                                                                    {{ $item->pet_variety == '陸龜' ? 'selected' : '' }}>
                                                                    陸龜
                                                                </option>
                                                                <option value="pv23"
                                                                    {{ $item->pet_variety == '觀賞魚' ? 'selected' : '' }}>
                                                                    觀賞魚
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="自行輸入">
                                                                <option value="#other2"
                                                                    {{ $item->pet_type == '其他' && $item->pet_variety == '其他' ? 'selected' : '' }}>
                                                                    其他</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-lg-4" id="other4">
                                                        <input type="text" name="pet_variety_other" value=""
                                                            class="form-control" placeholder="請輸入品種"
                                                            style="border-color: #d0a98a; font-size: small; "
                                                            disabled>
                                                    </div> --}}
                                                </div>
                                            </div>

                                            <!-- 動物年紀 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_age" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物年紀：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_age"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value=""
                                                                {{ $item->pet_age == '1歲以下' ? 'selected' : '' }}>
                                                                1歲以下</option>
                                                            <option value=""
                                                                {{ $item->pet_age == '1～3歲' ? 'selected' : '' }}>
                                                                1～3歲</option>
                                                            <option value=""
                                                                {{ $item->pet_age == '3～6歲' ? 'selected' : '' }}>
                                                                3～6歲</option>
                                                            <option value=""
                                                                {{ $item->pet_age == '6～10歲' ? 'selected' : '' }}>
                                                                6～10歲</option>
                                                            <option value=""
                                                                {{ $item->pet_age == '10歲以上' ? 'selected' : '' }}>
                                                                10歲以上</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--動物性別 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_gender" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物性別：</label>
                                                    <div class="col-lg-8" style="padding-top: 8px;">
                                                        <div class="form-check form-check-inline" style="">
                                                            <input type="radio" name="pet_gender" value="" id="M"
                                                                class="form-check-input"
                                                                style="color: #d0a98a; font-size: small;"
                                                                {{ $item->pet_gender == '公' ? 'checked' : '' }}
                                                                disabled>
                                                            <label for="M">公</label>
                                                        </div>
                                                        <div class="form-check form-check-inline" style="">
                                                            <input type="radio" name="pet_gender" value="" id="F"
                                                                class="form-check-input"
                                                                style="color: #d0a98a; font-size: small;"
                                                                {{ $item->pet_gender == '母' ? 'checked' : '' }}
                                                                disabled>
                                                            <label for="F">母</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 動物體型(種類選狗才會出現) -->

                                            <div class="col-lg-12" id="dog1">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_bodytype" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">動物體型：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_bodytype"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="小型"
                                                                {{ $item->pet_bodytype == '小型' ? 'selected' : '' }}>
                                                                小型</option>
                                                            <option value="中型"
                                                                {{ $item->pet_bodytype == '中型' ? 'selected' : '' }}>
                                                                中型</option>
                                                            <option value="大型"
                                                                {{ $item->pet_bodytype == '大型' ? 'selected' : '' }}>
                                                                大型</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <!--是否結紮 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="pet_ligation" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">是否結紮：</label>
                                                    <div class="col-lg-8" style="padding-top: 8px;">
                                                        <div class="form-check form-check-inline" style="">
                                                            <input type="radio" name="pet_ligation" value="" id="O"
                                                                class="form-check-input"
                                                                style="color: #d0a98a; font-size: small;"
                                                                {{ $item->pet_ligation == '是' ? 'checked' : '' }}
                                                                disabled>
                                                            <label for="O">是</label>
                                                        </div>
                                                        <div class="form-check form-check-inline" style="">
                                                            <input type="radio" name="pet_ligation" value="" id="X"
                                                                class="form-check-input"
                                                                style="color: #d0a98a; font-size: small;"
                                                                {{ $item->pet_ligation == '否' ? 'checked' : '' }}
                                                                disabled>
                                                            <label for="X">否</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 所在地區 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-5">
                                                    <label for="pet_city" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">所在地區：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="pet_city"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="c1"
                                                                {{ $item->pet_city == '台北市' ? 'selected' : '' }}>台北市
                                                            </option>
                                                            <option value="c2"
                                                                {{ $item->pet_city == '新北市' ? 'selected' : '' }}>新北市
                                                            </option>
                                                            <option value="c3"
                                                                {{ $item->pet_city == '桃園市' ? 'selected' : '' }}>桃園市
                                                            </option>
                                                            <option value="c4"
                                                                {{ $item->pet_city == '台中市' ? 'selected' : '' }}>台中市
                                                            </option>
                                                            <option value="c5"
                                                                {{ $item->pet_city == '台南市' ? 'selected' : '' }}>台南市
                                                            </option>
                                                            <option value="c6"
                                                                {{ $item->pet_city == '高雄市' ? 'selected' : '' }}>高雄市
                                                            </option>
                                                            <option value="c7"
                                                                {{ $item->pet_city == '基隆市' ? 'selected' : '' }}>基隆市
                                                            </option>
                                                            <option value="c8"
                                                                {{ $item->pet_city == '新竹市' ? 'selected' : '' }}>新竹市
                                                            </option>
                                                            <option value="c9"
                                                                {{ $item->pet_city == '新竹縣' ? 'selected' : '' }}>新竹縣
                                                            </option>
                                                            <option value="c10"
                                                                {{ $item->pet_city == '嘉義市' ? 'selected' : '' }}>嘉義市
                                                            </option>
                                                            <option value="c11"
                                                                {{ $item->pet_city == '嘉義縣' ? 'selected' : '' }}>嘉義縣
                                                            </option>
                                                            <option value="c12"
                                                                {{ $item->pet_city == '苗栗縣' ? 'selected' : '' }}>苗栗縣
                                                            </option>
                                                            <option value="c13"
                                                                {{ $item->pet_city == '彰化縣' ? 'selected' : '' }}>彰化縣
                                                            </option>
                                                            <option value="c14"
                                                                {{ $item->pet_city == '南投縣' ? 'selected' : '' }}>南投縣
                                                            </option>
                                                            <option value="c15"
                                                                {{ $item->pet_city == '雲林縣' ? 'selected' : '' }}>雲林縣
                                                            </option>
                                                            <option value="c16"
                                                                {{ $item->pet_city == '屏東縣' ? 'selected' : '' }}>屏東縣
                                                            </option>
                                                            <option value="c17"
                                                                {{ $item->pet_city == '宜蘭縣' ? 'selected' : '' }}>宜蘭縣
                                                            </option>
                                                            <option value="c18"
                                                                {{ $item->pet_city == '花蓮縣' ? 'selected' : '' }}>花蓮縣
                                                            </option>
                                                            <option value="c19"
                                                                {{ $item->pet_city == '台東縣' ? 'selected' : '' }}>台東縣
                                                            </option>
                                                            <option value="c20"
                                                                {{ $item->pet_city == '澎湖縣' ? 'selected' : '' }}>澎湖縣
                                                            </option>
                                                            <option value="c21"
                                                                {{ $item->pet_city == '金門縣' ? 'selected' : '' }}>金門縣
                                                            </option>
                                                            <option value="c22"
                                                                {{ $item->pet_city == '馬祖縣' ? 'selected' : '' }}>馬祖縣
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-1"></div>

                                        <!-- 分欄 -->
                                        <div class="col-lg-5">

                                            <!-- 刊登狀態 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="status " class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">刊登狀態：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="status"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="送養中"
                                                                {{ $item->status == '送養中' ? 'selected' : '' }}>送養中
                                                            </option>
                                                            <option value="已送養"
                                                                {{ $item->status == '已送養' ? 'selected' : '' }}>已送養
                                                            </option>
                                                            <option value="審核中(刊登)"
                                                                {{ $item->status == '審核中(刊登)' ? 'selected' : '' }}>審核中(刊登)
                                                            </option>
                                                            <option value="審核中(更新)"
                                                                {{ $item->status == '審核中(更新)' ? 'selected' : '' }}>審核中(更新)
                                                            </option>
                                                            <option value="審核中(送出)"
                                                                {{ $item->status == '審核中(送出)' ? 'selected' : '' }}>審核中(送出)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <!-- 送養日期 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="adopt_date" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">送養日期：</label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="adopt_date"
                                                            value="{{ $item->adopt_date }}" min="1900-01-01"
                                                            class="form-control" required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 領養者暱稱 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="adopt_name" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">領養者暱稱：</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="adopt_name"
                                                            value="{{ $item->adopt_name }}" class="form-control"
                                                            required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 領養者手機 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="adopt_phone" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">領養者手機：</label>
                                                    <div class="col-lg-8">
                                                        <input type="tel" name="adopt_phone"
                                                            value="{{ $item->adopt_phone }}" class="form-control"
                                                            required="required"
                                                            style="border-color: #d0a98a; font-size: small; " disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 領養者所在地 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-3">
                                                    <label for="adopt_city" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: small;">領養者所在地：</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-select form-select-sm" name="adopt_city"
                                                            style="height: 40px; border-color: #d0a98a; font-size: small;"
                                                            disabled>
                                                            <option value="" style="display: none;">請選擇</option>
                                                            <option value="c1"
                                                                {{ $item->adopt_city == '台北市' ? 'selected' : '' }}>
                                                                台北市</option>
                                                            <option value="c2"
                                                                {{ $item->adopt_city == '新北市' ? 'selected' : '' }}>
                                                                新北市</option>
                                                            <option value="c3"
                                                                {{ $item->adopt_city == '桃園市' ? 'selected' : '' }}>
                                                                桃園市</option>
                                                            <option value="c4"
                                                                {{ $item->adopt_city == '台中市' ? 'selected' : '' }}>
                                                                台中市</option>
                                                            <option value="c5"
                                                                {{ $item->adopt_city == '台南市' ? 'selected' : '' }}>
                                                                台南市</option>
                                                            <option value="c6"
                                                                {{ $item->adopt_city == '高雄市' ? 'selected' : '' }}>
                                                                高雄市</option>
                                                            <option value="c7"
                                                                {{ $item->adopt_city == '基隆市' ? 'selected' : '' }}>
                                                                基隆市</option>
                                                            <option value="c8"
                                                                {{ $item->adopt_city == '新竹市' ? 'selected' : '' }}>
                                                                新竹市</option>
                                                            <option value="c9"
                                                                {{ $item->adopt_city == '新竹縣' ? 'selected' : '' }}>
                                                                新竹縣</option>
                                                            <option value="c10"
                                                                {{ $item->adopt_city == '嘉義市' ? 'selected' : '' }}>
                                                                嘉義市</option>
                                                            <option value="c11"
                                                                {{ $item->adopt_city == '嘉義縣' ? 'selected' : '' }}>
                                                                嘉義縣</option>
                                                            <option value="c12"
                                                                {{ $item->adopt_city == '苗栗縣' ? 'selected' : '' }}>
                                                                苗栗縣</option>
                                                            <option value="c13"
                                                                {{ $item->adopt_city == '彰化縣' ? 'selected' : '' }}>
                                                                彰化縣</option>
                                                            <option value="c14"
                                                                {{ $item->adopt_city == '南投縣' ? 'selected' : '' }}>
                                                                南投縣</option>
                                                            <option value="c15"
                                                                {{ $item->adopt_city == '雲林縣' ? 'selected' : '' }}>
                                                                雲林縣</option>
                                                            <option value="c16"
                                                                {{ $item->adopt_city == '屏東縣' ? 'selected' : '' }}>
                                                                屏東縣</option>
                                                            <option value="c17"
                                                                {{ $item->adopt_city == '宜蘭縣' ? 'selected' : '' }}>
                                                                宜蘭縣</option>
                                                            <option value="c18"
                                                                {{ $item->adopt_city == '花蓮縣' ? 'selected' : '' }}>
                                                                花蓮縣</option>
                                                            <option value="c19"
                                                                {{ $item->adopt_city == '台東縣' ? 'selected' : '' }}>
                                                                台東縣</option>
                                                            <option value="c20"
                                                                {{ $item->adopt_city == '澎湖縣' ? 'selected' : '' }}>
                                                                澎湖縣</option>
                                                            <option value="c21"
                                                                {{ $item->adopt_city == '金門縣' ? 'selected' : '' }}>
                                                                金門縣</option>
                                                            <option value="c22"
                                                                {{ $item->adopt_city == '馬祖縣' ? 'selected' : '' }}>
                                                                馬祖縣</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 其他說明 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-4">
                                                    <label for="introduction" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">其他說明：</label>
                                                    <div class="col-lg-8">

                                                        <p class=""
                                                            style="font-size: x-small; height: 25px; background-color: #f5eadf; color: #854c0b; margin-bottom: 5px;">
                                                            &nbsp<a class="fas fa-exclamation-circle"
                                                                style="display: inline-block; color: #854c0b;"></a>建議填寫照顧注意事項or其他健康狀況。
                                                        </p>

                                                        <textarea name="introduction" value="1" class="form-control"
                                                            rows="6" placeholder="限100字以內"
                                                            style="border-color: #d0a98a; font-size: small; text-align: start;"
                                                            disabled>{{ $item->introduction }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 備註 -->
                                            <div class="col-lg-12">
                                                <div class="mr-auto row mb-5">
                                                    <label for="remark" class="col-form-label col-lg-4"
                                                        style="color: #ac6f47; font-weight: 600; font-size: medium;">備註：</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="remark" value="1" class="form-control" rows="5"
                                                            placeholder="限100字以內"
                                                            style="border-color: #d0a98a; font-size: small; text-align: start;"
                                                            disabled>{{ $item->remark }}</textarea>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- 動物照片 -->
                                        <div class="col-lg-12">
                                            <div class="ml-auto row mb-3">
                                                <div class="col-lg-1"></div>
                                                <label for="pic" class="col-form-label col-lg-2"
                                                    style="color: #ac6f47; font-weight: 600; font-size: medium;">動物照片：</label>
                                                <div class="col-lg-1"></div>
                                                @foreach ($item->pic as $value)
                                                    <div class="col-lg-2">
                                                        <img class="img-fluid img-thumbnail" style="border-color: #d0a98a;"
                                                            src="/images/{{ $value }}" alt="">
                                                    </div>
                                                @endforeach
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


    </header>

    @if (isset($key))
        <div class="row mx-auto" style="width: 280px">
            <div class="col-md-4 justify-content-center">
                {{ $fosterList->links('pagination::bootstrap-4') }}
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

    <!--引用jquery-->
    <script src="/admin/js/jquery-1.12.4.js"></script>
    <script src="/admin/js/jquery-3.4.1.js"></script>
    <script src="/admin/js/jquery-migrate-1.4.1.js"></script>

    <script>
        $(function() {
            //隱藏 其他 選項的輸入框(種類)
            $('div[id^="other"]').hide();
            $('#s1').change(function() {
                let sltValue = $(this).val();
                console.log(sltValue);
                $('div[id^="other"]').hide();

                //顯示 其他 選項的輸入框
                $(sltValue).show();
            });
        });

        $(function() {
            //隱藏 其他 選項的輸入框(品種)
            $('div[id^="other"]').hide();
            $('#s2').change(function() {
                let sltValue = $(this).val();
                console.log(sltValue);
                $('div[id^="other"]').hide();

                //顯示 其他 選項的輸入框
                $(sltValue).show();
            });
        });

        // $(function () {
        //   //隱藏 其他 選項的輸入框(狗體型)
        //   $('div[id^="dog1"]').hide();
        //   $('#s1').change(function () {
        //     let sltValue = $(this).val();
        //     console.log(sltValue);
        //     $('div[id^="dog1"]').hide();

        //     //顯示 其他 選項的輸入框
        //     $(sltValue).show();
        //   });
        // });

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
