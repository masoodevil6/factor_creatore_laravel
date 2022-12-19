<?php

namespace App\Http\Services\File;



use function e;
use function file_exists;
use function glob;
use const GLOB_MARK;
use function is_dir;
use function public_path;
use function rmdir;
use function storage_path;
use function time;
use function unlink;

class FileService extends FileToolsService {


    public function moveToPublic($file){

        //set file
        $this->setFile($file);

        return $this->uploadFileComplete($file);
    }

    public function moveToStorage($file){

        //set file
        $this->setFile($file);

        return $this->uploadFileComplete($file , false);
    }



    protected function uploadFileComplete($file , $pubic=true){

        /// execute provider
        $this->provider();

        //save in public
        // in php => $_Files["file"]["tmp_mane"] === in laravel $file->getRealPath()

        $path = $this->getFinalFileDirectory();
        if ($pubic){
            $path = public_path($path);
        }
        else{
            $path = storage_path($path);
        }

        $result = $file->move($path , $this->getFinalFileName());

        return $result ? $this->getFileAddress() : false;
    }






    public function deleteFile($filePath , $publicPath=true) {
        if ($publicPath){
            if (file_exists($filePath)){
                unlink($filePath);
                return true;
            }
        }
        else{
            if (file_exists(storage_path($filePath))){
                unlink(storage_path($filePath));
                return true;
            }
        }

        return false;
    }


    public function deleteDirectoryAndFiles($directory){
        if (!is_dir($directory)){
            return false;
        }

        $files = glob($directory."*" , GLOB_MARK);
        foreach ($files As $itemFile){
            if (is_dir($itemFile)){
                $this -> deleteDirectoryAndFiles($itemFile);
            }
            else{
                unlink($itemFile);
            }
        }

        $result = rmdir($directory);
        return $result;
    }

}