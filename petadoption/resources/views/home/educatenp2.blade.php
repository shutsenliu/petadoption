@extends('layout.master')

@section('head')

  <title>台灣浪浪數量</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <h2 class="text-center m-5 fw-bolder">台灣浪浪數量</h2>
  <hr class="mx-auto" style="width: 60rem ">
  <div class="container my-5" style="width: 60rem ">
    <div class="row">
      <div class="col text-center">
        <img src="/auth/img/011.jpg" alt="流浪動物-1" style="width: 90%">
      </div>
    </div>
    
    
  </div>    
        
  <nav>
    <ul class="pagination pagination-sm1 justify-content-center py-3">
      <li class="page-item "><a class="page-link1" href="#"><span>&laquo;</span></a></li>
      <li class="page-item"><a class="page-link1" href="/index/educatenp1">1</a></li><!-- 停留在該分頁時的設定 -->
      <li class="page-item active1"><a class="page-link1" href="/index/educatenp2">2</a></li>
      <li class="page-item"><a class="page-link1" href="/index/educatenp3">3</a></li>
      <li class="page-item"><a class="page-link1" href="/index/educatenp4">4</a></li><!-- 到最後一頁時的設定 -->
      <li class="page-item"><a class="page-link1" href="/index/educatenp3"><span>&raquo;</span></a></li>
    </ul>
  </nav>    
 
@endsection