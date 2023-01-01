<section id="inside-panel-view" data-panel="{{$titleEn}}">

    <link rel="stylesheet" href="{{asset("public/sweetalert/sweetalert2.css")}}">
    <meta name="url-get-info-user-subscribe" content="{{ route("customer-panel.subscribes.get-info-user-subscribe") }}" />

    @include("customer-panels.panels.top-title-panel")

    <section id="form-list-user-store">
        @include("customer-panels.panels.panel-subscribes.list-subscribes")
    </section>

    <section id="form-show-user-subscribe" class="d-none">

    </section>

    <script src="{{asset("public/sweetalert/sweetalert2.all.min.js")}}"></script>
    <script src="{{asset("public/js/delete-form.js")}}"></script>
    <script src="{{asset("customer/customer-panels/subscribe-panel/subscribe-panel.js")}}"></script>

</section>