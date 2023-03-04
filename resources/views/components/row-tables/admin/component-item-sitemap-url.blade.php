<tr>
    <td class="font-size-12">
        {{$sitemapKey}}
    </td>
    <td class="font-size-12">
        {{$sitemapTitle}}
    </td>
    <td class="font-size-12" style="direction: ltr">
        {{$sitemapUrl}}
    </td>
    <td class="font-size-12">
        {{$sitemapFile}}
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.sitemap.url.destroy" , $sitemapId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.sitemap.url.edit" , $sitemapId)'/>

    </td>
</tr>