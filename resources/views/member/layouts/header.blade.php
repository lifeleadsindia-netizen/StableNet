<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">



<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Laravel Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="dashboard bootstrap, laravel template, admin panel in laravel, php admin panel, admin panel for laravel, admin template bootstrap 5, laravel admin panel, admin dashboard template, hrm dashboard, vite laravel, admin dashboard, ecommerce admin dashboard, dashboard laravel, analytics dashboard, template dashboard, admin panel template, bootstrap admin panel template">

    <!-- TITLE -->
    <title> @yield('title') || {{ config('detailsApp.name') }} </title>

    <link rel="icon" type="image/png" href="{{ asset('logo/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('logo/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('logo/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}" />

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('user_assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <!-- ICONS CSS -->
    <link href="{{ asset('user_assets/icon-fonts/icons.css') }}" rel="stylesheet">

    <!-- APP SCSS -->
    <link rel="preload" as="style" href="{{ asset('user_assets/app-fce3f544.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/app-fce3f544.css') }}" />

    <!-- NODE WAVES CSS -->
    <link href="{{ asset('user_assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

    <!-- SIMPLEBAR CSS -->
    <link rel="stylesheet" href="{{ asset('user_assets/libs/simplebar/simplebar.min.css') }}">

    <!-- COLOR PICKER CSS -->
    <link rel="stylesheet" href="{{ asset('user_assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/libs/%40simonwep/pickr/themes/nano.min.css') }}">

    <!-- CHOICES CSS -->
    <link rel="stylesheet" href="{{ asset('user_assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <!-- CHOICES JS -->
    <script src="{{ asset('user_assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- MAIN JS -->
    <script src="{{ asset('user_assets/main.js') }}"></script>
    <link href="{{ asset('user_assets/css/geneology.css') }}" rel="stylesheet">
    <!-- Choices Css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

    <!-- NORMAL PREMIUM STYLING FOR NAVBAR & SIDEBAR -->
    <style>
        /* --- Top Navbar / Header --- */
        .app-header {
            background: #ffffff !important;
            border-bottom: 1px solid #edf2f7 !important;
            box-shadow: 0 1px 4px rgba(17, 28, 67, 0.04) !important;
            min-height: 64px !important;
            transition: all 0.25s ease;
        }

        .app-header .main-header-container {
            padding-left: 1.25rem !important;
            padding-right: 1.25rem !important;
            height: 100% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
        }

        /* Left Hamburger Menu Button */
        .main-header-container .header-content-left {
            display: flex !important;
            align-items: center !important;
        }

        .app-header .sidemenu-toggle.header-link {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 38px !important;
            height: 38px !important;
            border-radius: 8px !important;
            border: 1px solid #e2e8f0 !important;
            background: #f8fafc !important;
            transition: all 0.2s ease !important;
        }

        .app-header .sidemenu-toggle.header-link:hover {
            background-color: #f1f5f9 !important;
            border-color: #cbd5e1 !important;
        }

        /* Right Content Area */
        .main-header-container .header-content-right {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
        }

        /* Online Network Status Pill */
        .sn-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            border-radius: 20px;
            padding: 5px 12px;
            cursor: default;
            transition: all 0.2s ease;
        }

        .sn-status-pill:hover {
            background: #d1fae5;
            border-color: #6ee7b7;
        }

        .sn-pulse-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background-color: #10b981;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
            animation: snPulse 2s infinite;
        }

        @keyframes snPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.6);
            }
            70% {
                box-shadow: 0 0 0 6px rgba(16, 185, 129, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .sn-status-text {
            font-size: 11px;
            font-weight: 600;
            color: #065f46;
            letter-spacing: 0.4px;
            text-transform: uppercase;
        }

        /* User Profile Pill in Navbar */
        .main-header-container .header-element.sn-profile-element {
            display: flex !important;
            align-items: center !important;
        }

        .main-header-container .header-element .sn-profile-card,
        .sn-profile-card {
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 30px !important;
            padding: 4px 14px 4px 5px !important;
            height: auto !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 10px !important;
            text-decoration: none !important;
            transition: all 0.2s ease !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04) !important;
        }

        .main-header-container .header-element .sn-profile-card:hover,
        .main-header-container .header-element .sn-profile-card[aria-expanded="true"],
        .sn-profile-card:hover,
        .sn-profile-card[aria-expanded="true"] {
            background: #ffffff !important;
            border-color: #cbd5e1 !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08) !important;
            transform: translateY(-1px);
        }

        .sn-avatar-wrap {
            position: relative;
            width: 36px;
            height: 36px;
            flex-shrink: 0;
        }

        .sn-profile-img {
            width: 36px !important;
            height: 36px !important;
            border-radius: 50% !important;
            border: 2px solid #ffffff !important;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.12) !important;
            object-fit: cover !important;
        }

        .sn-avatar-badge {
            position: absolute;
            bottom: -1px;
            right: -1px;
            width: 10px;
            height: 10px;
            background-color: #10b981;
            border: 2px solid #ffffff;
            border-radius: 50%;
        }

        .sn-chevron {
            color: #94a3b8 !important;
            font-size: 14px !important;
            transition: transform 0.2s ease, color 0.2s ease !important;
        }

        .sn-profile-card:hover .sn-chevron,
        .sn-profile-card[aria-expanded="true"] .sn-chevron {
            color: #334155 !important;
        }

        .sn-profile-card[aria-expanded="true"] .sn-chevron {
            transform: rotate(180deg);
        }

        /* Profile Dropdown */
        .header-profile-dropdown {
            border-radius: 14px !important;
            border: 1px solid #e2e8f0 !important;
            box-shadow: 0 12px 28px -4px rgba(0, 0, 0, 0.1) !important;
            min-width: 230px !important;
            padding: 6px !important;
            margin-top: 8px !important;
        }

        .header-profile-dropdown .dropdown-item {
            border-radius: 8px;
            font-size: 13px;
            padding: 8px 12px;
            color: #334155;
            transition: all 0.15s ease;
        }

        .header-profile-dropdown .dropdown-item:hover {
            background-color: #f1f5f9;
            color: #0f172a;
            padding-left: 15px;
        }

        /* --- Sidebar Container & Styling --- */
        .app-sidebar {
            background: linear-gradient(180deg, #111c43 0%, #0a102a 100%) !important;
            border-right: 1px solid rgba(255, 255, 255, 0.06) !important;
            box-shadow: 2px 0 16px rgba(0, 0, 0, 0.08) !important;
        }

        .app-sidebar .main-sidebar-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
            padding: 14px 20px !important;
            background: transparent !important;
        }

        /* Menu Items */
        .app-sidebar .main-menu {
            padding: 8px 4px 28px 4px !important;
        }

        /* Top-level menu item */
        .app-sidebar .side-menu__item {
            margin: 2px 8px !important;
            padding: 9px 12px !important;
            border-radius: 8px !important;
            color: #cbd5e1 !important;
            font-size: 13.5px !important;
            font-weight: 500 !important;
            transition: background-color 0.15s ease, color 0.15s ease !important;
        }

        .app-sidebar .side-menu__icon {
            color: #818cf8 !important;
            font-size: 18px !important;
            margin-right: 10px !important;
            opacity: 0.85;
            transition: opacity 0.15s ease !important;
        }

        .app-sidebar .side-menu__angle {
            color: #94a3b8 !important;
            font-size: 11px !important;
            transition: transform 0.2s ease !important;
        }

        /* Top-level Hover */
        .app-sidebar .side-menu__item:hover {
            background-color: rgba(255, 255, 255, 0.06) !important;
            color: #ffffff !important;
        }

        .app-sidebar .side-menu__item:hover .side-menu__icon {
            opacity: 1;
        }

        .app-sidebar .side-menu__item:hover .side-menu__angle {
            color: #ffffff !important;
        }

        /* Top-level Active / Open state */
        .app-sidebar .slide.active > .side-menu__item,
        .app-sidebar .slide.has-sub.open > .side-menu__item {
            background-color: rgba(99, 102, 241, 0.16) !important;
            color: #ffffff !important;
            font-weight: 600 !important;
        }

        .app-sidebar .slide.active > .side-menu__item .side-menu__icon,
        .app-sidebar .slide.has-sub.open > .side-menu__item .side-menu__icon {
            color: #a5b4fc !important;
            opacity: 1;
        }

        .app-sidebar .slide.has-sub.open > .side-menu__item .side-menu__angle {
            color: #a5b4fc !important;
        }

        /* Submenu (Child 1 Dropdown) Container */
        .app-sidebar .slide-menu.child1 {
            background-color: rgba(7, 12, 33, 0.5) !important;
            border-radius: 8px !important;
            margin: 2px 8px 4px 8px !important;
            padding: 4px 0 !important;
            border-left: 2px solid rgba(99, 102, 241, 0.3) !important;
        }

        /* Submenu Child Item */
        .app-sidebar .slide-menu.child1 .side-menu__item {
            position: relative !important;
            padding: 7px 12px 7px 32px !important;
            margin: 1px 4px !important;
            font-size: 13px !important;
            font-weight: 400 !important;
            color: #cbd5e1 !important;
            border-radius: 6px !important;
            white-space: nowrap !important;
            transition: background-color 0.15s ease, color 0.15s ease !important;
        }

        /* Submenu Bullet Dot */
        .app-sidebar .slide-menu.child1 .side-menu__item:before {
            content: "" !important;
            position: absolute !important;
            left: 14px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            width: 5px !important;
            height: 5px !important;
            border-radius: 50% !important;
            background-color: #64748b !important;
            border: none !important;
            opacity: 0.9 !important;
            transition: background-color 0.15s ease, transform 0.15s ease !important;
        }

        /* Submenu Hover */
        .app-sidebar .slide-menu.child1 .side-menu__item:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: #ffffff !important;
        }

        .app-sidebar .slide-menu.child1 .side-menu__item:hover:before {
            background-color: #38bdf8 !important;
            transform: translateY(-50%) scale(1.3) !important;
        }

        /* Submenu Active Item */
        .app-sidebar .slide-menu.child1 .side-menu__item.active {
            background-color: rgba(56, 189, 248, 0.1) !important;
            color: #38bdf8 !important;
            font-weight: 600 !important;
        }

        .app-sidebar .slide-menu.child1 .side-menu__item.active:before {
            background-color: #38bdf8 !important;
            box-shadow: 0 0 6px rgba(56, 189, 248, 0.8) !important;
        }

        /* Logout Item */
        .app-sidebar a[href*="logout"]:hover {
            background-color: rgba(239, 68, 68, 0.12) !important;
            color: #f87171 !important;
        }

        .app-sidebar a[href*="logout"]:hover .side-menu__icon {
            color: #f87171 !important;
        }
    </style>

</head>

<body>

    <!-- SWITCHER -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">

        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="border-bottom border-block-end-dashed">
                <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                    <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-home" type="button" role="tab" aria-controls="switcher-home"
                        aria-selected="true">Theme Styles</button>
                    <button class="nav-link" id="switcher-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-profile" type="button" role="tab"
                        aria-controls="switcher-profile" aria-selected="false">Theme Colors</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel"
                    aria-labelledby="switcher-home-tab" tabindex="0">
                    <div class="">
                        <p class="switcher-style-head">Theme Color Mode:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-light-theme">
                                        Light
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-light-theme" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-dark-theme">
                                        Dark
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-dark-theme">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Directions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-ltr">
                                        LTR
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction"
                                        id="switcher-ltr" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-rtl">
                                        RTL
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction"
                                        id="switcher-rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Navigation Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-vertical">
                                        Vertical
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-vertical" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-horizontal">
                                        Horizontal
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-horizontal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-menu-styles">
                        <p class="switcher-style-head">Vertical & Horizontal Menu Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-click">
                                        Menu Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-hover">
                                        Menu Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-hover">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-click">
                                        Icon Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-hover">
                                        Icon Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-hover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu-layout-styles">
                        <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-menu">
                                        Default Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-default-menu" checked>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-closed-menu">
                                        Closed Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-closed-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icontext-menu">
                                        Icon Text
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icontext-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-overlay">
                                        Icon Overlay
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icon-overlay">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-detached">
                                        Detached
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-detached">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-double-menu">
                                        Double Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-double-menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Page Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-regular">
                                        Regular
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-regular" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-classic">
                                        Classic
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-classic">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-modern">
                                        Modern
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-modern">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Layout Width Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-full-width">
                                        Full Width
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-full-width" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-boxed">
                                        Boxed
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-boxed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Menu Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Header Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Loader:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-enable">
                                        Enable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-enable">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-disable">
                                        Disable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-disable" checked>
                                </div>
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
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-light">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-dark" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Gradient Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Header" type="radio"
                                        name="header-colors" id="switcher-header-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Header" type="radio"
                                        name="header-colors" id="switcher-header-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Header" type="radio"
                                        name="header-colors" id="switcher-header-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Gradient Header"
                                        type="radio" name="header-colors" id="switcher-header-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Header"
                                        type="radio" name="header-colors" id="switcher-header-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Primary:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-1" type="radio"
                                        name="theme-primary" id="switcher-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-2" type="radio"
                                        name="theme-primary" id="switcher-primary1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-3" type="radio"
                                        name="theme-primary" id="switcher-primary2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-4" type="radio"
                                        name="theme-primary" id="switcher-primary3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-5" type="radio"
                                        name="theme-primary" id="switcher-primary4">
                                </div>
                                <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                    <div class="theme-container-primary"></div>
                                    <div class="pickr-container-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Background:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-1" type="radio"
                                        name="theme-background" id="switcher-background">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-2" type="radio"
                                        name="theme-background" id="switcher-background1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-3" type="radio"
                                        name="theme-background" id="switcher-background2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-4" type="radio"
                                        name="theme-background" id="switcher-background3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-5" type="radio"
                                        name="theme-background" id="switcher-background4">
                                </div>
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
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img1" type="radio"
                                        name="theme-background" id="switcher-bg-img">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img2" type="radio"
                                        name="theme-background" id="switcher-bg-img1">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img3" type="radio"
                                        name="theme-background" id="switcher-bg-img2">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img4" type="radio"
                                        name="theme-background" id="switcher-bg-img3">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img5" type="radio"
                                        name="theme-background" id="switcher-bg-img4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between canvas-footer flex-wrap">
                    <a href="https://1.envato.market/19VDo9" class="btn btn-primary m-1" target="_blank">Buy Now</a>
                    <a href="https://1.envato.market/MGEaN" class="btn btn-secondary m-1" target="_blank">Our
                        Portfolio</a>
                    <a href="javascript:void(0);" id="reset-all" class="btn btn-danger m-1">Reset</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END SWITCHER -->

    <!-- LOADER -->
    <div id="loader">
        <img src="{{ asset('user_assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- END LOADER -->

    <!-- PAGE -->
    <div class="page">

        <!-- HEADER -->

        <header class="app-header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <!--<div class="header-element">-->
                    <!--    <div class="horizontal-logo">-->
                    <!--        <a href="index.html" class="header-logo">-->
                    <!--            <img src="{{ asset('user_assets/images/brand-logos/desktop-logo.png') }}"-->
                    <!--                alt="logo" class="desktop-logo">-->
                    <!--            <img src="{{ asset('user_assets/images/brand-logos/toggle-logo.png') }}"-->
                    <!--                alt="logo" class="toggle-logo">-->
                    <!--            <img src="{{ asset('user_assets/images/brand-logos/desktop-dark.png') }}"-->
                    <!--                alt="logo" class="desktop-dark">-->
                    <!--            <img src="{{ asset('user_assets/images/brand-logos/toggle-dark.png') }}"-->
                    <!--                alt="logo" class="toggle-dark">-->
                    <!--            <img src="{{ asset('user_assets/images/brand-logos/desktop-white.png') }}"-->
                    <!--                alt="logo" class="desktop-white">-->
                    <!--            <img src="{{ asset('user_assets/images/brand-logos/toggle-white.png') }}"-->
                    <!--                alt="logo" class="toggle-white">-->
                    <!--        </a>-->
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

                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <div class="header-content-right d-flex align-items-center gap-2">

                    <!-- Live Online Status Pill -->
                    <div class="header-element d-none d-md-flex align-items-center">
                        <div class="sn-status-pill">
                            <span class="sn-pulse-dot"></span>
                            <span class="sn-status-text">Network Online</span>
                        </div>
                    </div>

                    <!-- User Profile Card Pill -->
                    <div class="header-element sn-profile-element">
                        <a href="javascript:void(0);" class="header-link dropdown-toggle sn-profile-card" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="sn-avatar-wrap">
                                @if ($data['profile_image'] == '')
                                    <img src="{{ asset('user_assets/images/faces/9.jpg') }}" alt="img" class="sn-profile-img">
                                @else
                                    <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}" alt="img" class="sn-profile-img">
                                @endif
                                <span class="sn-avatar-badge"></span>
                            </div>
                            <div class="d-sm-flex d-none flex-column text-start">
                                <span class="fw-bold text-dark fs-12 font-monospace lh-1">{{ $data['memberid'] }}</span>
                                <span class="text-muted fs-11 mt-1 lh-1">{{ $data['name'] }}</span>
                            </div>
                            <i class="ri-arrow-down-s-line sn-chevron ms-1 d-sm-block d-none"></i>
                        </a>
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end shadow-sm"
                            aria-labelledby="mainHeaderProfile">
                            <li class="p-3 bg-light border-bottom mb-1" style="border-radius: 10px 10px 0 0;">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <span class="fw-bold text-dark fs-13 text-truncate">{{ $data['name'] }}</span>
                                    <span class="badge bg-success-transparent text-success rounded-pill px-2 py-0.5 fs-10 fw-semibold">Active Member</span>
                                </div>
                                <span class="badge bg-white text-dark font-monospace border px-2 py-0.5 fs-11">
                                    ID: {{ $data['memberid'] }}
                                </span>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('member/profile/user-summary') }}">
                                    <i class="ri-user-3-line fs-16 me-2 text-primary"></i>My Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('member/profile/wallet-address') }}">
                                    <i class="ri-wallet-3-line fs-16 me-2 text-info"></i>Wallet Address
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('member/support/support-tickets') }}">
                                    <i class="ri-customer-service-2-line fs-16 me-2 text-warning"></i>Support Desk
                                </a>
                            </li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center text-danger" href="{{ url('/member/logout') }}">
                                    <i class="ri-logout-box-r-line fs-16 me-2"></i>Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End::header-element -->

                </div>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

        </header>
        <!-- END HEADER -->

        <!-- SIDEBAR -->

        <aside class="app-sidebar sticky" id="sidebar">

            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="{{ url('member/dashboard') }}" class="header-logo">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="desktop-logo"
                        style="height: 60px">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="toggle-logo"
                        style="height: 60px">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="desktop-dark"
                        style="height: 60px">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="toggle-dark"
                        style="height: 60px">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="desktop-white"
                        style="height: 60px">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="toggle-white"
                        style="height: 60px">
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg>
                    </div>
                    <ul class="main-menu">

                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ url('member/dashboard') }}" class="side-menu__item">
                                <i class="bx bx-home side-menu__icon"></i>
                                <span class="side-menu__label">Dashboard</span>
                            </a>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-user side-menu__icon"></i>
                                <span class="side-menu__label">Profile<span
                                        class="badge bg-secondary-transparent ms-2"></span></span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">Pages</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/profile/user-summary') }}" class="side-menu__item">User
                                        Summary</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/profile/security') }}" class="side-menu__item">Change
                                        Password</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/profile/wallet-address') }}"
                                        class="side-menu__item">Wallet Address</a>
                                </li>



                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-task side-menu__icon"></i>
                                <span class="side-menu__label">Import Section<span
                                        class="badge bg-secondary-transparent ms-2"></span></span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">Import Section</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/fund/deposit-fund') }}" class="side-menu__item">Import
                                        Fund</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/fund/deposit-fund-history') }}"
                                        class="side-menu__item">Import Fund History</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-grid side-menu__icon"></i>
                                <span class="side-menu__label">Investment</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">Invest Coin</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/invest-slot') }}" class="side-menu__item">Investment
                                        Slot</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/investment-details') }}"
                                        class="side-menu__item">Investment Details</a>
                                </li>

                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-grid side-menu__icon"></i>
                                <span class="side-menu__label">Global Pool Section</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">Pool Section</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/globalpool/globelpool-incomes') }}" class="side-menu__item">Global Pool Income</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/globalpool/globalpool-matrix/1') }}" class="side-menu__item">Global Pool Matrix</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/globalpool/globalpool-members/1/5') }}" class="side-menu__item">Global Pool Members</a>
                                </li>

                            </ul>
                        </li>
                        <!-- End::slide -->
                        
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-layer side-menu__icon"></i>
                                <span class="side-menu__label">Income Section</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">Income Section</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/income/level-incomes') }}" class="side-menu__item">Level
                                        Income</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/income/direct-incomes') }}"
                                        class="side-menu__item">Direct Income</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/income/global-autopool-incomes') }}"
                                        class="side-menu__item">Global Autopool Income</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/income/withdrawal-incomes') }}"
                                        class="side-menu__item">Withdrawal Income</a>
                                </li>

                            </ul>
                        </li>
                        <!-- End::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-gift side-menu__icon"></i>
                                <span class="side-menu__label">Reward Section</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">Income Section</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/income/reward-incomes') }}"
                                        class="side-menu__item">Reward Income</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('/member/income/reward-details') }}"
                                        class="side-menu__item">Reward Details</a>
                                </li>


                            </ul>
                        </li>
                        <!-- End::slide -->

                        {{-- <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">General</span></li>
                        <!-- End::slide__category --> --}}

                        <!-- Start::slide -->
                        <!--<li class="slide has-sub">-->
                        <!--    <a href="javascript:void(0);" class="side-menu__item">-->
                        <!--        <i class="bx bx-box side-menu__icon"></i>-->
                        <!--        <span class="side-menu__label">P2P Wallet</span>-->
                        <!--        <i class="fe fe-chevron-right side-menu__angle"></i>-->
                        <!--    </a>-->
                        <!--    <ul class="slide-menu child1 mega-menu">-->
                        <!--        <li class="slide side-menu__label1">-->
                        <!--            <a href="javascript:void(0);">P2P Wallet</a>-->
                        <!--        </li>-->
                        <!--        <li class="slide">-->
                        <!--            <a href="{{ url('member/p2p-wallet') }}" class="side-menu__item">P2P Wallet</a>-->
                        <!--        </li>-->
                        <!--        <li class="slide">-->
                        <!--            <a href="{{ url('member/p2p-wallet-history') }}" class="side-menu__item">P2P-->
                        <!--                Wallet History</a>-->
                        <!--        </li>-->

                        <!--    </ul>-->
                        <!--</li>-->
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-wallet side-menu__icon"></i>
                                <span class="side-menu__label">Wallet</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">Wallet</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('member/wallet/main-wallet') }}" class="side-menu__item">Main
                                        Wallet</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('member/wallet/withdrawal-history') }}"
                                        class="side-menu__item">Withdrawal History</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('member/wallet/all-transaction') }}" class="side-menu__item">All
                                        Transactions</a>
                                </li>

                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-file side-menu__icon"></i>
                                <span class="side-menu__label">My Referral</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">My Referral</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('member/team/geneology') }}"
                                        class="side-menu__item">Geneology</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('member/levels/direct-members') }}"
                                        class="side-menu__item">Direct Members</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('member/levels/level-members-table') }}"
                                        class="side-menu__item">Level Member Table</a>
                                </li>

                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-message side-menu__icon"></i>

                                <span class="side-menu__label">Support</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);"> Support</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('member/support/create-ticket') }}"
                                        class="side-menu__item">Create New Ticket</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ url('member/support/support-tickets') }}"
                                        class="side-menu__item">Support Ticket</a>
                                </li>




                                <!-- End::slide -->
                            </ul>
                        </li>

                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ url('/member/logout') }}" class="side-menu__item">
                                <i class="bx bx-log-out side-menu__icon"></i>
                                <span class="side-menu__label">Logout</span>
                            </a>
                        </li>
                        <!-- End::slide -->

                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                                </path>
                            </svg></div>
                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- END SIDEBAR -->
