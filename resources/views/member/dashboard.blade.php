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
            cursor: pointer;
        }

        .premium-profile-tile:hover {
            border-color: #a5b4fc;
            background: #faf5ff;
            box-shadow: 0 6px 18px rgba(99, 102, 241, 0.12);
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
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            padding: 22px 24px;
            transition: all 0.25s ease;
            box-shadow: 0 8px 24px -4px rgba(17, 28, 67, 0.07), 0 2px 6px rgba(0, 0, 0, 0.04);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .premium-stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 32px -4px rgba(17, 28, 67, 0.12), 0 4px 10px rgba(0, 0, 0, 0.06);
        }

        .premium-stat-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(rgba(17, 28, 67, 0.05) 1.2px, transparent 1.2px);
            background-size: 14px 14px;
            pointer-events: none;
        }

        /* 1. Emerald (Current Status) */
        .premium-stat-card.stat-emerald {
            background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 35%, rgba(220, 252, 231, 0.75) 75%, rgba(187, 247, 208, 0.6) 100%);
            border: 1px solid rgba(187, 247, 208, 0.85);
            border-top: 1px solid rgba(255, 255, 255, 0.95);
        }
        .premium-stat-card.stat-emerald:hover {
            border-color: rgba(134, 239, 172, 0.95);
        }
        .premium-stat-card.stat-emerald::after {
            content: "";
            position: absolute;
            top: -30px; right: -30px;
            width: 140px; height: 140px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, transparent 70%);
            pointer-events: none;
        }
        .premium-stat-card.stat-emerald .stat-watermark {
            color: #10b981;
            opacity: 0.10;
        }

        /* 2. Indigo / Purple (My Referrals) */
        .premium-stat-card.stat-indigo {
            background: linear-gradient(135deg, #ffffff 0%, #faf5ff 35%, rgba(243, 232, 255, 0.75) 75%, rgba(233, 213, 255, 0.6) 100%);
            border: 1px solid rgba(233, 213, 255, 0.85);
            border-top: 1px solid rgba(255, 255, 255, 0.95);
        }
        .premium-stat-card.stat-indigo:hover {
            border-color: rgba(216, 180, 254, 0.95);
        }
        .premium-stat-card.stat-indigo::after {
            content: "";
            position: absolute;
            top: -30px; right: -30px;
            width: 140px; height: 140px;
            background: radial-gradient(circle, rgba(132, 90, 223, 0.2) 0%, transparent 70%);
            pointer-events: none;
        }
        .premium-stat-card.stat-indigo .stat-watermark {
            color: #845adf;
            opacity: 0.10;
        }

        /* 3. Sky / Cyan (Fund Wallet) */
        .premium-stat-card.stat-sky {
            background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 35%, rgba(224, 242, 254, 0.75) 75%, rgba(186, 230, 253, 0.6) 100%);
            border: 1px solid rgba(186, 230, 253, 0.85);
            border-top: 1px solid rgba(255, 255, 255, 0.95);
        }
        .premium-stat-card.stat-sky:hover {
            border-color: rgba(147, 197, 253, 0.95);
        }
        .premium-stat-card.stat-sky::after {
            content: "";
            position: absolute;
            top: -30px; right: -30px;
            width: 140px; height: 140px;
            background: radial-gradient(circle, rgba(35, 183, 229, 0.22) 0%, transparent 70%);
            pointer-events: none;
        }
        .premium-stat-card.stat-sky .stat-watermark {
            color: #23b7e5;
            opacity: 0.10;
        }

        /* 4. Amber / Gold (Income Wallet) */
        .premium-stat-card.stat-amber {
            background: linear-gradient(135deg, #ffffff 0%, #fffbeb 35%, rgba(254, 243, 199, 0.75) 75%, rgba(253, 230, 138, 0.6) 100%);
            border: 1px solid rgba(253, 230, 138, 0.85);
            border-top: 1px solid rgba(255, 255, 255, 0.95);
        }
        .premium-stat-card.stat-amber:hover {
            border-color: rgba(252, 211, 77, 0.95);
        }
        .premium-stat-card.stat-amber::after {
            content: "";
            position: absolute;
            top: -30px; right: -30px;
            width: 140px; height: 140px;
            background: radial-gradient(circle, rgba(245, 184, 73, 0.22) 0%, transparent 70%);
            pointer-events: none;
        }
        .premium-stat-card.stat-amber .stat-watermark {
            color: #f5b849;
            opacity: 0.12;
        }

        .stat-watermark {
            position: absolute;
            right: -10px;
            bottom: -15px;
            font-size: 5rem;
            pointer-events: none;
            line-height: 1;
            z-index: 0;
            transition: all 0.25s ease;
        }

        .stat-content {
            position: relative;
            z-index: 1;
        }

        /* Premium Referral Card */
        .premium-referral-card {
            background: linear-gradient(135deg, #ffffff 0%, rgba(248, 250, 252, 0.96) 30%, rgba(224, 242, 254, 0.75) 70%, rgba(186, 230, 253, 0.6) 100%);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(191, 219, 254, 0.85);
            border-top: 1px solid rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 10px 30px -5px rgba(17, 28, 67, 0.08), 0 4px 12px rgba(35, 183, 229, 0.1);
            position: relative;
            overflow: hidden;
            padding: 24px;
            color: #111c43;
            transition: all 0.25s ease;
        }

        .premium-referral-card:hover {
            border-color: rgba(147, 197, 253, 0.95);
            box-shadow: 0 14px 36px -4px rgba(17, 28, 67, 0.12), 0 6px 16px rgba(35, 183, 229, 0.15);
        }

        .premium-referral-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(rgba(17, 28, 67, 0.05) 1.2px, transparent 1.2px);
            background-size: 14px 14px;
            pointer-events: none;
        }

        .premium-referral-card::after {
            content: "";
            position: absolute;
            top: -40px; right: -40px;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(35, 183, 229, 0.22) 0%, rgba(17, 28, 67, 0.05) 50%, transparent 70%);
            pointer-events: none;
        }

        .referral-box {
            background: linear-gradient(135deg, rgba(17, 28, 67, 0.94) 0%, rgba(23, 49, 114, 0.88) 55%, rgba(14, 116, 144, 0.82) 100%);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-top: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 14px;
            padding: 12px 16px;
            box-shadow: 0 8px 24px -4px rgba(17, 28, 67, 0.25), inset 0 1px 1px rgba(255, 255, 255, 0.25);
            transition: all 0.2s ease;
        }

        .referral-box:hover {
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 10px 28px -4px rgba(17, 28, 67, 0.3), inset 0 1px 1px rgba(255, 255, 255, 0.35);
        }

        .referral-watermark {
            position: absolute;
            right: -10px;
            bottom: -20px;
            font-size: 6.5rem;
            color: #23b7e5;
            opacity: 0.08;
            pointer-events: none;
            line-height: 1;
            z-index: 0;
        }

        .referral-copy-btn {
            background: #ffffff;
            color: #111c43;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 13px;
            padding: 8px 18px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .referral-copy-btn:hover {
            background: #f0f7ff;
            color: #0284c7;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
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
                                            <div class="premium-profile-tile d-flex align-items-center" role="button" data-bs-toggle="modal" data-bs-target="#profileDetailModal" title="Click to view full profile details">
                                                <div class="me-3 flex-shrink-0">
                                                    <span class="avatar avatar-md avatar-rounded" style="background: #ede9fe; color: #6366f1;">
                                                        <i class="ti ti-user fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="overflow-hidden flex-grow-1" style="min-width: 0;">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="d-block text-muted fs-11">Name</span>
                                                        <i class="ti ti-arrows-maximize text-muted fs-11 ms-1 opacity-75"></i>
                                                    </div>
                                                    <h6 class="fw-bold mb-0 text-dark text-truncate" title="{{ $data['name'] }}">{{ $data['name'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                            <div class="premium-profile-tile d-flex align-items-center" role="button" data-bs-toggle="modal" data-bs-target="#profileDetailModal" title="Click to view full profile details">
                                                <div class="me-3 flex-shrink-0">
                                                    <span class="avatar avatar-md avatar-rounded" style="background: #e0f2fe; color: #0284c7;">
                                                        <i class="ti ti-mail fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="overflow-hidden flex-grow-1" style="min-width: 0;">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="d-block text-muted fs-11">Email</span>
                                                        <i class="ti ti-arrows-maximize text-muted fs-11 ms-1 opacity-75"></i>
                                                    </div>
                                                    <h6 class="fw-bold mb-0 text-dark text-truncate" title="{{ $data['email'] }}">{{ $data['email'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                            <div class="premium-profile-tile d-flex align-items-center" role="button" data-bs-toggle="modal" data-bs-target="#profileDetailModal" title="Click to view full profile details">
                                                <div class="me-3 flex-shrink-0">
                                                    <span class="avatar avatar-md avatar-rounded" style="background: #fef3c7; color: #d97706;">
                                                        <i class="ti ti-phone fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="overflow-hidden flex-grow-1" style="min-width: 0;">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="d-block text-muted fs-11">Mobile</span>
                                                        <i class="ti ti-arrows-maximize text-muted fs-11 ms-1 opacity-75"></i>
                                                    </div>
                                                    <h6 class="fw-bold mb-0 text-dark text-truncate" title="{{ $data['mobile'] }}">{{ $data['mobile'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Detail Modal -->
                    <div class="modal fade" id="profileDetailModal" tabindex="-1" aria-labelledby="profileDetailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="border-radius: 16px; border: 1px solid rgba(17, 28, 67, 0.1); overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.15);">
                                <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #111c43 0%, #1e3a8a 100%); color: #ffffff;">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="avatar avatar-sm avatar-rounded" style="background: rgba(255, 255, 255, 0.2); color: #ffffff;">
                                            <i class="ti ti-id fs-16"></i>
                                        </span>
                                        <h5 class="modal-title fw-bold fs-16 mb-0 text-white" id="profileDetailModalLabel">Member Profile Details</h5>
                                    </div>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4" style="background: #f8fafc;">
                                    <div class="d-flex align-items-center p-3 mb-3 bg-white rounded-3 shadow-sm border">
                                        <div class="me-3">
                                            @if(!empty($data['profile_image']))
                                                <img src="{{ asset('uploads') }}/{{ $data['profile_image'] }}" class="rounded-circle" width="55" height="55" alt="profile" style="object-fit: cover;">
                                            @else
                                                <span class="avatar avatar-lg avatar-rounded" style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: #ffffff; font-size: 22px; font-weight: 700;">
                                                    {{ strtoupper(substr($data['name'] ?? 'U', 0, 1)) }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                <h5 class="fw-bold text-dark mb-1 text-truncate">{{ $data['name'] }}</h5>
                                                <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #059669; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 11px; padding: 4px 10px; border-radius: 20px;">
                                                    <i class="bi bi-patch-check-fill me-1"></i> {{ $data['status'] }}
                                                </span>
                                            </div>
                                            <p class="text-muted fs-12 mb-0">Member ID: <strong class="text-primary">{{ $data['memberid'] }}</strong></p>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-3 p-3 shadow-sm border">
                                        <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                            <div class="d-flex align-items-center text-muted fs-13">
                                                <i class="ti ti-user fs-16 text-primary me-2"></i> Full Name
                                            </div>
                                            <span class="fw-bold text-dark fs-13 text-break text-end">{{ $data['name'] }}</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                            <div class="d-flex align-items-center text-muted fs-13">
                                                <i class="ti ti-mail fs-16 text-info me-2"></i> Email Address
                                            </div>
                                            <span class="fw-bold text-dark fs-13 text-break text-end user-select-all">{{ $data['email'] }}</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                            <div class="d-flex align-items-center text-muted fs-13">
                                                <i class="ti ti-phone fs-16 text-warning me-2"></i> Mobile Number
                                            </div>
                                            <span class="fw-bold text-dark fs-13 text-break text-end user-select-all">{{ $data['mobile'] }}</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                            <div class="d-flex align-items-center text-muted fs-13">
                                                <i class="ti ti-id fs-16 text-secondary me-2"></i> Member ID
                                            </div>
                                            <span class="fw-bold text-dark fs-13 text-break text-end user-select-all">{{ $data['memberid'] }}</span>
                                        </div>
                                        @if(!empty($data['sponsor']))
                                        <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                            <div class="d-flex align-items-center text-muted fs-13">
                                                <i class="ti ti-users fs-16 text-purple me-2"></i> Sponsor ID
                                            </div>
                                            <span class="fw-bold text-dark fs-13 text-break text-end">{{ $data['sponsor'] }}</span>
                                        </div>
                                        @endif
                                        @if(!empty($data['created_at']))
                                        <div class="d-flex align-items-center justify-content-between py-2">
                                            <div class="d-flex align-items-center text-muted fs-13">
                                                <i class="ti ti-calendar fs-16 text-success me-2"></i> Joined On
                                            </div>
                                            <span class="fw-bold text-dark fs-13 text-break text-end">{{ date('d M Y, h:i A', strtotime($data['created_at'])) }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer py-2 px-3 bg-white d-flex justify-content-between">
                                    <button type="button" class="btn btn-sm btn-light border px-3" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ url('member/profile/user-summary') }}" class="btn btn-sm btn-primary px-3">
                                        <i class="ti ti-edit me-1"></i> Full Profile & Settings
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xl-12">
                            <div class="premium-referral-card">
                                <div style="position: relative; z-index: 1;">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="avatar avatar-sm avatar-rounded" style="background: linear-gradient(135deg, #111c43 0%, #23b7e5 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(17, 28, 67, 0.2);">
                                                <i class="ti ti-share fs-16"></i>
                                            </span>
                                            <h5 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.2px;">Refer & Earn</h5>
                                        </div>
                                        <span class="badge" style="background: linear-gradient(135deg, rgba(35, 183, 229, 0.15) 0%, rgba(17, 28, 67, 0.08) 100%); color: #0284c7; border: 1px solid rgba(35, 183, 229, 0.35); font-size: 11px; padding: 6px 14px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-gift me-1"></i> Unlimited Referral Bonus
                                        </span>
                                    </div>
                                    <p class="fs-13 mb-3" style="color: #475569; max-width: 850px; line-height: 1.5;">
                                        Earn referral points by sharing your referral link with friends. You can only earn when your friends join and invest through the provided link.
                                    </p>

                                    <div class="alert alert-success text-center py-2 mb-2" role="alert" style="display: none; background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.35); color: #065f46; border-radius: 10px;" id="rcode">
                                        <i class="bi bi-check-circle-fill me-1"></i> <b>Copied !</b> Referral link is copied successfully.
                                    </div>

                                    <div class="referral-box d-flex align-items-center justify-content-between flex-wrap gap-2">
                                        <div class="d-flex align-items-center flex-grow-1 overflow-hidden me-2" style="min-width: 220px;">
                                            <span class="badge px-3 py-2 me-2 d-none d-sm-inline-block" style="background: rgba(255, 255, 255, 0.18); color: #ffffff; font-weight: 600; font-size: 12px; border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 8px;">
                                                <i class="ti ti-link me-1"></i> Referral Code
                                            </span>
                                            <span class="text-white fw-semibold fs-13 text-truncate" id="codeLeft" style="letter-spacing: 0.3px;">{{ config('detailsApp.url') }}member/register/{{ $data['memberid'] }}</span>
                                        </div>
                                        <button type="button" class="btn referral-copy-btn d-flex align-items-center" id="copyButtonIdLeft">
                                            <i class="fe fe-copy me-1"></i> <span id="msgTextLeft">CopyText</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="referral-watermark">
                                    <i class="ti ti-gift"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-emerald h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Current Status</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);">
                                            <i class="ti ti-shield-check fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="fw-bold mb-0" style="color: #065f46; letter-spacing: -0.3px;">{{ $data['status'] }}</h3>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #047857; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 11px; padding: 6px 12px; border-radius: 20px; font-weight: 600;">
                                            <i class="bi bi-patch-check-fill me-1"></i> Verified & Active
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Member Account</small>
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
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">My Referrals</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #845adf 0%, #6366f1 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(132, 90, 223, 0.3);">
                                            <i class="ti ti-users fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.3px;">{{ $data['downline'] }}</h3>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="badge" style="background: rgba(132, 90, 223, 0.15); color: #6b21a8; border: 1px solid rgba(132, 90, 223, 0.35); font-size: 11px; padding: 6px 12px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-trending-up me-1"></i> Total Referrals
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Direct Team</small>
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
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Fund Wallet</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #23b7e5 0%, #0284c7 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(35, 183, 229, 0.3);">
                                            <i class="ti ti-wallet fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.3px;">$ {{ number_format($data['p2p_wallet'], 2) }}</h3>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="badge" style="background: rgba(35, 183, 229, 0.15); color: #0369a1; border: 1px solid rgba(35, 183, 229, 0.35); font-size: 11px; padding: 6px 12px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-coins me-1"></i> Fund Balance
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Available for Investment</small>
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
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Income Wallet</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #f5b849 0%, #d97706 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(245, 184, 73, 0.3);">
                                            <i class="ti ti-cash fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.3px;">$ {{ number_format($data['wallet'], 2) }}</h3>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="badge" style="background: rgba(245, 184, 73, 0.18); color: #b45309; border: 1px solid rgba(245, 184, 73, 0.4); font-size: 11px; padding: 6px 12px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-arrow-up-right me-1"></i> Income Balance
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Total Earned Income</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-cash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xxl-12">
                            <div class="card custom-card overflow-hidden" style="border-radius: 14px; border: 1px solid rgba(17, 28, 67, 0.1); box-shadow: 0 4px 16px rgba(17, 28, 67, 0.08);">
                                <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2" style="background: linear-gradient(135deg, #111c43 0%, #1e3a8a 100%);">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="avatar avatar-sm avatar-rounded" style="background: rgba(35, 183, 229, 0.2); color: #7dd3fc; border: 1px solid rgba(35, 183, 229, 0.35);">
                                            <i class="ti ti-calendar-stats fs-16"></i>
                                        </span>
                                        <h5 class="text-white my-0 fw-bold">Today's Income</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge" style="background: rgba(35, 183, 229, 0.2); color: #7dd3fc; border: 1px solid rgba(35, 183, 229, 0.4); font-size: 14px; padding: 6px 16px; border-radius: 20px; font-weight: 700;">
                                            $ {{ number_format(todayIncome($data['memberid']), 2) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-indigo h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Today's Level Income</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #845adf 0%, #6366f1 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(132, 90, 223, 0.3);">
                                            <i class="ti ti-layers-linked fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-2">
                                        <div>
                                            <h3 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.3px;">
                                                $ {{ number_format(todayLevelIncome($data['memberid']), 2) }}
                                            </h3>
                                        </div>
                                        <div id="crm-total-customers"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <span class="badge" style="background: rgba(132, 90, 223, 0.15); color: #6b21a8; border: 1px solid rgba(132, 90, 223, 0.35); font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-trending-up me-1"></i> Level Income
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Member Today</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-layers-linked"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-sky h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Today's Direct Income</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #23b7e5 0%, #0284c7 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(35, 183, 229, 0.3);">
                                            <i class="ti ti-user-plus fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-2">
                                        <div>
                                            <h3 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.3px;">
                                                $ {{ number_format(todayDirectIncome($data['memberid']), 2) }}
                                            </h3>
                                        </div>
                                        <div id="crm-total-revenue"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <span class="badge" style="background: rgba(35, 183, 229, 0.15); color: #0369a1; border: 1px solid rgba(35, 183, 229, 0.35); font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-bolt me-1"></i> Direct Income
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Member Today</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-user-plus"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-emerald h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Today's Global Autopool</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);">
                                            <i class="ti ti-world fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-2">
                                        <div>
                                            <h3 class="fw-bold mb-0" style="color: #065f46; letter-spacing: -0.3px;">
                                                $ {{ number_format(todayGlobalAutopoolIncome($data['memberid']), 2) }}
                                            </h3>
                                        </div>
                                        <div id="crm-conversion-ratio"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #047857; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-refresh me-1"></i> Autopool
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Member Today</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-world"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-amber h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Today's Withdrawal Income</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #f5b849 0%, #d97706 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(245, 184, 73, 0.3);">
                                            <i class="ti ti-cash fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-2">
                                        <div>
                                            <h3 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.3px;">
                                                $ {{ number_format(todayWithdrawalIncome($data['memberid']), 2) }}
                                            </h3>
                                        </div>
                                        <div id="crm-total-deals"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <span class="badge" style="background: rgba(245, 184, 73, 0.18); color: #b45309; border: 1px solid rgba(245, 184, 73, 0.4); font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-arrow-down-right me-1"></i> Withdrawal
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Member Today</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-cash"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xxl-12">
                            <div class="card custom-card overflow-hidden" style="border-radius: 14px; border: 1px solid rgba(17, 28, 67, 0.1); box-shadow: 0 4px 16px rgba(17, 28, 67, 0.08);">
                                <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2" style="background: linear-gradient(135deg, #111c43 0%, #1e3a8a 100%);">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="avatar avatar-sm avatar-rounded" style="background: rgba(132, 90, 223, 0.2); color: #d8b4fe; border: 1px solid rgba(132, 90, 223, 0.35);">
                                            <i class="ti ti-chart-pie fs-16"></i>
                                        </span>
                                        <h5 class="text-white my-0 fw-bold">Total Income</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge" style="background: rgba(132, 90, 223, 0.2); color: #d8b4fe; border: 1px solid rgba(132, 90, 223, 0.4); font-size: 14px; padding: 6px 16px; border-radius: 20px; font-weight: 700;">
                                            $ {{ number_format(totalIncome($data['memberid']), 2) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-indigo h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Total Level Income</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #845adf 0%, #6366f1 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(132, 90, 223, 0.3);">
                                            <i class="ti ti-layers-linked fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-2">
                                        <div>
                                            <h3 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.3px;">
                                                $ {{ number_format(totalLevelIncome($data['memberid']), 2) }}
                                            </h3>
                                        </div>
                                        <div id="returns-rate"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <span class="badge" style="background: rgba(132, 90, 223, 0.15); color: #6b21a8; border: 1px solid rgba(132, 90, 223, 0.35); font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-trending-up me-1"></i> Level Income
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Member Total</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-layers-linked"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-sky h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Total Direct Income</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #23b7e5 0%, #0284c7 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(35, 183, 229, 0.3);">
                                            <i class="ti ti-user-plus fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-2">
                                        <div>
                                            <h3 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.3px;">
                                                $ {{ number_format(totalDirectIncome($data['memberid']), 2) }}
                                            </h3>
                                        </div>
                                        <div id="portfolio-value"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <span class="badge" style="background: rgba(35, 183, 229, 0.15); color: #0369a1; border: 1px solid rgba(35, 183, 229, 0.35); font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-bolt me-1"></i> Direct Income
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Member Total</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-user-plus"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-emerald h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Total Global Autopool</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);">
                                            <i class="ti ti-world fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-2">
                                        <div>
                                            <h3 class="fw-bold mb-0" style="color: #065f46; letter-spacing: -0.3px;">
                                                $ {{ number_format(totalGlobalAutopoolIncome($data['memberid']), 2) }}
                                            </h3>
                                        </div>
                                        <div id="total-invested"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #047857; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-refresh me-1"></i> Autopool
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Member Total</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-world"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="premium-stat-card stat-amber h-100">
                                <div class="stat-content d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #64748b;">Total Withdrawal Income</span>
                                        <span class="avatar avatar-md avatar-rounded" style="background: linear-gradient(135deg, #f5b849 0%, #d97706 100%); color: #ffffff; box-shadow: 0 4px 10px rgba(245, 184, 73, 0.3);">
                                            <i class="ti ti-cash fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-2">
                                        <div>
                                            <h3 class="fw-bold mb-0" style="color: #111c43; letter-spacing: -0.3px;">
                                                $ {{ number_format(totalWithdrawalIncome($data['memberid']), 2) }}
                                            </h3>
                                        </div>
                                        <div id="total-investments"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <span class="badge" style="background: rgba(245, 184, 73, 0.18); color: #b45309; border: 1px solid rgba(245, 184, 73, 0.4); font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 600;">
                                            <i class="ti ti-arrow-down-right me-1"></i> Withdrawal
                                        </span>
                                        <small style="color: #64748b; font-size: 11px;">Member Total</small>
                                    </div>
                                </div>
                                <div class="stat-watermark">
                                    <i class="ti ti-cash"></i>
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
