<section id="inside-panel-view" data-panel="{{$titleEn}}">

    <link rel="stylesheet" href="{{asset("public/sweetalert/sweetalert2.css")}}">
    <meta name="url-get-info-user-store" content="{{ route("customer-panel.stores.get-info-user-store") }}" />
    <meta name="url-submit-new-user-store" content="{{ route("customer-panel.stores.submit-new-user-store") }}" />

    @include("customer-panels.panels.top-title-panel")

    <section id="form-list-user-store">
        @include("customer-panels.panels.stores-panel.list-store")
    </section>

    <section id="form-add-or-edit-user-store" class="d-none">

    </section>

    <script src="{{asset("public/sweetalert/sweetalert2.all.min.js")}}"></script>
    <script src="{{asset("public/js/delete-form.js")}}"></script>
    <script src="{{asset("customer/customer-panels/stores-panel/stores-panel.js")}}"></script>

</section>