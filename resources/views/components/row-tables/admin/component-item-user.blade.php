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

        <x-fields.component-button
                btn-type='custom'
                btn-icon='fa fa-eye'
                title="مشاهده"
                :url='route("admin.users.user.show" , $userId)'/>

        <x-fields.component-button
                btn-type='custom'
                btn-icon='fa fa-book'
                title="فاکتور ها"
                :url='route("admin.users.user.factors" , $userId)'/>

    </td>
</tr>