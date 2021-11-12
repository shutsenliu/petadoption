@extends('layout.master')

@section('head')

    <title>忘記密碼</title>

    <link href="/auth/css/all.css" rel="stylesheet" />


@endsection

@section('content')
    <form class="container Bborder rounded-3 p-5 position-relative my-4 " style="width: 30rem" action="/index/forgetpwd"
        method="POST" name="chkchk">
        @csrf
        <div class="mb-3">
            <h3 class="mb-4 text-center">忘記密碼</h3>
        </div>
        <div style="margin-bottom: 2.2rem">
            <span>Email:</span>
            <div class="mt-2">{{ $account }}</div>
        </div>
        <label for="chkma" class="form-label">請輸入驗證碼</label>
        <input type="text" id="chkma" class="form-control mb-2" name="forgetCheck" placeholder="驗證碼">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">請輸入新密碼</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="newPwd">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">請確認新密碼</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="newPwd2">
        </div>
        <div class="mx-auto my-2" style="text-align: center;color:red">
            @if (@isset($err))
                {{ $err }}
            @endif
        </div>
        <button type="submit" class="btn btn-primary mt-4 " style="width: 10rem;margin-left: 6.5rem;" onclick="return chkchkPwd()">送出</button>
    </form>

    <script>
        function chkchkPwd() {
            var c = document.chkchk;
            var np1 = c.newPwd.value;
            var np2 = c.newPwd2.value;

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
