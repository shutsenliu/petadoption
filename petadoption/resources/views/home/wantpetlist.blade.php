@extends('layout.master')

@section('head')
<title>想領養XXX(動物暱稱)的清單</title>


<!--引用自建CSS-->
<link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <h3 class="text-center">想領養XXX(動物暱稱)的清單</h3>
  <form class="container rounded-3 p-5 position-relative my-4 "style="width: 40rem">
    <div class="Bborder rounded-3 mb-3">
      <h3 class="text-center m-5">
        寵物資料: <br>
        暱稱、種類、品種、性別 <br>
      </h3>
      <h3 class="text-center m-5">
        刊登時間<br>
        2021/08/31 <br>
      </h3>
      
    </div>
    
    <button type="submit" class="btn btn-primary mt-4  " style="width: 5rem;margin-left: 14.5rem;">查看</button>
    <a href="/index/fosterinformation" class="btn btn-primary mt-4  " style="width: 10rem;margin-left: 12rem;">返回</a>
  </form>

  


@endsection