<tr>
    <td class="font-size-12">
        {{$userStoreKey}}
    </td>
    <td class="font-size-12">
        {{$userStoreName}}
    </td>
    <td class="font-size-12">
        {{$userStorePhone}}
    </td>
    <td class="font-size-12">
        {{$userStoreAddress}}
    </td>
    <td class="font-size-12">
        {{$userStoreUserName}}
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.users.user-store.destroy" , $userStoreId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.users.user-store.edit" , $userStoreId)'/>

    </td>
</tr>