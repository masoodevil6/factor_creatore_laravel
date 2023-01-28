<?php

namespace App\Http\Controllers\Customer;

use App\Http\Services\File\FileService;
use App\Http\Services\Images\ImageService;
use App\Http\Services\RedirectRoute\RedirectRouteService;
use App\Models\Panel\PanelGroup;
use App\Repositories\ContextRepository;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CustomerMainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public  $setting;
    public  $linkApps;
    function __construct()
    {
        $this-> setting = ContextRepository::SettingRepository()->SetSettingInfoPage();
        $this-> linkApps = ContextRepository::AppFileLinkRepository()->GetListAppFileLink();
    }

}

