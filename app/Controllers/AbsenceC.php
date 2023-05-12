<?php

namespace App\Controllers;

class AbsenceC extends BaseController
{
    public function index()
    {
        
        return view('inc/TopNav', ['pageName'=>'Absence']).view('Absence', ['pageName'=>'Absence']).view('inc/Footer');
    }

}
