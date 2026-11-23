@extends('member.layouts.main')
@section('title', 'Import Fund History')
@section('container')

<style>
    .history-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 24px -2px rgba(17, 28, 67, 0.06);
        overflow: hidden;
    }

    .stat-mini-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: 0 2px 12px rgba(17, 28, 67, 0.04);
        transition: all 0.2s ease;
    }

    .stat-mini-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(17, 28, 67, 0.08);
        border-color: #cbd5e1;
    }
</style>

<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Page Header Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h1 class="page-title fw-bold fs-20 mb-1" style="color: #111c43;">Import Fund History</h1>
                <p class="text-muted fs-13 mb-0">Complete statement of your cryptocurrency fund imports</p>
            </div>
            <div class="ms-md-1 ms-0 mt-md-0 mt-2">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}" class="text-primary"><i class="ti ti-home-2 me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item text-muted">Import Section</li>
                        <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page">Import Fund History</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Summary Stat Cards -->
        <div class="row g-3 mb-4">
            <div class="col-xl-4 col-md-4 col-12">
                <div class="stat-mini-card d-flex align-items-center justify-content-between">
                    <div>
                        <span class="fs-12 fw-semibold text-muted text-uppercase tracking-wider">Total Imported Funds</span>
                        <h4 class="fw-bold mb-0 mt-1 text-dark">
                            $ {{ number_format($addfundData->sum('amount'), 2) }}
                        </h4>
                    </div>
                    <span class="avatar avatar-md avatar-rounded" style="background: rgba(35, 183, 229, 0.18); color: #0284c7;">
                        <i class="ti ti-coins fs-20"></i>
                    </span>
                </div>
            </div>

            <div class="col-xl-4 col-md-4 col-12">
                <div class="stat-mini-card d-flex align-items-center justify-content-between">
                    <div>
                        <span class="fs-12 fw-semibold text-muted text-uppercase tracking-wider">Total Transactions</span>
                        <h4 class="fw-bold mb-0 mt-1 text-dark">
                            {{ $addfundData->count() }}
                        </h4>
                    </div>
                    <span class="avatar avatar-md avatar-rounded" style="background: rgba(99, 102, 241, 0.18); color: #6366f1;">
                        <i class="ti ti-receipt fs-20"></i>
                    </span>
                </div>
            </div>

            <div class="col-xl-4 col-md-4 col-12">
                <div class="stat-mini-card d-flex align-items-center justify-content-between">
                    <div>
                        <span class="fs-12 fw-semibold text-muted text-uppercase tracking-wider">Approved Records</span>
                        <h4 class="fw-bold mb-0 mt-1 text-success">
                            {{ $addfundData->whereIn('status', ['Approved', 'Accepted'])->count() }}
                        </h4>
                    </div>
                    <span class="avatar avatar-md avatar-rounded" style="background: rgba(16, 185, 129, 0.18); color: #059669;">
                        <i class="ti ti-circle-check fs-20"></i>
                    </span>
                </div>
            </div>
        </div>

        <!-- History Table Card -->
        <div class="row">
            <div class="col-xl-12">
                <div class="history-card">
                    <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="avatar avatar-sm avatar-rounded" style="background: linear-gradient(135deg, #111c43 0%, #1e3a8a 100%); color: #ffffff;">
                                <i class="ti ti-list fs-16"></i>
                            </span>
                            <h5 class="fw-bold mb-0 text-dark">Deposit Records</h5>
                        </div>
                        <a href="{{ url('/member/fund/deposit-fund') }}" class="btn btn-sm btn-primary px-3" style="border-radius: 8px;">
                            <i class="ti ti-plus me-1"></i> Import New Fund
                        </a>
                    </div>

                    <div class="p-3">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 60px;">#</th>
                                        <th>Date & Time</th>
                                        <th>Member ID</th>
                                        <th>Order ID</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @forelse ($addfundData as $list)
                                        <tr>
                                            <td class="text-center text-muted fw-semibold">{{ $i }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-1 fs-13">
                                                    <i class="ti ti-calendar text-muted"></i>
                                                    <span>{{ date('d M Y, h:i A', strtotime($list['created_at'])) }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="fw-semibold text-dark">{{ $list['memberid'] }}</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark font-monospace border px-2 py-1">
                                                    {{ $list['orderid'] ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge" style="background: rgba(99, 102, 241, 0.12); color: #6366f1; border: 1px solid rgba(99, 102, 241, 0.25);">
                                                    {{ $list['type'] ?? 'Add' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="fw-bold text-success fs-14">
                                                    + $ {{ number_format($list['amount'], 2) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if (in_array($list['status'], ['Approved', 'Accepted']))
                                                    <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #047857; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 11px; padding: 5px 12px; border-radius: 20px;">
                                                        <i class="bi bi-check-circle-fill me-1"></i> {{ $list['status'] }}
                                                    </span>
                                                @elseif (in_array($list['status'], ['Cancelled', 'Rejected']))
                                                    <span class="badge" style="background: rgba(239, 68, 68, 0.12); color: #b91c1c; border: 1px solid rgba(239, 68, 68, 0.35); font-size: 11px; padding: 5px 12px; border-radius: 20px;">
                                                        <i class="bi bi-x-circle-fill me-1"></i> {{ $list['status'] }}
                                                    </span>
                                                @else
                                                    <span class="badge" style="background: rgba(245, 158, 11, 0.15); color: #b45309; border: 1px solid rgba(245, 158, 11, 0.35); font-size: 11px; padding: 5px 12px; border-radius: 20px;">
                                                        <i class="bi bi-clock-history me-1"></i> {{ $list['status'] ?? 'Pending' }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @empty
                                        <tr>
                                            <td colspan="7" class="no-data-found-cell">No Data Found</td>
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