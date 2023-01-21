<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\Forms\FactorService;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

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


}
