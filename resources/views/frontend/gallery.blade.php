<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="americantradeai.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="KnoxBit Crypto Crowdfunding | 100% Crowd Funding Transparent System">
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('f_assets/images/favicon.png') }}">
    <!-- Site Title  -->
    <title>KnoxBit Crypto Crowdfunding</title>
    <!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="{{ asset('f_assets/assets/css/vendor.bundle8bfc8bfc.css?ver=1420') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('f_assets/assets/css/style8bfc8bfc.css?ver=1420') }}">
    <link rel="stylesheet" href="{{ asset('f_assets/assets/css/theme-orange8bfc8bfc.css?ver=1420') }}" id="layoutstyle">
    <link
        href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <style>
        <style>body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .tokenomics-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }

        .tokenomics-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #d4af37;
            /* Golden color */
        }

        .token-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .token-info div {
            flex: 1 1 calc(33.333% - 20px);
            background: #222;
            border: 1px solid #555;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
            transition: transform 0.3s;
        }

        .token-info div:hover {
            transform: translateY(-5px);
        }

        .chart-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .chart-container {
            position: relative;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: conic-gradient(#d62728 0% 40%,
                    /* 40% Public Sale After 5 Years */
                    #ff7f0e 40% 60%,
                    /* 20% Public Sale Within 5 Years */
                    #2ca02c 60% 80%,
                    /* 20% Affiliate Program */
                    #1f77b4 80% 85%,
                    /* 5% Development */
                    #9467bd 85% 90%,
                    /* 5% Marketing */
                    #17becf 90% 95%,
                    /* 5% Private Sale */
                    #8c564b 95% 100%
                    /* 5% DAO */
                );
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        .token-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
            color: #fff;
        }

        .token-details .detail {
            flex: 1 1 calc(33.333% - 20px);
            background: #333;
            border-radius: 10px;
            padding: 15px;
            border: 1px solid #444;
            transition: transform 0.3s;
        }

        .token-details .detail:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {

            .token-info div,
            .token-details .detail {
                flex: 1 1 100%;
            }
        }
    </style>
    <style>
        /* CSS for Metaverse Animations and Styling */
        .meta-card {
            background: linear-gradient(135deg, #000000, #000000);
            border-radius: 15px;
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .meta-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.3);
        }

        .meta-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
        }

        .meta-icon img {
            max-width: 100%;
            height: auto;
            animation: meta-icon-spin 10s linear infinite;
        }

        .meta-info {
            color: #fff;
            font-weight: bold;
            font-size: 22px;
        }

        .meta-title {
            font-size: 28px;
        }

        @keyframes meta-icon-spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .metaverse-animation {
            animation: metaverse-glow 1.5s infinite alternate;
        }

        @keyframes metaverse-glow {
            0% {
                box-shadow: 0 0 10px rgba(110, 69, 226, 0.4);
            }

            100% {
                box-shadow: 0 0 20px rgba(110, 69, 226, 0.8);
            }
        }

        .section-title-s7 {
            color: #fff;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .section-bg {
            background: url('images/metaverse_bg.jpg') no-repeat center center/cover;
            padding: 60px 0;
        }
    </style>
    <style>
        @media only screen and (max-width: 600px) {
            .coin {
                max-width: 250px;
            }

            .coinbox {
                min-height: 250px;
            }

            .glass {
                position: absolute;
                z-index: 11111111;
                top: 153px !important;
            }
        }

        .pdfooter {
            padding-top: 62px;
            padding-bottom: 0px !important;
        }

        .gaps {
            background: #070c16;
        }

        .circlebg1 {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 1;
        }

        .circlebg2 {
            position: absolute;
            left: 0;
            right: 0;
            top: 30px;
            z-index: 1;
            margin: auto;
            text-align: center;
        }

        .circlebg3 {
            position: absolute;
            right: 0;
            top: 0;
            z-index: 1;
        }

        .modal {
            background: #000000bf;
        }

        .blink {
            color: red;
            position: relative;
            animation-name: example;
            animation-duration: 1s;
            animation-iteration-count: infinite;
        }

        @keyframes example {
            0% {
                color: White;

            }

            25% {
                color: red;

            }

            50% {
                color: White;
            }

            75% {
                color: red;
            }

            100% {
                color: White;
            }
        }
    </style>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .popup {
            display: none;
            position: relative;
            padding: 20px;
            background-color: #070c15;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            color: #fff;
            max-width: 400px;
            margin: 50px auto;
            z-index: 999999999;
        }

        .popup-logo {
            width: 194px;

            margin-bottom: 10px;
        }

        .countdown-box {
            font-size: 30px;
            margin-bottom: 10px;
            padding: 10px;
            border: 2px solid #fff;
            border-radius: 5px;
            display: inline-block;
        }

        .countdown-separator {
            font-size: 30px;
            margin-bottom: 10px;
            margin: 0 5px;
            color: #fff;
            display: inline-block;
        }

        .popup-text {
            font-size: 20px;
            margin-bottom: 13px;
            color: #ffffff;
            font-family: sans-serif;
            font-weight: 600;
        }

        .popup-button {
            padding: 10px 20px;
            background-color: #b97b14;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-button:hover {
            background-color: #ac7046;
        }

        .founder-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            padding: 25px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            margin: 20px auto;
        }

        .founder-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .founder-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .founder-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .founder-details {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }

        .row {
            display: flex;
        }

        .column {
            flex: 33.33%;
            padding: 5px;
        }
    </style>
    <style>
        /* Fullscreen loader styling */
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #131117;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader {
            text-align: center;
        }

        .loader img {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
        }

        .loader-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            animation: fadeIn 2s infinite alternate;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }

        /* Hide loader after the page is loaded */
        body.loaded #loading-screen {
            display: none;
        }
    </style>
</head>

<body class="theme-dark io-zinnia" data-spy="scroll" data-target="#mainnav" data-offset="80">
    <div id="loading-screen">
        <div class="loader">
            <img src="{{ asset('f_assets/images/200w.gif') }}" alt="Robot Loader">
            <div class="loader-text">
                <h4 class="card-title">Gallery Images</h4>
            </div>
        </div>
    </div>
    <!-- Header -->
    <header class="site-header is-sticky">
        <!-- Place Particle Js -->
        <div id="particles-js" class="particles-container particles-js"></div>
        <!-- Navbar -->
        <div class="navbar navbar-full navbar-expand-lg is-transparent" id="mainnav">
            <a class="navbar-brand animated" data-animate="fadeInDown" data-delay=".65"
                href="https://americantradeai.com/">
                <img class="logo logo-dark" alt="logo" src="{{ asset('logo/logo.png') }}">
                <img class="logo logo-light" alt="logo" src="{{ asset('logo/logo.png') }}"
                    style="width: 120px;max-height: 104px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle">
                <span class="navbar-toggler-icon"><span class="ti ti-align-justify"></span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">
                <ul class="navbar-nav animated remove-animation" data-animate="fadeInDown" data-delay=".75">
                    <li class="nav-item"><a class="nav-link menu-link" href="https://americantradeai.com/">Home<span
                                class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a class="nav-link menu-link" href="#aboutus">About Us</a></li>
                    <li class="nav-item"><a class="nav-link menu-link" href="{{ url('gallery') }}">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link menu-link" href="#mission">Mission & Vission</a></li>
                    <li class="nav-item"><a class="nav-link menu-link"
                            href="{{ asset('f_assets/images/americantradeai.pdf') }}" target="_blank">Business
                            Oppurtunity</a></li>
                    <li class="nav-item"><a class="nav-link menu-link" href="#eco">Ecosystem</a></li>

                    <li class="nav-item"><a class="nav-link menu-link" href="#contact">Contact Us</a></li>
                </ul>
                <ul class="navbar-btns animated remove-animation" data-animate="fadeInDown" data-delay=".85">
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline menu-link"
                            href="{{ url('/member') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline menu-link"
                            href="{{ url('/member/register/1') }}">Registration</a></li>
                </ul>
            </div>
        </div>
        <!-- End Navbar --><!-- Banner/Slider -->
        <!-- .presale-box  -->
    </header>
    <!-- End Section --><!-- Start Section -->
    <div class="section section-pad section-bg" id="gallery">
        <div class="ui-shape ui-shape-s5"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-6 col-lg-8 pt-5" style="margin-top: 8%">
                    <div class="section-head-s7 pb-2">
                        <h1 class="section-title-s7 animated" data-animate="fadeInUp" data-delay=".1">Gallery
                            Images</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($data as $list)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div style="">
                        <br>
                            <div class="meta-card animated metaverse-animation py-5" data-animate="fadeInUp">
                                <div class="text-center">
                                    <img src="{{ asset('uploads') }}/{{ $list['image'] }}" alt=""
                                        style="width: 150px;height:150px;object-fit:fill" />
                                </div>
                                <div class="meta-info text-center">
                                    <h5 class="meta-title">{{ $list['title'] }}</h5>
                                </div>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- <div class="col-md-4 col-sm-6 mb-4">
                    @foreach ($data as $list)
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <div class="justify-content-center ">

                                    @if ($list['image'] == '')
                                        <img class="img-fluid rounded-circle" width="150px" height="150px"
                                            src="{{ asset('uploads/avatar.jpg') }}" alt="">
                                    @else
                                        <img class="img-fluid rounded-circle" width="150px" height="150px"
                                            src="{{ asset('uploads') }}/{{ $list['image'] }}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
        </div>
    </div>
    <!-- End Section --><!-- Start Section -->


    <script src="{{ asset('f_assets/assets/js/jquery.bundle8bfc8bfc.js?ver=1420') }}"></script>
    <script src="{{ asset('f_assets/assets/js/script8bfc8bfc.js?ver=1420') }}"></script>
    <script>
        // Show the loader and hide the content initially
        document.addEventListener("DOMContentLoaded", () => {
            // Simulate loading delay for demonstration
            setTimeout(() => {
                document.body.classList.add("loaded");
                document.getElementById("content").style.display = "block";
            }, 3000); // Change the delay time if needed
        });
    </script>
</body>


</html>
