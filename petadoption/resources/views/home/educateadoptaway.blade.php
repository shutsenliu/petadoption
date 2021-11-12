@extends('layout.master')

@section('head')

    <title>領養途徑</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h2 class="text-center m-5 fw-bolder">領養途徑</h2>
    <hr class="mx-auto" style="width: 60rem ">
    <div class="container my-5" style="width: 60rem ">
        <div class="row my-5">
            <div class="col-md-6">
                <span>
                    各地收容中心
                    <button type="button" class="btn btn-outline-secondary">北</button>
                    <button type="button" class="btn btn-outline-secondary">中</button>
                    <button type="button" class="btn btn-outline-secondary">南</button>
                    <button type="button" class="btn btn-outline-secondary">東</button>
                </span>
                <h6 class="my-4">收容中心聯絡資料</h6>
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action">...收容所</button>
                    <button type="button" class="list-group-item list-group-item-action">...收容所</button>
                    <button type="button" class="list-group-item list-group-item-action">...收容所</button>
                    <button type="button" class="list-group-item list-group-item-action" disabled>...收容所</button>
                </div>
                <hr class="my-5">
                <a class="btn btn-primary my-2" href="/fosterlist">領養系統</a>
            </div>
            <div class="col-md-6  text-center">
                <div id="map-container-google-2" class="z-depth-1-half map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d1869424.5512772803!2d121.23039474843755!3d23.77518514147399!3m2!1i1024!2i768!4f13.1!2m1!1z5YWo5Y-w5YuV54mp5pS25a655omA!5e0!3m2!1szh-TW!2stw!4v1635408730928!5m2!1szh-TW!2stw"
                        width="450" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

    </div>
    <nav class="position-relative">

        <a class="page-link1 pt-4" href="/index/educatehowtohelp" style="width:6rem"><span>&laquo; 返回</span></a>
        <a class="page-link1 position-absolute bottom-0 end-0" href="/index/educatehowtopet"><span>飼養問題 &raquo;</span></a>

    </nav>
@endsection
