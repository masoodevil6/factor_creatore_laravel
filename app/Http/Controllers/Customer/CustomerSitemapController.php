<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class CustomerSitemapController extends Controller
{

    function index(){
        $sitemapFiles = ContextRepository::SitemapFileRepository()->getAllResult();

        return response()->view('customer.sitemap.index', compact("sitemapFiles"))
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }

    function urls($fileName){
        $sitemapfile = ContextRepository::SitemapFileRepository()->getSitemapUrlsInSitemapFile($fileName);
        if (!empty($sitemapfile)){
            return response()->view('customer.sitemap.urls', compact("sitemapfile"))
                ->header('Content-Type', 'application/xml; charset=utf-8');
        }
        else{
            return redirect()->route("customer.subscribes.index");
        }
    }

}
