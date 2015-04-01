var Resizer = function ($el) {
    this.navbarHeight = 51;
    var _that = this;

    this.adjustHeight = function () {
        var wrapperHeight = $(document).height() - _that.navbarHeight;
        $el.height(wrapperHeight);
    }
};

var IWB = function () {
    var _this = this;

    this.error = function ($el, text) {
        if ($el[0].tagName === 'INPUT' || $el[0].tagName === 'TEXTAREA') {
            $el.closest('.form-group').addClass('has-error');
            $el.after($('<span class="error-text" />').text(text));
        }
    }

    this.showError = function (errors) {
        $.each(errors, function (k, v) {
            if ($('[name=' + k + ']').length > 0) {
                _this.error($('[name=' + k + ']'), v);
            }
        });
    }

    this.hideError = function () {
        $.each($('.form-group.has-error'), function (k, v) {
            $(v).removeClass('has-error');
            $(v).find('.error-text').remove();
        });
    }


    $('#addWB').click(function (e) {
        e.preventDefault();

        Helper.showLoader($('#page-wrapper > div'));

        $.ajax({
            url: "/add/api",
            dataType: "json",
            method: "POST",
            data: $("form[name=addWB]").serializeArray()
        }).always(function (responce) {
            if (!responce.result.success) {
                _this.hideError();

                _this.showError(responce.result.error);

                Helper.hideLoader($('#page-wrapper > div'));

                window.resizer.adjustHeight();
            } else {
                window.location.href = '/';
            }
        });
    });

    $('.deleteWB').click(function (e) {
        e.preventDefault();

        Helper.showLoader($('#page-wrapper > div'));

        $.ajax({
            url: "/delete/api",
            dataType: "json",
            method: "POST",
            data: {
                'smgs_id': $(this).attr('data-id')
            }
        }).always(function (responce) {
            if (responce.result.success) {
                window.location.href = '/';
            } else {
                Helper.hideLoader($('#page-wrapper > div'));
            }
        });
    });

    return this;
};

$(document).ready(function () {
    $("#logout").click(function (e) {
        e.preventDefault();

        window.location.href = "/auth/logout";
    });

    window.resizer = new Resizer($("#page-wrapper"));
    window.resizer.adjustHeight();
    $(window).resize(function () {
        window.resizer.adjustHeight();
    });

    new IWB();
});