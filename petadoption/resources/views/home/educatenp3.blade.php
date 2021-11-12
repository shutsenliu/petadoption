@extends('layout.master')

@section('head')

    <title>浪浪數量問題</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h2 class="text-center m-5 fw-bolder">浪浪數量問題</h2>
    <hr class="mx-auto" style="width: 60rem ">
    <div class="container my-5" style="width: 60rem;height: 30rem; ">
        <h4 class="my-5 text-center fw-bolder">小小的台灣，已沒有牠們的容身之處。</h4>
        <h6>
            目前估計全國仍有近15萬隻狗(貓)遊蕩街頭，已超越今年全國新生兒數量。驚人的數據背後更隱藏著許多你沒看見，卻持續衍生的問題。
        </h6>
        <h6 class="mt-5 fw-bolder">【配套不足的零撲殺政策】</h6>
        <h6>
            2014年紀錄片《十二夜》上映後引起輿論與修法倡議，政府遂於隔年刪除流浪動物進入收容所12天後，無人認領即安樂死的條款。
            然而，在街頭浪犬數量尚未受到控制時，零撲殺政策更加緊縮了有限的動保資源，收容所犬隻只進不出，街頭遭人投訴後捕捉的問題犬，需急難救助的浪犬貓，也難以收容。
        </h6>
        <h6 class="mt-5 fw-bolder">【超載的收容所，不堪負荷】</h6>
        <h6>
            根據農委會109年9月資料，全台21間收容所近半數收容比例已達到或超過100%。哪怕資源最充足的台北市動保處收容所，犬隻超收226%，貓更超收598%。當動物數量過多，所內空間無法充足分配，動物的壓力升高，甚至狗咬狗相互攻擊。
        </h6>

    </div>
    <nav>
        <ul class="pagination pagination-sm1 justify-content-center py-3">
            <li class="page-item "><a class="page-link1" href="#"><span>&laquo;</span></a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatenp1">1</a></li><!-- 停留在該分頁時的設定 -->
            <li class="page-item"><a class="page-link1" href="/index/educatenp2">2</a></li>
            <li class="page-item active1"><a class="page-link1" href="/index/educatenp3">3</a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatenp4">4</a></li><!-- 到最後一頁時的設定 -->
            <li class="page-item"><a class="page-link1" href="/index/educatenp4"><span>&raquo;</span></a></li>
        </ul>
    </nav>
@endsection
