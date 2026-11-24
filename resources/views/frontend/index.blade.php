<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KnoxBit Crypto Crowdfunding</title>
    <!-- favicons Icons -->
    <link rel="icon" type="image/png" href="{{asset('logo/favicon/favicon-96x96.png')}}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{asset('logo/favicon/favicon.svg')}}" />
    <link rel="shortcut icon" href="{{asset('logo/favicon/favicon.ico')}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('logo/favicon/apple-touch-icon.png')}}" />
    <link rel="manifest" href="{{asset('logo/favicon/site.webmanifest')}}" /> 

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('f_assets/vendors/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/bootstrap-select/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/animate/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/jarallax/jarallax.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/nouislider/nouislider.pips.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/tiny-slider/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/eolexi-icons/style.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('f_assets/vendors/owl-carousel/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('f_assets/vendors/owl-carousel/css/owl.theme.default.min.css')}}" />
<style>
.faq-accordion {
  margin-top: 20px;
}

.faq-item {
  border-bottom: 1px solid #ddd;
}

.faq-question {
  width: 100%;
  background: none;
  border: none;
  padding: 15px 10px;
  font-size: 1rem;
  font-weight: 600;
  text-align: left;
  position: relative;
  cursor: pointer;
}

.faq-question::after {
  content: "+";
  position: absolute;
  right: 10px;
  font-size: 20px;
  transition: transform 0.3s;
}

.faq-item.active .faq-question::after {
  content: "−";
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  padding: 0 10px;
  transition: max-height 0.3s ease;
}

.faq-item.active .faq-answer {
  max-height: 200px;
  padding: 10px;
}

</style>
<!-- Extra CSS for logo styling -->
<style>
.profit-graph__coin-logo {
    max-width: 80px;
    margin: 0 auto;
    display: block;
    animation: bounce 2s infinite;
}
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}
</style>
<style>
/* Preloader container */
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #0a0a0a; /* Dark background for crypto feel */
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  z-index: 9999;
}

/* Logo style */
.loader-logo img {
  width: 120px;
  animation: pulse 2s infinite ease-in-out;
}

/* Circle animation */
.loader-circle {
  margin: 20px 0;
  width: 60px;
  height: 60px;
  border: 6px solid #00f6ff;
  border-top: 6px solid transparent;
  border-radius: 50%;
  animation: spin 1.2s linear infinite;
}

/* Loading text */
.loader-text {
  font-family: Arial, sans-serif;
  color: #fff;
  font-size: 16px;
  letter-spacing: 1px;
  animation: fade 2s infinite;
}

/* Animations */
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

@keyframes fade {
  0%, 100% { opacity: 0.3; }
  50% { opacity: 1; }
}

@keyframes pulse {
  0%, 100% { transform: scale(1); opacity: 0.8; }
  50% { transform: scale(1.1); opacity: 1; }
}
</style>
    <!-- template styles -->
    <link rel="stylesheet" href="{{asset('f_assets/css/eolexi.css')}}" />
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!-- Preloader Start -->
<div class="preloader">
  <div class="loader-logo">
    <img src="{{asset('logo/logo.png')}}" alt="KnoxBit Crypto Crowdfunding Logo">
  </div>
  <div class="loader-circle"></div>
  <div class="loader-text">Loading KnoxBit Crypto Crowdfunding...</div>
</div>
<!-- Preloader End -->
    <!-- /.preloader -->
    <div class="page-wrapper">
        <div class="topbar">
            <div class="container">
                <div class="topbar__inner">
                    <ul class="list-unstyled topbar__info">
                        <li>
                            <span class="topbar__info__icon"><i class="icon-email"></i></span>
                            <a href="mailto:info@stablenet.live">info@stablenet.live</a>
                        </li>
                        <li>
                            <span class="topbar__info__icon"><i class="icon-location"></i></span>
                            <a href="https://www.google.com/maps">7/09 Mozilla Golden Street</a>
                        </li>
                    </ul><!-- /.list-unstyled topbar__info -->
                    <div class="topbar__right">
                        <ul class="list-unstyled topbar__links">
                            <li><a href="{{url('/member')}}">Login</a></li>
                            <li><a href="{{url('/member/register/1')}}">Register</a></li>
                        </ul>
                        <div class="topbar__language">
                            <img src="{{asset('f_assets/images/shapes/flag-1-1.png')}}" alt="flag">
                            <label class="sr-only" for="language-select-header">select language</label>
                            <select class="selectpicker" id="language-select-header">
                                <option value="english">English</option>
                                <option value="arabic">Arabic</option>
                            </select>
                        </div><!-- /.topbar__language -->
                    </div><!-- /.topbar__right -->
                </div><!-- /.topbar__inner -->
            </div><!-- /.container -->
        </div><!-- /.topbar -->

        <header class="main-header sticky-header sticky-header--one-page">
            <div class="main-header__container container">
                <div class="main-header__inner">
                    <div class="main-header__logo logo-retina">
                        <a href="index.html">
                            <img src="{{asset('logo/logo.png')}}" alt="Eolexi HTML" width="219">
                        </a>
                    </div><!-- /.main-header__logo -->
                    <div class="main-header__right">
                        <nav class="main-header__nav main-menu">
                            <ul class="main-menu__list one-page-scroll-menu">
                               
								<li class="scrollToLink"><a href="https://stablenet.live/">Home</a></li>
								<li class="scrollToLink"><a href="#about">About</a></li>
								<li class="scrollToLink"><a href="#how">How It Works</a></li>
                                <li class="scrollToLink"><a href="#faq">Faq</a></li>
                                <li class="scrollToLink"><a href="#contact">Contact Us</a></li>                             
                            </ul>
                        </nav><!-- /.main-header__nav -->
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- /.mobile-nav__toggler -->
                       
                        <div class="main-header__btn">
                            <a href="{{url('/member')}}" class="eolexi-btn">
                                <span class="eolexi-btn__text"><span>Login</span></span>
                                <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
                            </a><!-- /.eolexi-btn -->
							 <a href="{{url('/member/register/1')}}" class="eolexi-btn">
                                <span class="eolexi-btn__text"><span>Register</span></span>
                                <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
                            </a><!-- /.eolexi-btn -->
                        </div><!-- /.main-header__btn -->
                    </div><!-- /.main-header__right -->
                </div><!-- /.main-header__inner -->
            </div><!-- /.main-header__container container -->
        </header><!-- /.main-header -->
        <section class="main-slider" id="home">
            <div class="main-slider__carousel eolexi-owl__carousel eolexi-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
        "items": 1,
        "margin": 0,
        "animateIn": "fadeIn",
        "animateOut": "fadeOut",
        "loop": true,
        "autoplay": true,
        "smartSpeed": 700,
        "nav": true,
        "dots": false,
        "navText": ["<i class=\"icon-arrow-left\"></i>","<i class=\"icon-arrow-right\"></i>"]
    }'>
                <div class="main-slider__item">
                    <div class="main-slider__bg" style="background-image: url(f_assets/images/backgrounds/main-slider-bg-1-1.jpg);"></div><!-- /.main-slider__bg -->
                    <div class="container">
                        <div class="row gutter-y-40 align-items-end">
                            <div class="col-xl-7 col-lg-9">
                               <div class="main-slider__content">
    <div class="main-slider__top">
        <div class="main-slider__top__inner">
            <img src="{{asset('f_assets/images/main-slider/main-slider-1-1.jpg')}}" alt="Stablenet Hero" class="main-slider__top__image">
            <div class="main-slider__top__text">
                <h4 class="main-slider__top__title">Stablecoin Investing</h4>
            </div>
        </div>
    </div>

    <!-- Main Headline -->
    <h2 class="main-slider__title">
        Your Stablecoins Can Finally Earn. <br> Invest Securely with KnoxBit Crypto Crowdfunding.
    </h2>

    <!-- Sub-headline -->
    <div class="main-slider__description">
        <p class="main-slider__text">
            Deposit your USDT, and watch your Stablenet Tokens (SBT) grow over time.
        </p>
    </div>

    <!-- Key Description -->
    <div class="main-slider__description">
        <p class="main-slider__text">
            KnoxBit Crypto Crowdfunding offers a solution for idle stablecoins like USDT. Our expert team strategically invests your pooled funds 
            in various <em>DeFi projects</em>, such as <strong>lending protocols, liquidity pools, and yield farming platforms</strong>, 
            to generate returns. These profits are then distributed to you as additional SBT tokens.
        </p>
    </div>

    <!-- Key Features -->
    <div class="main-slider__features">
        <ul class="main-slider__text">
            <li><strong>Yield-Bearing Stablecoin:</strong> Unlike typical stablecoins, the quantity of SBT in your wallet increases, representing the profits you've earned.</li>
            <li><strong>Secure & Transparent:</strong> All deposits and withdrawals are managed by <em>smart contracts</em> to ensure security and trust.</li>
        </ul>
    </div>

    <!-- CTA Button -->
    <div class="main-slider__button">
        <div class="main-slider__button__inner">
            <a href="{{url('/member')}}" class="eolexi-btn eolexi-btn--white">
                <span class="eolexi-btn__text"><span>Login</span></span>
                <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
            </a>
            <a href="#" class="eolexi-btn eolexi-btn--white ml-3">
                <span class="eolexi-btn__text"><span>Learn More</span></span>
                <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
            </a>
        </div>
    </div>
</div>

                            </div><!-- /.col-xl-7 col-lg-9 -->
                            <div class="col-xl-5">
                                <div class="main-slider__image">
                                    <div class="main-slider__image__inner">
                                        <img src="{{asset('f_assets/images/main-slider/main-slider-1-2.png')}}" alt="main slider">
                                    </div><!-- /.main-slider__image__inner -->
                                    <img src="{{asset('f_assets/images/shapes/main-slider-shape-1-1.png')}}" alt="shape" class="main-slider__image__shape">
                                </div><!-- /.main-slider__image -->
                            </div><!-- /.col-xl-5 -->
                        </div><!-- /.row gutter-y-40 -->
                    </div><!-- /.container -->
                    <img src="{{asset('f_assets/images/shapes/main-slider-shape-1-2.png')}}" alt="shape" class="main-slider__shape">
                </div><!-- /.main-slider__item -->
                <div class="main-slider__item">
                    <div class="main-slider__bg" style="background-image: url(f_assets/images/backgrounds/main-slider-bg-1-2.jpg);"></div><!-- /.main-slider__bg -->
                    <div class="container">
                        <div class="row gutter-y-40 align-items-end">
                            <div class="col-xl-7 col-lg-9">
                               <div class="main-slider__content">
    <div class="main-slider__top">
        <div class="main-slider__top__inner">
            <img src="{{asset('f_assets/images/main-slider/main-slider-1-3.jpg')}}" alt="Stablenet Stablecoin Investing" class="main-slider__top__image">
            <div class="main-slider__top__text">
                <h4 class="main-slider__top__title">Stablecoin Growth</h4>
            </div>
        </div>
    </div>

    <!-- Main Headline -->
    <h2 class="main-slider__title">
        Your Stablecoins Can Finally Earn. <br> Invest Securely with KnoxBit Crypto Crowdfunding.
    </h2>

    <!-- Sub-headline -->
    <div class="main-slider__description">
        <p class="main-slider__text">
            Deposit your USDT, and watch your Stablenet Tokens (SBT) grow over time.
        </p>
    </div>

    <!-- Key Description -->
    <div class="main-slider__description">
        <p class="main-slider__text">
            KnoxBit Crypto Crowdfunding offers a solution for idle stablecoins like USDT. Our expert team strategically invests your pooled funds 
            in <em>DeFi projects</em>, such as <strong>lending protocols, liquidity pools, and yield farming platforms</strong>, 
            to generate returns. These profits are then distributed to you as additional SBT tokens.
        </p>
    </div>

    <!-- Key Features -->
    <div class="main-slider__features">
        <ul class="main-slider__text">
            <li><strong>Yield-Bearing Stablecoin:</strong> Unlike typical stablecoins, the quantity of SBT in your wallet increases, representing the profits you've earned.</li>
            <li><strong>Secure & Transparent:</strong> All deposits and withdrawals are managed by <em>smart contracts</em> to ensure security and trust.</li>
        </ul>
    </div>

    <!-- CTA Buttons -->
    <div class="main-slider__button">
        <div class="main-slider__button__inner">
            <a href="{{url('/member')}}" class="eolexi-btn eolexi-btn--white">
                <span class="eolexi-btn__text"><span>Login</span></span>
                <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
            </a>
            <a href="#" class="eolexi-btn eolexi-btn--white ml-3">
                <span class="eolexi-btn__text"><span>Learn More</span></span>
                <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
            </a>
        </div>
    </div>
</div>

                            </div><!-- /.col-xl-7 col-lg-9 -->
                            <div class="col-xl-5">
                                <div class="main-slider__image">
                                    <div class="main-slider__image__inner">
                                        <img src="{{asset('f_assets/images/main-slider/main-slider-1-2.png')}}" alt="main slider">
                                    </div><!-- /.main-slider__image__inner -->
                                    <img src="{{asset('f_assets/images/shapes/main-slider-shape-1-1.png')}}" alt="shape" class="main-slider__image__shape">
                                </div><!-- /.main-slider__image -->
                            </div><!-- /.col-xl-5 -->
                        </div><!-- /.row gutter-y-40 -->
                    </div><!-- /.container -->
                    <img src="{{asset('f_assets/images/shapes/main-slider-shape-1-2.png')}}" alt="shape" class="main-slider__shape">
                </div><!-- /.main-slider__item -->
                <div class="main-slider__item">
                    <div class="main-slider__bg" style="background-image: url(f_assets/images/backgrounds/main-slider-bg-1-3.jpg);"></div><!-- /.main-slider__bg -->
                    <div class="container">
                        <div class="row gutter-y-40 align-items-end">
                            <div class="col-xl-7 col-lg-9">
                                <div class="main-slider__content">
    <div class="main-slider__top">
        <div class="main-slider__top__inner">
            <img src="{{asset('f_assets/images/main-slider/main-slider-1-3.jpg')}}" alt="Stablenet Stablecoin Investing" class="main-slider__top__image">
            <div class="main-slider__top__text">
                <h4 class="main-slider__top__title">Stablecoin Growth</h4>
            </div>
        </div>
    </div>

    <!-- Main Headline -->
    <h2 class="main-slider__title">
        Your Stablecoins Can Finally Earn. <br> Invest Securely with KnoxBit Crypto Crowdfunding.
    </h2>

    <!-- Sub-headline -->
    <div class="main-slider__description">
        <p class="main-slider__text">
            Deposit your USDT, and watch your Stablenet Tokens (SBT) grow over time.
        </p>
    </div>

    <!-- Key Description -->
    <div class="main-slider__description">
        <p class="main-slider__text">
            KnoxBit Crypto Crowdfunding offers a solution for idle stablecoins like USDT. Our expert team strategically invests your pooled funds 
            in <em>DeFi projects</em>, such as <strong>lending protocols, liquidity pools, and yield farming platforms</strong>, 
            to generate returns. These profits are then distributed to you as additional SBT tokens.
        </p>
    </div>

    <!-- Key Features -->
    <div class="main-slider__features">
        <ul class="main-slider__text">
            <li><strong>Yield-Bearing Stablecoin:</strong> Unlike typical stablecoins, the quantity of SBT in your wallet increases, representing the profits you've earned.</li>
            <li><strong>Secure & Transparent:</strong> All deposits and withdrawals are managed by <em>smart contracts</em> to ensure security and trust.</li>
        </ul>
    </div>

    <!-- CTA Buttons -->
    <div class="main-slider__button">
        <div class="main-slider__button__inner">
            <a href="{{'/member'}}" class="eolexi-btn eolexi-btn--white">
                <span class="eolexi-btn__text"><span>Login</span></span>
                <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
            </a>
            <a href="#" class="eolexi-btn eolexi-btn--white ml-3">
                <span class="eolexi-btn__text"><span>Learn More</span></span>
                <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
            </a>
        </div>
    </div>
</div>
                            </div><!-- /.col-xl-7 col-lg-9 -->
                            <div class="col-xl-5">
                                <div class="main-slider__image">
                                    <div class="main-slider__image__inner">
                                        <img src="{{asset('f_assets/images/main-slider/main-slider-1-2.png')}}" alt="main slider">
                                    </div><!-- /.main-slider__image__inner -->
                                    <img src="{{asset('f_assets/images/shapes/main-slider-shape-1-1.png')}}" alt="shape" class="main-slider__image__shape">
                                </div><!-- /.main-slider__image -->
                            </div><!-- /.col-xl-5 -->
                        </div><!-- /.row gutter-y-40 -->
                    </div><!-- /.container -->
                    <img src="{{asset('f_assets/images/shapes/main-slider-shape-1-2.png')}}" alt="shape" class="main-slider__shape">
                </div><!-- /.main-slider__item -->
            </div><!-- /.main-slider__carousel -->
        </section><!-- /.main-slider -->
        <section class="features-one section-space-top" style="display:none;">
            <div class="features-one__bg">
                <div class="features-one__bg__inner" style="background-image: url(f_assets/images/shapes/features-bg-1-1.png);"></div>
            </div><!-- /.features-one__bg -->
            <div class="container">
                <div class="row gutter-y-30">
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="features-one__card">
                            <div class="features-one__card__inner">
                                <div class="features-one__card__content">
                                    <h3 class="features-one__card__title">Software Development</h3>
                                    <p class="features-one__card__text">Supporting individuals in business challenges, and enhancing their</p>
                                </div><!-- /.features-one__card__content -->
                                <div class="features-one__card__icon-box">
                                    <span class="features-one__card__icon"><i class="icon-online-analytical"></i></span>
                                </div>
                            </div><!-- /.features-one__card__inner -->
                        </div><!-- /.features-one__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="features-one__card features-one__card--icon-top">
                            <div class="features-one__card__inner">
                                <div class="features-one__card__content">
                                    <h3 class="features-one__card__title">Business Analysis</h3>
                                    <p class="features-one__card__text">It is a long established fact that a reader will be distracted by the</p>
                                </div><!-- /.features-one__card__content -->
                                <div class="features-one__card__icon-box">
                                    <span class="features-one__card__icon"><i class="icon-growth"></i></span>
                                </div>
                            </div><!-- /.features-one__card__inner -->
                        </div><!-- /.features-one__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="features-one__card">
                            <div class="features-one__card__inner">
                                <div class="features-one__card__content">
                                    <h3 class="features-one__card__title">Business Plans</h3>
                                    <p class="features-one__card__text">Thanks for taking the time to make the website, but i already</p>
                                </div><!-- /.features-one__card__content -->
                                <div class="features-one__card__icon-box">
                                    <span class="features-one__card__icon"><i class="icon-light"></i></span>
                                </div>
                            </div><!-- /.features-one__card__inner -->
                        </div><!-- /.features-one__card -->
                    </div><!-- /.col-xl-4 col-md-6 -->
                </div><!-- /.row gutter-y-30 -->
            </div><!-- /.container -->
        </section><!-- /.features-one section-space-top -->
        <section class="about-one section-space" id="about">
    <div class="container">
        <div class="row gutter-y-50">
            <!-- Left Side Image -->
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms">
                <div class="about-one__image">
                    <img src="{{asset('f_assets/images/about/about-1-1.jpg')}}" alt="About Stablenet" class="about-one__image__one">
                    <img src="{{asset('f_assets/images/shapes/about-shape-1-1.png')}}" alt="shape" class="about-one__image__shape">
                    <div class="about-one__experience">
                        <h3 class="about-one__experience__title">DeFi <span>Innovation</span></h3>
                    </div>
                </div>
            </div>

            <!-- Right Side Content -->
            <div class="col-lg-6">
                <div class="about-one__content">
                    <div class="sec-title">
                        <div class="sec-title__top">
                            <img src="{{asset('f_assets/images/shapes/sec-title-shape-1-1.png')}}" alt="About Stablenet" class="sec-title__shape">
                            <h6 class="sec-title__tagline bw-split-in-up-fast">ABOUT US</h6>
                        </div>
                        <h3 class="sec-title__title bw-split-in-up">
                            Secure Passive Income <br> For Your Stablecoins
                        </h3>
                    </div>

                    <!-- What is KnoxBit Crypto Crowdfunding -->
                    <p class="about-one__text wow fadeInUp" data-wow-duration="1500ms">
                        <strong>What is KnoxBit Crypto Crowdfunding?</strong> <br>
                        KnoxBit Crypto Crowdfunding was founded to solve a common problem in the crypto space: a lack of passive income for stablecoin holders. 
                        Our mission is to provide a simple, secure, and profitable way for anyone to earn returns on their stablecoin investments.
                    </p>

                    <!-- Our Mission -->
                    <div class="about-one__info">
                        <div class="about-one__info__item wow fadeInUp" data-wow-duration="1500ms">
                            <div class="about-one__info__icon">
                                <i class="icon-handshake"></i>
                                <span class="about-one__info__icon__inner"><i class="icon-checked"></i></span>
                            </div>
                            <div class="about-one__info__content">
                                <h3 class="about-one__info__title">Our Mission</h3>
                                <p class="about-one__info__text">
                                    Our long-term vision is to build a strong community around the SBT token, 
                                    helping it evolve into a trusted and independent stablecoin. 
                                    We are committed to making DeFi income accessible to everyone.
                                </p>
                            </div>
							<div class="about-one__info__content">
    <!-- Vision -->
    <h3 class="about-one__info__title">Our Vision</h3>
    <p class="about-one__info__text">
        To become the leading DeFi platform where stablecoin holders worldwide 
        can generate sustainable, transparent, and secure passive income with ease. 
        We aim to empower financial freedom through innovation.
    </p>
</div>
                        </div>
                    </div>

                    <!-- Founder / Profile -->
                  

                    <!-- Button -->
                    <div class="about-one__button wow fadeInUp" data-wow-duration="1500ms">
                        <a href="#" class="eolexi-btn">
                            <span class="eolexi-btn__text"><span>LEARN MORE</span></span>
                            <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

     <!-- /.how-it-works section-space -->
<section class="how-it-works section-space">
    <div class="container">
        <div class="row gutter-y-50 align-items-center">
            <!-- Content Side -->
            <div class="col-lg-6">
                <div class="how-it-works__content">
                    <div class="sec-title">
                        <div class="sec-title__top">
                            <img src="{{asset('f_assets/images/shapes/sec-title-shape-1-1.png')}}" alt="How It Works" class="sec-title__shape">
                            <h6 class="sec-title__tagline bw-split-in-up-fast">How It Works</h6>
                        </div>
                        <h3 class="sec-title__title bw-split-in-up">Your Journey with <br> KnoxBit Crypto Crowdfunding</h3>
                    </div>

                    <p class="how-it-works__text wow fadeInUp" data-wow-duration="1500ms">
                        KnoxBit Crypto Crowdfunding makes DeFi investing simple, secure, and rewarding. Here’s how the process works step by step:
                    </p>

                    <div class="how-it-works__steps">
                        <!-- Step 1 -->
                        <div class="progress-box wow fadeInUp" data-wow-duration="1500ms">
                            <h4 class="progress-box__title">Deposit</h4>
                            <div class="progress-box__bar">
                                <div class="progress-box__bar__inner count-bar" data-percent="100%">
                                    <div class="progress-box__number count-text">Step 1</div>
                                </div>
                            </div>
                            <p class="progress-box__desc">Deposit your USDT into the KnoxBit Crypto Crowdfunding platform and receive equivalent SBT tokens.</p>
                        </div>

                        <!-- Step 2 -->
                        <div class="progress-box wow fadeInUp" data-wow-duration="1500ms">
                            <h4 class="progress-box__title">Profit Generation</h4>
                            <div class="progress-box__bar">
                                <div class="progress-box__bar__inner count-bar" data-percent="100%">
                                    <div class="progress-box__number count-text">Step 2</div>
                                </div>
                            </div>
                            <p class="progress-box__desc">
                                We pool your funds and invest in carefully selected DeFi projects using:<br>
                                <strong>Lending Protocols</strong>, <strong>Liquidity Pools</strong>, and <strong>Yield Farming</strong> to maximize returns.
                            </p>
                        </div>

                        <!-- Step 3 -->
                        <div class="progress-box wow fadeInUp" data-wow-duration="1500ms">
                            <h4 class="progress-box__title">Profit Distribution</h4>
                            <div class="progress-box__bar">
                                <div class="progress-box__bar__inner count-bar" data-percent="100%">
                                    <div class="progress-box__number count-text">Step 3</div>
                                </div>
                            </div>
                            <p class="progress-box__desc">Profits are converted into SBT tokens and automatically distributed to you, increasing your total balance.</p>
                        </div>

                        <!-- Step 4 -->
                        <div class="progress-box wow fadeInUp" data-wow-duration="1500ms">
                            <h4 class="progress-box__title">Withdrawal</h4>
                            <div class="progress-box__bar">
                                <div class="progress-box__bar__inner count-bar" data-percent="100%">
                                    <div class="progress-box__number count-text">Step 4</div>
                                </div>
                            </div>
                            <p class="progress-box__desc">Redeem your SBT tokens anytime and convert them back into USDT.</p>
                        </div>
                    </div>

                    <div class="how-it-works__button wow fadeInUp" data-wow-duration="1500ms">
                        <a href="about.html" class="eolexi-btn eolexi-btn--black">
                            <span class="eolexi-btn__text"><span>Learn More</span></span>
                            <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Image Side -->
            <div class="col-lg-6">
                <div class="how-it-works__image">
                    <div class="how-it-works__logo">
                        <img src="{{asset('logo/logo.png')}}" alt="KnoxBit Crypto Crowdfunding Logo">
                    </div>
                    <img src="{{asset('f_assets/images/resources/skill-1-1.jpg')}}" alt="How It Works" class="how-it-works__image__img">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.how-it-works section-space -->

      <section class="funfact-one section-space funfact-one--home1">
    <div class="container">
        <div class="row gutter-y-30">

            <!-- Total Deposits -->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <div class="funfact-one__card">
                    <div class="funfact-one__card__icon-box">
                        <span class="funfact-one__card__icon"><i class="icon-folder-setting"></i></span>
                    </div>
                    <div class="funfact-one__card__content">
                        <h3 class="funfact-one__card__count count-box">
                            <span class="count-text" data-stop="50" data-speed="1500">0</span>
                            <span>M+</span>
                        </h3>
                        <p class="funfact-one__card__text">USDT Deposited</p>
                    </div>
                </div>
            </div>

            <!-- Active Users -->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                <div class="funfact-one__card">
                    <div class="funfact-one__card__icon-box">
                        <span class="funfact-one__card__icon"><i class="icon-content-management-2"></i></span>
                    </div>
                    <div class="funfact-one__card__content">
                        <h3 class="funfact-one__card__count count-box">
                            <span class="count-text" data-stop="120" data-speed="1500">0</span>
                            <span>K+</span>
                        </h3>
                        <p class="funfact-one__card__text">Active Users</p>
                    </div>
                </div>
            </div>

            <!-- Yield Generated -->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                <div class="funfact-one__card">
                    <div class="funfact-one__card__icon-box">
                        <span class="funfact-one__card__icon"><i class="icon-team-work"></i></span>
                    </div>
                    <div class="funfact-one__card__content">
                        <h3 class="funfact-one__card__count count-box">
                            <span class="count-text" data-stop="15" data-speed="1500">0</span>
                            <span>M+</span>
                        </h3>
                        <p class="funfact-one__card__text">Yield Generated</p>
                    </div>
                </div>
            </div>

            <!-- Transactions Processed -->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                <div class="funfact-one__card">
                    <div class="funfact-one__card__icon-box">
                        <span class="funfact-one__card__icon"><i class="icon-trophy"></i></span>
                    </div>
                    <div class="funfact-one__card__content">
                        <h3 class="funfact-one__card__count count-box">
                            <span class="count-text" data-stop="500" data-speed="1500">0</span>
                            <span>K+</span>
                        </h3>
                        <p class="funfact-one__card__text">Transactions Processed</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

   <section class="solution-one section-space-top">
    <div class="container">
        <!-- Section Title -->
        <div class="sec-title sec-title--center">
            <div class="sec-title__top">
                <img src="{{asset('f_assets/images/shapes/sec-title-shape-1-1.png')}}" alt="FAQ" class="sec-title__shape">
                <h6 class="sec-title__tagline bw-split-in-up-fast">Frequently Asked Questions</h6>
                <img src="{{asset('f_assets/images/shapes/sec-title-shape-1-2.png')}}" alt="FAQ" class="sec-title__shape">
            </div>
            <h3 class="sec-title__title bw-split-in-up">Learn More About <br> Stablenet Token (SBT)</h3>
        </div>

        <div class="solution-one__inner">
            <div class="row gutter-y-40 align-items-center">
                
                <!-- FAQ Image -->
                <div class="col-lg-6">
                    <div class="solution-one__image wow fadeInUp" data-wow-duration="1500ms">
                        <img src="{{asset('f_assets/images/resources/solution-1-1.jpg')}}" alt="faq">
                    </div>
                </div>

                <!-- FAQ Content -->
                <div class="col-lg-6">
                    <div class="solution-one__content">
                        
                        <div class="solution-one__top wow fadeInUp" data-wow-duration="1500ms">
                            <div class="solution-one__icon-box">
                                <span class="solution-one__icon"><i class="icon-cooperation"></i></span>
                            </div>
                            <h3 class="solution-one__title">Your Questions, Answered</h3>
                        </div>

                        <!-- Accordion FAQ -->
                        <div class="faq-accordion wow fadeInUp" data-wow-duration="1500ms">
                            
                            <div class="faq-item">
                                <button class="faq-question">1. What is the Stablenet Token (SBT)?</button>
                                <div class="faq-answer">
                                    <p>The SBT token is a stablecoin issued directly by KnoxBit Crypto Crowdfunding, pegged to $1. Unlike other stablecoins, your SBT balance grows over time, representing profits from your investment.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">2. How does KnoxBit Crypto Crowdfunding generate profit?</button>
                                <div class="faq-answer">
                                    <p>Our expert team invests pooled USDT funds into <em>lending protocols, liquidity pools, and yield farming</em>. Profits are distributed to you as additional SBT tokens.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">3. Is my investment safe?</button>
                                <div class="faq-answer">
                                    <p>Yes. All deposits and withdrawals are secured by <em>smart contracts</em>, ensuring transparency and safety.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">4. Can I withdraw my investment at any time?</button>
                                <div class="faq-answer">
                                    <p>Absolutely. You can redeem your SBT tokens for USDT whenever you wish.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">5. How do I get started with KnoxBit Crypto Crowdfunding?</button>
                                <div class="faq-answer">
                                    <p>Simply connect a crypto wallet like <em>TokenPocket</em> to the KnoxBit Crypto Crowdfunding platform. It’s quick and user-friendly.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">6. Is the SBT token’s value guaranteed not to drop below $1?</button>
                                <div class="faq-answer">
                                    <p>Yes. The SBT token is pegged to USDT and maintained at a stable $1 value.</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <button class="faq-question">7. Which tokens can I use to invest?</button>
                                <div class="faq-answer">
                                    <p>Currently, only USDT (Tether) is accepted. More stablecoins may be supported in the future.</p>
                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Shapes -->
    <img src="{{asset('f_assets/images/shapes/solution-shape-1-1.png')}}" alt="shape" class="solution-one__shape-1">
    <img src="{{asset('f_assets/images/shapes/solution-shape-1-2.png')}}" alt="shape" class="solution-one__shape-2">
</section>


        
      
    <section class="profit-graph section-space">
    <div class="container">
        <div class="profit-graph__inner">
            <div class="row gutter-y-40">
                <!-- Left Content -->
                <div class="col-xl-5">
                    <div class="profit-graph__content">
                        <div class="sec-title">
                            <div class="sec-title__top">
                                <img src="{{asset('f_assets/images/shapes/sec-title-shape-1-1.png')}}" alt="SBT Growth Graph" class="sec-title__shape">
                                <h6 class="sec-title__tagline bw-split-in-up-fast">SBT PROFIT GRAPH</h6>
                            </div>
                            <h3 class="sec-title__title bw-split-in-up">Track Your <br> Stable & Growing Profits</h3>
                        </div>

                        <p class="profit-graph__text wow fadeInUp" data-wow-duration="1500ms">
                            The Stablenet Token (SBT) not only maintains its stable $1 value but also grows 
                            in quantity over time. This graph represents how your investment increases as 
                            profits from DeFi strategies are distributed back to holders.
                        </p>

                        <div class="profit-graph__info wow fadeInUp" data-wow-duration="1500ms">
                            <span class="profit-graph__info__icon"><i class="icon-cyber-security"></i></span>
                            <div class="profit-graph__info__content">
                                <h3 class="profit-graph__info__title">Safe & Transparent Growth</h3>
                                <p class="profit-graph__info__text">All transactions are powered by <em>smart contracts</em>, 
                                    ensuring your funds are secure while generating steady yield.</p>
                            </div>
                        </div>

                        <ul class="profit-graph__list list-unstyled wow fadeInUp" data-wow-duration="1500ms">
                            <li>
                                <span class="profit-graph__list__icon"><i class="icon-arrow-right-2"></i></span>
                                Your balance of SBT tokens grows automatically over time.
                            </li>
                            <li>
                                <span class="profit-graph__list__icon"><i class="icon-arrow-right-2"></i></span>
                                Stable $1 value with added profits from DeFi investments.
                            </li>
                            <li>
                                <span class="profit-graph__list__icon"><i class="icon-arrow-right-2"></i></span>
                                Withdraw anytime with full transparency.
                            </li>
                        </ul>

                        <div class="profit-graph__bottom wow fadeInUp" data-wow-duration="1500ms">
                            <a href="#" class="eolexi-btn eolexi-btn--white">
                                <span class="eolexi-btn__text"><span>Learn More</span></span>
                                <span class="eolexi-btn__icon"><i class="icon-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Graph -->
                <div class="col-xl-7">
                    <div class="profit-graph__chart">
                        
                        <!-- Coin Logo Added -->
                        <div class="profit-graph__logo text-center mb-3">
                            <img src="{{asset('f_assets/images/coin-logo.png')}}" alt="SBT Coin Logo" class="profit-graph__coin-logo">
                        </div>

                        <div class="profit-graph__chart__content">
                            <h3 class="profit-graph__chart__title">Projected SBT Growth</h3>
                            <p class="profit-graph__chart__text">See how your holdings increase steadily over the months.</p>
                        </div>
                        
                        <canvas id="profitGraph" data-chart-options='{
                            "type": "line",
                            "data": {
                                "labels": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
                                "datasets": [{
                                    "label": "SBT Balance Growth",
                                    "backgroundColor": "rgba(47, 92, 233, 0.1)",
                                    "borderColor": "#2F5CE9",
                                    "borderWidth": 4,
                                    "tension": 0.4,
                                    "data": [100, 110, 125, 140, 160, 185, 210, 240]
                                }]
                            },
                            "options": {
                                "plugins": {
                                    "legend": {
                                        "display": true
                                    }
                                },
                                "scales": {
                                    "y": {
                                        "beginAtZero": true,
                                        "title": {
                                            "display": true,
                                            "text": "SBT Tokens"
                                        }
                                    },
                                    "x": {
                                        "title": {
                                            "display": true,
                                            "text": "Months"
                                        }
                                    }
                                }
                            }
                        }' class="eolexi-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




       

       
      
        
        <footer class="main-footer">
            <div class="main-footer__bg" style="background-image: url(f_assets/images/backgrounds/footer-bg.jpg);"></div><!-- /.main-footer__bg -->
            <div class="main-footer__top">
                <div class="container">
                    <div class="row gutter-y-40">
                        <div class="col-xl-4 col-lg-5 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="footer-widget footer-widget--about">
                                <a href="https://stablenet.live/" class="footer-widget__logo logo-retina">
                                    <img src="{{asset('logo/logo.png')}}" width="219" alt="Eolexi HTML Template">
                                </a>
                               <p class="footer-widget__text">
    Discover the full potential of our platform—built to simplify, secure, and enhance your journey in the digital finance world.  
</p>

                                <div class="social-links-two">
                                    <a href="#">
                                        <span class="social-links-two__icon">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                            <span class="sr-only">Facebook</span>
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span class="social-links-two__icon">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                            <span class="sr-only">Twitter</span>
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span class="social-links-two__icon">
                                            <i class="fab fa-google" aria-hidden="true"></i>
                                            <span class="sr-only">google</span>
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span class="social-links-two__icon">
                                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                            <span class="sr-only">Linkedin</span>
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span class="social-links-two__icon">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                            <span class="sr-only">Instagram</span>
                                        </span>
                                    </a>
                                </div><!-- /.social-links-two -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-3 col-lg-5 -->
                        <div class="col-xl-4 col-lg-3 col-md-5 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                            <div class="footer-widget footer-widget--links">
                                <h2 class="footer-widget__title">Links</h2><!-- /.footer-widget__title -->
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="https://stablenet.live/">Home</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#how">How It Works</a></li>
                                    <li><a href="#faq">faq</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul><!-- /.list-unstyled footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-3 col-lg-3 col-md-5 -->
                        
                        <div class="col-xl-4 col-lg-6 col-md-7 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                            <div class="footer-widget footer-widget--newsletter">
                                <h2 class="footer-widget__title">Newsletter</h2><!-- /.footer-widget__title -->
                                
                                <form action="#" data-url="MAILCHIMP_FORM_URL" class="footer-widget__newsletter mc-form">
                                    <input type="email" name="EMAIL" placeholder="Email Address">
                                    <button type="submit" class="eolexi-btn-two">
                                        <span>SEND REQUEST</span>
                                    </button>
                                </form><!-- /. mc-form -->
                                <div class="mc-form__response"></div><!-- /.mc-form__response -->
                                <!-- /.footer-widget__text -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-3 col-lg-5 col-md-7 -->
                    </div><!-- /.row gutter-y-40 -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__top -->
            <div class="main-footer__bottom">
                <div class="container">
                    <div class="main-footer__bottom__inner">
                        <p class="main-footer__copyright">
                            &copy; Copyright <span class="dynamic-year"></span> KNOXBIT CRYPTO CROWDFUNDING
                        </p>
                    </div><!-- /.main-footer__inner -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__bottom -->
            <img src="{{asset('f_assets/images/shapes/footer-shape.png')}}" alt="shape" class="main-footer__shape">
        </footer><!-- /.main-footer -->

    </div><!-- /.page-wrapper -->



    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div><!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="icon-close"></i></span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="{{asset('logo/logo.png')}}" width="219" alt="Eolexi HTML" /></a>
            </div><!-- /.logo-box -->
            <div class="mobile-nav__container"></div><!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <span class="mobile-nav__contact__icon"><i class="fa fa-envelope"></i></span>
                    <a href="mailto:info@stablenet.live">info@stablenet.live</a>
                </li>
              
            </ul><!-- /.mobile-nav__contact -->
            <div class="social-links">
                <a href="#">
                    <span class="social-links__icon">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <span class="sr-only">Facebook</span>
                    </span>
                </a>
                <a href="#">
                    <span class="social-links__icon">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        <span class="sr-only">Twitter</span>
                    </span>
                </a>
                <a href="#">
                    <span class="social-links__icon">
                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        <span class="sr-only">Linkedin</span>
                    </span>
                </a>
                <a href="#">
                    <span class="social-links__icon">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                        <span class="sr-only">Instagram</span>
                    </span>
                </a>
            </div><!-- /.social-links -->
        </div><!-- /.mobile-nav__content -->
    </div><!-- /.mobile-nav__wrapper -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="eolexi-btn">
                    <span><i class="icon-search"></i></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>


    <script src="{{asset('f_assets/vendors/jquery/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/jarallax/jarallax.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('f_assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/tiny-slider/tiny-slider.js')}}"></script>
    <script src="{{asset('f_assets/vendors/wnumb/wNumb.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/owl-carousel/js/owlcarousel2-filter.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/wow/wow.js')}}"></script>
    <script src="{{asset('f_assets/vendors/imagesloaded/imagesloaded.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/isotope/isotope.js')}}"></script>
    <script src="{{asset('f_assets/vendors/slick/slick.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/tilt/tilt.jquery.js')}}"></script>
    <script src="{{asset('f_assets/vendors/countdown/countdown.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/jquery-circleType/jquery.circleType.js')}}"></script>
    <script src="{{asset('f_assets/vendors/jquery-lettering/jquery.lettering.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/chart/chart.js')}}"></script>
    <!-- gsap js -->
    <script src="{{asset('f_assets/vendors/gsap/gsap.js')}}"></script>
    <script src="{{asset('f_assets/vendors/gsap/scrolltrigger.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/gsap/splittext.min.js')}}"></script>
    <script src="{{asset('f_assets/vendors/gsap/eolexi-split.js')}}"></script>
    <!-- template js -->
	<script>
document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const faqItem = button.parentElement;
        faqItem.classList.toggle('active');
    });
});
</script>

    <script src="{{asset('f_assets/js/eolexi.js')}}"></script>
</body>


<!-- Mirrored from bracketweb.com/eolexihhtml/index-one-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Aug 2025 08:14:03 GMT -->
</html>