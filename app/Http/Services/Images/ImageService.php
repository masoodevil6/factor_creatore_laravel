<?php

namespace App\Http\Services\Images;


use function date;
use function dd;
use const DIRECTORY_SEPARATOR;
use function e;
use function file_exists;
use function glob;
use const GLOB_MARK;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use function is_dir;
use function rmdir;
use function time;
use function unlink;

class ImageService extends ImageToolsService {

    public function save($image ,  $singleFileInDirectory=false , $type="public"){

        //set image
        $this->setImage($image);

        return $this->uploadImageComplete($image , 0 , 0 , $singleFileInDirectory , $type);
    }




    public function fitAndSave($image , $width , $height,  $singleFileInDirectory=false , $type="public"){
        //set image
        $this->setImage($image);

        return $this->uploadImageComplete($image , $width , $height , $singleFileInDirectory , $type);
    }



    /*
     * return [
     * 'indexArray'    =>    arrayImageSize
     * 'directory'     =>    finalDirectory
     * 'currentImage'  =>    imageDefault
     * ]
     */
    public function createIndexAndSave($image , $singleFileInDirectory=false , $type="public"){

        $resultExp = [];

        /// get data config
        $imageSize = Config::get("image.index-image-sizes");

        //set image
        $this->setImage($image);

        //set directory
        if (empty($this->getImageDirectory())){
            $imageDirectory = date("Y").DIRECTORY_SEPARATOR.date("m").DIRECTORY_SEPARATOR.date("d");
            $this->setImageDirectory($imageDirectory);
        }


        $imageName = $this->getImageName();
        if (empty($imageName)){
            $imageName = time();
            $this->setImageName($imageName);
        }


        $indexImage=[];
        foreach ($imageSize As $alesImageSize => $itemImageSize){

            /// create and set size name
            $currentImageName =$imageName ."_".$alesImageSize;

            $this->setImageName($currentImageName);

            $result = $this->uploadImageComplete($image , $itemImageSize["width"] , $itemImageSize["height"] , $singleFileInDirectory , $type);

            if (!$result){
                return false;
            }
            else{
                $indexImage[$alesImageSize] = $this->getImageAddress();
            }

        }


        $resultExp["indexArray"] = $indexImage;
        $resultExp["directory"] = $this->getFinalImageDirectory();
        $resultExp["currentImage"] = Config::get("image.default-current-index-image");

        return $resultExp;
    }


    protected function uploadImageComplete($image , $width=0 , $height=0 ,  $singleFileInDirectory=false , $type="public"){

        /// execute provider
        $this->provider($singleFileInDirectory);

        //save in public
        // in php => $_Files["image"]["tmp_mane"] === in laravel $image->getRealPath()

        $result = Image::make($image->getRealPath());
        if ($width > 0 && $height>0){
            $result->fit($width , $height);
        }

        $fileAddress = $this->getImageAddress();
        $result->save($fileAddress , null , $this->getImageFormat() );

        if($type == "storage"){
            Storage::putFileAs($result->dirname ,  new File(public_path($fileAddress) ), $result->basename);
            unlink($fileAddress);
        }

        return $result ? $this->getImageAddress() : false;
    }






    public function deleteImage($imagePath){

        if (file_exists($imagePath)){
            unlink($imagePath);
        }
    }

    public function deleteIndex($image , $AllDirectory=false){
        if ($AllDirectory){
            $directory = $image["directory"];
            $this -> deleteDirectoryAndFiles($directory);
        }
        else{
            $indexArray = $image["indexArray"];
            $this -> deleteAllIndexImages($indexArray);
        }
    }

    public function deleteAllIndexImages($indexArray){
        foreach ($indexArray As $itemIndex){
            unlink($itemIndex);
        }
    }



    public function deleteDirectoryAndFiles($directory) {

        $files = glob($directory.'/*'); //GLOB_MARK adds a slash to directories returned

        foreach( $files as $file )
        {
            $this -> deleteDirectoryAndFiles( $file );
        }

        if(is_dir($directory))
        {
            rmdir($directory);
        }
        elseif(is_file($directory))
        {
            unlink( $directory );
        }

    }

}