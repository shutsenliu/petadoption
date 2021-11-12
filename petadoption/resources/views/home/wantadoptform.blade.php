@extends('layout.master')

@section('head')
    <title>領養系統</title>
    <link rel="stylesheet" href="/foster/css/wantadoptform.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
@endsection

@section('content')
    <!-- 內文 -->
    <div class="container p-5">
        <div class="row d-flex justify-content-around align-items-center introduce">
            <div class="col-12 col-sm-6 ">
                <div class="wrapper overflow-hidden">
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide img-fluid"
                                style="background-image:url('/images/{{ $fosterList->pic[0] }}')">
                            </div>
                            <div class="swiper-slide img-fluid" class="swiper-slide"
                                style="background-image:url('/images/{{ $fosterList->pic[1] }}')">
                            </div>
                            <div class="swiper-slide img-fluid" class="swiper-slide"
                                style="background-image:url('/images/{{ $fosterList->pic[2] }}')">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" style="background-image:url('/images/{{ $fosterList->pic[0] }}')">
                            </div>
                            <div class="swiper-slide" style="background-image:url('/images/{{ $fosterList->pic[1] }}')">
                            </div>
                            <div class="swiper-slide" style="background-image:url('/images/{{ $fosterList->pic[2] }}')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 Information-field  justify-content-around align-items-center">
                <h3 class="text-center pt-2"><b>{{ $fosterList->pet_name }}</b></h3>
                <hr>
                <h5><b>所在地：{{ $fosterList->pet_city }}</b></h5></br>
                <div class="row">
                    <h5 class="col-sm-5"><b>種類：{{ $fosterList->pet_type }}</b></h5>
                    <h5 class="col-sm-7"><b>品種：{{ $fosterList->pet_variety }}</b></h5>
                </div></br>
                <div class="row">
                    <h5 class="col-sm-5"><b>體型：{{ $fosterList->pet_bodytype }}</b></h5>
                    <h5 class="col-sm-7"><b>年紀：{{ $fosterList->pet_age }}</b></h5>
                </div></br>
                <div class="row">
                    <h5 class="col-sm-5"><b>性別：{{ $fosterList->pet_gender }}</b></h5>
                    <h5 class="col-sm-7"><b>是否結紮：{{ $fosterList->pet_ligation }}</b></h5>
                </div></br>
                <hr>
                <h5><b>💬其他說明：{{ $fosterList->introduction }}</b></h5>
            </div>
            <h1 class="text-center p-5"><b>填寫領養表單</b></h1>
            <form action="/wantadoptform/{a}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="userName">會員暱稱</label>
                        <input class="form-control border-warning" id="userName" type="text" value="{{ $member->name }}"
                            autocomplete="off" required name="Name" disabled>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="userEmail">Email</label>
                        <input class="form-control border-warning" id="userEmail" type="text"
                            value="{{ $member->email }}" autocomplete="off" required name="Email" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="userTel">手機 <span class="danger">必填</span></label>
                        <input class="form-control border-warning" id="userTel" type="tel" autocomplete="off" required
                            name="Tel">
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="userDate">生日</label>
                        <input class="form-control border-warning" id="userDate" type="text" value="{{ $member->birth }}"
                            autocomplete="off" required name="Date" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="userCity">居住地區</label>
                        <input class="form-control border-warning" id="userCity" type="text" value="{{ $member->city }}"
                            autocomplete="off" required name="City" disabled>
                    </div>
                    <div class="form-group col-12 col-sm-6">
                        <label class="control-label  p-2" for="userProfession">職業</label>
                        <input class="form-control border-warning" id="userProfession" type="text"
                            value="{{ $member->job }}" autocomplete="off" required name="Profession" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class=" col-12 col-sm-12 col-md-6 ">
                        <label class="control-label p-2" for="userReason">領養原因 <span
                                class="danger">必填</span></label>
                        <span class="form-check  mr-3">
                            <input class="form-check-input " id="userReason" checked type="radio" value="單純想養寵物"
                                name="Reason" onclick="lock(true)">
                            <label class="form-check-label" for="userReason">單純想養寵物</label>
                        </span>
                        <span class="form-check  mr-3">
                            <input class="form-check-input " id="userReason2" type="radio" value="想要多一個人陪伴" name="Reason"
                                onclick="lock(true)">
                            <label class="form-check-label" for="userReason2">想要多一個人陪伴</label>
                        </span>
                        <span class="form-check  mr-3">
                            <input class="form-check-input " id="userReason3" type="radio" value="情侶想要一起養寵物" name="Reason"
                                onclick="lock(true)">
                            <label class="form-check-label" for="userReason3">情侶想要一起養寵物</label>
                        </span>
                        <span class="form-check  mr-3">
                            <input class="form-check-input " id="userReason5" type="radio" value="" name="Reason"
                                onclick="lock(false)">
                            <label class="form-check-label" for="userReason5" required>其他</label>
                        </span>
                        <div id='select_else'></div>
                    </div>
                </div>
                <!-- 提交表單 -->
                <div class=" text-center ">
                    @if (isset($repeatfosterpk))
                        <p>您已領養過此寵物</p>
                        <button type="submit" class="sumbit2-c" disabled>提交</button>
                    @else
                        <input type="hidden" name="fosterpk" value="{{ $fosterList->pk }}">
                        <button type="submit" class="sumbit2-c">提交</button>
                    @endif

                </div>
            </form>
        </div>
    </div>
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
