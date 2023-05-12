<?php

namespace App\Controllers;

class ReservationsC extends BaseController
{
    public function index()
    {
        return view('inc/TopNav', ['pageName'=>'Reservations']).view('Reservations', ['pageName'=>'Reservations']).view('inc/Footer');
    }

}
