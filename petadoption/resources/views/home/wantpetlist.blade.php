@extends('layout.master')

@section('head')
    <title>想領養XXX(動物暱稱)的清單</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h3 class="text-center mt-4">想領養{{ $Fosterlist->pet_name }}的清單</h3>
    <div class="container rounded-3  position-relative my-4" style="width: 40rem">
        <div class="Bborder rounded-3 mb-3">
            <h3 class="text-left m-5">
                寵物資料 <br>
                <hr>
                暱稱：{{ $Fosterlist->pet_name }} <br>
                種類：{{ $Fosterlist->pet_type }} <br>
                品種：{{ $Fosterlist->pet_variety }} <br>
                性別：{{ $Fosterlist->pet_gender }} <br>
            </h3>
            <h3 class="text-left m-5">
                刊登時間：
                {{ $Fosterlist->publish_date }} <br>
            </h3>

        </div>

        <table class="table table-bordered table-sm vertical-align: middle"
            style="text-align: center; vertical-align: middle; color: #ac6f47; border-color: #d0aa8ab7; font-size: small;">

            <tr>
                <th scope="col">申請日期</th>
                <th scope="col">姓名</th>
                <th scope="col">年齡</th>
                <th scope="col">所在地</th>
                <th scope="col">管理</th>
            </tr>
            <tbody>
                <!-- 表格資料 -->
                @foreach ($Adoptlist as $item)
                <form action="/index/wantpetlist" method="POST"> 
                    @csrf   
                    <tr>
                        <td>{{ $item->application_date }}</td>
                        <td>{{ $item->member['name']  }}</td>
                        <td>{{ $item->remark }}</td>
                        <td>{{ $item->member['city']  }}</td>
                        <input hidden value="{{$item->pk}}" name="apk">
                        <td><button type="submit" class="btn_k btn-k1 btn-sm">查看</button></td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
        <a href="/index/fosterinformation" class="btn btn-primary mt-4  " style="width: 10rem;margin-left: 14rem;">返回</a>
    </div>




@endsection
