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

    <style>
        body.admin-auth-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at 15% 15%, rgba(108, 95, 252, 0.08) 0%, transparent 45%),
                        radial-gradient(circle at 85% 85%, rgba(99, 102, 241, 0.07) 0%, transparent 45%),
                        #f5f7fa;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #1e293b;
            padding: 30px 15px;
            margin: 0;
        }

        .auth-container {
            width: 100%;
            max-width: 440px;
            margin: 0 auto;
        }

        .auth-card {
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.85);
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.06), 0 20px 45px -12px rgba(108, 95, 252, 0.08);
            padding: 38px 34px;
            position: relative;
            overflow: hidden;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #6c5ffc 0%, #8b5cf6 50%, #6366f1 100%);
        }

        .auth-logo-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            background: #f8fafc;
            border: 1px solid #edf2f7;
            border-radius: 12px;
            margin-bottom: 16px;
        }

        .auth-logo-box img {
            max-height: 44px;
            max-width: 160px;
            object-fit: contain;
        }

        .auth-title {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
            letter-spacing: -0.3px;
        }

        .auth-subtitle {
            font-size: 13.5px;
            color: #64748b;
            margin-bottom: 24px;
        }

        .form-label-custom {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
            display: block;
        }

        .auth-input-group {
            position: relative;
            display: flex;
            border-radius: 10px;
            background: #ffffff;
            transition: all 0.2s ease;
        }

        .auth-input-group .input-group-text {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-right: none;
            color: #64748b;
            border-radius: 10px 0 0 10px;
            padding: 10px 14px;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .auth-input-group .form-control {
            border: 1px solid #e2e8f0;
            border-left: none;
            border-radius: 0 10px 10px 0;
            padding: 11px 14px;
            font-size: 14px;
            color: #1e293b;
            background-color: #ffffff;
            transition: all 0.2s ease;
        }

        .auth-input-group.otp-group .form-control {
            border-radius: 0;
            border-right: none;
        }

        .auth-input-group .form-control:focus {
            box-shadow: none;
            border-color: #6c5ffc;
            background-color: #ffffff;
        }

        .auth-input-group:focus-within {
            box-shadow: 0 0 0 3px rgba(108, 95, 252, 0.15);
            border-radius: 10px;
        }

        .auth-input-group:focus-within .input-group-text {
            border-color: #6c5ffc;
            color: #6c5ffc;
            background-color: #f5f3ff;
        }

        .auth-input-group:focus-within .form-control {
            border-color: #6c5ffc;
        }

        .btn-send-otp {
            background: linear-gradient(135deg, #6c5ffc 0%, #5849e8 100%);
            border: 1px solid #5849e8;
            color: #ffffff !important;
            font-weight: 600;
            font-size: 13px;
            padding: 0 16px;
            border-radius: 0 10px 10px 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(108, 95, 252, 0.2);
        }

        .btn-send-otp:hover {
            background: linear-gradient(135deg, #5e50ee 0%, #4a3ad8 100%);
            color: #ffffff !important;
            box-shadow: 0 3px 10px rgba(108, 95, 252, 0.35);
        }

        .password-toggle-btn {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: none;
            color: #64748b;
            border-radius: 0 10px 10px 0;
            padding: 10px 14px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .password-toggle-btn:hover {
            color: #334155;
            background-color: #f1f5f9;
        }

        .auth-input-group:focus-within .password-toggle-btn {
            border-color: #6c5ffc;
        }

        .btn-signin {
            background: linear-gradient(135deg, #6c5ffc 0%, #5849e8 100%);
            border: none;
            color: #ffffff;
            font-weight: 600;
            font-size: 15px;
            padding: 12px 24px;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(108, 95, 252, 0.35);
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .btn-signin:hover, .btn-signin:focus {
            background: linear-gradient(135deg, #5e50ee 0%, #4a3ad8 100%);
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(108, 95, 252, 0.45);
            transform: translateY(-1px);
        }

        .btn-signin:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(108, 95, 252, 0.3);
        }

        .form-check-input {
            width: 17px;
            height: 17px;
            border-color: #cbd5e1;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #6c5ffc;
            border-color: #6c5ffc;
        }

        .forgot-link {
            font-size: 12.5px;
            color: #ef4444;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .forgot-link:hover {
            color: #dc2626;
            text-decoration: underline;
        }

        .otp-display-badge {
            background: #ede9fe;
            color: #5b21b6;
            border-radius: 10px;
            padding: 9px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
            border: 1px solid #ddd6fe;
        }

        .otp-display-badge .otp-code {
            background: #6c5ffc;
            color: #ffffff;
            font-weight: 700;
            font-size: 13.5px;
            padding: 3px 10px;
            border-radius: 6px;
            letter-spacing: 1.5px;
        }

        .custom-alert {
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            border: none;
        }

        .custom-alert-success {
            background-color: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .custom-alert-danger {
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .auth-footer-badge {
            margin-top: 24px;
            padding-top: 18px;
            border-top: 1px solid #f1f5f9;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
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
