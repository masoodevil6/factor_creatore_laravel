<tr>
    <td class="font-size-12">
        {{$appFileLinkKey}}
    </td>
    <td class="font-size-12">
        {{$appFileLinkName}}
    </td>
    <td class="font-size-12">
        @if(!empty($appFileLinkImage) && $appFileLinkImage != null)
            <img src="{{asset($appFileLinkImage)}}" height="40">
        @else
            ندارد
        @endif

    </td>
    <td class="font-size-12">
        {{$appFileCategory}}
    </td>
    <td class="font-size-12">
        {{$appFile}}
    </td>
    <td class="font-size-12">
        <x-fields.component-input-check-box
                title-fa='وضعیت'
                title-en='status'
                :url='route("admin.apps.link.status" , $appFileLinkId)'
                :value='$appFileLinkStatus'/>
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.apps.link.destroy" , $appFileLinkId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.apps.link.edit" , $appFileLinkId)'/>

    </td>
</tr>