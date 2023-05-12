<?php

namespace App\Controllers;

class AnnuaireC extends BaseController
{
    public function index()
    {
        return view('inc/TopNav', ['pageName'=>'Annuaire']).view('Annuaire', ['pageName'=>'Annuaire']).view('inc/Footer');
    }

}
