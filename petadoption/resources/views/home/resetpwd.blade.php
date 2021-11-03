@extends('layout.master')

@section('head')

  <title>密碼重設</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <form action=""class="container Bborder rounded-3 p-5 position-relative my-4 "style="width: 30rem" method="POST">
    @csrf
    <div class="mb-5">
      <h3 class="mb-3 text-center">密碼重設</h3>
      <label for="exampleInputEmail1" class="form-label ">請輸入原密碼</label>
      <input type="email" name="pwd"class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp" name="pwd">
      
    </div>
    <div class="my-3">
      <label for="exampleInputEmail1" class="form-label mt-4">請輸入新密碼</label>
      <input type="email" name="newPwd" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp" name="pwd2">
      <label for="exampleInputPassword1" class="form-label">請確認新密碼</label>
      <input type="password" name="newPwd2" class="form-control" id="exampleInputPassword1" name="pwd2">
    </div>
    <a href="3.personal.html" class="btn btn-primary mt-4 " style="width: 10rem;margin-left: 6.8rem;">送出</a>
  </form>
  <div class="text-center">
    <a href="/index/memberpersonal" class="btn btn-primary mt-4" style="width: 10rem;">返回</a>
  </div>


@endsection