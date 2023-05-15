<?php

namespace App\Controllers;

class RHC extends BaseController
{
    public function index()
    {
        return view('inc/TopNav', ['pageName'=>'RH']).view('RH/Actualite', ['pageName'=>'RH Actualite']).view('inc/Footer');
    }

}
