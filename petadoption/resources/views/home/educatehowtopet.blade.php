@extends('layout.master')

@section('head')

  <title>我想養...</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <h2 class="text-center m-5 fw-bolder">我想養...</h2>
  <hr class="mx-auto" style="width: 60rem ">
  <div class="container my-5 mx-auto" style="width: 60rem ">
    <div class="row my-5 text-center">
      <div class="col-md-6">
        <a href="/index/educatedog1"><img src="/auth/img/303.jpg" alt="選狗" style="width: 400px ;height:375px;"></a>
      </div>
      <div class="col-md-6">
        <a href="/index/educatecat1"><img src="/auth/img/304.jpg" alt="選貓" style="width: 400px;height:375px;"></a>
      </div>
    </div>

  </div>
  <a class="page-link1 pt-4" href="/index/educateadoptaway"><span>&laquo; 返回</span></a></li>
@endsection