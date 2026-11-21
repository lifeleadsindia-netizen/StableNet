@extends('admin.layouts.main')
@section('title', 'Level Income')
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
                                        <span class="avatar avatar-lg avatar-rounded avatar-indigo">
                                            <i class="bx bx-layer fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h4 class="fw-bold mb-0 text-dark">Level Income</h4>
                                            <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                Team Generation
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">Audit and distribution logs of level incomes generated across network referral tiers</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-3">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-primary"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item text-muted">Income Section</li>
                                            <li class="breadcrumb-item active text-muted" aria-current="page">Level Income</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts Section -->
            @if (session()->has('wMessage'))
                <div class="alert custom-alert custom-alert-success alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-check-circle fs-20 me-2 text-success"></i>
                        <span>{{ session('wMessage') }}</span>
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
                            <h6 class="mb-0 fw-bold text-dark fs-14">Level Income Search & Date Filters</h6>
                            <small class="text-muted fs-11">Filter by Member ID, team tier level, or generation date range</small>
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
                    <form method="GET" action="{{ url('admin/income/level-income') }}" id="levelFilterForm">
                        <div class="row g-3 align-items-end">

                            <!-- Member ID Filter -->
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-id-card text-primary me-1"></i> Member ID
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-user fs-15"></i></span>
                                    <input type="text" name="member_id" class="form-control"
                                        placeholder="Enter Member ID"
                                        value="{{ request('member_id') ?? request('search') }}" autofocus>
                                </div>
                            </div>

                            <!-- Level Selection -->
                            <div class="col-lg-2 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-layer text-primary me-1"></i> Level Tier
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-list-ol fs-15"></i></span>
                                    <select class="form-select" name="level">
                                        <option value="all">All Levels</option>
                                        @for ($l = 1; $l <= 10; $l++)
                                            <option value="{{ $l }}" {{ request('level') == $l ? 'selected' : '' }}>Level {{ $l }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <!-- From Date -->
                            <div class="col-lg-2 col-md-6">
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
                            <div class="col-lg-2 col-md-6">
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
                            <div class="col-lg-3 col-md-12 d-flex gap-2">
                                <button type="submit" class="btn btn-signin w-100 py-2 d-inline-flex align-items-center justify-content-center gap-1">
                                    <i class="bx bx-search fs-15"></i> Search
                                </button>
                                <a href="{{ url('admin/income/level-income') }}" class="btn btn-light border py-2 px-3 d-inline-flex align-items-center justify-content-center"
                                   title="Reset Filters">
                                    <i class="bx bx-reset fs-16"></i>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Level Income Table Card -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card card-heavy">
                        <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded avatar-indigo me-2">
                                    <i class="bx bx-layer fs-16"></i>
                                </span>
                                <div>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-15">Level Income Payouts</h5>
                                    <small class="text-muted fs-11">Total records matching query: {{ count($data) }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill px-3 py-1 fs-12 fw-semibold">
                                    <i class="bx bx-receipt me-1"></i> {{ count($data) }} Records
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
                                            <th style="min-width: 130px;">Date</th>
                                            <th style="width: 130px;">Member ID</th>
                                            <th>Member Name</th>
                                            <th class="text-end" style="width: 120px;">Amount</th>
                                            <th class="text-center" style="width: 100px;">Level</th>
                                            <th style="width: 120px;">Level ID</th>
                                            <th class="text-end" style="width: 120px;">Package</th>
                                            <th class="text-center" style="width: 100px;">Status</th>
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
                                                        {{ date('h:i A', strtotime($list['created_at'])) }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 fw-bold fs-12 d-inline-flex align-items-center gap-1">
                                                        <i class="bx bx-id-card"></i> {{ $list['memberid'] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold text-dark fs-13">{{ getName($list['memberid']) }}</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="fw-bold text-success fs-13">
                                                        $ {{ number_format((float)$list['amount'], 2) }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill px-2.5 py-0.5 fs-11 fw-bold">
                                                        Level {{ $list['level'] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="font-monospace text-muted fs-12">{{ $list['level_id'] ?? '-' }}</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="text-muted fs-13">
                                                        $ {{ number_format((float)($list['package'] ?? 0), 2) }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    @if (($list['status'] ?? '') == 'Paid')
                                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fs-11 fw-bold">
                                                            <i class="bx bx-check-circle me-1"></i> Paid
                                                        </span>
                                                    @else
                                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2.5 py-1 fs-11 fw-bold">
                                                            {{ $list['status'] ?? 'Unpaid' }}
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center py-5">
                                                    <div class="empty-state py-4">
                                                        <span class="avatar avatar-xl avatar-rounded bg-light text-muted mb-3">
                                                            <i class="bx bx-layer fs-28"></i>
                                                        </span>
                                                        <h6 class="fw-bold text-dark mb-1">No Level Income Records</h6>
                                                        <p class="text-muted fs-13 mb-3">No level income transactions match your filter criteria.</p>
                                                        <a href="{{ url('admin/income/level-income') }}" class="btn btn-sm btn-signin rounded-pill px-3.5 py-2">
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
                const lvl = document.querySelector('select[name="level"]');
                if (lvl) lvl.value = 'all';
            }

            document.getElementById('levelFilterForm').submit();
        }
    </script>
@endsection
