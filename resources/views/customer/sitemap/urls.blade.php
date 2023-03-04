<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach($sitemapfile->sitmapUrls as $sitemapUrl)

        <sitemap>

            <loc>{{$sitemapUrl->url}}</loc>

            <lastmod>{{date('Y-m-d',  strtotime($sitemapUrl->created_at))}}</lastmod>

            @if(isset($sitemapUrl->priority) && $sitemapUrl->priority != null)
                <priority>{{$sitemapUrl->priority}}</priority>
            @endif

            @if(isset($sitemapUrl->changefreq) && $sitemapUrl->changefreq != null)
                <changefreq>{{$sitemapUrl->changefreq}}</changefreq>
            @endif

        </sitemap>

    @endforeach

</urlset>