@extends('layout.master')

@section('head')
    <title>領養系統</title>
    <link rel="stylesheet" href="/foster/css/wantadopt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

@endsection

@section('content')
    <div class="container">
        <form action="/fosterlist" method="post">
            @csrf
            <!-- 各動物篩選條件 -->
            <div class="p-5">
                <div class="filter p-6 card2">
                    <div class="row  align-items-end">
                        <!-- 所在地 -->
                        <div class="form-group col-12 col-md-3">
                            <label class="control-label  p-2" for="animalCity">所在地</label>
                            <select class="form-control border-warning" id="animalCity" name="City">
                                <option value="">請選擇</option>
                                <option value="台北市" {{ $cityvalue == '台北市' ? 'selected' : '' }}>台北市</option>
                                <option value="新北市" {{ $cityvalue == '新北市' ? 'selected' : '' }}>新北市</option>
                                <option value="桃園市" {{ $cityvalue == '桃園市' ? 'selected' : '' }}>桃園市</option>
                                <option value="台中市" {{ $cityvalue == '台中市' ? 'selected' : '' }}>台中市</option>
                                <option value="台南市" {{ $cityvalue == '台南市' ? 'selected' : '' }}>台南市</option>
                                <option value="高雄市" {{ $cityvalue == '高雄市' ? 'selected' : '' }}>高雄市</option>
                                <option value="基隆市" {{ $cityvalue == '基隆市' ? 'selected' : '' }}>基隆市</option>
                                <option value="新竹市" {{ $cityvalue == '新竹市' ? 'selected' : '' }}>新竹市</option>
                                <option value="嘉義市" {{ $cityvalue == '嘉義市' ? 'selected' : '' }}>嘉義市</option>
                                <option value="宜蘭縣" {{ $cityvalue == '宜蘭縣' ? 'selected' : '' }}>宜蘭縣</option>
                                <option value="花蓮縣" {{ $cityvalue == '花蓮縣' ? 'selected' : '' }}>花蓮縣</option>
                                <option value="台東縣" {{ $cityvalue == '台東縣' ? 'selected' : '' }}>台東縣</option>
                                <option value="澎湖縣" {{ $cityvalue == '澎湖縣' ? 'selected' : '' }}>澎湖縣</option>
                                <option value="屏東縣" {{ $cityvalue == '屏東縣' ? 'selected' : '' }}>屏東縣</option>
                                <option value="嘉義縣" {{ $cityvalue == '嘉義縣' ? 'selected' : '' }}>嘉義縣</option>
                                <option value="雲林縣" {{ $cityvalue == '雲林縣' ? 'selected' : '' }}>雲林縣</option>
                                <option value="南投縣" {{ $cityvalue == '南投縣' ? 'selected' : '' }}>南投縣</option>
                                <option value="彰化縣" {{ $cityvalue == '彰化縣' ? 'selected' : '' }}>彰化縣</option>
                                <option value="苗栗縣" {{ $cityvalue == '苗栗縣' ? 'selected' : '' }}>苗栗縣</option>
                                <option value="馬祖縣" {{ $cityvalue == '馬祖縣' ? 'selected' : '' }}>馬祖縣</option>
                                <option value="金門縣" {{ $cityvalue == '金門縣' ? 'selected' : '' }}>金門縣</option>
                                <option value="新竹縣" {{ $cityvalue == '新竹縣' ? 'selected' : '' }}>新竹縣</option>
                            </select>
                        </div>
                        <!-- 動物種類 -->
                        <div class="form-group col-12 col-md-3">
                            <label class="control-label  p-2" for="animalType">動物種類</label>
                            <select class="form-control border-warning" id="animalType" onchange="changeVariety()"
                                name="Type">
                                <option value="">請選擇</option>
                                <option value="狗" {{ $typevalue == '狗' ? 'selected' : '' }}>狗</option>
                                <option value="貓" {{ $typevalue == '貓' ? 'selected' : '' }}>貓</option>
                                <option value="其他" {{ $typevalue == '其他' ? 'selected' : '' }}>其他</option>
                            </select>
                        </div>
                        <!-- 品種 -->
                        <div class="form-group col-12 col-md-3">
                            <label class="control-label  p-2" for="animalVariety">品種</label>
                            <select class="form-control border-warning" id="animalVariety"
                                onchange="console.log($('#animalVariety').val())" name="Variety">
                                @if ($typevalue == '狗')
                                    <option value="">請選擇</option>
                                    <option value="混種" {{ $varietyvalue == '混種' ? 'selected' : '' }}>混種</option>
                                    <option value="米格魯" {{ $varietyvalue == '米格魯' ? 'selected' : '' }}>米格魯</option>
                                    <option value="馬爾濟斯" {{ $varietyvalue == '馬爾濟斯' ? 'selected' : '' }}>馬爾濟斯</option>
                                    <option value="博美" {{ $varietyvalue == '博美' ? 'selected' : '' }}>博美</option>
                                    <option value="柴犬" {{ $varietyvalue == '柴犬' ? 'selected' : '' }}>柴犬</option>
                                    <option value="拉不拉多" {{ $varietyvalue == '拉不拉多' ? 'selected' : '' }}>拉不拉多</option>
                                    <option value="臘腸" {{ $varietyvalue == '臘腸' ? 'selected' : '' }}>臘腸</option>
                                    <option value="吉娃娃" {{ $varietyvalue == '吉娃娃' ? 'selected' : '' }}>吉娃娃</option>
                                    <option value="其他" {{ $varietyvalue == '其他' ? 'selected' : '' }}>其他</option>
                                @elseif ($typevalue == '貓')
                                    <option value="">請選擇</option>
                                    <option value="混種" {{ $varietyvalue == '混種' ? 'selected' : '' }}>混種</option>
                                    <option value="金吉拉" {{ $varietyvalue == '金吉拉' ? 'selected' : '' }}>金吉拉</option>
                                    <option value="俄羅斯藍貓" {{ $varietyvalue == '俄羅斯藍貓' ? 'selected' : '' }}>俄羅斯藍貓</option>
                                    <option value="英國藍貓" {{ $varietyvalue == '英國藍貓' ? 'selected' : '' }}>英國藍貓</option>
                                    <option value="加菲貓" {{ $varietyvalue == '加菲貓' ? 'selected' : '' }}>加菲貓</option>
                                    <option value="折耳貓" {{ $varietyvalue == '折耳貓' ? 'selected' : '' }}>折耳貓</option>
                                    <option value="波斯" {{ $varietyvalue == '波斯' ? 'selected' : '' }}>波斯</option>
                                    <option value="短毛" {{ $varietyvalue == '短毛' ? 'selected' : '' }}>短毛</option>
                                @else
                                    <option value="">請選擇</option>
                                    <option value="鳥類" {{ $varietyvalue == '鳥類' ? 'selected' : '' }}>鳥類</option>
                                    <option value="寵物鼠" {{ $varietyvalue == '寵物鼠' ? 'selected' : '' }}>寵物鼠</option>
                                    <option value="寵物兔" {{ $varietyvalue == '寵物兔' ? 'selected' : '' }}>寵物兔</option>
                                    <option value="陸龜" {{ $varietyvalue == '陸龜' ? 'selected' : '' }}>陸龜</option>
                                    <option value="觀賞魚" {{ $varietyvalue == '觀賞魚' ? 'selected' : '' }}>觀賞魚</option>
                                    <option value="其他" {{ $varietyvalue == '其他' ? 'selected' : '' }}>其他</option>
                                @endif
                            </select>
                        </div>
                        <!-- 性別 -->
                        <div class="form-group col-12 col-md-2">
                            <label class="control-label  p-2" for="animalMale">性別</label>
                            <select class="form-control border-warning" id="animalMale" name="Male">
                                <option value="">請選擇</option>
                                <option value="公" {{ $gendervalue == '公' ? 'selected' : '' }}>公</option>
                                <option value="母" {{ $gendervalue == '母' ? 'selected' : '' }}>母</option>
                            </select>
                        </div>
                        <!-- 查詢按鈕 -->
                        <div class="form-group col-12 col-md-1   d-flex d-md-block justify-content-center pt-5 pt-md-0 ">
                            <input type="submit" id="inpCheckbox" onclick="btnn()" value="查詢" class="sumbit-c">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- 刊登送養動物清單 -->
        <div class="row row-cols-1 row-cols-md-3 g-4 card-color">
            @foreach ($fosterList as $foster)
                <div class="col d-flex justify-content-around">
                    <div class="card h-100" style="background-color:#f5eadf;width:350px;height:300px;">
                        <div class="overflow-hidden ">
                            <img src="/images/{{ $foster->pic[0] }}"
                                class="card-img-top prd-card-img object-fit img--scale imgimg2" alt="">
                        </div>

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $foster->pet_name }}</h5>
                            <p class="card-text">
                                {{ $foster->pet_city }}/{{ $foster->pet_type }}/{{ $foster->pet_variety }}/{{ $foster->pet_gender }}
                            </p>
                            <button class="button button1 btn_k btn-k1 btn-sm" type="submit" data-bs-toggle="modal"
                                data-bs-target="#petDetail{{ $foster->pk }}"><span>查看詳細內容</span></button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>





    <!-- 彈跳視窗觸發1 -->
    @foreach ($fosterList as $foster)
        <div class="modal fade card-color" id="petDetail{{ $foster->pk }}" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">🧾動物資訊欄</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body card-color">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-pet" role="tabpanel"
                                aria-labelledby="nav-pet-tab">
                                <div class="container-fluid">
                                    <div class="row ">
                                        <div class="col-md-7">
                                            <div class="wrapper overflow-hidden">
                                                <div class="swiper-container gallery-top">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide img-fluid b-radius"
                                                            style="background-image:url('/images/{{ $foster->pic[0] }}')">
                                                        </div>
                                                        <!-- <div class="swiper-slide img-fluid" class="swiper-slide"
                                                                                                style="background-image:url('./foster/img/dog1.jpg')">
                                                                                            </div>
                                                                                            <div class="swiper-slide img-fluid" class="swiper-slide"
                                                                                                style="background-image:url('./foster/img/dog2.jpg')">
                                                                                            </div> -->
                                                    </div>
                                                </div>
                                                <!-- <div class="swiper-container gallery-thumbs">
                                                                                    <div class="swiper-wrapper">
                                                                                        <div class="swiper-slide"
                                                                                            style="background-image:url('/foster/img/dog.jpg')">
                                                                                        </div>
                                                                                        <div class="swiper-slide"
                                                                                            style="background-image:url('/foster/img/dog1.jpg')">
                                                                                        </div>
                                                                                        <div class="swiper-slide"
                                                                                            style="background-image:url('/foster/img/dog2.jpg')"></div>
                                                                                    </div>
                                                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-md-5 Information-field">
                                            <h5 class="text-center mt-3">{{ $foster->pet_name }}</h5>
                                            <hr>
                                            <p>所在地：{{ $foster->pet_city }}</p>
                                            <p>種類：{{ $foster->pet_type }}</p>
                                            <p>品種：{{ $foster->pet_variety }}</p>
                                            <p>體型：{{ $foster->pet_bodytype }}</p>
                                            <p>年紀：{{ $foster->pet_age }}</p>
                                            <p>性別：{{ $foster->pet_gender }}</p>
                                            <p>是否結紮：{{ $foster->pet_ligation }}</p>
                                        </div>
                                    </div>
                                    <div class="illustrate mt-3 mb-2 ">
                                        <p>💬其他說明：{{ $foster->introduction }} </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </form>

                    </div>
                    <div class="modal-footer  card-color">
                        <form action="/wantadoptform/{{ $foster->pk }}">
                            <input type="text" class='d-none'>

                            {{-- 假設是會員自己刊登的資料，則無法領養 --}}
                            @if ($userpk == $foster->member_fk)
                                <button type="submit" class="sumbit-c button1 btn_k btn-k1" disabled>領養go</button>
                            @else
                            <button type="submit" class="sumbit-c button1 btn_k btn-k1">領養go</button>
                            @endif
                            {{-- 假設會員已領養過，則無法再送出申請 --}}
                            @foreach ($adoptList as $adopt)
                                @if ($adopt->fosterlist_fk == $foster->pk)
                                <input type="hidden" name="repeatfosterpk" value="{{$adopt->fosterlist_fk}}">
                                @endif
                            @endforeach

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script src="/foster/js/jquery-3.4.1.js"></script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>
    <script type="module">
        import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'
        const swiper = new Swiper('.gallery-top', {
            spaceBetween: 10,
            thumbs: {
                swiper: {
                    el: '.gallery-thumbs',
                    spaceBetween: 3,
                    slidesPerView: 3,
                    freeMode: true,
                },
            },
        });
    </script>

    <script src="/foster/js/wantadopt.js"></script>
@endsection
