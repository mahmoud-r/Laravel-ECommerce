<?php

use Illuminate\Support\Facades\File;

function SaveImage($photo , $folder){

    $file_extension =$photo->getClientOriginalExtension();
    $file_name = time().'.'.$file_extension;
    $path ='images/'.$folder;
    $photo ->move($path,$file_name);
    return $file_name;
}





function DeleteImage($photo , $folder){

    $image_path = 'images/'.$folder.'/'.$photo;
    if(File::exists($image_path)) {
        File::delete($image_path);
    }

}
