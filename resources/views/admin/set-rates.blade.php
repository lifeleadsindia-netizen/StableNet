@extends('admin.layouts.main')
@section('title', 'Set Rates')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Set Rates</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Set Rates</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-md-6">
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                    @if (session()->has('successMsg'))
                        <div class="alert alert-primary">{{ session('successMsg') }}</div>
                    @endif
                    <div class="card custom-card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Set Rates Update Form') }}</h4>
                        </div>
                        <div class="card-body px-5">
                            <form action="{{ route('rateUpdate') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label">Package 1</label>
                                    <input type="text" class="form-control" name="package1" value="{{ $data['rate'] }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Package 2</label>
                                    <input type="text" class="form-control" name="package2"
                                        value="{{ $data['rate_1'] }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Package 3</label>
                                    <input type="text" class="form-control" name="package3"
                                        value="{{ $data['rate_2'] }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Package 4</label>
                                    <input type="text" class="form-control" name="package4"
                                        value="{{ $data['rate_3'] }}">
                                </div>

                                <div>
                                    <button class="btn btn-primary float-end mb-2">Update Rate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
