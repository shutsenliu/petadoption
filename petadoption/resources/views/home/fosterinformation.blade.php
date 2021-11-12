@extends('layout.master')

@section('head')

    <title>送養資訊管理</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h3 class="my-5 text-center">送養資訊管理</h3>
    <div class="container Bborder rounded-3 p-5 position-relative my-4 " style="width: 60rem;height:30rem;">
        <div class="row m-2">
            <div class="form-check col-md-2 pt-2">
                <input class="form-check-input" type="radio" id="no1" name="RRR" onclick="chk1()" checked>
                <label class="form-check-label" for="gridCheck1">
                    全部
                </label>
            </div>
            <div class="form-check col-md-2 pt-2">
                <input class="form-check-input" type="radio" id="no2" name="RRR" onclick="chk2()">
                <label class="form-check-label" for="gridCheck1">
                    已送養
                </label>
            </div>
            <div class="form-check col-md-2 pt-2">
                <input class="form-check-input" type="radio" id="no3" name="RRR" onclick="chk3()">
                <label class="form-check-label" for="gridCheck1">
                    送養中
                </label>
            </div>
            <div class="form-check col-md-4 pt-2">
                <input class="form-check-input" type="radio" id="no4" name="RRR" onclick="chk4()">
                <label class="form-check-label" for="gridCheck1">
                    審核中
                </label>
            </div>

            <div class="col-md-2">
                <a href="/notice" class="btn_k btn-k1 btn-sm" style="margin-left: 1rem;">我要刊登</a>
            </div>
        </div>
        {{-- 全部表單 --}}
        <table id="tb1"class="table table-hover table-bordered table-sm vertical-align: middle my-3"
            style="text-align: center; vertical-align: middle; color: #ac6f47; border-color: #d0aa8ab7; font-size: small;display:table;">
            <thead style="height: 50px; text-align: center; vertical-align: middle; background-color: #f5eadf42;">
                <tr>
                    <th scope="col">刊登日期</th>
                    <th scope="col">狀態</th>
                    <th scope="col">動物暱稱</th>
                    <th scope="col">種類</th>
                    <th scope="col">品種</th>
                    <th scope="col" colspan="2">管理</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Fosterlist as $item)
                <tr >
                    <form action="{{ $item->remark == '不可編輯' ? '' : '/index/fosterinformation' }}" method="{{ $item->remark == '不可編輯' ? '' : 'POST' }}" >
                        @csrf
                        <input hidden value="{{$item->pk}}" name="ppk">
                        <td scope="col">{{$item->publish_date}}</td>
                        <td scope="col">{{$item->status}}</td>
                        <td scope="col">{{$item->pet_name}}</td>
                        <td scope="col">{{$item->pet_type }}</td>
                        <td scope="col">{{$item->pet_variety}}</td>
                        <td scope="col" colspan="2"><button type="{{ $item->remark == '不可編輯' ? '' : 'submit' }}" class="btn_k btn-k1 btn-sm" style="{{ $item->remark == '不可編輯' ? 'padding: 0;border: none;background: none;color:black;' : '' }}">{{$item->remark}}</button></td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- 已送養 --}}
        <table id="tb2"class="table table-hover table-bordered table-sm vertical-align: middle my-3"
            style="text-align: center; vertical-align: middle; color: #ac6f47; border-color: #d0aa8ab7; font-size: small;display:none;">

            <thead style="height: 50px; text-align: center; vertical-align: middle; background-color: #f5eadf42;">
                <tr>
                    <th scope="col">刊登日期</th>
                    <th scope="col">狀態</th>
                    <th scope="col">動物暱稱</th>
                    <th scope="col">種類</th>
                    <th scope="col">品種</th>
                    <th scope="col" colspan="2">管理</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Fosterlist as $item)
                <tr style="display: {{ $item->remark == '查看' ? 'form' : 'none' }}";>
                    <form action="{{ $item->remark == '不可編輯' ? '' : '/index/fosterinformation' }}" method="{{ $item->remark == '不可編輯' ? '' : 'POST' }}" >
                        @csrf
                        <input hidden value="{{$item->pk}}" name="ppk">
                        <td scope="col">{{$item->publish_date}}</td>
                        <td scope="col">{{$item->status}}</td>
                        <td scope="col">{{$item->pet_name}}</td>
                        <td scope="col">{{$item->pet_type }}</td>
                        <td scope="col">{{$item->pet_variety}}</td>
                        <td scope="col" colspan="2"><button type="{{ $item->remark == '不可編輯' ? '' : 'submit' }}" class="btn_k btn-k1 btn-sm" style="{{ $item->remark == '不可編輯' ? 'padding: 0;border: none;background: none;color:black;' : '' }}">{{$item->remark}}</button></td>
                        {{-- <td scope="col" colspan="2">{{ $item->remark == '不可編輯' ? '' : <button type="submit" class="btn_k btn-k1 btn-sm" > }}{{$item->remark}}{{ $item->remark == '不可編輯' ? '' : '</button>' }}</td> --}}
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- 送養中 --}}
        <table id="tb3"class="table table-hover table-bordered table-sm vertical-align: middle my-3"
            style="text-align: center; vertical-align: middle; color: #ac6f47; border-color: #d0aa8ab7; font-size: small;display:none;">
            <thead style="height: 50px; text-align: center; vertical-align: middle; background-color: #f5eadf42;">
                <tr>
                    <th scope="col">刊登日期</th>
                    <th scope="col">狀態</th>
                    <th scope="col">動物暱稱</th>
                    <th scope="col">種類</th>
                    <th scope="col">品種</th>
                    <th scope="col" colspan="2">管理</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Fosterlist as $item)
                <tr id="tb3" style="display: {{ $item->remark == '編輯' ? 'form' : 'none' }}";>
                    <form action="{{ $item->remark == '不可編輯' ? '' : '/index/fosterinformation' }}" method="{{ $item->remark == '不可編輯' ? '' : 'POST' }}" >
                        @csrf
                        <input hidden value="{{$item->pk}}" name="ppk">
                        <td scope="col">{{$item->publish_date}}</td>
                        <td scope="col">{{$item->status}}</td>
                        <td scope="col">{{$item->pet_name}}</td>
                        <td scope="col">{{$item->pet_type }}</td>
                        <td scope="col">{{$item->pet_variety}}</td>
                        <td scope="col" colspan="2"><button type="{{ $item->remark == '不可編輯' ? '' : 'submit' }}" class="btn_k btn-k1 btn-sm" style="{{ $item->remark == '不可編輯' ? 'padding: 0;border: none;background: none;color:black;' : '' }}">{{$item->remark}}</button></td>
                        {{-- <td scope="col" colspan="2">{{ $item->remark == '不可編輯' ? '' : <button type="submit" class="btn_k btn-k1 btn-sm" > }}{{$item->remark}}{{ $item->remark == '不可編輯' ? '' : '</button>' }}</td> --}}
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- 審核中 --}}
        <table id="tb4"class="table table-hover table-bordered table-sm vertical-align: middle my-3"
            style="text-align: center; vertical-align: middle; color: #ac6f47; border-color: #d0aa8ab7; font-size: small;display:none;">

            <thead style="height: 50px; text-align: center; vertical-align: middle; background-color: #f5eadf42;">
                <tr>
                    <th scope="col">刊登日期</th>
                    <th scope="col">狀態</th>
                    <th scope="col">動物暱稱</th>
                    <th scope="col">種類</th>
                    <th scope="col">品種</th>
                    <th scope="col" colspan="2">管理</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Fosterlist as $item)
                <tr id="tb4" style="display: {{ $item->remark == '不可編輯' ? 'form' : 'none' }}";>
                    <form action="{{ $item->remark == '不可編輯' ? '' : '/index/fosterinformation' }}" method="{{ $item->remark == '不可編輯' ? '' : 'POST' }}" >
                        @csrf
                        <input hidden value="{{$item->pk}}" name="ppk">
                        <td scope="col">{{$item->publish_date}}</td>
                        <td scope="col">{{$item->status}}</td>
                        <td scope="col">{{$item->pet_name}}</td>
                        <td scope="col">{{$item->pet_type }}</td>
                        <td scope="col">{{$item->pet_variety}}</td>
                        <td scope="col" colspan="2"><button type="{{ $item->remark == '不可編輯' ? '' : 'submit' }}" class="btn_k btn-k1 btn-sm" style="{{ $item->remark == '不可編輯' ? 'padding: 0;border: none;background: none;color:black;' : '' }}">{{$item->remark}}</button></td>
                        {{-- <td scope="col" colspan="2">{{ $item->remark == '不可編輯' ? '' : <button type="submit" class="btn_k btn-k1 btn-sm" > }}{{$item->remark}}{{ $item->remark == '不可編輯' ? '' : '</button>' }}</td> --}}
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        
           
    </div>    
    <script>
        var a = document.getElementById("no1");
        var aa = document.getElementById("tb1");
        var b = document.getElementById("no2");
        var bb = document.getElementById("tb2");
        var c = document.getElementById("no3");
        var cc = document.getElementById("tb3");
        var d = document.getElementById("no4");
        var dd = document.getElementById("tb4");
        
        function chk1() {
            
            if (a.checked == true) {
                aa.style.display = "table";
                bb.style.display = "none";
                cc.style.display = "none";
                dd.style.display = "none";
            } else {
                aa.style.display = "none";
            }

        }

        function chk2() {
            if (b.checked == true) {
                aa.style.display = "none";
                bb.style.display = "table";
                cc.style.display = "none";
                dd.style.display = "none";
            } else {
                bb.style.display = "none";
            }

        }

        function chk3() {
            if (c.checked == true) {
                aa.style.display = "none";
                bb.style.display = "none";
                cc.style.display = "table";
                dd.style.display = "none";
            } else {
                cc.style.display = "none";
            }

        }

        function chk4() {
            if (d.checked == true) {
                dd.style.display = "table";
                aa.style.display = "none";
                bb.style.display = "none";
                cc.style.display = "none";
            } else {
                dd.style.display = "none";
            }

        }
    </script>

@endsection