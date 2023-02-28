<?php

namespace App\Http\Controllers\Admin\Seo\Page;

use App\Http\Controllers\Admin\MainAdminController;
use Illuminate\Http\Request;

class SeoPageSpicalAdminController extends MainAdminController
{

    function __construct()
    {
        parent::__construct(route("admin.seo.pages.spical.index"));
    }



}
