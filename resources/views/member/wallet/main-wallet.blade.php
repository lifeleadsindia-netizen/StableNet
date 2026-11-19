@extends('member.layouts.main')
@section('title', 'Main Wallet')
@section('container')

    <!--**************************Content body start**************************-->

    <div class="main-content app-content">
        <!-- row -->
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Main Wallet</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Main Wallet</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- row -->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                    @if (session()->has('successMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('successMsg') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body text-center pt-2 pb-1">
                            <div>
                                <img src="{{ asset('user_assets/wallet.png') }}" class="img-lg rounded-circle m-2"
                                    alt="wallet" width="100" />
                                <h5 class="text-primary" id="wallet_text">Income Wallet</h5>
                                <p class="text-muted mb-0"></p>
                            </div>
                            <div >
                                <h3 class="card-text d-inline" id="wallet_amount">$ {{ number_format($data['wallet'], 2) }} </h3>
                                {{-- <h3 class="d-inline">$</h3> --}}
                            </div>
                            
                            <button class="btn btn-warning btn-sm my-3">Total Of All Wallets</button>
                            <div class="border-top py-2">
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <h6 class="mb-1">$ {{ number_format(totalIncome($data['memberid']), 2) }}</h6>
                                        <p>Total Income</p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class="mb-1">$ {{ number_format(totalWithdrawals($data['memberid']), 2) }}
                                        </h6>
                                        <p>Total Withdrawal</p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class="mb-1">$ {{ number_format(todayWithdrawals($data['memberid']), 2) }}
                                        </h6>
                                        <p>Today's Withdrawal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('initWithdrawal') }}" method="post">
                            @csrf
                            <div class="card-body py-0">
                              
                                <div class="mb-3">
                                    <label class="form-label">Wallet Type</label>
                                    <div class="">
                                        <select class="form-control" name="wallet_type" id="type">
                                            <option value="Income Wallet" selected>Income Wallet</option>
                                        </select>
                                    </div>
                                    @error('wallet_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <div class="">
                                        <input type="number" step="any" min="1" class="form-control" name="amount" placeholder="Enter Amount (Min $1)"
                                            id="withAmount" required>
                                    </div>
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">Transaction Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Transaction Password"
                                        name="txn_password" id="txn_password">
                                    @error('txn_password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-0">
                                    <div class="d-grid gap-2">
                                        <input type="hidden" name="memberid" id="memberid"
                                            value="{{ $data['memberid'] }}">
                                        <div class="row mb-4">
                                            <div class="col-12 ">
                                                <div class="d-grid gap-2">
                                                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                                    <input type="hidden" id="wallet" value="{{ $data['wallet'] }}">
                                                    <input type="hidden" name="memberWallet"
                                                        value="{{ $data['member_wallet'] }}" id="memberWallet">
                                                    <button
                                                        class="btn btn-primary btn-rounded  btn-block mt-3 float-end withdraw_btn subBtn">Withdraw</button>
                                                </div>
                                                <div class="text-center">
                                                    <span id="wMesg" class="text-danger text-center mt-2"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
                                                    Content body end
                                                ***********************************-->
@endsection
