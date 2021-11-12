var staticBackdrop = new bootstrap.Modal(document.getElementById('staticBackdrop'));


//選擇種類改變品種選項
function changeVariety() {
    let animalType = $('#animalType');
    let animalVariety = $('#animalVariety');
    let str = '';
    switch (animalType.val()) {
        case '':
            console.log('沒選擇');
            break;
        case '狗':
            str = `<option value="">請選擇</option>
            <option  value="混種" {{ $varietyvalue == '混種' ? 'selected' : '' }}>混種</option>
            <option  value="米格魯" {{ $varietyvalue == '米格魯' ? 'selected' : '' }}>米格魯</option>
            <option  value="馬爾濟斯" {{ $varietyvalue == '馬爾濟斯' ? 'selected' : '' }}>馬爾濟斯</option>
            <option  value="博美" {{ $varietyvalue == '博美' ? 'selected' : '' }}>博美</option>
            <option  value="柴犬" {{ $varietyvalue == '柴犬' ? 'selected' : '' }}>柴犬</option>
            <option  value="拉不拉多" {{ $varietyvalue == '拉不拉多' ? 'selected' : '' }}>拉不拉多</option>
            <option  value="臘腸" {{ $varietyvalue == '臘腸' ? 'selected' : '' }}>臘腸</option>
            <option  value="吉娃娃" {{ $varietyvalue == '吉娃娃' ? 'selected' : '' }}>吉娃娃</option>
            <option  value="其他" {{ $varietyvalue == '其他' ? 'selected' : '' }}>其他</option>`;
            // console.log("狗");
            break;
        case '貓':
            str = `<option value="">請選擇</option>
            <option  value="混種" {{ $varietyvalue == '混種' ? 'selected' : '' }}>混種</option>
            <option  value="金吉拉" {{ $varietyvalue == '金吉拉' ? 'selected' : '' }}>金吉拉</option>
            <option  value="俄羅斯藍貓" {{ $varietyvalue == '俄羅斯藍貓' ? 'selected' : '' }}>俄羅斯藍貓</option>
            <option  value="英國藍貓" {{ $varietyvalue == '英國藍貓' ? 'selected' : '' }}>英國藍貓</option>
            <option  value="加菲貓" {{ $varietyvalue == '加菲貓' ? 'selected' : '' }}>加菲貓</option>
            <option  value="折耳貓" {{ $varietyvalue == '折耳貓' ? 'selected' : '' }}>折耳貓</option>
            <option  value="波斯" {{ $varietyvalue == '波斯' ? 'selected' : '' }}>波斯</option>
            <option  value="短毛" {{ $varietyvalue == '短毛' ? 'selected' : '' }}>短毛</option>`;
            // console.log('貓');
            break;
        case '其他':
            str = `<option value="">請選擇</option>
            <option  value="鳥類" {{ $varietyvalue == '鳥類' ? 'selected' : '' }}>鳥類</option>
            <option  value="寵物鼠" {{ $varietyvalue == '寵物鼠' ? 'selected' : '' }}>寵物鼠</option>
            <option  value="寵物兔" {{ $varietyvalue == '寵物兔' ? 'selected' : '' }}>寵物兔</option>
            <option  value="陸龜" {{ $varietyvalue == '陸龜' ? 'selected' : '' }}>陸龜</option>
            <option  value="觀賞魚" {{ $varietyvalue == '觀賞魚' ? 'selected' : '' }}>觀賞魚</option>
            <option  value="其他" {{ $varietyvalue == '其他' ? 'selected' : '' }}>其他</option>`;

            // console.log("其他");
            break;
    }
    animalVariety.html(str);
}

function lock(n) {
    let str = n ? '' : `<textarea style="max-height: 200px;" class="border-warning"
        cols="40" rows="6"  name="Reason" required></textarea>`;
    $('#select_else').html(str);
}
$('#select_else').change(function () {
    // $('#userReason5')
    console.log($('#userReason5').val());
    $('#userReason5').val($('#select_else textarea').val())
    console.log($('#userReason5').val());
});

function petDetail(e) {
    $.ajax({
        type: "GET",
        url: "/fosterlist",
        data: {
            pk: e,
        },
        dataType: "text",
        success: function (res) {
            console.log(res);
          console.dir(res);
            
    staticBackdrop.show();
        },
        error: function (err) {
            console.log(err);
        }
    })
};






