<tr>
    <td class="font-size-12">
        {{$appCategoryKey}}
    </td>
    <td class="font-size-12">
        {{$appCategoryName}}
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.apps.category.destroy" , $appCategoryId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.apps.category.edit" , $appCategoryId)'/>

    </td>
</tr>