<tr>
    <td class="font-size-12">
        {{$robotKey}}
    </td>
    <td class="font-size-12">
        {{$robotTitle}}
    </td>
    <td class="font-size-12">
        {{$robotDescription}}
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.seo.robot.destroy" , $robotId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.seo.robot.edit" , $robotId)'/>

    </td>
</tr>