@extends('member.layouts.main')
@section('title', 'User Dashboard')
@section('container')

    <style>
        /* Premium Dashboard Banner Cards */
        .premium-invest-card {
            background: linear-gradient(135deg, #3730a3 0%, #4f46e5 45%, #7c3aed 100%);
            border-radius: 16px !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.35);
            position: relative;
            overflow: hidden;
            color: #ffffff;
            padding: 24px;
        }

        .premium-invest-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                radial-gradient(circle at 85% 15%, rgba(255, 255, 255, 0.2) 0%, transparent 45%),
                radial-gradient(circle at 10% 85%, rgba(0, 0, 0, 0.2) 0%, transparent 45%),
                radial-gradient(rgba(255, 255, 255, 0.12) 1.2px, transparent 1.2px);
            background-size: 100% 100%, 100% 100%, 14px 14px;
            pointer-events: none;
        }

        .premium-profile-card {
            background: #ffffff;
            border-radius: 16px !important;
            border: 1px solid #e2e8f0 !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            position: relative;
            overflow: hidden;
            padding: 24px;
        }

        .premium-profile-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                radial-gradient(circle at 95% 10%, rgba(99, 102, 241, 0.05) 0%, transparent 40%),
                radial-gradient(rgba(99, 102, 241, 0.06) 1.2px, transparent 1.2px);
            background-size: 100% 100%, 16px 16px;
            pointer-events: none;
        }

        .premium-profile-tile {
            background: #ffffff;
            border: 1px solid #eef2f7;
            border-radius: 12px;
            padding: 12px 14px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
            transition: all 0.2s ease;
        }

        .premium-profile-tile:hover {
            border-color: #cbd5e1;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        .premium-watermark {
            position: absolute;
            right: -15px;
            bottom: -20px;
            font-size: 6rem;
            color: #ffffff;
            opacity: 0.10;
            pointer-events: none;
            line-height: 1;
            z-index: 0;
        }

        .premium-stat-card {
            background: linear-gradient(135deg, rgba(17, 28, 67, 0.90) 0%, rgba(24, 40, 96, 0.85) 100%);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-top: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(17, 28, 67, 0.35);
            position: relative;
            overflow: hidden;
            padding: 22px 24px;
            color: #ffffff;
            transition: all 0.25s ease;
        }

        .premium-stat-card:hover {
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 12px 36px rgba(17, 28, 67, 0.5);
            transform: translateY(-3px);
        }

        .premium-stat-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1.2px, transparent 1.2px);
            background-size: 14px 14px;
            pointer-events: none;
        }

        .premium-stat-card.stat-emerald::after {
            content: "";
            position: absolute;
            top: 0; right: 0;
            width: 140px; height: 140px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, transparent 70%);
            pointer-events: none;
        }

        .premium-stat-card.stat-indigo::after {
            content: "";
            position: absolute;
            top: 0; right: 0;
            width: 140px; height: 140px;
            background: radial-gradient(circle, rgba(132, 90, 223, 0.25) 0%, transparent 70%);
            pointer-events: none;
        }

        .premium-stat-card.stat-sky::after {
            content: "";
            position: absolute;
            top: 0; right: 0;
            width: 140px; height: 140px;
            background: radial-gradient(circle, rgba(35, 183, 229, 0.25) 0%, transparent 70%);
            pointer-events: none;
        }

        .premium-stat-card.stat-amber::after {
            content: "";
            position: absolute;
            top: 0; right: 0;
            width: 140px; height: 140px;
            background: radial-gradient(circle, rgba(245, 184, 73, 0.22) 0%, transparent 70%);
            pointer-events: none;
        }

        .stat-watermark {
            position: absolute;
            right: -10px;
            bottom: -15px;
            font-size: 5rem;
            color: #ffffff;
            opacity: 0.06;
            pointer-events: none;
            line-height: 1;
            z-index: 0;
        }

        .stat-content {
            position: relative;
            z-index: 1;
        }

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

                    <div class="row g-3 mb-3">
                        <div class="col-xxl-5 col-xl-5 col-lg-12 col-md-12 col-12">
                            <div class="premium-invest-card h-100 d-flex flex-column justify-content-between">
                                <div style="position: relative; z-index: 1;">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="badge" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(8px); color: #ffffff; font-size: 11px; padding: 6px 12px; border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.3);">
                                            <i class="ti ti-sparkles me-1 text-warning"></i> Investment Account
                                        </span>
                                        <span class="badge" style="background: rgba(34, 197, 94, 0.25); color: #86efac; border: 1px solid rgba(34, 197, 94, 0.45); border-radius: 20px; font-size: 11px; padding: 6px 12px;">
                                            <i class="ti ti-check me-1"></i> Ready
                                        </span>
                                    </div>
                                    <h4 class="fw-bold text-white mb-2" style="letter-spacing: -0.3px;">
                                        Congratulations, <span style="color: #fde047;">{{ $data['memberid'] }}</span> !!
                                    </h4>
                                    <p class="fs-13 mb-4" style="color: rgba(255, 255, 255, 0.88);">
                                        You are ready for <strong class="text-white">{{ config('detailsApp.name') }}</strong> Investment.
                                    </p>
                                </div>
                                <div style="position: relative; z-index: 1;">
                                    <a href="{{ url('/member/invest-slot') }}" class="btn btn-sm px-3 fw-bold shadow-sm" style="background: #ffffff; color: #4338ca; border-radius: 8px;">
                                        <i class="ti ti-wallet me-1"></i> Invest Now <i class="ti ti-arrow-narrow-right ms-1"></i>
                                    </a>
                                </div>
                                <div class="premium-watermark">
                                    <i class="ti ti-coins"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-7 col-xl-7 col-lg-12 col-md-12 col-12">
                            <div class="premium-profile-card h-100 d-flex flex-column justify-content-between">
                                <div style="position: relative; z-index: 1;">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2" style="border-bottom: 1px solid #f1f5f9;">
                                        <div class="d-flex align-items-center">
                                            <span style="width: 3px; height: 16px; background: #6366f1; border-radius: 3px; margin-right: 8px; display: inline-block;"></span>
                                            <span class="fw-bold fs-15 text-dark">My Profile</span>
                                        </div>
                                        <a href="{{ url('member/profile/user-summary') }}" class="btn btn-sm btn-primary px-3" style="border-radius: 8px;">
                                            View Profile <i class="ti ti-arrow-narrow-right ms-1"></i>
                                        </a>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                            <div class="premium-profile-tile d-flex align-items-center">
                                                <div class="me-3 flex-shrink-0">
                                                    <span class="avatar avatar-md avatar-rounded" style="background: #ede9fe; color: #6366f1;">
                                                        <i class="ti ti-user fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="overflow-hidden" style="min-width: 0;">
                                                    <span class="d-block text-muted fs-11">Name</span>
                                                    <h6 class="fw-bold mb-0 text-dark text-truncate" title="{{ $data['name'] }}">{{ $data['name'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                            <div class="premium-profile-tile d-flex align-items-center">
                                                <div class="me-3 flex-shrink-0">
                                                    <span class="avatar avatar-md avatar-rounded" style="background: #e0f2fe; color: #0284c7;">
                                                        <i class="ti ti-mail fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="overflow-hidden" style="min-width: 0;">
                                                    <span class="d-block text-muted fs-11">Email</span>
                                                    <h6 class="fw-bold mb-0 text-dark text-truncate" title="{{ $data['email'] }}">{{ $data['email'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                            <div class="premium-profile-tile d-flex align-items-center">
                                                <div class="me-3 flex-shrink-0">
                                                    <span class="avatar avatar-md avatar-rounded" style="background: #fef3c7; color: #d97706;">
                                                        <i class="ti ti-phone fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="overflow-hidden" style="min-width: 0;">
                                                    <span class="d-block text-muted fs-11">Mobile</span>
                                                    <h6 class="fw-bold mb-0 text-dark text-truncate" title="{{ $data['mobile'] }}">{{ $data['mobile'] }}</h6>
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

                    <div class="row g-3 mb-3">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-emerald h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.7);">Current Status</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: rgba(16, 185, 129, 0.22); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.35);">
                                            <i class="ti ti-shield-check fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="fw-bold mb-0 text-white">{{ $data['status'] }}</h3>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="badge" style="background: rgba(16, 185, 129, 0.2); color: #6ee7b7; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 11px; padding: 6px 12px; border-radius: 20px;">
                                            <i class="bi bi-patch-check-fill me-1"></i> Verified & Active
                                        </span>
                                        <small style="color: rgba(255, 255, 255, 0.6); font-size: 11px;">Member Account</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-shield-check"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-indigo h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.7);">My Referrals</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: rgba(132, 90, 223, 0.28); color: #c4b5fd; border: 1px solid rgba(132, 90, 223, 0.4);">
                                            <i class="ti ti-users fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="fw-bold mb-0 text-white">{{ $data['downline'] }}</h3>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="badge" style="background: rgba(132, 90, 223, 0.22); color: #d8b4fe; border: 1px solid rgba(132, 90, 223, 0.35); font-size: 11px; padding: 6px 12px; border-radius: 20px;">
                                            <i class="ti ti-trending-up me-1"></i> Total Referrals
                                        </span>
                                        <small style="color: rgba(255, 255, 255, 0.6); font-size: 11px;">Direct Team</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-users"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-sky h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.7);">Fund Wallet</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: rgba(35, 183, 229, 0.28); color: #7dd3fc; border: 1px solid rgba(35, 183, 229, 0.4);">
                                            <i class="ti ti-wallet fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="fw-bold mb-0 text-white">$ {{ number_format($data['p2p_wallet'], 2) }}</h3>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="badge" style="background: rgba(35, 183, 229, 0.22); color: #7dd3fc; border: 1px solid rgba(35, 183, 229, 0.35); font-size: 11px; padding: 6px 12px; border-radius: 20px;">
                                            <i class="ti ti-coins me-1"></i> Fund Balance
                                        </span>
                                        <small style="color: rgba(255, 255, 255, 0.6); font-size: 11px;">Available for Investment</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-wallet"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-amber h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.7);">Income Wallet</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: rgba(245, 184, 73, 0.28); color: #fde047; border: 1px solid rgba(245, 184, 73, 0.4);">
                                            <i class="ti ti-cash fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="fw-bold mb-0 text-white">$ {{ number_format($data['wallet'], 2) }}</h3>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="badge" style="background: rgba(245, 184, 73, 0.22); color: #fde047; border: 1px solid rgba(245, 184, 73, 0.35); font-size: 11px; padding: 6px 12px; border-radius: 20px;">
                                            <i class="ti ti-arrow-up-right me-1"></i> Income Balance
                                        </span>
                                        <small style="color: rgba(255, 255, 255, 0.6); font-size: 11px;">Total Earned Income</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-cash"></i>
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
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
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
                                                    <small>Member Today's Level Income</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
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
                                                    <p class="text-muted mb-0">Today's Direct Income</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        $ {{ number_format(todayDirectIncome($data['memberid']), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-revenue"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <small>Member Today's Direct Income</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
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
                                                    <p class="text-muted mb-0">Today's Global Autopool</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        $ {{ number_format(todayGlobalAutopoolIncome($data['memberid']), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-conversion-ratio"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <small>Member Today's Global Autopool</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-warning">
                                                <i class="ti ti-wallet fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Today's Withdrawal Income</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        $ {{ number_format(todayWithdrawalIncome($data['memberid']), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <small>Member Today's Withdrawal Income</small>
                                                </div>
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
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
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
                                                    <small>Member Total Level Income</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
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
                                                    <p class="text-muted mb-0">Total Direct Income</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        $ {{ number_format(totalDirectIncome($data['memberid']), 2) }}
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div id="portfolio-value"></div>
                                                </div>
                                                <!--<div id="crm-total-revenue"></div>-->
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <small>Member Total Direct Income</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
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
                                                    <p class="text-muted mb-0">Total Global Autopool</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        $ {{ number_format(totalGlobalAutopoolIncome($data['memberid']), 2) }}
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div id="total-invested"></div>
                                                </div>
                                                <!--<div id="crm-conversion-ratio"></div>-->
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <small>Member Total Global Autopool</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-warning">
                                                <i class="ti ti-wallet fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Total Withdrawal Income</p>
                                                    <h4 class="fw-semibold mt-1">
                                                        $ {{ number_format(totalWithdrawalIncome($data['memberid']), 2) }}
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div id="total-investments"></div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <small>Member Total Withdrawal Income</small>
                                                </div>
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
