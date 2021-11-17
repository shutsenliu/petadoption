@extends('layout.master')

@section('head')

    <style>
        textarea:focus,
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="time"]:focus,
        input[type="week"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="search"]:focus,
        input[type="tel"]:focus,
        input[type="color"]:focus,

        .uneditable-input:focus {
            border-color: #d0a98a;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.075) inset, 0 0 10px #d0a98a;
            outline: 0 none;
        }

        .form-select:focus {
            border-color: #d0a98a;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.075) inset, 0 0 10px #d0a98a;
            outline: 0 none;
        }

        .form-control:focus {
            border-color: #d0a98a;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.075) inset, 0 0 10px #d0a98a;
            outline: 0 none;
        }

    </style>
@endsection

@section('content')
    <div class="container py-4 px-lg-3">

        <header class="pt-3">
            <!-- 跑馬燈 -->
            <div class="h5 typing text-color-1">
                ＂請支持以領養代替購買＂
            </div>

            <!-- 輪播圖 -->
            <div id="carouselExampleControls" class="carousel slide pt-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/layout/img/c1.png" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="/layout/img/c2.png" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="/layout/img/c3.png" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </header>

        <!-- 關於 -->
        <main class="about-section2 pt-5" id="about">
            <div class="py-3">
                <p class="h3 mb-3 text-center text-color-1 text-a" style="font-weight: 600;">關於我們&nbsp<i
                        class="far fa-smile"></i></p>
                <div class="row mx-auto mb-4 py-5 justify-content-center">
                    <div class="card col-lg-11 px-5 py-5"
                        style="border-color: #f5eadf; border-width: 10px; background-color: #fdfaf600; border-radius: 3rem; border-style:dashed">
                        <div class="my-3 px-4 hideme">
                            <div class="h5 text-color-3 pb-1" style="font-weight: 600;">「浪愛可以被看見」</div>
                            <p class="text-color-4">
                                Pet Me Home是由喜愛動物的夥伴們共同開發的非營利線上送養平台，目的在於提供給所有需要送養、找主人的動物能有一個被看見及整合相關資訊的地方。
                            </p>
                        </div>

                        <div class="my-3 px-4 hideme">
                            <div class="h5 text-color-3 pb-1" style="font-weight: 600;"> 「浪我們一起回家」</div>
                            <p class="text-color-4">
                                流浪動物們努力在城市夾縫中生存，在流浪的日子裡，他們經受著悲傷。希望能藉由本平台讓更多的浪浪能找到溫暖的歸宿，也讓有意願領養動物的人都可以輕鬆的找到願意接納的寵物。
                            </p>
                        </div>

                        <div class="my-3 px-4 hideme">
                            <div class="h5 text-color-3 pb-1" style="font-weight: 600;">「浪行動從你我開始」 </div>
                            <p class="text-color-4 pb-3 mb-4">
                                如果您也喜愛動物，關懷生命，我們邀請您一同以行動來實踐「以領養代替購買&撲殺」的理念。當看到一個眼神從冷漠、悲傷轉變為熱情、快樂和信任時，會更加深刻地體會到愛與生命的價值。
                            </p>
                        </div>
                        <img class="img-fluid" src="/layout/img/about_pic.png">
                    </div>
                </div>
            </div>
        </main>

        <section class="container marketing">
            <div class="row mx-auto justify-content-center">
                <div class="col-md-6 pb-4">
                    <p class="h4 text-center text-color-1 text-b" style="font-weight: 600;"><i
                            class="fas fa-home"></i>&nbspPet Me
                        Home , Take Me Home&nbsp<i class="far fa-heart"></i></p>
                </div>
            </div>
            <!--貓狗圓圈照片三張-->
            <div class="row mx-auto mb-4 px-3 justify-content-center">

                <div class="col-lg-4 mx-auto justify-content-center text-center mt-4 mb-3 text-color-3">
                    <img width="220" height="220" src="/layout/img/s1.png" class="img-fluid mx-auto d-block rounded-circle">
                    <p class="h5 pt-4">愛牠，就不要棄養牠。</p>
                </div>

                <div class="col-lg-4 mx-auto justify-content-center text-center mt-4 mb-3 text-color-3">
                    <img width="220" height="220" src="/layout/img/s2.png" class="img-fluid mx-auto d-block rounded-circle">
                    <p class="h5 pt-4">盼望著能有個躲避風雨的地方。</p>
                </div>

                <div class="col-lg-4 mx-auto justify-content-center text-center mt-4 mb-3 text-color-3">
                    <img width="220" height="220" src="/layout/img/s3.png" class="img-fluid mx-auto d-block rounded-circle">
                    <p class="h5 pt-4">尋覓下一個會陪牠一生的伴。</p>
                </div>

            </div>

            <!-- 要套設定導轉至我要領養 -->
            <div class="justify-content-center py-3">
                <div class="text-center">
                    <a class="btn_k btn-k4" href="/fosterlist">前往領養&nbsp<i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
        </section>

        <!-- 平台特色 -->
        <section class="container marketing pt-5">
            <div class="row mx-auto justify-content-center">
                <div class="py-5">
                    <p class="h3 mb-3 text-center text-color-1 text-a" style="font-weight: 600;">平台特色&nbsp<i
                            class="fas fa-bolt"></i></p>
                    <div class="row mx-auto mb-4 px-3 pt-3 justify-content-center">

                        <div class="col-md-6 mb-3 py-2">
                            <div class="d-flex">
                                <img class="mx-auto d-block" width="80" height="80" src="/layout/img/aa1.png">
                                <p class="h6 pt-3 px-1 text-color-4">本平台以公益角度出發，為非營利網站，無論送養/領養寵物皆無須支付任何費用。</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3 py-2">
                            <div class="d-flex">
                                <img class="mx-auto d-block" width="80" height="80" src="/layout/img/aa2.png">
                                <p class="h6 pt-3 px-1 text-color-4">方便易上手的刊登及條件搜尋功能，能夠快速的領養跟自己有緣的浪浪或發佈寵物送養資訊。</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3 py-2">
                            <div class="d-flex">
                                <img class="mx-auto d-block" width="80" height="80" src="/layout/img/aa3.png">
                                <p class="h6 pt-3 px-1 text-color-4">在完成送養/領養程序後，平台會提醒送養人定期追蹤，關懷已送養寵物的情況。</p>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3 py-2">
                            <div class="d-flex">
                                <img class="mx-auto d-block" width="80" height="80" src="/layout/img/aa4.png">
                                <p class="h6 pt-3 px-1 text-color-4">想知道更多幫助浪浪的方式或是飼養常識嗎?歡迎到宣導平台進行瞭解。</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!-- 聯絡我們 -->
        <div class="mx-auto row py-3 my-2">
            <div class="row gx-0 justify-content-center">
                <img width="400" class="mx-auto d-block col-lg-5" src="/layout/img/contact.png">
                <div class="col-lg-7 px-5 bg-color-2" style="text-align: justify;">
                    <p class="h3 text-center py-1 pt-3 text-color-1" style="font-weight: 600;">
                        <i class="far fa-envelope-open"></i>&nbsp與我們聯絡
                    </p>
                    <form class="" action="/send-email" method="post" id="form1" name="form11"
                        onsubmit="return alert('&#128054;已收到您的留言，我們將盡快回復!&#128049;')">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-color-4">E-mail</label>
                            <input type="email" name="feedbackName" id="feedbackName" class="form-control" id="pk"
                                aria-describedby="emailHelp" required="required" style="border-color: #d0a98a;"
                                value="{{$account}}">
                        </div>
                        <div class="mb-3">
                            <label for="m" class="form-label text-color-4">主題</label>
                            <input type="text" name="feedbackSubject" id="feedbackSubject" class="form-control" id="m"
                                required="required" style="border-color: #d0a98a;">
                        </div>
                        <div class="mb-3">
                            <label for="msg" class="form-label text-color-4">想說的話</label>
                            <textarea class="form-control" name="feedbackContent" id="feedbackContent" rows="5"
                                required="required" style="border-color: #d0a98a;"></textarea>
                        </div>
                        <button type="submit" class="btn_k btn-k1" style="width: 70px;" name="button" id="button"><i
                                class="fas fa-paw"></i></button>
                    </form>

                </div>

            </div>
        </div>

    </div>


@endsection
