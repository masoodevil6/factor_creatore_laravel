<tr>
    <td class="font-size-12">
        {{$userAdminKey}}
    </td>
    <td class="font-size-12">
        {{$userName}}
    </td>
    <td class="font-size-12">
        {{$userEmail}}
    </td>
    <td class="font-size-12">
        {{$adminTitle}}
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.panel.user-admin.status" , $userEmail)'
                :value='$userAdminStatus'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.panel.user-admin.destroy" , $userEmail)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.panel.user-admin.edit" , $userEmail)'/>

    </td>
</tr>