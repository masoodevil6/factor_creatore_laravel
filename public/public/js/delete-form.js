function goToConfirmDeleteForm(element , doConfirm=false) {
    if (doConfirm){
        submitForm(element)
    }
    else {
        swalConfirmDelete(submitForm , element)
    }
}

function submitForm(element) {
    $(element).parent().submit();
}

function swalConfirmDelete(callback , element) {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-2',
            cancelButton: 'btn btn-danger mx-2'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: 'آیا مطمئن می باشید؟',
        text: "شما می توانید درخواست خود را لغو کنید",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'بله',
        cancelButtonText: 'خیر',
        reverseButtons: true
    }).then(function (result) {
        if (result.value == true){
            callback(element);
        }
        else if(result.dismiss === swal.DismissReason.cancel){
            swalWithBootstrapButtons.fire({
                title: 'لغو درخواست',
                text: "درخواست شما لغو شد",
                icon: 'error',
                confirmButtonText: 'باشه'
            });
        }
    });

}