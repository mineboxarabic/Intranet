<?php

namespace App\Controllers;

class MagasinC extends BaseController
{
    public function index()
    {
        return view('Magasin/Magasin');
    }


    public function afficheMateriels(){
        $materiels = model('App\Models\Magasin\MaterielsModel');
        $data['materiels'] = $materiels->findAll();
        return view('Magasin/Materiels', $data);
    }
    public function afficheLots(){
        return view('Magasin/Lots');
    }
    public function getMateriels(){
       // $category = $this->ajax->get('category');

       //get the category from the ajax request
         $category = 2;


        $materiels = model('App\Models\Magasin\MaterielsModel');
        $materiels = $materiels->where('categorie', $category)->findAll();


        /*data = array();

        foreach ($materiels as $materiel) {
            $data['datax'][] = array(
                'id_materiel' => $materiel['id_materiel'],
                'designation' => $materiel['designation'],
                'date_achat' => $materiel['date_achat'],
                'categorie' => $materiel['categorie'],
            );
        }*/
        $data = $materiels;



        return json_encode($data);
    }

    public function afficheReservations(){

        return view('Magasin/Mes_Reservations');
    }
}
