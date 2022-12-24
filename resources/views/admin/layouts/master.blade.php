<!doctype html>
<html lang="en">
<head>
    <title>@yield("titlePage" , "admin")</title>

    @include("admin.layouts.head-tag")
    @yield("head-tag")
    @include("admin.layouts.scripts")
</head>

<body dir="rtl">

@include("admin.layouts.header-tag")

<main class="body-container">

    @include("admin.layouts.sidebar")

    <section id="main-body" class="main-body pt-2">

        @if(isset($nav))
            @include("admin.layouts.component-nav-admin")
        @endif

        <section class="mx-3">
            @include("public.alerts.alert_section.info")
            @include("public.alerts.alert_section.warning")
            @include("public.alerts.alert_section.error")
            @include("public.alerts.alert_section.success")
        </section>

            <section class="mx-2">
                @yield("content")
            </section>


    </section>



</main>


<footer>


    @yield("footer-tag")

    <section class="toast-wrapper flex-row-reverse">

        @include("public.alerts.alert_toast.success")
        @include("public.alerts.alert_toast.error")

        @include("public.alerts.alert_sweet.success")
        @include("public.alerts.alert_sweet.error")

    </section>

    @if(session("alert-toast-error") || session("alert-toast-success"))
        <script>
            $(document).ready(function () {
                $('.toast').toast('show');
            });
        </script>
    @endif

</footer>

</body>
</html>