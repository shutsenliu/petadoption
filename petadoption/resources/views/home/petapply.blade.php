@extends('layout.master')

@section('head')

  <title>申請領養明細</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <h3 class="text-center mt-5">申請領養明細</h3>
  <form class="container rounded-3 p-5 position-relative  "style="width: 40rem">
    <div class="Bborder rounded-3 mb-3">
      <h5 class="text-center m-5">
        姓名 <br>
        Email <br>
        手機 <br>
        年紀 <br>
        居住地區 <br>
        職業 <br>
        可否家訪 <br>
        為何想領養 <br>
      </h5>
      
      
    </div>
    <a href="/index/wantpetlist" class="btn btn-primary mt-4" style="width: 10rem;margin-left: 12rem;">返回</a>
  </form>

@endsection