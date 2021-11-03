@extends('layout.master')

@section('head')

  <title>送養資訊管理-個別明細(已送出)</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    {{-- <h1>這是送養資訊管理-個別明細(已送出)頁</h1> --}}

  <h3 class="text-center mt-5">送養資訊管理-個別明細(已送出)</h3>
  <div class="container  my-4 contact-section"style="width: 40rem">
    <div class="row Bborder rounded-3 p-4" style="height: 25rem;">
      <div class="col-md-8">
        <h6 class="my-3">
          寵物資料: <br>
          暱稱、種類、品種、性別
        </h6>
        <h6 class="my-3">
          送出時間:2021/01/08
        </h6>
        <h6 class="mt-3" style="margin-bottom:10rem;">
          領養者資料: <br>
          姓名、Email、手機、居住地區
        </h6>
        <h6 class="mt-4 mb-1">
          送出已滿X個月X天
        </h6>
      </div>
      <div class="col-md-2">
        <img src="/auth/img/011.jpg" alt="寵物照片" style="width: 10rem;">
      </div>
      
    </div>
    <div class="d-flex justify-content-center">
      <a href="/index/fosterinformation" class="btn btn-primary mt-4" style="width: 10rem;">返回</a> 
    </div>
    
  </div> 
  
  
@endsection