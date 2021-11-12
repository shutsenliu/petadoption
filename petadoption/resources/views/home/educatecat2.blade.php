@extends('layout.master')

@section('head')

    <title>養貓前的自我檢視2</title>


    <!--引用自建CSS-->
    <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
    <h2 class="text-center m-5 fw-bolder">養貓前的自我檢視</h2>
    <hr class="mx-auto" style="width: 60rem;">
    <div class="container my-5" style="width: 40rem;height: 47rem;">
        <h4 class="mt-5 mb-3 fw-bolder">Q3.養貓要做什麼？要準備哪些用品？</h4>
        <ol>
            <li class="my-3">基本的用品：貓咪不會有機會逃脫的外出籠、食盆、水碗、指甲剪、梳子、貓抓板（避免他抓你的家具）、貓砂（一開始建議用礦砂）及貓砂盆。</li>
            <li class="my-3">
                營養且合適的食物：有乾糧和濕食，乾糧雖較方便但對貓咪健康不好，新手建議餵主食罐。另外，貓是肉食性動物，不像狗狗是雜食性，因此千萬不要餵人類的食物，一來食材不符合貓咪營養需求，二來人的食物有調味料，對動物來說很傷身。
            </li>
            <li class="my-3">乾淨的飲水：水要給煮過的，不可餵生水或礦泉水。要積極讓貓咪攝取足夠水分，很多貓都是水喝不夠而得腎病的。</li>
            <li class="my-3">健康檢查：如果中途還沒帶貓咪去看過醫生，你接回家後要先帶去給獸醫看，做基本的健康檢查。如果貓咪有流浪過也要跟醫生說，會影響檢查項目。</li>
            <li class="my-3">每天清1～2次貓砂。</li>
            <li class="my-3">固定一段時間梳毛、剪指甲、餵化毛膏（或可用南瓜泥、地瓜泥代替）。</li>
            <li class="my-3">每天要陪他玩、跟他說話、摸摸他。不要直接用手腳跟他玩（可以用玩具），以免養成他咬手腳的習慣。也不要都不理他，把他當成家裡的擺飾。貓咪也是需要關愛和陪伴的。</li>
            <li class="my-3">生病看醫生、（動物沒健保，看起醫生來有可能會很燒錢，這點一定在養之前就要考慮清楚）、1～3年打一次疫苗、做健康檢查、夠大之後要結紮。</li>
            <li class="my-3">
                洗澡可一年1～2次，但有些品種油脂分泌較旺盛，洗澡頻率要較高。貓咪很敏感，如果送去寵物美容，他們可能會因太過緊張而弄傷美容師或是自己，因此最好能學會自己在家洗澡、剃毛等等。</li>
            <li class="my-3">貓咪喜歡垂直空間，可以買貓跳台或用家中現有的櫥櫃，擺放成階梯狀的高低落差，消耗貓咪多餘的精力。另外，最好有窗邊的空間或陽台能讓他們看窗外的風景、小鳥，及曬曬太陽。
            </li>

        </ol>
    </div>
    <nav>
        <ul class="pagination pagination-sm1 justify-content-center py-3">
            <li class="page-item"><a class="page-link1" href="/index/educatecat1"><span>&laquo;</span></a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatecat1">1</a></li><!-- 停留在該分頁時的設定 -->
            <li class="page-item active1"><a class="page-link1" href="/index/educatecat2">2</a></li>
            <li class="page-item"><a class="page-link1" href="/index/educatecat3">3</a></li><!-- 到最後一頁時的設定 -->
            <li class="page-item"><a class="page-link1" href="/index/educatecat3"><span>&raquo;</span></a></li>
        </ul>
    </nav>
@endsection
