<?php

namespace Config;

//I want to use the model
use App\Models\PagesM;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

/**
 * -//_ Dashboard (commun)
 * -//_ Login (commun)
 * -//_ réservations jet d’encre (commun)
 * -//_ Magasin (commun)
 * -//_ Discrimination/harcements/handicap (commun)
 * -//_ Outils (ex ressources) (commun)
 * -//_ plateforme ENSP (commun)
 * -//_ Gestion d’absence (uniquement personnel)
 * -//_ RH - formation 
 * -//_ Annuaire
 */

//! LogIN (commun)
    $routes->get('/login', 'LoginC::loginPage');
    $routes->get('/login_redir', 'LoginC::login');
    $routes->get('/logout', 'LoginC::logout');
//!

 //! Dashboard (commun)
    $routes->get('/dashboard', 'Home::Dashboard');
//!



//! Magasin (commun)
    $routes->get('/magasin', 'MagasinC::index');

    $routes->get('/magasin/Materiels', 'MagasinC::afficheMateriels');
    $routes->get('/magasin/Lots', 'MagasinC::afficheLots');
    $routes->get('/magasin/Reservations', 'MagasinC::afficheReservations');

    $routes->get('/magasin/makeReservation/(:num)', 'MagasinC::makeReservation/$1');
    $routes->get('/magasin/makeReservationLots/(:num)', 'MagasinC::makeReservationLots/$1');



    $routes->post('/magasin/createReservation', 'MagasinC::createReservation');
    $routes->post('/magasin/createReservationLot', 'MagasinC::createReservationLot');





    $routes->post('/magasin/getReservations/(:num)', 'MagasinC::getReservations/$1');
    $routes->get('/magasin/getReservations/(:num)', 'MagasinC::getReservations/$1');

    $routes->post('/magasin/getReservationsLot/(:num)', 'MagasinC::getReservationsLot/$1');
    $routes->get('/magasin/getReservationsLot/(:num)', 'MagasinC::getReservationsLot/$1');




    $routes->post('magasin/materiels/getMateriels', 'MagasinC::getMateriels');

    $routes->post('magasin/Lots/getLots', 'MagasinC::getLots');


//!




//! Gestion d’absence (uniquement personnel)
    $routes->get('/absence', 'AbsenceC::index');
    $routes->get('/absence/M', 'AbsenceC::absenceManager');

    $routes->post('/absence/send', 'AbsenceC::sendAbsence');
    $routes->post('/absence/accept', 'AbsenceC::validateAbsence');
    $routes->post('/absence/refuse', 'AbsenceC::RefuseAbsence');
//!


//! Annuaire
    $routes->get('/annuaire', 'AnnuaireC::index');
    $routes->get('/annuaire/getAnnuaire', 'AnnuaireC::getAnnuaire');
//!

//! Projets
    $routes->get('/projets', 'ProjetC::index');
    $routes->get('/projets/consulte/(:any)', 'ProjetC::consulteProjet/$1');

    
    $routes->get('/projets/M', 'ProjetC::afficheProjetsM');
    $routes->get('/projets/M/consulte/(:any)', 'ProjetC::consulteProjetM/$1');
    $routes->get('/projets/M/delete/(:any)', 'ProjetC::deleteProjetM/$1');
    $routes->post('/projets/M/update/(:any)', 'ProjetC::updateProjetM/$1');
    $routes->get('/projets/M/create', 'ProjetC::createProjetM');
    $routes->post('/projets/M/add', 'ProjetC::addProjetM');


//!

//! Projets
$routes->get('/ESs', 'ESC::index');
$routes->get('/ESs/consulte/(:any)', 'ESC::consulteES/$1');


$routes->get('/ESs/M', 'ESC::afficheESsM');
$routes->get('/ESs/M/consulte/(:any)', 'ESC::consulteESM/$1');
$routes->get('/ESs/M/delete/(:any)', 'ESC::deleteESM/$1');
$routes->post('/ESs/M/update/(:any)', 'ESC::updateESM/$1');
$routes->get('/ESs/M/create', 'ESC::createESM');
$routes->post('/ESs/M/add', 'ESC::addESM');


//!

//!Pages
    //$routes->get('/pages/R/(:any)', 'PagesC::showPage/$1');
    //$routes->get('/pages/M/(:any)', 'PagesC::consultePage/$1');

  
    $pages = new PagesM();
    $pages = $pages->findAll();
    foreach ($pages as $page) {

        

        $routes->get('/'.$page['lable'], 'PagesC::showPage/'.$page['lable']);
        $routes->get('/'.$page['lable'].'/M', 'PagesC::consultePage/'.$page['lable']);
        $routes->POST('/'.$page['lable'].'/upload', 'PagesC::uploadImages/'.$page['id']);
        $routes->POST('/'.$page['lable'].'/update/(:num)', 'PagesC::updatePage/'.$page['id']);
    }
//!

//!Profile
    $routes->get('/profile', 'UserC::profile');
    $routes->post('/profile/update', 'UserC::updateProfile');
    $routes->post('/profile/updatePassword', 'UserC::updatePassword');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
