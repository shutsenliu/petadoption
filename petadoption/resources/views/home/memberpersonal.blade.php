@extends('layout.master')

@section('head')

    <title>個人資訊管理</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <div class="mb-3 pt-3 px-3 mt-5"
        style="position:absolute;color:white;background-color:#c98860;border-radius:10px;margin-left:2.6rem; ">
        <p>待追蹤的寵物：</p>
        @forelse ($memberfosterlist as $item)
            <p> {{ $item->remark }}</p>
        @empty
            <p>您沒有待追蹤的寵物資訊！</p>
        @endforelse
    </div>


    <form action="/index/memberpersonal" class="container mx-auto" style="width: 30rem;" method="POST">
        @csrf
        <h3 class="my-5 text-center">個人資訊管理</h3>

        <div class="mb-3 row">
            <label for="staticEmail " class="col-md-3 col-form-label m">Email帳號<br>(無法修改)</label>
            <div class="col-md-9">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $member->email }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-md-3  col-form-label">會員暱稱</label>
            <div class="col-md-8">
                <input type="text" name="name" class="form-control" id="inputPassword" value="{{ $member->name }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="areaList" class="col-md-3 col-form-label">居住地區</label>
            <div class="col-md-8">
                <select id="areaList" class=" mb-2 form-select" aria-label="Default select example" required name="city">
                    <option value="" style="display: none;">請選擇</option>
                    <option value="台北市" {{ $member->city == '台北市' ? 'selected' : '' }}>台北市</option>
                    <option value="新北市" {{ $member->city == '新北市' ? 'selected' : '' }}>新北市</option>
                    <option value="基隆市" {{ $member->city == '基隆市' ? 'selected' : '' }}>基隆市</option>
                    <option value="桃園市" {{ $member->city == '桃園市' ? 'selected' : '' }}>桃園市</option>
                    <option value="新竹市" {{ $member->city == '新竹市' ? 'selected' : '' }}>新竹市</option>
                    <option value="新竹縣" {{ $member->city == '新竹縣' ? 'selected' : '' }}>新竹縣</option>
                    <option value="苗栗縣" {{ $member->city == '苗栗縣' ? 'selected' : '' }}>苗栗縣</option>
                    <option value="台中市" {{ $member->city == '台中市' ? 'selected' : '' }}>台中市</option>
                    <option value="彰化縣" {{ $member->city == '彰化縣' ? 'selected' : '' }}>彰化縣</option>
                    <option value="南投縣" {{ $member->city == '南投縣' ? 'selected' : '' }}>南投縣</option>
                    <option value="雲林縣" {{ $member->city == '雲林縣' ? 'selected' : '' }}>雲林縣</option>
                    <option value="嘉義市" {{ $member->city == '嘉義市' ? 'selected' : '' }}>嘉義市</option>
                    <option value="嘉義縣" {{ $member->city == '嘉義縣' ? 'selected' : '' }}>嘉義縣</option>
                    <option value="台南市" {{ $member->city == '台南市' ? 'selected' : '' }}>台南市</option>
                    <option value="高雄市" {{ $member->city == '高雄市' ? 'selected' : '' }}>高雄市</option>
                    <option value="屏東縣" {{ $member->city == '屏東縣' ? 'selected' : '' }}>屏東縣</option>
                    <option value="宜蘭縣" {{ $member->city == '宜蘭縣' ? 'selected' : '' }}>宜蘭縣</option>
                    <option value="花蓮縣" {{ $member->city == '花蓮縣' ? 'selected' : '' }}>花蓮縣</option>
                    <option value="台東縣" {{ $member->city == '台東縣' ? 'selected' : '' }}>台東縣</option>
                    <option value="澎湖縣" {{ $member->city == '澎湖縣' ? 'selected' : '' }}>澎湖縣</option>
                    <option value="金門縣" {{ $member->city == '金門縣' ? 'selected' : '' }}>金門縣</option>
                    <option value="馬祖縣" {{ $member->city == '馬祖縣' ? 'selected' : '' }}>馬祖縣</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="work" class="col-md-3 col-form-label">職業</label>
            <div class="col-md-8">
                <select name="job" id="work" class=" mb-2 form-select" aria-label="Default select example" required>
                    <option>職業</option>
                    <option value="學生" {{ $member->job == '學生' ? 'selected' : '' }}>學生</option>
                    <option value="上班族" {{ $member->job == '上班族' ? 'selected' : '' }}>上班族</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-md-3 col-form-label">生日<br>(無法修改)</label>
            <div class="col-md-8 pt-2">
                {{ $member->birth }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-md-3 col-form-label">性別<br>(無法修改)</label>
            <div class="col-md-8 pt-2">
                {{ $gender }}
            </div>
        </div>


        <div class="row ">
            <button type="submit" class="col-md-3 btn_k btn-k1 btn-sm m-5 ">確認修改</button>
            <a href="/index/resetpwd" class="col-md-3 btn_k btn-k1 btn-sm m-5 ">修改密碼</a>
        </div>
    </form>


@endsection
