const signup = document.querySelector(".t-signup");
const login = document.querySelector(".t-login");
const addClass = document.querySelector(".site");
signup.addEventListener("click", function () {
    addClass.className = "site signup-show";
});
login.addEventListener("click", function () {
    addClass.className = "site login-show";
});

$(document).ready(function () {
    // Register
    $("#registerForm").submit(function () {
        var formData = $(this).serialize();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            url: "/user/register",
            type: "post",
            success: function (resp) {
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $("#register-" + i).html(error);
                        $("#register-" + i).css({ display: "block" });
                        setTimeout(function () {
                            $("#register-" + i).css({ display: "none" });
                        }, 2000);
                    });
                } else if (resp.type == "success") {
                    window.location.href = resp.url;
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    // Login
    $("#loginForm").submit(function () {
        var formData = $(this).serialize();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: formData,
            url: "/user/login",
            type: "post",
            success: function (resp) {
                if (resp.type == "error") {
                    $.each(resp.errors, function (i, error) {
                        $("#login-" + i).html(error);
                        $("#login-" + i).css({ display: "block" });
                        setTimeout(function () {
                            $("#login-" + i).css({ display: "none" });
                        }, 2000);
                    });
                } else if (resp.type == "success") {
                    window.location.href = resp.url;
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });
});
