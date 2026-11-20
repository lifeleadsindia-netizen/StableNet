@extends('member.layouts.main')
@section('title', 'Global Pool Income')
@section('container')

    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h1 class="page-title fw-semibold fs-18 mb-1">Global Pool Income</h1>
                    <p class="text-muted fs-12 mb-0">Track all your 10-level autopool matrix bonuses and real-time earnings</p>
                </div>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Global Pool Section</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Global Pool Income</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @php
                $totalIncome = $Data->sum('amount');
                $totalTxn = $Data->count();
                $uniqueActivating = $Data->pluck('activatingId')->filter()->unique()->count();
            @endphp

            <!-- Summary Stat Cards -->
            <div class="row g-3 mb-4">
                <!-- Total Pool Income -->
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #047857; letter-spacing: 0.5px;">
                                    Total Pool Income
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(16, 185, 129, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-money-dollar-circle-line fs-18 text-success"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format($totalIncome, 2) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-1 fs-11 fw-medium"
                                    style="background: rgba(16, 185, 129, 0.15); color: #065f46; border-radius: 6px;">
                                    <i class="ri-check-line me-1"></i> Credited to Wallet
                                </span>
                                <span class="text-muted fs-11">All 10 Pools</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Transactions -->
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #0369a1; letter-spacing: 0.5px;">
                                    Total Income Records
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(14, 165, 233, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-file-list-3-line fs-18 text-info"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                {{ number_format($totalTxn) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-1 fs-11 fw-medium"
                                    style="background: rgba(14, 165, 233, 0.15); color: #075985; border-radius: 6px;">
                                    <i class="ri-history-line me-1"></i> Transaction Log
                                </span>
                                <span class="text-muted fs-11">Lifetime Entries</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Activating Partners -->
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #6d28d9; letter-spacing: 0.5px;">
                                    Activating Members
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(139, 92, 246, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-team-line fs-18" style="color: #7c3aed;"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                {{ number_format($uniqueActivating) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-1 fs-11 fw-medium"
                                    style="background: rgba(139, 92, 246, 0.15); color: #5b21b6; border-radius: 6px;">
                                    <i class="ri-user-shared-line me-1"></i> Matrix Placements
                                </span>
                                <span class="text-muted fs-11">Contributing Downlines</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Global Pool Income Table Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card custom-card shadow-sm border-0" style="border-radius: 14px;">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom py-3">
                            <div class="card-title mb-0 d-flex align-items-center">
                                <i class="ri-pie-chart-2-fill text-primary me-2 fs-18"></i>
                                <span class="fw-bold fs-15">Global Pool Income Statements</span>
                            </div>
                            <span class="badge bg-primary-transparent fs-12 px-3 py-1.5 rounded-pill">
                                {{ $totalTxn }} {{ Str::plural('Transaction', $totalTxn) }}
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 60px;">#</th>
                                            <th>Date & Time</th>
                                            <th>Member ID</th>
                                            <th>Activating ID</th>
                                            <th>Activating Name</th>
                                            <th>Pool No</th>
                                            <th>Level</th>
                                            <th>Slot Package</th>
                                            <th>Earned Income</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($Data as $index => $list)
                                            <tr>
                                                <td class="text-center fw-semibold text-muted">{{ $index + 1 }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="ri-calendar-event-line text-muted me-1.5 fs-14"></i>
                                                        <span class="fw-medium">{{ date('d M, Y', strtotime($list['created_at'])) }}</span>
                                                        <span class="text-muted fs-11 ms-1">({{ date('h:i A', strtotime($list['created_at'])) }})</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="fw-semibold text-dark">{{ $list['memberid'] }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark border px-2 py-1 fs-12 fw-medium">
                                                        <i class="ri-user-star-line text-primary me-1"></i>
                                                        {{ $list['activatingId'] ?? 'N/A' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-secondary fw-medium">{{ $list['name'] ?? getName($list['activatingId'] ?? '') }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info-transparent text-info px-2 py-1 fs-11 fw-semibold">
                                                        Pool {{ $list['pool_no'] ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-transparent text-primary px-2 py-1 fs-11 fw-semibold">
                                                        Level {{ $list['level'] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-secondary-transparent text-secondary px-2 py-1 fs-11 fw-semibold">
                                                        ${{ number_format((float) ($list['package'] ?? 0), 2) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success-transparent text-success px-2.5 py-1.5 fs-12 fw-bold">
                                                        + ${{ number_format((float) $list['amount'], 2) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if (strtolower($list['status'] ?? 'paid') == 'paid' || empty($list['status']))
                                                        <span class="badge bg-success text-white px-2.5 py-1 fs-11 fw-semibold">
                                                            <i class="ri-check-line me-0.5"></i> Paid
                                                        </span>
                                                    @elseif (strtolower($list['status']) == 'unpaid')
                                                        <span class="badge bg-danger text-white px-2.5 py-1 fs-11 fw-semibold">
                                                            <i class="ri-close-line me-0.5"></i> Unpaid
                                                        </span>
                                                    @else
                                                        <span class="badge bg-warning text-dark px-2.5 py-1 fs-11 fw-semibold">
                                                            {{ ucfirst($list['status']) }}
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center py-5">
                                                    <div class="text-muted">
                                                        <i class="ri-inbox-line fs-36 text-muted mb-2 d-block"></i>
                                                        <h6 class="fw-bold mb-1">No Global Pool Income Yet</h6>
                                                        <p class="fs-12 mb-0">Earnings from autopool activations will automatically reflect here.</p>
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
