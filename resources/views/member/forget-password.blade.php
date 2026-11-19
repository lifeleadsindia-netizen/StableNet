<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">


<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <!-- META DATA eta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="">
    <meta name="Author" content="">
    <meta name="keywords" content="">

    <!-- TITLE -->
    <title> Forget Password || {{ config('detailsApp.name') }} </title>

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="{{ asset('logo/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('logo/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('logo/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}" />

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('user_assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ asset('user_assets/icon-fonts/icons.css') }}" rel="stylesheet">

    <!-- APP SCSS -->
    <link rel="preload" as="style" href="{{ asset('user_assets/app-fce3f544.css') }}" />
    <link rel="stylesheet" href="{{ asset('user_assets/app-fce3f544.css') }}" />

    <!-- MAIN JS -->
    <script src="{{ asset('user_assets/authentication-main.js') }}"></script>
    <style>
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }
    </style>
</head>

<body>
    <video autoplay="" muted="" loop="" id="myVideo">
        <source src="{{ asset('logo/bg.mp4') }}" type="video/mp4">
    </video>
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">

                <form action="{{ route('memretrivePassword') }}" method="post" class=" dz-form pb-3">
                    @csrf
                    @if (session()->has('succMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('succMsg') }}
                        </div>
                    @endif
                    @if (session()->has('forgetPassErr'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('forgetPassErr') }}
                        </div>
                    @endif
                    <div class="card custom-card" style="background-color: rgba(0, 0, 0, 0.7)">
                        <div class="card-body p-5 ">
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="desktop-logo"
                                        style="height: 70px">
                                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="desktop-dark"
                                        style="height: 70px">
                                </a>
                            </div>
                            <p class="h5 fw-semibold mb-2 text-center mb-2 text-white">Forget Password</p>
                            @if (session()->has('failedMsg'))
                                <div class="alert alert-danger alert-dismissible fade show col-10 d-block"
                                    role="alert">{{ session('failedMsg') }}
                                </div>
                            @endif
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default mt-3 text-white">Memberid</label>
                                    <input type="text" class="form-control form-control-lg" id="signin-username"
                                        placeholder="Enter Your Memberid" name="memberid">
                                    @error('memberid')
                                        <span class="small text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-12 d-grid mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Proceed</button>
                                </div>
                                <b class="text-warning">** Password will be sent to your registered email </b>
                                <div class="row mt-2">
                                    <div class="col-6 ">
                                        <a href="{{ url('/member') }}"
                                            class="text-bold text-secondary"><small>**login</small></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- SCRIPTS -->

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('user_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('user_assets/show-password.js') }}"></script>


    <!-- END SCRIPTS -->

</body>


</html>
