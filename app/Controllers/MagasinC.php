<?php

namespace App\Controllers;

class MagasinC extends BaseController
{
    public $Emprunt;
    public $Materiels;
    public $Reservations;
    public $Lots;
    public function __construct(){
        $this->Emprunt = model('App\Models\Magasin\EmpruntModel');
        $this->Materiels = model('App\Models\Magasin\MaterielsModel');
        $this->Reservations = model('App\Models\Magasin\ReservationsModel');
        $this->Lots = model('App\Models\Magasin\LotsModel');
    }
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
    public function getLots(){
        //id_lot nom_lot lot_obs lot_acc degat manquant lot_cat dispo num_projet
        $lots = $this->Lots->findAll();
        $data = $lots;
        return json_encode($data);

    }


    public function makeReservationLots($id_Lots){
        
        $lots = $this->Lots->where('id_lot', $id_Lots)->get()->getResultArray();
        $data['lot'] = $lots[0];


        $reservations = $this->Reservations->where('id_lot', $id_Lots)->get()->getResultArray();
        $data['reservations'] = $reservations;
        return view('Magasin/MakeReservationLot', $data);
     
       
        
    }

    public function createReservationLot(){
        $date1 = $this->request->getVar('date1');
        $date2 = $this->request->getVar('date2');
        $id_lot = $this->request->getVar('id');
        print_r($date1);

        print_r($date2);
        $data = [
            'id_materiel' => 0,
            'lot' => 1,
            'id_lot' => $id_lot,
            'id_user' => session()->get('current_user')['id'],
            'date_debut' => $date1,
            'date_retour' => $date2
        ];

        $this->Reservations->insert($data);
        return redirect()->to(base_url('magasin/makeReservationLots/'.$id_lot));
    }

    public function getReservationsLot($id_lot){
        $reservations = $this->Reservations->where('id_lot', $id_lot)->get()->getResultArray();
        $data = [];
        foreach($reservations as $res){
            $user = model('UserModel')->where('id', $res['id_user'])->get()->getResultArray();
            if(isset($user[0]))
                $res['user'] = $user[0]['first_name'].' '.$user[0]['last_name'];
            else
                $res['user'] = 'Utilisateur supprimé';
            
            $data[] = $res;
        }
        return json_encode($data);
    }

    public function getMateriels(){

        $category = $this->request->getVar('category');


        $materiels = model('App\Models\Magasin\MaterielsModel');
        $materiels = $materiels->where('categorie', $category)->findAll();



        //$data = $materiels;


        foreach($materiels as $mat){
            $mat['emprunt'] = $this->Emprunt->where('id_materiel', $mat['id_materiel'])->get()->getResultArray();

            $data[] = $mat;
            
        }



        return json_encode($data);
    }

    public function afficheReservations(){

        return view('Magasin/Mes_Reservations');
    }

    public function makeReservation($id_materiel){
        
        $materiel = $this->Materiels->where('id_materiel', $id_materiel)->get()->getResultArray();
        $data['materiel'] = $materiel[0];

        $reservations = $this->Reservations->where('id_materiel', $id_materiel)->get()->getResultArray();
        $data['reservations'] = $reservations;
        return view('Magasin/MakeReservation', $data);
        
    }

    public function createReservation(){
        $date1 = $this->request->getVar('date1');
        $date2 = $this->request->getVar('date2');

        $id_materiel = $this->request->getVar('id');

        $reservation = $this->Reservations->where('id_materiel', $id_materiel)->get()->getResultArray();


        $data = [
            'id_materiel' => $id_materiel,
            'date_debut' => $date1,
            'date_retour' => $date2,
            'lot'=> 0,
            'id_lot'=>0,
            'id_user' => session()->get('current_user')['id']
        ];

        $this->Reservations->insert($data);



    }

    public function getReservations($id_materiel){
        $reservations = $this->Reservations->where('id_materiel', $id_materiel)->get()->getResultArray();
        $data = [];
        foreach($reservations as $res){
            $user = model('UserModel')->where('id', $res['id_user'])->get()->getResultArray()[0];
            $res['user'] = $user['first_name'] . ' ' . $user['last_name'] ;
            $data[] = $res;

        }

        echo json_encode($data);
    }




    public function getReservationsUser($type,$id_user){
        if($type == 'm'){
            $reservations = $this->Reservations->where('id_user', $id_user)->where('lot',0)->get()->getResultArray();

        }else{
            $reservations = $this->Reservations->where('id_user', $id_user)->where('lot',1)->get()->getResultArray();
        }

        $data = [];
        foreach($reservations as $res){
            $user = model('UserModel')->where('id', $res['id_user'])->get()->getResultArray()[0];
            $res['user'] = $user['first_name'] . ' ' . $user['last_name'] ;
            $data[] = $res;

        }
        echo json_encode($data);
    }

    public function annulerReservation($id_reservation){
        $this->Reservations->where('id_reservation', $id_reservation)->delete();
        return redirect()->to(base_url('magasin/Reservations'));
    }


}
