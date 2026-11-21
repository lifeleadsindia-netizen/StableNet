@extends('member.layouts.main')
@section('title', 'User Activation')
@section('container')


    <div class="content-body">
        <div class="container-fluid">
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
                    @if ($data['status'] == 'Active')
                        <div class="card  profile-card bg-success m-b30 shadow-lg ">
                            <div class="card-body mb-3 pb-4">
                                <h3 class="text-warning mt-2 mb-3" style="font-weight:600">Account Activated Successfully
                                </h3>
                                <h6 class=" mb-0"
                                    style="color: rgb(244, 239, 239);font-weight:600;font-size:14px;word-spacing:1px">
                                    Congratulations And Welcome To {{config('detailsApp.name')}} Family
                                    Your
                                    account is successfully activated please go for upgrade section to activate other
                                    packages Wish You a very Best Of Luck.</h6>
                            </div>
                        </div>
                    @else
                        <div class="card profile-card card-bx mb-5 " id="actBox">
                            <div class="card-header">
                                <h6 class="card-title">Account Activation Form</h6>
                            </div>
                            <div class="card-body pb-0 p-0 mt-1">
                                <form action="{{ route('activateUser') }}" method="post" id="myForm">
                                    @csrf
                                    <div class="card-body mb-5 pb-4">
                                        <div class="col-sm-12 m-b30 mb-4">
                                            <label class="form-label my-2">Memberid</label>
                                            <input type="text" class="form-control" name="memberid"
                                                value="{{ $data['memberid'] }}" readonly id="memberid">
                                            @error('memberid')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 mt-4">
                                            <label class="form-label" for="basic-default-country">Package</label>
                                            <input type="text" class="form-control flatpickr-validation"
                                                id="basic-default-dob" value="10" name="package" readonly />
                                            {{-- <select class="form-control" name="package" required>
                                                <option value="">Select Package</option>
                                                <option value="10">$10</option>
                                                <option value="20">$20</option>
                                                <option value="50">$50</option>
                                                <option value="100">$100</option>
                                            </select> --}}
                                            @error('package')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 mt-4">
                                            <label class="form-label" for="basic-default-dob">Fund Balance</label>
                                            <input type="text" class="form-control flatpickr-validation"
                                                id="basic-default-dob" value="{{ $data['p2p_wallet'] }}" name="balance" readonly />
                                        </div>
                                        <div class="mb-6 mt-4">
                                            <label class="form-label" for="basic-default-upload-file">Transaction
                                                Password</label>
                                            <input type="password" class="form-control" placeholder="Enter Transaction Password"
                                                name="txn_password" required/>
                                            @error('txn_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 m-b30 mb-3 mt-4">
                                            <input type="hidden" class="form-control my-1" value="{{ csrf_token() }}"
                                                id="csrf">
                                            <button class="btn btn-primary float-end" id="subBtn">Activate
                                                Account</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card" id="msgBox" style="display:none">
                            <div class="card-header">
                                <h6 class="title">Account Activation Status</h6>
                            </div>
                            <div class="card-body">
                                <div class="my-5 d-block mx-auto text-center">
                                    <div class="spinner-grow text-primary me-2" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-secondary me-2" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-success me-2" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-danger me-2" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <br>
                                <small class="mt-5 fst-italic lh-base text-danger">**Your account activation process has
                                    been started. Please don't refresh or press back button untill your account gets
                                    activated.</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->


@endsection
