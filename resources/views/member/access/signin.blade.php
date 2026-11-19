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
    	<link rel="shortcut icon" href="{{asset('f_assets/images/favicon.png')}}">


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
                    <source src="{{asset('logo/bg.mp4')}}" type="video/mp4">
                </video>
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 pt-5">
                        <div class="mt-5">
                            <div id="mCSB_1_container" class="mCSB_container" dir="ltr">
                                <div class="login-form style-2 card mt-5" style="background-color: rgba(0, 0, 0, 0.5)">
                                    <div class="card-body ">
                                        <div class="text-center my-3 ">
                                            <img src="{{asset('f_assets/images/logo-full-white.png')}}" width="150" alt=""
                                                class="text-center ">
                                        </div>

                                        <nav>
                                            <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">

                                                <div class="tab-content w-100" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-personal"
                                                        role="tabpanel" aria-labelledby="nav-personal-tab">
                                                        <form action="{{ route('userLogin') }}" method="post"
                                                            class=" dz-form pb-3">
                                                            @csrf
                                                            <h3 class="form-title m-t0 text-center" style="color: white">
                                                                {{ config('detailsApp.name') }} Login</h3>
                                                            @if (session()->has('failedmsg'))
                                                                <div class="text-center alert alert-danger alert-dismissible fade show col-12 d-block"
                                                                    role="alert">{{ session('failedmsg') }}
                                                                </div>
                                                            @endif
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner"></div>
                                                            </div>
                                                            <p class="text-center">Enter your MemberId and your
                                                                password. </p>
                                                            <div class="form-group mb-3">
                                                                <label class="text-left">Memberid</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter your MemberId" name="memberid">
                                                                @error('memberid')
                                                                    <span
                                                                        class="small text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="text-left">Password</label>
                                                                <input type="password" class="form-control"
                                                                    placeholder="Enter your Password" name="password">
                                                                @error('password')
                                                                    <span
                                                                        class="small text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group text-center forget-main">
                                                                <button type="submit" class="btn btn-primary">Sign Me
                                                                    In</button>
                                                                <div class="row mt-3">
                                                                    <div class="col-6">
                                                                        <a href="{{ url('/member/register/1') }}"><button
                                                                                class="nav-link m-auto btn tp-btn-light btn-warning forget-tab "
                                                                                id="nav-forget-tab" data-bs-toggle="tab"
                                                                                data-bs-target="#nav-forget"
                                                                                type="button" role="tab"
                                                                                aria-controls="nav-forget"
                                                                                aria-selected="false">Create new
                                                                                Account</button></a>
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
</body>

</html>
