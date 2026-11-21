@extends('member.layouts.main')
@section('title', 'Staking Creation')
@section('container')
    <!--**********************************
                                        Content body start
                                    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <h4 class="fw-bold py-3 mb-4 text-white">
                <span class=" fw-light">{{ config('detailsApp.name') }} /</span> Staking Creation

            </h4>
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
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
                    <div class="card profile-card card-bx m-b30">
                        <div class="card-header">
                            <h6 class="title mt-2">Staking Form</h6>
                        </div>
                        <form action="{{ route('createStaking') }}" method="post">
                            @csrf
                            <div class="card-body mb-5 pb-4">
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">Memberid</label>
                                    <input type="text" class="form-control" name="memberid"
                                        value="{{ $data['memberid'] }}" readonly id="memberid">
                                    @error('memberid')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">Amount</label>
                                    <div class="row">
                                        <div class="col-2 me-0 pe-0">
                                            <input type="text" class="form-control" value="$" readonly
                                                style="border-top-right-radius: 0px; border-bottom-right-radius:0px">
                                        </div>
                                        <div class="col-10 ms-0 ps-0">
                                            <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount"
                                                style="border-top-left-radius: 0px; border-bottom-left-radius:0px">
                                        </div>
                                    </div>
                                    <span id="amountMsg"></span>
                                    @error('amount')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">Fund Wallet</label>
                                    <div class="row">
                                        <div class="col-2 me-0 pe-0">
                                            <input type="text" class="form-control" value="$" readonly
                                                style="border-top-right-radius: 0px; border-bottom-right-radius:0px">
                                        </div>
                                        <div class="col-10 ms-0 ps-0">
                                            <input type="text" class="form-control"
                                                value="{{ number_format($data['p2p_wallet'], 2) }}"
                                                style="border-top-left-radius: 0px; border-bottom-left-radius:0px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">Transaction Password</label>
                                    <div class="col-12 ms-0 ps-0">
                                        <input type="password" class="form-control" placeholder="Enter Transacton Password" name="txn_pas">
                                    </div>
                                    @error('txn_pas')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <input type="hidden" class="form-control" value="{{ csrf_token() }}" id="csrf">
                                    <button class="btn btn-primary float-end" id="act_btn">Create Staking</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
