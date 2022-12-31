<section id="inside-panel-view" data-panel="{{$titleEn}}">

    @include("customer-panels.panels.top-title-panel")

    <section id="form-all-panel-personal-customer">
        @include("customer-panels.panels.panel-personal-info.info-client")
        @include("customer-panels.panels.panel-personal-info.phone-client")
        @include("customer-panels.panels.panel-personal-info.email-client")
    </section>


    @if($user->email == "" || $user->phone == "")

        <meta name="url-send-email-or-phone-client" content="{{ route("customer-panel.persional-info.send-verify-phone-or-email") }}" />
        <meta name="url-verify-email-or-phone-client" content="{{ route("customer-panel.persional-info.verify-phone-or-email") }}" />
        <section id="form-check-code-panel-personal-customer" class="mt-md-2 mt-0 d-none">
            @include("customer-panels.panels.panel-personal-info.verify-code-email-or-phone")
        </section>

        <script src="{{asset("customer/customer-panels/personal-panel/personal-panel.js")}}"></script>
    @endif

</section>
