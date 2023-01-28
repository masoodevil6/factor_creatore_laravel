<tr>
    <td class="font-size-12">
        {{$appFileKey}}
    </td>
    <td class="font-size-12">
        {{$appFileName}}
    </td>
    <td class="font-size-12">
        {{$appFileVersion}}
    </td>
    <td class="font-size-12">
        {{$appFileFormat}}
    </td>
    <td class="font-size-12">
        {{$appFileSize}}
    </td>
    <td class="font-size-12">
        {{$appFileCategory}}
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.apps.file.destroy" , $appFileId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.apps.file.edit" , $appFileId)'/>

    </td>
</tr>