@extends('member.layouts.main')
@section('title', 'Import Fund')
@section('container')



    <!--**********************************
                                                    Content body start
                                                ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <h4 class="fw-bold py-3 mb-4 text-light">
                <span class=" fw-light">{{ config('detailsApp.name') }} /</span> Import Fund

            </h4>
            <!-- row -->

        </div>
        <div class="row px-3">
            <div class="col-xl-6 col-lg-6 ">
                @if (session()->has('failedMsg'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('failedMsg') }}
                    </div>
                @endif
                @if (session()->has('successMsg'))
                    <div class="alert alert-success" role="alert">
                        <strong>Congratulations! </strong> {{ session('successMsg') }}
                    </div>
                @endif
                <div class="card profile-card card-bx m-b30">
                    <div class="card-header">
                        <h6 class="title">Import Fund Form</h6>
                    </div>
                    <form action="{{ route('instantFunds') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card-body mb-5 pb-4">
                            <div class="col-sm-12 m-b30">
                                <label class="form-label">MemberId</label>
                                <input type="text" class="form-control" name="memberid" id="memberid"
                                    value="{{ $data['memberid'] }}" readonly>
                                @error('memberid')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 m-b30">
                                <label class="form-label">Amount</label>
                                <input type="number" class="form-control" name="amount" min="0"
                                    placeholder="Enter Your Amount" id="amount">
                                @error('amount')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 m-b30">
                                <label class="form-label">Wallet Balance</label>
                                <input type="text" class="form-control" name="wallet"
                                    value="{{ $data['p2p_wallet'] }}" readonly>
                                @error('txnid')
                                    <span class="text-danger"> {{ $message }}</span>
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
                            <div class="col-sm-12 m-b30">
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                <button class="btn btn-primary float-end transferBtn">Import
                                    Funds</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--**********************************
                                                    Content body end
                                                ***********************************-->

@endsection
