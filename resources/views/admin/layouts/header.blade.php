<!DOCTYPE html><!-- saved from url=(0014)about:internet -->
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">


<head><!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') || {{ config('detailsApp.name') }} </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
        
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('logo/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('logo/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}" />
        

    <link id="style" href="{{ asset('a_assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Style Css -->
    <link href="{{ asset('a_assets/css/styles.min.css') }}" rel="stylesheet"> <!-- Icons Css -->
    <link href="{{ asset('a_assets/css/icons.css') }}" rel="stylesheet"> <!-- Node Waves Css -->
    <link href="{{ asset('a_assets/css/icons.min.css') }}" rel="stylesheet"> <!-- Node Waves Css -->
    <link href="{{ asset('a_assets/libs/node-waves/waves.min.css') }}" rel="stylesheet"> <!-- Simplebar Css -->
    <link href="{{ asset('a_assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet"> <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('a_assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('a_assets/libs/%40simonwep/pickr/themes/nano.min.css') }}">
    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('a_assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('a_assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('a_assets/libs/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />
    <!-- Choices JS -->
    <script src="{{ asset('a_assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script> <!-- Main Theme Js -->
    <script src="{{ asset('a_assets/js/main.js') }}"></script> <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('/a_assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Style Css -->
    <link href="{{ asset('a_assets/css/styles.css') }}" rel="stylesheet"> <!-- Icons Css -->
    <link href="{{ asset('a_assets/css/icons.css') }}" rel="stylesheet"> <!-- Node Waves Css -->
    <link href="{{ asset('a_assets/libs/node-waves/waves.min.css') }}" rel="stylesheet"> <!-- Simplebar Css -->
    <link href="{{ asset('a_assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet"> <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('a_assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('a_assets/libs/@simonwep/pickr/themes/nano.min.css') }}">
    
        <!-- Choices JS -->
    <script src="{{ asset('a_assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script> <!-- Main Theme Js -->
    <script src="{{ asset('a_assets/js/main.js') }}"></script> <!-- Bootstrap Css -->
    <!-- Choices Css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    <meta http-equiv="imagetoolbar" content="no" />
    <style type="text/css">
        input,
        textarea {
            -webkit-touch-callout: default;
            -webkit-user-select: auto;
            -khtml-user-select: auto;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text
        }

        * {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: -moz-none;
            -ms-user-select: none;
            user-select: none
        }
    </style>
    <style type="text/css" media="print">
        body {
            display: none
        }
    </style>
</head>

<body><!-- Start Switcher -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5> <button type="button"
                class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="border-bottom border-block-end-dashed">
                <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist"> <button
                        class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-home" type="button" role="tab" aria-controls="switcher-home"
                        aria-selected="true">Theme Styles</button> <button class="nav-link" id="switcher-profile-tab"
                        data-bs-toggle="tab" data-bs-target="#switcher-profile" type="button" role="tab"
                        aria-controls="switcher-profile" aria-selected="false">Theme Colors</button> </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel"
                    aria-labelledby="switcher-home-tab" tabindex="0">
                    <div class="">
                        <p class="switcher-style-head">Theme Color Mode:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-light-theme"> Light </label> <input class="form-check-input"
                                        type="radio" name="theme-style" id="switcher-light-theme" checked> </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-dark-theme"> Dark </label> <input class="form-check-input"
                                        type="radio" name="theme-style" id="switcher-dark-theme"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Directions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-ltr"> LTR </label> <input class="form-check-input"
                                        type="radio" name="direction" id="switcher-ltr" checked> </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-rtl"> RTL </label> <input class="form-check-input"
                                        type="radio" name="direction" id="switcher-rtl"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Navigation Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-vertical"> Vertical </label> <input class="form-check-input"
                                        type="radio" name="navigation-style" id="switcher-vertical" checked> </div>
                            </div>
                            <div class="col-4">
                                {{-- <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-horizontal"> Horizontal </label> <input class="form-check-input"
                                        type="radio" name="navigation-style" id="switcher-horizontal"> </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="navigation-menu-styles">
                        <p class="switcher-style-head">Vertical & Horizontal Menu Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-menu-click"> Menu Click </label> <input class="form-check-input"
                                        type="radio" name="navigation-menu-styles" id="switcher-menu-click"> </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-menu-hover"> Menu Hover </label> <input class="form-check-input"
                                        type="radio" name="navigation-menu-styles" id="switcher-menu-hover"> </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-icon-click"> Icon Click </label> <input class="form-check-input"
                                        type="radio" name="navigation-menu-styles" id="switcher-icon-click"> </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-icon-hover"> Icon Hover </label> <input class="form-check-input"
                                        type="radio" name="navigation-menu-styles" id="switcher-icon-hover"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu-layout-styles">
                        <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-sm-6">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-default-menu"> Default Menu </label> <input
                                        class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-default-menu" checked> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-closed-menu"> Closed Menu </label> <input
                                        class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-closed-menu"> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-icontext-menu"> Icon Text </label> <input
                                        class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icontext-menu"> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-icon-overlay"> Icon Overlay </label> <input
                                        class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icon-overlay"> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-detached"> Detached </label> <input class="form-check-input"
                                        type="radio" name="sidemenu-layout-styles" id="switcher-detached"> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-double-menu"> Double Menu </label> <input
                                        class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-double-menu"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Page Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-regular"> Regular </label> <input class="form-check-input"
                                        type="radio" name="page-styles" id="switcher-regular" checked> </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-classic"> Classic </label> <input class="form-check-input"
                                        type="radio" name="page-styles" id="switcher-classic"> </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-modern"> Modern </label> <input class="form-check-input"
                                        type="radio" name="page-styles" id="switcher-modern"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Layout Width Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-full-width"> Full Width </label> <input class="form-check-input"
                                        type="radio" name="layout-width" id="switcher-full-width" checked> </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-boxed"> Boxed </label> <input class="form-check-input"
                                        type="radio" name="layout-width" id="switcher-boxed"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Menu Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-menu-fixed"> Fixed </label> <input class="form-check-input"
                                        type="radio" name="menu-positions" id="switcher-menu-fixed" checked> </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-menu-scroll"> Scrollable </label> <input
                                        class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-scroll"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Header Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-header-fixed"> Fixed </label> <input class="form-check-input"
                                        type="radio" name="header-positions" id="switcher-header-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select"> <label class="form-check-label"
                                        for="switcher-header-scroll"> Scrollable </label> <input
                                        class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-scroll"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel"
                    aria-labelledby="switcher-profile-tab" tabindex="0">
                    <div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Menu Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-light"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-dark" checked> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-primary"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Menu" type="radio"
                                        name="menu-colors" id="switcher-menu-gradient"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-transparent"> </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Header" type="radio"
                                        name="header-colors" id="switcher-header-light" checked> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Header" type="radio"
                                        name="header-colors" id="switcher-header-dark"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Header" type="radio"
                                        name="header-colors" id="switcher-header-primary"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Header" type="radio"
                                        name="header-colors" id="switcher-header-gradient"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Header"
                                        type="radio" name="header-colors" id="switcher-header-transparent"> </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Primary:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-primary-1" type="radio"
                                        name="theme-primary" id="switcher-primary"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-primary-2" type="radio"
                                        name="theme-primary" id="switcher-primary1"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-primary-3" type="radio"
                                        name="theme-primary" id="switcher-primary2"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-primary-4" type="radio"
                                        name="theme-primary" id="switcher-primary3"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-primary-5" type="radio"
                                        name="theme-primary" id="switcher-primary4"> </div>
                                <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                    <div class="theme-container-primary"></div>
                                    <div class="pickr-container-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Background:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-bg-1" type="radio"
                                        name="theme-background" id="switcher-background"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-bg-2" type="radio"
                                        name="theme-background" id="switcher-background1"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-bg-3" type="radio"
                                        name="theme-background" id="switcher-background2"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-bg-4" type="radio"
                                        name="theme-background" id="switcher-background3"> </div>
                                <div class="form-check switch-select me-3"> <input
                                        class="form-check-input color-input color-bg-5" type="radio"
                                        name="theme-background" id="switcher-background4"> </div>
                                <div
                                    class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                                    <div class="theme-container-background"></div>
                                    <div class="pickr-container-background"></div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-image mb-3">
                            <p class="switcher-style-head">Menu With Background Image:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select m-2"> <input
                                        class="form-check-input bgimage-input bg-img1" type="radio"
                                        name="theme-background" id="switcher-bg-img"> </div>
                                <div class="form-check switch-select m-2"> <input
                                        class="form-check-input bgimage-input bg-img2" type="radio"
                                        name="theme-background" id="switcher-bg-img1"> </div>
                                <div class="form-check switch-select m-2"> <input
                                        class="form-check-input bgimage-input bg-img3" type="radio"
                                        name="theme-background" id="switcher-bg-img2"> </div>
                                <div class="form-check switch-select m-2"> <input
                                        class="form-check-input bgimage-input bg-img4" type="radio"
                                        name="theme-background" id="switcher-bg-img3"> </div>
                                <div class="form-check switch-select m-2"> <input
                                        class="form-check-input bgimage-input bg-img5" type="radio"
                                        name="theme-background" id="switcher-bg-img4"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between canvas-footer flex-wrap"><a href="javascript:void(0);"
                        id="reset-all" class="btn btn-danger m-1">Reset</a>
                </div>
            </div>
        </div>
    </div> <!-- End Switcher -->
    <div class="page"> <!-- app-header -->
        <header class="app-header"> <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid"> <!-- Start::header-content-left -->
                <div class="header-content-left"> <!-- Start::header-element -->
                    <!--<div class="header-element">-->
                    <!--    <div class="horizontal-logo"> <a href="#" class="header-logo"> <img-->
                    <!--                src="{{ asset('logo/logo.png') }}" alt="logo"-->
                    <!--                class="desktop-logo">-->
                    <!--            <img src="{{ asset('logo/logo.png') }}" alt="logo"-->
                    <!--                class="toggle-logo">-->
                    <!--            <img src="{{ asset('logo/logo.png') }}" alt="logo"-->
                    <!--                class="desktop-dark"> <img-->
                    <!--                src="{{ asset('logo/logo.png') }}" alt="logo"-->
                    <!--                class="toggle-dark"> </a> -->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <!-- End::header-element -->
                    
                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="Hide Sidebar"
                            class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                            data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->
                    
                </div> <!-- End::header-content-left --> <!-- Start::header-content-right -->
                <div class="header-content-right"> <!-- Start::header-element -->
                    <!-- End::header-element --> <!-- Start::header-element -->
                    <!-- End::header-element --> <!-- Start::header-element -->
                    <div class="header-element"> <!-- Start::header-link|dropdown-toggle --> 
                        <a href="javascript:void(0);"
                            class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="me-sm-2 me-0"> <img src="{{ asset('a_assets/images/faces/9.jpg') }}"
                                        alt="img" width="32" height="32" class="rounded-circle"> </div>
                                <div class="d-sm-block d-none">
                                    <p class="fw-semibold mb-0 lh-1">Admin</p>
                                    <!--<span class="op-7 fw-normal d-block fs-11">Web Designer</span>-->
                                </div>
                            </div>
                        </a> <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                            aria-labelledby="mainHeaderProfile">
                            <li><a class="dropdown-item d-flex" href="{{ url('admin/profile') }}"><i
                                        class="ti ti-user-circle fs-18 me-2 op-7"></i>My Profile</a></li>
                            <li><a class="dropdown-item d-flex" href="{{ url('admin/logout') }}"><i
                                        class="ti ti-logout fs-18 me-2 op-7"></i>Log Out</a></li>
                        </ul>
                    </div> <!-- End::header-element --> 
                    <!-- Start::header-element -->
                    <div class="header-element"> <!-- Start::header-link|switcher-icon -->
                         <!--<a href="#"-->
                         <!--   class="header-link switcher-icon" data-bs-toggle="offcanvas"-->
                         <!--   data-bs-target="#switcher-canvas">-->
                         <!--<i class="bx bx-cog header-link-icon"></i> -->
                         <!--</a>-->
                        <!-- End::header-link|switcher-icon --> </div> 
                        <!-- End::header-element -->
                    </div> <!-- End::header-content-right -->
                </div> <!-- End::main-header-container -->
        </header> <!-- /app-header --> <!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky" id="sidebar"> <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header"> <a href="{{ url('admin/dashboard') }}" class="header-logo"> <img
                        src="{{ asset('logo/logo.png') }}" alt="logo"
                        class="desktop-logo" style="height: 60px"> <img src="{{ asset('logo/logo.png') }}"
                        alt="logo" class="toggle-logo" style="height: 60px"> <img
                        src="{{ asset('logo/logo.png') }}" alt="logo"
                        class="desktop-dark" style="height: 60px"> <img src="{{ asset('logo/logo.png') }}"
                        alt="logo" class="toggle-dark" style="height: 60px"> </a>
            </div>
            <!-- End::main-sidebar-header --> <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll"> <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left"> <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg> </div>
                    <ul class="main-menu"> <!-- Start::slide__category -->
                        <!-- End::slide__category --> <!-- Start::slide -->
                        <li class="slide has-sub"> <a href="{{ url('admin/dashboard') }}" class="side-menu__item">
                                <i class="bx bx-home side-menu__icon"></i> <span
                                    class="side-menu__label">Dashboard<span
                                        class="badge bg-warning-transparent ms-2"></span></span> </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1"> <a href="javascript:void(0)">Dashboards</a> </li>
                                {{-- <li class="slide"> <a href="index.html" class="side-menu__item">CRM</a> </li>
                                <li class="slide"> <a href="index-1.html" class="side-menu__item">Ecommerce</a>
                                </li>
                                <li class="slide"> <a href="index-2.html" class="side-menu__item">Crypto</a> </li>
                                <li class="slide"> <a href="index-3.html" class="side-menu__item">Jobs</a> </li>
                                <li class="slide"> <a href="index-4.html" class="side-menu__item">NFT</a> </li>
                                <li class="slide"> <a href="index-5.html" class="side-menu__item">Sales</a> </li>
                                <li class="slide"> <a href="index-6.html" class="side-menu__item">Analytics</a>
                                </li>
                                <li class="slide"> <a href="index-7.html" class="side-menu__item">Projects</a> </li>
                                <li class="slide"> <a href="index-8.html" class="side-menu__item">HRM</a> </li>
                                <li class="slide"> <a href="index-9.html" class="side-menu__item">Stocks</a> </li>
                                <li class="slide"> <a href="index-10.html" class="side-menu__item">Courses</a> </li>
                                <li class="slide"> <a href="index-11.html" class="side-menu__item">Personal</a> --}}
                        </li>
                    </ul>
                    </li> <!-- End::slide --> <!-- Start::slide__category -->
                    {{-- <li class="slide__category"><span class="category-name">Pages</span></li> --}}
                    <!-- End::slide__category --> <!-- Start::slide -->
                    <!--<li class="slide has-sub"> <a href="{{ url('admin/profile') }}" class="side-menu__item">-->
                    <!--        <i class="bx bx-file side-menu__icon"></i> <span class="side-menu__label">My Profile</span> </a>-->
                    <!--    <ul class="slide-menu child1">-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <li class="slide has-sub"> <a href="{{ url('admin/dash-messages') }}" class="side-menu__item">
                            <i class="bx bx-file-blank side-menu__icon"></i> <span class="side-menu__label">Dasboard
                                Messages</span> </a>
                        <ul class="slide-menu child1">
                        </ul>
                    </li> <!-- End::slide --> <!-- Start::slide -->
                    <!--<li class="slide has-sub"> <a href="{{ url('admin/deposit-details') }}" class="side-menu__item">-->
                    <!--        <i class="bx bx-fingerprint side-menu__icon"></i> <span class="side-menu__label">Deposit-->
                    <!--            Details</span> </a>-->
                    <!--    <ul class="slide-menu child1">-->
                    <!--        <li class="slide side-menu__label1"> <a href="javascript:void(0)">Authentication</a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li> -->
                    <!-- End::slide --> <!-- Start::slide -->
                    <!--<li class="slide has-sub"> <a href="{{ url('admin/rate/set-rates') }}" class="side-menu__item">-->
                    <!--        <i class="bx bx-error side-menu__icon"></i> <span class="side-menu__label">Set-->
                    <!--            Rates</span>-->
                    <!--    </a>-->
                    <!--    <ul class="slide-menu child1">-->
                    <!--        <li class="slide side-menu__label1"> <a href="javascript:void(0)">Error</a> </li>-->

                    <!--    </ul>-->
                    <!--</li> -->
                    <!-- End::slide --> <!-- Start::slide__category -->
                    {{-- <li class="slide__category"><span class="category-name">General</span></li> --}}
                    <!-- End::slide__category --> <!-- Start::slide -->
                    <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item"> <i
                                class="bx bx-id-card side-menu__icon"></i> <span class="side-menu__label">Member
                                Management</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                        <ul class="slide-menu child1 mega-menu">
                            <li class="slide side-menu__label1"> <a href="javascript:void(0)">Ui Elements</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/member-details') }}"
                                    class="side-menu__item">Member Details</a>
                            </li>
                            <!--<li class="slide"> <a href="{{ url('admin/data-table') }}" class="side-menu__item">Data-->
                            <!--        Table</a>-->
                            <!--</li>-->
                            <li class="slide"> <a href="{{ url('admin/account-control') }}"
                                    class="side-menu__item">Account Control</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/member-security') }}"
                                    class="side-menu__item">Members
                                    Security</a>
                            </li>
                            {{-- <li class="slide"> <a href="{{url('admin/member-activation')}}" class="side-menu__item">Free Member
                                    Activation</a>
                            </li> --}}
                            <li class="slide"> <a href="{{ url('admin/wallet-address') }}"
                                    class="side-menu__item">Member Wallet
                                    Address</a>
                            </li>
                        </ul>
                    </li> <!-- End::slide --> <!-- Start::slide -->
                    <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item"> <i
                                class="bx bx-medal side-menu__icon"></i> <span class="side-menu__label">Funds
                                Management</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1"> <a href="javascript:void(0)">Utilities</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/funds/add-funds') }}"
                                    class="side-menu__item">Add Funds</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/funds/deduct-funds') }}"
                                    class="side-menu__item">Deduct Funds</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/funds/add-funds-details') }}"
                                    class="side-menu__item">Funds
                                    Details</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/funds/import-fund-history') }}"
                                    class="side-menu__item">Import Fund History</a>
                            </li>
                            <!--<li class="slide"> <a href="{{ url('admin/funds/request-history') }}"-->
                            <!--        class="side-menu__item">Requests-->
                            <!--        History</a>-->
                            <!--</li>-->
                    </li>
                    </ul>
                    </li> <!-- End::slide --> <!-- Start::slide -->
                    <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item"> <i
                                class="bx bx-file side-menu__icon"></i> <span class="side-menu__label">Pakage
                                Section</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1"> <a href="javascript:void(0)">Forms</a> </li>

                            <!--<li class="slide"> <a href="{{ url('admin/staking-details') }}"-->
                            <!--        class="side-menu__item">Staking-->
                            <!--        Details</a> </li>-->
                            <li class="slide"> <a href="{{ url('admin/package-details') }}"
                                    class="side-menu__item">Pakage
                                    Details</a>
                            </li>
                        </ul>
                    </li> <!-- End::slide --> <!-- Start::slide -->
                    <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item"> <i
                                class="bx bx-wallet-alt side-menu__icon"></i> <span class="side-menu__label">Income
                                Section</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1"> <a href="javascript:void(0)">Income Section</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/income/level-income') }}"
                                    class="side-menu__item">Level Income</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/income/direct-income') }}"
                                    class="side-menu__item">Direct Income</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/income/global-autopool-income') }}"
                                    class="side-menu__item">Global Autopool Income</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/income/withdrawal-income') }}"
                                    class="side-menu__item">Withdrawal Income</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/income/reward-income') }}"
                                    class="side-menu__item">Reward Income</a>
                            </li>
                        </ul>
                    </li> <!-- End::slide --> <!-- Start::slide -->
                    <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item"> <i
                                class="bx bx-layer side-menu__icon"></i> <span class="side-menu__label">Payment
                                Management</span> <i class="fe fe-chevron-right side-menu__angle"></i> </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1"> <a href="javascript:void(0)">Nested Menu</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/new-withdrawal-request') }}"
                                    class="side-menu__item">New
                                    Withdrawal Requests</a>
                            </li>
                            <li class="slide has-sub"> <a href="{{ url('admin/cancelled-request') }}"
                                    class="side-menu__item">Cancelled Requests</a>
                            </li>
                            <li class="slide has-sub"> <a href="{{ url('admin/payment-history') }}"
                                    class="side-menu__item">Payment History</a>
                            </li>
                        </ul>
                    </li>

                    <!-- End::slide --> <!-- Start::slide__category -->
                    {{-- <li class="slide__category"><span class="category-name">Web Apps</span></li> --}}
                    <!-- End::slide__category --> <!-- Start::slide -->
                    <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item"> <i
                                class="bx bx-chat side-menu__icon"></i> <span
                                class="side-menu__label">Support</span> <i
                                class="fe fe-chevron-right side-menu__angle"></i> </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1"> <a href="javascript:void(0)">Apps</a> </li>
                            <li class="slide"> <a href="{{ url('admin/support/new-support-ticket') }}"
                                    class="side-menu__item">New Support
                                    Tickets</a> </li>
                            <li class="slide"> <a href="{{ url('admin/support/open-support-ticket') }}"
                                    class="side-menu__item">Open Support
                                    Tickets</a>
                            </li>
                            <li class="slide"> <a href="{{ url('admin/support/close-support-ticket') }}"
                                    class="side-menu__item">Closed Support
                                    Tickets</a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide"> <a href="{{ url('admin/logout') }}" class="side-menu__item"> <i
                                class="bx bx-log-out side-menu__icon"></i> <span class="side-menu__label">Logout<span
                                    class="badge bg-danger-transparent ms-2"></span></span> </a> </li>
                    <!-- End::slide --> <!-- Start::slide -->
                    <!-- End::slide --> <!-- Start::slide__category -->
                    {{-- <li class="slide__category"><span class="category-name">Tables & Charts</span></li> --}}
                    <!-- End::slide__category --> <!-- Start::slide -->
                    {{-- <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item"> <i
                                class="bx bx-table side-menu__icon"></i> <span class="side-menu__label">Tables<span
                                    class="badge bg-success-transparent ms-2">3</span></span> <i
                                class="fe fe-chevron-right side-menu__angle"></i> </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1"> <a href="javascript:void(0)">Tables</a> </li>
                            <li class="slide"> <a href="tables.html" class="side-menu__item">Tables</a> </li>
                            <li class="slide"> <a href="grid-tables.html" class="side-menu__item">Grid JS
                                    Tables</a>
                            </li>
                            <li class="slide"> <a href="data-tables.html" class="side-menu__item">Data
                                    Tables</a>
                            </li>
                        </ul>
                    </li> <!--  End::slide --> <!-- Start::slide --> --}}
                    {{-- <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item"> <i
                                class="bx bx-bar-chart-square side-menu__icon"></i> <span
                                class="side-menu__label">Charts</span> <i
                                class="fe fe-chevron-right side-menu__angle"></i> </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1"> <a href="javascript:void(0)">Charts</a> </li>
                            <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item">Apex
                                    Charts <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                <ul class="slide-menu child2">
                                    <li class="slide"> <a href="apex-line-charts.html"
                                            class="side-menu__item">Line
                                            Charts</a> </li>
                                    <li class="slide"> <a href="apex-area-charts.html"
                                            class="side-menu__item">Area
                                            Charts</a> </li>
                                    <li class="slide"> <a href="apex-column-charts.html"
                                            class="side-menu__item">Column Charts</a> </li>
                                    <li class="slide"> <a href="apex-bar-charts.html" class="side-menu__item">Bar
                                            Charts</a> </li>
                                    <li class="slide"> <a href="apex-mixed-charts.html"
                                            class="side-menu__item">Mixed Charts</a> </li>
                                    <li class="slide"> <a href="apex-rangearea-charts.html"
                                            class="side-menu__item">Range Area Charts</a> </li>
                                    <li class="slide"> <a href="apex-timeline-charts.html"
                                            class="side-menu__item">Timeline Charts</a> </li>
                                    <li class="slide"> <a href="apex-candlestick-charts.html"
                                            class="side-menu__item">CandleStick Charts</a> </li>
                                    <li class="slide"> <a href="apex-boxplot-charts.html"
                                            class="side-menu__item">Boxplot Charts</a> </li>
                                    <li class="slide"> <a href="apex-bubble-charts.html"
                                            class="side-menu__item">Bubble Charts</a> </li>
                                    <li class="slide"> <a href="apex-scatter-charts.html"
                                            class="side-menu__item">Scatter Charts</a> </li>
                                    <li class="slide"> <a href="apex-heatmap-charts.html"
                                            class="side-menu__item">Heatmap Charts</a> </li>
                                    <li class="slide"> <a href="apex-treemap-charts.html"
                                            class="side-menu__item">Treemap Charts</a> </li>
                                    <li class="slide"> <a href="apex-pie-charts.html" class="side-menu__item">Pie
                                            Charts</a> </li>
                                    <li class="slide"> <a href="apex-radialbar-charts.html"
                                            class="side-menu__item">Radialbar Charts</a> </li>
                                    <li class="slide"> <a href="apex-radar-charts.html"
                                            class="side-menu__item">Radar Charts</a> </li>
                                    <li class="slide"> <a href="apex-polararea-charts.html"
                                            class="side-menu__item">Polararea Charts</a> </li>
                                </ul>
                            </li>
                            <li class="slide"> <a href="chartjs-charts.html" class="side-menu__item">Chartjs
                                    Charts</a> </li>
                            <li class="slide"> <a href="echarts.html" class="side-menu__item">Echart
                                    Charts</a>
                            </li>
                        </ul>
                    </li> <!-- End::slide --> <!-- Start::slide__category --> --}}
                    {{-- <li class="slide__category"><span class="category-name">Maps & Icons</span></li> --}}
                    <!-- End::slide__category --> <!-- Start::slide -->
                    {{-- <li class="slide has-sub"> <a href="javascript:void(0);" class="side-menu__item"> <i
                                class="bx bx-map side-menu__icon"></i> <span class="side-menu__label">Maps</span> <i
                                class="fe fe-chevron-right side-menu__angle"></i> </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1"> <a href="javascript:void(0)">Maps</a> </li>
                            <li class="slide"> <a href="google-maps.html" class="side-menu__item">Google
                                    Maps</a>
                            </li>
                            <li class="slide"> <a href="leaflet-maps.html" class="side-menu__item">Leaflet
                                    Maps</a>
                            </li>
                            <li class="slide"> <a href="vector-maps.html" class="side-menu__item">Vector
                                    Maps</a>
                            </li>
                        </ul>
                    </li> <!-- End::slide --> <!-- Start::slide --> --}}
                    {{-- <li class="slide"> <a href="icons.html" class="side-menu__item"> <i
                                class="bx bx-store-alt side-menu__icon"></i> <span
                                class="side-menu__label">Icons</span> </a> </li> <!-- End::slide --> --}}
                    </ul>
                    <!--<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"-->
                    <!--        width="24" height="24" viewBox="0 0 24 24">-->
                    <!--        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>-->
                    <!--    </svg></div>-->
                </nav> <!-- End::nav -->
            </div> <!-- End::main-sidebar -->
        </aside> <!-- End::app-sidebar --> <!-- Start::app-content -->
