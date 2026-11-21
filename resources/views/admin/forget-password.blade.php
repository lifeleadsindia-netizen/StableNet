<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password || {{ config('detailsApp.name') }}</title>
    <meta name="Description" content="Admin Forgot Password Panel">
    <meta name="Author" content="{{ config('detailsApp.name') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('logo/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('logo/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('logo/favicon/site.webmanifest') }}" />

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('a_assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Style Css -->
    <link href="{{ asset('a_assets/css/styles.min.css') }}" rel="stylesheet">
    <!-- Icons Css -->
    <link href="{{ asset('a_assets/css/icons.min.css') }}" rel="stylesheet">
    <!-- Custom Admin Theme Css -->
    <link href="{{ asset('a_assets/css/custom-admin.css') }}?v=1.2" rel="stylesheet">
</head>

<body class="admin-auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <!-- Header with Logo -->
            <div class="text-center">
                <div class="auth-logo-box">
                    <img src="{{ asset('logo/logo.png') }}" alt="{{ config('detailsApp.name') }}">
                </div>
                <h1 class="auth-title">Forgot Password?</h1>
                <p class="auth-subtitle">Recover your administrator account access</p>
            </div>

            <!-- Session Alerts -->
            @if (session()->has('succMsg'))
                <div class="custom-alert custom-alert-success mb-3">
                    <i class="ri-checkbox-circle-fill me-2 fs-16 text-success"></i>
                    <span>{{ session('succMsg') }}</span>
                </div>
            @endif

            @if (session()->has('forgetPassErr'))
                <div class="custom-alert custom-alert-danger mb-3">
                    <i class="ri-error-warning-fill me-2 fs-16 text-danger"></i>
                    <span>{{ session('forgetPassErr') }}</span>
                </div>
            @endif

            @if (session()->has('failedMsg'))
                <div class="custom-alert custom-alert-danger mb-3">
                    <i class="ri-close-circle-fill me-2 fs-16 text-danger"></i>
                    <span>{{ session('failedMsg') }}</span>
                </div>
            @endif

            <!-- Info Message Box -->
            <div class="alert alert-info bg-info-subtle border-0 text-info-emphasis d-flex align-items-start gap-2 mb-4 p-3 rounded-3 fs-13">
                <i class="ri-information-line fs-18 text-info flex-shrink-0 mt-1"></i>
                <div>
                    <strong>Password Recovery Notice:</strong>
                    <div class="text-muted mt-1 fs-12">
                        A new secure password will be generated and sent directly to your registered administrator email address.
                    </div>
                </div>
            </div>

            <form action="{{ route('retrivePassword') }}" method="post">
                @csrf

                <!-- Submit Button -->
                <button type="submit" class="btn-signin w-100 mb-3">
                    <i class="ri-mail-send-line me-2 fs-17"></i> Retrieve &amp; Send Password
                </button>
            </form>

            <!-- Back to Login Link -->
            <div class="text-center mt-3 pt-2">
                <a href="{{ url('/admin') }}" class="forgot-link d-inline-flex align-items-center gap-1">
                    <i class="ri-arrow-left-line fs-15"></i> Back to Admin Sign In
                </a>
            </div>

            <!-- Card Footer Badge -->
            <div class="auth-footer-badge mt-4">
                <i class="ri-shield-check-line text-success me-1 fs-14 align-middle"></i>
                <span class="align-middle">Protected &amp; Secured Admin Authentication</span>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('a_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
