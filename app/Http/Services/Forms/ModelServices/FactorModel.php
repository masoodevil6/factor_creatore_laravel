<?php
namespace App\Http\Services\Forms\ModelServices;

use Illuminate\Support\Facades\Storage;

class FactorModel{



    private $id = 0;
    private $resNum;
    private $description;

    protected $createdAt;
    protected $updatedAt;

    private $storeName;
    private $storePhone;
    private $storeAddress;

    private $customerName;
    private $customerPhone;
    private $customerAddress;

    private $logoName;
    private $mohrName;

    private $formId;
    private $formName;

    private $userId;
    private $userName;





    public function getId()
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }




    public function getResNum()
    {
        return $this->resNum;
    }
    public function setResNum($resNum): void
    {
        $this->resNum = $resNum;
    }


    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description): void
    {
        $this->description = $description;
    }




    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function getCreatedAtJalili()
    {
        return jalaliDate($this->getCreatedAt() , "%Y/%m/%d");
    }
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }





    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getUpdatedAtJalili()
    {
        return jalaliDate($this->getUpdatedAt() , "%d %B %y");
    }
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }




    public function getStoreName()
    {
        return $this->storeName;
    }
    public function setStoreName($storeName): void
    {
        $this->storeName = $storeName;
    }



    public function getStorePhone()
    {
        return $this->storePhone;
    }
    public function setStorePhone($storePhone): void
    {
        $this->storePhone = $storePhone;
    }


    public function getStoreAddress()
    {
        return $this->storeAddress;
    }
    public function setStoreAddress($storeAddress): void
    {
        $this->storeAddress = $storeAddress;
    }


    public function getCustomerName()
    {
        return $this->customerName;
    }
    public function setCustomerName($customerName): void
    {
        $this->customerName = $customerName;
    }



    public function getCustomerPhone()
    {
        return $this->customerPhone;
    }
    public function setCustomerPhone($customerPhone): void
    {
        $this->customerPhone = $customerPhone;
    }



    public function getCustomerAddress()
    {
        return $this->customerAddress;
    }
    public function setCustomerAddress($customerAddress): void
    {
        $this->customerAddress = $customerAddress;
    }




    public function getLogoName()
    {
        if (!empty($this->logoNam)&& Storage::exists($this->logoNam)){
            return Storage::download($this->logoName);
        }
        return null;
    }
    public function setLogoName($logoName): void
    {
        $this->logoName = $logoName;
    }



    public function getMohrName()
    {
        if (!empty($this->mohrName)&& Storage::exists($this->mohrName)){
            return Storage::download($this->mohrName);
        }
        return null;
    }
    public function setMohrName($mohrName): void
    {
        $this->mohrName = $mohrName;
    }






    public function getFormId()
    {
        return $this->formId;
    }
    public function setFormId($formId): void
    {
        $this->formId = $formId;
    }


    public function getFormName()
    {
        return $this->formName;
    }
    public function setFormName($formName): void
    {
        $this->formName = $formName;
    }







    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }


    public function getUserName()
    {
        return $this->userName;
    }
    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }





}