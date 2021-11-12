@extends('layout.master')

@section('head')

  <title>註冊</title>

  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <header>
    <div class="container py-5 px-lg-3">
      <div class="row justify-content-md-center">
        <div class="col-md-5 mx-1 Bborder rounded-3 p-5">
          <form action="/send-chkmaemail" method="POST">
            @csrf
            <h2 class="mb-5 text-color-1 text-center">註冊</h2>
            
            <input type="email"  class="form-control mb-2" name="email" placeholder="請輸入Email">
          
          
          <div class="text-center my-1">
            <button type="submit"class="btn btn-primary my-5" style="width: 10rem">發送驗證碼</button><br>
            <div class="mx-auto my-2" style="text-align: center;color:red">
              @if (@isset($err))
                  {{ $err }}
              @endif
            </div>
            <span class="text-center mt-3">註冊過了嗎?<a href="/index/login">去登入</a></span>
          </div>
        </form>
        </div>
      </div>
    </div>
  </header>
  
@endsection