<section id="inside-panel-view" data-panel="{{$titleEn}}">

    <link rel="stylesheet" href="{{asset("public/sweetalert/sweetalert2.css")}}">
    <meta name="url-get-info-user-factor" content="{{ route("customer-panel.factors.get-info-user-factor") }}" />

    @include("customer-panels.panels.top-title-panel")

    <section id="form-list-user-factor">
        @include("customer-panels.panels.panel-factors.list-factors")
    </section>

    <section id="form-show-user-factor" class="d-none">

    </section>

    <script src="{{asset("public/sweetalert/sweetalert2.all.min.js")}}"></script>
    <script src="{{asset("public/js/delete-form.js")}}"></script>
    <script src="{{asset("customer/customer-panels/factor-panel/factor-panel.js")}}"></script>

</section>