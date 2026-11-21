@extends('member.layouts.main')
@section('title', 'Create Support Ticket')
@section('container')

    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h1 class="page-title fw-semibold fs-18 mb-1">Create Support Ticket</h1>
                    <p class="text-muted fs-12 mb-0">Submit a query or request assistance from our 24/7 dedicated support team</p>
                </div>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('member/support/support-tickets') }}">Support Section</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Ticket</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Flash Message -->
            @if (session()->has('createMsg'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
                    <i class="ri-checkbox-circle-fill fs-5 me-2"></i>
                    <div>{{ session('createMsg') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- 2-Column Balanced Layout -->
            <div class="row g-4">
                <!-- Left Column: Create Ticket Form -->
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-12">
                    <div class="card custom-card shadow-sm border-0 h-100" style="border-radius: 14px;">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom py-3">
                            <div class="card-title mb-0 d-flex align-items-center">
                                <i class="ri-customer-service-2-fill text-primary me-2 fs-18"></i>
                                <span class="fw-bold fs-15">New Ticket Details</span>
                            </div>
                            <span class="badge bg-primary-transparent fs-11 px-2.5 py-1 rounded-pill">
                                Average Response: < 2 Hours
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('createTicket') }}" method="post" id="createTicketForm">
                                @csrf

                                <!-- Member ID (Readonly) -->
                                <div class="mb-3">
                                    <label class="form-label text-default fw-semibold fs-13">Member ID</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="ri-user-3-line text-muted"></i></span>
                                        <input type="text" class="form-control" name="userid" value="{{ $data['memberid'] }}" readonly />
                                    </div>
                                </div>

                                <!-- Subject -->
                                <div class="mb-3">
                                    <label for="ticketSubject" class="form-label text-default fw-semibold fs-13">
                                        Subject <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="ri-chat-1-line text-muted"></i></span>
                                        <input type="text" class="form-control" name="subject" id="ticketSubject"
                                               placeholder="e.g. Query regarding slot activation / deposit status" required />
                                    </div>
                                    @error('subject')
                                        <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Issue / Particular Message -->
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label for="ticketIssue" class="form-label text-default fw-semibold fs-13 mb-0">
                                            Description / Particulars <span class="text-danger">*</span>
                                        </label>
                                        <span class="text-muted fs-11">Provide complete details</span>
                                    </div>
                                    <textarea class="form-control" name="issue" id="ticketIssue" rows="6"
                                              placeholder="Please describe your issue or question in detail. Mention any relevant transaction IDs, dates, or error messages..." required></textarea>
                                    @error('issue')
                                        <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-between align-items-center pt-2">
                                    <a href="{{ url('member/support/support-tickets') }}" class="btn btn-light border px-3 fs-13">
                                        <i class="ri-arrow-left-line me-1"></i> View Tickets
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4 py-2 fs-14 fw-semibold" id="ticketSubmitBtn">
                                        <i class="ri-send-plane-fill me-1.5"></i> Submit Support Ticket
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Support Channels & Help Guidelines -->
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-12">
                    <div class="d-flex flex-column gap-4">
                        <!-- Support Channels Info Card -->
                        <div class="card custom-card shadow-sm border-0" style="border-radius: 14px;">
                            <div class="card-header border-bottom py-3">
                                <div class="card-title mb-0 d-flex align-items-center fs-14">
                                    <i class="ri-headphone-fill text-info me-2 fs-16"></i>
                                    <span class="fw-bold">Official Support Channels</span>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center p-2.5 rounded-3 mb-2.5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
                                    <div class="avatar avatar-md rounded-circle bg-info-transparent text-info me-3 flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <i class="ri-ticket-2-line fs-20"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <span class="fs-11 fw-semibold text-info text-uppercase d-block">Online Ticket Desk</span>
                                        <h6 class="fw-bold mb-0 text-dark fs-13 text-truncate">24/7 Ticketing System</h6>
                                        <span class="text-muted fs-11">Fastest response for account queries</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center p-2.5 rounded-3" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);">
                                    <div class="avatar avatar-md rounded-circle bg-success-transparent text-success me-3 flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <i class="ri-shield-check-line fs-20"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <span class="fs-11 fw-semibold text-success text-uppercase d-block">Verified Security</span>
                                        <h6 class="fw-bold mb-0 text-dark fs-13 text-truncate">Official Assistance</h6>
                                        <span class="text-muted fs-11">Never share your transaction password</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Ticket Submission Guidelines -->
                        <div class="card custom-card shadow-sm border-0" style="border-radius: 14px;">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <div class="card-title mb-0 d-flex align-items-center fs-14">
                                    <i class="ri-information-line text-warning me-2 fs-16"></i>
                                    <span class="fw-bold">Important Instructions</span>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="d-flex flex-column gap-3 fs-12">
                                    <div class="d-flex align-items-start">
                                        <i class="ri-check-line text-success fs-16 me-2 mt-0.5 flex-shrink-0"></i>
                                        <div>
                                            <strong class="text-dark">Be Clear & Specific:</strong>
                                            <div class="text-muted">Mention the exact order ID, amount, or wallet address involved in your query.</div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start">
                                        <i class="ri-check-line text-success fs-16 me-2 mt-0.5 flex-shrink-0"></i>
                                        <div>
                                            <strong class="text-dark">Track Status Anytime:</strong>
                                            <div class="text-muted">You can review replies and view conversation logs anytime in <a href="{{ url('member/support/support-tickets') }}" class="text-primary fw-medium">Support Tickets</a>.</div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start">
                                        <i class="ri-close-line text-danger fs-16 me-2 mt-0.5 flex-shrink-0"></i>
                                        <div>
                                            <strong class="text-dark">Do Not Duplicate:</strong>
                                            <div class="text-muted">Avoid submitting multiple tickets for the same issue to prevent delay in processing.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('createTicketForm');
            const submitBtn = document.getElementById('ticketSubmitBtn');

            if (form && submitBtn) {
                form.addEventListener('submit', function () {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Submitting Ticket...';
                });
            }
        });
    </script>

@endsection
