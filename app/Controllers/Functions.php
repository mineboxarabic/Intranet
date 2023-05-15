<?php

class Functions{
    //this class is a class I will ues to store some functions that are handy
    //for example, I will use this class to store the upload function

    public function __construct(){
        echo "This is a function";
    }
    public function upload($file,$allowedTypes,$size,$path){
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        $fileError = $file['error'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = $allowedTypes;
        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < $size){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $fileDestination = $path.$fileNameNew;
                    move_uploaded_file($fileTmp,$fileDestination);
                    return $fileNameNew;
                }else{
                    return "Your file is too big";
                }
            }else{
                return "There was an error uploading your file";
            }
        }else{
            return "You cannot upload files of this type";
        }
    }
}