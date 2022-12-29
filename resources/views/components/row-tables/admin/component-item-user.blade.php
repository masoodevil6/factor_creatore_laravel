<tr>
    <td class="font-size-12">
        {{$userKey}}
    </td>
    <td class="font-size-12">
        {{$userFullName}}
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.users.user.status" , $userId)'
                :value='$userStatus'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-drop-down-list-options
                title-fa='پنل ها'
                title-en='userPanel'>

            <x-fields.component-item-drop-down-list-options
                    :url='route("admin.users.user.show" , $userId)'
                    title="مشاهده"
                    icon="fa fa-eye"/>

            <x-fields.component-item-drop-down-list-options
                    :url='route("admin.factors.factor.index" , ["user" => $userFullName])'
                    title="فاکتورها"
                    icon="fa fa-book"/>

            <x-fields.component-item-drop-down-list-options
                    :url='route("admin.users.user-store.index" , ["user" => $userFullName])'
                    title="فروشگاه ها"
                    icon="fa fa-address-card"/>

            <x-fields.component-item-drop-down-list-options
                    :url='route("admin.users.comment.index" , ["user" => $userFullName])'
                    title="نظرات"
                    icon="fas fa-comments"/>


            <x-fields.component-item-drop-down-list-options
                    :url='route("admin.tickets.ticket.index" , ["user" => $userFullName])'
                    title="تکت ها"
                    icon="fa fa-envelope-o"/>


            <x-fields.component-item-drop-down-list-options
                    :url='route("admin.subscribes.subscribe-payment.index" , ["user" => $userFullName])'
                    title="تراکنش اشتراک ها"
                    icon="fa fa-usd"/>


        </x-fields.component-drop-down-list-options>

    </td>
</tr>