@if(session("alert-sweet-success"))

    <script>
        $(document).ready(function () {
            Swal.fire({
                icon: 'success',
                title: 'عملیات با موفقیت انجام شد',
                text: '{{session("alert-sweet-success")}}',
                confirmButtonText: 'باشه'
            })
        });
    </script>

@endif

