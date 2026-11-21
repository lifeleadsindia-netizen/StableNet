@extends('member.layouts.main')
@section('title', 'P2P Wallet')
@section('container')

    <!--**********************************Content body start***********************************-->
    <div class="main-content app-content">
        <!-- row -->
        <div class="container-fluid">
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">P2P Wallet</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">P2P Wallet</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- row -->
            <div class="row justify-content-center">
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
                    <div class="card">
                        <div class="card-body text-center pt-2 pb-1">
                            <div>
                                <img src="{{ asset('user_assets/wallet.png') }}" class="img-lg rounded-circle m-2"
                                    alt="wallet" width="100" />
                                <h5 class="text-primary">{{ config('detailsApp.name') }} P2P Wallet</h5>
                                <p class="text-muted mb-0"></p>
                            </div>
                            <h3 class="card-text">$ {{ $data['p2p_wallet'] }}</h3>
                            <span class="btn btn-warning btn-sm my-3">Total Of P2P Wallets</span>
                        </div>
                        <div class="card-body py-0">
                            <form class="forms-sample" action="{{ route('fundTrans') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Member Id</label>
                                    <div class="">
                                        <input type="text" id="memberid" class="form-control" name="memberid" placeholder="Enter Member Id">
                                        <span id="memMsg"></span>
                                    </div>
                                    @error('memberid')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <div class="">
                                        <input type="text" class="form-control" name="amount" placeholder="Enter Amount"
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
                                        <div class="row mb-4">
                                            <div class="col-12 ">
                                                <div class="d-grid gap-2">
                                                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="sender" value="{{ $data['memberid'] }}">
                                                    <button
                                                        class="btn btn-primary btn-rounded  btn-block mt-3 float-end withdraw_btn  subBtn">Transfer
                                                        Amount</button>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            //fund transfer memberid check
            $('#memberid').on('input', function() {
                var memberid = $(this).val();
                var csrf = $('#csrf').val();
                $.ajax({
                    url: '/getMember',
                    type: 'POST',
                    data: {
                        'memberid': memberid,
                        _token: csrf,
                    },
                    success: function(response) {
                        $('#memMsg').html(response['data']);

                    }
                });
            });
        });
    </script>
    <!--**********************************Content body end***********************************-->

@endsection
