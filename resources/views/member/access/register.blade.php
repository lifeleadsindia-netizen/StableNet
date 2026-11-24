<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- PAGE TITLE HERE -->
    <title>{{ config('detailsApp.name') }}</title>


   <!-- Favicon Icon -->
   <link rel="icon" type="image/png" href="{{asset('f_assets/images/logo/favicon/favicon-96x96.png')}}" sizes="96x96" />
   <link rel="icon" type="image/svg+xml" href="{{asset('f_assets/images/logo/favicon/favicon.svg')}}" />
   <link rel="shortcut icon" href="{{asset('f_assets/images/logo/favicon/favicon.ico')}}" />
   <link rel="apple-touch-icon" sizes="180x180" href="{{asset('f_assets/images/logo/favicon/apple-touch-icon.png')}}" />
   <link rel="manifest" href="{{asset('f_assets/images/logo/favicon/site.webmanifest')}}" />

   <link rel="shortcut icon" href="{{asset('f_assets/images/logo/favicon/favicon.png')}}" />
   <link rel="apple-touch-icon-precomposed" href="{{asset('f_assets/images/logo/favicon/favicon.png')}}" />

    <link href="{{ asset('user_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user_assets/css/style.css') }}" rel="stylesheet">

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

<body class="vh-100">
    <div class="page-wraper">

        <!-- Content -->
        <div class="browse-job login-style3">
            <!-- Coming Soon -->
            <div class="bg-img-fix overflow-hidden">
                <video autoplay="" muted="" loop="" id="myVideo">
                    <source src="{{ asset('logo/bg.mp4') }}" type="video/mp4">

                </video>
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12  ">
                        <div class="mt-5">
                            <div id="mCSB_1_container" class="mCSB_container" dir="ltr">
                                <div class="login-form style-2 card mt-5" style="background-color: rgba( 0, 0, 0,0.5)">
                                    <div class="card-body ">
                                        <div class="py-4 text-center">
                                            <img src="{{asset('logo/logo.png')}}" width="200" alt=""
                                                class="text-center ">
                                        </div>

                                        <nav>
                                            <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">

                                                <div class="tab-content w-100" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-personal"
                                                        role="tabpanel" aria-labelledby="nav-personal-tab">
                                                        <form action="{{ route('userRegister') }}" method="post"
                                                            class=" dz-form pb-3">
                                                            @csrf
                                                            @if (session()->has('failedmsg'))
                                                                <div class="alert alert-danger alert-dismissible fade show col-10 d-block"
                                                                    role="alert">{{ session('failedmsg') }}
                                                                </div>
                                                            @endif
                                                            <h3 class="form-title m-t0 text-center"
                                                                style="color: white">
                                                                Sign up your account</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="mb-1"><strong>Sponsor
                                                                        Id</strong></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Sponsor Id " name="sponsor"
                                                                    id="sponsor"
                                                                    value="{{ $sdata != '1' ? $sdata : '' }}" />
                                                                <span id="sponhtml"></span>
                                                                @error('sponsor')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="mb-1"><strong>Name</strong></label>
                                                                <input type="text" class="form-control"
                                                                    name="name" placeholder="Enter Name">
                                                                @error('name')
                                                                    <span class=" text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="mb-1"><strong>Email</strong></label>
                                                                <input type="email" name="email"
                                                                    class="form-control" placeholder="Enter Email">
                                                                @error('email')
                                                                    <span class=" text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="mb-1"><strong>Mobile</strong></label>
                                                                <input type="text" name="mobile"
                                                                    class="form-control" minlength="10" maxlength="10" placeholder="Enter Mobile">
                                                                @error('mobile')
                                                                    <span class=" text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                    <label class="form-label" for="password">Country</label>
                                                                    <select name="country" class="form-control">
                                                                        <option class="text-dark" value="">Select Country</option>
                                                                        @foreach ($cdata as $country)
                                                                            <option class="text-dark" value="{{ $country['nicename'] }}">
                                                                                {{ $country['nicename'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                @error('country')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="mb-1"><strong>Password</strong></label>
                                                                <input type="password" class="form-control"
                                                                    name="password" placeholder="Enter Password">
                                                                @error('password')
                                                                    <span class=" text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group text-center forget-main mt-4">
                                                                <button type="submit" class="btn btn-primary">Create
                                                                    new
                                                                    Account</button>
                                                                <div class="row mt-3">
                                                                    <div class="col-6">
                                                                        <a href="{{ url('/member') }}"><button
                                                                                class="nav-link m-auto btn tp-btn-light btn-warning forget-tab "
                                                                                id="nav-forget-tab"
                                                                                data-bs-toggle="tab"
                                                                                data-bs-target="#nav-forget"
                                                                                type="button" role="tab"
                                                                                aria-controls="nav-forget"
                                                                                aria-selected="false">SignIn</button></a>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a href="{{ url('/mem-forget-password') }}"><button
                                                                                class="nav-link m-auto btn tp-btn-light btn-primary forget-tab "
                                                                                id="nav-forget-tab"
                                                                                data-bs-toggle="tab"
                                                                                data-bs-target="#nav-forget"
                                                                                type="button" role="tab"
                                                                                aria-controls="nav-forget"
                                                                                aria-selected="false">Forget Password
                                                                                ?</button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </nav>
                                    </div>


                                </div>
                            </div>
                            <div id="mCSB_1_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                                style="display: block;">
                                <div class="mCSB_draggerContainer">
                                    <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                        style="position: absolute; min-height: 0px; display: block; height: 652px; max-height: 643px; top: 0px;">
                                        <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Full Blog Page Contant -->
        </div>
        <!-- Content END-->
    </div>

    <!--**********************************
 Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('user_assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('user_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/deznav-init.js') }}"></script>
    <script src="{{ asset('user_assets/js/custom.js') }}"></script>
    <script src="{{ asset('user_assets/js/demo.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!-- endinject -->
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

            $('#username').on('input', function() {
                var username = $(this).val();
                var token = $('#csrfToken').val();
                if (username.length == 0) {
                    $('#userhtml').html('');
                }
                $.ajax({
                    url: '/getUsername',
                    type: 'POST',
                    data: {
                        'username': username,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        $('#userhtml').html(response['data'])
                    }
                })
            });
        })
    </script>
</body>

</html>
