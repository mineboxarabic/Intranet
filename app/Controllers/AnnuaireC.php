<?php

namespace App\Controllers;

class AnnuaireC extends BaseController
{
    public function index()
    {
        return view('Annuaire');
    }

    public function getAnnuaire(){
        $model = new \App\Models\UserModel();
        $annuaire = $model->findAll();

        $data[] = array(
            'idx' => 'idx',
            'nom' => 'nom',
            'prenom' => 'prenom',
            'email' => 'email',
            'tel' => 'tel',
            'fonction' => 'fonction',
            'rang' => 'rang',
        );

        foreach ($annuaire as $user) {
            $data[] = array(
                'idx' => $user['id'],
                'nom' => $user['last_name'],
                'prenom' => $user['first_name'],
                'email' => $user['email'],
                'tel' => $user['telephone'],
                'fonction' => $user['fonction'],
                'rang' => $user['rang'],
            );


        }



        return json_encode($data);
    }

}
