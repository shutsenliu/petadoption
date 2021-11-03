@extends('layout.master')

@section('head')

  <title>宣導平台</title>

  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')

  
  <h3 class="my-4 text-center">宣導平台</h3>
  <div class="container"style="width: 60rem">
    <div class="row justify-content-center ">
      <a href="/index/educatenp1" class="col-md-5  btn btn-primary m-4" style="height: 10rem;padding:4rem;">現有問題</a>
      <a href="/index/educatehowtohelp" class="col-md-5  btn btn-primary m-4" style="height: 10rem;padding:4rem;">幫助浪浪</a>
    </div>
    <div class="row justify-content-center">
      <a href="/index/educateadoptaway" class="col-md-5 btn btn-primary m-4" style="height: 10rem;padding:4rem;">領養途徑</a>
      <a href="/index/educatehowtopet" class="col-md-5 btn btn-primary m-4" style="height: 10rem;padding:4rem;">飼養問題</a>
    </div>
  </div>

  
@endsection