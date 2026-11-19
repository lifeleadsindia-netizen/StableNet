<!DOCTYPE html>
<html lang="en">

<head>
    <!--Title-->
    <title>Error Page || {{ config('detailsApp.name') }}</title>

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{asset('f_assets/images/logo/favicon/favicon-96x96.png')}}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{asset('f_assets/images/logo/favicon/favicon.svg')}}" />
    <link rel="shortcut icon" href="{{asset('f_assets/images/logo/favicon/favicon.ico')}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('f_assets/images/logo/favicon/apple-touch-icon.png')}}" />
    <link rel="manifest" href="{{asset('f_assets/images/logo/favicon/site.webmanifest')}}" />

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('user_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link class="main-css" href="{{ asset('user_assets/css/style.css')}}" rel="stylesheet">

</head>

<body>
    <div class="authincation fix-wrapper">
        <div class="container">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="error-page">
                        <div class="error-inner text-center">
                            <div class="dz-error" data-text="404">404</div>
                            <h2 class="error-head mb-0"><i class="fa fa-exclamation-triangle text-warning me-2"></i>The
                                page you were looking for is not found!</h2>
                            <P>You may have mistyped the address or the page may have moved.</P>
                            <a onclick="window.history.back();" class="btn btn-secondary">BACK TO HOMEPAGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
 Scripts
***********************************-->
    <!-- Required vendors -->
    {{-- <script src="{{ asset('user_assets/vendor/global/global.min.js') }}"></script> --}}
    <script src="{{ asset('user_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/deznav-init.js') }}"></script>
    <script src="{{ asset('user_assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/demo.js') }}"></script>
    <script src="{{ asset('user_assets/js/styleSwitcher.js') }}"></script>
</body>

</html>
