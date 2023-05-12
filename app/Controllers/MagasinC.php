<?php

namespace App\Controllers;

class MagasinC extends BaseController
{
    public function index()
    {
        return view('inc/TopNav', ['pageName'=>'Magasin']).view('Magasin', ['pageName'=>'Magasin']).view('inc/Footer');
    }

}
