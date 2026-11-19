@extends('member.layouts.main')
@section('title', 'Wallet To P2P Transfer')
@section('container')

    <!-- Content wrapper -->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <h4 class="fw-bold text-white py-3 mb-4 text-white">
                <span class="text-white fw-light text-white">{{ config('detailsApp.name') }} /</span> Wallet To P2P Transfer
            </h4>

            <div class="row g-6">
                <!-- Browser Default -->
                <div class="col-md-6 mb-md-0">
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
                    <div class="card mb-4 border border-2 border-primary rounded primary-shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <span class="badge badge-primary">{{ config('detailsApp.name') }} Wallet To P2P</span>
                                <div class="d-flex justify-content-center ">
                                    <sub class="h5 pricing-currency mb-auto mt-1 text-primary">$</sub>
                                    <h2 class="mb-0 text-primary">{{ $data['p2p_wallet'] }}</h2>
                                    <sub class="h6 pricing-duration mt-auto mb-3 fw-normal">P2P Balance</sub>
                                </div>
                            </div>
                            <form class="browser-default-validation mt-5" action="{{ route('walletP2pTransfer') }}"
                                method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label text-dark" for="basic-default-dob">Amount</label>
                                    <input type="text" class="form-control flatpickr-validation" name="amount"
                                        placeholder="Enter Amount" id="withAmount" min="1" />
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-dark" for="basic-default-dob">Wallet Balance</label>
                                    <input type="text" class="form-control flatpickr-validation" name="wallet"
                                        value="{{ $data['wallet'] }}" readonly/>
                                    @error('wallet')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-dark" for="basic-default-upload-file">Transaction
                                        Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Transaction Password"
                                        name="txn_password" />
                                    @error('txn_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid w-100 mt-3 mb-3">
                                            <input type="hidden" name="balance" id="balance"
                                                value="{{ $data['wallet'] }}">
                                            <input type="hidden" name="sender" value="{{ $data['memberid'] }}">
                                            <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                            <button class="btn btn-primary" id="transBtn">Transfer
                                                Amount</button>
                                        </div>
                                        {{-- <span id="wMesg" class="text-danger text-center"></span> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Browser Default -->
        </div>

    </div>
    <!-- / Content -->
@endsection
