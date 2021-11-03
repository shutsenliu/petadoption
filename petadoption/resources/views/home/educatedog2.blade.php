@extends('layout.master')

@section('head')

  <title>養狗前的自我檢視2</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')

  <h2 class="text-center m-5 fw-bolder">養狗前的自我檢視</h2>
  <hr class="mx-auto" style="width: 60rem;">
  <div class="container mt-5" style="width: 40rem;height: 47rem;">
    <h4 class="mt-5 mb-3 fw-bolder">Q3.養狗要做什麼？要準備哪些用品？</h4>
    <ol>
      <li class="my-3">基本的用品：狗狗不會有機會掙脫的項圈、狗繩、水碗、狗碗、撿便袋、.玩具、磨牙的東西及梳子。</li>
      <li class="my-3">營養且合適的食物：有乾糧和濕食，如果發現狗狗的飲食營養不均衡，每天在點心時間餵狗狗生食或熟食。只要餵一些濕食，都比完全沒餵還要好得多。另一個方法是一週餵2—4次濕食，或是一週內，一半時間吃乾糧，另一半吃濕食。在主人能力可負擔的範圍內，給狗狗最佳的食物。</li>
      <li class="my-3">乾淨的飲水：水要給煮過的，不可餵生水或礦泉水，要讓狗狗攝取足夠水分。</li>
      <li class="my-3">健康檢查：如果中途還沒帶狗狗去看過醫生，你接回家後要先帶去給獸醫看，做基本的健康檢查。如果狗狗有流浪過也要跟醫生說，會影響檢查項目。</li>
      <li class="my-3">固定一段時間梳毛。</li>
      <li class="my-3">每天要出門遛狗、陪他玩、跟他說話、摸摸他，也不要都不理他，把他當成家裡的擺飾。狗狗也是需要關愛和陪伴的。</li>
      <li class="my-3">生病看醫生（動物沒健保，看起醫生來有可能會很燒錢，這點一定在養之前就要考慮清楚），1～3年打一次疫苗、做健康檢查、夠大之後要結紮。</li>
      <li class="my-3">一個星期~一個月洗澡一次，除非是疾病需要，不然一個星期洗一次就是非常頻繁的頻率。夏天狗狗應該多久洗一次澡，要看狗狗本身的體味和出門頻率！</li>
      <li class="my-3">適度的運動可以促進狗狗的血液循環、幫助消化，散步的同時適度的曬太陽也能夠活絡骨骼、強健肌肉。但是，過度的運動，像是摩托車遛狗、爬高階樓梯、長時間跑步等，都會對毛孩的心臟及 關節造成極大的負擔！以年輕的狗狗來說，如果劇烈運動過多，年紀大的時候容易出現兩種狀況：一為脊椎提早老化、二為心肺功能提早老化。而大約 4 歲以上的中年狗狗，如果強迫他持續以時速 12-15 公里以上跑步，長期下來心臟容易提早老化。</li>
      
    </ol>  
  </div>
  <nav>
    <ul class="pagination pagination-sm1 justify-content-center py-3">
      <li class="page-item"><a class="page-link1" href="/index/educatedog1"><span>&laquo;</span></a></li>
      <li class="page-item"><a class="page-link1" href="/index/educatedog1">1</a></li><!-- 停留在該分頁時的設定 -->
      <li class="page-item active1"><a class="page-link1" href="/index/educatedog2">2</a></li>
      <li class="page-item"><a class="page-link1" href="/index/educatedog3">3</a></li><!-- 到最後一頁時的設定 -->
      <li class="page-item"><a class="page-link1" href="/index/educatedog3"><span>&raquo;</span></a></li>
    </ul>
  </nav>
@endsection