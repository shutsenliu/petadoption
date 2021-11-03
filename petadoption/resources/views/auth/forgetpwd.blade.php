@extends('layout.master')

@section('head')

    <title>忘記密碼</title>

    <link href="/auth/css/all.css" rel="stylesheet" />


@endsection

@section('content')
    <form class="container Bborder rounded-3 p-5 position-relative my-4 " style="width: 30rem">
        @csrf
        <div class="mb-3">
            <h3 class="mb-4 text-center">忘記密碼</h3>
            <label for="exampleInputEmail1" class="form-label">請輸入Email</label>
            <input type="email" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
            <button type="submit" class="btn btn-primary">發送驗證碼</button>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">請輸入信箱驗證碼</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">請輸入新密碼</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">請確認新密碼</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>



        <a href="/index/login" class="btn btn-primary mt-4 " style="width: 10rem;margin-left: 6.5rem;">送出</a>





    </form>

@endsection
