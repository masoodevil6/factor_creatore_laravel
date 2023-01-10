<?php

namespace App\Http\Middleware;

use App\Repositories\ContextRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateFactorMiddleware
{
    private $templateFactor;

    private $routeStep1 = "customer.create-factor.index";
    private $routeStep2 = "customer.products-factor.index";
    private $routeStep3 = "customer.images-factor.index";
    private $routeStep4 = "customer.forms-factor.index";
    private $routeStep5 = "customer.complete-factor.index";

    private $infoMiddlewareExistFactorMiddleware;
    private $infoMiddlewareExistProductInFactorMiddleware;
    private $infoMiddlewareActiveFormSelectedInFactorMiddleware;

    public function __construct()
    {
        $this->templateFactor = ContextRepository::TemplateFactorRepository()->GetInfoTemplateFactor();

        $this->readyInfoMiddlewareExistTemplateFactor();
        $this->readyInfoMiddlewareExistProductsInTemplateFactor();
        $this->readyInfoMiddlewareActiveFormsSelectedInTemplateFactor();
    }


    private function readyInfoMiddlewareExistTemplateFactor(){

        $this->infoMiddlewareExistFactorMiddleware = [
            "routes" => [
                $this->routeStep2 ,
                $this->routeStep3 ,
                $this->routeStep4 ,
                $this->routeStep5
            ],
            "redirect" => $this->routeStep1 ,
            "error" => "برای ساخت فاکتور، اطلاعات اولیه آن را تایید نمایید"
        ];
    }

    private function readyInfoMiddlewareExistProductsInTemplateFactor(){

        $this->infoMiddlewareExistProductInFactorMiddleware = [
            "routes" => [
                $this->routeStep3 ,
                $this->routeStep4 ,
                $this->routeStep5
            ],
            "redirect" => $this->routeStep2 ,
            "error" => "برای ادامه فرایند ساخت، حداقل باید یک کالا در لیست خود اضافه نمایید"
        ];
    }

    private function readyInfoMiddlewareActiveFormsSelectedInTemplateFactor(){
        $this->infoMiddlewareActiveFormSelectedInFactorMiddleware = [
            "routes" => [
                $this->routeStep5
            ],
            "redirect" => $this->routeStep4 ,
            "error" => "مشکلی در تایید فرم انتخاب شده رخ داده است"
        ];
    }




    /////// ===========================================================================
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName();

        $resultRoute ="";
        $resultError ="";
        if (empty($resultRoute) && in_array($routeName , $this->infoMiddlewareExistFactorMiddleware["routes"]) && !$this->checkExistTemplateFactor()){
            $resultRoute = $this->infoMiddlewareExistFactorMiddleware["redirect"];
            $resultError = $this->infoMiddlewareExistFactorMiddleware["error"];
        }
        if (empty($resultRoute) && in_array($routeName , $this->infoMiddlewareExistProductInFactorMiddleware["routes"]) && !$this->checkExistProductsInTemplateFactor()){
            $resultRoute = $this->infoMiddlewareExistProductInFactorMiddleware["redirect"];
            $resultError = $this->infoMiddlewareExistProductInFactorMiddleware["error"];
        }
        if (empty($resultRoute) && in_array($routeName , $this->infoMiddlewareActiveFormSelectedInFactorMiddleware["routes"]) && !$this->checkActiveFormSelected()){
            $resultRoute = $this->infoMiddlewareActiveFormSelectedInFactorMiddleware["redirect"];
            $resultError = $this->infoMiddlewareActiveFormSelectedInFactorMiddleware["error"];
        }


        if (empty($resultRoute)){
            return $next($request);
        }
        else{
            return redirect()->route($resultRoute)->with("error-template-factor" , $resultError);
        }
    }

    //// middleware One
    private function checkExistTemplateFactor(){
        if (isset($this->templateFactor->id)){
            return true;
        }
        return false;
    }

    //// middleware Two
    private function checkExistProductsInTemplateFactor(){
        if (sizeof($this->templateFactor->products)>0){
            return true;
        }
        return false;
    }

    //// middleware Three
    private function checkActiveFormSelected(){
        $form = ContextRepository::FormRepository()->SetStateActiveFromFormId($this->templateFactor->form_id);
        if (!empty($form) && $form->active){
            return true;
        }
        return false;
    }
}
