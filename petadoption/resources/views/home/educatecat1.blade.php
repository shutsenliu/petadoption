@extends('layout.master')

@section('head')

  <title>養貓前的自我檢視1</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <h2 class="text-center m-5 fw-bolder">養貓前的自我檢視</h2>
  <hr class="mx-auto" style="width: 60rem ">
  <div class="container my-5" style="width: 40rem;height: 30rem; ">
    <h4 class="mt-5 mb-3 fw-bolder">Q1. 我適合養貓嗎？</h4>
    <h6>
      一般來說，貓的平均壽命約為15歲左右，貓咪對環境的變化很敏感，所以如果近期內你的生活會有太大變動就暫時不適合養貓，建議等生活穩定下來之後再養。較大的變動包含：結婚、搬家、長期出國、生小孩
    </h6>
    <h4 class="mt-5 mb-3 fw-bolder">Q2. 要養幼貓或成貓？</h4>
    <h6>
      一般而言，幼貓較愛玩可能會有咬人等等的壞習慣，如果飼主不懂得以適當方式教導可能會使他變本加厲；成貓個性穩定，且如果他流浪過，會更珍惜有家的好，反而更加親人。
    </h6>
    <h6 class="my-3">
      許多人都會認為幼貓從小養一定比較親人聽話，但如果飼主不夠了解貓咪，而以錯誤的方式對待和教導他，那什麼樣的貓都很有可能出現行為問題。就像人類的小孩也是剛出生就和父母相處，但有的父母能教出人人稱讚的乖孩子，有些就令人搖頭，是同樣的道理。
    </h6>
    
    
  </div>
  <nav>
    <ul class="pagination pagination-sm1 justify-content-center py-3">
      <li class="page-item "><a class="page-link1" href="/index/educatehowtopet"><span>&laquo;</span></a></li>
      <li class="page-item active1"><a class="page-link1" href="/index/educatecat1">1</a></li><!-- 停留在該分頁時的設定 -->
      <li class="page-item"><a class="page-link1" href="/index/educatecat2">2</a></li>
      <li class="page-item"><a class="page-link1" href="/index/educatecat3">3</a></li><!-- 到最後一頁時的設定 -->
      <li class="page-item"><a class="page-link1" href="/index/educatecat2"><span>&raquo;</span></a></li>
    </ul>
  </nav>
@endsection