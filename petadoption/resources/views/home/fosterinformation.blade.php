@extends('layout.master')

@section('head')

  <title>送養資訊管理</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <h3 class="my-5 text-center">送養資訊管理</h3>
  <form class="container Bborder rounded-3 p-5 position-relative my-4 "style="width: 60rem">
    <div class="row">
      <div class="form-check col-md-2 pt-2">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          全部
        </label>
      </div>
      <div class="form-check col-md-2 pt-2">
        <input class="form-check-input" type="checkbox" id="gridCheck2">
        <label class="form-check-label" for="gridCheck1">
          已送出
        </label>
      </div>
      <div class="form-check col-md-2 pt-2">
        <input class="form-check-input" type="checkbox" id="gridCheck3">
        <label class="form-check-label" for="gridCheck1">
          未送出
        </label>
      </div>
      <div class="form-check col-md-4 pt-2">
        <input class="form-check-input" type="checkbox" id="gridCheck4">
        <label class="form-check-label" for="gridCheck1">
          審核中
        </label>
      </div>
      
        <div class="col-md-2 ">
          <a href="/notice" class="btn btn-primary">我要刊登</a>
        </div>
      </div>
    </div>
    
    
  </form>
   
@endsection