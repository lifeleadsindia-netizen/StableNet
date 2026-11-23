<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="dark" data-header-styles="dark"
    data-menu-styles="dark" data-toggled="close">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="{{ config('detailsApp.name') }} Member Registration">
    <meta name="Author" content="{{ config('detailsApp.name') }}">

    <!-- TITLE -->
    <title>Member Sign Up || {{ config('detailsApp.name') }}</title>

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
                    <h1 class="auth-title">Create Account</h1>
                    <p class="auth-subtitle">
                        <span class="pulse-dot"></span>
                        Join {{ config('detailsApp.name') }} Global Network
                    </p>
                </div>

                <!-- Flash Alert Messages -->
                @if (session()->has('failedMsg'))
                <div class="glass-alert glass-alert-danger" role="alert">
                    <i class="ri-error-warning-fill glass-alert-icon"></i>
                    <div>{{ session('failedMsg') }}</div>
                </div>
                @endif

                <!-- Form -->
                <form action="{{ route('userRegister') }}" method="post" class="auth-form" autocomplete="off">
                    @csrf

                    <div class="row g-2">
                        <!-- Sponsor ID Field -->
                        <div class="col-md-6 col-12">
                            <div class="glass-form-group mb-0">
                                <label for="sponsor" class="glass-label">
                                    <span>Sponsor ID</span>
                                    <span id="sponhtml" class="text-info fw-bold" style="font-size: 0.725rem;"></span>
                                </label>
                                <div class="glass-input-wrapper">
                                    <i class="ri-user-shared-line glass-input-icon"></i>
                                    <input type="text"
                                        class="glass-input @error('sponsor') is-invalid @enderror"
                                        id="sponsor"
                                        placeholder="Sponsor ID"
                                        name="sponsor"
                                        value="{{ old('sponsor', $sdata != '1' ? $sdata : '') }}"
                                        required>
                                </div>
                                @error('sponsor')
                                <div class="text-danger small mt-1 ps-1" style="font-size: 0.725rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Full Name Field -->
                        <div class="col-md-6 col-12">
                            <div class="glass-form-group mb-0">
                                <label for="name" class="glass-label">Full Name</label>
                                <div class="glass-input-wrapper">
                                    <i class="ri-user-line glass-input-icon"></i>
                                    <input type="text"
                                        class="glass-input @error('name') is-invalid @enderror"
                                        id="name"
                                        placeholder="Your Name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required>
                                </div>
                                @error('name')
                                <div class="text-danger small mt-1 ps-1" style="font-size: 0.725rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Address Field -->
                        <div class="col-md-6 col-12">
                            <div class="glass-form-group mb-0">
                                <label for="email" class="glass-label">Email Address</label>
                                <div class="glass-input-wrapper">
                                    <i class="ri-mail-line glass-input-icon"></i>
                                    <input type="email"
                                        class="glass-input @error('email') is-invalid @enderror"
                                        id="email"
                                        placeholder="name@email.com"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required>
                                </div>
                                @error('email')
                                <div class="text-danger small mt-1 ps-1" style="font-size: 0.725rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mobile Number Field -->
                        <div class="col-md-6 col-12">
                            <div class="glass-form-group mb-0">
                                <label for="mobile" class="glass-label">Mobile Number</label>
                                <div class="glass-input-wrapper">
                                    <i class="ri-phone-line glass-input-icon"></i>
                                    <input type="tel"
                                        minlength="10"
                                        maxlength="10"
                                        class="glass-input @error('mobile') is-invalid @enderror"
                                        id="mobile"
                                        placeholder="10 digit number"
                                        name="mobile"
                                        value="{{ old('mobile') }}"
                                        required>
                                </div>
                                @error('mobile')
                                <div class="text-danger small mt-1 ps-1" style="font-size: 0.725rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <!-- Password Field -->
                        <div class="col-md-6 col-12">
                            <div class="glass-form-group mb-0">
                                <label for="signup-password" class="glass-label">Password</label>
                                <div class="glass-input-wrapper">
                                    <i class="ri-lock-password-line glass-input-icon"></i>
                                    <input type="password"
                                        class="glass-input @error('password') is-invalid @enderror"
                                        id="signup-password"
                                        placeholder="Choose password"
                                        name="password"
                                        required>
                                    <button class="glass-pw-toggle"
                                        type="button"
                                        aria-label="Toggle password visibility"
                                        onclick="togglePasswordVisibility('signup-password', this)">
                                        <i class="ri-eye-off-line align-middle"></i>
                                    </button>
                                </div>
                                @error('password')
                                <div class="text-danger small mt-1 ps-1" style="font-size: 0.725rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="glass-form-group mb-0">
                                <label for="signup-transaction-password" class="glass-label">Transaction Password</label>
                                <div class="glass-input-wrapper">
                                    <i class="ri-lock-password-line glass-input-icon"></i>
                                    <input type="password"
                                        class="glass-input @error('transaction_password') is-invalid @enderror"
                                        id="signup-transaction-password"
                                        placeholder="Choose txn password"
                                        name="transaction_password"
                                        required>
                                    <button class="glass-pw-toggle"
                                        type="button"
                                        aria-label="Toggle password visibility"
                                        onclick="togglePasswordVisibility('signup-transaction-password', this)">
                                        <i class="ri-eye-off-line align-middle"></i>
                                    </button>
                                </div>
                                @error('transaction_password')
                                <div class="text-danger small mt-1 ps-1" style="font-size: 0.725rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Country Selection Field -->
                        <div class="col-md-12 col-12">
                            <div class="glass-form-group mb-0">
                                <label for="country" class="glass-label">Country</label>
                                <div class="glass-input-wrapper">
                                    <i class="ri-global-line glass-input-icon"></i>
                                    <select name="country" id="country" class="glass-select @error('country') is-invalid @enderror" required>
                                        <option value="">Select Country</option>
                                        @foreach ($cdata as $country)
                                        <option value="{{ $country['nicename'] }}" {{ old('country') == $country['nicename'] ? 'selected' : '' }}>
                                            {{ $country['nicename'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('country')
                                <div class="text-danger small mt-1 ps-1" style="font-size: 0.725rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- 3D Submit Button -->
                    <button type="submit" class="btn-3d-glass mt-3">
                        <i class="ri-user-add-line"></i>
                        <span>Register Account</span>
                    </button>
                </form>

                <!-- Footer Navigation -->
                <div class="auth-footer">
                    <p>Already have an account?
                        <a href="{{ url('/member') }}" class="auth-footer-link">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="{{ asset('user_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('user_assets/glass-auth-3d.js') }}"></script>
    <script>
        $(document).ready(function() {
            function checkSponsor() {
                var sponsor = $('#sponsor').val();
                if (!sponsor || sponsor.length === 0) {
                    $('#sponhtml').html('');
                    return;
                }
                $.ajax({
                    url: '/getSponname',
                    type: 'POST',
                    data: {
                        'sponsorid': sponsor,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response && response['data']) {
                            $('#sponhtml').html('<i class="ri-check-line"></i> ' + response['data']);
                        } else {
                            $('#sponhtml').html('');
                        }
                    },
                    error: function() {
                        $('#sponhtml').html('');
                    }
                });
            }

            $('#sponsor').on('input blur', checkSponsor);
            if ($('#sponsor').val()) {
                checkSponsor();
            }
        });
    </script>
</body>

</html>