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
        <x-row-tables.admin.component-drop-down-list-user-panels
                :user-id='$userId'
                :user-name="$userFullName"/>
    </td>
</tr>