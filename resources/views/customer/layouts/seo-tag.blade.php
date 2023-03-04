<meta name="language" content="fa">
@if(isset($meta) && isset($meta["title"]) )
    <title>{{$meta["title"]}}</title>
@else
    <title>@yield("titlePage" , "خانه")</title>
@endif
@if(isset($meta) && isset($meta["description"]) )
    <meta name="description" content="{{$meta["description"]}}">
@endif
@if(isset($meta) && isset($meta["keywords"]) )
    <meta name="keywords" content="{{ $meta["keywords"]}}">
@endif
@if(isset($meta) && isset($meta["robots"]) )
    <meta name="robots" content="{{ $meta["robots"]}}">
@else
    <meta name="robots" content="none">
@endif
@if(isset($siteName) && isset($siteName["site_name_fa"]) )
    <meta name="site_name" content="{{ $siteName["site_name_fa"]}}">
@endif
@if(isset($routeCanonical) && !empty($routeCanonical) )
    <meta name="canonical" content="{{$routeCanonical}}">
@endif
<meta name="theme-color" content="#ffc107">