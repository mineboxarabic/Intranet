<?php

namespace App\Controllers;

class OutilsC extends BaseController
{
    public function index()
    {
        return view('inc/TopNav', ['pageName'=>'Outils']).view('Outils', ['pageName'=>'Outils']).view('inc/Footer');
    }

}
