<!doctype html>
<html lang="en">
<head>
    <title>@yield("titlePage" , "خانه")</title>

    @include("customer.layouts.head-tag")
    @yield("head-tag")
</head>
<body>

@include("customer.layouts.header")

<section id="main-body-two-col" class="container-xxl body-container">

    @include("public.alerts.alert_section.success")
    @include("public.alerts.alert_section.error")
    @include("public.alerts.alert_section.warning")

    @if(isset($nav))
        @include("customer.public.navigation")
    @endif

    @yield("head-content")

    <section class="row mx-0 mt-3">
        <aside id="sidebar" class="sidebar col-lg-3">
            @yield("sidebar")
        </aside>
        <main id="main-body" class="main-body col-lg-9">
            @yield("main")
        </main>
    </section>

</section>

@include("customer.layouts.footer")

@include("customer.layouts.script")
@yield("scripts")

</body>
</html>