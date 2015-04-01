/**
 * Makes inaccessible jquery element
 * and shows loader
 */
var Helper = function () {

};

Helper.showLoader = function (area, loaderClass) {
    var hide = $('<div class="formHide"></div>'),
            loader;

    if (loaderClass !== undefined) {
        loader = $('<div class="loader ' + loaderClass + '"></div>');
    } else {
        loader = $('<div class="loader formLoader"></div>');
    }

    hide.css({
        'width': area.width(),
        'height': area.height()
    });
    loader.css({
        'margin-top': (area.height() / 2),
        'margin-left': (area.width() / 2)
    });
    area.prepend(hide);
    area.prepend(loader);
};

/**
 * Removes loader layers from
 * jquery element
 */
Helper.hideLoader = function (area) {
    area.children('.formHide').remove();
    area.children('.loader').remove();
};