@extends('admin.layouts.main') 
@section('title', 'View Closed Tickets')
@section('container')

   <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">View Closed Tickets</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">View Closed Tickets</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Closed Tickets</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->

            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xxl-6 col-xl-8 col-lg-8 col-md-8 col-sm-12">
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('successMsg') }}
                        </div>
                    @endif
                    <div class="main-chart-wrapper p-2 gap-2 d-lg-flex">
                        <div class="chat-info border" style="display: none">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active border-0 chat-users-tab" id="users-tab-pane"
                                    role="tabpanel" aria-labelledby="users-tab" tabindex="0">
                                    <ul class="list-unstyled mb-0 mt-2 chat-users-tab" id="chat-msg-scroll"
                                        data-simplebar="init">
                                        <div class="simplebar-wrapper" style="margin: 0px">
                                            <div class="simplebar-height-auto-observer-wrapper">
                                                <div class="simplebar-height-auto-observer"></div>
                                            </div>
                                            <div class="simplebar-mask">
                                                <div class="simplebar-offset" style="right: 0px; bottom: 0px">
                                                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                        aria-label="scrollable content"
                                                        style="height: auto; overflow: hidden scroll">
                                                        <div class="simplebar-content" style="padding: 0px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="simplebar-placeholder" style="width: auto; height: 694px"></div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-chat-area border show active " style="display:block">
                            <div class="d-flex align-items-center p-2 border-bottom">
                                <div class="me-2 lh-1">
                                    <span class="avatar avatar-lg online me-2 avatar-rounded chatstatusperson">
                                        <img class="chatimageperson" src="{{ asset('a_assets/images/faces/9.jpg') }}"
                                            alt="img" />
                                    </span>
                                </div>
                                <div class="flex-fill">
                                    <p class="mb-0 fw-semibold fs-14">
                                        <a href="javascript:void(0);"
                                            class="chatnameperson responsive-userinfo-open">Admin</a>
                                    </p>
                                    <p class="text-muted mb-0 chatpersonstatus">status <span class="badge bg-danger text-white">{{$support['status']}}</span></p>
                                </div>
                                <div class="d-flex flex-wrap rightIcons m-2">
                                    <a href="{{ url('/admin/support/close-support-ticket') }}"
                                        class="btn btn-primary">Back</a>
                                </div>
                            </div>
                            <div class="chat-content" id="main-chat-content" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: -40px">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content" style="height: auto; overflow: hidden">
                                                <div class="simplebar-content" style="padding: 40px">
                                                    <ul class="list-unstyled">
                                                        {{-- <li class="chat-day-label"><span>Today</span></li> --}}
                                                        @foreach ($tictext as $item)
                                                            @if ($item['written_by'] == 'Admin')
                                                                <li class="chat-item-start">
                                                                    <div class="chat-list-inner">
                                                                        <div class="chat-user-profile">
                                                                            <span
                                                                                class="avatar avatar-md online avatar-rounded chatstatusperson">
                                                                                <img class="chatimageperson"
                                                                                    src="{{ asset('a_assets/images/faces/9.jpg') }}"
                                                                                    alt="img" />
                                                                            </span>
                                                                        </div>
                                                                        <div class="ms-3">
                                                                            <span class="chatting-user-info">
                                                                                <span class="chatnameperson">Admin</span>
                                                                                <span
                                                                                    class="msg-sent-time">{{ date('H:i a', strtotime($item['created_at'])) }}</span>
                                                                            </span>
                                                                            <div class="main-chat-msg"
                                                                                style="padding: 0px">
                                                                                <div>
                                                                                    <p class="mb-0">{{ $item['text'] }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @else
                                                                <li class="chat-item-end">
                                                                    <div class="chat-list-inner">
                                                                        <div class="me-3">
                                                                            <span class="chatting-user-info">
                                                                                <span class="msg-sent-time"><span
                                                                                        class="chat-read-mark align-middle d-inline-flex"><i
                                                                                            class="ri-check-double-line"></i></span>{{ date('H:i a', strtotime($item['created_at'])) }}</span>
                                                                                {{ $support['memberid'] }}
                                                                            </span>
                                                                            <div class="main-chat-msg">
                                                                                <div>
                                                                                    <p class="mb-0">{{ $item['text'] }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="chat-user-profile">
                                                                            <span
                                                                                class="avatar avatar-md online avatar-rounded">
                                                                                @if (getProfileImage($item['ticket_id']) == '')
                                                                                    <img src="{{ asset('a_assets/images/faces/15.jpg') }}"
                                                                                        alt="img" />
                                                                                @else
                                                                                    <img src="{{ asset('uploads') }}/{{ getProfileImage($item['ticket_id']) }}"
                                                                                        alt="img" />
                                                                                @endif
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden">
                                    <div class="simplebar-scrollbar"
                                        style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection