<section id="inside-panel-view" data-panel="{{$titleEn}}">

    <meta name="url-get-list-info-ticket" content="{{ route("customer-panel.tickets-info.get-list-info-ticket") }}" />
    <meta name="url-submit-new-ticket" content="{{ route("customer-panel.tickets-info.submit-new-ticket") }}" />

    @include("customer-panels.panels.top-title-panel")

    <section id="form-list-panel-tickets">
        @include("customer-panels.panels.panel-tickets.list-tickets")
    </section>

    <section id="form-info-panel-tickets" class="d-none">
        @include("customer-panels.panels.panel-tickets.form-info-tickets")
    </section>

    <section id="form-submit-panel-tickets" class="d-none">
        @include("customer-panels.panels.panel-tickets.submit-ticket")
    </section>

    <script src="{{asset("customer/customer-panels/ticket-panel/ticket-panel.js")}}"></script>

</section>
