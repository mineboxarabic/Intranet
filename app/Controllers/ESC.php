<?php
namespace App\Controllers;
use \Functions;

//inculde Functions class from the app/controllers/Functions.php


class ESC extends BaseController
{
    private $ESs = null;
//Attributes in DB id_ES nom_ES commanditaire annee nbr_etu referent descriptif condition date_fin url file file_img
    public function __construct()
    {
        $this->ESs = new \App\Models\ESM();
    }
    
    public function index()
    {
        $data = array(
            'pageName' => 'ESs',
            'ESs' => $this->ESs->findAll()
        
        );
        return view('ESs/ESs', $data);
    }
    private function getESById($id){
        $ES = $this->ESs->where('id_ES', $id)->first();
        return $ES;
    }
    public function consulteES($idES){
        $ES = $this->getESById($idES);
        $data = array(
            'pageName' => 'ES Details of '.$ES['nom_ES'].'',
            'ES' => $ES
        );
        return view('ESs/ESDetails', $data);
    }


    public function consulteESM($idES){
        //ESDetailsM.php

        $ES = $this->getESById($idES);
        $data = array(
            'pageName' => 'ES Details of '.$ES['nom_ES'].'',
            'ES' => $ES
        );
        return view('ESs/ESDetailsM', $data);
    }

    private function in_array($needle, $haystack){
        foreach($haystack as $item){
            if($item == $needle){
                return true;
            }
        }
        return false;
    }
    public function updateESM($idES){

        $ES = $this->ESs->where('id_ES', $idES)->first();


        helper(['form', 'url']);

        $imageF = $this->request->getFile('file_image');
        $pdfF = $this->request->getFile('pdf_file');

        

        if($imageF->isValid() && !$imageF->hasMoved()){

            if($imageF->getClientMimeType() != "image/png" && $imageF->getClientMimeType() != 'image/jpeg' && $imageF->getClientMimeType() && 'image/jpg')
            {
                http_response_code(500);
                die("Le'image n'est pas au bon format " . $imageF->getClientMimeType());
            }
            
            $newName = $imageF->getRandomName();
            $imageF->move('Images/ESs', $newName);
            $image = $newName;
        }else{
                
            $image = $ES['file_img'];
            //check if file is empty

        }

        if($pdfF->isValid() && !$pdfF->hasMoved()){
            if($pdfF->getClientMimeType() != 'application/pdf'){
                http_response_code(500);
                die("Le fichier n'est pas au bon format");
            }
    
    
            $newName = $pdfF->getRandomName();
            $pdfF->move('PDF', $newName);
            $pdf = $newName;
        }else{
            $pdf = $ES['file'];
        }




        $editor = $_POST['editor'];
        $title = $_POST['title'];
        $commanditaire = $_POST['commanditaire'];
        $date_fin = $_POST['date_fin'];


        $ES = $this->ESs->where('id_ES', $idES)->first();

        $ES['nom_ES'] = $title;
        $ES['commanditaire'] = $commanditaire;
        $ES['date_fin'] = $date_fin;
        $ES['descriptif'] = $editor;
        $ES['file_img'] = $image;
        $ES['file'] = $pdf;
        //$this->ESs->save($ES);
        $builder = $this->ESs->builder();
        $builder->where('id_ES', $idES);
        $builder->update($ES);

        echo "success";
        //return redirect()->to(base_url().'ESs/M/consulte/'.$idES);
        



   


    }
    public function afficheESsM(){
        $ESs = $this->ESs->findAll();

        $data[] = array();

        foreach($ESs as $ES){
            $data[] = array(
                'id_ES' => $ES['id_ES'],
                'nom_ES' => $ES['nom_ES'],
                'commanditaire' => $ES['commanditaire'],
                'date_fin' => $ES['date_fin'],
                'actions' => 1
            );

            
        }

        $data = array(
            'pageName' => 'ESs Manager',
            'ESs' => $data
        );
        return view('ESs/ESsManager', $data);
    }
    public function deleteESM($id){

      $this->ESs->where('id_ES', $id)->delete();

        return redirect()->to(base_url().'ESs/M');

    }

    public function addESM(){
        $file_img = null;
        if(isset($_FILES['file_img']) && $_FILES['file_img']['error'] == 0){
            $file_img = $_FILES['file_img'];
            //_ IMAGE
                $name = $file_img['name'];
                $tmp_name = $file_img['tmp_name'];
                $error = $file_img['error'];
                $size = $file_img['size'];
                $type = $file_img['type'];

                $ext = explode('.', $name);
                $actualExt = strtolower(end($ext));
                if($actualExt == 'jpg' || $actualExt == 'jpeg' || $actualExt == 'png'){
                    if($error === 0){
                        if($size < 1000000){
                            $randomLetter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 1);
                            $image = $name .'_'. $randomLetter . '.' . $actualExt;
                            $destination = 'Images/ESs/'.$image;
                            move_uploaded_file($tmp_name, $destination);
                        }else{
                            die("L'image est trop grande");
                        }
                    }
                }
                else{
                    die("L'image doit etre de type jpg, jpeg ou png");
                }
            //_ IMAGE
        }
        else{
            $image = 'Project_place_holder.png';
        }
        if(isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0){
            $pdf_file = $_FILES['pdf_file'];
            //_PDF
            $name = $pdf_file['name'];
            $tmp_name = $pdf_file['tmp_name'];
            $error = $pdf_file['error'];
            $size = $pdf_file['size'];
            $type = $pdf_file['type'];

            $ext = explode('.', $name);
            $actualExt = strtolower(end($ext));
            if($actualExt == 'pdf'){
            if($error === 0){
                if($size < 1000000){
                    $randomLetter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 1);
                    $pdf = $name .'_'. $randomLetter . '.pdf';
                    $destination = 'PDF/ESs/'.$pdf;
                    move_uploaded_file($tmp_name, $destination);
                }else{
                    die("Le fichier PDF est trop grand");
                }
            }
            }
            else{
            die("Le fichier PDF doit etre de type pdf");
            }
            //_PDF
        }
        else{
            $pdf = null;
        }
        $title = $_POST['title'];
        $commanditaire = $_POST['commanditaire'];
        $date_fin = $_POST['date_fin'];
        $editor = $_POST['editor'];

 


        


        $ES = array(
            'nom_ES' => $title,
            'commanditaire' => $commanditaire,
            'date_fin' => $date_fin,
            'descriptif' => $editor,
            'file_img' => $image,
            'pdf_file' => $pdf
        );

        $this->ESs->insert($ES);
    
        return redirect()->to(base_url().'ESs/M');
    }
    public function createESM(){
        $data = array(
            'pageName' => 'Ajoute ES',
        );
        return view('ESs/ESCreate');
    }

}
