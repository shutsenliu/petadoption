@extends('layout.master')

@section('head')
	<title>刊登系統</title>
  <link rel="stylesheet" href="/foster/css/wantfosterinformation.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <style>
        
    </style>    
@endsection

@section('content')
    
		<!-- 內文 -->
		<div>
			<h1 class="text-center tt pt-5 pb-5 title-c">刊登需知</h1>
		</div>
		<div class="container">

			<!-- 公告  -->
			<div class="announcement p-5 ">
				<h3 class="announcement-t text-center pb-2"><b>🐶條款規範</b></h3>
				<p>① 刊登人使用此送養平台所提供之送養資訊刊登服務時，均受到本「刊登條款」規範。</p>
				<p>② 送養犬、貓動物，剛出生需斷奶後方能於本站刊登送養，如拾獲餵奶貓狗、自家貓狗懷胎生產等，請養育至斷奶後拍照送養，以送養資料照片進行判別，並且不開放以認養訊息徵求幼奶貓犬中途。</p>
				<p>③ 此為資訊交流平台，無法保證刊登內容之正確性，刊登人對其刊登內容及送養之行為應負完全之責任，刊登人應提供確實之刊登內容，並自負相關法律責任。</p>
				<p>④ 秉持以領養代替購買之精神，禁止以下類型之刊登內容：</p>
				<ul>
					<li>　● 要求補貼、認養價、結紮費等一切任何額外費用。</li>
					<li>　● 有實際販賣行為。</li>
					<li>　● 捏造不實資訊。</li>
					<li>　● 特意收集個人資料。</li>
				</ul>
				<p>⑤ 如有違反上述條款之情事，系統可能將其進行會員停權之處置。</p>
				<p>⑥ 刊登人同意授權於本服務刊登之資訊內容無償提供第三人分享、轉載或推廣。</p>
				<p>⑦ 每筆資料提交後皆由系統自動建立順序無法變更。請勿藉由頻繁重複刊登方式搶佔版面順序，若重複頻繁刊登，新提交的認養資訊將拒絕刊登。</p></br>
				<hr>

				<h3 class="announcement-t text-center pb-2"><b>🐱送養注意事項</b></h3>
				<p>① 可以刊登貓、狗以及其他物種（兔、鼠、鳥）。</p>
				<p>② 每則訊息最多可上載四張圖片，系統將自動縮圖成適當大小。</p>
				<p>③ 請提供最新的動物現況照片，以避免造成認養人對動物現況的誤會。</p>
				<p style="color: red;">④ 資訊送出後，約需1～3個工作天，不會馬上刊出，由本站版工審核資料無誤後，設定刊登於認養訊息區。</p>
				<p>⑤ 請不要因為省事提供與現況不符的照片，或盜取他人張貼之照片，明顯不符或經查報，該則訊息將不予刊登或直接移除。</p>
				<p>⑥ 為保持認養訊息內容之一致性，避免使用者之誤解。每筆認養資訊需保持唯一性，動物送養後系統會更改狀態。勿以同筆資料內更換動物認養資訊內容（例：A狗換B狗），新的待認養動物請重新刊登。</p>
				<p>⑦ 刊登認養照片請轉正，未能轉正呈現者，不予刊登。 </p>
			</div>

			<form id="dataForm">
				<!-- 同意本「刊登需知」按鈕 -->
				<div class=" p-5 form-check d-flex justify-content-center">
					<input class="form-check-input me-1" id="userAgree" onclick="btnCheck()" type="checkbox" name="ag"
						required>
					<label class="form-check-label agree-c" for="userAgree">我已詳閱且同意本「刊登需知」</label>
				</div>


				<!-- 下一步 -->
				<div class="pb-5 text-center ">
					<input type="button" id="inpCheckbox" onclick="btnn()" value="下一步" class="sumbit-c"
						disabled="disabled">
				</div>
			</form>

		</div>
    
	<script src="/layout/js/jquery-3.4.1.js"></script>
	<script src="/foster/js/wantfosterinformation.js"></script>
@endsection