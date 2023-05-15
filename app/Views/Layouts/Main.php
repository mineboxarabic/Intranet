
<!-- App favicon -->
<link rel="shortcut icon" href="<?=base_url().'/'?>assets/images/favicon.ico">

<!-- Bootstrap Css -->
<link href="<?=base_url().'/'?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?=base_url().'/'?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?=base_url().'/'?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<body data-topbar="light" data-layout="horizontal" ></body>

<div id="layout-wrapper">

    <header id="page-topbar">

        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="<?= base_url() . 'dashboard'?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?=base_url().'/'?>assets/images/logo.svg" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=base_url().'/'?>assets/images/logo-dark.png" alt="" height="60">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?=base_url().'/'?>assets/images/logo-light.svg" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=base_url().'/'?>assets/images/logo-light.png" alt="" height="19">
                        </span>
                    </a>
                </div>

                <button type="button"
                    class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                    data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>



                <div class="dropdown dropdown-mega d-none d-lg-block ms-2">

                    <div class="dropdown-menu dropdown-megamenu">
                        <div class="row">
                            <div class="col-sm-8">

                                <div class="row">





                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Search input">

                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>s
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

     
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-customize"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <div class="px-lg-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="layouts-hori-topbar-light.html#">
                                        <img src="<?=base_url().'/'?>assets/images/brands/github.png" alt="Github">
                                        <span>GitHub</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="layouts-hori-topbar-light.html#">
                                        <img src="<?=base_url().'/'?>assets/images/brands/bitbucket.png" alt="bitbucket">
                                        <span>Bitbucket</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="layouts-hori-topbar-light.html#">
                                        <img src="<?=base_url().'/'?>assets/images/brands/dribbble.png" alt="dribbble">
                                        <span>Dribbble</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row no-gutters">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="layouts-hori-topbar-light.html#">
                                        <img src="<?=base_url().'/'?>assets/images/brands/dropbox.png" alt="dropbox">
                                        <span>Dropbox</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="layouts-hori-topbar-light.html#">
                                        <img src="<?=base_url().'/'?>assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                        <span>Mail Chimp</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="layouts-hori-topbar-light.html#">
                                        <img src="<?=base_url().'/'?>assets/images/brands/slack.png" alt="slack">
                                        <span>Slack</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-bell bx-tada"></i>
                        <span class="badge bg-danger rounded-pill">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="layouts-hori-topbar-light.html#!" class="small" key="t-view-all"> View
                                        All</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar="init" style="max-height: 230px;">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                            <div class="simplebar-content" style="padding: 0px;">
                                                <a href="javascript: void(0);" class="text-reset notification-item">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3">
                                                            <span
                                                                class="avatar-title bg-primary rounded-circle font-size-16">
                                                                <i class="bx bx-cart"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1" key="t-your-order">Your order is placed
                                                            </h6>
                                                            <div class="font-size-12 text-muted">
                                                                <p class="mb-1" key="t-grammer">If several languages
                                                                    coalesce the grammar</p>
                                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                                    <span key="t-min-ago">3 min ago</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript: void(0);" class="text-reset notification-item">
                                                    <div class="d-flex">
                                                        <img src="<?=base_url().'/'?>assets/images/users/avatar-3.jpg"
                                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1">James Lemire</h6>
                                                            <div class="font-size-12 text-muted">
                                                                <p class="mb-1" key="t-simplified">It will seem like
                                                                    simplified English.</p>
                                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                                    <span key="t-hours-ago">1 hours ago</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript: void(0);" class="text-reset notification-item">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3">
                                                            <span
                                                                class="avatar-title bg-success rounded-circle font-size-16">
                                                                <i class="bx bx-badge-check"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1" key="t-shipped">Your item is shipped</h6>
                                                            <div class="font-size-12 text-muted">
                                                                <p class="mb-1" key="t-grammer">If several languages
                                                                    coalesce the grammar</p>
                                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                                    <span key="t-min-ago">3 min ago</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="javascript: void(0);" class="text-reset notification-item">
                                                    <div class="d-flex">
                                                        <img src="<?=base_url().'/'?>assets/images/users/avatar-4.jpg"
                                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1">Salena Layfield</h6>
                                                            <div class="font-size-12 text-muted">
                                                                <p class="mb-1" key="t-occidental">As a skeptical
                                                                    Cambridge friend of mine occidental.</p>
                                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                                    <span key="t-hours-ago">1 hours ago</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar"
                                    style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                <div class="simplebar-scrollbar"
                                    style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                            </div>
                        </div>
                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View
                                    More..</span>
                            </a>
                        </div>
                    </div>
                </div>

                 <div class="dropdown d-inline-block">

                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                            src="https://lh3.googleusercontent.com/a/AATXAJythYcT4oIJTRHBsl6U-wqFwPgMdON6S0Qv4yfv=s96-c"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">Morel</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>

                    <!-- <div class="dropdown-menu dropdown-menu-end">
                        <!-- item
                        <a class="dropdown-item" href="layouts-hori-topbar-light.html#"><i
                                class="bx bx-user font-size-16 align-middle me-1"></i> <span
                                key="t-profile">Profile</span></a>
                        <a class="dropdown-item" href="layouts-hori-topbar-light.html#"><i
                                class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My
                                Wallet</span></a>
                        <a class="dropdown-item d-block" href="layouts-hori-topbar-light.html#"><span
                                class="badge bg-success float-end">11</span><i
                                class="bx bx-wrench font-size-16 align-middle me-1"></i> <span
                                key="t-settings">Settings</span></a>
                        <a class="dropdown-item" href="layouts-hori-topbar-light.html#"><i
                                class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span
                                key="t-lock-screen">Lock screen</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="layouts-hori-topbar-light.html#"><i
                                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                key="t-logout">Logout</span></a>
                    </div>-->

                    <ul class="dropdown-menu" aria-labelledby="page-header-user-dropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="<?= base_url() . 'logout'?>">Logout</a></li>
                    </ul>
                </div>


            </div>
        </div>
    </header>

    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">

                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'dashboard' ?>" id="topnav-dashboard"
                            role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Tableau de bord</span>
                        </a>




                        
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="layouts-hori-topbar-light.html#"
                                id="topnav-layout" role="button">
                                <i class="bx bx-layout me-2"></i><span key="t-layouts">Vie de l'école</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-layout">

                                <a href="annuaire.php" class="dropdown-item" key="t-horizontal">Listes</a>

                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none"
                                        href="layouts-hori-topbar-light.html#" id="topnav-layout-verti" role="button">
                                        <span key="t-vertical">Réservation d'espace</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-layout-verti">
                                        <a href="layouts-light-sidebar.html" class="dropdown-item"
                                            key="t-light-sidebar">Light Sidebar</a>
                                        <a href="layouts-compact-sidebar.html" class="dropdown-item"
                                            key="t-compact-sidebar">Compact Sidebar</a>
                                        <a href="layouts-icon-sidebar.html" class="dropdown-item"
                                            key="t-icon-sidebar">Icon Sidebar</a>
                                        <a href="layouts-boxed.html" class="dropdown-item" key="t-boxed-width">Boxed
                                            Width</a>
                                        <a href="layouts-preloader.html" class="dropdown-item"
                                            key="t-preloader">Preloader</a>
                                        <a href="layouts-colored-sidebar.html" class="dropdown-item"
                                            key="t-colored-sidebar">Colored Sidebar</a>
                                        <a href="layouts-scrollable.html" class="dropdown-item"
                                            key="t-scrollable">Scrollable</a>
                                    </div>
                                </div>

                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none"
                                        href="layouts-hori-topbar-light.html#" id="topnav-layout-hori" role="button">
                                        <span key="t-horizontal">Horizontal</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-layout-hori">
                                        <a href="layouts-horizontal.html" class="dropdown-item"
                                            key="t-horizontal">Horizontal</a>
                                        <a href="layouts-hori-topbar-light.html" class="dropdown-item"
                                            key="t-topbar-light">Topbar light</a>
                                        <a href="layouts-hori-boxed-width.html" class="dropdown-item"
                                            key="t-boxed-width">Boxed width</a>
                                        <a href="layouts-hori-preloader.html" class="dropdown-item"
                                            key="t-preloader">Preloader</a>
                                        <a href="layouts-hori-colored-header.html" class="dropdown-item"
                                            key="t-colored-topbar">Colored Header</a>
                                        <a href="layouts-hori-scrollable.html" class="dropdown-item"
                                            key="t-scrollable">Scrollable</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="layouts-hori-topbar-light.html#"
                                id="topnav-layout" role="button">
                                <i class="bx bx-layout me-2"></i><span key="t-layouts">Ressources</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                <a href="wifi.php" class="dropdown-item" key="t-horizontal">Réseau WIFI</a>
                                <a href="plateformes.php" class="dropdown-item" key="t-horizontal">Plateformes</a>
                                <a href="abonnements.php" class="dropdown-item" key="t-horizontal">Abonnements
                                    agendas</a>
                                <a href="layouts-horizontal.html" class="dropdown-item" key="t-horizontal">Signature
                                    mail</a>
                                <a href="documents.php" class="dropdown-item" key="t-horizontal">Documents</a>



                            </div>
                        </li>-->



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'projets' ?>" id="topnav-dashboard" role="button">
                                <i class="bx bx-world me-2"></i><span key="t-dashboards">Appels à projet</span> 
                            </a>


                            <div class="dropdown-menu" aria-labelledby="topnav-layout">
                                <a  href="<?= base_url().'projets/M' ?>" class="dropdown-item" key="t-horizontal">Projet Manager</a>
       
                               

                            </div>

                           
                        </li>
                       

                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'reservations' ?>" id="topnav-dashboard" role="button">
                            <i class="bx bx-world me-2"></i><span key="t-dashboards">Rervations</span> 
                        </a>

                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'magasin' ?>" id="topnav-dashboard" role="button">
                            <i class="bx bx-world me-2"></i><span key="t-dashboards">Magasin</span> 
                        </a>

                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'aide' ?>" id="topnav-dashboard" role="button">
                            <i class="bx bx-world me-2"></i><span key="t-dashboards">Aide</span> 
                        </a>

                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'outils' ?>" id="topnav-dashboard" role="button">
                            <i class="bx bx-world me-2"></i><span key="t-dashboards">Outils</span> 
                        </a>
                        
                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'plateforme' ?>" id="topnav-dashboard" role="button">
                            <i class="bx bx-world me-2"></i><span key="t-dashboards">Plateforme</span> 
                        </a>

                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'absence' ?>" id="topnav-dashboard" role="button">
                            <i class="bx bx-world me-2"></i><span key="t-dashboards">Gestion d'absece</span> 
                        </a>

                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'RH/actualite' ?>" id="topnav-dashboard" role="button">
                            <i class="bx bx-world me-2"></i><span key="t-dashboards">RH - Formation</span> 
                        </a>

                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'annuaire' ?>" id="topnav-dashboard" role="button">
                            <i class="bx bx-world me-2"></i><span key="t-dashboards">Annuaire</span> 
                        </a>


                       


                        <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url().'aide' ?>" id="topnav-dashboard"
                            role="button">
                            <i class="bx bx-world me-2"></i><span key="t-dashboards">Discrimination/harcèlement</span>
                        </a>






                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?= $this->renderSection('pageName') ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                    <li class="breadcrumb-item active">Horizontal Topbar Light</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <?= $this->renderSection('content') ?>

                <footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                document.write(new Date().getFullYear())
                </script> © Skote.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Themesbrand
                </div>
            </div>
        </div>
    </div>
</footer>


        <!--<script src="assets/libs/jquery/jquery.min.js"></script>-->
        <!-- <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        
        
        
        <script src="<?= base_url().'/'?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/node-waves/waves.min.js"></script>
        
          <!-- Required datatable js -->
        <script src="<?= base_url().'/'?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?= base_url().'/'?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?= base_url().'/'?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url().'/'?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?= base_url().'/'?>assets/js/pages/datatables.init.js"></script>    

        <script src="<?= base_url().'/'?>assets/js/app.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

        


</body>
