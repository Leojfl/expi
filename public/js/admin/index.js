const modalId = 'modal-upsert';
$(document).ready(function (e) {
    var url;
    $(document).on('click', '.btn-upsert', function (e) {
        e.preventDefault();
        url = $(this).attr('href');
        makeModalView(modalId, url, (response) => {
            configurationForm();
        });
    });
});

function configurationForm() {
    var formId = 'form-upsert';
    submitFormConfiguration(formId, (response) => {
        console.log("hola");
        $('#' + modalId).modal('hide');
    });
}
