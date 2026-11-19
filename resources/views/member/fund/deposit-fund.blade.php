@extends('member.layouts.main2')
@section('title', 'Import Fund')
@section('container')
    <!--**********************************
                                                                    Content body start
                                                                ***********************************-->
    <div class="main-content app-content">
        <!-- row -->
        <div class="container-lg mt-3">
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Import Fund</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Import Fund</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row authentication authentication-basic h-100">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('successMsg') }}
                        </div>
                    @endif
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                    <div class="card custom-card">
                        <!--<div class="card-header">-->
                        <!--</div>-->
                        <div class="card-body p-4">
                            <p class="h5 fw-semibold mb-2">Import Fund Form </p>
                            <p class="mb-8">Imported fund will be added to your wallet automatically.</p>
                            <hr>
                            {{-- <form action="{{ route('createStaking') }}" method="post" id="stakingForm"> --}}
                            @csrf
                            <div class="row gy-3 mt-3">
                                <div class="col-xl-12">
                                    <label for="memberid" class="form-label text-default">Memberid</label>
                                    <input type="text" class="form-control form-control-lg" name="memberid"
                                        value="{{ $data['memberid'] }}" readonly id="memberid" />
                                    @error('memberid')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-12">
                                    <label for="memberid" class="form-label text-default">Amount</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">$</span>
                                        <input type="number" class="form-control form-control-lg" name="amount"
                                            id="amount" placeholder="Enter Your Amount" required />
                                    </div>
                                    <span id="amountMsg"></span>
                                    <span id="total"></span>
                                    @error('amount')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-12">
                                    <label for="inputGroup-sizing-default" class="form-label text-default">Wallet
                                        Balance</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">$</span>
                                        <input type="text" class="form-control form-control-lg"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                            name="balance" value="{{ number_format($data['p2p_wallet'], 2) }}" readonly />
                                    </div>
                                </div>
                                <div class="col-xl-12 mt-2">
                                    <input type="hidden" class="form-control" value="{{ csrf_token() }}" id="csrf">
                                    <input type="hidden" id="route" value="{{ route('addFund') }}">
                                    <!--<button class="btn btn-primary float-end" id="subsBtn">Deposit Fund</button>-->
                                    <button type="submit" class="btn btn-primary float-end transferBtn">Import
                                        Fund</button>
                                </div>
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- FOOTER -->

    <footer class="footer mt-auto py-3 bg-white text-center">
        <div class="container">
            <span class="text-muted"> Copyright © All Rights Reserved by {{ config('detailsApp.name') }} {{ date('Y') }}
                <span id="year"></span> <a href="javascript:void(0);" class="text-dark fw-semibold"></a>.
                Designed with <span class="bi bi-heart-fill text-danger"></span><a href="https://spruko.com/"
                    target="_blank">
                    {{-- <span class="fw-semibold text-primary text-decoration-underline">Stable Coin</span>
            </a> All
            rights
            reserved
        </span> --}}
        </div>
    </footer>
    <!-- END FOOTER -->

    </div>
    <!-- END PAGE-->

    <!-- SCRIPTS -->

    <!-- SCROLL-TO-TOP -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <!-- POPPER JS -->
    <script src="{{ asset('user_assets/libs/%40popperjs/core/umd/popper.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('user_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- NODE WAVES JS -->
    <script src="{{ asset('user_assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- SIMPLEBAR JS -->
    <script src="{{ asset('user_assets/libs/simplebar/simplebar.min.js') }}"></script>
    <link rel="modulepreload" href="{{ asset('user_assets/simplebar-635bad04.js') }}" />
    <script type="module" src="{{ asset('user_assets/simplebar-635bad04.js') }}"></script>

    <!-- COLOR PICKER JS -->
    <script src="{{ asset('user_assets/libs/%40simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- JSVECTOR MAPS JS -->
    <script src="{{ asset('user_assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('user_assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- APEX CHARTS JS -->
    <script src="{{ asset('user_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- CHARTJS CHART JS -->
    <script src="{{ asset('user_assets/libs/chart.js/chart.min.js') }}"></script>

    <!-- CRM-Dashboard -->
    <link rel="modulepreload" href="{{ asset('user_assets/crm-dashboard-5975eef2.js') }}" />
    <script type="module" src="{{ asset('user_assets/crm-dashboard-5975eef2.js') }}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('user_assets/sticky.js') }}"></script>

    <!-- APP JS -->
    <link rel="modulepreload" href="{{ asset('user_assets/app-3cade095.js') }}" />
    <script type="module" src="{{ asset('user_assets/app-3cade095.js') }}"></script>

    <!-- CUSTOM-SWITCHER JS -->
    <link rel="modulepreload" href="{{ asset('user_assets/custom-switcher-383b6a5b.js') }}" />
    <script type="module" src="{{ asset('user_assets/custom-switcher-383b6a5b.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="{{ asset('user_assets/block.js') }}"></script>

    </body>


    </html>

@endsection
