<?php
namespace App\Http\Services\Forms\ModelServices;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function PHPUnit\Framework\fileExists;

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
        return convertEnglishToPersian(Str::limit($this->resNum, 25));
    }
    public function setResNum($resNum): void
    {
        $this->resNum = $resNum;
    }


    public function getDescription()
    {
        return Str::limit($this->description, 160);
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
        return Str::limit($this->storeName, 30);
    }
    public function setStoreName($storeName): void
    {
        $this->storeName = $storeName;
    }



    public function getStorePhone()
    {
        return Str::limit($this->storePhone, 30);
    }
    public function setStorePhone($storePhone): void
    {
        $this->storePhone = $storePhone;
    }


    public function getStoreAddress()
    {
        return Str::limit($this->storeAddress, 30);
    }
    public function setStoreAddress($storeAddress): void
    {
        $this->storeAddress = $storeAddress;
    }


    public function getCustomerName()
    {
        return Str::limit($this->customerName, 30);
    }
    public function setCustomerName($customerName): void
    {
        $this->customerName = $customerName;
    }



    public function getCustomerPhone()
    {
        return Str::limit($this->customerPhone, 30);
    }
    public function setCustomerPhone($customerPhone): void
    {
        $this->customerPhone = $customerPhone;
    }



    public function getCustomerAddress()
    {
        return Str::limit($this->customerAddress, 30);
    }
    public function setCustomerAddress($customerAddress): void
    {
        $this->customerAddress = $customerAddress;
    }




    public function getLogoName()
    {
        if (!empty($this->logoName)){
            if (Storage::exists($this->logoName)){
                return $this->getBase64ImageFile(Storage::path($this->logoName));
            }
            else if (fileExists($this->logoName)){
                return $this->getBase64ImageFile($this->logoName);
            }
        }
        return null;
    }
    public function setLogoName($logoName): void
    {
        $this->logoName = $logoName;
    }



    public function getMohrName()
    {
        if (!empty($this->mohrName)){
            if (Storage::exists($this->mohrName)){
                return $this->getBase64ImageFile(Storage::path($this->mohrName));
            }
            else if (fileExists($this->mohrName)){
                return $this->getBase64ImageFile($this->mohrName);
            }
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






    ////// ======================================
    private function getBase64ImageFile($filePath){

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        $type = pathinfo($filePath, PATHINFO_EXTENSION);
        $response = file_get_contents($filePath, false, stream_context_create($arrContextOptions));
        return 'data:image/' . $type . ';base64,' . base64_encode($response);
    }


}