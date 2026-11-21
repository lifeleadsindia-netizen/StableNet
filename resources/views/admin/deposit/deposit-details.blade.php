@extends('admin.layouts.main')
@section('title', 'Deposit Details')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Deposit Details</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Deposit Details</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-md-12">
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
                    <div class="card custom-card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Bank Deposit Details Form') }}</h4>
                        </div>
                        <div class="card-body ">
                            <form action="{{ route('depositDataUSDT') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 col-12 my-2">
                                        <label style="color:white">Bank </label>
                                        <input type="text" class="form-control" name="bank"
                                            placeholder="Enter Bank Name">
                                        @error('bank')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12 my-2">
                                        <label style="color:white">IFSC </label>
                                        <input type="text" class="form-control" name="ifsc"
                                            placeholder="Enter IFSC Code">
                                        @error('ifsc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12 my-2">
                                        <label style="color:white">Account No </label>
                                        <input type="text" class="form-control" name="account_no"
                                            placeholder="Enter Account No">
                                        @error('account_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12 my-2">
                                        <label style="color:white">UPI </label>
                                        <input type="text" class="form-control" name="upi" placeholder="Enter UPI">
                                        @error('upi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12 my-2">
                                        <label style="color:white">QR Code </label>
                                        <input type="file" class="form-control" name="qrcode"
                                            placeholder="Upload QR Code">
                                        @error('qrcode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary my-2">Submit Depost Details</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @if (session()->has('failedMsg2'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('failedMsg2') }}
                            </div>
                        @endif
                        @if (session()->has('successMsg2'))
                            <div class="alert alert-success" role="alert">
                                {{ session('successMsg2') }}
                            </div>
                        @endif
                        <div class="card custom-card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Deposit Details Form') }}</h3>
                            </div>
                            <div class="card-body ">

                                <form action="{{ route('depositDataUSDT') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label style="color:white">Wallet Address </label>
                                            <input type="text" class="form-control" name="wallet"
                                                placeholder="Enter Wallet Address">
                                            @error('wallet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-6 mb-3">
                                            <label style="color:white">QR Code </label>
                                            <input type="file" class="form-control" name="uqrcode"
                                                placeholder="Upload QR Code">
                                            @error('uqrcode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary my-3">Submit Depost Details</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @if (session()->has('delMsg'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('delMsg') }}
                            </div>
                        @endif
                        <div class="card custom-card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Deposit Details') }}</h3>
                            </div>
                            <div class="card-body px-5" style="overflow: auto">
                                <table id="data_table" class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('QR Image') }}</th>
                                            <th>{{ __('Wallet Address') }}</th>
                                            <th>{{ __('Status') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($data as $list)
                                            @if ($list['address'] != null)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><img src="{{ asset('uploads/qr-code') }}/{{ $list['qrcode'] }}"
                                                            class="img-responsive" alt="" height="45"></td>

                                                    <td>
                                                        @if ($list['address'] == null)
                                                            --
                                                        @else
                                                            {{ $list['address'] }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($list['status'] == 'Not Live')
                                                            <a class="btn btn-danger "
                                                                href="{{ url('admin/deposit-status') }}/{{ $list['id'] }}">{{ $list['status'] }}</a>
                                                        @else
                                                            <a class="btn btn-success "
                                                                href="#">{{ $list['status'] }}</a>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endif

                                            @php $i++;  @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="card-body px-5" style="overflow: auto">
                        <table id="data_table" class="table text-center">
                            <thead>
                                <tr>
                                    <th>{{ __('S.No') }}</th>
                                    <th>{{ __('QR Image') }}</th>
                                    <th>{{ __('Bank') }}</th>
                                    <th>{{ __('IFSC') }}</th>
                                    <th>{{ __('Account No') }}</th>
                                    <th>{{ __('UPI') }}</th>
                                    <th>{{ __('Status') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1;  @endphp
                                @foreach ($data as $list)
                                    @if ($list['address'] == null)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><img src="{{ asset('uploads') }}/{{ $list['qrcode'] }}"
                                                class="img-responsive" alt="" height="45"></td>
                                        <td>
                                            @if ($list['bank'] == null)
                                                --
                                            @else
                                                {{ $list['bank'] }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($list['ifsc'] == null)
                                                --
                                            @else
                                                {{ $list['ifsc'] }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($list['account'] == null)
                                                --
                                            @else
                                                {{ $list['account'] }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($list['upi'] == null)
                                                --
                                            @else
                                                {{ $list['upi'] }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($list['status'] == 'Not Live')
                                                <a class="btn btn-danger "
                                                    href="{{ url('admin/deposit-status') }}/{{ $list['id'] }}">{{ $list['status'] }}</a>
                                            @else
                                                <a class="btn btn-success " href="#">{{ $list['status'] }}</a>
                                            @endif

                                        </td>
                                    </tr>
                                    @endif
                                    @php $i++;  @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="input-group"> <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i
                                class="fe fe-search header-link-icon fs-18"></i></a> <input type="search"
                            class="form-control border-0 px-2" placeholder="Search" aria-label="Username"> <a
                            href="javascript:void(0);" class="input-group-text" id="voice-search"><i
                                class="fe fe-mic header-link-icon"></i></a> <a href="javascript:void(0);"
                            class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false"> <i
                                class="fe fe-more-vertical"></i> </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p><span
                            class="search-tags"><i class="fe fe-user me-2"></i>People<a href="javascript:void(0)"
                                class="tag-addon"><i class="fe fe-x"></i></a></span> <span class="search-tags"><i
                                class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0)" class="tag-addon"><i
                                    class="fe fe-x"></i></a></span> <span class="search-tags"><i
                                class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)"
                                class="tag-addon"><i class="fe fe-x"></i></a></span> <span class="search-tags"><i
                                class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)" class="tag-addon"><i
                                    class="fe fe-x"></i></a></span>
                    </div>
                    <div class="my-4">
                        <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
                        <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert"> <a
                                href="notifications.html"><span>Notifications</span></a> <a class="ms-auto lh-1"
                                href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i
                                    class="fe fe-x text-muted"></i></a> </div>
                        <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert"> <a
                                href="alerts.html"><span>Alerts</span></a> <a class="ms-auto lh-1"
                                href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i
                                    class="fe fe-x text-muted"></i></a> </div>
                        <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert"> <a
                                href="mail.html"><span>Mail</span></a> <a class="ms-auto lh-1" href="javascript:void(0);"
                                data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group ms-auto"> <button class="btn btn-sm btn-primary-light">Search</button>
                        <button class="btn btn-sm btn-primary">Clear Recents</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Footer Start -->

    {{-- @push('script') --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            //fund transfer memberid check
            $('.packView').click(function() {
                var id = $(this).prop('id');
                $('.mySec' + id).toggle();
            });
        });
    </script>
    {{-- @endpush --}}
@endsection
