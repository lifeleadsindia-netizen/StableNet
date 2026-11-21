@extends('admin.layouts.main')
@section('title', 'Ticket #' . $support['ticket_id'] . ' - Support Discussion')
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
                                        <span class="avatar avatar-lg avatar-rounded avatar-primary">
                                            <i class="bx bx-chat fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                                            <h4 class="fw-bold mb-0 text-dark">Ticket #{{ $support['ticket_id'] }}</h4>
                                            @if ($support['status'] == 'Closed')
                                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                    <i class="bx bx-lock-alt me-1"></i>Closed
                                                </span>
                                            @elseif ($support['support_status'] == 'New')
                                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                    <i class="bx bx-time-five me-1"></i>New / Awaiting Reply
                                                </span>
                                            @else
                                                <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                    <i class="bx bx-sync me-1"></i>Open / Replied
                                                </span>
                                            @endif
                                        </div>
                                        <p class="text-muted fs-13 mb-0">{{ $support['subject'] }}</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-2 flex-wrap">
                                    <a href="{{ url('/admin/closed-ticket') }}/{{ $support['ticket_id'] }}"
                                        class="btn btn-outline-danger btn-wave btn-sm px-3 d-flex align-items-center"
                                        onclick="return confirm('Are you sure you want to mark this ticket as closed?')">
                                        <i class="bx bx-check-circle me-1.5 fs-15"></i> Close Ticket
                                    </a>
                                    <a href="{{ url('admin/support/new-support-ticket') }}" class="btn btn-light border btn-sm px-3 d-flex align-items-center">
                                        <i class="bx bx-arrow-back me-1 fs-15"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts Section -->
            @if (session()->has('createMsg'))
                <div class="alert custom-alert custom-alert-success alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-check-circle fs-20 me-2 text-success"></i>
                        <span>{{ session('createMsg') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
                                <span class="avatar avatar-xs avatar-rounded bg-primary-subtle text-primary me-2">
                                    <i class="bx bx-info-circle fs-15"></i>
                                </span>
                                <h6 class="card-title mb-0 fw-bold fs-14">Ticket Information</h6>
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
                                    <span class="text-muted fs-12 fw-medium">Created On</span>
                                    <span class="fw-semibold text-dark fs-12">{{ date('d M Y, h:i A', strtotime($support['created_at'])) }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center pb-2 border-bottom">
                                    <span class="text-muted fs-12 fw-medium">Status</span>
                                    @if ($support['status'] == 'Closed')
                                        <span class="badge bg-secondary text-white rounded-pill px-2.5 py-0.5 fs-11">Closed</span>
                                    @elseif ($support['support_status'] == 'New')
                                        <span class="badge bg-warning text-dark rounded-pill px-2.5 py-0.5 fs-11">New</span>
                                    @else
                                        <span class="badge bg-info text-white rounded-pill px-2.5 py-0.5 fs-11">Open</span>
                                    @endif
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

                <!-- Right Column: Conversation Thread & Reply Form -->
                <div class="col-xl-8 col-lg-7">
                    <div class="ticket-chat-card mb-4">
                        <div class="ticket-chat-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded bg-primary-subtle text-primary me-2">
                                    <i class="bx bx-message-dots fs-16"></i>
                                </span>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark fs-14">Discussion Thread</h6>
                                    <small class="text-muted fs-11">Total {{ count($tictext) }} message(s) in this conversation</small>
                                </div>
                            </div>
                            <span class="badge bg-light text-muted border px-2.5 py-1 fs-11">
                                <i class="bx bx-time me-1"></i>Last Updated: {{ count($tictext) > 0 ? date('d M, h:i A', strtotime($tictext[0]['created_at'])) : date('d M, h:i A') }}
                            </span>
                        </div>

                        <!-- Chat Messages Container -->
                        <div class="ticket-chat-body" id="ticketChatBody">
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
                                    <p class="mb-0 fs-13">No messages yet in this conversation.</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Reply Input Form -->
                        @if ($support['status'] != 'Closed')
                            <div class="ticket-chat-footer">
                                <form action="{{ route('Ticket') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ticket_id" value="{{ $support['ticket_id'] }}">
                                    <div class="d-flex gap-2 align-items-center">
                                        <input type="text" name="reply" class="form-control py-2.5 px-3"
                                            placeholder="Write your reply to the member here..."
                                            required autocomplete="off">
                                        <button type="submit" class="btn btn-primary btn-wave px-4 py-2.5 d-flex align-items-center justify-content-center fw-semibold">
                                            <i class="bx bx-send me-1.5 fs-16"></i> Send
                                        </button>
                                    </div>
                                    @error('reply')
                                        <span class="text-danger fs-11 mt-1 d-block">{{ $message }}</span>
                                    @enderror
                                </form>
                            </div>
                        @else
                            <div class="ticket-chat-footer bg-light text-center py-3">
                                <span class="text-muted fs-12 fw-semibold">
                                    <i class="bx bx-lock-alt me-1"></i> This ticket is closed. Reopen or create a new ticket to continue conversation.
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Auto Scroll Chat to Bottom -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chatBody = document.getElementById('ticketChatBody');
            if (chatBody) {
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        });
    </script>
@endsection
