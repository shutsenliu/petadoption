@extends('layout.master')

@section('head')

    <title>現有狀況</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h2 class="text-center m-5 fw-bolder">牠們來自不同的地方，卻都步上流浪的旅程。</h2>
    <hr class="mx-auto" style="width: 60rem ">
    <div class="container my-5" style="width: 60rem ">
        <h5 class="my-5">二、三十年前的台灣街頭已有流浪犬(貓)的存在，早已繁衍出多代後代等數不清的野化浪犬們，牠們通常脫離家庭許久，野性較強。</h5>
        <div class="row my-5">
            <div class="col-md-4  text-center">
                <img class="my-3 " src="/auth/img/101.jpg" alt="棄養犬/貓" style="width: 150px;">
                <h6 class="fst-italic">棄養犬(貓)</h6>
            </div>
            <div class="col-md-4  text-center">
                <img class="my-3" src="/auth/img/102.jpg" alt="放養犬/貓" style="width: 150px;">
                <h6 class="fst-italic">放養犬(貓)</h6>
            </div>
            <div class="col-md-4  text-center">
                <img class="my-3" src="/auth/img/103.jpg" alt="野化犬/貓" style="width: 150px;">
                <h6 class="fst-italic">野化犬(貓)</h6>
            </div>
        </div>
        <h5 class="text-center my-3">
            這三者皆是現代浪浪來源，彼此更可能不斷繁殖出下一代，成為龐大族群。
        </h5>
        <h5 class="mt-5">
            至於棄養犬（貓）、放養犬（貓）與野化浪犬（貓）何者較多？目前尚未有定論。但可以發現的是，不同地區的浪犬（貓）來源有所不同。例如淺山或野地較常見野化犬（貓），而鄉村或郊區較多放養犬（貓），部分放養犬甚至不是人們有計劃飼養的犬（貓）隻，而是零星遊蕩到家門前，人們因憐憫提供穩定的食物來源。犬（貓）隻因此留下、聚集、繁殖，形成生生不息的浪犬（貓）族群。
        </h5>

    </div>
    <nav>
        <ul class="pagination pagination-sm1 justify-content-center py-3">
            <li class="page-item disabled1"><a class="page-link1" href="#"><span>&laquo;</span></a></li>
            <li class="page-item active1"><a class="page-link1" href="/index/educatenp1">1</a></li><!-- 停留在該分頁時的設定 -->
            <li class="page-item"><a class="page-link1" href="/index/educatenp2">2</a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatenp3">3</a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatenp4">4</a></li><!-- 到最後一頁時的設定 -->
            <li class="page-item"><a class="page-link1" href="/index/educatenp2"><span>&raquo;</span></a></li>
        </ul>
    </nav>
@endsection
