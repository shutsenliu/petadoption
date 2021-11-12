@extends('layout.master')

@section('head')

    <title>申請領養明細</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h3 class="text-center mt-5">申請領養明細</h3>
    <form class="container rounded-3 p-5 position-relative " style="width: 40rem">
        <div class="Bborder rounded-3 mb-3">
            <h5 class="text-left m-5">
                姓名：{{ $Adoptlist->member['name'] }} <br>
                Email ：{{ $Adoptlist->member['email']  }} <br>
                手機：{{ $Adoptlist->phone }} <br>
                年紀：{{ $Adoptlist->member['birth'] }} <br>
                居住地區 ：{{ $Adoptlist->member['city'] }} <br>
                職業：{{ $Adoptlist->member['job']}} <br>
                申請日期：{{ $Adoptlist->application_date }} <br>
                為何想領養：{{ $Adoptlist->reason }} <br>
            </h5>
        </div>
    </form>
    <form method="POST" action="/viewwantpetlist" class="text-center">
        @csrf
        <input hidden value="{{$Adoptlist->fosterlist_fk}}" name="ppk">
        <button type="submit" class="btn btn-primary mt-4" style="width: 10rem;">返回</button>
    </form>

@endsection
