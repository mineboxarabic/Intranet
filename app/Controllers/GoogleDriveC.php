<?php

namespace App\Controllers;

class GoogleDriveC extends BaseController
{

    public $token = null;
    public $client = null;
    public $drive = null;
    public function __construct()
    {
        helper('url');
        $this->token = session()->get('Access_token');
        $this->client = new \Google_Client();
        $this->client->setAccessToken($this->token);
        $this->drive = new \Google_Service_Drive($this->client);


    }
    public function index()
    {
        //$filesFromDrive = session()->get('files');

        $filesFromDrive = array();
        $folders = array();
        if($this->token != null){




            $folderId = "0AHaWYnVLCDy7Uk9PVA";

            $parameters = array(
                'q' => "'$folderId' in parents and trashed=false",
                'fields' => 'files(id, name, mimeType, modifiedTime, size, iconLink, webViewLink, webContentLink, thumbnailLink, parents)',

                //folder is in shared drive

                'corpora' => 'drive',
                'includeItemsFromAllDrives' => 'true',
                'supportsAllDrives' => 'true',
                'driveId' => '0AHaWYnVLCDy7Uk9PVA',
                'includeTeamDriveItems' => 'true',
            );

            $filesFromDrive = $this->drive->files->listFiles($parameters)->getFiles();
        }


        $data = array(
            'pageName' => 'Google Drive',
            'filesFromDrive' => $filesFromDrive
        );
        return view('GoogleDrive/GoogleDrive',$data);
    }


    public function show_Folder($id){
       //get the files in the folder with the id
        $filesFromDrive = array();
        $folders = array();
        if($this->token != null){
            $parameters = array(
                'q' => "'$id' in parents and trashed=false",
                'fields' => 'files(id, name, mimeType, modifiedTime, size, iconLink, webViewLink, webContentLink, thumbnailLink, parents)',

                //folder is in shared drive

                'corpora' => 'drive',
                'includeItemsFromAllDrives' => 'true',
                'supportsAllDrives' => 'true',
                'driveId' => '0AHaWYnVLCDy7Uk9PVA',
                'includeTeamDriveItems' => 'true',
            );

            $filesFromDrive = $this->drive->files->listFiles($parameters)->getFiles();
        }



       
        $data = array(
            'filesFolder' => $filesFromDrive
        );
        return view('GoogleDrive/showFolder',$data);
    }

    public function show_File($id){
        
        //$file = $this->drive->files->get($id);
        $fileId = $id;

        $file = $this->drive->files->get($fileId);
        

        $data = array(
            'file' => $file
        );
        return view('GoogleDrive/showFile',$data);
    }

    public function download_File($id){


    }

}
