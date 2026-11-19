@extends('member.layouts.main')
@section('title', 'Member Summary')
@section('container')

    <style>
        .card {
            background-image: url({{ asset('images/capture6.PNG') }});
        }
    </style>


    <!--**********************************
                        Content body start
                    ***********************************-->
        <div class="main-content app-content">
            <!-- row -->
			<div class="container-fluid">
				<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Member Summary</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Member Summary</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- row -->


            <div class="d-sm-flex align-items-top p-4 mb-4 border-bottom-0 main-profile-cover">
                <div>
                    <span class="avatar avatar-xxl avatar-rounded online me-3">
                        @if ($data['profile_image'] == '')
                            <img class="img-fluid rounded-circle" width="70px" src="{{ asset('uploads/avatar.jpg') }}"
                                alt="">
                        @else
                            <img class="img-fluid rounded-circle" width="70x"
                                src="{{ asset('uploads') }}/{{ $data['profile_image'] }}" alt="">
                        @endif
                    </span>
                </div>
                <div class="flex-fill main-profile-info">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold mb-1 text-fixed-white">{{ $data['name'] }}</h6>
                        <button class="btn btn-light btn-wave waves-effect waves-light">
                            {{ $data['memberid'] }}</button>
                    </div>
                    <p class="mb-1 text-muted text-fixed-white op-7">{{ $data['email'] }}</p>
                    <p class="fs-12 text-fixed-white mb-4 op-5"> <span class="me-3"><i
                                class="ri-building-line me-1 align-middle"></i>{{ $data['mobile'] }}</span>
                        {{-- <span><i class="ri-map-pin-line me-1 align-middle"></i>Washington D.C</span>  --}}
                    </p>
                    {{-- <div class="d-flex mb-0">
                        <div class="me-4">
                            <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0">113</p>
                            <p class="mb-0 fs-11 op-5 text-fixed-white">Projects</p>
                        </div>
                        <div class="me-4">
                            <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0">12.2k</p>
                            <p class="mb-0 fs-11 op-5 text-fixed-white">Followers</p>
                        </div>
                        <div class="me-4">
                            <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0">128</p>
                            <p class="mb-0 fs-11 op-5 text-fixed-white">Following</p>
                        </div>
                    </div> --}}
                </div>
            </div>

            @if (session()->has('successMsg'))
                <div class="alert alert-success" role="alert">
                    {{ session('successMsg') }}
                </div>
            @endif
            @if (session()->has('failedMsg'))
                <div class="alert alert-danger" role="alert">
                    {{ session('failedMsg') }}
                </div>
            @endif
            <form class="profile-form" action="{{ route('insertProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-4  col-lg-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <h4 class="card-title">Name</h4>
                                <input class="form-control" type="text" name="name" value="{{ $data['name'] }}">
                                <div class="progress my-3">
                                    <div class="progress-bar progress-animated bg-primary" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-lg-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <h4 class="card-title">Email</h4>
                                <input class="form-control" type="text" name="email" value="{{ $data['email'] }}">
                                <div class="progress my-3">
                                    <div class="progress-bar progress-animated bg-danger" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-lg-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="card-title">Mobile</h4>
                                        <input class="form-control" type="text" name="mobile"
                                            value="{{ $data['mobile'] }}" minlength="10" maxlength="10">
                                    </div>
                                </div>
                                <div class="progress my-3">
                                    <div class="progress-bar progress-animated bg-warning" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-lg-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <h4 class="card-title">Gender</h4>
                                <input class="form-control" type="text" name="gender" value="{{ $data['gender'] }}">
                                <div class="progress my-3">
                                    <div class="progress-bar progress-animated bg-primary" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-lg-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <h4 class="card-title">Date of Birth</h4>
                                <input class="form-control" type="date" name="dob" value="{{ $data['dob'] }}">
                                <div class="progress my-3">
                                    <div class="progress-bar progress-animated bg-danger" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-lg-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <h4 class="card-title">Country</h4>
                                <input class="form-control" type="text" name="country"
                                    value="{{ $data['country'] }}">
                                <div class="progress my-3">
                                    <div class="progress-bar progress-animated bg-warning" style="width: 30%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12  col-lg-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <h4 class="card-title">Profile Image</h4>
                                <input type="file" class="form-control" value="{{ $data['profile_image'] }}"
                                    name="profile_image">
                                <div class="progress my-3">
                                    <div class="progress-bar progress-animated bg-success" style="width: 30%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<button class="btn btn-primary" id="profile_button">Update</button>-->
                    <div class="col-xl-12  col-lg-12 col-sm-12 my-2 text-center">
                        <input class="form-control" type="hidden" name="id" value="{{ $data['id'] }}">
                        <input class="form-control" type="hidden" id="ustatus" name="status"
                            value="{{ $data['status'] }}">
                        <button class="btn btn-primary" id="profile_button">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--**********************************
                        Content body end
                    ***********************************-->


@endsection
