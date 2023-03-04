<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach($sitemapFiles as $itemSitemapFile)

        <sitemap>

            <loc>
                {{route("customer.subscribes.info" , $itemSitemapFile->title_en)}}
            </loc>

            <lastmod>{{date('Y-m-d',  strtotime($itemSitemapFile->created_at))}}</lastmod>

        </sitemap>

    @endforeach

</sitemapindex>

