<tr>

    <td class="font-size-12">
        {{$ticketCategoryKey}}
    </td>
    <td class="font-size-12">
        {{$ticketCategoryTitle}}
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.user.ticket-categories.status" , $ticketCategoryId)'
                :value='$ticketCategoryStatus'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.user.ticket-categories.destroy" , $ticketCategoryId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.user.ticket-categories.edit" , $ticketCategoryId)'/>

    </td>
</tr>