<tr>
    <td class="font-size-12">
        {{$bankKey}}
    </td>
    <td class="font-size-12">
        {{$bankTitle}}
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.banks.bank.status" , $bankId)'
                :value='$bankStatus'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.banks.bank.destroy" , $bankId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.banks.bank.edit" , $bankId)'/>

    </td>
</tr>