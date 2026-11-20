@extends('member.layouts.main')
@section('title', 'Wallet Address')
@section('container')

<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Wallet Address</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item text-muted">Profile</li>
                        <li class="breadcrumb-item active" aria-current="page">Wallet Address</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-8 col-md-10 col-12">
                @if (session()->has('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('successMsg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('failedMsg'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('failedMsg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Add New USDT Wallet Address To Receive Profits
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('insertWalletAddress') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $data['id'] }}" name="id">

                            <!-- One Time Password -->
                            <div class="mb-3">
                                <label class="form-label">One Time Password</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="walletaddress_otp" placeholder="Enter One Time Password" required>
                                    <a href="{{ url('/member/send-wallet-address-otp') }}" class="btn btn-primary" type="button">
                                        Send OTP
                                    </a>
                                </div>
                                @error('walletaddress_otp')
                                    <span class="text-danger fs-12 d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Wallet Address -->
                            @if (session()->has('walletaddress_otp'))
                                <div class="mb-3">
                                    <label class="form-label">Wallet Address</label>
                                    <input type="text" placeholder="Enter Wallet Address" class="form-control" name="wallet_address" value="{{ $data['wallet_address'] }}" required>
                                    @error('wallet_address')
                                        <span class="text-danger fs-12 d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary px-4" type="submit">Submit</button>
                                </div>
                            @else
                                <div class="mb-3">
                                    <label class="form-label">Wallet Address</label>
                                    <input type="text" value="{{ $data['wallet_address'] }}" class="form-control" name="wallet_address" readonly placeholder="Enter Wallet Address">
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection