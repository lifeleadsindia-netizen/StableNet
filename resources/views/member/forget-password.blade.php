<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="dark" data-header-styles="dark"
    data-menu-styles="dark" data-toggled="close">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="{{ config('detailsApp.name') }} Reset Password">
    <meta name="Author" content="{{ config('detailsApp.name') }}">

    <!-- TITLE -->
    <title>Reset Password || {{ config('detailsApp.name') }}</title>

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

    <!-- APP CSS -->
    <link rel="stylesheet" href="{{ asset('user_assets/app-fce3f544.css') }}" />

    <!-- 3D GLASS AUTH CSS -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/glass-auth.css') }}" />
</head>

<body>
    <!-- Background Video -->
    <video autoplay muted loop playsinline class="auth-video-bg">
        <source src="{{ asset('logo/bg.mp4') }}" type="video/mp4">
    </video>

    <!-- 3D Glowing Ambient Orbs Layer -->
    <div class="auth-ambient-wrapper">
        <div class="ambient-orb ambient-orb-1"></div>
        <div class="ambient-orb ambient-orb-2"></div>
        <div class="ambient-orb ambient-orb-3"></div>
    </div>

    <!-- Auth Container -->
    <div class="auth-page-container">
        <div class="auth-3d-card-wrapper">
            <div class="auth-3d-card">
                <!-- Header / Logo -->
                <div class="auth-header">
                    <a href="{{ url('member') }}" class="auth-logo-badge">
                        <img src="{{ asset('logo/logo.png') }}" alt="{{ config('detailsApp.name') }} Logo">
                    </a>
                    <h1 class="auth-title">Password Recovery</h1>
                    <p class="auth-subtitle">
                        <span class="pulse-dot"></span>
                        Enter your Member ID to receive reset instructions
                    </p>
                </div>

                <!-- Flash Alert Messages -->
                @if (session()->has('succMsg'))
                    <div class="glass-alert glass-alert-success" role="alert">
                        <i class="ri-mail-check-line glass-alert-icon"></i>
                        <div>{{ session('succMsg') }}</div>
                    </div>
                @endif

                @if (session()->has('forgetPassErr'))
                    <div class="glass-alert glass-alert-danger" role="alert">
                        <i class="ri-error-warning-fill glass-alert-icon"></i>
                        <div>{{ session('forgetPassErr') }}</div>
                    </div>
                @endif

                @if (session()->has('failedMsg'))
                    <div class="glass-alert glass-alert-danger" role="alert">
                        <i class="ri-error-warning-fill glass-alert-icon"></i>
                        <div>{{ session('failedMsg') }}</div>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('memretrivePassword') }}" method="post" class="auth-form" autocomplete="off">
                    @csrf

                    <!-- Member ID Field -->
                    <div class="glass-form-group">
                        <label for="signin-username" class="glass-label">
                            <span>Member ID</span>
                        </label>
                        <div class="glass-input-wrapper">
                            <i class="ri-user-3-line glass-input-icon"></i>
                            <input type="text" 
                                   class="glass-input @error('memberid') is-invalid @enderror" 
                                   id="signin-username"
                                   placeholder="Enter your registered Member ID" 
                                   name="memberid"
                                   value="{{ old('memberid') }}"
                                   required>
                        </div>
                        @error('memberid')
                            <div class="text-danger small mt-1 ps-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="p-3 my-3 rounded-3" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="d-flex align-items-center gap-2 text-warning" style="font-size: 0.825rem;">
                            <i class="ri-information-line fs-5"></i>
                            <span>A temporary password will be delivered securely to your verified email address.</span>
                        </div>
                    </div>

                    <!-- 3D Submit Button -->
                    <button type="submit" class="btn-3d-glass">
                        <i class="ri-send-plane-2-line"></i>
                        <span>Send Recovery Email</span>
                    </button>
                </form>

                <!-- Footer Navigation -->
                <div class="auth-footer">
                    <p>Remembered your password? 
                        <a href="{{ url('/member') }}" class="auth-footer-link">Back to Sign In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('user_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_assets/glass-auth-3d.js') }}"></script>
</body>

</html>
