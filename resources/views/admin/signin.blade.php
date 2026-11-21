<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login || {{ config('detailsApp.name') }}</title>
    <meta name="Description" content="Admin Sign In Panel">
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
    <link href="{{ asset('a_assets/css/custom-admin.css') }}" rel="stylesheet">
</head>

<body class="admin-auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <!-- Header with Logo -->
            <div class="text-center">
                <div class="auth-logo-box">
                    <img src="{{ asset('logo/logo.png') }}" alt="{{ config('detailsApp.name') }}">
                </div>
                <h1 class="auth-title">Welcome Back</h1>
                <p class="auth-subtitle">Sign in to your Admin Dashboard</p>
            </div>

            <!-- Session Alerts -->
            @if (session()->has('OtpMsg'))
                <div class="custom-alert custom-alert-success">
                    <i class="ri-checkbox-circle-fill me-2 fs-16 text-success"></i>
                    <span>{{ session('OtpMsg') }}</span>
                </div>
            @endif

            @if (session()->has('accessMsg'))
                <div class="custom-alert custom-alert-danger">
                    <i class="ri-error-warning-fill me-2 fs-16 text-danger"></i>
                    <span>{{ session('accessMsg') }}</span>
                </div>
            @endif

            @if (session()->has('loginmsg'))
                <div class="custom-alert custom-alert-danger">
                    <i class="ri-close-circle-fill me-2 fs-16 text-danger"></i>
                    <span>{{ session('loginmsg') }}</span>
                </div>
            @endif

            <form action="{{ route('adminLogin') }}" method="post">
                @csrf

                <!-- OTP Field -->
                <div class="mb-3">
                    <label class="form-label-custom">Security OTP</label>

                    @if (session()->has('admin_otp'))
                        <div class="otp-display-badge">
                            <span class="d-flex align-items-center fs-12 fw-medium">
                                <i class="ri-key-2-fill me-1 fs-15 text-primary"></i> OTP is here:
                            </span>
                            <span class="otp-code">{{ session('admin_otp') }}</span>
                        </div>
                    @endif

                    <div class="auth-input-group otp-group">
                        <span class="input-group-text"><i class="ri-shield-keyhole-line"></i></span>
                        <input type="text" class="form-control" name="otp" required placeholder="Enter OTP">
                        <a href="{{ url('/send-admin-otp') }}" class="btn-send-otp text-decoration-none" id="button-addon2">
                            <i class="ri-send-plane-fill me-1"></i> Send OTP
                        </a>
                    </div>
                    @error('otp')
                        <div class="text-danger fs-12 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Address Field -->
                <div class="mb-3">
                    <label for="signin-username" class="form-label-custom">Email Address</label>
                    <div class="auth-input-group">
                        <span class="input-group-text"><i class="ri-mail-line"></i></span>
                        <input type="email" class="form-control" name="email" id="signin-username"
                            required placeholder="admin@erp.com">
                    </div>
                    @error('email')
                        <div class="text-danger fs-12 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <label for="signin-password" class="form-label-custom mb-0">Password</label>
                        <a href="{{ url('/forget-password') }}" class="forgot-link">
                            Forgot password?
                        </a>
                    </div>
                    <div class="auth-input-group">
                        <span class="input-group-text"><i class="ri-lock-2-line"></i></span>
                        <input type="password" class="form-control" name="password" id="signin-password"
                            required placeholder="Enter your password">
                        <button class="password-toggle-btn" type="button"
                            onclick="createpassword('signin-password',this)" id="button-addon-toggle">
                            <i class="ri-eye-off-line align-middle"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-danger fs-12 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Password Checkbox -->
                <div class="d-flex align-items-center mb-4">
                    <div class="form-check d-flex align-items-center m-0">
                        <input class="form-check-input me-2 mt-0" type="checkbox" value="1" id="defaultCheck1">
                        <label class="form-check-label text-muted fs-13" for="defaultCheck1" style="cursor: pointer;">
                            Remember password?
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-signin">
                    <i class="ri-login-circle-line me-2 fs-17"></i> Sign In
                </button>
            </form>

            <!-- Card Footer -->
            <div class="auth-footer-badge">
                <i class="ri-shield-check-line text-success me-1 fs-14 align-middle"></i>
                <span class="align-middle">Protected &amp; Secured Admin Authentication</span>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('a_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Show Password JS -->
    <script src="{{ asset('a_assets/js/show-password.js') }}"></script>
</body>

</html>
