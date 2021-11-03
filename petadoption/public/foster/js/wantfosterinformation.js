var inpName = $('#userAgree');
let inpCheckbox = $('#inpCheckbox');


//檢查是否有勾選已詳閱，有勾選才可點擊「下一步」按鈕
function btnCheck() {
    let isCheck = inpName.is(":checked");
    if (isCheck) {
        inpCheckbox.removeAttr('disabled');
    } else {
        inpCheckbox.attr('disabled', 'disabled')
    }
}
// 下一步，跳轉到刊登頁面
function btnn() {
    location.href='/fosterlist/create';
}