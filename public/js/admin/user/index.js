const MODAL_ID = 'modal-upsert';
const SWAL_ALERT = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-primary ml-3',
        cancelButton: 'btn btn-info'
    },
    buttonsStyling: false
});


$(document).ready(function (e) {
    var url;
    $(document).on('click', '.btn-upsert', function (e) {
        e.preventDefault();
        url = $(this).attr('href');
        makeModalView(MODAL_ID, url, (response) => {
            configurationForm();
        });
    });
    $(document).on('click', '.btn-update-status', function (e) {
        e.preventDefault();
        url = $(this).attr('href');

        SWAL_ALERT.fire({
            title: '¿Estas seguro?',
            text: "El usuario se desactivara",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.get(url, (reponse) => {
                    SWAL_ALERT.fire(
                        'Desactivado!',
                        'Desactivado correctamente',
                        'success'
                    );
                    location.reload();
                });
            }
        })
    });
});

function configurationForm() {
    var formId = 'form-upsert';
    submitFormConfiguration(formId, (response) => {
        $('#' + MODAL_ID).modal('hide');
        location.reload();
    });
}
