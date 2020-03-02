$(document).ready(function (e) {
    const modalId = 'modal-upsert';
    const formId = '';
    var url;
    $(document).on('click', '.btn-upsert', function (e) {
        e.preventDefault();
        url = $(this).attr('href');
        makeModalView(modalId, url, () => {
            configurationForm();
        });
    });
});

function configurationForm() {

}
