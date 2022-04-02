$(document).ready(function () {
  setTitle("Login");
  $(".login #btnLogin").click(() => {
    const username = $(".login #username").val();
    const password = $(".login #password").val();
    if (checkLogin(username, password)) {
      $.post(
        urlAjax("users", "getUsersByUsernameAndPassword"),
        {
          username: username,
          password: password,
        },
        (result) => {
          const data = JSON.parse(result)
          if(data.length > 0){
            location.assign("home")
          }
        }
      );
    }
  });
  const checkLogin = (username, password) => {
    if (username.length == 0) {
      alert("Vui lòng nhập tài khoản");
      return false;
    }
    if (password.length == 0) {
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
});
