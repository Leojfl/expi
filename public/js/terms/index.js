$(document).ready(function () {
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    $(document).on('click', '.btn-upsert', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var token = $(this).data('token');
        var terms = $('#editor').html();
        console.log(terms)
        $.post(url, {
            '_token': token,
            'terms': terms
        }).done(function (data) {
            $.growl.notice({title: "Correcto", message: "Terminos y condiciones actualizados"});
        });
    });
});
