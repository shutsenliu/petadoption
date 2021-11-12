@extends('layout.master')

@section('head')

    <title>送養資訊管理-個別明細(已送養)</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    {{-- <h1>這是送養資訊管理-個別明細(已送出)頁</h1> --}}

    <h3 class="text-center m-5">送養資訊管理-個別明細(已送養)</h3>
    <div class="container  my-4 contact-section " style="width: 40rem">
        <div class="row Bborder rounded-3 p-4" >
            <div class="col-md-8 my-3">
                <h4 class="">
                    送出已{{ $adopthowlong }}天
                </h4>
                <h6 class="my-3">
                    寵物資料: <br>
                    暱稱：    
                    {{ $Fosterlist->pet_name }}<br>
                    種類：
                    {{ $Fosterlist->pet_type }}<br>
                    品種：
                    {{ $Fosterlist->pet_variety }}<br>
                    性別：
                    {{ $Fosterlist->pet_gender }}<br>
                </h6>
                <h6 class="my-3">
                    送出時間:
                    {{ $Fosterlist->adopt_date }}
                </h6>
                <h6 class="my-3" >
                    領養者資料: <br>
                    姓名：
                    {{ $Fosterlist->adopt_name }}<br>
                    手機：
                    {{ $Fosterlist->adopt_phone }}<br>
                    居住地區：
                    {{ $Fosterlist->adopt_city }}
                </h6>
                
            </div>
            <div class="row">
                @foreach ($Fosterlist->pic as $item)

                    <div class="col-md-2 m-2" style="width: 150px; height: 150px; overflow: hidden;position: relative;border-radius:15px;">
                        <img src="/images/{{ $item }}
                        " alt="寵物照片" style="width: 100%; position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    </div>
            
                @endforeach
               
                
                
            </div>
         
        </div>
    
    </div>
    <div class="d-flex justify-content-center my-5">
        <a href="/index/fosterinformation" class="btn_k btn-k1 btn-sm" style="width: 10rem;">返回</a>
    </div>

@endsection
