@extends('layout.master')

@section('head')

  <title>個人資訊管理</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <form action="#"class="container  my-3 mx-auto"style="width: 30rem" method="POST">
    @csrf
    <h3 class="my-5 text-center">個人資訊管理</h3>
    <div class="mb-3 row">
      <label for="staticEmail " class="col-md-3 col-form-label m">Email帳號<br>(無法修改)</label>
      <div class="col-md-9">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="inputPassword" class="col-md-3  col-form-label">會員暱稱</label>
      <div class="col-md-8">
        <input type="text" name="name" class="form-control" id="inputPassword">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="inputPhone" class="col-md-3 col-form-label">電話</label>
      <div class="col-md-8">
        <input type="password" name="phone" class="form-control" id="inputPhone">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="inputPassword" class="col-md-3 col-form-label">居住地區</label>
      <div class="col-md-8">
        <input list="areaList" type="text" name="city" class="form-control mb-2" id="area" placeholder="請填寫">
            <datalist id="areaList" >
              <option value="台北市">台北市</option>
              <option value="新北市">新北市</option>
              <option value="桃園市">桃園市</option>
              <option value="台中市">台中市</option>
              <option value="台南市">台南市</option>
              <option value="高雄市">高雄市</option>
              <option value="基隆市">基隆市</option>
              <option value="新竹市">新竹市</option>
              <option value="嘉義市">嘉義市</option>
              <option value="宜蘭縣">宜蘭縣</option>
              <option value="花蓮縣">花蓮縣</option>
              <option value="台東縣">台東縣</option>
              <option value="澎湖縣">澎湖縣</option>
              <option value="屏東縣">屏東縣</option>
              <option value="嘉義縣">嘉義縣</option>
              <option value="雲林縣">雲林縣</option>
              <option value="南投縣">南投縣</option>
              <option value="彰化縣">彰化縣</option>
              <option value="苗栗縣">苗栗縣</option>
              <option value="馬祖縣">馬祖縣</option>
              <option value="金門縣">金門縣</option>
              <option value="新竹縣">新竹縣</option>
            </datalist>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="inputPassword" class="col-md-3 col-form-label">職業</label>
      <div class="col-md-8">
        <select name="job" id="work" class=" mb-2 form-select" aria-label="Default select example" required> 
          <option>職業</option>
          <option value="學生">學生</option>
          <option value="上班族">上班族</option>
        </select>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="inputPassword" class="col-md-3 col-form-label">生日</label>
      <div class="col-md-8 pt-2">
        1990/01/01
      </div>
    </div>
    <div class="mb-3 row">
      <label for="inputPassword" class="col-md-3 col-form-label">性別</label>
      <div class="col-md-8 pt-2">
        男
      </div>
    </div>

    
    <div class="row ">
      <button type="submit" class="col-md-3 btn btn-primary m-5 ">確認修改</button>
      <a href="/index/resetpwd" class="col-md-3 btn btn-primary m-5 " >修改密碼</a>
    </div> 
  </form>


@endsection