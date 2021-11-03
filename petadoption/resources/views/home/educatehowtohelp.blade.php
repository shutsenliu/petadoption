@extends('layout.master')

@section('head')

  <title>幫助浪浪</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')

  <h2 class="text-center m-5 fw-bolder">幫助浪浪</h2>
  <hr class="mx-auto" style="width: 60rem ">
  <div class="container my-5 position-relative" style="width: 60rem ">
    <h4 class="my-5 text-center ">其實，能幫助浪浪的方法有很多種!</h4>
    <div class="row my-5">
      <div class="col-md-4  text-center">
        <a href="/index/educateadoptaway" target="_blank">
          <img class="my-3" src="/layout/img/logo_icon.PNG" alt="領養浪浪" style="width: 150px;height:150px;">
          <h5>領養浪浪</h5>
        </a>
      </div>
      <div class="col-md-4  text-center">
        <a href="https://lovedog.tw/product/dogcat_help/" target="_blank">
          <img class="my-3 rounded-circle" src="/auth/img/201.jpg" alt="捐款/捐罐頭" style="width: 150px;">
          <h5>捐款/捐罐頭</h5>
        </a>
       </div>
      <div class="col-md-4  text-center">
        <a href="http://www.tuapa.org.tw/chinese/volunteers/overview.php" target="_blank">
          <img class="my-3 rounded-circle" src="/auth/img/202.jpg" alt="當志工" style="width: 150px;">
          <h5>成為志工</h5>
        </a>
      </div>
    </div>
    <a class="page-link1 pt-4" href="/index/educatenp4" style="width:6rem"><span>&laquo; 返回</span></a></li>
    <a class="page-link1 position-absolute bottom-0 end-0" href="/index/educateadoptaway"><span>領養途徑 &raquo;</span></a></li>
  </div>    
        
      
      
  

@endsection