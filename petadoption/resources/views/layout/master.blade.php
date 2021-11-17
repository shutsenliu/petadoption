<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Me Home 線上送養平台</title>

    <!--首頁放就好-->
    <meta name="description" content="線上送養平台">

    <!--網址列小LOGO-->
    <link rel="shortcut icon" href="/layout/img/logo_icon.PNG" type="image/x-icon">
    <link rel="icon" href="/layout/img/logo_icon.PNG" type="image/x-icon">

    <!--引用自建CSS-->
    <link href="/layout/css/style.css" rel="stylesheet" />

    <!--引用BS CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!--引用fontawesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <style>
        .die {
            text-decoration: none !important
        }

        .ha {
            font-weight: 600 !important;
        }

    </style>

    @yield('head')

</head>

<body>

    <!-- 回到頁首按鈕 -->
    <a class="js-back-to-top" style="display:none;position:fixed;bottom:20px;right:10px; z-index:9999;">
        <img src="/layout/img/to_top.png" height="40">
    </a>

    <!--導覽列-->
    <nav class="navbar navbar-light1 bg-white navbar-expand-lg ha">
        <div class="container-lg">
            <a href="/home/index" class="die navbar-brand col-4">
                <img src="/layout/img/index_logo.PNG" height="100" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto row" id="navbar1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item col-lg-2 text-center"></li>
                    <li class="nav-item active col-lg-2 text-center py-2">
                        <a class="nav-link1 die" href="/home/index">
                            <img src="/layout/img/icon_home.png" height="60" alt="" class="rounded mx-auto d-block">首頁
                        </a>
                    </li>
                    <li class="nav-item dropdown col-lg-2 text-center py-2 bg-nav-item">
                        <a class="nav-link1 dropdown-toggle die" href="#" data-bs-toggle="dropdown">
                            <img src="/layout/img/icon_account.png" height="60" alt=""
                                class="rounded mx-auto d-block">我的帳戶
                        </a>
                        <div class="dropdown-menu bg-nav-item">
                            @if (!session()->has('account'))
                                <a class="dropdown-item die" href="/index/login">登入</a>
                                <a class="dropdown-item die" href="/index/registersendemail">註冊</a>
                            @endif
                            <a class="dropdown-item die" href="/index/memberpersonal">個人資訊</a>
                            <a class="dropdown-item die" href="/index/fosterinformation">送養資訊</a>
                            <a class="dropdown-item die" href="/index/adoptinformation">領養資訊</a>
                            @if (session()->has('account'))
                                <a class="dropdown-item die" href="/index/logout">登出</a>
                            @endif

                        </div>
                    </li>
                    <li class="nav-item col-lg-2 text-center py-2">
                        <a class="nav-link1 die" href="/fosterlist">
                            <img src="/layout/img/icon_adopt.png" height="60" alt=""
                                class="rounded mx-auto d-block">我要領養
                        </a>
                    </li>
                    <li class="nav-item col-lg-2 text-center py-2">
                        <a class="nav-link1 die" href="/notice">
                            <img src="/layout/img/icon_publish.png" height="60" alt=""
                                class="rounded mx-auto d-block">刊登送養
                        </a>
                    </li>
                    <li class="nav-item col-lg-2 text-center py-2">
                        <a class="nav-link1 die" href="/index/educate">
                            <img src="/layout/img/icon_teach.png" height="60" alt=""
                                class="rounded mx-auto d-block">宣導平台
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')



    <!--分頁導覽鈕，預設5頁的按鈕-->
    {{-- <nav>
    <ul class="pagination pagination-sm1 justify-content-center py-3">
      <li class="page-item"><a class="page-link1" href="#"><span>&laquo;</span></a></li>
      <li class="page-item active1"><a class="page-link1" href="#">1</a></li><!-- 停留在該分頁時的設定 -->
      <li class="page-item"><a class="page-link1" href="#">2</a></li>
      <li class="page-item"><a class="page-link1" href="#">3</a></li>
      <li class="page-item"><a class="page-link1" href="#">4</a></li>
      <li class="page-item disabled1"><a class="page-link1" href="#">5</a></li><!-- 到最後一頁時的設定 -->
      <li class="page-item"><a class="page-link1" href="#"><span>&raquo;</span></a></li>
    </ul>
  </nav> --}}

    <!--footer-->
    <footer class="py-4 mt-3 text-center contact-section bg-color-1">
        <!--社群連結-->
        <div class="social d-flex justify-content-center">
            <a class="mx-2 die" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="mx-2 die" href="#!"><i class="fab fa-line"></i></a>
            <a class="mx-2 die" href="#!"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="container py-2 px-lg-3 text-color-1 footer-text footer1">
            <small>本站所有資訊來源為資料開放平台以及會員自行刊登，如有任何疑問請與我們聯絡。<br>2021 &copy; Pet Me Home | Copyright</small>
        </div>
    </footer>

    <!--引用BS JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
    </script>

    <!-- 引用js -->
    <script src="/admin/js_k/k.js"></script>

    <!--引用jquery-->
    <script src="/layout/js/jquery-1.12.4.js"></script>
    <script src="/layout/js/jquery-3.4.1.js"></script>
    <script src="/layout/js/jquery-migrate-1.4.1.js"></script>

    <script type="text/javascript">
        $(function() {
            var $win = $(window);
            var $backToTop = $('.js-back-to-top');
            // 当用户滚动到离顶部100像素时，展示回到顶部按钮
            $win.scroll(function() {
                if ($win.scrollTop() > 300) {
                    $backToTop.fadeIn("222");
                } else {
                    $backToTop.stop().fadeOut("222");
                }
            });
            // 当用户点击按钮时，通过动画效果返回头部
            $backToTop.click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 50);
            });
        });

        // $(function() {
        //     $("#gotop").click(function() {
        //         $("html,body").animate({
        //             scrollTop: 0
        //         }, 1000);
        //     });
        //     $(window).scroll(function() {
        //         if ($(this).scrollTop() > 300) {
        //             $('#gotop').fadeIn("fast");
        //         } else {
        //             $('#gotop').stop().fadeOut("fast");
        //         }
        //     });
        // });

        //淡入效果
        $(document).ready(function() {

            /* Every time the window is scrolled ... */
            $(window).scroll(function() {

                /* Check the location of each desired element */
                $('.hideme').each(function(i) {

                    var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                    var bottom_of_window = $(window).scrollTop() + $(window).height();

                    /* If the object is completely visible in the window, fade it it */
                    if (bottom_of_window > bottom_of_object) {

                        $(this).animate({
                            'opacity': '1'
                        }, 650);

                    }

                });

            });

        });
    </script>

</body>

</html>
