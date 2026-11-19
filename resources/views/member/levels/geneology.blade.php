@extends('member.layouts.main')
@section('title', 'Geneology')
@section('container')


    <!--**********************************
        Content body start
    ***********************************-->
    <div class="main-content app-content">
        <div class="container-fluid">

              <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Geneology</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Geneology</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-center">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      @if (session()->has('failedMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                    <div class="card custom-card vh-100" style="overflow: auto">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <h4 class="card-title mt-2 ml-0" style="font-size: 18px">Search Members </h4>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('searchGenelogy') }}" method="post">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="Enter Memberid" name="searchid" maxlength="8"
                                                minlength="8" required>
                                            <button class="btn btn-sm btn-primary" type="submit"
                                                style="border-top-left-radius:0px; border-bottom-left-radius:0px ">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body" style="">
                            <div class="body genealogy-body genealogy-scroll" style="overflow-y: scroll !important;">
                                <div class="genealogy-tree">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="performance-card"
                                                        style=" background-image: url(/uploads/black.jpg);background-size: cover;">
                                                        <div class="member-image">
                                                            @if ($d_data['profile_image'] == '')
                                                                <img src="{{ asset('uploads/avatar.jpg') }}"
                                                                    alt="Profile Image">
                                                            @else
                                                                <img src="{{ asset('uploads') }}/{{ $d_data['profile_image'] }}"
                                                                    alt="Profile Image">
                                                            @endif
                                                        </div>
                                                        <div class="perfomance-cont">
                                                            <h4>{{ $d_data['memberid'] }}</h4>
                                                            @if ($d_data['status'] == 'Temp')
                                                                <h4>Inactive</h4>
                                                            @else
                                                                <h4>{{ $d_data['status'] }}</h4>
                                                            @endif
                                                        </div>
                                                        <div class="dropdown">
                                                            <div class="dropdown-menu performance-h-list">
                                                                <div class="performance-h-title color-1">
                                                                    <h4>Hi !
                                                                        {{ $d_data['name'] }}
                                                                    </h4>
                                                                </div>
                                                                <div class="performance-h-cont">
                                                                    <div class="performance-h-data">
                                                                        <h6>Sponsor Id</h6>
                                                                        <h5>:&nbsp; {{ $d_data['sponsorid'] }}</h5>
                                                                    </div>
                                                                    <div class="performance-h-data">
                                                                        <h6>Package</h6>
                                                                        <h5>:&nbsp; $ {{ $d_data['package'] }}
                                                                        </h5>
                                                                    </div>
                                                                    <div class="performance-h-data">
                                                                        <h6>Direct</h6>
                                                                        <h5>:&nbsp; {{ $d_data['downline'] }}
                                                                        </h5>
                                                                    </div>
                                                                    <div class="performance-h-data">
                                                                        <h6>Investment</h6>
                                                                        <h5>:&nbsp; $ {{ $d_data['investment'] }}
                                                                        </h5>
                                                                    </div>
                                                                    <div class="performance-h-data">
                                                                        <h6>Team Biz</h6>
                                                                        <h5>: &nbsp; $ {{ $d_data['team_biz'] }}
                                                                        </h5>
                                                                    </div>
                                                                    <div class="performance-h-data">
                                                                        <h6>Wallet</h6>
                                                                        <h5>: &nbsp; $ {{ $d_data['wallet'] }}
                                                                        </h5>
                                                                    </div>
                                                                    <div class="performance-h-data">
                                                                        <h6>Fund Wallet</h6>
                                                                        <h5>: &nbsp; $ {{ $d_data['p2p_wallet'] }}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            @if (getDirectCount($d_data['memberid']) > 0)
                                                <ul class="active">
                                                    @foreach ($directs as $item)
                                                        <li style="padding-top:0px !important;">
                                                            <a href="javascript:void(0);">
                                                                <div class="member-view-box">
                                                                    <div class="performance-card"
                                                                        style=" background-image: url(/uploads/black.jpg);background-size: cover;">
                                                                        <div class="member-image">
                                                                            <a
                                                                                href="{{ url('/member/team/view-geneology') }}/{{ $item['id'] }}">
                                                                                @if ($item['profile_image'] == '')
                                                                                    <img src="{{ asset('uploads/avatar.jpg') }}"
                                                                                        alt="Profile Image">
                                                                                @else
                                                                                    <img src="{{ asset('uploads') }}/{{ $item['profile_image'] }}"
                                                                                        alt="Profile Image">
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                        <div class="perfomance-cont">
                                                                            <h4>{{ $item['memberid'] }}</h4>
                                                                            @if ($item['status'] == 'Temp')
                                                                                <h4>Inactive</h4>
                                                                            @else
                                                                                <h4>{{ $item['status'] }}</h4>
                                                                            @endif
                                                                        </div>
                                                                        <div class="dropdown">
                                                                            <div class="dropdown-menu performance-h-list">
                                                                                <div class="performance-h-title color-1">
                                                                                    <h4>Hi !
                                                                                        {{ $item['name'] }}
                                                                                    </h4>
                                                                                </div>
                                                                                <div class="performance-h-cont">
                                                                                    <div class="performance-h-data">
                                                                                        <h6>Sponsor Id</h6>
                                                                                        <h5>:&nbsp;
                                                                                            {{ $item['sponsorid'] }}</h5>
                                                                                    </div>
                                                                                    <div class="performance-h-data">
                                                                                        <h6>Package</h6>
                                                                                        <h5>:&nbsp; $
                                                                                            {{ $item['package'] }}
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="performance-h-data">
                                                                                        <h6>Direct</h6>
                                                                                        <h5>:&nbsp; {{ $item['downline'] }}
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="performance-h-data">
                                                                                        <h6>Investment</h6>
                                                                                        <h5>:&nbsp; $
                                                                                            {{ $item['investment'] }}
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="performance-h-data">
                                                                                        <h6>Team Biz</h6>
                                                                                        <h5>: &nbsp; $
                                                                                            {{ $item['team_biz'] }}
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="performance-h-data">
                                                                                        <h6>Wallet</h6>
                                                                                        <h5>: &nbsp; $
                                                                                            {{ $item['wallet'] }}
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="performance-h-data">
                                                                                        <h6>Fund Wallet</h6>
                                                                                        <h5>: &nbsp; $
                                                                                            {{ $item['p2p_wallet'] }}
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            @if (getDirectCount($item->memberid) > 0)
                                                                <ul style="padding-top:0px !important;">
                                                                    @php
                                                                        $directs_2 = getLevelData($item['memberid']);
                                                                    @endphp
                                                                    @foreach ($directs_2 as $item_2)
                                                                        <li>
                                                                            <a href="javascript:void(0);">
                                                                                <div class="member-view-box">
                                                                                    <div class="performance-card"
                                                                                        style="    background-image: url(/uploads/black.jpg);background-size: cover;">
                                                                                        <div class="member-image">
                                                                                            <a
                                                                                                href="{{ url('/member/team/view-geneology') }}/{{ $item_2['id'] }}">
                                                                                                @if ($item_2['profile_image'] == '')
                                                                                                    <img src="{{ asset('uploads/avatar.jpg') }}"
                                                                                                        alt="Profile Image">
                                                                                                @else
                                                                                                    <img src="{{ asset('uploads') }}/{{ $item_2['profile_image'] }}"
                                                                                                        alt="Profile Image">
                                                                                                @endif
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="perfomance-cont">
                                                                                            <h4>{{ $item_2['memberid'] }}
                                                                                            </h4>
                                                                                            @if ($item_2['status'] == 'Temp')
                                                                                                <h4>Inactive</h4>
                                                                                            @else
                                                                                                <h4>{{ $item_2['status'] }}
                                                                                                </h4>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="dropdown">
                                                                                            <div
                                                                                                class="dropdown-menu performance-h-list">
                                                                                                <div
                                                                                                    class="performance-h-title color-1">
                                                                                                    <h4>Hi !
                                                                                                        {{ $item_2['name'] }}
                                                                                                    </h4>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="performance-h-cont">
                                                                                                    <div
                                                                                                        class="performance-h-data">
                                                                                                        <h6>Sponsor Id</h6>
                                                                                                        <h5>:&nbsp;
                                                                                                            {{ $item_2['sponsorid'] }}
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="performance-h-data">
                                                                                                        <h6>Package</h6>
                                                                                                        <h5>:&nbsp; $
                                                                                                            {{ $item_2['package'] }}
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="performance-h-data">
                                                                                                        <h6>Direct</h6>
                                                                                                        <h5>:&nbsp;
                                                                                                            {{ $item_2['downline'] }}
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="performance-h-data">
                                                                                                        <h6>Investment</h6>
                                                                                                        <h5>:&nbsp; $
                                                                                                            {{ $item_2['investment'] }}
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="performance-h-data">
                                                                                                        <h6>Team Biz</h6>
                                                                                                        <h5>: &nbsp; $
                                                                                                            {{ $item_2['team_biz'] }}
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="performance-h-data">
                                                                                                        <h6>Wallet</h6>
                                                                                                        <h5>: &nbsp; $
                                                                                                            {{ $item_2['wallet'] }}
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="performance-h-data">
                                                                                                        <h6>Fund Wallet</h6>
                                                                                                        <h5>: &nbsp; $
                                                                                                            {{ $item_2['p2p_wallet'] }}
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                            @if (getDirectCount($item_2['memberid']) > 0)
                                                                                <ul style="padding-top:0px !important;">
                                                                                    @php
                                                                                        $directs_3 = getLevelData(
                                                                                            $item_2['memberid'],
                                                                                        );
                                                                                    @endphp
                                                                                    @foreach ($directs_3 as $item_3)
                                                                                        <li>
                                                                                            <a href="javascript:void(0);">
                                                                                                <div
                                                                                                    class="member-view-box">
                                                                                                    <div class="performance-card"
                                                                                                        style="    background-image: url(/uploads/black.jpg);background-size: cover;">
                                                                                                        <div
                                                                                                            class="member-image">
                                                                                                            <a
                                                                                                                href="{{ url('/member/team/view-geneology') }}/{{ $item_3['id'] }}">
                                                                                                                @if ($item_3['profile_image'] == '')
                                                                                                                    <img src="{{ asset('uploads/avatar.jpg') }}"
                                                                                                                        alt="Profile Image">
                                                                                                                @else
                                                                                                                    <img src="{{ asset('uploads') }}/{{ $item_3['profile_image'] }}"
                                                                                                                        alt="Profile Image">
                                                                                                                @endif
                                                                                                            </a>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="perfomance-cont">
                                                                                                            <h4> {{ $item_3['memberid'] }}
                                                                                                            </h4>
                                                                                                            @if ($item_3['status'] == 'Temp')
                                                                                                                <h4>Inactive
                                                                                                                </h4>
                                                                                                            @else
                                                                                                                <h4>{{ $item_3['status'] }}
                                                                                                                </h4>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="dropdown">
                                                                                                            <div
                                                                                                                class="dropdown-menu performance-h-list">
                                                                                                                <div
                                                                                                                    class="performance-h-title color-1">
                                                                                                                    <h4>Hi !
                                                                                                                        {{ $item_3['name'] }}
                                                                                                                    </h4>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="performance-h-cont">
                                                                                                                    <div
                                                                                                                        class="performance-h-data">
                                                                                                                        <h6>Sponsor
                                                                                                                            Id
                                                                                                                        </h6>
                                                                                                                        <h5>:&nbsp;
                                                                                                                            {{ $item_3['sponsorid'] }}
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="performance-h-data">
                                                                                                                        <h6>Package
                                                                                                                        </h6>
                                                                                                                        <h5>:&nbsp;
                                                                                                                            $
                                                                                                                            {{ $item_3['package'] }}
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="performance-h-data">
                                                                                                                        <h6>Direct
                                                                                                                        </h6>
                                                                                                                        <h5>:&nbsp;
                                                                                                                            {{ $item_3['downline'] }}
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="performance-h-data">
                                                                                                                        <h6>Investment</h6>
                                                                                                                        <h5>:&nbsp;
                                                                                                                            $
                                                                                                                            {{ $item_3['investment'] }}
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="performance-h-data">
                                                                                                                        <h6>Team
                                                                                                                            Biz
                                                                                                                        </h6>
                                                                                                                        <h5>:
                                                                                                                            &nbsp;
                                                                                                                            $
                                                                                                                            {{ $item_3['team_biz'] }}
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="performance-h-data">
                                                                                                                        <h6>Wallet
                                                                                                                        </h6>
                                                                                                                        <h5>:
                                                                                                                            &nbsp;
                                                                                                                            $
                                                                                                                            {{ $item_3['wallet'] }}
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="performance-h-data">
                                                                                                                        <h6>Fund
                                                                                                                            Wallet
                                                                                                                        </h6>
                                                                                                                        <h5>:
                                                                                                                            &nbsp;
                                                                                                                            $
                                                                                                                            {{ $item_3['p2p_wallet'] }}
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                            @if (getDirectCount($item_3['memberid']) > 0)
                                                                                                <ul style="padding-top:0px !important;">
                                                                                                    @php
                                                                                                        $directs_4 = getLevelData(
                                                                                                            $item_3[
                                                                                                                'memberid'
                                                                                                            ],
                                                                                                        );
                                                                                                    @endphp
                                                                                                    @foreach ($directs_4 as $item_4)
                                                                                                        <li>
                                                                                                            <a
                                                                                                                href="javascript:void(0);">
                                                                                                                <div
                                                                                                                    class="member-view-box">
                                                                                                                    <div class="performance-card"
                                                                                                                        style="    background-image: url(/uploads/black.jpg);background-size: cover;">
                                                                                                                        <div
                                                                                                                            class="member-image">
                                                                                                                            <a
                                                                                                                                href="{{ url('/member/team/view-geneology') }}/{{ $item_4['id'] }}">
                                                                                                                                @if ($item_4['profile_image'] == '')
                                                                                                                                    <img src="{{ asset('uploads/avatar.jpg') }}"
                                                                                                                                        alt="Profile Image">
                                                                                                                                @else
                                                                                                                                    <img src="{{ asset('uploads') }}/{{ $item_4['profile_image'] }}"
                                                                                                                                        alt="Profile Image">
                                                                                                                                @endif
                                                                                                                            </a>
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="perfomance-cont">
                                                                                                                            <h4>
                                                                                                                                {{ $item_4['memberid'] }}
                                                                                                                            </h4>
                                                                                                                            @if ($item_4['status'] == 'Temp')
                                                                                                                                <h4>Inactive
                                                                                                                                </h4>
                                                                                                                            @else
                                                                                                                                <h4>{{ $item_4['status'] }}
                                                                                                                                </h4>
                                                                                                                            @endif
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="dropdown">
                                                                                                                            <div
                                                                                                                                class="dropdown-menu performance-h-list">
                                                                                                                                <div
                                                                                                                                    class="performance-h-title color-1">
                                                                                                                                    <h4>Hi
                                                                                                                                        !
                                                                                                                                        {{ $item_4['name'] }}
                                                                                                                                    </h4>
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="performance-h-cont">
                                                                                                                                    <div
                                                                                                                                        class="performance-h-data">
                                                                                                                                        <h6>Sponsor
                                                                                                                                            Id
                                                                                                                                        </h6>
                                                                                                                                        <h5>:&nbsp;
                                                                                                                                            {{ $item_4['sponsorid'] }}
                                                                                                                                        </h5>
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="performance-h-data">
                                                                                                                                        <h6>Package
                                                                                                                                        </h6>
                                                                                                                                        <h5>:&nbsp;
                                                                                                                                            $
                                                                                                                                            {{ $item_4['package'] }}
                                                                                                                                        </h5>
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="performance-h-data">
                                                                                                                                        <h6>Direct
                                                                                                                                        </h6>
                                                                                                                                        <h5>:&nbsp;
                                                                                                                                            {{ $item_4['downline'] }}
                                                                                                                                        </h5>
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="performance-h-data">
                                                                                                                                        <h6>Investment</h6>
                                                                                                                                        <h5>:&nbsp;
                                                                                                                                            $
                                                                                                                                            {{ $item_4['investment'] }}
                                                                                                                                        </h5>
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="performance-h-data">
                                                                                                                                        <h6>Team
                                                                                                                                            Biz
                                                                                                                                        </h6>
                                                                                                                                        <h5>:
                                                                                                                                            &nbsp;
                                                                                                                                            $
                                                                                                                                            {{ $item_4['team_biz'] }}
                                                                                                                                        </h5>
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="performance-h-data">
                                                                                                                                        <h6>Wallet
                                                                                                                                        </h6>
                                                                                                                                        <h5>:
                                                                                                                                            &nbsp;
                                                                                                                                            $
                                                                                                                                            {{ $item_4['wallet'] }}
                                                                                                                                        </h5>
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="performance-h-data">
                                                                                                                                        <h6>Fund
                                                                                                                                            Wallet
                                                                                                                                        </h6>
                                                                                                                                        <h5>:
                                                                                                                                            &nbsp;
                                                                                                                                            $
                                                                                                                                            {{ $item_4['p2p_wallet'] }}
                                                                                                                                        </h5>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            @endif
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!--**********************************
        Content body end
    ***********************************-->


@endsection
