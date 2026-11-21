@extends('admin.layouts.main')
@section('title', 'Add Funds')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header Banner with Highlighted Background -->
            <div class="row mb-4 mt-2">
                <div class="col-12">
                    <div class="card custom-card page-highlight-header mb-0">
                        <div class="card-body p-4">
                            <div class="d-md-flex d-block align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="header-icon-box me-3">
                                        <span class="avatar avatar-lg avatar-rounded avatar-emerald">
                                            <i class="bx bx-plus-circle fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h4 class="fw-bold mb-0 text-dark">Add Funds</h4>
                                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                Wallet Credit
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">Credit funds directly into a member's Main Wallet or P2P Fund Wallet</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-3">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-primary"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item text-muted">Funds Management</li>
                                            <li class="breadcrumb-item active text-muted" aria-current="page">Add Funds</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts Section -->
            @if (session()->has('failedMsg'))
                <div class="alert custom-alert custom-alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-error-circle fs-20 me-2 text-danger"></i>
                        <span><strong>Failed:</strong> {{ session('failedMsg') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('successMsg'))
                <div class="alert custom-alert custom-alert-success alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-check-circle fs-20 me-2 text-success"></i>
                        <span><strong>Success!</strong> {{ session('successMsg') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Main Form Card & Side Info -->
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <div class="card custom-card card-heavy">
                        <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded avatar-emerald me-2">
                                    <i class="bx bx-wallet fs-16"></i>
                                </span>
                                <div>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-15">Credit Member Wallet</h5>
                                    <small class="text-muted fs-11">Enter member details and fund transfer specifications</small>
                                </div>
                            </div>
                            <span class="badge bg-emerald-subtle text-emerald border border-emerald-subtle rounded-pill px-3 py-1 fs-11 fw-semibold">
                                <i class="bx bx-shield-quarter me-1"></i>Secure Transfer
                            </span>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('addMemFunds') }}" method="post" id="addFundsForm">
                                @csrf

                                <!-- Member ID with Live Verification -->
                                <div class="mb-4">
                                    <label class="form-label-custom fw-semibold mb-1 d-flex justify-content-between align-items-center">
                                        <span><i class="bx bx-user text-primary me-1"></i> Member ID <span class="text-danger">*</span></span>
                                        <span id="memMsg" class="fs-12 fw-semibold"></span>
                                    </label>
                                    <div class="input-group filter-input-group">
                                        <span class="input-group-text"><i class="bx bx-id-card fs-16"></i></span>
                                        <input type="text" class="form-control" name="memberid" id="memberid"
                                            placeholder="Enter Member ID (e.g. SC1234567)"
                                            value="{{ old('memberid') }}" required autofocus autocomplete="off">
                                    </div>
                                    @error('memberid')
                                        <div class="text-danger fs-12 mt-1"><i class="bx bx-error me-1"></i>{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted fs-11 mt-1 d-block">Start typing Member ID to verify member name instantly.</small>
                                </div>

                                <!-- Wallet Type Selection -->
                                <div class="mb-4">
                                    <label class="form-label-custom fw-semibold mb-1">
                                        <i class="bx bx-wallet text-primary me-1"></i> Destination Wallet <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group filter-input-group">
                                        <span class="input-group-text"><i class="bx bx-credit-card fs-16"></i></span>
                                        <select class="form-select" name="wallet_type" required>
                                            <option value="">-- Select Destination Wallet --</option>
                                            <option value="Wallet" {{ old('wallet_type') == 'Wallet' ? 'selected' : '' }}>
                                                Main Wallet (Standard User Wallet)
                                            </option>
                                            <option value="Fund Wallet" {{ old('wallet_type') == 'Fund Wallet' ? 'selected' : '' }}>
                                                P2P Wallet (Fund Transfer Wallet)
                                            </option>
                                        </select>
                                    </div>
                                    @error('wallet_type')
                                        <div class="text-danger fs-12 mt-1"><i class="bx bx-error me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Amount Input -->
                                <div class="mb-4">
                                    <label class="form-label-custom fw-semibold mb-1">
                                        <i class="bx bx-dollar-circle text-primary me-1"></i> Amount (USD) <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group filter-input-group">
                                        <span class="input-group-text"><i class="bx bx-dollar fs-16"></i></span>
                                        <input type="number" step="any" min="0.01" class="form-control" name="amount"
                                            placeholder="Enter amount to credit (e.g. 100.00)"
                                            value="{{ old('amount') }}" required>
                                    </div>
                                    @error('amount')
                                        <div class="text-danger fs-12 mt-1"><i class="bx bx-error me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">

                                <!-- Submit & Reset Buttons -->
                                <div class="d-flex align-items-center justify-content-end gap-2 pt-2 border-top">
                                    <button type="reset" class="btn btn-light border px-4 py-2">
                                        <i class="bx bx-reset me-1"></i> Reset
                                    </button>
                                    <button type="submit" class="btn btn-signin px-4 py-2 d-inline-flex align-items-center gap-1"
                                        onclick="return confirm('Are you sure you want to credit this fund to the member?');">
                                        <i class="bx bx-check-circle fs-16"></i> Credit Funds Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Info Card & Instructions -->
                <div class="col-xl-5 col-lg-4">
                    <div class="card custom-card card-heavy mb-4">
                        <div class="card-header border-bottom py-3 px-4 bg-white">
                            <h6 class="fw-bold text-dark mb-0 fs-14 d-flex align-items-center gap-2">
                                <i class="bx bx-info-circle text-primary fs-18"></i> Transfer Guidelines
                            </h6>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-3 fs-13 text-muted">
                                <li class="d-flex align-items-start gap-2">
                                    <i class="bx bx-check-circle text-success fs-18 mt-0.5"></i>
                                    <div>
                                        <strong class="text-dark d-block">Instant Credit:</strong>
                                        Transferred funds reflect in the member's wallet balance immediately after submission.
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-2">
                                    <i class="bx bx-check-circle text-success fs-18 mt-0.5"></i>
                                    <div>
                                        <strong class="text-dark d-block">Audited & Logged:</strong>
                                        Every fund addition is automatically tracked under <a href="{{ url('admin/funds/add-funds-details') }}" class="text-primary fw-semibold">Funds Details</a>.
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-2">
                                    <i class="bx bx-check-circle text-success fs-18 mt-0.5"></i>
                                    <div>
                                        <strong class="text-dark d-block">Wallet Compatibility:</strong>
                                        Choose <strong>Main Wallet</strong> for ROI and withdrawals or <strong>P2P Wallet</strong> for activation packages.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Quick Navigation Card -->
                    <div class="card custom-card card-heavy">
                        <div class="card-body p-4 d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-bold text-dark mb-1 fs-14">Need to Deduct Funds?</h6>
                                <p class="text-muted fs-12 mb-0">Debit or adjust member wallet balance directly</p>
                            </div>
                            <a href="{{ url('admin/funds/deduct-funds') }}" class="btn btn-sm btn-outline-danger px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1">
                                <i class="bx bx-minus-circle"></i> Deduct Funds
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Live Member Verification Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const memberInput = document.getElementById('memberid');
            const msgBox = document.getElementById('memMsg');
            const csrfToken = document.getElementById('csrf').value;

            if (memberInput && msgBox) {
                let debounceTimer;
                memberInput.addEventListener('input', function() {
                    const memberid = this.value.trim();
                    clearTimeout(debounceTimer);

                    if (memberid.length < 2) {
                        msgBox.innerHTML = '';
                        return;
                    }

                    debounceTimer = setTimeout(() => {
                        msgBox.innerHTML = '<span class="text-muted"><i class="bx bx-loader-alt bx-spin"></i> Checking...</span>';
                        fetch('/getMember', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: 'memberid=' + encodeURIComponent(memberid) + '&_token=' + encodeURIComponent(csrfToken)
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data && data.data) {
                                msgBox.innerHTML = '<span class="text-success"><i class="bx bx-check-circle me-1"></i>' + data.data + '</span>';
                            } else {
                                msgBox.innerHTML = '<span class="text-danger"><i class="bx bx-x-circle me-1"></i>Member Not Found</span>';
                            }
                        })
                        .catch(() => {
                            msgBox.innerHTML = '';
                        });
                    }, 300);
                });
            }
        });
    </script>
@endsection
