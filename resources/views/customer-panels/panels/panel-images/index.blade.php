<section id="inside-panel-view" data-panel="{{$titleEn}}">

    <link rel="stylesheet" href="{{asset("public/sweetalert/sweetalert2.css")}}">

    @include("customer-panels.panels.top-title-panel")

    @include("customer-panels.panels.panel-images.logo")

    @include("customer-panels.panels.panel-images.mohr")

    <script src="{{asset("public/sweetalert/sweetalert2.all.min.js")}}"></script>
    <script src="{{asset("public/js/delete-form.js")}}"></script>
    <script src="{{asset("customer/customer-panels/image-panel/image-panel.js")}}"></script>

</section>