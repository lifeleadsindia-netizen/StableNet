@extends('member.layouts.main')
@section('title', 'User Upgrade ')
@section('container')


    <!-- partial -->
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
                    @if ($data['status'] == 'Temp')
                        <div class="card bg-warning m-b30" style="border-radius:10px">
                            <div class="card-body mb-3 pb-4 ">
                                <h2 class="text-danger" style="font-weight: 600;">Account is not active</h2>
                                <h6 class=" mb-0 text-white mt-2" style="font-weight:500;font-size:14px;word-spacing:1px">
                                    Your account is not activated. Please go to
                                    Activation section to activate account</h6>
                            </div>
                        </div>
                        {{-- @elseif ($data['status'] == 'Active')
                            <div class="card   bg-success m-b30" style="border-radius:10px">
                                <div class="card-header">
                                    <h4>Upgrade Section</h4>
                                </div>
                                <div class="card-body mb-3 pb-4 ">
                                    <h3>Account is still active</h3>
                                    <h6 class="card-description text-dark">Your account is activated. Account upgrade gets
                                        activated once account gets Deactive</h6>
                                </div>
                            </div> --}}
                    @else
                        <div class="card profile-card card-bx mb-3" id="actBox">
                            <div class="card-header">
                                <h6 class="card-title">Upgrade Activation Form</h6>
                            </div>
                            <div class="card-body mt-2">
                                <form action="{{ route('upgradeUser') }}" method="post" id="myForm">
                                    @csrf
                                    <div class="card-body pb-0 p-0 mt-1 mb-4">
                                        <div class="col-sm-12 mb-4">
                                            <label class="form-label">MemberId</label>
                                            <input type="text" class="form-control" name="memberid"
                                                value="{{ $data['memberid'] }}" readonly id="memberid">
                                            @error('memberid')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-6 mt-4">
                                            <label class="form-label" for="basic-default-country">Package</label>
                                            <select class="form-control" name="package" required>
                                                <option value="">Select Package</option>
                                                @if ($data['package'] == 10)
                                                    <option value="20">$20</option>
                                                @elseif ($data['package'] == 20)
                                                    <option value="50">$50</option>
                                                @elseif ($data['package'] == 50)
                                                    <option value="100">$100</option>
                                                @elseif ($data['package'] == 100)
                                                    <option value="">All Packages are upgraded</option>
                                                @endif
                                            </select>
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
                                        <div class="col-sm-12 mb-4 mt-4">
                                            <input type="hidden" class="form-control" value="{{ $data['id'] }}"
                                                name="id">
                                            <input type="hidden" class="form-control" value="{{ csrf_token() }}"
                                                id="csrf">

                                            <button class="btn btn-primary float-end mb-4" type="submit" name="submit"
                                                id="subBtn">Upgrade Account</button>

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
                                <small class="mt-5 fst-italic lh-base text-danger">**Your account upgradation process has
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
