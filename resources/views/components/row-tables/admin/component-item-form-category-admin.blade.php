<tr>
    <td class="font-size-12">
        {{$formCategoryKey}}
    </td>
    <td class="font-size-12">
        {{$formCategoryTitle}}
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.forms.form-category.status" , $formCategoryId)'
                :value='$formCategoryStatus'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.forms.form-category.destroy" , $formCategoryId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.forms.form-category.edit" , $formCategoryId)'/>

    </td>
</tr>