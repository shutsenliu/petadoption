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
          <form action="">
            @csrf
            <h2 class="mb-4 text-color-1 text-center">註冊</h2>
            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="email"  class="form-control mb-2" name="email" placeholder="Email帳號">
                <button type="submit" class="btn btn-primary mb-2 ">發送驗證碼</button>
                <input type="text" class="form-control mb-2" name="check" placeholder="信箱驗證碼">
                <input type="text" class="form-control mb-2" name="nickname" placeholder="暱稱">
                <input type="password" class="form-control mb-2" name="pwd"placeholder="密碼">
                <input type="password" class="form-control mb-2" name="pwd2" placeholder="確認密碼">
              </div>
              <div class="col-md-6">
                <label for="birth">生日</label>
                <input type="date" name="birth" class="form-control mb-2">
                <label for="phone">電話</label>
                <input type="inputNumber" name="phone" class="form-control mb-2">
                <input list="areaList" type="text" name="city" class="form-control mb-2" id="area" placeholder="居住地區">
                <datalist id="areaList" >
                  <option value="台北市">台北市</option>
                  <option value="台中市">台中市</option>
                  <option value="台南市">台南市</option>
                </datalist>
                
                <select name="job" id="work" class="form-control mb-2" required> 
                  <option>職業</option>
                  <option value="學生">學生</option>
                  <option value="上班族">上班族</option>
                </select>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="南">
                  <label class="form-check-label" for="inlineRadio1">男</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="女">
                  <label class="form-check-label" for="inlineRadio2">女</label>
                </div>
            </div>
          </form>
          
          <div class="text-center my-3">
            <button type="submit"class="btn btn-primary" style="width: 10rem">送出</button><br>
            
          </div>
          <span class="text-center mt-3">註冊過了嗎?<a href="/index/login">去登入</a></span>
        </div>
      </div>
    </div>
  </header>

@endsection