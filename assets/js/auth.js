$(document).ready(function () {
    $("#login-button").click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "/auth/login",
            method: "POST",
            dataType: "json",
            data: $("#login-form").serialize()
        }).success(function (responce) {
            if (responce.error === 1) {
                $("#login-form").find(".error_string").html(responce.error_string);
            } else {
                window.location.href = "/";
            }
        });
    });
});