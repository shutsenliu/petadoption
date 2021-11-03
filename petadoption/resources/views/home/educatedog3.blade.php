@extends('layout.master')

@section('head')

  <title>養狗前的自我檢視3</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')

  <h2 class="text-center m-5 fw-bolder">養狗前的自我檢視</h2>
  <hr class="mx-auto" style="width: 60rem ">
  <div class="container my-5" style="width: 40rem;height: 45rem;">
    <h4 class="mt-5 mb-3 fw-bolder">Q4.養狗可能會遇到的問題</h4>
    <ol>
      <li class="my-3">足夠的時間：幫狗清理排泄物、洗澡、梳毛、疾病就醫、教育生活常規、帶牠散步運動等等……這些都是飼主基本要為狗兒做到的事情，會花掉主人不少時間，您確定自己有這麼多時間嗎？</li>
      <li class="my-3">經濟基礎：狗兒的飼料、預防針、晶片植入、心絲蟲預防藥都是基本開銷，這還沒包括長毛狗的美容費（假如飼主無法自行打理）、點心、玩具，以及偶然患病或是發生意外的醫療費，狗兒年老時，更是容易生病，狗兒沒有健保，醫藥費通常貴得嚇人，如果沒有經濟基礎，沒有一筆閒錢，如何能應付這麼多的花費？</li>
      <li class="my-3">如果狗有行為問題：網路上的狗好像都很乖，但如果你養到的狗會亂叫、亂咬東西、護食、甚至不給摸會咬人呢建議可以先估狗這些情況，然後問自己如果養到的不是天使狗，要怎麼辦送去給訓練師教嗎？以萬為單位的訓練費願意花嗎？</li>
      <li class="my-3">破壞東西：就像人類會有好奇心，狗狗也是一樣的。但人類有雙手可以探索環境，而狗狗沒有手可以運用，牠們只有嘴。啃咬東西的原因，是因為他們喜歡那些東西的味道。在家裏，人類的味道是最吸引狗狗的。拖鞋會殘留較濃烈的味道，而人類又容易把脫鞋隨意留在家裏的地面上。</li>
      <li class="my-3">家人反對：不管你如何「猜想」、「感覺」家人一定可以接受你養寵物，都還是請你先實際詢問過家人，所有人都同意再養。有些比較誇張的案例中，曾經有家人偷偷將寵物帶到遠處「放生」，因此不能輕視這一點。</li>
      <li class="my-3">懷孕生子：常常養寵物養得好好的，一懷孕就有些根本不了解實情的人會碎嘴要你把寵物送人，還沒遇到前你可能會認為自己不可能這麼做，但實際遇到後，心意不夠堅定的人可能就會開始覺得：「嗯，這麼說也對。」「好煩哦，好啦好啦送給別人養，不要再煩我了！」所以請先了解相關知識，到時就由你來說服別人，而不是聽信他人不可靠的言論。</li>
      
    </ol>
  </div>
  <nav>
    <ul class="pagination pagination-sm1 justify-content-center py-3">
      <li class="page-item"><a class="page-link1" href="/index/educatedog2"><span>&laquo;</span></a></li>
      <li class="page-item"><a class="page-link1" href="/index/educatedog1">1</a></li><!-- 停留在該分頁時的設定 -->
      <li class="page-item"><a class="page-link1" href="/index/educatedog2">2</a></li>
      <li class="page-item active1"><a class="page-link1" href="/index/educatedog3">3</a></li><!-- 到最後一頁時的設定 -->
      <li class="page-item disabled1"><a class="page-link1" href="/index/educatedog3"><span>&raquo;</span></a></li>
    </ul>
  </nav>
@endsection