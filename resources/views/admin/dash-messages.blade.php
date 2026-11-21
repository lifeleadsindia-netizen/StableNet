@extends('admin.layouts.main')
@section('title', 'Dashboard Messages')
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
                                            <i class="bx bx-broadcast fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h4 class="fw-bold mb-0 text-dark">Dashboard Messages</h4>
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                Broadcast Notice
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">Manage live announcements and priority popups displayed on member dashboards</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-3">
                                    <div class="header-stat-pill">
                                        <span class="text-muted fs-12">Total Messages:</span>
                                        <span class="fw-bold text-dark fs-14 ms-1">{{ count($data) }}</span>
                                    </div>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-primary"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item active text-muted" aria-current="page">Dashboard Messages</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts Section -->
            @if (session()->has('uploadMsg'))
                <div class="alert custom-alert custom-alert-success alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-check-circle fs-20 me-2 text-success"></i>
                        <span><strong>Success!</strong> {{ session('uploadMsg') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('delMsg'))
                <div class="alert custom-alert custom-alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-trash fs-20 me-2 text-danger"></i>
                        <span><strong>Deleted!</strong> {{ session('delMsg') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Main Content Row -->
            <div class="row">

                <!-- Left Column: Publish Form -->
                <div class="col-xl-5 col-lg-5 col-md-12 mb-4">
                    <div class="card custom-card card-heavy card-light-indigo h-100">
                        <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded avatar-indigo me-2">
                                    <i class="bx bx-message-square-add fs-16"></i>
                                </span>
                                <div>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-15">Publish New Message</h5>
                                    <small class="text-muted fs-11">Broadcast to all active members</small>
                                </div>
                            </div>
                            <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill px-2 py-1 fs-11 fw-semibold">
                                <i class="bx bx-bolt-circle me-1"></i>Live Notice
                            </span>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('dashMsg') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Rank / Priority -->
                                <div class="mb-3">
                                    <label class="form-label-custom fw-semibold mb-1">
                                        <i class="bx bx-sort-up text-primary me-1"></i> Priority Rank <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group dash-input-group">
                                        <span class="input-group-text"><i class="bx bx-hash fs-16"></i></span>
                                        <input type="number" class="form-control @error('rank') is-invalid @enderror" name="rank"
                                            placeholder="e.g. 1 (Top priority)" min="1" value="{{ old('rank') }}" required>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <small class="text-muted fs-11"><i class="bx bx-info-circle me-1"></i> Unique priority order (1 is displayed first)</small>
                                    </div>
                                    @error('rank')
                                        <div class="text-danger fs-12 mt-1"><i class="bx bx-error-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Announcement Message -->
                                <div class="mb-4">
                                    <label class="form-label-custom fw-semibold mb-1">
                                        <i class="bx bx-message-detail text-primary me-1"></i> Notice Message <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group dash-input-group">
                                        <span class="input-group-text align-items-start pt-2"><i class="bx bx-edit-alt fs-16"></i></span>
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4"
                                            placeholder="Enter announcement text or news message for the user dashboard..." required>{{ old('message') }}</textarea>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <small class="text-muted fs-11"><i class="bx bx-globe me-1"></i> Visible immediately across member dashboard alerts</small>
                                    </div>
                                    @error('message')
                                        <div class="text-danger fs-12 mt-1"><i class="bx bx-error-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="pt-2">
                                    <button type="submit" class="btn btn-signin w-100 py-2.5 d-flex align-items-center justify-content-center gap-2">
                                        <i class="bx bx-send fs-18"></i> Publish Announcement
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Messages History Table -->
                <div class="col-xl-7 col-lg-7 col-md-12 mb-4">
                    <div class="card custom-card card-heavy card-light-blue h-100">
                        <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded avatar-teal me-2">
                                    <i class="bx bx-history fs-16"></i>
                                </span>
                                <div>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-15">Published Messages</h5>
                                    <small class="text-muted fs-11">All current live notices and archives</small>
                                </div>
                            </div>
                            <span class="badge bg-teal-subtle text-teal border border-teal-subtle rounded-pill px-2.5 py-1 fs-12 fw-semibold">
                                <i class="bx bx-list-check me-1"></i> {{ count($data) }} Records
                            </span>
                        </div>

                        <div class="card-body p-4">
                            <div class="table-responsive dash-table-wrapper bg-white">
                                <table id="file-export" class="table table-hover align-middle w-100 text-nowrap mb-0"
                                    aria-describedby="file-export_info">
                                    <thead class="dash-table-head">
                                        <tr>
                                            <th class="text-center" style="width: 60px;">#</th>
                                            <th style="width: 120px;">Priority</th>
                                            <th>Announcement Message</th>
                                            <th class="text-center" style="width: 110px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @forelse ($data as $list)
                                            <tr class="dash-table-row">
                                                <td class="text-center fw-semibold text-muted">{{ $i }}</td>
                                                <td>
                                                    <span class="badge bg-indigo-subtle text-indigo border border-indigo-subtle rounded-pill px-2.5 py-1 fw-bold fs-12 d-inline-flex align-items-center gap-1">
                                                        <i class="bx bx-sort-alt-2"></i> Rank {{ $list['rank'] }}
                                                    </span>
                                                </td>
                                                <td class="text-wrap" style="max-width: 320px;">
                                                    <div class="d-flex align-items-start gap-2">
                                                        <span class="avatar avatar-xs avatar-rounded bg-light text-primary flex-shrink-0 mt-0.5">
                                                            <i class="bx bx-message-rounded-dots fs-13"></i>
                                                        </span>
                                                        <div>
                                                            <span class="fw-semibold text-dark fs-13 d-block lh-base">{{ $list['message'] }}</span>
                                                            @if(!empty($list['created_at']))
                                                                <small class="text-muted fs-11 d-inline-flex align-items-center gap-1 mt-1">
                                                                    <i class="bx bx-time-five"></i> {{ \Carbon\Carbon::parse($list['created_at'])->format('d M, Y h:i A') }}
                                                                </small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('admin/dash-messages/delete') }}/{{ $list['id'] }}"
                                                        class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1 shadow-sm"
                                                        onclick="return confirm('Are you sure you want to delete this message?');"
                                                        title="Delete Message">
                                                        <i class="bx bx-trash fs-14"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-5">
                                                    <div class="empty-state py-4">
                                                        <span class="avatar avatar-xl avatar-rounded bg-light text-muted mb-3">
                                                            <i class="bx bx-message-x fs-28"></i>
                                                        </span>
                                                        <h6 class="fw-bold text-dark mb-1">No Messages Found</h6>
                                                        <p class="text-muted fs-13 mb-0">Use the form on the left to publish your first dashboard announcement.</p>
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
@endsection
