$(document).ready(function (e) {
    const modalId = 'modal-upsert';
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
    });
}
