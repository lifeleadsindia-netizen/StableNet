@extends('member.layouts.main')
@section('title', 'Import Fund')
@section('container')

<style>
    .import-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 24px -2px rgba(17, 28, 67, 0.06);
        overflow: hidden;
        transition: all 0.25s ease;
    }

    .import-card:hover {
        box-shadow: 0 10px 30px -4px rgba(17, 28, 67, 0.1);
        border-color: #cbd5e1;
    }

    .import-card-header {
        padding: 20px 24px;
        background: #ffffff;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .import-card-body {
        padding: 24px;
    }

    .balance-badge-card {
        background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 40%, rgba(224, 242, 254, 0.75) 75%, rgba(186, 230, 253, 0.6) 100%);
        border: 1px solid rgba(186, 230, 253, 0.85);
        border-radius: 14px;
        padding: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(35, 183, 229, 0.08);
    }

    .preset-amount-btn {
        border-radius: 8px;
        font-weight: 600;
        font-size: 12px;
        padding: 5px 12px;
        transition: all 0.2s ease;
    }

    .preset-amount-btn:hover {
        transform: translateY(-1px);
    }

    .instruction-card {
        background: linear-gradient(135deg, #ffffff 0%, #faf5ff 40%, rgba(243, 232, 255, 0.7) 100%);
        border: 1px solid rgba(233, 213, 255, 0.85);
        border-radius: 14px;
        padding: 20px;
    }
</style>

<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h1 class="page-title fw-bold fs-20 mb-1" style="color: #111c43;">Import Fund</h1>
                <p class="text-muted fs-13 mb-0">Deposit cryptocurrency to your Fund Wallet instantly</p>
            </div>
            <div class="ms-md-1 ms-0 mt-md-0 mt-2">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}" class="text-primary"><i class="ti ti-home-2 me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item text-muted">Import Section</li>
                        <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Import Fund</li>
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
            <!-- Left Column: Import Form -->
            <div class="col-xl-7 col-lg-7 col-12">
                <div class="import-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header -->
                        <div class="import-card-header">
                            <div class="d-flex align-items-center gap-3">
                                <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #111c43 0%, #1e3a8a 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(17, 28, 67, 0.2);">
                                    <i class="ti ti-download fs-20"></i>
                                </span>
                                <div>
                                    <h5 class="fw-bold mb-0 text-dark">Import Fund Form</h5>
                                    <small class="text-muted">Imported funds will be added to your wallet automatically</small>
                                </div>
                            </div>
                            <span class="badge" style="background: rgba(35, 183, 229, 0.15); color: #0284c7; border: 1px solid rgba(35, 183, 229, 0.35); font-size: 11px; padding: 5px 12px; border-radius: 20px; font-weight: 600;">
                                <i class="ti ti-bolt me-1"></i> Instant Credit
                            </span>
                        </div>

                        <!-- Body Form -->
                        <div class="import-card-body">
                            <!-- Hidden Values Required by block.js -->
                            <input type="hidden" value="{{ csrf_token() }}" id="csrf">
                            <input type="hidden" id="route" value="{{ route('addFund') }}">

                            <div class="row gy-3">
                                <!-- Member ID -->
                                <div class="col-12">
                                    <label class="form-label fs-13 fw-semibold text-dark">
                                        <i class="ti ti-user me-1 text-primary"></i> Member ID
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted border-end-0"><i class="ti ti-id"></i></span>
                                        <input type="text" class="form-control bg-light fw-bold" name="memberid" id="memberid" value="{{ $data['memberid'] }}" readonly>
                                    </div>
                                    @error('memberid')
                                        <span class="text-danger fs-12 mt-1 d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Deposit Amount -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <label class="form-label fs-13 fw-semibold text-dark mb-0">
                                            <i class="ti ti-currency-dollar me-1 text-success"></i> Deposit Amount
                                        </label>
                                        <span class="badge bg-success-transparent text-success fs-11">Min. $10.00</span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted border-end-0 fw-bold">$</span>
                                        <input type="number" class="form-control form-control-lg fw-bold" name="amount" id="amount" placeholder="Enter amount to import" min="10" step="any" required>
                                    </div>
                                    @error('amount')
                                        <span class="text-danger fs-12 mt-1 d-block">{{ $message }}</span>
                                    @enderror

                                    <!-- Quick Amount Presets -->
                                    <div class="d-flex align-items-center flex-wrap gap-2 mt-2">
                                        <span class="text-muted fs-11 me-1">Quick Select:</span>
                                        <button type="button" class="btn btn-sm btn-outline-primary preset-amount-btn" data-val="50">+$50</button>
                                        <button type="button" class="btn btn-sm btn-outline-primary preset-amount-btn" data-val="100">+$100</button>
                                        <button type="button" class="btn btn-sm btn-outline-primary preset-amount-btn" data-val="250">+$250</button>
                                        <button type="button" class="btn btn-sm btn-outline-primary preset-amount-btn" data-val="500">+$500</button>
                                        <button type="button" class="btn btn-sm btn-outline-primary preset-amount-btn" data-val="1000">+$1000</button>
                                    </div>
                                </div>

                                <!-- Current Fund Wallet Balance -->
                                <div class="col-12">
                                    <label class="form-label fs-13 fw-semibold text-dark">
                                        <i class="ti ti-wallet me-1 text-info"></i> Current Fund Wallet Balance
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted border-end-0 fw-bold">$</span>
                                        <input type="text" class="form-control bg-light" name="balance" value="{{ number_format($data['p2p_wallet'], 2) }}" readonly>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-4 pt-2">
                                    <button type="button" class="btn btn-primary w-100 py-2 fw-semibold shadow-sm transferBtn" style="border-radius: 10px; background: linear-gradient(135deg, #111c43 0%, #1e3a8a 100%); border: none;">
                                        <i class="ti ti-download me-1"></i> Import Fund Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Wallet Stats & Info -->
            <div class="col-xl-5 col-lg-5 col-12">
                <div class="d-flex flex-column gap-4">
                    <!-- Balance Card -->
                    <div class="balance-badge-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="fs-12 fw-semibold text-uppercase tracking-wider text-muted">Fund Wallet Balance</span>
                            <span class="avatar avatar-md avatar-rounded" style="background: rgba(35, 183, 229, 0.25); color: #0284c7; border: 1px solid rgba(35, 183, 229, 0.4);">
                                <i class="ti ti-wallet fs-20"></i>
                            </span>
                        </div>
                        <h2 class="fw-bold mb-2 text-dark" style="letter-spacing: -0.5px;">
                            $ {{ number_format($data['p2p_wallet'], 2) }}
                        </h2>
                        <div class="d-flex align-items-center justify-content-between mt-3 pt-2 border-top">
                            <span class="badge" style="background: rgba(35, 183, 229, 0.2); color: #0284c7; border: 1px solid rgba(35, 183, 229, 0.35); font-size: 11px; padding: 4px 10px; border-radius: 20px;">
                                <i class="ti ti-coins me-1"></i> Available Funds
                            </span>
                            <a href="{{ url('/member/fund/deposit-fund-history') }}" class="fs-12 fw-semibold text-primary">
                                View History <i class="ti ti-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Instructions Card -->
                    <div class="instruction-card">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="avatar avatar-sm avatar-rounded" style="background: rgba(132, 90, 223, 0.2); color: #845adf;">
                                <i class="ti ti-info-circle fs-16"></i>
                            </span>
                            <h6 class="fw-bold mb-0 text-dark">Important Deposit Information</h6>
                        </div>
                        <ul class="fs-13 text-muted mb-0 ps-3" style="line-height: 1.6;">
                            <li class="mb-2">Enter the desired amount (minimum <strong>$10.00</strong>).</li>
                            <li class="mb-2">Click <strong>Import Fund Now</strong> to process the automated credit.</li>
                            <li class="mb-2">Deposited funds are credited immediately to your <strong>Fund Wallet</strong>.</li>
                            <li>You can track all previous deposits anytime in the <strong>Import Fund History</strong> section.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script src="{{ asset('user_assets/block.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const amountInput = document.getElementById('amount');
        const presetBtns = document.querySelectorAll('.preset-amount-btn');

        presetBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const addVal = parseFloat(this.getAttribute('data-val')) || 0;
                const currentVal = parseFloat(amountInput.value) || 0;
                amountInput.value = currentVal + addVal;
            });
        });
    });
</script>

@endsection