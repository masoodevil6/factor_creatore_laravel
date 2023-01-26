<?php

namespace App\Http\Services\Images;

use const DIRECTORY_SEPARATOR;
use function file_exists;
use function mkdir;
use function pathinfo;
use const PATHINFO_FILENAME;
use function time;
use function trim;

class ImageToolsService{

    protected $image;
    protected $exclusiveDirectory;
    protected $ImageDirectory;
    protected $ImageName;
    protected $ImageFormat;
    protected $FinalImageDirectory;
    protected $FinalImageName;


    /*public function getImage()
    {
        return $this->image;
    }*/

    public function setImage($image)
    {
        $this->image = $image;
    }




    public function getExclusiveDirectory()
    {
        return $this->exclusiveDirectory;
    }

    public function setExclusiveDirectory($exclusiveDirectory)
    {
        $this->exclusiveDirectory = trim($exclusiveDirectory , "/\\");
    }






    public function getImageDirectory()
    {
        return $this->ImageDirectory;
    }

    public function setImageDirectory($ImageDirectory)
    {
        $this->ImageDirectory = trim($ImageDirectory , "/\\");
    }





    public function getImageName()
    {
        return $this->ImageName;
    }

    public function setImageName($ImageName)
    {
        $this->ImageName = $ImageName;
    }

    public function setCurrentImageFormat()
    {
        //$this->image->getClientOrginalName() === $_FILES["image"]["name"];
        return !empty($this->image) ? $this->setImageName(pathinfo($this->image->getClientOriginalName() , PATHINFO_FILENAME)) : false;
    }





    public function getImageFormat()
    {
        return $this->ImageFormat;
    }

    public function setImageFormat($ImageFormat)
    {
        $this->ImageFormat = $ImageFormat;
    }










    public function getFinalImageDirectory()
    {
        return $this->FinalImageDirectory;
    }

    public function setFinalImageDirectory($FinalImageDirectory)
    {
        $this->FinalImageDirectory = $FinalImageDirectory;
    }







    public function getFinalImageName()
    {
        return $this->FinalImageName;
    }

    public function setFinalImageName($FinalImageName)
    {
        $this->FinalImageName = $FinalImageName;
    }






    protected function checkDirectory($imageDirectory){
        if (!file_exists($imageDirectory)){
            mkdir($imageDirectory , 0775 , true);
        }
    }

    public function getImageAddress(){
        return $this->FinalImageDirectory.DIRECTORY_SEPARATOR.$this->FinalImageName;
    }

    protected function provider($singleFileInDirectory=false , $extention=""){

        //set properties
        if (empty($this->getImageDirectory()) && !$singleFileInDirectory){
            $this->setImageDirectory(date("Y") .DIRECTORY_SEPARATOR . date("m") .DIRECTORY_SEPARATOR . date("d"));
        }

        if (empty($this->getImageName())){
            $this->setImageName(time());
        }

        if (empty($extention)){
            $this->setImageFormat( $this->image->extension());
        }
        else {
            $this->setImageFormat($extention);
        }


        /// set image directory
        $finalImageDirectory = empty($this->getExclusiveDirectory()) ? $this->getImageDirectory() : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getImageDirectory();
        $this->setFinalImageDirectory($finalImageDirectory);



        /// set image name
        $this->setFinalImageName($this->getImageName().".".$this->getImageFormat());


        /// check and create image directory
        $this->checkDirectory($this->getFinalImageDirectory());
    }

}