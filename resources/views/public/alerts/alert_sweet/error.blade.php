@if(session("alert-sweet-error"))

    <script>
        $(document).ready(function () {
            Swal.fire({
                icon: 'error',
                title: 'خظا...',
                text: '{{session("alert-sweet-error")}}',
                confirmButtonText: 'باشه'
            })
        });
    </script>

@endif