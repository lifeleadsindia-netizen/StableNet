@extends('admin.layouts.main')
@section('title', 'Profile Section')
@section('container')

    <!-- push external head elements to head -->


    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Change Profile Details</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Profile Details</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-7">
                    @if (session()->has('passMsg'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('passMsg') }}
                        </div>
                    @endif
                    
                    <div class="card custom-card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Change Email') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('changeEmail') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-12 my-2">
                                    <label class="mb-2">New Email </label>
                                    <input type="email" class="form-control" name="email" id="exampleInputName1"
                                        placeholder="Enter New Email" value="{{ $admin['email'] }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary float-end my-2">Change Email</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card custom-card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Change Password') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('changePassword') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-12 mb-3 mt-2">
                                    <label class="mb-2">New Password </label>
                                    <input type="password" class="form-control" name="password" id="exampleInputName1"
                                        placeholder="Enter Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12 my-2">
                                    <label class="mb-2">Retype Password </label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="exampleInputName1" placeholder="Retype Password">
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary float-end my-2">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- push external js -->
    <!-- push external js -->
    @push('script')
        <script src="{{ asset('adm_assets/assets/plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/plugins/flot-charts/jquery.flot.js') }}"></script>
        <!-- <script src="{{ asset('adm_assets/assets/plugins/flot-charts/jquery.flot.categories.js') }}"></script> -->
        <script src="{{ asset('plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <script src="{{ asset('adm_assets/assets/plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/plugins/amcharts/serial.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/plugins/amcharts/themes/light.js') }}"></script>


        <script src="{{ asset('adm_assets/assets/js/widget-statistic.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/js/widget-data.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/js/dashboard-charts.js') }}"></script>
    @endpush
@endsection
