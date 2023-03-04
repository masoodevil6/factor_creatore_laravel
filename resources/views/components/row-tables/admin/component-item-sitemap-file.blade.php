<tr>
    <td class="font-size-12">
        {{$sitemapKey}}
    </td>
    <td class="font-size-12">
        {{$sitemapTitleFa}}
    </td>
    <td class="font-size-12">
        {{$sitemapTitleEn}}
    </td>
    <td class="text-left font-size-12 py-2">

        <x-fields.component-button
                btn-type='delete'
                :url='route("admin.sitemap.file.destroy" , $sitemapId)'/>

        <x-fields.component-button
                btn-type='edit'
                :url='route("admin.sitemap.file.edit" , $sitemapId)'/>

        <x-fields.component-button
                btn-type='custom'
                btn-icon="fa fa-download"
                title="فایل تست"
                :url='route("admin.sitemap.url.index" , ["file" => $sitemapId])'/>

    </td>
</tr>