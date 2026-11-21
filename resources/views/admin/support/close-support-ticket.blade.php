@extends('admin.layouts.main')
@section('title', 'Closed Support Tickets')
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
                                        <span class="avatar avatar-lg avatar-rounded avatar-success">
                                            <i class="bx bx-check-shield fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h4 class="fw-bold mb-0 text-dark">Closed Support Tickets</h4>
                                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                Resolved Archive
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">Browse and review all previously answered, resolved, and completed member support tickets</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-3">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-primary"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item text-muted">Support</li>
                                            <li class="breadcrumb-item active text-muted" aria-current="page">Closed Support Tickets</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts Section -->
            @if (session()->has('successMsg'))
                <div class="alert custom-alert custom-alert-success alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-check-circle fs-20 me-2 text-success"></i>
                        <span>{{ session('successMsg') }}</span>
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
                            <h6 class="mb-0 fw-bold text-dark fs-14">Closed Tickets Search & Date Filters</h6>
                            <small class="text-muted fs-11">Search resolved records by Member ID, Ticket ID or resolved date range</small>
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
                    <form method="GET" action="{{ url('admin/support/close-support-ticket') }}" id="closeTicketFilterForm">
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

                            <!-- Ticket ID Filter -->
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-purchase-tag text-primary me-1"></i> Ticket ID
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-hash fs-15"></i></span>
                                    <input type="text" name="ticket_id" class="form-control"
                                        placeholder="e.g. 123456"
                                        value="{{ request('ticket_id') }}">
                                </div>
                            </div>

                            <!-- From Date -->
                            <div class="col-lg-2 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-calendar text-primary me-1"></i> From Date
                                </label>
                                <div class="input-group filter-input-group">
                                    <input type="date" name="start_date" id="start_date" class="form-control"
                                        value="{{ request('start_date') }}">
                                </div>
                            </div>

                            <!-- To Date -->
                            <div class="col-lg-2 col-md-6">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-calendar text-primary me-1"></i> To Date
                                </label>
                                <div class="input-group filter-input-group">
                                    <input type="date" name="end_date" id="end_date" class="form-control"
                                        value="{{ request('end_date') }}">
                                </div>
                            </div>

                            <!-- Filter & Reset Buttons -->
                            <div class="col-lg-2 col-md-12 d-flex gap-2">
                                <button type="submit" class="btn btn-primary btn-wave w-100 fw-semibold d-flex align-items-center justify-content-center py-2">
                                    <i class="bx bx-filter-alt me-1.5 fs-16"></i> Filter
                                </button>
                                <a href="{{ url('admin/support/close-support-ticket') }}" class="btn btn-light btn-wave border px-3 d-flex align-items-center justify-content-center py-2" title="Reset Filters">
                                    <i class="bx bx-reset fs-16"></i>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Closed Support Tickets Table -->
            <div class="card custom-card card-heavy">
                <div class="card-header justify-content-between align-items-center flex-wrap gap-2 py-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <span class="avatar avatar-sm avatar-rounded bg-success-subtle text-success me-2">
                            <i class="bx bx-check-circle fs-16"></i>
                        </span>
                        <div>
                            <h6 class="card-title mb-0 fw-bold fs-15">Resolved Support Tickets</h6>
                            <small class="text-muted fs-12">Total {{ count($support) }} closed ticket(s) on record</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fs-12 fw-semibold">
                            {{ count($support) }} Closed Tickets
                        </span>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="dash-table-wrapper p-3">
                        <table id="file-export" class="table table-hover align-middle mb-0 text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Request Date</th>
                                    <th>Ticket ID</th>
                                    <th>Member ID</th>
                                    <th>Member Name</th>
                                    <th>Subject</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" style="width: 110px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @forelse ($support as $list)
                                    <tr>
                                        <td class="text-center text-muted fw-semibold fs-12">{{ $i }}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-semibold text-dark fs-12.5">{{ date('d M, Y', strtotime($list['created_at'])) }}</span>
                                                <small class="text-muted fs-11">{{ date('h:i A', strtotime($list['created_at'])) }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1.5">
                                                <span class="badge bg-light text-dark border font-monospace px-2 py-1 fs-11 fw-semibold">
                                                    #{{ $list['ticket_id'] }}
                                                </span>
                                                <button type="button" class="btn btn-icon btn-sm btn-light border-0 text-muted p-0"
                                                    style="width: 22px; height: 22px;"
                                                    onclick="navigator.clipboard.writeText('{{ $list['ticket_id'] }}')"
                                                    title="Copy Ticket ID">
                                                    <i class="bx bx-copy fs-12"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xs avatar-rounded bg-primary-subtle text-primary me-1.5 fw-bold fs-10">
                                                    {{ strtoupper(substr($list['memberid'], 0, 2)) }}
                                                </div>
                                                <span class="fw-bold text-dark fs-12 font-monospace">{{ $list['memberid'] }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-dark fs-12.5">{{ getName($list['memberid']) }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-dark fs-13 d-inline-block text-truncate" style="max-width: 280px;" title="{{ $list['subject'] }}">
                                                {{ $list['subject'] }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2.5 py-1 fs-11 fw-semibold">
                                                <i class="bx bx-lock-alt me-1"></i>Closed
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/support/view-closed-ticket') }}/{{ $list['id'] }}"
                                                class="btn btn-sm btn-outline-primary btn-wave d-inline-flex align-items-center px-3 py-1">
                                                <i class="bx bx-show me-1 fs-14"></i> View Details
                                            </a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-5 text-muted">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bx bx-folder-open fs-48 text-muted opacity-50 mb-2"></i>
                                                <h6 class="fw-bold text-dark mb-1">No Closed Support Tickets Found</h6>
                                                <p class="fs-12 text-muted mb-0">No archived or closed support tickets match the current filter criteria.</p>
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

    <!-- Quick Date Preset Script -->
    <script>
        function applyPreset(preset) {
            const startInput = document.getElementById('start_date');
            const endInput = document.getElementById('end_date');
            const now = new Date();

            const formatDate = (date) => {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            };

            if (preset === 'today') {
                const todayStr = formatDate(now);
                startInput.value = todayStr;
                endInput.value = todayStr;
            } else if (preset === 'yesterday') {
                const yesterday = new Date(now);
                yesterday.setDate(now.getDate() - 1);
                const yestStr = formatDate(yesterday);
                startInput.value = yestStr;
                endInput.value = yestStr;
            } else if (preset === '7days') {
                const past7 = new Date(now);
                past7.setDate(now.getDate() - 6);
                startInput.value = formatDate(past7);
                endInput.value = formatDate(now);
            } else if (preset === 'month') {
                const firstDay = new Date(now.getFullYear(), now.getMonth(), 1);
                startInput.value = formatDate(firstDay);
                endInput.value = formatDate(now);
            } else if (preset === 'all') {
                startInput.value = '';
                endInput.value = '';
                document.getElementById('closeTicketFilterForm').submit();
                return;
            }

            document.getElementById('closeTicketFilterForm').submit();
        }
    </script>
@endsection
