@extends('layout.master')

@section('head')

    <title>領養資料明細</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <form action="/index/adoptdetail" class="container Bborder rounded-3 p-5 position-relative my-4 " style="width: 30rem" method="POST" name="chkchk">
        @csrf
        <div class="mb-5">
            <h3 class="mb-3 text-center">{{$Fosterlist->pet_name}}領養資料明細</h3>
        </div>
        <div class="my-3">
            <input hidden value="{{$ppk}}" name="ppk">
            <input type="date" name="adopt_date" class="form-control my-4" id="exampleInputPassword1" placeholder="日期">
            <input type="tel" name="adopt_phone" class="form-control my-4"
                placeholder="電話">
            <input type="text" name="adopt_name" class="form-control my-4" id=" exampleInputPassword1" placeholder="領養者姓名">
            <select id="areaList" type="text" name="adopt_city" class="form-control mb-2" id="area" placeholder="居住地區">
                <option value="台北市">台北市</option>
                <option value="新北市">新北市</option>
                <option value="桃園市">桃園市</option>
                <option value="台中市">台中市</option>
                <option value="台南市">台南市</option>
                <option value="高雄市">高雄市</option>
                <option value="基隆市">基隆市</option>
                <option value="新竹市">新竹市</option>
                <option value="嘉義市">嘉義市</option>
                <option value="宜蘭縣">宜蘭縣</option>
                <option value="花蓮縣">花蓮縣</option>
                <option value="台東縣">台東縣</option>
                <option value="澎湖縣">澎湖縣</option>
                <option value="屏東縣">屏東縣</option>
                <option value="嘉義縣">嘉義縣</option>
                <option value="雲林縣">雲林縣</option>
                <option value="南投縣">南投縣</option>
                <option value="彰化縣">彰化縣</option>
                <option value="苗栗縣">苗栗縣</option>
                <option value="馬祖縣">馬祖縣</option>
                <option value="金門縣">金門縣</option>
                <option value="新竹縣">新竹縣</option>
            </select>
        </div>
        <p>請注意！送出後即無法再更改！！！</p style=" color:red; ">
        <button type="submit" class="btn btn-primary mt-4 " style="width: 10rem;margin-left: 6.8rem;">送出</button>
    </form>
    <div class="text-center">
        <a href="/index/fosterinformation" class="btn btn-primary mt-4" style="width: 10rem;">返回</a>
    </div>



@endsection
