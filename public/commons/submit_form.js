function submitFormConfiguration(formId, funSuccess, funError) {
    $(document).off('submit', '#' + formId);
    $(document).on('submit', '#' + formId, function (e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var data = new FormData($(this)[0]);
        var formAjax = makeAjaxForm(url, data);
        var loading = makeLoadingForm();
        form.toggleClass('d-none');
        form.parent().append(loading);
        formAjax.done(function (response) {
            form.toggleClass('d-none');
            loading.remove();
            if (response.success) {
                if (funSuccess) funSuccess();
            }
        });
        formAjax.fail(function (jqXHR, textStatus) {
            form.toggleClass('d-none');
            loading.remove();
            if (jqXHR.status === 422) {
                makeError(jqXHR.responseJSON.errors)

            } else {
                if (funError) funError();
            }
        });
    });
}

function makeError(errorsArray) {
    removeSpanError();
    for (var error in errorsArray) {
        var messageError = errorsArray[error][0];
        makeSpanError(error, messageError);
    }

}

function removeSpanError() {
    var input = $('.is-invalid');
    input.removeClass('is-invalid')
    var messageError = $('.invalid-feedback');
    messageError.remove();
}

function makeSpanError(name, messageError) {
    var input = $('input[ name=' + name + ' ]');
    input.addClass('is-invalid');
    input.parent().append($('<div>', {class: 'invalid-feedback', html: messageError}))
}

function makeAjaxForm(url, data) {
    return $.ajax({
        method: "POST",
        url: url,
        data: data,
        processData: false,
        contentType: false
    })
}

function makeLoadingForm() {
    return $('<div>', {
        class: 'col-md-12 text-center ',
    }).append(
        $('<div>', {class: 'loader'})
    );
}
