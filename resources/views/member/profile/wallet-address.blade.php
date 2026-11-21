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
                                @if (session()->has('walletaddress_otp'))
                                    <div class="mb-2 p-2 px-3 rounded d-flex align-items-center justify-content-between" style="background: rgba(99, 102, 241, 0.1); border: 1px dashed #6366f1;">
                                        <span class="text-primary fw-semibold fs-13">
                                            <i class="fe fe-key me-1"></i> Testing OTP: <strong class="fs-16 text-dark ms-1">{{ session('walletaddress_otp') }}</strong>
                                        </span>
                                        <span class="badge bg-primary fs-11">Testing Mode</span>
                                    </div>
                                @endif
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
                            @if (!empty($data['wallet_address']))
                                <div class="mb-3">
                                    <label class="form-label">Wallet Address</label>
                                    <div class="input-group">
                                        <input type="text" id="walletAddressInput" value="{{ $data['wallet_address'] }}" class="form-control" name="wallet_address" readonly placeholder="Enter Wallet Address">
                                        <button class="btn btn-primary d-flex align-items-center" type="button" id="copyWalletBtn">
                                            <i class="fe fe-copy me-1" id="copyIcon"></i> <span id="copyBtnText">Copy</span>
                                        </button>
                                    </div>
                                    @error('wallet_address')
                                        <span class="text-danger fs-12 d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            @elseif (session()->has('walletaddress_otp'))
                                <div class="mb-3">
                                    <label class="form-label">Wallet Address</label>
                                    <input type="text" id="walletAddressInput" placeholder="Enter Wallet Address" class="form-control" name="wallet_address" value="{{ $data['wallet_address'] }}" required>
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
                                    <input type="text" id="walletAddressInput" value="{{ $data['wallet_address'] }}" class="form-control" name="wallet_address" readonly placeholder="Enter Wallet Address">
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const copyBtn = document.getElementById('copyWalletBtn');
        const input = document.getElementById('walletAddressInput');
        const copyIcon = document.getElementById('copyIcon');
        const copyBtnText = document.getElementById('copyBtnText');

        if (copyBtn && input) {
            copyBtn.addEventListener('click', function () {
                input.select();
                input.setSelectionRange(0, 99999);
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(input.value).then(function () {
                        copyBtnText.innerText = 'Copied!';
                        copyIcon.className = 'fe fe-check me-1';
                        copyBtn.classList.remove('btn-primary');
                        copyBtn.classList.add('btn-success');
                        setTimeout(function () {
                            copyBtnText.innerText = 'Copy';
                            copyIcon.className = 'fe fe-copy me-1';
                            copyBtn.classList.remove('btn-success');
                            copyBtn.classList.add('btn-primary');
                        }, 2000);
                    }).catch(function () {
                        fallbackCopy();
                    });
                } else {
                    fallbackCopy();
                }

                function fallbackCopy() {
                    document.execCommand('copy');
                    copyBtnText.innerText = 'Copied!';
                    copyIcon.className = 'fe fe-check me-1';
                    copyBtn.classList.remove('btn-primary');
                    copyBtn.classList.add('btn-success');
                    setTimeout(function () {
                        copyBtnText.innerText = 'Copy';
                        copyIcon.className = 'fe fe-copy me-1';
                        copyBtn.classList.remove('btn-success');
                        copyBtn.classList.add('btn-primary');
                    }, 2000);
                }
            });
        }
    });
</script>

@endsection