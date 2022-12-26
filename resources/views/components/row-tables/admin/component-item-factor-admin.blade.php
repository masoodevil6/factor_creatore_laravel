<tr>
    <td class="font-size-12">
        {{$factorKey}}
    </td>
    <td class="font-size-12">
        {{$factorResNum}}
    </td>
    <td class="font-size-12">
        {{$factorUserName}}
    </td>
    <td class="font-size-12">
        {{$factorFormName}}
    </td>
    <td class="font-size-12">
        {{$factorDate}}
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.factors.factor.status" , $factorId)'
                :value='$factorStatus'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.factors.factor.destroy" , $factorId)'/>

        <x-fields.component-button
                btn-type='custom'
                btn-icon='fa fa-eye'
                title="مشاهده"
                :url='route("admin.factors.factor.show" , $factorId)'/>

        <x-fields.component-button
                btn-type='custom'
                btn-icon='fa fa-download'
                btn-color='btn-info'
                title="دانلود"
                :url='route("admin.factors.factor.download" , $factorId)'/>

    </td>
</tr>