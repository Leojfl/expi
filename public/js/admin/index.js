const modalId = 'modal-upsert';
const swalWithBootstrapButtons = Swal.mixin({
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
        makeModalView(modalId, url, (response) => {
            configurationForm();
        });
    });
    $(document).on('click', '.btn-update-status', function (e) {
        e.preventDefault();
        url = $(this).attr('href');

        swalWithBootstrapButtons.fire({
            title: '¿Estas seguro?',
            text: "El usuario se desactivara",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swalWithBootstrapButtons.fire(
                    'Desactivado!',
                    'Desactivado correctamente',
                    'success'
                )
                $.post();
            }
        })
    });
});

function configurationForm() {
    var formId = 'form-upsert';
    submitFormConfiguration(formId, (response) => {
        $('#' + modalId).modal('hide');
        location.reload();
    });
}
