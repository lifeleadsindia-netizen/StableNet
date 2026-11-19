@extends('member.layouts.main')
@section('title', 'Wallet Address')
@section('container')



    <!--**********************************
                                                                Content body start
                                                            ***********************************-->
    <div class="main-content app-content">
        <!-- row -->
        <div class="container-fluid">
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Wallet Address</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wallet Address</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
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
                    <div class="card profile-card card-bx m-b30">
                        <div class="card-header">
                            <h6 class="title text-primary mt-2"><b>Add New USDT Wallet Address To Receive Profits.</b></h6>
                        </div>
                        {{-- @if ($data['wallet_address'] == '') --}}
                        <form action="{{ route('insertWalletAddress') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body mb-3 mt-4 text-center">
                                {{ session()->get('walletaddress_otp') }}
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">One Time Password</label>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3 ">
                                            <input type="text" class="form-control" name="walletaddress_otp"
                                                placeholder="Enter One Time Password" required>
                                            <a href="{{ url('/member/send-wallet-address-otp') }}" class="btn btn-primary"
                                                type="button">Send OTP</a>
                                        </div>
                                    </div>
                                    @error('walletaddress_otp')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                @if (session()->has('walletaddress_otp'))
                                    <div class="mb-3 row pb-2">
                                        <label class="col-sm-3 col-form-label">Wallet Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Enter Wallet Address" class="form-control"
                                                name="wallet_address" value="{{ $data['wallet_address'] }}" required>
                                        </div>
                                        @error('wallet_address')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input type="hidden" value="{{ $data['id'] }}" name="id">
                                    <button class="btn btn-primary float-right" type="submit">Submit</button>
                                @else
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Wallet Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $data['wallet_address'] }}" class="form-control"
                                                name="wallet_address" readonly>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
                                                                Content body end
                                                            ***********************************-->


@endsection
