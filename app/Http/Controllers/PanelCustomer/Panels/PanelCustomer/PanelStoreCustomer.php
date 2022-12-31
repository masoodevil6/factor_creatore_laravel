<?php
namespace App\Http\Controllers\PanelCustomer\Panels\PanelCustomer;


use App\Http\Controllers\PanelCustomer\Panels\InterfacePanelCustomer\IPanelStoreCustomer;
use App\Models\Users\UserStore;
use App\Repositories\ContextRepository;

class PanelStoreCustomer extends BasePanelCustomer implements IPanelStoreCustomer {

    public function __construct()
    {
        $this->setTitleFa("فروشگاه ها");
        $this->setTitleEn("stores");
        $this->setIcon("fa fa-shopping-cart");
    }


    public function returnPanelView()
    {
        $titleFa = $this->getTitleFa();
        $titleEn = $this->getTitleEn();
        $stores = ContextRepository::UserStoreRepository()->GetStoresAuthUser();
        return view("customer-panels.panels.stores-panel.index" , compact("titleFa" , "titleEn" ,  "stores"))->render();
    }

    public function getInfoUserStoreSelected($UserStoreId=0){
        if ($UserStoreId > 0){
            $userStore = ContextRepository::UserStoreRepository()->GetInfoStoresAuthUser($UserStoreId);
        }
        else{
            $userStore = new UserStore();
        }

        return view("customer-panels.panels.stores-panel.edit-or-add-store" , compact("userStore"))->render();
    }

    public function submitDataUserStore($UserStoreId=0 , $userStoreName , $userStorePhone , $userStoreAddress){
        ContextRepository::UserStoreRepository()->AddOrEditStoreAuthUser($UserStoreId , $userStoreName , $userStorePhone , $userStoreAddress);
    }


    public function deleteUserStore($UserStoreId=0){
        ContextRepository::UserStoreRepository()->deleteResultById($UserStoreId);
    }



}
