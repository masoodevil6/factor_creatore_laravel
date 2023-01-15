<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf factor saze</title>

    @include("forms.layouts.head-tag")
    @yield("head-tag")
</head>
<body>

<main class="container direction_rtl p-2 " >

    <div id="info-pager">
        <style>
            @page {
                odd-header-name: odd-header;
                odd-footer-name: odd-footer;
            }
        </style>


        <htmlpageheader name="odd-header">
            <div id="app-name">  {{$appName}} </div>
        </htmlpageheader>


        <htmlpagefooter name="odd-footer">

            <div style="float:right; width: 50%;">
                {{$appName}}
            </div>

            <div style="float:left; width: 40%; text-align: right;">Page {PAGENO} of {nb}</div>
        </htmlpagefooter>
    </div>




    @yield("content")

</main>

@yield("scripts")

</body>
</html>




