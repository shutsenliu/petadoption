 //選擇種類改變品種選項
 function changeVariety() {
    let animalType = $('#animalType');
    let animalVariety = $('#animalVariety');
    let str = '';
	let str2 = '';
    switch (animalType.val()) {
        case '':
            console.log('沒選擇');
			$('#dogSelect').html('');
            break;
        case '狗':
            str = `<option value="">請選擇</option>
            <option  value="混種">混種</option>
            <option  value="米格魯">米格魯</option>
            <option  value="馬爾濟斯">馬爾濟斯</option>
            <option  value="博美">博美</option>
            <option  value="柴犬">柴犬</option>
            <option  value="拉不拉多">拉不拉多</option>
            <option  value="臘腸">臘腸</option>
            <option  value="吉娃娃">吉娃娃</option>
            <option  value="其他">其他</option>`;
            // console.log("狗");
			
            str2 = `<div class="form-group col-12 col-sm-6">
			<label class="control-label  p-2" for="animalBody">體型 <span
					class="danger">必填</span></label>
			<select class="form-control border-warning" id="animalBody"
				onchange="console.log($('#animalBody').val())" name="Body" required>
				<option value="">請選擇</option>
            <option  value="小型">小型</option>
            <option  value="中型">中型</option>
            <option  value="大型">大型</option>
			</select>
		</div>`;
			$('#dogSelect').html(str2);
            break;
        case '貓':
            str = `<option value="">請選擇</option>
			<option  value="混種">混種</option>
            <option  value="金吉拉">金吉拉</option>
            <option  value="俄羅斯藍貓">俄羅斯藍貓</option>
            <option  value="英國藍貓">英國藍貓</option>
            <option  value="加菲貓">加菲貓</option>
            <option  value="折耳貓">折耳貓</option>
            <option  value="波斯">波斯</option>
            <option  value="短毛">短毛</option>`;
            // console.log('貓');
			$('#dogSelect').html('');
            break;
        case '其他':
            str = `<option value="">請選擇</option>
            <option  value="鳥類">鳥類</option>
            <option  value="寵物鼠">寵物鼠</option>
            <option  value="寵物兔">寵物兔</option>
            <option  value="陸龜">陸龜</option>
            <option  value="觀賞魚">觀賞魚</option>
            <option  value="其他">其他</option>`;
            // console.log("其他");
			$('#dogSelect').html('');
            break;
    }
    animalVariety.html(str);
}




 




let imgList = [];

$(function () {
	// 滑鼠經過顯示删除按鈕
	$('.content-img-list').on('mouseover', '.content-img-list-item', function () {
		$(this).children('a').removeClass('hide');
	});
	// 滑鼠離開隐藏删除按鈕
	$('.content-img-list').on('mouseleave', '.content-img-list-item', function () {
		$(this).children('a').addClass('hide');
	});
	// 單張圖片删除
	$(".content-img-list").on("click", '.content-img-list-item a', function () {
		var index = $(this).attr("index");
		imgList.splice(index, 1);
		let file = document.getElementById(`uploadImg${index}`);
		file.outerHTML = file.outerHTML;
		let upEmpCount = 0;
		for (let i = 0; i < $('input:file').length; i++) {
			if ($('input:file')[i].files.length == 0) {
				upEmpCount++;
				if (upEmpCount > 1) {

					$(`#file${i}`).hide();
				}
			}
		}
		for (let i = 0; i < $('input:file').length; i++) {
			if ($('input:file')[i].files.length == 0) {
				$(`#file${i}`).show();
				break;
			}
		}
		addNewContent();
	});

});


//圖片上傳

function  changeImg(e) {
	let imgCount = 0;
	let file = "";
	for (let i = 0; i < $('input:file').length; i++) {
		if ($('input:file')[i].files.length > 0) {
			imgCount++;
		}
	}
	// console.log(imgCount);
	switch (imgCount) {
		case 0:
			break;
		case 1:
			file = URL.createObjectURL($('input:file')[0].files[0]);
			imgList.push(file);
			addNewContent();
			for (let i = 0; i < $('input:file').length; i++) {
				if ($('input:file')[i].files.length == 0) {
					$(`#file${i}`).show();
					break;
				}
			}
			for (let i = 0; i < $('input:file').length; i++) {
				if ($('input:file')[i].files.length > 0) {
					$(`#file${i}`).hide();
					$(`#file${i}`).val('');
				}
			}
			break;
		case 2:
			file = URL.createObjectURL($('input:file')[1].files[0]);
			imgList.push(file);
			addNewContent();
			$('#file1').show();
			for (let i = 0; i < $('input:file').length; i++) {
				if ($('input:file')[i].files.length == 0) {
					$(`#file${i}`).show();
					break;
				}
			}
			for (let i = 0; i < $('input:file').length; i++) {
				if ($('input:file')[i].files.length > 0) {
					$(`#file${i}`).hide();
					$(`#file${i}`).val('');
				}
			}
			break;
		case 3:
			file = URL.createObjectURL($('input:file')[2].files[0]);
			imgList.push(file);
			addNewContent();
			for (let i = 0; i < $('input:file').length; i++) {
				if ($('input:file')[i].files.length > 0) {
					$(`#file${i}`).hide();
					$(`#file${i}`).val('');
				}
			}
			break;
	}
}



//圖片展示
function addNewContent() {
	let str = '';
	$('.content-img-list').html("");
	for (let i = 0; i < imgList.length; i++) {
		str += `<li class="content-img-list-item"><img src="${imgList[i]}" alt=""><a index="${i}" class="hide delete-btn">刪除</a></li>`;
	}
	$('.content-img-list').html(str);
}

