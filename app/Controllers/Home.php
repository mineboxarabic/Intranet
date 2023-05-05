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
        //return the view that is in app/Views/inc/header.php
        return view('inc/TopNav').view('dashboard').view('inc/Footer');
    }
}
