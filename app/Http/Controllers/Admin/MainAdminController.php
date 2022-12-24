<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\File\FileService;
use App\Http\Services\Images\ImageService;
use App\Http\Services\RedirectRoute\RedirectRouteService;
use App\Models\Panel\PanelGroup;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MainAdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //use Authenticated ;


    protected $routeRedirect = "";
    protected $routeAccess = "";
    protected $enableUpload = false;

    function __construct($routeRedirect="", $enableUpload = false  , $routeAccess="" )
    {
        $this->routeRedirect = $routeRedirect;
        $this->enableUpload = $enableUpload;
        $this->routeAccess = $routeAccess;

        $this->middleware(function ($request, $next) {
            $this -> checkAccessAdminPanels();
            return $next($request);
        });

    }




    //// redirect service
    protected function redirectIndex($titleMsg , $errorMessage=false , $orderRoot=""){
        if ($this->routeRedirect != ""){
            $RedirectRouteService = new RedirectRouteService();
            $RedirectRouteService::setMsgResultText($titleMsg)->setRouteRedirect($this->routeRedirect);
            if ($orderRoot != ""){
                $RedirectRouteService->setRouteRedirect($orderRoot);
            }
            if ($errorMessage){
                $RedirectRouteService->doRedirectRouteErrorResult();
            }
            return $RedirectRouteService->doRedirect();
        }
        else{
            return RedirectRouteService::setMsgResultText("عدم دسترسی مجاز")
                ->setRouteRedirect(route("admin.home"))
                ->doRedirect();
        }
    }


    //// upload image service
    protected function uploadImageServer($fileImage , $directory="" , $dataLastImage=null , $multiUpload=true , $fileName="" , $singleFileInDirectory=false){
        if ($this -> enableUpload){
            $imageService = new ImageService();

            $resultUploadImage =[];
            if ($dataLastImage != null){
                if ($multiUpload == true){
                    if(isset($dataLastImage["directory"]))
                    {
                        $imageService->deleteIndex($dataLastImage);
                    }
                }
                else{

                    $imageService->deleteImage($dataLastImage);
                }
            }


            $imageService->setExclusiveDirectory($directory);

            if ($fileName != ""){
                $imageService -> setImageName($fileName);
            }

            $resultUploadImage = false;
            if ($multiUpload == true){
                $resultUploadImage = $imageService -> createIndexAndSave($fileImage , $singleFileInDirectory);
            }else{
                $resultUploadImage = $imageService -> save($fileImage , $singleFileInDirectory);
            }

            if (!$resultUploadImage){
                return $this->redirectIndex("آپلود تصویر با خطا مواجه شد" , true);
            }

            return $resultUploadImage;
        }

        return false;
    }


    //// upload file service
    protected function uploadFileServer($file , $directory="" , $dataLastFile=null , $fileName="" , $publicPath=true , $singleFileInDirectory=false){
        if ($this -> enableUpload){
            $fileService = new FileService();

            $resultUploadFile =[];
            if ($dataLastFile != null){
                $fileService->deleteFile($dataLastFile , $publicPath);
            }


            $fileService->setExclusiveDirectory($directory);
            $fileService->setFileSize($file);

            if ($fileName != ""){
                $fileService -> setFileName($fileName);
            }

            if ($publicPath){
                $result = $fileService -> moveToPublic($file , $singleFileInDirectory);
            }
            else{
                $result = $fileService -> moveToStorage($file , $singleFileInDirectory);
            }


            if (!$result){
                return $this->redirectIndex("آپلود فایل با خطا مواجه شد" , true);
            }


            return [
                "status" => $result ,
                "fileSize" => $fileService->getFileSize() ,
                "fileFormat" => $fileService->getFileFormat() ,
                "fileLocation" => $fileService->getFileAddress()
            ];
        }

        return false;

    }


    //// formate date
    protected function returnDateTextFormat($timeStamp){
        return date("Y-m-d H:i:s" ,($timeStamp)/1000);
    }


    //// change status 0 and 1
    protected function changeStatus(Model $model , $field="status" , $defaultValue=null)
    {
        $gotoRequest = false;
        if ($defaultValue == null){
            $gotoRequest = true;
        }
        else{
            if (in_array($defaultValue, [0 , 1])){
                $gotoRequest = true;
            }
        }

        if ($gotoRequest){

            if ($defaultValue == null){
                $model[$field] = $model[$field] == 0 ? 1 : 0;
            }
            else{
                $model[$field] = $defaultValue;
            }
            $result = $model->save();


            return $this->resultJsonChangeStatus($result , $model[$field] , false , $field , $model[$field]);
        }
        return false;
    }

    protected function resultJsonChangeStatus($resultAction , $fieldResult , $reverse = false , $field="status" , $finalValue=0){
        if ($resultAction){
            if ($fieldResult == 1){
                if ($reverse){
                    return response()->json(["status" => true , "checked" => false , "field" => $field  , "value" => $finalValue]);
                }
                else{
                    return response()->json(["status" => true , "checked" => true , "field" => $field , "value" => $finalValue]);
                }

            }
            else{
                if ($reverse){
                    return response()->json(["status" => true , "checked" => true , "field" => $field , "value" => $finalValue]);
                }
                else{
                    return response()->json(["status" => true , "checked" => false , "field" => $field , "value" => $finalValue]);
                }

            }
        }
        else{
            return response()->json(["status" => false]);
        }
    }






    ////=============================================================
    /// panels
    /// =============================================================

    private function checkAccessAdminPanels(){
        $accessPanel = $this->checkStatusPanelsClient();

        View::composer("admin.layouts.sidebar" , function ($view) use($accessPanel){
            $view->with("panelName" , $accessPanel["panelName"]);
            $view->with("panels" , $accessPanel["panels"]);
        });
    }

    private function checkStatusPanelsClient(){
        $panelAdminTitle = "";
        $panels = [];

        if (Auth::guard("admin")->check()){

            $adminUser= Auth::guard("admin")->user();
            $panelAdmin = $adminUser->admin;


            $panelAdminTitle = $panelAdmin->title;

            if (!empty($panelAdmin)){

                if ($panelAdmin->status == 1 && $adminUser->status ==1){

                    $listPanels = $panelAdmin->panels;



                    $panels = $this->getTotalListPanels($listPanels);

                    if ($this->routeRedirect != route("admin.password.change-password") &&
                        $this->routeRedirect != route("admin.home")){
                        $existPanel = $this->checkExistPanelClient($listPanels);
                        if (!$existPanel["existPanel"]){
                            if ($existPanel["defaultPanel"] != ""){
                                return redirect()->route($existPanel["defaultPanel"])->send();
                            }
                            else{
                                return redirect()->route("home")->send();
                            }
                        }
                    }

                }
                else{
                    return redirect()->route("home")->send();
                }
            }
            else{
                return redirect()->route("home")->send();
            }

        }

        return [
            "panelName" =>  $panelAdminTitle ,
            "panels" => $panels ,
        ];
    }

    private function checkExistPanelClient($listPanels){

        $resultExp = [
            "existPanel" => false ,
            "defaultPanel" => ""
        ];

        $routeCheck = $this->routeAccess;
        if ($this->routeAccess == ""){
            $routeCheck = $this->routeRedirect;
        }

        foreach ($listPanels As $key => $itemPanel){
            if ($key==0){
                $resultExp["defaultPanel"] = $itemPanel["link"];
            }

            if (route($itemPanel["link"]) == $routeCheck){
                $resultExp["existPanel"] = true;
                break;
            }
        }

        return $resultExp;
    }

    protected function getTotalListPanels($panels , $admin=null){
        $resultExp = [];
        $listPanelGroups = $this->getTotalPanelGroupsId($panels);
        foreach ($panels As $panel){

            foreach ($listPanelGroups As $itemPanelGroup){
                if ($panel->panel_group_id == $itemPanelGroup->id){
                    $itemGroupPanel = $itemPanelGroup;
                    break;
                }
            }

            $existPanel=false;
            foreach ($resultExp As $itemGroup){
                if ($itemGroupPanel->id == $itemGroup["panel_group"]["id"]){
                    $existPanel = true;
                    break;
                }
            }

            if (!$existPanel){

                $result = [
                    "panel_group" => $itemGroupPanel->toArray() ,
                    "panels" => []
                ];

                foreach ($panels As $key => $itemGroup){
                    if ($itemGroupPanel->id == $itemGroup["panel_group_id"]){

                        if (!empty($admin)){
                            $panels[$key]["access"]= $this->checkAccessPanel($itemGroup , $admin);
                        }

                        array_push($result["panels"] , $itemGroup->toArray());
                    }
                }
                array_push($resultExp , $result);
            }

        }
        return $resultExp;
    }

    private function getTotalPanelGroupsId($panels){
        $panelGroupsId = [];
        foreach ($panels As $panel){
            $existPanelGroupId = false;
            foreach ($panelGroupsId As $itemPanelGroupId){
                if ($itemPanelGroupId == $panel->panel_group_id){
                    $existPanelGroupId = true;
                    break;
                }
            }
            if (!$existPanelGroupId){
                array_push($panelGroupsId , $panel->panel_group_id);
            }
        }
        return PanelGroup::whereIn("id" , $panelGroupsId)->get();
    }

    private function checkAccessPanel($panel , $admin){
        $access=false;
        foreach ($admin->panels As $accessPanel){
            if ($panel["id"] == $accessPanel["id"]){
                $access = true;
                break;
            }
        }
        return $access;
    }

}

