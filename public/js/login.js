$(document).ready(function () {

  setTitle("Đăng nhập");

  const error = $('.login .error')
  const span = $('.login .error span')
  const username = $(".login #username");
  const password = $(".login #password");


  $(".login #btnLogin").click(() => {
    if (checkLogin(username.val(), password.val())) {
      $.post(
        urlAjax("users", "getUsersByUsernameAndPassword"),
        {
          username: username.val(),
          password: password.val(),
        },
        (result) => {
          const data = JSON.parse(result)
          if (data.login) {
            location.replace("home")
          } else {
            showError(data.message)
          }
        }
      );
    }
  });
  const checkLogin = (username, password) => {
    if (username.length == 0) {
      showError("Vui lòng nhập tài khoản!");
      return false;
    }
    if (password.length == 0) {
      showError("Vui lòng nhập mật khẩu!");
      return false;
    }
    return true;
  };

  $(".login #username").keypress((e) => {
    handleKeyPressEnter(e);
  });
  $(".login #password").keypress((e) => {
    handleKeyPressEnter(e);
  });

  const handleKeyPressEnter = (e) => {
    if (e.keyCode === 13) {
      e.preventDefault();
      $(".login #btnLogin").click();
    }
  };

  username.change(function(){
    hideError()
  })

  password.change(function(){
    hideError()
  })

  const showError = (err) => {
    span.html(err);
    error.css("display", "block");
  }

  const hideError = () => {
    span.html("");
    error.css("display", "none");
  }
});
