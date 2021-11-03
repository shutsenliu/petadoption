
// 管理者登入頁登入驗證
    function login1() {
      var dblogin = document.db_login1;
      var acc = dblogin.db_acc.value;
      var pwd = dblogin.db_pwd.value;
      if (acc == "" || pwd == "") {
        alert("輸入框不可為空白!");
        return false;
      }
      // else if ((acc == "") && (pwd == "")) {
      //   location.href = 'member.html';
      //   return true;
      // }
      // else {
      //   alert("帳號或密碼輸入錯誤，請重新輸入!");
      //   location.href = 'db_login.html';
      //   return false;
      // }
    }

// 修改管理者密碼頁驗證
    function changepassword() {
        var c = document.change_pwd;
        var n1p = c.new1_pwd.value;
        var n2p = c.new2_pwd.value;
        if (n1p == "" || n2p == "") {
          alert("輸入框不可為空白!");
          return false;
        }
        if (n1p != n2p) {
          alert("兩次密碼輸入不一致!");
          return false;
        }
        if (n1p = n2p) {
          alert("修改成功，請重新登入");
          // location.href = 'db_change_pwd.html'
          // return false;
        }
      }

