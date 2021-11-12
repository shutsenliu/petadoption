@extends('layout.master')

@section('head')
    <title>刊登系統</title>
    <link rel="stylesheet" href="/foster/css/wantfoster.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('content')
        <!-- 內文 -->
        <div>
            <h1 class="text-center tt pt-5 pb-5 title-c">填寫表單</h1>
        </div>
        <!-- 刊登表單 -->
        <form method="post" action="/fosterlist/create" enctype="multipart/form-data">
        @csrf
            <div class="container border-5-radius pt-5 pl-5 pr-5 mb-5">
                <div class="row ">
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="animalType">動物種類 <span class="danger">必填</span></label>
                        <select class="form-control border-warning" id="animalType" onchange="changeVariety()"
                            name="Type" required>
                            <option value="">請選擇</option>
                            <option value="狗">狗</option>
                            <option value="貓">貓</option>
                            <option value="其他">其他</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="animalVariety">品種 <span class="danger">必填</span></label>
                        <select class="form-control border-warning" id="animalVariety"
                            onchange="console.log($('#animalVariety').val())" name="Variety" required>
                            <option id="selectVariety">請選擇</option>
                        </select>
                    </div>

                </div>
                <div class="row" id="dogSelect">

                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label class="control-label  p-2" for="animalNickName">動物暱稱 <span
                                class="danger">必填</span></label>
                        <input class="form-control border-warning" id="animalNickName" type="text" autocomplete="off"
                            required name="NickName">
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="animalAge">年紀 <span class="danger">必填</span></label>
                        <select class="form-control border-warning" id="animalAge" name="Age" required>
                            <option value="">請選擇</option>
                            <option value="1歲以下">1歲以下</option>
                            <option value="1～3歲">1～3歲</option>
                            <option value="3～6歲">3～6歲</option>
                            <option value="6～10歲">6～10歲</option>
                            <option value="10歲以上">10歲以上</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-12 col-sm-12 col-md-6 d-flex align-items-center pt-2">
                        <label class="control-label mb-0 mr-3  p-2" for="animalMale">性別 <span
                                class="danger">必填</span></label>
                        <span class="form-check  mr-3">
                            <input class="form-check-input " id="animalMale" checked type="radio" value="公" name="Male">
                            <label class="form-check-label" for="animalMale">公</label>
                        </span>
                        <span class="form-check ">
                            <input class="form-check-input " id="animalGirl" type="radio" value="母" name="Male">
                            <label class="form-check-label" for="animalGirl">母</label>
                        </span>
                    </div>

                    <div class=" col-12 col-sm-12 col-md-6 d-flex align-items-center pt-2">
                        <label class="control-label mb-0 mr-3  p-2" for="animalLigation">是否結紮 <span
                                class="danger">必填</span></label>
                        <span class="form-check  mr-3">
                            <input class="form-check-input " id="animalLigation" checked type="radio" value="是"
                                name="Ligation">
                            <label class="form-check-label" for="animalLigation">是</label>
                        </span>
                        <span class="form-check ">
                            <input class="form-check-input " id="animalNoligation" type="radio" value="否"
                                name="Ligation">
                            <label class="form-check-label" for="animalNoligation">否</label>
                        </span>
                    </div>
                </div>
                <hr>

                <div class="form-group ">
                    <div>
                        <label class="control-label  p-2" for="animalNote">其他說明</label>
                        <p style="font-size: 10px;color: red;" class="pl-2">建議填寫照顧注意事項、其他健康狀況等補充說明。</p>
                        <textarea class="form-control border-warning" rows="6" id="animalNote" name="Note"
                            required></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="animalCity">所在地 <span class="danger">必填</span></label>
                        <select class="form-control border-warning" id="animalCity" name="City" required>
                            <option value="">請選擇</option>
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
                </div>

                <div class="pb-5">

                    <label class="control-label  p-2" for="animalImg">照片上傳 <span class="danger">必填</span></label>
                    <div class="upload-content">
                        <div class="content-img">
                            <ul class="content-img-list">
                            </ul>
                            <div id="file0" class="file">
                                <i class="ico-plus"><b>點擊上傳圖片</b></i>
                                <input type="file" name="imageFile[]" id="uploadImg0" accept="image/*" multiple onchange="changeImg()">
                            </div>
                            <div id="file1" class="file" style="display: none">
                                <i class="ico-plus"><b>點擊上傳圖片</b></i>
                                <input type="file" name="imageFile[]" id="uploadImg1" accept="image/*" multiple onchange="changeImg()">
                            </div>
                            <div id="file2" class="file" style="display: none">
                                <i class="ico-plus"><b>點擊上傳圖片</b></i>
                                <input type="file" name="imageFile[]" id="uploadImg2" accept="image/*" multiple onchange="changeImg()">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- 下一步 -->
            <div class="pb-5 text-center ">
                <button type="submit" class="sumbit-c">送出</button>
            </div>
            </div>
        </form>
	<script src="/layout/js/jquery-3.4.1.js"></script>
    <script src="/foster/js/wantfoster.js"></script>
    
@endsection