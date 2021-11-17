@extends('layout.master')

@section('head')

    <title>領養資訊管理</title>

    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')

    {{-- <h1>這是前台領養資訊頁</h1> --}}
    <h3 class="text-center mt-5">領養資訊管理</h3>
    <div class="container  position-relative my-4 " style="width: 40rem">
        <div class="row Bborder rounded-3 p-4" style="height: 30rem;">
            <table class="table table-bordered table-sm vertical-align: middle"
                style="text-align: center; vertical-align: middle; color: #ac6f47; border-color: #d0aa8ab7; font-size: small;height: 30px;">
                <thead style="height: 50px; text-align: center; vertical-align: middle; background-color: #f5eadf42;">
                    <tr>
                        <th scope="col">申請日期</th>
                        <th scope="col">動物暱稱</th>
                        <th scope="col">種類</th>
                        <th scope="col">品種</th>
                        <th scope="col">年齡</th>
                        <th scope="col">結紮</th>
                        <th scope="col">所在地</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- 表格資料 -->
                    @foreach ($Adoptlist as $item)
                        <tr>
                            <td>{{ $item->application_date }}</td>
                            <td>{{ $item->fosterlist['pet_name'] }}</td>
                            <td>{{ $item->fosterlist['pet_type'] }}</td>
                            <td>{{ $item->fosterlist['pet_variety'] }}</td>
                            <td>{{ $item->fosterlist['pet_age'] }}</td>
                            <td>{{ $item->fosterlist['pet_ligation'] }}</td>
                            <td>{{ $item->fosterlist['pet_city'] }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

@endsection
