@extends('member.layouts.main')
@section('title', 'Security Settings')
@section('container')

<style>
    .security-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 24px -2px rgba(17, 28, 67, 0.06);
        overflow: hidden;
        transition: all 0.25s ease;
    }

    .security-card:hover {
        box-shadow: 0 10px 30px -4px rgba(17, 28, 67, 0.1);
        border-color: #cbd5e1;
    }

    .security-card-header {
        padding: 20px 24px;
        background: #ffffff;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .security-card-body {
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
        border-left: none;
        border-right: none;
        padding: 11px 14px;
        font-size: 14px;
        color: #1e293b;
        transition: all 0.2s ease;
    }

    .custom-input-group .form-control:focus {
        background: #ffffff;
        border-color: #6366f1;
        box-shadow: none;
        outline: none;
    }

    .custom-input-group .password-toggle-btn {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-left: none;
        color: #94a3b8;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .custom-input-group .password-toggle-btn:hover {
        color: #334155;
        background: #f1f5f9;
    }

    .security-tips-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 246, 255, 0.85) 100%);
        border: 1px solid #e0e7ff;
        border-radius: 16px;
        padding: 20px 24px;
        box-shadow: 0 4px 16px rgba(99, 102, 241, 0.05);
    }
</style>

<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h1 class="page-title fw-bold fs-20 mb-1" style="color: #111c43;">Security & Passwords</h1>
                <p class="text-muted fs-13 mb-0">Manage your login access credentials and transaction verification passwords</p>
            </div>
            <div class="ms-md-1 ms-0 mt-md-0 mt-2">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}" class="text-primary"><i class="ti ti-home-2 me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item text-muted">Profile</li>
                        <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Security</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <!-- Left Card: Transaction Password Change -->
            <div class="col-xl-6 col-lg-6 col-12">
                @if(session()->has('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-3" role="alert" style="border-radius: 12px; background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.35); color: #065f46;">
                        <i class="bi bi-check-circle-fill fs-18 me-2 text-success"></i>
                        <div class="flex-grow-1">
                            <strong>Success!</strong> {{ session('successMsg') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="security-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header -->
                        <div class="security-card-header">
                            <div class="d-flex align-items-center gap-3">
                                <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(16, 185, 129, 0.25);">
                                    <i class="ti ti-shield-lock fs-20"></i>
                                </span>
                                <div>
                                    <h5 class="fw-bold mb-0 text-dark">Transaction Password</h5>
                                    <small class="text-muted">Protects funds transfers, payouts & withdrawals</small>
                                </div>
                            </div>
                            <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #047857; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 11px; padding: 5px 12px; border-radius: 20px; font-weight: 600;">
                                <i class="ti ti-check me-1"></i> Txn PIN
                            </span>
                        </div>

                        <!-- Body Form -->
                        <div class="security-card-body">
                            <form action="{{ route('txnpassChange') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['id'] }}">

                                <!-- New Transaction Password -->
                                <div class="mb-3">
                                    <label class="form-label fs-13 fw-semibold text-dark">
                                        <i class="ti ti-lock me-1 text-success"></i> New Transaction Password
                                    </label>
                                    <div class="input-group custom-input-group">
                                        <span class="input-group-text"><i class="ti ti-key"></i></span>
                                        <input type="password" class="form-control" name="password" id="newTxnPass" placeholder="Enter new transaction password" minlength="6" required>
                                        <button class="btn password-toggle-btn toggle-password" type="button" data-target="#newTxnPass">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="text-danger fs-12 mt-1"><i class="ti ti-alert-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted fs-11 mt-1 d-block">Minimum 6 characters required</small>
                                </div>

                                <!-- Confirm Transaction Password -->
                                <div class="mb-4">
                                    <label class="form-label fs-13 fw-semibold text-dark">
                                        <i class="ti ti-lock-check me-1 text-success"></i> Confirm Transaction Password
                                    </label>
                                    <div class="input-group custom-input-group">
                                        <span class="input-group-text"><i class="ti ti-shield-check"></i></span>
                                        <input type="password" class="form-control" name="password_confirm" id="confirmTxnPass" placeholder="Re-enter transaction password" minlength="6" required>
                                        <button class="btn password-toggle-btn toggle-password" type="button" data-target="#confirmTxnPass">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                    </div>
                                    @error('password_confirm')
                                        <div class="text-danger fs-12 mt-1"><i class="ti ti-alert-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="pt-2">
                                    <button class="btn btn-success w-100 py-2 fw-semibold shadow-sm" type="submit" style="border-radius: 10px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none;">
                                        <i class="ti ti-shield-check me-1"></i> Update Transaction Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Card: Account Login Password Change -->
            <div class="col-xl-6 col-lg-6 col-12">
                @if(session()->has('successMsg_pass'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-3" role="alert" style="border-radius: 12px; background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.35); color: #065f46;">
                        <i class="bi bi-check-circle-fill fs-18 me-2 text-success"></i>
                        <div class="flex-grow-1">
                            <strong>Success!</strong> {{ session('successMsg_pass') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="security-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header -->
                        <div class="security-card-header">
                            <div class="d-flex align-items-center gap-3">
                                <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.25);">
                                    <i class="ti ti-key fs-20"></i>
                                </span>
                                <div>
                                    <h5 class="fw-bold mb-0 text-dark">Login Password</h5>
                                    <small class="text-muted">Used to sign in to your dashboard account</small>
                                </div>
                            </div>
                            <span class="badge" style="background: rgba(99, 102, 241, 0.15); color: #4f46e5; border: 1px solid rgba(99, 102, 241, 0.35); font-size: 11px; padding: 5px 12px; border-radius: 20px; font-weight: 600;">
                                <i class="ti ti-user-check me-1"></i> Account Access
                            </span>
                        </div>

                        <!-- Body Form -->
                        <div class="security-card-body">
                            <form action="{{ route('passChange') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['id'] }}">

                                <!-- New Password -->
                                <div class="mb-3">
                                    <label class="form-label fs-13 fw-semibold text-dark">
                                        <i class="ti ti-lock me-1 text-primary"></i> New Login Password
                                    </label>
                                    <div class="input-group custom-input-group">
                                        <span class="input-group-text"><i class="ti ti-key"></i></span>
                                        <input type="password" class="form-control" name="password" id="newLoginPass" placeholder="Enter new login password" minlength="6" required>
                                        <button class="btn password-toggle-btn toggle-password" type="button" data-target="#newLoginPass">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="text-danger fs-12 mt-1"><i class="ti ti-alert-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted fs-11 mt-1 d-block">Minimum 6 characters required</small>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <label class="form-label fs-13 fw-semibold text-dark">
                                        <i class="ti ti-lock-check me-1 text-primary"></i> Confirm Login Password
                                    </label>
                                    <div class="input-group custom-input-group">
                                        <span class="input-group-text"><i class="ti ti-shield-check"></i></span>
                                        <input type="password" class="form-control" name="password_confirm" id="confirmLoginPass" placeholder="Re-enter login password" minlength="6" required>
                                        <button class="btn password-toggle-btn toggle-password" type="button" data-target="#confirmLoginPass">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                    </div>
                                    @error('password_confirm')
                                        <div class="text-danger fs-12 mt-1"><i class="ti ti-alert-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="pt-2">
                                    <button class="btn btn-primary w-100 py-2 fw-semibold shadow-sm" type="submit" style="border-radius: 10px; background: linear-gradient(135deg, #111c43 0%, #1e3a8a 100%); border: none;">
                                        <i class="ti ti-device-floppy me-1"></i> Update Login Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Best Practices Recommendation Bar -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="security-tips-card">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="avatar avatar-sm avatar-rounded" style="background: rgba(99, 102, 241, 0.15); color: #6366f1;">
                            <i class="ti ti-bulb fs-16"></i>
                        </span>
                        <h6 class="fw-bold mb-0 text-dark">Account Security Best Practices</h6>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4 col-12">
                            <div class="d-flex align-items-start gap-2">
                                <i class="ti ti-circle-check-filled text-success mt-1 fs-16"></i>
                                <span class="fs-13 text-muted"><strong>Different Passwords:</strong> Keep your Transaction Password different from your Login Password.</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="d-flex align-items-start gap-2">
                                <i class="ti ti-circle-check-filled text-success mt-1 fs-16"></i>
                                <span class="fs-13 text-muted"><strong>Strong Combination:</strong> Use at least 6-8 characters with numbers, symbols, and letters.</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="d-flex align-items-start gap-2">
                                <i class="ti ti-circle-check-filled text-success mt-1 fs-16"></i>
                                <span class="fs-13 text-muted"><strong>Confidentiality:</strong> Never share your passwords or OTPs with anyone, including staff.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButtons = document.querySelectorAll('.toggle-password');
        toggleButtons.forEach(button => {
            button.addEventListener('click', function () {
                const targetSelector = this.getAttribute('data-target');
                const targetInput = document.querySelector(targetSelector);
                const icon = this.querySelector('i');
                if (targetInput) {
                    if (targetInput.type === 'password') {
                        targetInput.type = 'text';
                        icon.classList.remove('ti-eye');
                        icon.classList.add('ti-eye-off');
                    } else {
                        targetInput.type = 'password';
                        icon.classList.remove('ti-eye-off');
                        icon.classList.add('ti-eye');
                    }
                }
            });
        });
    });
</script>

@endsection