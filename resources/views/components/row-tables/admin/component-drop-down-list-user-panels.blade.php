<x-fields.component-drop-down-list-options
        title-fa='پنل ها'
        title-en='userPanel'>

    <x-fields.component-item-drop-down-list-options
            :url='route("admin.users.user.show" , $userId)'
            title="مشاهده"
            icon="fa fa-eye"/>

    <x-fields.component-item-drop-down-list-options
            :url='route("admin.factors.factor.index" , ["user" => $userName])'
            title="فاکتورها"
            icon="fa fa-book"/>

    <x-fields.component-item-drop-down-list-options
            :url='route("admin.users.user-store.index" , ["user" => $userName])'
            title="فروشگاه ها"
            icon="fa fa-address-card"/>

    <x-fields.component-item-drop-down-list-options
            :url='route("admin.users.comment.index" , ["user" => $userName])'
            title="نظرات"
            icon="fas fa-comments"/>


    <x-fields.component-item-drop-down-list-options
            :url='route("admin.tickets.ticket.index" , ["user" => $userName])'
            title="تکت ها"
            icon="fa fa-envelope-o"/>


    <x-fields.component-item-drop-down-list-options
            :url='route("admin.subscribes.subscribe-payment.index" , ["user" => $userName])'
            title="تراکنش اشتراک ها"
            icon="fa fa-usd"/>


</x-fields.component-drop-down-list-options>