@extends('member.layouts.main')
@section('title', 'Support Tickets')
@section('container')

<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <h1 class="page-title fw-semibold fs-18 mb-1">Support Tickets</h1>
                <p class="text-muted fs-12 mb-0">View, track, and manage all your customer support queries and responses</p>
            </div>
            <div class="d-flex align-items-center gap-2 mt-md-0 mt-3">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Support Section</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Support Tickets</li>
                    </ol>
                </nav>
                <a href="{{ url('member/support/create-ticket') }}" class="btn btn-primary btn-sm px-3 ms-2">
                    <i class="ri-add-line me-1"></i> Create Ticket
                </a>
            </div>
        </div>

        @php
            $totalTickets = $support->count();
            $openTickets = $support->where('status', 'Open')->count();
            $closedTickets = $support->where('status', '!=', 'Open')->count();
        @endphp

        <!-- Summary Stat Cards -->
        <div class="row g-3 mb-4">
            <!-- Total Tickets -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                    style="background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%); border-radius: 14px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #6d28d9; letter-spacing: 0.5px;">
                                Total Inquiries
                            </span>
                            <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                style="background: rgba(139, 92, 246, 0.2); width: 34px; height: 34px;">
                                <i class="ri-ticket-2-line fs-18" style="color: #7c3aed;"></i>
                            </div>
                        </div>
                        <div class="fs-22 fw-bold text-dark mb-1">
                            {{ number_format($totalTickets) }}
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge px-2 py-1 fs-11 fw-medium"
                                style="background: rgba(139, 92, 246, 0.15); color: #5b21b6; border-radius: 6px;">
                                <i class="ri-history-line me-1"></i> Lifetime Tickets
                            </span>
                            <span class="text-muted fs-11">All Records</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Open / In Progress Tickets -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                    style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); border-radius: 14px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #047857; letter-spacing: 0.5px;">
                                Open Inquiries
                            </span>
                            <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                style="background: rgba(16, 185, 129, 0.2); width: 34px; height: 34px;">
                                <i class="ri-time-line fs-18 text-success"></i>
                            </div>
                        </div>
                        <div class="fs-22 fw-bold text-dark mb-1">
                            {{ number_format($openTickets) }}
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge px-2 py-1 fs-11 fw-medium"
                                style="background: rgba(16, 185, 129, 0.15); color: #065f46; border-radius: 6px;">
                                <i class="ri-loader-4-line me-1"></i> Active / In Progress
                            </span>
                            <span class="text-muted fs-11">Awaiting Reply</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Closed / Resolved Tickets -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-12">
                <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                    style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); border-radius: 14px;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #0369a1; letter-spacing: 0.5px;">
                                Resolved Tickets
                            </span>
                            <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                style="background: rgba(14, 165, 233, 0.2); width: 34px; height: 34px;">
                                <i class="ri-checkbox-circle-line fs-18 text-info"></i>
                            </div>
                        </div>
                        <div class="fs-22 fw-bold text-dark mb-1">
                            {{ number_format($closedTickets) }}
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge px-2 py-1 fs-11 fw-medium"
                                style="background: rgba(14, 165, 233, 0.15); color: #075985; border-radius: 6px;">
                                <i class="ri-check-double-line me-1"></i> Solved / Closed
                            </span>
                            <span class="text-muted fs-11">Archived Inquiries</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support Tickets List Card -->
        <div class="row">
            <div class="col-12">
                <div class="card custom-card shadow-sm border-0" style="border-radius: 14px;">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2 border-bottom py-3">
                        <div class="card-title mb-0 d-flex align-items-center">
                            <i class="ri-customer-service-2-fill text-primary me-2 fs-18"></i>
                            <span class="fw-bold fs-15">All Support Inquiries</span>
                        </div>
                        <a href="{{ url('member/support/create-ticket') }}" class="btn btn-sm btn-primary px-3">
                            <i class="ri-add-line me-1"></i> Create New Ticket
                        </a>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Ticket ID</th>
                                        <th>Created Date</th>
                                        <th>Subject</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">New Updates</th>
                                        <th class="text-center" style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @forelse ($support as $list)
                                        @php
                                            $adminUnread = AdmUnread($list['ticket_id']);
                                        @endphp
                                        <tr>
                                            <td class="text-center text-muted fw-semibold">{{ $i }}</td>
                                            <td>
                                                <span class="badge bg-light text-dark font-monospace border px-2 py-1 fs-12">
                                                    #{{ $list['ticket_id'] }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-1.5 fs-13">
                                                    <i class="ri-calendar-line text-muted"></i>
                                                    <span>{{ date('d M Y, h:i A', strtotime($list['created_at'])) }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-semibold text-dark fs-13" style="max-width: 320px; white-space: normal;">
                                                    {{ $list['subject'] }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                @if (strtolower($list['status']) == 'open')
                                                    <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #047857; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 11px; padding: 5px 12px; border-radius: 20px;">
                                                        <i class="ri-time-line me-1"></i> Open
                                                    </span>
                                                @else
                                                    <span class="badge" style="background: rgba(100, 116, 139, 0.12); color: #475569; border: 1px solid rgba(100, 116, 139, 0.3); font-size: 11px; padding: 5px 12px; border-radius: 20px;">
                                                        <i class="ri-check-line me-1"></i> {{ $list['status'] ?? 'Closed' }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($adminUnread > 0)
                                                    <span class="badge bg-danger rounded-pill px-2.5 py-1 fs-11">
                                                        <i class="ri-notification-3-line me-1"></i> {{ $adminUnread }} New Reply{{ $adminUnread > 1 ? 's' : '' }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-light text-muted border px-2 py-1 fs-11">
                                                        No New Reply
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('member/support/view-support-ticket/' . $list['ticket_id']) }}"
                                                    class="btn btn-sm btn-outline-primary px-3 py-1 fs-12 fw-medium">
                                                    <i class="ri-eye-line me-1"></i> View Ticket
                                                </a>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-5">
                                                <div class="py-3">
                                                    <div class="avatar avatar-xl rounded-circle bg-light text-muted mx-auto mb-3 d-flex align-items-center justify-content-center">
                                                        <i class="ri-customer-service-2-line fs-32 text-muted"></i>
                                                    </div>
                                                    <h6 class="fw-bold text-dark mb-1">No Support Tickets Yet</h6>
                                                    <p class="text-muted fs-12 mb-3">You haven't submitted any inquiries. Have a question or facing an issue? Contact our team anytime.</p>
                                                    <a href="{{ url('member/support/create-ticket') }}" class="btn btn-primary btn-sm px-4">
                                                        <i class="ri-add-line me-1"></i> Create Your First Ticket
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

@endsection
