@extends('admin.layouts.main')
@section('title', 'Closed Ticket #' . $support['ticket_id'] . ' - Resolved')
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
                                        <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                                            <h4 class="fw-bold mb-0 text-dark">Closed Ticket #{{ $support['ticket_id'] }}</h4>
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                <i class="bx bx-lock-alt me-1"></i>Resolved / Closed
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">{{ $support['subject'] }}</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-2 flex-wrap">
                                    <a href="{{ url('admin/support/close-support-ticket') }}" class="btn btn-light border btn-sm px-3 d-flex align-items-center">
                                        <i class="bx bx-arrow-back me-1 fs-15"></i> Back to Closed Tickets
                                    </a>
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

            <!-- Main Content Grid -->
            <div class="row g-4">

                <!-- Left Column: Ticket Info & Member Details -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card custom-card card-heavy mb-4">
                        <div class="card-header border-bottom py-3">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-xs avatar-rounded bg-success-subtle text-success me-2">
                                    <i class="bx bx-info-circle fs-15"></i>
                                </span>
                                <h6 class="card-title mb-0 fw-bold fs-14">Closed Ticket Archive</h6>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex justify-content-between align-items-center pb-2 border-bottom">
                                    <span class="text-muted fs-12 fw-medium">Ticket ID</span>
                                    <div class="d-flex align-items-center gap-1">
                                        <span class="font-monospace fw-bold text-dark fs-12">#{{ $support['ticket_id'] }}</span>
                                        <button type="button" class="btn btn-icon btn-sm btn-light border-0 text-muted p-0"
                                            style="width: 20px; height: 20px;"
                                            onclick="navigator.clipboard.writeText('{{ $support['ticket_id'] }}')"
                                            title="Copy Ticket ID">
                                            <i class="bx bx-copy fs-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pb-2 border-bottom">
                                    <span class="text-muted fs-12 fw-medium">Member ID</span>
                                    <div class="d-flex align-items-center gap-1.5">
                                        <span class="badge bg-primary-subtle text-primary font-monospace px-2 py-0.5 fs-11 fw-bold">
                                            {{ $support['memberid'] }}
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pb-2 border-bottom">
                                    <span class="text-muted fs-12 fw-medium">Member Name</span>
                                    <span class="fw-semibold text-dark fs-12.5">{{ getName($support['memberid']) }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pb-2 border-bottom">
                                    <span class="text-muted fs-12 fw-medium">Submitted On</span>
                                    <span class="fw-semibold text-dark fs-12">{{ date('d M Y, h:i A', strtotime($support['created_at'])) }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pb-2 border-bottom">
                                    <span class="text-muted fs-12 fw-medium">Ticket Status</span>
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2.5 py-0.5 fs-11 fw-semibold">
                                        <i class="bx bx-lock-alt me-1"></i>Closed
                                    </span>
                                </div>

                                <div>
                                    <span class="text-muted fs-12 fw-medium d-block mb-1">Subject</span>
                                    <p class="fw-bold text-dark fs-13 mb-0 p-2.5 bg-light rounded border">
                                        {{ $support['subject'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Conversation Thread History -->
                <div class="col-xl-8 col-lg-7">
                    <div class="ticket-chat-card mb-4">
                        <div class="ticket-chat-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded bg-success-subtle text-success me-2">
                                    <i class="bx bx-history fs-16"></i>
                                </span>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark fs-14">Ticket Thread Archive</h6>
                                    <small class="text-muted fs-11">Total {{ count($tictext) }} message(s) in this resolved ticket</small>
                                </div>
                            </div>
                            <span class="badge bg-secondary-subtle text-secondary border px-2.5 py-1 fs-11">
                                <i class="bx bx-lock-alt me-1"></i>Thread Closed
                            </span>
                        </div>

                        <!-- Chat Messages Container -->
                        <div class="ticket-chat-body" id="closedTicketChatBody">
                            @forelse ($tictext->reverse() as $item)
                                @if ($item['written_by'] == 'Admin')
                                    <!-- Admin Message (Right Side) -->
                                    <div class="ticket-msg-row msg-admin">
                                        <div class="ticket-msg-avatar admin-avatar" title="Admin Support">
                                            <i class="bx bx-shield-quarter"></i>
                                        </div>
                                        <div>
                                            <div class="ticket-bubble">
                                                {{ $item['text'] }}
                                            </div>
                                            <div class="ticket-msg-meta">
                                                <span class="fw-semibold text-primary">Admin</span>
                                                <span>•</span>
                                                <span>{{ date('d M, h:i A', strtotime($item['created_at'])) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <!-- Member Message (Left Side) -->
                                    <div class="ticket-msg-row msg-member">
                                        <div class="ticket-msg-avatar member-avatar" title="{{ $support['memberid'] }}">
                                            <i class="bx bx-user"></i>
                                        </div>
                                        <div>
                                            <div class="ticket-bubble">
                                                {{ $item['text'] }}
                                            </div>
                                            <div class="ticket-msg-meta">
                                                <span class="fw-semibold text-dark">{{ getName($support['memberid']) }} ({{ $support['memberid'] }})</span>
                                                <span>•</span>
                                                <span>{{ date('d M, h:i A', strtotime($item['created_at'])) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="text-center py-5 text-muted">
                                    <i class="bx bx-message-rounded-minus fs-40 mb-2 opacity-50"></i>
                                    <p class="mb-0 fs-13">No messages recorded in this conversation.</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Closed Ticket Notice Footer -->
                        <div class="ticket-chat-footer bg-light text-center py-3">
                            <span class="text-muted fs-12 fw-semibold">
                                <i class="bx bx-check-circle text-success me-1"></i> This ticket has been resolved and closed. It is kept for historical reference.
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Auto Scroll Chat to Bottom -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chatBody = document.getElementById('closedTicketChatBody');
            if (chatBody) {
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        });
    </script>
@endsection
