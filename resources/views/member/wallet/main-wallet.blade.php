@extends('member.layouts.main')
@section('title', 'Main Wallet')
@section('container')

    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h1 class="page-title fw-semibold fs-18 mb-1">Main Wallet</h1>
                    <p class="text-muted fs-12 mb-0">Manage your income wallet balance and request instant crypto withdrawals</p>
                </div>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Wallet</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Main Wallet</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session()->has('successMsg'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
                    <i class="ri-checkbox-circle-fill fs-5 me-2"></i>
                    <div>{{ session('successMsg') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('failedMsg'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
                    <i class="ri-error-warning-fill fs-5 me-2"></i>
                    <div>{{ session('failedMsg') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @php
                $walletBalance = (float) ($data['wallet'] ?? 0);
                $memberTotalIncome = totalIncome($data['memberid']);
                $memberTotalWithdrawal = totalWithdrawals($data['memberid']);
                $memberTodayWithdrawal = todayWithdrawals($data['memberid']);
            @endphp

            <!-- Top Summary Stat Cards in Light Gradient -->
            <div class="row g-3 mb-4">
                <!-- Available Income Wallet -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #047857; letter-spacing: 0.5px;">
                                    Income Wallet
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(16, 185, 129, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-wallet-3-line fs-18 text-success"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format($walletBalance, 2) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(16, 185, 129, 0.15); color: #065f46; border-radius: 6px;">
                                    Available for Payout
                                </span>
                                <span class="text-muted fs-11">Live Balance</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Earned Income -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #0369a1; letter-spacing: 0.5px;">
                                    Total Income
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(14, 165, 233, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-line-chart-line fs-18 text-info"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format($memberTotalIncome, 2) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(14, 165, 233, 0.15); color: #075985; border-radius: 6px;">
                                    All Streams
                                </span>
                                <span class="text-muted fs-11">Cumulative</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Withdrawn -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #6d28d9; letter-spacing: 0.5px;">
                                    Total Withdrawn
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(139, 92, 246, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-hand-coin-line fs-18" style="color: #7c3aed;"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format($memberTotalWithdrawal, 2) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(139, 92, 246, 0.15); color: #5b21b6; border-radius: 6px;">
                                    Completed Payouts
                                </span>
                                <span class="text-muted fs-11">Lifetime</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Withdrawal -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #b45309; letter-spacing: 0.5px;">
                                    Today's Withdrawal
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(245, 158, 11, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-history-line fs-18 text-warning"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format($memberTodayWithdrawal, 2) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(245, 158, 11, 0.15); color: #92400e; border-radius: 6px;">
                                    Last 24 Hours
                                </span>
                                <span class="text-muted fs-11">Daily Log</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content: Form & Guidelines in 2 Columns -->
            <div class="row g-4">
                <!-- Left Column: Withdrawal Request Form -->
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-12">
                    <div class="card custom-card shadow-sm border-0 h-100" style="border-radius: 14px;">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom py-3">
                            <div class="card-title mb-0 d-flex align-items-center">
                                <i class="ri-hand-coin-fill text-primary me-2 fs-18"></i>
                                <span class="fw-bold fs-15">Request Withdrawal</span>
                            </div>
                            <span class="badge bg-primary-transparent fs-12 px-3 py-1.5 rounded-pill">
                                Available: ${{ number_format($walletBalance, 2) }}
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('initWithdrawal') }}" method="post" id="withdrawForm">
                                @csrf

                                <!-- Wallet Type / Source -->
                                <div class="mb-3">
                                    <label class="form-label text-default fw-semibold fs-13">Source Wallet</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="ri-wallet-3-line text-primary"></i></span>
                                        <select class="form-select form-control" name="wallet_type" id="type" required>
                                            <option value="Income Wallet" selected>Income Wallet (${{ number_format($walletBalance, 2) }} Available)</option>
                                        </select>
                                    </div>
                                    @error('wallet_type')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Destination Payout Address -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label class="form-label text-default fw-semibold fs-13 mb-0">Payout Destination (USDT)</label>
                                        <a href="{{ url('member/profile/wallet-address') }}" class="text-primary fs-12 fw-medium">
                                            <i class="ri-edit-line me-0.5"></i> Change Address
                                        </a>
                                    </div>
                                    @if (!empty($data['wallet_address']))
                                        <div class="p-2.5 rounded-3 border d-flex align-items-center justify-content-between" style="background: #f8fafc;">
                                            <div class="d-flex align-items-center overflow-hidden me-2">
                                                <i class="ri-checkbox-circle-fill text-success fs-18 me-2 flex-shrink-0"></i>
                                                <span class="font-monospace fs-12 text-dark text-truncate">{{ $data['wallet_address'] }}</span>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-light border px-2 py-0.5 fs-11 flex-shrink-0"
                                                onclick="navigator.clipboard.writeText('{{ $data['wallet_address'] }}'); this.innerText='Copied!'; setTimeout(() => this.innerText='Copy', 1500);">
                                                Copy
                                            </button>
                                        </div>
                                    @else
                                        <div class="alert alert-warning border border-warning-subtle d-flex align-items-center p-2.5 rounded-3 mb-0 fs-12">
                                            <i class="ri-alert-line fs-16 me-2 text-warning flex-shrink-0"></i>
                                            <div>
                                                <strong>Payout address not configured!</strong> Please <a href="{{ url('member/profile/wallet-address') }}" class="text-dark fw-bold text-decoration-underline">set your USDT wallet address</a> before requesting a withdrawal.
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Amount to Withdraw -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label for="withAmount" class="form-label text-default fw-semibold fs-13 mb-0">Withdrawal Amount ($)</label>
                                        <span class="text-muted fs-11">Min: $1.00 &bull; Platform Fee: 15%</span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light fw-bold text-dark">$</span>
                                        <input type="number" step="any" min="1" max="{{ $walletBalance }}" class="form-control form-control-lg fs-15"
                                               name="amount" placeholder="0.00" id="withAmount" required oninput="calcBreakdown(this.value)">
                                    </div>
                                    @error('amount')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror

                                    <!-- Quick Select Presets -->
                                    <div class="d-flex flex-wrap gap-1.5 mt-2">
                                        <button type="button" class="btn btn-sm btn-light border fs-11 px-2.5 py-1" onclick="setWithdrawAmount(10)">$10</button>
                                        <button type="button" class="btn btn-sm btn-light border fs-11 px-2.5 py-1" onclick="setWithdrawAmount(50)">$50</button>
                                        <button type="button" class="btn btn-sm btn-light border fs-11 px-2.5 py-1" onclick="setWithdrawAmount(100)">$100</button>
                                        <button type="button" class="btn btn-sm btn-light border fs-11 px-2.5 py-1" onclick="setWithdrawAmount(500)">$500</button>
                                        <button type="button" class="btn btn-sm btn-primary-transparent border border-primary-subtle fs-11 px-2.5 py-1 fw-semibold text-primary"
                                                onclick="setWithdrawAmount({{ $walletBalance }})">
                                            Max (${{ number_format($walletBalance, 2) }})
                                        </button>
                                    </div>
                                </div>

                                <!-- Transaction Password -->
                                <div class="mb-4">
                                    <label for="txn_password" class="form-label text-default fw-semibold fs-13">Transaction Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="ri-lock-2-line"></i></span>
                                        <input type="password" class="form-control" placeholder="Enter Transaction Password"
                                               name="txn_password" id="txn_password" required>
                                        <button class="btn btn-light border" type="button" onclick="toggleTxnPass(this)">
                                            <i class="ri-eye-off-line"></i>
                                        </button>
                                    </div>
                                    @error('txn_password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Hidden Inputs for Backend / JS Compatibility -->
                                <input type="hidden" name="memberid" id="memberid" value="{{ $data['memberid'] }}">
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                <input type="hidden" id="wallet" value="{{ $data['wallet'] }}">
                                <input type="hidden" name="memberWallet" value="{{ $data['member_wallet'] ?? 0 }}" id="memberWallet">

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary w-100 py-2.5 fs-15 fw-semibold withdraw_btn subBtn" id="withdrawBtn"
                                    {{ empty($data['wallet_address']) || $walletBalance < 1 ? 'disabled' : '' }}>
                                    <i class="ri-send-plane-fill me-1.5"></i> Submit Withdrawal Request
                                </button>
                                <span id="wMesg" class="text-danger text-center mt-2 d-block small"></span>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Live Breakdown & Guidelines -->
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-12">
                    <div class="d-flex flex-column gap-4">
                        <!-- Live Calculation Card -->
                        <div class="card custom-card shadow-sm border-0" style="border-radius: 14px;">
                            <div class="card-header border-bottom py-3">
                                <div class="card-title mb-0 d-flex align-items-center fs-14">
                                    <i class="ri-calculator-line text-info me-2 fs-16"></i>
                                    <span class="fw-bold">Payout Calculation Preview</span>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fs-12">Requested Amount</span>
                                    <span class="fw-bold fs-13 text-dark" id="calcRequested">$0.00</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                    <span class="text-muted fs-12">Platform Service Fee (15%)</span>
                                    <span class="fw-semibold fs-13 text-danger" id="calcFee">-$0.00</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2.5" style="background: rgba(16, 185, 129, 0.08); margin: 6px -12px -6px -12px; padding-left: 12px; padding-right: 12px; border-radius: 8px;">
                                    <span class="fw-bold fs-13 text-success">Net Payout to Receive</span>
                                    <span class="fw-bold fs-16 text-success" id="calcNet">$0.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Important Withdrawal Guidelines -->
                        <div class="card custom-card shadow-sm border-0" style="border-radius: 14px;">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <div class="card-title mb-0 d-flex align-items-center fs-14">
                                    <i class="ri-shield-check-line text-success me-2 fs-16"></i>
                                    <span class="fw-bold">Withdrawal Guidelines</span>
                                </div>
                                <a href="{{ url('/member/wallet/withdrawal-history') }}" class="text-primary fs-12 fw-medium">
                                    History <i class="ri-arrow-right-s-line"></i>
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-flex flex-column gap-3 fs-12">
                                    <div class="d-flex align-items-start">
                                        <div class="avatar avatar-xs rounded-circle bg-primary-transparent text-primary me-2.5 mt-0.5 flex-shrink-0 d-flex align-items-center justify-content-center">
                                            <i class="ri-flashlight-line fs-12"></i>
                                        </div>
                                        <div>
                                            <strong class="text-dark">Minimum Payout:</strong>
                                            <div class="text-muted">The minimum withdrawal amount is $1.00 USD.</div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start">
                                        <div class="avatar avatar-xs rounded-circle bg-info-transparent text-info me-2.5 mt-0.5 flex-shrink-0 d-flex align-items-center justify-content-center">
                                            <i class="ri-percent-line fs-12"></i>
                                        </div>
                                        <div>
                                            <strong class="text-dark">Platform Fee (15%):</strong>
                                            <div class="text-muted">A standard 15% system fee is deducted, and 85% net amount is transferred to your USDT address.</div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start">
                                        <div class="avatar avatar-xs rounded-circle bg-warning-transparent text-warning me-2.5 mt-0.5 flex-shrink-0 d-flex align-items-center justify-content-center">
                                            <i class="ri-time-line fs-12"></i>
                                        </div>
                                        <div>
                                            <strong class="text-dark">Single Pending Rule:</strong>
                                            <div class="text-muted">Only one pending withdrawal request is permitted at a time. Once approved, you can place a new request.</div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start">
                                        <div class="avatar avatar-xs rounded-circle bg-success-transparent text-success me-2.5 mt-0.5 flex-shrink-0 d-flex align-items-center justify-content-center">
                                            <i class="ri-shield-keyhole-line fs-12"></i>
                                        </div>
                                        <div>
                                            <strong class="text-dark">Security Guaranteed:</strong>
                                            <div class="text-muted">All transactions require your 2FA transaction password for verified authorization.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function setWithdrawAmount(val) {
            const input = document.getElementById('withAmount');
            if (input) {
                input.value = val;
                calcBreakdown(val);
            }
        }

        function calcBreakdown(val) {
            const amt = parseFloat(val) || 0;
            const fee = amt * 0.15;
            const net = Math.max(0, amt - fee);

            const elReq = document.getElementById('calcRequested');
            const elFee = document.getElementById('calcFee');
            const elNet = document.getElementById('calcNet');

            if (elReq) elReq.innerText = '$' + amt.toFixed(2);
            if (elFee) elFee.innerText = '-$' + fee.toFixed(2);
            if (elNet) elNet.innerText = '$' + net.toFixed(2);
        }

        function toggleTxnPass(btn) {
            const input = document.getElementById('txn_password');
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'ri-eye-line';
            } else {
                input.type = 'password';
                icon.className = 'ri-eye-off-line';
            }
        }
    </script>

@endsection
