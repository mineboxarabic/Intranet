<?php

namespace Config;

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
$routes->get('/', 'Home::index');

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

//! Réservations jet d’encre (commun)
    $routes->get('/reservations', 'ReservationsC::index');
//!

//! Magasin (commun)
    $routes->get('/magasin', 'MagasinC::index');
//!

//! Discrimination/harcements/handicap (commun)
    $routes->get('/aide', 'AideC::index');
//!


//! Outils (ex ressources) (commun)
    $routes->get('/outils', 'OutilsC::index');
//!

//! plateforme ENSP (commun)
    $routes->get('/plateforme', 'PlateformeC::index');
//!

//! Gestion d’absence (uniquement personnel)
    $routes->get('/absence', 'AbsenceC::index');
//!

//! RH - formation 
    $routes->get('/formation', 'FormationC::index');
//!

//! Annuaire
    $routes->get('/annuaire', 'AnnuaireC::index');
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
