<?php

namespace App\Http\Services\File;

class FileToolsService{

    protected $file;
    protected $exclusiveDirectory;
    protected $fileDirectory;
    protected $fileName;
    protected $fileFormat;
    protected $FinalFileDirectory;
    protected $FinalFileName;

    protected $fileSize;


    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }




    public function getExclusiveDirectory()
    {
        return $this->exclusiveDirectory;
    }

    public function setExclusiveDirectory($exclusiveDirectory)
    {
        $this->exclusiveDirectory = trim($exclusiveDirectory , "/\\");
    }






    public function getFileDirectory()
    {
        return $this->fileDirectory;
    }

    public function setFileDirectory($fileDirectory)
    {
        $this->fileDirectory = trim($fileDirectory , "/\\");
    }





    public function getFileName()
    {
        return $this->fileName;
    }

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function setCurrentFileFormat()
    {
        //$this->file->getClientOrginalName() === $_FILES["file"]["name"];
        return !empty($this->file) ? $this->setFileName(pathinfo($this->file->getClientOriginalName() , PATHINFO_FILENAME)) : false;
    }





    public function getFileFormat()
    {
        return $this->fileFormat;
    }

    public function setFileFormat($fileFormat)
    {
        $this->fileFormat = $fileFormat;
    }










    public function getFinalFileDirectory()
    {
        return $this->FinalFileDirectory;
    }

    public function setFinalFileDirectory($FinalFileDirectory)
    {
        $this->FinalFileDirectory = $FinalFileDirectory;
    }







    public function getFinalFileName()
    {
        return $this->FinalFileName;
    }

    public function setFinalFileName($FinalFileName)
    {
        $this->FinalFileName = $FinalFileName;
    }





    public function setFileSize($file){
        $this->fileSize = $file->getSize();
    }
    public function getFileSize(){
        return $this->fileSize;
    }








    protected function checkDirectory($fileDirectory){
        if (!file_exists($fileDirectory)){
            mkdir($fileDirectory , 0775 , true);
        }
    }

    public function getFileAddress(){
        return $this->FinalFileDirectory.DIRECTORY_SEPARATOR.$this->FinalFileName;
    }

    protected function provider($singleFileInDirectory = false){

        //set properties
        if (empty($this->getFileDirectory()) && !$singleFileInDirectory){
            $this->setFileDirectory(date("Y") .DIRECTORY_SEPARATOR . date("m") .DIRECTORY_SEPARATOR . date("d"));
        }

        if (empty($this->getFileName())){
            $this->setFileName(time());
        }

        $this->setFileFormat(pathinfo($this->file->getClientOriginalName() , PATHINFO_EXTENSION));


        /// set File directory
        $finalFileDirectory = empty($this->getExclusiveDirectory()) ? $this->getFileDirectory() : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getFileDirectory();
        $this->setFinalFileDirectory($finalFileDirectory);



        /// set file name
        $this->setFinalFileName($this->getFileName().".".$this->getFileFormat());


        /// check and create file directory
        $this->checkDirectory($this->getFinalFileDirectory());
    }




}