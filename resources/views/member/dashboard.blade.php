@extends('member.layouts.main')
@section('title', 'User Dashboard')
@section('container')

    <style>
        .sbt-card {
            background: #0f5c65;
            color: #fff;
            border-radius: 16px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .sbt-title {
            text-align: center;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .sbt-card p {
            font-size: 15px;
            margin: 6px 0;
        }

        .sbt-card button {
            background: #29c4e9;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 600;
            margin-top: 10px;
        }

        .sbt-card button:hover {
            background: #1ca0bd;
        }
    </style>

    <!--**********************************Content body start***********************************-->

    <!-- MAIN-CONTENT -->

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Start::page-header -->

            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <p class="fw-semibold fs-18 mb-0">Welcome back, {{ $data['name'] }} !</p>
                    {{-- <span class="fs-semibold text-muted">Track your sales activity, leads and deals here.</span> --}}
                </div>
                {{-- <div class="btn-list mt-md-0 mt-2">
                    <button type="button" class="btn btn-primary btn-wave">
                        <i class="ri-filter-3-fill me-2 align-middle d-inline-block"></i>Filters
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-wave">
                        <i class="ri-upload-cloud-line me-2 align-middle d-inline-block"></i>Export
                    </button>
                </div> --}}
            </div>

            <!-- End::page-header -->

            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="tradingview-widget-container">
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                            {
                                "symbols": [{
                                        "proName": "FOREXCOM:SPXUSD",
                                        "title": "S&P 500"
                                    },
                                    {
                                        "proName": "FOREXCOM:NSXUSD",
                                        "title": "US 100"
                                    },
                                    {
                                        "proName": "FX_IDC:EURUSD",
                                        "title": "EUR to USD"
                                    },
                                    {
                                        "proName": "BITSTAMP:BTCUSD",
                                        "title": "Bitcoin"
                                    },
                                    {
                                        "proName": "BITSTAMP:ETHUSD",
                                        "title": "Ethereum"
                                    },
                                    {
                                        "description": "USDT",
                                        "proName": "BITSTAMP:USDTUSD"
                                    },
                                    {
                                        "description": "XRP",
                                        "proName": "BINANCE:XRPUSDT"
                                    },
                                    {
                                        "description": "BNB",
                                        "proName": "BINANCE:BNBUSDT"
                                    },
                                    {
                                        "description": "TRX",
                                        "proName": "BINANCE:TRXUSDT"
                                    },
                                    {
                                        "description": "",
                                        "proName": "CRYPTOCAP:DOGE"
                                    },
                                    {
                                        "description": "",
                                        "proName": "BITSTAMP:LTCUSD"
                                    },
                                    {
                                        "description": "",
                                        "proName": "BITSTAMP:SHIBUSD"
                                    },
                                    {
                                        "description": "",
                                        "proName": "BINANCE:AVAXUSDT"
                                    }
                                ],
                                "showSymbolLogo": true,
                                "isTransparent": false,
                                "displayMode": "adaptive",
                                "colorTheme": "light",
                                "locale": "in"
                            }
                        </script>
                    </div>

                    <div class="row mt-0 mb-3 mt-3">
                        <div class="col-sm-12">
                            <marquee>
                                <h5 class=" px-2 my-0">
                                    @foreach ($dashMsg as $item)
                                        <span class="me-5"
                                            style="color:rgb(0, 0, 0);font-weight:600">{{ $item['message'] }}</span>
                                    @endforeach
                                </h5>
                            </marquee>
                        </div>
                        <div class="col-sm-12">
                            @if (session()->has('successMsg'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        class="me-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    <strong>Success!</strong> {{ session('successMsg') }}.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                            @if (session()->has('failedMsg'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="currentColor"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-alert-triangle">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 1.67c.955 0 1.845 .467 2.39 1.247l.105 .16l8.114 13.548a2.914 2.914 0 0 1 -2.307 4.363l-.195 .008h-16.225a2.914 2.914 0 0 1 -2.582 -4.2l.099 -.185l8.11 -13.538a2.914 2.914 0 0 1 2.491 -1.403zm.01 13.33l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -7a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" />
                                    </svg>
                                    <strong>Failed!</strong> {{ session('failedMsg') }}.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="card custom-card crm-highlight-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="mb-4">
                                                    <div class="fw-semibold fs-18 text-fixed-white mb-2">Congratulations
                                                        <strong>{{ $data['memberid'] }} !!</strong><img
                                                            src="images/crm/party-popper.png" alt="">
                                                    </div>
                                                    <span class="d-block fs-12 text-fixed-white"><span class="op-7">You
                                                            are ready for</span> <span
                                                            class="fw-semibold text-warning">{{ config('detailsApp.name') }}</span>
                                                        <span class="op-7">Investment</span>.</span>
                                                    <span class="d-block fw-semibold mt-1"><a class="text-fixed-white"
                                                            href="{{ url('/member/buy-coin') }}"><u>Click
                                                                here</u></a></span>
                                                </div>
                                                <div>
                                                    <div>
                                                        <h4 class="btn btn-danger float-end px-2" id="countdown"
                                                            data-target-date="<?php echo $rest; ?>">00:00:00</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-7">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">My Profile</div><a
                                                href="{{ url('member/profile/user-summary') }}"
                                                class="btn btn-sm btn-primary">View Profile</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row gy-md-0 gy-3">
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                    <div class="d-flex align-items-top">
                                                        <div class="me-3"> <span
                                                                class="avatar avatar-rounded bg-light text-primary"> <i
                                                                    class="ti ti-files fs-18"></i> </span> </div>
                                                        <div>
                                                            <h6 class="fw-semibold mb-0">{{ $data['name'] }}</h6>
                                                            <span class="d-block mb-1 text-muted">Name</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12">
                                                    <div class="d-flex align-items-top">
                                                        <div class="me-3"> <span
                                                                class="avatar avatar-rounded bg-light text-secondary"> <i
                                                                    class="ti ti-file-check fs-18"></i> </span> </div>
                                                        <div>
                                                            <h6 class="fw-semibold mb-0">{{ $data['email'] }}</h6>
                                                            <span class="d-block mb-1 text-muted">Enail</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12">
                                                    <div class="d-flex align-items-top">
                                                        <div class="me-3"> <span
                                                                class="avatar avatar-rounded bg-light text-warning"> <i
                                                                    class="ti ti-file-dislike fs-18"></i> </span> </div>
                                                        <div>
                                                            <h6 class="fw-semibold mb-0">{{ $data['mobile'] }}</h6>
                                                            <span class="d-block mb-1 text-muted">Mobile</span>
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

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header  justify-content-between">
                                    <div class="card-title">
                                        Refer & Earn
                                        <div class="mt-2">
                                            <small>Earn referral point by sharing referral link to your
                                                friends.
                                                You can only earn, when your friends join the provided link.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="alert alert-success text-center" role="alert"
                                                style="display: none" id="rcode">
                                                <span class="text-center"> <span><b>Copied ! </b></span> Referral link is
                                                    copied
                                                    successfully</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="alert alert-primary" role="alert" style="overflow: auto">
                                                <b>Referral Code : </b><a
                                                    id="codeLeft">{{ config('detailsApp.url') }}member/register/{{ $data['memberid'] }}</a>
                                                <span class="float-end" id="copyButtonIdLeft"><i class="fe fe-copy"></i>
                                                    <span style="cursor: pointer" id="msgTextLeft">
                                                        CopyText</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card custom-card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-2">Current Status</p>
                                            <h4 class="mb-0 fw-semibold mb-2">{{ $data['status'] }}</h4>
                                            <span class="badge bg-success-transparent"><i
                                                    class="bi bi-patch-check-fill fs-14"></i></span><span
                                                class="text-muted fs-11 ms-1"></span>
                                        </div>
                                        <div>
                                            <span class="avatar avatar-md bg-primary p-2">
                                                <i class="ti ti-file-check fs-20 op-7"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card custom-card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-2">My Referrals</p>
                                            <h4 class="mb-0 fw-semibold mb-2">{{ $data['downline'] }}</h4>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ti ti-trending-up"></i></span><span
                                                class="text-muted fs-11 ms-1">total referrals</span>
                                        </div>
                                        <div>
                                            <span class="avatar avatar-md bg-success p-2">
                                                <i class="ti ti-album fs-20 op-7"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card custom-card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-2">Buy Trade / Left Trade</p>
                                            {{-- <h4 class="mb-0 fw-semibold mb-2">{{ PackageCount($data['memberid']) }} /
                                                {{ 10 - PackageCount($data['memberid']) }}
                                            </h4> --}}
                                            <span class="badge bg-success-transparent"><i
                                                    class="ti ti-trending-up"></i></span><span
                                                class="text-muted fs-11 ms-1">in this
                                                month</span>
                                        </div>
                                        <div>
                                            <span class="avatar avatar-md bg-warning p-2">
                                                <i class="ti ti-chart-pie-2 fs-20 op-7"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-sm-4">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex gap-3 flex-wrap align-items-top justify-content-between">
                                        <div class="flex-fill d-flex align-items-top mb-4 mb-sm-0">
                                            <div class="me-3">
                                                <span class="avatar avatar-rounded bg-primary">
                                                    <i class="ti ti-wallet fs-16"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <span class="d-block">Fund Wallet</span>
                                                <h4 class="fw-semibold">$ {{ number_format($data['p2p_wallet'], 2) }}
                                                </h4>
                                            </div>
                                        </div>
                                        {{-- <div>
                                            <div id="total-invested"></div>
                                        </div> --}}
                                    </div>
                                    <div class="ms-5 mt-2">
                                        <span class="d-block text-muted">Total Balance in Fund wallet</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex gap-3 flex-wrap align-items-top justify-content-between">
                                        <div class="flex-fill d-flex align-items-top mb-4 mb-sm-0">
                                            <div class="me-3">
                                                <span class="avatar avatar-rounded bg-warning">
                                                    <i class="ti ti-wallet fs-16"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <span class="d-block">Income Wallet</span>
                                                <h4 class="fw-semibold">$ {{ number_format($data['wallet'], 2) }}</h4>
                                            </div>
                                        </div>
                                        {{-- <div>
                                            <div id="portfolio-value"></div>
                                        </div> --}}
                                    </div>
                                    <div class="ms-5 mt-2">
                                        <span class="d-block text-muted">Total Balance in Income wallet</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-4">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex gap-3 flex-wrap align-items-top justify-content-between">
                                        <div class="flex-fill d-flex align-items-top mb-4 mb-sm-0">
                                            <div class="me-3">
                                                <span class="avatar avatar-rounded bg-success">
                                                    <i class="ti ti-wallet fs-16"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <span class="d-block">Level Wallet</span>
                                                <h4 class="fw-semibold">$ {{ number_format($data['level_wallet'], 2) }}
                                                </h4>
                                            </div>
                                        </div>
                                        {{-- <div>
                                            <div id="returns-rate"></div>
                                        </div> --}}
                                    </div>
                                    <div class="ms-5 mt-2">
                                        <span class="d-block text-muted">Total Balance in Level wallet</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body" style="background: #111c43">
                                    <h4 class="text-white my-0 py-0"><strong>Today's Income</strong> <span
                                            class="float-end me-2">$ {{ number_format(todayIncome($data['memberid']), 2) }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-primary">
                                                <i class="ti ti-wallet fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Today's Level Income</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        $ {{ number_format(todayLevelIncome($data['memberid']), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-customers"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    {{-- <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                    <small>Member Today's Level Income</small>
                                                </div>
                                                {{-- <div class="text-end">
                                                    <p class="mb-0 text-success fw-semibold">+40%</p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-secondary">
                                                <i class="ti ti-wallet fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Today's Trading Profit</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        {{-- $ {{ number_format(todayTradingProfit($data['memberid']), 2) }} --}}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-revenue"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    {{-- <a class="text-secondary" href="javascript:void(0);">View
                                                        All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                    <small>Member Today's Trading Profit</small>
                                                </div>
                                                {{-- <div class="text-end">
                                                    <p class="mb-0 text-success fw-semibold">+25%</p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-success">
                                                <i class="ti ti-wallet fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Today's Trading Bonus</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        {{-- $ {{ number_format(todayTradingBonus($data['memberid']), 2) }} --}}
                                                    </h4>
                                                </div>
                                                <div id="crm-conversion-ratio"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    {{-- <a class="text-success" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                    <small>Member Today's Trading Bonus</small>
                                                </div>
                                                {{-- <div class="text-end">
                                                    <p class="mb-0 text-danger fw-semibold">-12%</p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body" style="background: #111c43">
                                    <h4 class="text-white my-0 py-0"><strong>Total Income</strong><span
                                            class="float-end me-2">$ {{ number_format(totalIncome($data['memberid']), 2) }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-primary">
                                                <i class="ti ti-wallet fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Total Level Income</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        $ {{ number_format(totalLevelIncome($data['memberid']), 2) }}
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div id="returns-rate"></div>
                                                </div>
                                                <!--<div id="crm-total-customers"></div>-->
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    {{-- <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                    <small>Member Total Level Income</small>
                                                </div>
                                                {{-- <div class="text-end">
                                                    <p class="mb-0 text-success fw-semibold">+40%</p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-secondary">
                                                <i class="ti ti-wallet fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Total Trading Profit</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        {{-- $ {{ number_format(totalTradingProfit($data['memberid']), 2) }} --}}
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div id="portfolio-value"></div>
                                                </div>
                                                <!--<div id="crm-total-revenue"></div>-->
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    {{-- <a class="text-secondary" href="javascript:void(0);">View
                                                        All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                    <small>Member Total Trading Profit</small>
                                                </div>
                                                {{-- <div class="text-end">
                                                    <p class="mb-0 text-success fw-semibold">+25%</p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-success">
                                                <i class="ti ti-wallet fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Total Trading Bonus</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        {{-- $ {{ number_format(totalTradingBonus($data['memberid']), 2) }} --}}
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div id="total-invested"></div>
                                                </div>
                                                <!--<div id="crm-conversion-ratio"></div>-->
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    {{-- <a class="text-success" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                    <small>Member Total Trading Bonus</small>
                                                </div>
                                                {{-- <div class="text-end">
                                                    <p class="mb-0 text-danger fw-semibold">-12%</p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($matrix as $value)
                            <div class="col-xl-4 col-md-4 mb-4">
                                <div class="sbt-card">
                                    <h4 class="sbt-title text-white">Slot</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><strong>Amount:</strong><br> $100</p>
                                            <p><strong>Received:</strong><br> $100</p>
                                            <p><strong>Status:</strong><br> {{ $value['status'] }}</p>
                                        </div>
                                        <div class="col-6">
                                            <p><strong>Date/ Time:</strong><br>
                                                {{ date('d-m-Y', strtotime($value['created_at'])) }} |
                                                {{ date('H:i:s', strtotime($value['created_at'])) }}</p>

                                             @if (getPoolCount($value['id']) >= 32 && $value['status'] == 'Open')
                                                <a href="{{ url('/member/profit-withdrawal') }}/{{ $value['id'] }}"
                                                    class="btn text-white" style="background: #111c43;">Sell</a>
                                            @elseif (getPoolCount($value['id']) >= 32 && $value['status'] == 'Closed')
                                                <button class="btn text-white"
                                                    style="background: #111c43;">Closed</button>
                                            @else
                                                <button class="btn text-white" style="background: #111c43;">Wait</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
               
            </div>
            <!-- End::row-1 -->
        </div>
    </div>
    <!-- END MAIN-CONTENT -->

    <!--***************************** Content body end ***********************************-->



@endsection
