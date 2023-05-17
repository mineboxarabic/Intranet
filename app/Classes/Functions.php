<?php

class Functions{
    //this class is a class I will ues to store some functions that are handy
    //for example, I will use this class to store the upload function
    public $file_name = '';
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

        //check if folder exists
        if(!file_exists($path)){
            mkdir($path);
            echo "Folder created";
        }
        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){

                if($fileSize < $size){
                    $fileNameNew = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 1).'_'.$fileName;
                    $fileDestination = $path.$fileNameNew;

                    

                    move_uploaded_file($fileTmp,$fileDestination);

                    return $fileNameNew;

                }else{
                    
                    http_response_code(400);
                    die("Your file is too big");
                }
            }else{
                http_response_code(400);

                die("There was an error uploading your file");
            }
        }else{
            http_response_code(400);

            die("You cannot upload files of this type") ;
        }
    }
}