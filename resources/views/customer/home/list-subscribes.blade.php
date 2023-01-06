@if(sizeof($subscribeSelected) > 0)
    <p class="border-bottom font-weight-bold my-2 mt-4">
        اشتراک های منتخب
    </p>

    <x-component-item-subscribe
            :subscribes="$subscribeSelected"/>

@endif



