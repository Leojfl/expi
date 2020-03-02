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
            if (funSuccess) funSuccess();
        });
        formAjax.fail(function (jqXHR, textStatus) {
            form.toggleClass('d-none');
            loading.remove();
            if (funError) funError();
        });
    });
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
