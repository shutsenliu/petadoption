@extends('layout.master')

@section('head')
    <title>領養系統</title>
    <link rel="stylesheet" href="/foster/css/wantadopt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>
@endsection

@section('content')
        <div class="container">

            <!-- 各動物篩選條件 -->
            <div class="p-5">
                <div class="filter p-6">
                    <div class="row  align-items-end">
                        <!-- 所在地 -->
                        <div class="form-group col-12 col-md-3">
                            <label class="control-label " for="animalCity">所在地</label>
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
                        <!-- 動物種類 -->
                        <div class="form-group col-12 col-md-3">
                            <label class="control-label " for="animalType">動物種類</label>
                            <select class="form-control border-warning" id="animalType" onchange="changeVariety()"
                                name="Type" required>
                                <option value="">請選擇</option>
                                <option value="狗">狗</option>
                                <option value="貓">貓</option>
                                <option value="其他">其他</option>
                            </select>
                        </div>
                        <!-- 品種 -->
                        <div class="form-group col-12 col-md-3">
                            <label class="control-label  p-2" for="animalVariety">品種</label>
                            <select class="form-control border-warning" id="animalVariety"
                                onchange="console.log($('#animalVariety').val())" name="Variety" required>
                                <option id="selectVariety">請選擇</option>
                            </select>
                        </div>
                        <!-- 性別 -->
                        <div class="form-group col-12 col-md-2">
                            <label class="control-label  p-2" for="animalMale">性別</label>
                            <select class="form-control border-warning" id="animalMale" name="Male" required>
                                <option value="">請選擇</option>
                                <option value="公">公</option>
                                <option value="母">母</option>
                            </select>
                        </div>
                        <!-- 查詢按鈕 -->
                        <div class="form-group col-12 col-md-1   d-flex d-md-block justify-content-center pt-5 pt-md-0">
                            <input type="submit" id="inpCheckbox" onclick="btnn()" value="查詢" class="sumbit-c">
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- 刊登送養動物清單 -->
            <div class="row row-cols-1 row-cols-md-3 g-4 card-color">
            @foreach ($fosterList as $foster)
            <div class="col">
                    <div class="card h-100">
                        <div class="overflow-hidden">
                            <img src="/foster/images/{{$foster->pic}}" 
                            class="card-img-top prd-card-img object-fit img--scale" alt="">
                        </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{$foster->pet_name}}</h5>
                                <p class="card-text">
                                    {{$foster->pet_city}}/{{$foster->pet_type}}/{{$foster->pet_variety}}/{{$foster->pet_gender}}</p>
                                <button class="button button1" type="submit" 
                                     onclick="petDetail({{$foster->pk}})"><span>查看詳細內容</span></button>
                            
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>





        <!-- 彈跳視窗觸發1 -->
        <div class="modal fade card-color" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">🧾動物資訊欄</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body card-color">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active button4 button5" id="nav-pet-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-pet" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true"><span>簡介</span></button>
                            <button class="nav-link button4 button5" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false"><span>領養</span></button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-pet" role="tabpanel"
                            aria-labelledby="nav-pet-tab">
                            <div class="container-fluid">
                                <div class="row ">
                                    <div class="col-md-7">
                                        <div class="wrapper overflow-hidden">
                                            <div class="swiper-container gallery-top">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide img-fluid"
                                                        style="background-image:url('/foster/img/dog.jpg')">
                                                    </div>
                                                    <div class="swiper-slide img-fluid" class="swiper-slide"
                                                        style="background-image:url('/foster/img/dog1.jpg')">
                                                    </div>
                                                    <div class="swiper-slide img-fluid" class="swiper-slide"
                                                        style="background-image:url('/foster/img/dog2.jpg')"></div>
                                                </div>
                                            </div>
                                            <div class="swiper-container gallery-thumbs">
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 Information-field mt-2 ">
                                        <h5 class="text-center mt-3">暱稱</h5>
                                        <hr>
                                        <p>所在地：</p>
                                        <p>種類：</p>
                                        <p>品種：</p>
                                        <p>體型：</p>
                                        <p>年紀：</p>
                                        <p>性別：</p>
                                        <p>是否結紮：</p>
                                    </div>
                                </div>
                                <div class="illustrate mt-3 mb-2 ">
                                    <p>💬其他說明： </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="./form.php" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 col-sm-6">
                                        <label class="control-label  p-2" for="userName">會員暱稱</label>
                                        <input class="form-control border-warning" id="userName" type="text"
                                            autocomplete="off" required name="Name" disabled>
                                    </div>
                                    <div class="form-group col-12 col-sm-6">
                                        <label class="control-label  p-2" for="userEmail">Email</label>
                                        <input class="form-control border-warning" id="userEmail" type="text"
                                            autocomplete="off" required name="Email" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-sm-6">
                                        <label class="control-label  p-2" for="userTel">手機 <span
                                                class="danger">必填</span></label>
                                        <input class="form-control border-warning" id="userTel" type="tel"
                                            autocomplete="off" required name="Tel">
                                    </div>
                                    <div class="form-group col-12 col-sm-6">
                                        <label class="control-label  p-2" for="userDate">生日</label>
                                        <input class="form-control border-warning" id="userDate" type="text"
                                            autocomplete="off" required name="Date" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-sm-6">
                                        <label class="control-label  p-2" for="userCity">居住地區</label>
                                        <input class="form-control border-warning" id="userCity" type="text"
                                            autocomplete="off" required name="City" disabled>
                                    </div>
                                    <div class="form-group col-12 col-sm-6">
                                        <label class="control-label  p-2" for="userProfession">職業</label>
                                        <input class="form-control border-warning" id="userProfession" type="text"
                                            autocomplete="off" required name="Profession" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-12 col-sm-12 col-md-6 ">
                                        <label class="control-label p-2" for="userReason">領養原因 <span
                                                class="danger">必填</span></label>
                                        <span class="form-check  mr-3">
                                            <input class="form-check-input " id="userReason" checked type="radio"
                                                value="單純想養寵物" name="Reason" onclick="lock(true)">
                                            <label class="form-check-label" for="userReason">單純想養寵物</label>
                                        </span>
                                        <span class="form-check  mr-3">
                                            <input class="form-check-input " id="userReason2" type="radio"
                                                value="想要多一個人陪伴" name="Reason" onclick="lock(true)">
                                            <label class="form-check-label" for="userReason2">想要多一個人陪伴</label>
                                        </span>
                                        <span class="form-check  mr-3">
                                            <input class="form-check-input " id="userReason3" type="radio"
                                                value="情侶想要一起養寵物" name="Reason" onclick="lock(true)">
                                            <label class="form-check-label" for="userReason3">情侶想要一起養寵物</label>
                                        </span>
                                        <span class="form-check  mr-3">
                                            <input class="form-check-input " id="userReason5" type="radio" value=""
                                                name="Reason" onclick="lock(false)">
                                            <label class="form-check-label" for="userReason5">其他</label>
                                        </span>
                                        <div id='select_else'></div>
                                    </div>
                                </div>
   
                                <!-- 提交表單 -->
                                <div class="pb-5 text-center ">
                                    <input type="submit" value="提交表單" class="sumbit2-c">
                                </div>
                          </div>



                    </div>
                    </form>

                </div>
            </div>

            

      


        </div>
        </div>
	<script src="/foster/js/jquery-3.4.1.js"></script>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
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