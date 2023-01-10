@if(sizeof($subscribes) > 0)

    <p class="border-bottom font-weight-bold my-2 mt-4">
        اشتراک ها
    </p>

    <x-component-item-subscribe
            :subscribes="$subscribes"/>

    <x-row-tables.admin.component-pageinate-panels
            :list="$subscribes"/>

@endif
