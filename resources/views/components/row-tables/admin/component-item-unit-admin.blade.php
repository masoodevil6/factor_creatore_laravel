<tr>
    <td class="font-size-12">
        {{$unitKey}}
    </td>
    <td class="font-size-12">
        {{$unitName}}
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.public.unit.destroy" , $unitId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.public.unit.edit" , $unitId)'/>

    </td>
</tr>