<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="dark" data-header-styles="dark"
    data-menu-styles="dark" data-toggled="close">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="{{ config('detailsApp.name') }} Member Portal Login">
    <meta name="Author" content="{{ config('detailsApp.name') }}">

    <!-- TITLE -->
    <title>Member Sign In || {{ config('detailsApp.name') }}</title>

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
    <link rel="stylesheet" href="{{ asset('user_assets/css/glass-auth.css') }}?v={{ time() }}" />
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
                    <h1 class="auth-title">{{ config('detailsApp.name') }}</h1>
                    <p class="auth-subtitle">
                        <span class="pulse-dot"></span>
                        Secure Member Access Portal
                    </p>
                </div>

                <!-- Flash Alert Messages -->
                @if (session()->has('failedmsg'))
                    <div class="glass-alert glass-alert-danger" role="alert">
                        <i class="ri-error-warning-fill glass-alert-icon"></i>
                        <div>{{ session('failedmsg') }}</div>
                    </div>
                @endif

                @if (session()->has('succMsg'))
                    <div class="glass-alert glass-alert-success" role="alert">
                        <i class="ri-checkbox-circle-fill glass-alert-icon"></i>
                        <div>{{ session('succMsg') }}</div>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('userLogin') }}" method="post" class="auth-form" autocomplete="off">
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
                                   placeholder="Enter your Member ID" 
                                   name="memberid"
                                   value="{{ old('memberid') }}"
                                   required>
                        </div>
                        @error('memberid')
                            <div class="text-danger small mt-1 ps-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="glass-form-group">
                        <label for="signin-password" class="glass-label">
                            <span>Password</span>
                            <a href="{{ url('/mem-forget-password') }}" class="glass-label-link">Forgot password?</a>
                        </label>
                        <div class="glass-input-wrapper">
                            <i class="ri-lock-password-line glass-input-icon"></i>
                            <input type="password" 
                                   class="glass-input @error('password') is-invalid @enderror" 
                                   id="signin-password"
                                   placeholder="Enter your Password" 
                                   name="password"
                                   required>
                            <button class="glass-pw-toggle" 
                                    type="button"
                                    aria-label="Toggle password visibility"
                                    onclick="togglePasswordVisibility('signin-password', this)">
                                <i class="ri-eye-off-line align-middle"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1 ps-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Password Checkbox -->
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <label class="glass-checkbox-wrapper">
                            <input type="checkbox" class="glass-checkbox" id="rememberMe">
                            <span class="glass-checkbox-label">Remember password</span>
                        </label>
                    </div>

                    <!-- 3D Submit Button -->
                    <button type="submit" class="btn-3d-glass">
                        <i class="ri-login-box-line"></i>
                        <span>Sign In to Account</span>
                    </button>
                </form>

                <!-- Footer Navigation -->
                <div class="auth-footer">
                    <p>Don't have an account? 
                        <a href="{{ url('/member/register/1') }}" class="auth-footer-link">Sign Up</a>
                    </p>
                </div>

                <!-- Divider -->
                <div class="auth-divider">
                    <span>or connect with</span>
                </div>

                <!-- Social Icons -->
                <div class="auth-social-list">
                    <button type="button" class="auth-social-btn facebook" title="Facebook">
                        <i class="ri-facebook-fill"></i>
                    </button>
                    <button type="button" class="auth-social-btn google" title="Google">
                        <i class="ri-google-fill"></i>
                    </button>
                    <button type="button" class="auth-social-btn twitter" title="Twitter / X">
                        <i class="ri-twitter-x-fill"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('user_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_assets/glass-auth-3d.js') }}"></script>
</body>

</html>
