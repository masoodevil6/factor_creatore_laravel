<tr>
    <td class="font-size-12">
        {{$adminKey}}
    </td>
    <td class="font-size-12">
        {{$adminTitle}}
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.panel.admin.status" , $adminId)'
                :value='$adminStatus'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.panel.admin.destroy" , $adminId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.panel.admin.edit" , $adminId)'/>

        <x-fields.component-button
                btn-type='custom'
                title='دسترسی ها'
                btn-icon='fa fa-th-list'
                :url='route("admin.panel.admin.panels" , $adminId)'/>

    </td>
</tr>