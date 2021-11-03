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
            <option  value="全部">全部</option>
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
            break;
        case '貓':
            str = `<option value="">請選擇</option>
            <option  value="全部">全部</option>
            <option  value="混種">混種</option>
            <option  value="金吉拉">金吉拉</option>
            <option  value="俄羅斯藍貓">俄羅斯藍貓</option>
            <option  value="英國藍貓">英國藍貓</option>
            <option  value="加菲貓">加菲貓</option>
            <option  value="折耳貓">折耳貓</option>
            <option  value="波斯">波斯</option>
            <option  value="短毛">短毛</option>`;
            // console.log('貓');
            break;
        case '其他':
            str = `<option value="">請選擇</option>
            <option  value="全部">全部</option>
            <option  value="鳥類">鳥類</option>
            <option  value="寵物鼠">寵物鼠</option>
            <option  value="寵物兔">寵物兔</option>
            <option  value="陸龜">陸龜</option>
            <option  value="觀賞魚">觀賞魚</option>
            <option  value="其他">其他</option>`;
            // console.log("其他");
            break;
    }
    animalVariety.html(str);
}

function lock(n) {
    let str = n ? '' : `<textarea style="max-height: 200px;" class="border-warning"
        cols="50" rows="6"  name="Note" ></textarea>`;
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






