<?php

namespace App\Controllers;

class FormationC extends BaseController
{
    public function index()
    {
        return view('inc/TopNav', ['pageName'=>'Formation']).view('Formation', ['pageName'=>'Formation']).view('inc/Footer');
    }

}
