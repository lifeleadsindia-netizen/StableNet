@extends('member.layouts.main')
@section('title', 'Member Activation')
@section('container')



    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">{{ config('detailsApp.name') }} /</span> Member Activation

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
                            <h6 class="title">Account Activation Form</h6>
                        </div>
                        <form action="{{ route('memberActivate') }}" method="post">
                            @csrf
                            <div class="card-body mb-5 pb-4">
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">MemberId</label>
                                    <input type="text" class="form-control" name="memberid"
                                        placeholder="Enter Memberid" id="userid">
									<small id="messageU"></small>
                                    @error('memberid')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">Package</label>
                                    <input type="text" class="form-control" name="package" placeholder="Enter Memberid First" id="package">
                                    @error('package')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">Value</label>
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="text" class="form-control" value="$" readonly>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="amount" placeholder="Enter Memberid First" id="packAmount">
                                        </div>
                                    </div>
                                    @error('package')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">P2P Wallet</label>
                                    <input type="text" class="form-control" name="p2p_wallet"
                                        value="{{ $data['p2p_wallet'] }}" readonly>
                                    @error('p2p_wallet')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <label class="form-label">Transaction Password</label>
                                    <input type="password" class="form-control" name="txn_password"
                                        placeholder="Enter Transaction Password">
                                    @error('txn_password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 m-b30">
                                    <input type="hidden" class="form-control" value="{{ $data['id'] }}" name="id">
                                    <button class="btn btn-primary float-end" type="submit" name="submit" id="actBtn">Account
                                        Activate</button>
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
