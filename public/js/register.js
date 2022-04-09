$(document).ready(function () {

    setTitle("Đăng ký");

    const error = $('.register .error')
    const span = $('.register .error span')
    const username = $('.register #username');
    const password = $('.register #password');
    const confirm = $('.register #confirm');
    const name = $('.register #name');

    $('.register #btnRegister').click(() => {
        if (checkRegister(username.val(), password.val(), confirm.val(), name.val())) {
            if (checkConfirmPassword(password.val(), confirm.val())) {
                $.post(
                    urlAjax("users", "add"),
                    {
                        username: username.val(),
                        password: password.val(),
                        name: name.val()
                    },
                    (res) => {
                        const rs = JSON.parse(res)
                        if (rs.num > 0) {
                            alert("Đăng ký thành công!");
                            location.replace("login");
                        } else {
                            showError(rs.message)
                        }
                    }
                );
            }
        }
    })

    const checkRegister = (username, password, confirm, name) => {
        if (username.length < 4) {
            span.html("Tài khoản ít nhất 4 ký tự");
            error.css("display", "block");
            return false;
        }
        if (password.length < 8) {
            span.html("Mật khẩu ít nhất 8 ký tự");
            error.css("display", "block");
            return false;
        }
        if (confirm.length < 8) {
            span.html("Tài khoản ít nhất 8 ký tự");
            error.css("display", "block");
            return false;
        }
        if (name.length < 2) {
            span.html("Tên hiển thị ít nhất 2 ký tự");
            error.css("display", "block");
            return false;
        }
        return true;
    }

    const checkConfirmPassword = (password, confirm) => {
        if (password !== confirm) {
            showError("Nhập lại mật khẩu không chính xác!")
            return false
        }
        return true;
    }

    const showError = (err) => {
        span.html(err);
        error.css("display", "block");
    }

    // username.keypress((e) => {
    //     handleKeyPressEnter(e);
    // });

    // password.keypress((e) => {
    // handleKeyPressEnter(e);
    // });

    // confirm.keypress((e) => {
    //     handleKeyPressEnter(e);
    // });

    // name.keypress((e) => {
    //     handleKeyPressEnter(e);
    // });

    // const handleKeyPressEnter = (e) => {
    //     // if (e.keyCode === 13) {
    //     //     e.preventDefault();

    //     // }
    //     $(".register #btnRegister").click();
    // };
})