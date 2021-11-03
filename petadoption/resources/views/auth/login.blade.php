@extends('layout.master')

@section('head')

  <title>登入</title>

  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <header>
    <div class="container py-5 px-lg-3">
      <div class="row justify-content-md-center">
        <div class="col-md-4 mx-1 Bborder rounded-3  p-5">
          <h2 class="mb-4 text-center  text-color-1">登入</h2>
          <form action="#" method="POST">
            @csrf
            <div class="form-row">
              <div class="col-auto">
                <label  for="inlineFormInput">Email 帳號</label>
                <input type="text" name="email"class="form-control mb-2" id="inlineFormInput" placeholder="Email 帳號">
              </div>
              <div class="col-auto mb-3">
                <label  for="inlineFormInputGroup">密碼</label> 
                <input type="text" name="pwd" class="form-control" id="inlineFormInputGroup" placeholder="密碼">
                </div>
              </div>
              <div class="col-auto mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                  <label class="form-check-label" for="autoSizingCheck">
                    記住我
                  </label>
                </div>
              </div>
              <div class="col-auto  text-center mb-4">
                <button type="submit" class="btn btn-primary " style="width: 10rem">送出</button>
              </div>
              <div class="col-auto  text-center">
                <a href="/index/forgetpwd">忘記密碼</a>
              </div>
              <div class="text-center mt-3">還沒註冊嗎?<a href="/index/register">去註冊</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>
   
@endsection