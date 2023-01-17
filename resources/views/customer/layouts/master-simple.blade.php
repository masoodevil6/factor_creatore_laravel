<!doctype html>
<html lang="en">
<head>
    <title>@yield("titlePage" , "خانه")</title>

    @include("customer.layouts.head-tag")
    @yield("head-tag")
</head>
<body dir="rtl">

<main id="main-body-one-col" class="main-body" >

    @include("public.alerts.alert_section.success")
    @include("public.alerts.alert_section.error")
    @include("public.alerts.alert_section.warning")

    @if(isset($nav))
        @include("customer.public.navigation")
    @endif

    @yield("content")
</main>

@include("customer.layouts.script")
@yield("scripts")

</body>
</html>