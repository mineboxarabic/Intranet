<?php

namespace App\Controllers;

class AideC extends BaseController
{
    public function index()
    {
        return view('inc/TopNav', ['pageName'=>'Aide']).view('Aide', ['pageName'=>'Aide']).view('inc/Footer');
    }

}
