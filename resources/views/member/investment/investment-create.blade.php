@extends('member.layouts.main')
@section('title', 'Buy SBT')
@section('container')


    <div class="main-content app-content">
        <!-- row -->
        <div class="container-lg mt-3">
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Buy SBT Form</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buy SBT Form</li>
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
                        <div class="card-header">
                            <p class="h5 fw-semibold mb-2 text-center">Buy SBT Form </p>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('createStaking') }}" method="post" id="stakingForm">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="memberid" class="form-label text-default">Memberid</label>
                                        <input type="text" class="form-control form-control-lg" name="memberid"
                                            value="{{ $data['memberid'] }}" readonly id="memberid" />
                                        @error('memberid')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 mb-2">
                                        <label for="amount" class="form-label text-default">Package</label>
                                        <select class="form-select form-control-lg" aria-label="Default select example"
                                            name="amount" id="amount">
                                            <option value="">Select Option</option>
                                            <option value="100">100 SBT</option>
                                            <option value="" disabled>200 SBT</option>
                                            <option value="" disabled>400 SBT</option>
                                            <option value="" disabled>800 SBT</option>
                                            <option value="" disabled>1600 SBT</option>
                                            <option value="" disabled>3200 SBT</option>
                                        </select>
                                        @error('amount')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="inputGroup-sizing-default" class="form-label text-default">Fund
                                            Wallet</label>
                                        <div class="input-group input-group-sm ">
                                            <span class="input-group-text" id="inputGroup-sizing-default">$</span>
                                            <input type="text" class="form-control form-control-lg"
                                                aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-default"
                                                value="{{ number_format($data['p2p_wallet'], 2) }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="txn_password" class="form-label text-default">Transaction
                                            Password</label>
                                        <input type="password" class="form-control form-control-lg" name="txn_password"
                                            id="txn_password" placeholder="Enter Transaction Password"/>
                                        @error('txn_password')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 mt-3">
                                        <input type="hidden" class="form-control" value="{{ csrf_token() }}"
                                            id="csrf">
                                        <!--<h4 class="btn btn-danger float-end px-4" id="countdown"-->
                                        <!--    data-target-date="<?php echo $rest; ?>">00:00:00</h4>-->
                                        <button class="btn btn-primary float-end" style="display: visible" id="subsBtn">Buy SBT Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
