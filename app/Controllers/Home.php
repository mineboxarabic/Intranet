<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function Dashboard()
    {
        return view('inc/TopNav', ['pageName'=>'Home']).view('dashboard', ['pageName'=>'dashboard']).view('inc/Footer');
    }
}
