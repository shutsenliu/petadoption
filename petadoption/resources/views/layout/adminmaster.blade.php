<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Me Home 後台管理系統</title>


  @yield('head')
  

  <!--網址列小LOGO-->
  <link rel="shortcut icon" href="/layout/img/logo_icon.PNG" type="image/x-icon">
  <link rel="icon" href="/layout/img/logo_icon.PNG" type="image/x-icon">

  <!--引用自建CSS-->
  <link href="/admin/css/style.css" rel="stylesheet" />

  <!--引用BS CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <!--引用fontawesome-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <style>
      a {
        text-decoration: none
        }

        /* 各斷點 */
        @media (max-width: 800px) {
          .aaa2 {
                font-size: 1rem !important;
            }
        }

        
  </style>
  @yield('style')

</head>

<body>

  <!--導覽列-->
  <nav class="navbar navbar-light1 bg-white navbar-expand-sm container">
    <div class="container-md">
      <a class="navbar-brand col-4">
        <img class="" src="/layout/img/index_logo_70.PNG" height="70" alt="logo">
        <span class="h5 aaa2" style="font-weight: 600; color: #d0a98a;">後台管理系統</span>
      </a>
      
    </div>
    
    @yield('nav')

  </nav>



  @yield('content')




  <!--footer-->
  <footer class="py-2 mt-3 text-center bg-color-1">
    <div class="container py-2 px-lg-3 text-color-1 footer-text footer1">
      <small>2021 &copy; Pet Me Home | Copyright</small>
    </div>
  </footer>

  <!-- 引用js -->
  <script src="/admin/js_k/k.js"></script>

  <!--引用BS JS-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
    integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
    crossorigin="anonymous"></script>
    

</body>

</html>




