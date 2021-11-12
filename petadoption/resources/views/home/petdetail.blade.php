@extends('layout.master')

@section('head')
    <title>送養資訊管理-個別明細(未送出)</title>
    <link rel="stylesheet" href="/foster/css/wantfoster.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('content')
    <!-- 內文 -->
    <div>
        <h1 class="text-center tt pt-5 pb-5 title-c">{{ $Fosterlist->pet_name }}的送養資訊</h1>
    </div>
    <!-- 刊登表單 -->
    <form method="post" action="/index/petdetail" enctype="multipart/form-data">
        @csrf
        <div class="container border-5-radius pt-5 pl-5 pr-5 mb-5">
            <div class="row ">
                <div class="form-group text-center">
                    <label class="control-label  p-2" for="animalType">送養狀態 <span class="danger">必填</span></label>
                    <select class="form-control border-warning text-center col-12" id="animalstatus" name="status" required>
                        <option value="送養中" {{ $Fosterlist->status == '送養中' ? 'selected' : '' }}>送養中</option>
                        <option value="已送養" {{ $Fosterlist->status == '已送養' ? 'selected' : '' }}>已送養</option>
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="form-group col-12 col-sm-6">
                    <label class="control-label  p-2" for="animalType">動物種類 <span class="danger">不可更改</span></label>
                    <select class="form-control border-warning" id="animalType" name="fosterpet_type" required  readonly="readonly">
                        <option value="{{ $Fosterlist->pet_type}}">{{ $Fosterlist->pet_type}}</option>
                    </select>
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label class="control-label  p-2" for="animalVariety">品種 <span class="danger" >不可更改</span></label>
                    <select class="form-control border-warning" id="animalVariety" name="fosterVariety" required readonly="readonly">
                        <option id="selectVariety">{{ $Fosterlist->pet_variety }}</option>
                    </select>
                </div>
                <div class="form-group col-12 col-sm-6" {{ $Fosterlist->pet_type == '狗' ? '' : 'hidden' }}>
                    <label class="control-label  p-2" for="animalbodytype">體型 <span class="danger" >必填</span></label>
                    <select class="form-control border-warning" id="animalbodytype" name="fosterBody" required >
                        <option {{ $Fosterlist->pet_bodytype == '小型' ? 'selected' : '' }} value="小型">小型</option>
                        <option {{ $Fosterlist->pet_bodytype == '中型' ? 'selected' : '' }} value="中型">中型</option>
                        <option {{ $Fosterlist->pet_bodytype == '大型' ? 'selected' : '' }} value="大型">大型</option>
                        <option {{ $Fosterlist->pet_type != '狗' ? 'selected' : 'hidden' }} value=""></option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6">
                    <label class="control-label  p-2" for="animalNickName">動物暱稱 <span
                            class="danger">必填</span></label>
                    <input class="form-control border-warning" id="animalNickName" type="text" autocomplete="off" required name="fosterNickName" value="{{ $Fosterlist->pet_name }}">
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label class="control-label  p-2" for="animalAge">年紀 <span class="danger">必填</span></label>
                    <select class="form-control border-warning" id="animalAge" name="fosterAge" required>
                        {{-- <option value="">{{ $Fosterlist->pet_age }}</option> --}}
                        <option value="1歲以下" {{ $Fosterlist->pet_age == '1歲以下' ? 'selected' : '' }}>1歲以下</option>
                        <option value="1～3歲" {{ $Fosterlist->pet_age == '1～3歲' ? 'selected' : '' }}>1～3歲</option>
                        <option value="3～6歲" {{ $Fosterlist->pet_age == '3～6歲' ? 'selected' : '' }}>3～6歲</option>
                        <option value="6～10歲" {{ $Fosterlist->pet_age == '6～10歲' ? 'selected' : '' }}>6～10歲</option>
                        <option value="10歲以上" {{ $Fosterlist->pet_age == '10歲以上' ? 'selected' : '' }}>10歲以上</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class=" col-12 col-sm-12 col-md-6 d-flex align-items-center pt-2">
                    <label class="control-label mb-0 mr-3  p-2" for="animalMale">性別 <span
                            class="danger">必填</span></label>
                    <span class="form-check  mr-3">
                        <input class="form-check-input " id="animalMale" type="radio" value="公" name="fostergender" {{ $Fosterlist->pet_gender == '公' ? 'checked' : '' }}>
                        <label class="form-check-label" for="animalMale">公</label>
                    </span>
                    <span class="form-check ">
                        <input class="form-check-input " id="animalGirl" type="radio" value="母" name="fostergender" {{ $Fosterlist->pet_gender == '母' ? 'checked' : '' }}>
                        <label class="form-check-label" for="animalGirl" >母</label>
                    </span>
                </div>

                <div class=" col-12 col-sm-12 col-md-6 d-flex align-items-center pt-2">
                    <label class="control-label mb-0 mr-3  p-2" for="animalLigation">是否結紮 <span class="danger">必填</span></label>
                    <span class="form-check  mr-3">
                        <input class="form-check-input " id="animalLigation" type="radio" value="是" name="fosterLigation" {{ $Fosterlist->pet_ligation == '是' ? 'checked' : '' }}>
                        <label class="form-check-label" for="animalLigation">是</label>
                    </span>
                    <span class="form-check ">
                        <input class="form-check-input " id="animalNoligation" type="radio" value="否" name="fosterLigation" {{ $Fosterlist->pet_ligation == '否' ? 'checked' : '' }}>
                        <label class="form-check-label" for="animalNoligation">否</label>
                    </span>
                </div>
            </div>
            <hr>

            <div class="form-group ">
                <div>
                    <label class="control-label  p-2" for="animalNote">其他說明</label>
                    <p style="font-size: 10px;color: red;" class="pl-2">建議填寫照顧注意事項、其他健康狀況等補充說明。</p>
                    <textarea class="form-control border-warning" rows="6" id="animalNote" name="fosterNote" required
                        value="">{{ $Fosterlist->introduction }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12 col-sm-6">
                    <label class="control-label  p-2" for="animalCity">所在地 <span class="danger">必填</span></label>
                    <select id="animalCity"  class=" mb-2 form-select" aria-label="Default select example" required name="fosterCity">
                        <option value="" style="display: none;">請選擇</option>
                        <option value="台北市" {{ $Fosterlist->pet_city == '台北市' ? 'selected' : '' }}>台北市</option>
                        <option value="新北市" {{ $Fosterlist->pet_city == '新北市' ? 'selected' : '' }}>新北市</option>
                        <option value="基隆市"{{ $Fosterlist->pet_city == '基隆市' ? 'selected' : '' }}>基隆市</option>
                        <option value="桃園市"{{ $Fosterlist->pet_city == '桃園市' ? 'selected' : '' }}>桃園市</option>
                        <option value="新竹市"{{ $Fosterlist->pet_city == '新竹市' ? 'selected' : '' }}>新竹市</option>
                        <option value="新竹縣"{{ $Fosterlist->pet_city == '新竹縣' ? 'selected' : '' }}>新竹縣</option>
                        <option value="苗栗縣"{{ $Fosterlist->pet_city == '苗栗縣' ? 'selected' : '' }}>苗栗縣</option>
                        <option value="台中市"{{$Fosterlist->pet_city == '台中市' ? 'selected' : '' }}>台中市</option>
                        <option value="彰化縣"{{ $Fosterlist->pet_city == '彰化縣' ? 'selected' : '' }}>彰化縣</option>
                        <option value="南投縣"{{ $Fosterlist->pet_city == '南投縣' ? 'selected' : '' }}>南投縣</option>
                        <option value="雲林縣"{{ $Fosterlist->pet_city == '雲林縣' ? 'selected' : '' }}>雲林縣</option>
                        <option value="嘉義市"{{ $Fosterlist->pet_city == '嘉義市' ? 'selected' : '' }}>嘉義市</option>
                        <option value="嘉義縣"{{ $Fosterlist->pet_city == '嘉義縣' ? 'selected' : '' }}>嘉義縣</option>
                        <option value="台南市"{{ $Fosterlist->pet_city == '台南市' ? 'selected' : '' }}>台南市</option>
                        <option value="高雄市"{{ $Fosterlist->pet_city == '高雄市' ? 'selected' : '' }}>高雄市</option>
                        <option value="屏東縣"{{ $Fosterlist->pet_city == '屏東縣' ? 'selected' : '' }}>屏東縣</option>
                        <option value="宜蘭縣"{{ $Fosterlist->pet_city == '宜蘭縣' ? 'selected' : '' }}>宜蘭縣</option>
                        <option value="花蓮縣"{{ $Fosterlist->pet_city == '花蓮縣' ? 'selected' : '' }}>花蓮縣</option>
                        <option value="台東縣"{{ $Fosterlist->pet_city == '台東縣' ? 'selected' : '' }}>台東縣</option>
                        <option value="澎湖縣"{{ $Fosterlist->pet_city == '澎湖縣' ? 'selected' : '' }}>澎湖縣</option>
                        <option value="金門縣"{{ $Fosterlist->pet_city == '金門縣' ? 'selected' : '' }}>金門縣</option>
                        <option value="馬祖縣"{{$Fosterlist->pet_city == '馬祖縣' ? 'selected' : '' }}>馬祖縣</option>
                    </select>
                </div>
            </div>

            <div class="pb-5">

                <label class="control-label  p-2" for="animalImg">照片上傳 <span class="danger">必填</span></label>
                <div class="upload-content">
                    <div class="content-img">
                        <ul class="content-img-list">
                        </ul>
                        @foreach ($Fosterlist->pic as $key => $item)
                        <div id="file{{$key}}" class="file">
                            <input type="file" name="uploadImg[]" id="uploadImg{{$key}}" accept="image/*" multiple
                                onchange="changeImg()">
                            <img src="/images/{{ $item }}" alt="寵物照片"
                                style="width:160px; border-radius:13%;height:136px;" style="position: relative; 
                                    width: 100%">
                            <h6 style="position: absolute;bottom:47px;left:15px;width: 100%;color:white;">點擊可上傳新圖片</h6>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="pb-5 text-center">
            <a href="/index/fosterinformation" class="sumbit-c" style="margin-right: 1.5rem;text-decoration:none;">返回</a>
            <input hidden value="{{$Fosterlist->pk}}" name="ppk">
            <button type="submit" class="sumbit-c" style="text-decoration:none;">更新</button>
        </div>
    </form>
<form method="POST" action="/viewwantpetlist" class="text-center ">
    @csrf
    <input hidden value="{{$Fosterlist->pk}}" name="ppk">
    <button type="submit" class="sumbit-c" style="text-decoration:none;">查看領養申請</button>
</form>
    <script src="/layout/js/jquery-3.4.1.js"></script>
    <script src="/foster/js/wantfoster.js"></script>

@endsection
