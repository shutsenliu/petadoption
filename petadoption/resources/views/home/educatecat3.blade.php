@extends('layout.master')

@section('head')

    <title>養貓前的自我檢視3</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h2 class="text-center m-5 fw-bolder">養貓前的自我檢視</h2>
    <hr class="mx-auto" style="width: 60rem ">
    <div class="container my-5" style="width: 40rem;height: 48rem;">
        <h4 class="mt-5 mb-3 fw-bolder">Q4.養貓可能會遇到的問題</h4>
        <ol>
            <li class="my-3">掉毛：即使是短毛貓也會掉毛，長毛貓更不用說，尤其換毛季的掉毛量是很可怕的。如果有嚴重潔癖又無法勤於打掃，養貓前恐怕得考慮一下。</li>
            <li class="my-3">
                不親人：通常只要飼主付出足夠的關愛及時間照顧、陪伴貓咪，大多貓咪都會親近飼主，甚至黏人撒嬌。但有些貓咪會因為本身的個性，或曾經受過人類傷害等原因，而始終害怕人類，或即使不害怕，但也很少主動親近人或不喜歡讓人抱，所以如果你喜歡熱情黏人的寵物，可以優先考慮養狗，或是養貓前先跟他相處，了解他的個性。
            </li>
            <li class="my-3">抓家具：貓咪會磨爪以去除老廢指甲，所以飼主必須準備貓抓板。但有些貓即使有貓抓板也會抓其他家具，因此如果完全不能接受，就要考慮一下是否要養貓。</li>
            <li class="my-3">晚上不睡覺：貓咪是夜行性動物，因此半夜跑跳、玩耍或吵鬧是正常的。有些飼主能透過訓練或一些方式讓貓咪跟著飼主的作息生活，但不是每個人都能成功，所以必須把這一點也考慮進去。
            </li>
            <li class="my-3">亂尿尿：貓咪亂尿尿的原因很多，可說是養貓常見的困擾，飼主也必須全盤了解貓咪的習性，才能避免／改正這種狀況。</li>
            <li class="my-3">
                生病：貓咪沒有健保，即使是平常的皮膚病、感冒等等的小病，一次也要幾百塊，複診就要上千塊，更不用說其他較嚴重的疾病了。因此如果不願意在貓咪身上花那麼多錢，或無法在平時就慢慢存下醫療基金，養貓前可能就要考慮一下。
            </li>
            <li class="my-3">
                家人反對：不管你如何「猜想」、「感覺」家人一定可以接受你養寵物，都還是請你先實際詢問過家人，所有人都同意再養。有些比較誇張的案例中，曾經有家人偷偷將寵物帶到遠處「放生」，因此不能輕視這一點。</li>
            <li class="my-3">
                懷孕生子：常常養寵物養得好好的，一懷孕就有些根本不了解實情的人會碎嘴要你把寵物送人，還沒遇到前你可能會認為自己不可能這麼做，但實際遇到後，心意不夠堅定的人可能就會開始覺得：「嗯，這麼說也對。」「好煩哦，好啦好啦送給別人養，不要再煩我了！」所以請先了解相關知識，到時就由你來說服別人，而不是聽信他人不可靠的言論。
            </li>

        </ol>
    </div>
    <nav>
        <ul class="pagination pagination-sm1 justify-content-center py-3">
            <li class="page-item"><a class="page-link1" href="/index/educatecat2"><span>&laquo;</span></a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatecat1">1</a></li><!-- 停留在該分頁時的設定 -->
            <li class="page-item"><a class="page-link1" href="/index/educatecat2">2</a></li>
            <li class="page-item active1"><a class="page-link1" href="/index/educatecat3">3</a></li><!-- 到最後一頁時的設定 -->
            <li class="page-item disabled1"><a class="page-link1" href="/index/educatecat3"><span>&raquo;</span></a>
            </li>
        </ul>
    </nav>
@endsection
