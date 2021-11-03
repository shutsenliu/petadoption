@extends('layout.master')

@section('head')

  <title>送養資訊管理-個別明細(未送出)</title>


  <!--引用自建CSS-->
  <link href="/auth/css/all.css" rel="stylesheet" />

@endsection

@section('content')
  <form class="container  my-3 mx-auto" style="width: 40rem" action="" method="POST">
    @csrf
    <h3 class="mb-4 text-center">送養資訊管理-個別明細(未送出)</h3>
    <div class="Bborder">
      <div class="my-5 row d-flex justify-content-center ">
        <label for="send"class="col-md-2 col-form-label" >狀態</label>
        <div class="col-md-4 ">
          <select name="petSend" id="work" class=" mb-3 form-select" aria-label="Default select example" required> 
            <option value="未送出">未送出</option>
            <option value="已送出">已送出</option>
            <option value="取消送養">取消送養</option>
          </select>
        </div>
      <div class="mb-3 row justify-content-center">
        <label for="catORdog" class="col-md-3 col-form-label" >動物種類</label>
        <div class="col-md-8">
          <select name="catORdog" id="work" class=" mb-2 form-select" aria-label="Default select example" required> 
            <option>請選擇</option>
            <option value="狗">狗</option>
            <option value="貓">貓</option>
          </select>
        </div>
        <label for="color" class="col-md-3 col-form-label" >毛色</label>
        <div class="col-md-8">
          <select name="color" id="color" class="mb-2 form-select" aria-label="Default select example" required> 
            <option>請選擇</option>
            <option value="橘色">橘色</option>
            <option value="黑色">黑色</option>
          </select>
        </div>
        <label for="petName" class="col-md-3 col-form-label" >動物暱稱</label>
        <div class="col-md-8">
          <input name="petName" type="text" class="form-control mb-2" placeholder="暱稱">
        </div>
        <label for="petType" class="col-md-3 col-form-label" >品種</label>
        <div class="col-md-8">
          <select name="petType" id="petType" class=" mb-2 form-select" aria-label="Default select example" required> 
            <option>請選擇</option>
            <option value="米克斯">米克斯</option>
            <option value="其他">其他</option>
          </select>
        </div>
        <label for="petGender" class="col-md-3 col-form-label" >性別</label>
        <div class="col-md-8">
          <select name="petGender" id="petGender" class=" mb-2 form-select" aria-label="Default select example" required> 
            <option>請選擇</option>
            <option value="公">公</option>
            <option value="母">母</option>
            <option value="其他">其他</option>
          </select>
        </div>
        <label for="petBody" class="col-md-3 col-form-label" >體型</label>
        <div class="col-md-8">
          <select name="petBody" id="petBody" class=" mb-2 form-select" aria-label="Default select example" required> 
            <option>請選擇</option>
            <option value="大型">大型</option>
            <option value="中型">中型</option>
            <option value="小型">小型</option>
          </select>
        </div>
        <label for="petAge" class="col-md-3 col-form-label" >年紀</label>
        <div class="col-md-8">
          <select name="petAge" id="petAge" class=" mb-2 form-select" aria-label="Default select example" required> 
            <option>請選擇</option>
            <option value="1歲以下">1歲以下</option>
            <option value="1～3歲">1～3歲</option>
            <option value="3～6歲">3～6歲</option>
            <option value="6～10歲">6～10歲</option>
            <option value="10歲以上">10歲以上</option>
          </select>
        </div>
        <label for="fix" class="col-md-3 col-form-label">是否結紮</label>
        <div class="col-md-8">
          <select name="fix" id="fix" class=" mb-2 form-select" aria-label="Default select example" required> 
            <option>請選擇</option>
            <option value="是">是</option>
            <option value="否">否</option>
          </select>
        </div>
        <label for="petCity" class="col-sm-3 col-form-label" >所在地</label>
        <div class="col-sm-4">
          <input list="areaList" type="text" name="petCity" class="form-control mb-2" id="petCity" placeholder="居住地區">
              <datalist id="areaList" >
                <option value="台北市">台北市</option>
                <option value="新北市">新北市</option>
                <option value="桃園市">桃園市</option>
                <option value="台中市">台中市</option>
                <option value="台南市">台南市</option>
                <option value="高雄市">高雄市</option>
                <option value="基隆市">基隆市</option>
                <option value="新竹市">新竹市</option>
                <option value="嘉義市">嘉義市</option>
                <option value="宜蘭縣">宜蘭縣</option>
                <option value="花蓮縣">花蓮縣</option>
                <option value="台東縣">台東縣</option>
                <option value="澎湖縣">澎湖縣</option>
                <option value="屏東縣">屏東縣</option>
                <option value="嘉義縣">嘉義縣</option>
                <option value="雲林縣">雲林縣</option>
                <option value="南投縣">南投縣</option>
                <option value="彰化縣">彰化縣</option>
                <option value="苗栗縣">苗栗縣</option>
                <option value="馬祖縣">馬祖縣</option>
                <option value="金門縣">金門縣</option>
                <option value="新竹縣">新竹縣</option>
              </datalist>
        </div>
        <div class="col-sm-4">
          <select name="work" id="work" class=" mb-2 form-select" aria-label="Default select example" required> 
            <option>鄉/鎮/市</option>
            <option value="">毛色</option>
            <option value="">毛色</option>
          </select>
        </div>
        <label for="petOther" class="col-md-3 col-form-label" >其他說明</label>
        <div class="col-md-8">
          <input name="petOther" type="text" class="form-control mb-2" id="petOther">
        </div>
        <label for="petOwner" class="col-md-3 col-form-label" >聯絡人</label>
        <div class="col-md-8">
          <input name="petOwner" type="text" class="form-control mb-2" id="petOwner">
        </div>
        <label for="petPhone" class="col-md-3 col-form-label">連絡電話</label>
        <div class="col-md-8">
          <input name="petPhone"type="tel" class="form-control mb-2" id="petPhone">
        </div>
        <h6 class="col-md-3 mt-3">照片上傳</h6>
        <div class="col-md-8">
          <button type="submit" class="col-md-3 btn btn-primary mt-1">上傳檔案</button>
        </div>
        <div class="row mx-2">
          <div class="col-2">
            <img src="..." class="rounded " alt="...">
            <button type="submit" class="col-md-3 btn btn-primary m-5 "></button>
          </div>
          <div class="col-2">
            <img src="..." class="rounded " alt="...">
            <button type="submit" class="col-md-3 btn btn-primary m-5 "></button>
          </div>
        </div>
        <a href="/index/fosterinformation" class="col-md-3 btn btn-primary mt-3 ">更新</a>
      </div>
    </div>  
    </div>
    </form>
    <div class="row justify-content-center">
      <a href="/index/fosterinformation" class="col-md-2 btn btn-primary m-5 ">返回</a>
      <a href="/index/wantpetlist" class="col-md-2 btn btn-primary m-5 ">查看領養申請</a>
    </div>  
  </form>

  
@endsection