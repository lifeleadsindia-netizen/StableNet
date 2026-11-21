@extends('admin.layouts.main')
@section('title', 'Import Fund History')
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
                                            <i class="bx bx-history fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h4 class="fw-bold mb-0 text-dark">Import Fund History</h4>
                                            <span class="badge bg-teal-subtle text-teal border border-teal-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                User Deposits
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">Comprehensive record of funds imported and deposited by registered members</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-3">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-primary"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item text-muted">Funds Management</li>
                                            <li class="breadcrumb-item active text-muted" aria-current="page">Import Fund History</li>
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
                        <span><strong>Success:</strong> {{ session('successMsg') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Page-Specific Filters Card -->
            <div class="card custom-card card-filter">
                <div class="filter-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center">
                        <span class="avatar avatar-xs avatar-rounded bg-primary-subtle text-primary me-2">
                            <i class="bx bx-filter-alt fs-15"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark fs-14">Import History Search & Date Filters</h6>
                            <small class="text-muted fs-11">Search directly by Member ID or filter by request date range</small>
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
                    <form method="GET" action="{{ url('admin/funds/import-fund-history') }}" id="importFilterForm">
                        <div class="row g-3 align-items-end">

                            <!-- Member ID Filter -->
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
                                <a href="{{ url('admin/funds/import-fund-history') }}" class="btn btn-light border py-2 px-3 d-inline-flex align-items-center justify-content-center"
                                   title="Reset Filters">
                                    <i class="bx bx-reset fs-16"></i>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Import Fund History Table Card -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card card-heavy">
                        <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded avatar-teal me-2">
                                    <i class="bx bx-cloud-download fs-16"></i>
                                </span>
                                <div>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-15">User Deposit Logs</h5>
                                    <small class="text-muted fs-11">Total records matching query: {{ count($data) }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-teal-subtle text-teal border border-teal-subtle rounded-pill px-3 py-1 fs-12 fw-semibold">
                                    <i class="bx bx-receipt me-1"></i> {{ count($data) }} Deposits
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
                                            <th style="min-width: 140px;">Request Date</th>
                                            <th style="width: 140px;">Member ID</th>
                                            <th>Order ID</th>
                                            <th>Txn ID / Hash</th>
                                            <th class="text-end" style="width: 120px;">Amount</th>
                                            <th class="text-center" style="width: 110px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @forelse ($data as $list)
                                            <tr class="dash-table-row">
                                                <td class="text-center fw-semibold text-muted">{{ $i }}</td>
                                                <td>
                                                    <span class="fw-semibold text-dark fs-12 d-block">
                                                        {{ date('d M, Y', strtotime($list['created_at'])) }}
                                                    </span>
                                                    <small class="text-muted fs-11">
                                                        {{ date('h:i:s A', strtotime($list['created_at'])) }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 fw-bold fs-12 d-inline-flex align-items-center gap-1">
                                                        <i class="bx bx-id-card"></i> {{ $list['memberid'] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="font-monospace text-muted fs-12">#{{ $list['orderid'] }}</span>
                                                </td>
                                                <td>
                                                    @if(!empty($list['txnid']) && $list['txnid'] != 'NA')
                                                        <span class="font-monospace text-dark fs-11 bg-light px-2 py-0.5 rounded border">
                                                            {{ Str::limit($list['txnid'], 25) }}
                                                        </span>
                                                    @else
                                                        <span class="text-muted fs-12">NA</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <span class="fw-bold text-success fs-13">
                                                        $ {{ number_format($list['amount'], 2) }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    @if ($list['status'] == 'Approved')
                                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fs-11 fw-bold">
                                                            <i class="bx bx-check-circle me-1"></i> Approved
                                                        </span>
                                                    @elseif ($list['status'] == 'Cancelled')
                                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2.5 py-1 fs-11 fw-bold">
                                                            <i class="bx bx-x-circle me-1"></i> Cancelled
                                                        </span>
                                                    @else
                                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-1 fs-11 fw-bold">
                                                            <i class="bx bx-time-five me-1"></i> {{ $list['status'] ?? 'Pending' }}
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-5">
                                                    <div class="empty-state py-4">
                                                        <span class="avatar avatar-xl avatar-rounded bg-light text-muted mb-3">
                                                            <i class="bx bx-receipt fs-28"></i>
                                                        </span>
                                                        <h6 class="fw-bold text-dark mb-1">No Deposit Records Found</h6>
                                                        <p class="text-muted fs-13 mb-3">No import fund history matches your filter criteria.</p>
                                                        <a href="{{ url('admin/funds/import-fund-history') }}" class="btn btn-sm btn-signin rounded-pill px-3.5 py-2">
                                                            <i class="bx bx-reset me-1"></i> Reset Filters
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

    <!-- Quick Date Presets Script -->
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

            document.getElementById('importFilterForm').submit();
        }
    </script>
@endsection
