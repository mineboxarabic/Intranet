<?php

namespace App\Controllers;

class PlateformeC extends BaseController
{
    public function index()
    {
        return view('inc/TopNav', ['pageName'=>'PlatesForme']).view('Plateforme', ['pageName'=>'Plateforme']).view('inc/Footer');
    }

}
