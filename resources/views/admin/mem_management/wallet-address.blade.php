@extends('admin.layouts.main')
@section('title', 'Wallet Address Management')
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
                                        <span class="avatar avatar-lg avatar-rounded avatar-teal">
                                            <i class="bx bx-wallet-alt fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h4 class="fw-bold mb-0 text-dark">Wallet Address Management</h4>
                                            <span class="badge bg-teal-subtle text-teal border border-teal-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                Crypto & Payouts
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">Review, verify and update member withdrawal and cryptocurrency wallet addresses</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-3">
                                    <div class="header-stat-pill">
                                        <span class="text-muted fs-12">Total Members:</span>
                                        <span class="fw-bold text-dark fs-14 ms-1">{{ $total_members ?? count($data) }}</span>
                                    </div>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-primary"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item active text-muted" aria-current="page">Wallet Address</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts Section -->
            @if (session()->has('update'))
                <div class="alert custom-alert custom-alert-success alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-check-circle fs-20 me-2 text-success"></i>
                        <span><strong>Success!</strong> {{ session('update') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Page-Specific Filters Card: Member ID & Date Filters -->
            <div class="card custom-card card-filter">
                <div class="filter-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center">
                        <span class="avatar avatar-xs avatar-rounded bg-primary-subtle text-primary me-2">
                            <i class="bx bx-filter-alt fs-15"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark fs-14">Wallet Address Search & Date Filters</h6>
                            <small class="text-muted fs-11">Search directly by Member ID or filter by joining date range</small>
                        </div>
                    </div>
                    <!-- Quick Date Presets -->
                    <div class="d-flex align-items-center gap-1 flex-wrap">
                        <span class="text-muted fs-11 me-1 fw-semibold">Quick Date Presets:</span>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('today')">Today</button>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('yesterday')">Yesterday</button>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('7days')">Last 7 Days</button>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('month')">This Month</button>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('all')">Show All</button>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form method="GET" action="{{ url('admin/wallet-address') }}" id="walletFilterForm">
                        <div class="row g-3 align-items-end">

                            <!-- Member ID Filter (Primary Search) -->
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-id-card text-primary me-1"></i> Member ID
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-user fs-15"></i></span>
                                    <input type="text" name="member_id" class="form-control"
                                        placeholder="Enter Member ID (e.g. SC1234567)"
                                        value="{{ request('member_id') ?? request('search') }}" autofocus>
                                </div>
                            </div>

                            <!-- From Date -->
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-calendar text-primary me-1"></i> From Date
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-calendar fs-15"></i></span>
                                    <input type="date" name="start_date" id="startDate" class="form-control"
                                        value="{{ request('start_date') }}">
                                </div>
                            </div>

                            <!-- To Date -->
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-calendar-check text-primary me-1"></i> To Date
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-calendar-check fs-15"></i></span>
                                    <input type="date" name="end_date" id="endDate" class="form-control"
                                        value="{{ request('end_date') }}">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-lg-2 col-md-12 d-flex gap-2">
                                <button type="submit" class="btn btn-signin w-100 py-2 d-inline-flex align-items-center justify-content-center gap-1">
                                    <i class="bx bx-search fs-15"></i> Search
                                </button>
                                <a href="{{ url('admin/wallet-address') }}" class="btn btn-light border py-2 px-3 d-inline-flex align-items-center justify-content-center"
                                   title="Reset Filters">
                                    <i class="bx bx-reset fs-16"></i>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Member Wallet Address Table Card -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card card-heavy">
                        <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded avatar-teal me-2">
                                    <i class="bx bx-wallet fs-16"></i>
                                </span>
                                <div>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-15">Member Wallet Addresses</h5>
                                    <small class="text-muted fs-11">Total records matching query: {{ count($data) }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-teal-subtle text-teal border border-teal-subtle rounded-pill px-2.5 py-1 fs-11 fw-semibold">
                                    <i class="bx bx-check-shield me-1"></i>Payout Wallets
                                </span>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 fs-12 fw-semibold">
                                    <i class="bx bx-user me-1"></i> {{ count($data) }} Members
                                </span>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="table-responsive dash-table-wrapper bg-white">
                                <table id="file-export" class="table table-hover align-middle w-100 text-nowrap mb-0"
                                    aria-describedby="file-export_info">
                                    <thead class="dash-table-head">
                                        <tr>
                                            <th class="text-center" style="width: 50px;">#</th>
                                            <th class="text-center" style="width: 65px;">Avatar</th>
                                            <th style="width: 140px;">Member ID</th>
                                            <th style="width: 160px;">Member Name</th>
                                            <th style="min-width: 320px;">Wallet Address</th>
                                            <th class="text-center" style="width: 120px;">Status</th>
                                            <th class="text-center" style="width: 110px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @forelse ($data as $list)
                                            <!-- Separate HTML5 Form for clean table structure -->
                                            <form id="walletForm_{{ $list['id'] }}" action="{{ route('updateWallet') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $list['id'] }}">
                                            </form>

                                            <tr class="dash-table-row">
                                                <td class="text-center fw-semibold text-muted">{{ $i }}</td>
                                                <td class="text-center">
                                                    @if (!empty($list['profile_image']) && file_exists(public_path('uploads/' . $list['profile_image'])))
                                                        <img src="{{ asset('uploads/' . $list['profile_image']) }}"
                                                             alt="{{ $list['name'] }}"
                                                             class="rounded-circle shadow-sm border border-2 border-white"
                                                             style="width: 40px; height: 40px; object-fit: cover;">
                                                    @else
                                                        <span class="avatar avatar-md avatar-rounded avatar-blue fw-bold fs-13 shadow-sm">
                                                             {{ strtoupper(substr($list['name'] ?? 'M', 0, 1)) }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 fw-bold fs-12 d-inline-flex align-items-center gap-1">
                                                        <i class="bx bx-id-card"></i> {{ $list['memberid'] }}
                                                    </span>
                                                    <small class="text-muted d-block fs-11 mt-0.5">
                                                        {{ date('d M, Y', strtotime($list['created_at'])) }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="fw-bold text-dark fs-13 d-block">{{ $list['name'] }}</span>
                                                        @if(!empty($list['mobile']))
                                                            <small class="text-muted fs-11 d-inline-flex align-items-center gap-1">
                                                                <i class="bx bx-phone text-success"></i> {{ $list['mobile'] }}
                                                            </small>
                                                        @elseif(!empty($list['email']))
                                                            <small class="text-muted fs-11 d-inline-flex align-items-center gap-1">
                                                                <i class="bx bx-envelope text-primary"></i> {{ $list['email'] }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group wallet-input-group">
                                                        <span class="input-group-text"><i class="bx bx-wallet text-muted"></i></span>
                                                        <input type="text" form="walletForm_{{ $list['id'] }}" name="address"
                                                            id="walletAddr_{{ $list['id'] }}"
                                                            class="form-control"
                                                            placeholder="Enter Wallet Address (e.g. 0x... or T...)"
                                                            value="{{ $list['wallet_address'] }}">
                                                        @if(!empty($list['wallet_address']))
                                                            <button class="btn btn-copy-wallet" type="button"
                                                                id="copyBtn_{{ $list['id'] }}"
                                                                title="Copy Address"
                                                                onclick="copyWallet('{{ $list['wallet_address'] }}', 'copyBtn_{{ $list['id'] }}')">
                                                                <i class="bx bx-copy"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @if(!empty($list['wallet_address']))
                                                        <span class="status-pill status-active">
                                                            <i class="bx bx-check-circle"></i> Configured
                                                        </span>
                                                    @else
                                                        <span class="status-pill status-inactive">
                                                            <i class="bx bx-time-five"></i> Not Set
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button type="submit" form="walletForm_{{ $list['id'] }}"
                                                            class="btn btn-sm btn-signin px-3 py-1.5 rounded-pill shadow-sm d-inline-flex align-items-center gap-1"
                                                            onclick="return confirm('Update wallet address for member {{ $list['memberid'] }}?');">
                                                        <i class="bx bx-save fs-14"></i> Update
                                                    </button>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-5">
                                                    <div class="empty-state py-4">
                                                        <span class="avatar avatar-xl avatar-rounded bg-light text-muted mb-3">
                                                            <i class="bx bx-wallet fs-28"></i>
                                                        </span>
                                                        <h6 class="fw-bold text-dark mb-1">No Members Found</h6>
                                                        <p class="text-muted fs-13 mb-3">No members match your Member ID or date filter criteria.</p>
                                                        <a href="{{ url('admin/wallet-address') }}" class="btn btn-sm btn-signin rounded-pill px-3.5 py-2">
                                                            <i class="bx bx-reset me-1"></i> Reset & View All Members
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Quick Date Presets & Copy Wallet Script -->
    <script>
        function applyPreset(preset) {
            const startInput = document.getElementById('startDate');
            const endInput = document.getElementById('endDate');
            const today = new Date();

            const formatDate = (date) => {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            };

            if (preset === 'today') {
                const todayStr = formatDate(today);
                startInput.value = todayStr;
                endInput.value = todayStr;
            } else if (preset === 'yesterday') {
                const yesterday = new Date();
                yesterday.setDate(today.getDate() - 1);
                const yesterdayStr = formatDate(yesterday);
                startInput.value = yesterdayStr;
                endInput.value = yesterdayStr;
            } else if (preset === '7days') {
                const sevenDaysAgo = new Date();
                sevenDaysAgo.setDate(today.getDate() - 7);
                startInput.value = formatDate(sevenDaysAgo);
                endInput.value = formatDate(today);
            } else if (preset === 'month') {
                const firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
                startInput.value = formatDate(firstDay);
                endInput.value = formatDate(today);
            } else if (preset === 'all') {
                startInput.value = '';
                endInput.value = '';
                const mId = document.querySelector('input[name="member_id"]');
                if (mId) mId.value = '';
            }

            document.getElementById('walletFilterForm').submit();
        }

        function copyWallet(address, btnId) {
            if (!address) return;
            navigator.clipboard.writeText(address).then(() => {
                const btn = document.getElementById(btnId);
                if (btn) {
                    const originalHtml = btn.innerHTML;
                    btn.innerHTML = '<i class="bx bx-check text-success"></i>';
                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                    }, 1800);
                }
            });
        }
    </script>
@endsection
