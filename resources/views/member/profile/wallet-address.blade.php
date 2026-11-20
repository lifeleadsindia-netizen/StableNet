@extends('member.layouts.main')
@section('title', 'Wallet Address')
@section('container')

<style>
    .wallet-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 24px -2px rgba(17, 28, 67, 0.06);
        overflow: hidden;
        transition: all 0.25s ease;
    }

    .wallet-card:hover {
        box-shadow: 0 10px 30px -4px rgba(17, 28, 67, 0.1);
        border-color: #cbd5e1;
    }

    .wallet-card-header {
        padding: 20px 24px;
        background: #ffffff;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .wallet-card-body {
        padding: 24px;
    }

    .custom-input-group .input-group-text {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-right: none;
        color: #64748b;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .custom-input-group .form-control {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 11px 14px;
        font-size: 14px;
        color: #1e293b;
        transition: all 0.2s ease;
    }

    .custom-input-group .form-control:focus {
        background: #ffffff;
        border-color: #0284c7;
        box-shadow: none;
        outline: none;
    }

    .status-preview-box {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    .notice-card {
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
        border: 1px solid #fde68a;
        border-radius: 14px;
        padding: 18px 20px;
    }
</style>

<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h1 class="page-title fw-bold fs-20 mb-1" style="color: #111c43;">Payout Wallet Address</h1>
                <p class="text-muted fs-13 mb-0">Configure your USDT crypto wallet address to receive profits and automated withdrawals</p>
            </div>
            <div class="ms-md-1 ms-0 mt-md-0 mt-2">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}" class="text-primary"><i class="ti ti-home-2 me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item text-muted">Profile</li>
                        <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Wallet Address</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Flash Messages -->
        @if (session()->has('successMsg'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4" role="alert" style="border-radius: 12px; background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.35); color: #065f46;">
                <i class="bi bi-check-circle-fill fs-18 me-2 text-success"></i>
                <div class="flex-grow-1">
                    <strong>Success!</strong> {{ session('successMsg') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('failedMsg'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-4" role="alert" style="border-radius: 12px; background: rgba(239, 68, 68, 0.12); border: 1px solid rgba(239, 68, 68, 0.35); color: #991b1b;">
                <i class="bi bi-exclamation-triangle-fill fs-18 me-2 text-danger"></i>
                <div class="flex-grow-1">
                    <strong>Notice:</strong> {{ session('failedMsg') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4 mb-4">
            <!-- Left Column: Form -->
            <div class="col-xl-7 col-lg-7 col-12">
                <div class="wallet-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header -->
                        <div class="wallet-card-header">
                            <div class="d-flex align-items-center gap-3">
                                <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(2, 132, 199, 0.25);">
                                    <i class="ti ti-wallet fs-20"></i>
                                </span>
                                <div>
                                    <h5 class="fw-bold mb-0 text-dark">Update USDT Address</h5>
                                    <small class="text-muted">Two-step email OTP verification required</small>
                                </div>
                            </div>
                            @if (!empty($data['wallet_address']))
                                <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #047857; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 11px; padding: 5px 12px; border-radius: 20px; font-weight: 600;">
                                    <i class="ti ti-check me-1"></i> Active
                                </span>
                            @else
                                <span class="badge" style="background: rgba(245, 158, 11, 0.15); color: #b45309; border: 1px solid rgba(245, 158, 11, 0.35); font-size: 11px; padding: 5px 12px; border-radius: 20px; font-weight: 600;">
                                    <i class="ti ti-alert-triangle me-1"></i> Not Set
                                </span>
                            @endif
                        </div>

                        <!-- Body Form -->
                        <div class="wallet-card-body">
                            <form action="{{ route('insertWalletAddress') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $data['id'] }}" name="id">

                                <!-- Step 1: One-Time Password -->
                                <div class="mb-4">
                                    <label class="form-label fs-13 fw-semibold text-dark d-flex align-items-center justify-content-between">
                                        <span><i class="ti ti-shield-check text-primary me-1"></i> Step 1: Email One-Time Password (OTP)</span>
                                        <small class="text-muted">Registered: {{ !empty($data['email']) ? substr($data['email'], 0, 3) . '***@' . (explode('@', $data['email'])[1] ?? 'mail') : 'N/A' }}</small>
                                    </label>
                                    <div class="input-group custom-input-group">
                                        <span class="input-group-text"><i class="ti ti-key"></i></span>
                                        <input type="text" class="form-control" name="walletaddress_otp" placeholder="Enter 6-digit OTP code" required style="border-right: none;">
                                        <a href="{{ url('/member/send-wallet-address-otp') }}" class="btn btn-primary px-3 d-flex align-items-center fw-semibold" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); border: none;">
                                            <i class="ti ti-send me-1"></i> Send OTP
                                        </a>
                                    </div>
                                    @error('walletaddress_otp')
                                        <div class="text-danger fs-12 mt-1"><i class="ti ti-alert-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted fs-11 mt-1 d-block">
                                        Click <strong>Send OTP</strong> to generate and receive a security code on your registered email.
                                    </small>
                                </div>

                                <!-- Step 2: Wallet Address -->
                                <div class="mb-4">
                                    <label class="form-label fs-13 fw-semibold text-dark">
                                        <i class="ti ti-currency-dollar text-success me-1"></i> Step 2: USDT Wallet Address
                                    </label>

                                    @if (session()->has('walletaddress_otp'))
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text"><i class="ti ti-link"></i></span>
                                            <input type="text" placeholder="Paste your USDT wallet address here" class="form-control" name="wallet_address" value="{{ $data['wallet_address'] }}" required style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                                        </div>
                                        @error('wallet_address')
                                            <div class="text-danger fs-12 mt-1"><i class="ti ti-alert-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                        <small class="text-success fs-12 mt-1 d-block fw-semibold">
                                            <i class="ti ti-lock-open me-1"></i> OTP verified in session! You can now update and save your wallet address.
                                        </small>

                                        <div class="pt-3">
                                            <button class="btn btn-primary w-100 py-2 fw-semibold shadow-sm" type="submit" style="border-radius: 10px; background: linear-gradient(135deg, #111c43 0%, #1e3a8a 100%); border: none;">
                                                <i class="ti ti-device-floppy me-1"></i> Save Wallet Address
                                            </button>
                                        </div>
                                    @else
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text"><i class="ti ti-link"></i></span>
                                            <input type="text" value="{{ $data['wallet_address'] }}" class="form-control" name="wallet_address" id="currentWalletInput" readonly placeholder="No wallet address configured" style="border-right: none;">
                                            @if (!empty($data['wallet_address']))
                                                <button class="btn btn-light border" type="button" id="copyWalletBtn" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;" title="Copy Wallet Address">
                                                    <i class="ti ti-copy" id="copyWalletIcon"></i>
                                                </button>
                                            @endif
                                        </div>
                                        <div class="d-flex align-items-center gap-1 mt-2 text-muted fs-12">
                                            <i class="ti ti-lock text-warning"></i>
                                            <span>Address field is locked. To modify it, please enter the OTP sent to your email.</span>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Status & Security Guidelines -->
            <div class="col-xl-5 col-lg-5 col-12">
                <div class="d-flex flex-column gap-4">
                    <!-- Current Configured Wallet Preview -->
                    <div class="status-preview-box">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge" style="background: rgba(2, 132, 199, 0.15); color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.3); font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 600;">
                                <i class="ti ti-shield-check me-1"></i> Verified Destination
                            </span>
                            <span class="text-muted fs-11">USDT (TRC-20 / BEP-20)</span>
                        </div>

                        <span class="d-block text-muted fs-12 mb-1">Current Payout Address:</span>
                        @if (!empty($data['wallet_address']))
                            <div class="p-3 bg-white rounded-3 border mb-3">
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <span class="fw-bold text-dark fs-13 font-monospace text-break user-select-all" id="savedWalletText">{{ $data['wallet_address'] }}</span>
                                    <button class="btn btn-sm btn-outline-primary flex-shrink-0" id="quickCopyBtn" type="button" title="Copy to clipboard">
                                        <i class="ti ti-copy me-1"></i> Copy
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="p-3 bg-white rounded-3 border mb-3 text-center">
                                <i class="ti ti-wallet-off text-muted fs-24 mb-1 d-block"></i>
                                <span class="text-muted fs-13">No payout wallet address saved yet</span>
                            </div>
                        @endif

                        <div class="d-flex align-items-center justify-content-between text-muted fs-12 pt-2 border-top">
                            <span>KYC / Verification Status:</span>
                            <span class="fw-semibold text-dark">{{ $data['kyc_status'] ?? 'Submitted' }}</span>
                        </div>
                    </div>

                    <!-- Security Notice Box -->
                    <div class="notice-card">
                        <div class="d-flex align-items-center gap-2 mb-2 text-warning-emphasis">
                            <i class="ti ti-alert-triangle-filled fs-18"></i>
                            <h6 class="fw-bold mb-0">Important Crypto Security Advice</h6>
                        </div>
                        <ul class="fs-12 text-muted mb-0 ps-3" style="line-height: 1.6;">
                            <li class="mb-1">Always double-check your recipient wallet address before saving.</li>
                            <li class="mb-1">StableNet withdrawals are processed automatically to this configured destination.</li>
                            <li class="mb-1">Transactions sent to an incorrect address on the blockchain <strong>cannot be cancelled or refunded</strong>.</li>
                            <li>Never share your email OTP or login credentials with anyone.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function copyText(text, btnElement, originalHtml) {
            navigator.clipboard.writeText(text).then(function() {
                btnElement.innerHTML = '<i class="ti ti-check text-success"></i> Copied!';
                setTimeout(function() {
                    btnElement.innerHTML = originalHtml;
                }, 2000);
            });
        }

        const quickCopyBtn = document.getElementById('quickCopyBtn');
        const savedWalletText = document.getElementById('savedWalletText');
        if (quickCopyBtn && savedWalletText) {
            quickCopyBtn.addEventListener('click', function() {
                copyText(savedWalletText.innerText.trim(), quickCopyBtn, '<i class="ti ti-copy me-1"></i> Copy');
            });
        }

        const copyWalletBtn = document.getElementById('copyWalletBtn');
        const currentWalletInput = document.getElementById('currentWalletInput');
        if (copyWalletBtn && currentWalletInput) {
            copyWalletBtn.addEventListener('click', function() {
                copyText(currentWalletInput.value.trim(), copyWalletBtn, '<i class="ti ti-copy"></i>');
            });
        }
    });
</script>

@endsection