<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <!-- META DATA eta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="">
    <meta name="Author" content="">
    <meta name="keywords" content="">

    <!-- TITLE -->
    <title> SignUp || {{ config('detailsApp.name') }} </title>

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
            <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6 col-sm-10 col-12 pt-4">
                <form action="{{ route('userRegister') }}" method="post" class=" dz-form pb-3">
                    @csrf
                    <div class="card custom-card" style="background-color: rgba(0, 0, 0, 0.7)">
                        <div class="card-body p-5">
                            <div class=" d-flex justify-content-center">
                                <a href="index.html">
                                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="desktop-logo"
                                        style="height: 70px">
                                    <img src="{{ asset('logo/logo.png') }}" alt="logo" class="desktop-dark"
                                        style="height: 70px">
                                </a>
                            </div>
                            <p class="h5 fw-semibold mb-2 text-center text-white">Sign up your account</p>
                            @if (session()->has('failedMsg'))
                                <div class="alert alert-danger alert-dismissible fade show col-12 d-block"
                                    role="alert">{{ session('failedMsg') }}
                                </div>
                            @endif
                            {{-- <p class="text-center">Enter your MemberId and your
                                password. </p> --}}
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default mt-3 text-white">Sponsor Id</label>
                                    <input type="text" class="form-control form-control-lg" id="sponsor"
                                        placeholder="Enter Sponsor Id" name="sponsor"
                                        value="{{ $sdata != '1' ? $sdata : '' }}">
                                    <span id="sponhtml"></span>
                                    @error('sponsor')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default text-white">Name</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Name"
                                        name="name">
                                    @error('name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default text-white">Email</label>
                                    <input type="email" class="form-control form-control-lg" placeholder="Enter Email"
                                        name="email">
                                    @error('email')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default text-white">Mobile</label>
                                    <input type="text" minlength="10" maxlength="10"
                                        class="form-control form-control-lg" placeholder="Enter Mobile Number"
                                        name="mobile">
                                    @error('mobile')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password"
                                        class="form-label text-default d-block text-white">Password</label>
                                    <div class="col-xl-12 mb-2">
                                        <div class="input-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-lg" id="signin-password"
                                                placeholder="Enter Password" />
                                            <button class="btn btn-light" type="button"
                                                onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                                    class="ri-eye-off-line align-middle"></i></button>
                                        </div>
                                        @error('password')
                                            <span class="small text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--<div class="col-xl-12">-->
                                    <!--    <label for="signin-password"-->
                                    <!--        class="form-label text-default d-block text-white">Transaction-->
                                    <!--        Password</label>-->
                                    <!--    <div class="col-xl-12 mb-2">-->
                                    <!--        <div class="input-group">-->
                                    <!--            <input type="password" id="txn-password"-->
                                    <!--                class="form-control form-control-lg"-->
                                    <!--                placeholder="Enter Transaction Password" name="txn_password">-->
                                    <!--            <button class="btn btn-light" type="button"-->
                                    <!--                onclick="createpassword('txn-password',this)"-->
                                    <!--                id="button-addon2"><i-->
                                    <!--                    class="ri-eye-off-line align-middle"></i></button>-->
                                    <!--        </div>-->
                                    <!--        @error('txn_password')-->
                                    <!--            <span class=" text-danger">{{ $message }}</span>-->
                                    <!--        @enderror-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-xl-12">
                                        <label for="password" class="form-label text-default text-white">Country</label>
                                        <select name="country" class="form-select">
                                            <option value="">Select Country
                                            </option>
                                            @foreach ($cdata as $country)
                                                <option value="{{ $country['nicename'] }}">
                                                    {{ $country['nicename'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 d-grid mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary mt-3">Create New
                                            Account</button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="fs-12 text-muted mt-3">Dont have an account? <a
                                            href="{{ url('/member') }}" class="text-primary">Sign in</a></p>
                                </div>
                                {{-- <div class="text-center my-3 authentication-barrier">
                                <span>OR</span>
                            </div> --}}
                                {{-- <div class="btn-list text-center">
                                <button class="btn btn-icon btn-light">
                                    <i class="ri-facebook-line fw-bold text-dark op-7"></i>
                                </button>
                                <button class="btn btn-icon btn-light">
                                    <i class="ri-google-line fw-bold text-dark op-7"></i>
                                </button>
                                <button class="btn btn-icon btn-light">
                                    <i class="ri-twitter-line fw-bold text-dark op-7"></i>
                                </button>
                            </div> --}}
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

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sponsor').on('input', function() {
                var sponsor = $(this).val();
                var token = $('#csrfToken').val();

                if (sponsor.length == 0) {
                    $('#sponhtml').html('');
                }
                $.ajax({
                    url: '/getSponname',
                    type: 'POST',
                    data: {
                        'sponsorid': sponsor,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {

                        $('#sponhtml').html(response['data'])

                    }
                })
            });
        })
    </script>


    <!-- END SCRIPTS -->

</body>

</html>
