@extends('layout.master')

@section('head')

    <title>註冊</title>

    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <header>
        <div class="container py-5 px-lg-3">
            <div class="row justify-content-md-center">
                <div class="col-md-6 mx-1 Bborder rounded-3 p-5">
                    <form action="/index/register" method="POST" name="chkchk">
                        @csrf
                        <h2 class="mb-4 text-color-1 text-center">註冊</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3 " style="margin-top:2.5px">
                                <div style="margin-bottom: 2.2rem">
                                    <span>Email:</span>
                                    <input type="text" class="form-control mb-2" name="email" readonly="readonly"
                                        value="{{ $registeremailacc }}" />
                                </div>
                                <input type="text" class="form-control mb-2" name="registerCheck" placeholder="輸入驗證碼">
                                <input type="text" class="form-control mb-2" name="nickname" placeholder="暱稱">
                                <input type="password" class="form-control mb-2" name="pwd" placeholder="密碼">
                                <input type="password" class="form-control mb-2" name="pwd2" placeholder="確認密碼">
                            </div>
                            <div class="col-md-6">

                                <label for="birth">生日</label>
                                <input type="date" name="birth" class="form-control mb-2">
                                <input list="areaList" type="text" name="city" class="form-control mb-2" id="area"
                                    placeholder="居住地區">
                                <datalist id="areaList">
                                    <option value="台北市">台北市</option>
                                    <option value="新北市">新北市</option>
                                    <option value="基隆市">基隆市</option>
                                    <option value="桃園市">桃園市</option>
                                    <option value="新竹市">新竹市</option>
                                    <option value="新竹縣">新竹縣</option>
                                    <option value="苗栗縣">苗栗縣</option>
                                    <option value="台中市">台中市</option>
                                    <option value="彰化縣">彰化縣</option>
                                    <option value="南投縣">南投縣</option>
                                    <option value="雲林縣">雲林縣</option>
                                    <option value="嘉義市">嘉義市</option>
                                    <option value="嘉義縣">嘉義縣</option>
                                    <option value="台南市">台南市</option>
                                    <option value="高雄市">高雄市</option>
                                    <option value="屏東縣">屏東縣</option>
                                    <option value="宜蘭縣">宜蘭縣</option>
                                    <option value="花蓮縣">花蓮縣</option>
                                    <option value="台東縣">台東縣</option>
                                    <option value="澎湖縣">澎湖縣</option>
                                    <option value="馬祖縣">馬祖縣</option>
                                    <option value="金門縣">金門縣</option>
                                </datalist>

                                <select name="job" id="work" class="form-control mb-2" required>
                                    <option>職業</option>
                                    <option value="學生">學生</option>
                                    <option value="上班族">上班族</option>
                                </select>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M">
                                    <label class="form-check-label" for="inlineRadio1">生理男</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">
                                    <label class="form-check-label" for="inlineRadio2">生理女</label>
                                </div>
                            </div>

                            <div class="mx-auto my-2" style="text-align: center;color:red">
                                @if (@isset($err))
                                    {{ $err }}
                                @endif
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-primary" style="width: 10rem"
                                    onclick="return chkchkPwd()">送出</button><br>

                            </div>
                    </form>

                    <span class="text-center mt-3">註冊過了嗎?<a href="/index/login">去登入</a></span>
                </div>
            </div>
        </div>
    </header>
    <div class="mx-auto" style="text-align: center;">
        @if (@isset($err))
            {{ $err }}
        @endif
    </div>
    <script>
        function chkchkPwd() {
            var c = document.chkchk;
            var np1 = c.pwd.value;
            var np2 = c.pwd2.value;

            if (np1 != np2) {
                alert("兩次密碼輸入不一致!");
                return false;
            }
            // if (np1 == np2) {
            //     alert("修改成功，請重新登入");

            // }
        }
    </script>
@endsection
