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
    <title> Account Created || {{ config('detailsApp.name') }} </title>

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
            <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">

                <form action="{{ route('userLogin') }}" method="post" class=" dz-form pb-3">
                    @csrf
                    <div class="card custom-card" style="background-color: rgba(0, 0, 0, 0.7)">
                        <div class="card-body p-5">
                            <div class=" mb-3 d-flex justify-content-center">
                                <a href="{{ url('member/account-created') }}">
                                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="desktop-logo"
                                        style="height: 70px">
                                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="desktop-dark"
                                        style="height: 70px">
                                </a>
                            </div>
                            <h3 class="text-center mb-3 text-white" style="color: rgb(0, 0, 0)">Congratulations</h3>
                            <h4 class="text-center mb-3 text-white" style="color: rgb(0, 0, 0)">{{ session('name') }}</h4>
                            <h6 class="text-success mt-3">
                                {{ __('Your account has been created successfully. Please login to your account using memberid and password') }}
                            </h6>
                            <table class="table mt-4 text-start" style="autoflow:auto">
                                <tr>
                                    <th>User Id</th>
                                    <td>{{ session('userid') }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td width="35%">{{ wordwrap(session('email'), 15, "\n", true) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{ session('mobile') }}</td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td>{{ session('password') }}</td>
                                </tr>
                                <tr>
                                    <th>Transaction<br> Password</th>
                                    <td>{{ session('txn_password') }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ session('country') }}</td>
                                </tr>
                            </table>
                            <div class="row">
                                <a href="{{ url('/member') }}" class="btn btn-primary mt-4">Login to
                                    Account</a>
                                <a href="{{ url('/member/register/1') }}" class="btn btn-danger mt-4">New
                                    Registration</a>
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
