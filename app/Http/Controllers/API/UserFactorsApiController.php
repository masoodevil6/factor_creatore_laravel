<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\Forms\FactorService;
use App\Http\Services\Forms\SubscribeFormService;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserFactorsApiController extends Controller
{



    /*
     * ====================================
     *  url=> /user/factors/search
     *====================================
     * Get => _?search=""
     * ====================================
     * object factors
     */
    public function searchUserFactors(Request $request){
        return ContextRepository::FactorRepository()->GetFactorAuthAuthUser(0);
    }





    /*
     * ====================================
     *  url=> /user/factors/delete
     *====================================
     * Get => _?search=""
     * Post => resNum
     * ====================================
     * object factors
     */
    public function deleteUserFactors(Request $request){

        if (isset($request->resNum)){
            ContextRepository::FactorRepository()->DeleteSelectedFactorAuthUser($request->resNum);
        }
        return $this->searchUserFactors($request);
    }



    /*
     * ====================================
     *  url=> /user/factors/download/
     *====================================
     * Post => resNum
     * ====================================
     * file pdf for download
     */
    public function downloadUserFactors(Request $request){

        if (isset($request->resNum)){
            $factor = ContextRepository::FactorRepository()->GetInfoSelectedFactorAuthUser($request->resNum);

            $factorService = new FactorService();
            
            return $factorService->downloadFactor($factor);
        }
        return abort(404);
    }





    /*
     * ====================================
     *  url=> /user/factors/request-create-factor
     *====================================
     * post => dataFactorTemplate (object)
     * ImageLogo
     * Imagemohr
     * ====================================
     * ["form" => null , "route" => "" ]
     */
    public function RequestCreateFactor(Request $request , SubscribeFormService $subscribeFormService , FactorService $factorService){

        $factorData = $request->factor_template;

        $statusFormSubscribe = $subscribeFormService->endProcessSelectForm($factorData["form_id"]);

        if (empty($statusFormSubscribe["route"]) && $statusFormSubscribe["form"] != null){


            $logoFile = null;
            if (isset($request->logo) And $request->logo != null){
                $logoFile = base64_decode($request->logo);
            }
            $mohrFile = null;
            if (isset($request->mohr) And $request->mohr != null){
                $mohrFile = base64_decode($request->mohr);
            }

            $factor = ContextRepository::FactorRepository()->GenerateFactorFromApiFactor($factorData ,$logoFile , $mohrFile);

            $factorService->generateFactor($factor);

            if (isset($factor["res_num"])){
                return $factor["res_num"];
            }
        }

        return abort(404);

    }

}

