<tr>
    <td class="font-size-12">
        {{$pageKey}}
    </td>
    <td class="font-size-12">
        {{$pageTitle}}
    </td>
    <td class="font-size-12">
        {{$pageSeoTitle}}
    </td>
    <td class="font-size-12">
        {{$pageSeoDescription}}
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.seo.pages.spical.info" , $pageId)'/>

    </td>
</tr>