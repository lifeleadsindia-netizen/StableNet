@extends('member.layouts.main')
@section('title', 'Support Tickets')
@section('container')


    <div class="main-content app-content">
        <!-- row -->
        <div class="container-lg mt-3">
            <h4 class="fw-bold mb-4 ">
                <span class=" fw-light ">{{ config('detailsApp.name') }} /</span>Support Tickets
            </h4>
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Support Tickets</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Support Tickets</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Support Section</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row authentication authentication-basic h-100">
                @foreach ($support as $list)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="avatar avatar-md avatar-rounded bg-success me-2">
                                        <i class="ti ti-rocket fs-18"></i>
                                    </span>
                                    <p class="mb-0 flex-fill text-muted">View Support Ticket</p>
                                </div>
                                <span class="fs-5 fw-semibold">Subject : <span
                                        class="text-primary">{{ $list['subject'] }}</span></span>
                                {{-- <span class="fs-12 text-success ms-1"><i
                                        class="ti ti-trending-up me-1 d-inline-block"></i>3.5%</span> --}}
                                <div class="fw-normal d-flex align-items-center mb-2 mt-3">
                                    <p class="mb-0 flex-fill">Created Date </p>
                                    <span>{{ date('d-M-Y', strtotime($list['created_at'])) }}</span>
                                </div>
                                <div class="fw-normal d-flex align-items-center mb-2 mt-3">
                                    <p class="mb-0 flex-fill">Status </p>
                                    @if ($list['status'] == 'Open')
                                        <span class="btn btn-sm btn-success">{{ $list['status'] }}</span>
                                    @else
                                        <span class="btn btn-sm btn-danger">{{ $list['status'] }}</span>
                                    @endif
                                </div>
                                <div class="fw-normal d-flex align-items-center mb-2 mt-3">
                                    <p class="mb-0 flex-fill">Unread </p>
                                    @if ($list['ticket_id'] == 0)
                                        <span class="badge bg-dark text-white">{{  userUnread($list['ticket_id']) }}</span>
                                    @else
                                        <span class="badge bg-danger text-white">{{  userUnread($list['ticket_id']) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <div class="d-grid">
                                    <a href="{{ url('member/support/view-support-ticket') }}/{{ $list['ticket_id'] }}"
                                        class="text-primary">ID : {{ $list['ticket_id'] }} (View)<i
                                            class="ti ti-external-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
