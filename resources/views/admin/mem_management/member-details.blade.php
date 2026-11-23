@extends('admin.layouts.main')
@section('title', 'Member Details')
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
                                        <span class="avatar avatar-lg avatar-rounded avatar-blue">
                                            <i class="bx bx-user-pin fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h4 class="fw-bold mb-0 text-dark">Member Directory</h4>
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                All Members
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">Browse, filter, and manage registered members, account statuses, and credentials</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-3">
                                    <div class="header-stat-pill">
                                        <span class="text-muted fs-12">Total Registered:</span>
                                        <span class="fw-bold text-dark fs-14 ms-1">{{ $total_members ?? count($data) }}</span>
                                    </div>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-primary"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item active text-muted" aria-current="page">Member Details</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advanced Date & Data Filter Card -->
            <div class="card custom-card card-filter">
                <div class="filter-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center">
                        <span class="avatar avatar-xs avatar-rounded bg-primary-subtle text-primary me-2">
                            <i class="bx bx-filter-alt fs-15"></i>
                        </span>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark fs-14">Advanced Data & Date Filters</h6>
                            <small class="text-muted fs-11">Filter members by registration dates, status, or keyword</small>
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
                    <form method="GET" action="{{ url('admin/member-details') }}" id="memberFilterForm">
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
                                        <option value="Inactive" {{ request('status') === 'Inactive' ? 'selected' : '' }}>Inactive / Unverified</option>
                                        <option value="Blocked" {{ request('status') === 'Blocked' ? 'selected' : '' }}>Blocked</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-lg-3 col-md-12 d-flex gap-2">
                                <button type="submit" class="btn btn-primary btn-wave w-100 py-2 d-inline-flex align-items-center justify-content-center gap-1.5 fw-semibold">
                                    <i class="bx bx-filter-alt fs-15"></i> Filter
                                </button>
                                <a href="{{ url('admin/member-details') }}" class="btn btn-light border py-2 px-3 d-inline-flex align-items-center justify-content-center"
                                   title="Reset Filters">
                                    <i class="bx bx-reset fs-16"></i>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Member Details Table Card -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card card-heavy">
                        <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded avatar-indigo me-2">
                                    <i class="bx bx-list-ul fs-16"></i>
                                </span>
                                <div>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-15">Registered Members Directory</h5>
                                    <small class="text-muted fs-11">Total records matching query: {{ count($data) }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
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
                                            <th style="width: 140px;">Joining Date</th>
                                            <th style="width: 120px;">Member ID</th>
                                            <th>Member Name</th>
                                            <th>Contact Info</th>
                                            <th style="width: 120px;">Sponsor ID</th>
                                            <th class="text-center" style="width: 120px;">Status</th>
                                            <th class="text-center" style="width: 140px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @forelse ($data as $item)
                                            <tr class="dash-table-row">
                                                <td class="text-center fw-semibold text-muted">{{ $i }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="avatar avatar-xs avatar-rounded bg-light text-primary flex-shrink-0">
                                                            <i class="bx bx-calendar fs-13"></i>
                                                        </span>
                                                        <div>
                                                            <span class="fw-semibold text-dark fs-12 d-block">
                                                                {{ date('d M, Y', strtotime($item['created_at'])) }}
                                                            </span>
                                                            <small class="text-muted fs-11">
                                                                <i class="bx bx-time-five me-0.5"></i>{{ date('h:i:s A', strtotime($item['created_at'])) }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 fw-bold fs-12 d-inline-flex align-items-center gap-1">
                                                        <i class="bx bx-id-card"></i> {{ $item['memberid'] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="avatar avatar-sm avatar-rounded avatar-blue flex-shrink-0 fw-bold fs-12">
                                                            {{ strtoupper(substr($item['name'] ?? 'M', 0, 1)) }}
                                                        </span>
                                                        <div>
                                                            <span class="fw-bold text-dark fs-13 d-block">{{ $item['name'] }}</span>
                                                            @if(!empty($item['city']) || !empty($item['state']))
                                                                <small class="text-muted fs-11">
                                                                    <i class="bx bx-map-pin me-0.5"></i>{{ $item['city'] ?? '' }}{{ !empty($item['city']) && !empty($item['state']) ? ', ' : '' }}{{ $item['state'] ?? '' }}
                                                                </small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="d-flex align-items-center gap-1 text-muted fs-12">
                                                            <i class="bx bx-envelope text-primary"></i>
                                                            <a href="mailto:{{ $item['email'] }}" class="text-dark fw-medium text-decoration-none">
                                                                {{ $item['email'] }}
                                                            </a>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-1 text-muted fs-12 mt-1">
                                                            <i class="bx bx-phone text-success"></i>
                                                            <a href="tel:{{ $item['mobile'] }}" class="text-muted text-decoration-none">
                                                                {{ $item['mobile'] }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill px-2.5 py-1 fw-semibold fs-11 d-inline-flex align-items-center gap-1">
                                                        <i class="bx bx-git-branch"></i> {{ $item['sponsorid'] ?? 'Root' }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    @if ($item['status'] === 'Active')
                                                        <a href="{{ url('admin/account-control') }}/{{ $item['id'] }}"
                                                           class="status-pill status-active"
                                                           onclick="return confirm('Do you want to toggle status for member {{ $item['memberid'] }}?');"
                                                           title="Click to toggle status">
                                                            <i class="bx bx-check-circle"></i> Active
                                                        </a>
                                                    @elseif($item['status'] === 'Blocked')
                                                        <a href="{{ url('admin/account-control') }}/{{ $item['id'] }}"
                                                           class="status-pill status-blocked"
                                                           onclick="return confirm('Do you want to unblock member {{ $item['memberid'] }}?');"
                                                           title="Click to unblock">
                                                            <i class="bx bx-block"></i> Blocked
                                                        </a>
                                                    @else
                                                        <a href="{{ url('admin/account-control') }}/{{ $item['id'] }}"
                                                           class="status-pill status-inactive"
                                                           onclick="return confirm('Do you want to activate member {{ $item['memberid'] }}?');"
                                                           title="Click to activate">
                                                            <i class="bx bx-time"></i> {{ $item['status'] ?: 'Inactive' }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('admin/member-login') }}/{{ $item['id'] }}"
                                                       target="_blank"
                                                       class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 d-inline-flex align-items-center gap-1 shadow-sm"
                                                       title="Login to Member Dashboard">
                                                        <i class="bx bx-log-in-circle fs-14"></i> Login
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-5">
                                                    <div class="empty-state py-4">
                                                        <span class="avatar avatar-xl avatar-rounded bg-light text-muted mb-3">
                                                            <i class="bx bx-user-x fs-28"></i>
                                                        </span>
                                                        <h6 class="fw-bold text-dark mb-1">No Members Found</h6>
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

            document.getElementById('memberFilterForm').submit();
        }
    </script>
@endsection
