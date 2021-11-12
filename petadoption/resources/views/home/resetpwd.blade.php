@extends('layout.master')

@section('head')

    <title>密碼重設</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <form action="/index/resetpwd" class="container Bborder rounded-3 p-5 position-relative my-4 " style="width: 30rem"
        method="POST" name="chkchk">
        @csrf
        <div class="mb-5">
            <h3 class="mb-3 text-center">密碼重設</h3>
            <label for="exampleInputEmail1" class="form-label ">請輸入原密碼</label>
            <input type="password" name="pwd" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="pwd">

        </div>
        <div class="my-3">
            <label for="exampleInputEmail1" class="form-label mt-4">請輸入新密碼</label>
            <input type="password" name="newPwd" class="form-control mb-2" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <label for="exampleInputPassword1" class="form-label">請確認新密碼</label>
            <input type="password" name="newPwd2" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mx-auto my-2" style="text-align: center;color:red">
            @if (@isset($err))
                {{ $err }}
            @endif
        </div>
        <button id="resetbut" type="submit" class="btn btn-primary mt-4 " style="width: 10rem;margin-left: 6.8rem;" onclick="return chkchkPwd()"
            >送出</button>
    </form>
    <div class="text-center">
        <a href="/index/memberpersonal" class="btn btn-primary mt-4" style="width: 10rem;">返回</a>
    </div>

    <script>
        function chkchkPwd() {
            var c = document.chkchk;
            var np1 = c.newPwd.value;
            var np2 = c.newPwd2.value;

            if (np1 != np2) {
                alert("兩次密碼輸入不一致!");
                return false;
            }
            // if (np1 = np2) {
            //     alert("修改成功，請重新登入");

            // }
        }
    </script>

@endsection
