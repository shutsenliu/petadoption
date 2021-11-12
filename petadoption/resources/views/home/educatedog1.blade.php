@extends('layout.master')

@section('head')

    <title>養狗前的自我檢視1</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h2 class="text-center m-5 fw-bolder">養狗前的自我檢視</h2>
    <hr class="mx-auto" style="width: 60rem ">
    <div class="container mt-5" style="width: 40rem;height: 30rem; ">
        <h4 class="mt-5 mb-3 fw-bolder">Q1. 我適合養狗嗎？</h4>
        <h6>
            狗的平均壽命約在10~15年，人瑞等級的狗狗可以活到20幾歲，因此需要做好照顧牠一生的心理準備，不離不棄。狗狗依體型不同運動量也不同，越大需越大量運動，也需要精神和時間去陪伴狗狗。
        </h6>
        <h4 class="mt-5 mb-3 fw-bolder">Q2. 要養幼犬或成犬？</h4>
        <h6>
            一般而言，幼犬較愛玩可能會有咬人等等的壞習慣，如果飼主不懂得以適當方式教導可能會使他變本加厲；成犬個性穩定，且如果他流浪過，會更珍惜有家的好，反而更加親人。
        </h6>
        <h6 class="my-3">
            許多人都會認為幼犬從小養一定比較親人聽話，但如果飼主不夠了解狗勾，而以錯誤的方式對待和教導他，那什麼樣的狗都很有可能出現行為問題。就像人類的小孩也是剛出生就和父母相處，但有的父母能教出人人稱讚的乖孩子，有些就令人搖頭，是同樣的道理。
        </h6>


    </div>
    <nav>
        <ul class="pagination pagination-sm1 justify-content-center py-3">
            <li class="page-item"><a class="page-link1" href="/index/educatehowtopet"><span>&laquo;</span></a></li>
            <li class="page-item active1"><a class="page-link1" href="/index/educatedog1">1</a></li><!-- 停留在該分頁時的設定 -->
            <li class="page-item"><a class="page-link1" href="/index/educatedog2">2</a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatedog3">3</a></li><!-- 到最後一頁時的設定 -->
            <li class="page-item"><a class="page-link1" href="/index/educatedog2"><span>&raquo;</span></a></li>
        </ul>
    </nav>
@endsection
