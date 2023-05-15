<?php
namespace App\Controllers;

class ProjetC extends BaseController
{
    private $Projets = null;
//Attributes in DB id_projet nom_projet commanditaire annee nbr_etu referent descriptif condition date_fin url file file_img
    public function __construct()
    {
        $this->Projets = new \App\Models\ProjetM();
    }
    
    public function index()
    {
        $data = array(
            'pageName' => 'Projets',
            'Projets' => $this->Projets->findAll()
        
        );
        return view('Projets/Projets', $data);
    }
    private function getProjetById($id){
        $projet = $this->Projets->where('id_projet', $id)->first();
        return $projet;
    }
    public function consulteProjet($idProjet){
        $projet = $this->getProjetById($idProjet);
        $data = array(
            'pageName' => 'Projet Details of '.$projet['nom_projet'].'',
            'Projet' => $projet
        );
        return view('Projets/ProjetDetails', $data);
    }


    public function consulteProjetM($idProjet){
        //projetDetailsM.php

        $projet = $this->getProjetById($idProjet);
        $data = array(
            'pageName' => 'Projet Details of '.$projet['nom_projet'].'',
            'Projet' => $projet
        );
        return view('Projets/ProjetDetailsM', $data);
    }

    private function in_array($needle, $haystack){
        foreach($haystack as $item){
            if($item == $needle){
                return true;
            }
        }
        return false;
    }
    public function updateProjetM($idProjet){
        /*$image = '';
            if(isset($_FILES['file_image'])){
                
                //base_url(). 'Images/Projets/theImage'
                $newImage = $_FILES['file_image'];
                //move the file to the folder

                $name = $newImage['name'];
                $tmp_name = $newImage['tmp_name'];
                $error = $newImage['error'];
                $size = $newImage['size'];
                $type = $newImage['type'];


                $ext = explode('.', $name);
                $actualExt = strtolower(end($ext));


                $allowed = array('jpg', 'jpeg', 'png');
                
                echo $this->in_array($actualExt, $allowed);

                if($actualExt == 'jpg' || $actualExt == 'jpeg' || $actualExt == 'png'){
                    if($error === 0){
                        if($size < 1000000){
                            $image = $name;
                            $destination = 'Images/Projets/'.$image;
                            move_uploaded_file($tmp_name, $destination);
                        }else{
                        http_response_code(400);
                            die("Your file is too big");
                        }
                    }
                }
                else{
                    http_response_code(400);
                die("You cannot upload files of this type");
                }
                



            }else{
                $image = $_POST['current_img'];
            }

            echo $image;
            $title = $_POST['title'];
            $commanditaire = $_POST['commanditaire'];
            $dateFin = $_POST['date_fin'];
            $editor = $_POST['descriptif'];







            $projet = $this->Projets->where('id_projet', $idProjet)->first();

            $projet['nom_projet'] = $title;
            $projet['commanditaire'] = $commanditaire;
            $projet['date_fin'] = $dateFin;
            $projet['descriptif'] = $editor;
            $projet['file_img'] = $image;
            $this->Projets->save($projet);
        */
        $projet = $this->Projets->where('id_projet', $idProjet)->first();
        if(isset($_FILES['file_image']) &&  $_FILES['file_image']['error'] != 4)
        {
            echo "the image is set" . '<br>';
            $file_image = $_FILES['file_image'];

                //_ IMAGE
                    $name = $file_image['name'];
                    $tmp_name = $file_image['tmp_name'];
                    $error = $file_image['error'];
                    $size = $file_image['size'];
                    $type = $file_image['type'];
        
                    $ext = explode('.', $name);
                    $actualExt = strtolower(end($ext));
                    
                    if($actualExt == 'jpg' || $actualExt == 'jpeg' || $actualExt == 'png'){
                        if($error === 0){
                            if($size < 1000000){
                                $randomLetter = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 1);
                                $image =  $randomLetter . '_' .$name;
                                $destination = 'Images/Projets/'.$image;
                                move_uploaded_file($tmp_name, $destination);
                            }else{
                            http_response_code(400);
                                die("Cette image est trop grande");
                            }
                        }
                    }
                    else{
                        http_response_code(400);
                    die(" Vous pouvez que des images de type jpg, jpeg ou png");
                    }
                //_IMAGE
        }
        else{

            $image = $projet['file_img'];
        }

        if(isset($_FILES['pdf_file']) &&  $_FILES['pdf_file']['error'] != 4){

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
                            $randomLetter = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 1);
                            $pdf =  $randomLetter .'_'. $name;
                            $destination = 'Images/Projets/'.$pdf;
                            move_uploaded_file($tmp_name, $destination);
                        }else{
                        http_response_code(400);
                            die("Your file is too big");
                        }
                    }
                }
                else{
                    http_response_code(400);
                die("You cannot upload files of this type");
                }
            //_PDF
        }
        else{
            $pdf = $projet['file'];
        }


        $editor = $_POST['editor'];
        $title = $_POST['title'];
        $commanditaire = $_POST['commanditaire'];
        $date_fin = $_POST['date_fin'];


        $projet = $this->Projets->where('id_projet', $idProjet)->first();

        $projet['nom_projet'] = $title;
        $projet['commanditaire'] = $commanditaire;
        $projet['date_fin'] = $date_fin;
        $projet['descriptif'] = $editor;
        $projet['file_img'] = $image;
        $projet['file'] = $pdf;
        $this->Projets->save($projet);

        return redirect()->to(base_url().'projets/M/consulte/'.$idProjet);
        



   


    }
    public function afficheProjetsM(){
        $Projets = $this->Projets->findAll();

        $data[] = array();

        foreach($Projets as $projet){
            $data[] = array(
                'id_projet' => $projet['id_projet'],
                'nom_projet' => $projet['nom_projet'],
                'commanditaire' => $projet['commanditaire'],
                'date_fin' => $projet['date_fin'],
                'actions' => 1
            );

            
        }

        $data = array(
            'pageName' => 'Projets Manager',
            'Projets' => $data
        );
        return view('Projets/ProjetsManager', $data);
    }
    public function deleteProjetM($id){

      $this->Projets->where('id_projet', $id)->delete();

        return redirect()->to(base_url().'projets/M');

    }

    public function addProjetM(){
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
                            $destination = 'Images/Projets/'.$image;
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
                    $destination = 'PDF/Projets/'.$pdf;
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

 


        


        $projet = array(
            'nom_projet' => $title,
            'commanditaire' => $commanditaire,
            'date_fin' => $date_fin,
            'descriptif' => $editor,
            'file_img' => $image,
            'pdf_file' => $pdf
        );

        $this->Projets->insert($projet);
    
        return redirect()->to(base_url().'projets/M');
    }
    public function createProjetM(){
        $data = array(
            'pageName' => 'Ajoute Projet',
        );
        return view('Projets/ProjetCreate');
    }

}
