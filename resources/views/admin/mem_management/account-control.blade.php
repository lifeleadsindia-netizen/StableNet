@extends('admin.layouts.main')
@section('title', 'Account Control')
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
                                            <i class="bx bx-shield-quarter fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h4 class="fw-bold mb-0 text-dark">Account Control</h4>
                                            <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                Access Management
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">Manage account privileges, toggle Active/Blocked login statuses, and update credentials</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-3">
                                    <div class="header-stat-pill">
                                        <span class="text-muted fs-12">Total Accounts:</span>
                                        <span class="fw-bold text-dark fs-14 ms-1">{{ $total_accounts ?? count($data) }}</span>
                                    </div>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-primary"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item active text-muted" aria-current="page">Account Control</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts Section -->
            @if (session()->has('statusAct'))
                <div class="alert custom-alert custom-alert-success alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-check-circle fs-20 me-2 text-success"></i>
                        <span><strong>Activated!</strong> {{ session('statusAct') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('statusDeact'))
                <div class="alert custom-alert custom-alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-block fs-20 me-2 text-danger"></i>
                        <span><strong>Blocked!</strong> {{ session('statusDeact') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Advanced Date & Data Filter Card -->
            <div class="card custom-card card-filter">
                <div class="filter-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center">
                        <span class="avatar avatar-xs avatar-rounded bg-primary-subtle text-primary me-2">
                            <i class="bx bx-filter-alt fs-15"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark fs-14">Advanced Data & Date Filters</h6>
                            <small class="text-muted fs-11">Filter member accounts by joining date, access status, or keyword</small>
                        </div>
                    </div>
                    <!-- Quick Date Presets -->
                    <div class="d-flex align-items-center gap-1 flex-wrap">
                        <span class="text-muted fs-11 me-1 fw-semibold">Quick Presets:</span>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('today')">Today</button>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('yesterday')">Yesterday</button>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('7days')">Last 7 Days</button>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('month')">This Month</button>
                        <button type="button" class="quick-preset-btn" onclick="applyPreset('all')">All Time</button>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form method="GET" action="{{ url('admin/account-control') }}" id="accountFilterForm">
                        <div class="row g-3 align-items-end">

                            <!-- Member ID Filter -->
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-id-card text-primary me-1"></i> Member ID
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-user fs-15"></i></span>
                                    <input type="text" name="member_id" class="form-control"
                                        placeholder="e.g. SC1234567"
                                        value="{{ request('member_id') ?? request('search') }}" autofocus>
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

                            <!-- Status Filter -->
                            <div class="col-lg-2 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-check-shield text-primary me-1"></i> Account Status
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-tag fs-15"></i></span>
                                    <select name="status" class="form-select">
                                        <option value="all">All Statuses</option>
                                        <option value="Active" {{ request('status') === 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Blocked" {{ request('status') === 'Blocked' ? 'selected' : '' }}>Blocked</option>
                                        <option value="Inactive" {{ request('status') === 'Inactive' ? 'selected' : '' }}>Inactive / Unverified</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-lg-3 col-md-12 d-flex gap-2">
                                <button type="submit" class="btn btn-primary btn-wave w-100 py-2 d-inline-flex align-items-center justify-content-center gap-1.5 fw-semibold">
                                    <i class="bx bx-filter-alt fs-15"></i> Filter
                                </button>
                                <a href="{{ url('admin/account-control') }}" class="btn btn-light border py-2 px-3 d-inline-flex align-items-center justify-content-center"
                                   title="Reset Filters">
                                    <i class="bx bx-reset fs-16"></i>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Account Control Table Card -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card card-heavy">
                        <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded avatar-blue me-2">
                                    <i class="bx bx-user-check fs-16"></i>
                                </span>
                                <div>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-15">Account Control Center</h5>
                                    <small class="text-muted fs-11">Total records matching query: {{ count($data) }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill px-3 py-1 fs-12 fw-semibold">
                                    <i class="bx bx-shield me-1"></i> {{ count($data) }} Accounts
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
                                            <th style="width: 140px;">Joining Date</th>
                                            <th class="text-center" style="width: 70px;">Avatar</th>
                                            <th style="width: 130px;">Member ID</th>
                                            <th>Member Name</th>
                                            <th style="width: 130px;">Sponsor ID</th>
                                            <th class="text-center" style="width: 130px;">Change Status</th>
                                            <th class="text-center" style="width: 140px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @forelse ($data as $list)
                                            <tr class="dash-table-row">
                                                <td class="text-center fw-semibold text-muted">{{ $i }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="avatar avatar-xs avatar-rounded bg-light text-primary flex-shrink-0">
                                                            <i class="bx bx-calendar fs-13"></i>
                                                        </span>
                                                        <div>
                                                            <span class="fw-semibold text-dark fs-12 d-block">
                                                                {{ date('d M, Y', strtotime($list['created_at'])) }}
                                                            </span>
                                                            <small class="text-muted fs-11">
                                                                <i class="bx bx-time-five me-0.5"></i>{{ date('h:i:s A', strtotime($list['created_at'])) }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @if (!empty($list['profile_image']) && file_exists(public_path('uploads/' . $list['profile_image'])))
                                                        <img src="{{ asset('uploads/' . $list['profile_image']) }}"
                                                             alt="{{ $list['name'] }}"
                                                             class="rounded-circle shadow-sm border border-2 border-white"
                                                             style="width: 42px; height: 42px; object-fit: cover;">
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
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="fw-bold text-dark fs-13 d-block">{{ $list['name'] }}</span>
                                                        @if(!empty($list['mobile']))
                                                            <small class="text-muted fs-11 d-inline-flex align-items-center gap-1">
                                                                <i class="bx bx-phone text-success"></i> {{ $list['mobile'] }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill px-2.5 py-1 fw-semibold fs-11 d-inline-flex align-items-center gap-1">
                                                        <i class="bx bx-git-branch"></i> {{ $list['sponsorid'] ?? 'Root' }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    @if ($list['status'] === 'Active')
                                                        <a href="{{ url('admin/account-control/' . $list['id']) }}"
                                                           class="status-pill status-active"
                                                           onclick="return confirm('Do you want to block account for {{ $list['memberid'] }} ({{ $list['name'] }})?');"
                                                           title="Click to Block Account">
                                                            <i class="bx bx-check-circle"></i> Active
                                                        </a>
                                                    @elseif($list['status'] === 'Blocked')
                                                        <a href="{{ url('admin/account-control/' . $list['id']) }}"
                                                           class="status-pill status-blocked"
                                                           onclick="return confirm('Do you want to unblock account for {{ $list['memberid'] }} ({{ $list['name'] }})?');"
                                                           title="Click to Activate Account">
                                                            <i class="bx bx-block"></i> Blocked
                                                        </a>
                                                    @else
                                                        <a href="{{ url('admin/account-control/' . $list['id']) }}"
                                                           class="status-pill status-inactive"
                                                           onclick="return confirm('Do you want to activate account for {{ $list['memberid'] }}?');"
                                                           title="Click to Activate">
                                                            <i class="bx bx-time"></i> {{ $list['status'] ?: 'Inactive' }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-inline-flex align-items-center gap-1">
                                                        <a href="{{ url('admin/members/member-update/' . $list['id']) }}"
                                                           class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 d-inline-flex align-items-center gap-1 shadow-sm"
                                                           title="Edit Member Profile">
                                                            <i class="bx bx-edit fs-14"></i> Edit
                                                        </a>
                                                        <a href="{{ url('admin/member-login/' . $list['id']) }}"
                                                           target="_blank"
                                                           class="btn btn-sm btn-light border rounded-pill px-2.5 py-1 text-muted d-inline-flex align-items-center"
                                                           title="Login to Member Dashboard">
                                                            <i class="bx bx-log-in-circle fs-14"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-5">
                                                    <div class="empty-state py-4">
                                                        <span class="avatar avatar-xl avatar-rounded bg-light text-muted mb-3">
                                                            <i class="bx bx-shield-x fs-28"></i>
                                                        </span>
                                                        <h6 class="fw-bold text-dark mb-1">No Accounts Found</h6>
                                                        <p class="text-muted fs-13 mb-0">Try adjusting your date range or search keyword filter.</p>
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
            }

            document.getElementById('accountFilterForm').submit();
        }
    </script>
@endsection
