function makeLoading() {
    return $('<div>', {
        class: 'col-md-12 text-center ',
    }).append(
        $('<div>', {class: 'loader'})
    );
}

function makeAjax(url) {
    return $.ajax({
        method: "GET",
        url: url,
    })
}

function makeModalView(modalId, url, funSuccess, funError) {
    var $loading = makeLoading();
    var modal = $('#' + modalId);
    var $modalBody = modal.find('.modal-body');
    var $ajax = makeAjax(url);
    $modalBody.html($loading);
    modal.modal('show');
    $ajax.done(function (response) {
        $modalBody.html(response);
        if (funSuccess) funSuccess();
    });
    $ajax.fail(function (jqXHR, textStatus) {
        $loading.remove();
        if (funError) funError();
    });
}








