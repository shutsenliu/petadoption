@extends('layout.master')

@section('head')

    <title>危險的街頭生活</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h2 class="text-center m-5 fw-bolder">危險的街頭生活</h2>
    <hr class="mx-auto" style="width: 60rem ">
    <div class="container my-5" style="width: 60rem ">
        <div class="row">
            <div class="col text-center">
                <img src="/auth/img/012.jpg" alt="流浪動物-1" style="width: 90%">
            </div>
        </div>


    </div>
    <nav class="position-relative">
        <ul class="pagination pagination-sm1 justify-content-center py-3">
            <li class="page-item"><a class="page-link1" href="#"><span>&laquo;</span></a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatenp1">1</a></li><!-- 停留在該分頁時的設定 -->
            <li class="page-item"><a class="page-link1" href="/index/educatenp2">2</a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatenp3">3</a></li>
            <li class="page-item active1"><a class="page-link1" href="/index/educatenp4">4</a></li><!-- 到最後一頁時的設定 -->
            <li class="page-item disabled1"><a class="page-link1"
                    href="/index/educatehowtohelp"><span>&raquo;</span></a></li>
            <a class="page-link1 position-absolute bottom-1 end-0" href="/index/educatehowtohelp"><span>幫助浪浪
                    &raquo;</span></a></li>
        </ul>

    </nav>
@endsection
