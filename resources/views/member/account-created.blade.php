<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="dark" data-header-styles="dark"
    data-menu-styles="dark" data-toggled="close">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="{{ config('detailsApp.name') }} Account Created Successfully">
    <meta name="Author" content="{{ config('detailsApp.name') }}">

    <!-- TITLE -->
    <title>Account Created Successfully || {{ config('detailsApp.name') }}</title>

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
        <div class="auth-3d-card-wrapper wide-card">
            <div class="auth-3d-card">
                <!-- Header / Logo -->
                <div class="auth-header">
                    <a href="{{ url('member') }}" class="auth-logo-badge">
                        <img src="{{ asset('logo/logo.png') }}" alt="{{ config('detailsApp.name') }} Logo">
                    </a>
                    <div class="my-2">
                        <span class="badge px-3 py-2 rounded-pill" style="background: rgba(16, 185, 129, 0.2); border: 1px solid rgba(16, 185, 129, 0.4); color: #6ee7b7; font-size: 0.85rem;">
                            <i class="ri-checkbox-circle-fill me-1"></i> Registration Successful
                        </span>
                    </div>
                    <h1 class="auth-title">Congratulations!</h1>
                    <p class="auth-subtitle text-white fw-semibold">
                        {{ session('name', 'Valued Member') }}
                    </p>
                    <p class="text-muted small mt-1">
                        Your account has been created successfully. Save your login credentials securely below.
                    </p>
                </div>

                <!-- Credential Summary Table -->
                <table class="glass-summary-table">
                    <tr>
                        <th>User ID</th>
                        <td class="text-info fw-bold">{{ session('userid', 'STB10001') }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ session('email', 'user@example.com') }}</td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td>{{ session('mobile', 'N/A') }}</td>
                    </tr>
                    <tr>
                        <th>Login Password</th>
                        <td class="text-warning font-monospace">{{ session('password', '••••••••') }}</td>
                    </tr>
                    @if (session('txn_password'))
                    <tr>
                        <th>Transaction Password</th>
                        <td class="text-warning font-monospace">{{ session('txn_password') }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Country</th>
                        <td>{{ session('country', 'N/A') }}</td>
                    </tr>
                </table>

                <!-- Actions -->
                <div class="d-flex flex-column gap-2 mt-4">
                    <a href="{{ url('/member') }}" class="btn-3d-glass">
                        <i class="ri-login-box-line"></i>
                        <span>Proceed to Sign In</span>
                    </a>
                    <a href="{{ url('/member/register/1') }}" class="btn-3d-glass btn-3d-glass-secondary">
                        <i class="ri-user-add-line"></i>
                        <span>Register Another Account</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('user_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_assets/glass-auth-3d.js') }}"></script>
</body>

</html>
