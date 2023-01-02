<tr>
    <td class="font-size-12">
        {{$formKey}}
    </td>
    <td class="font-size-12">
        {{$formName}}
    </td>
    <td class="font-size-12">
        <img src="{{asset($formImage)}}" height="60">
    </td>
    <td class="font-size-12">
        {{$formCategory}}
    </td>
    <td class="font-size-12">
        {{$formSubscribe}}
    </td>
    <td class="font-size-12">
        {{$formClass}}
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.forms.form.status" , $formId)'
                :value='$formStatus'/>
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='منتخب'
                title-en='selected'
                :url='route("admin.forms.form.selected" , $formId)'
                :value='$formSelected'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.forms.form.destroy" , $formId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.forms.form.edit" , $formId)'/>

    </td>
</tr>