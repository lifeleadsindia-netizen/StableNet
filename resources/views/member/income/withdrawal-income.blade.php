@extends('member.layouts.main')
@section('title', 'Withdrawal Income')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Withdrawal Income</h1>
                <span>{{ __('Withdrawal Income details') }}</span>

                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Withdrawal Income</li>
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
                        <div class="card-header justify-content-between">
                            <div class="card-title">Withdrawal Income </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px; min-width: 50px;">S.No</th>
                                            <th style="width: 140px; min-width: 130px;">Date</th>
                                            <th style="width: 130px; min-width: 120px;">Member Id</th>
                                            <th style="width: 120px; min-width: 110px;">Level Id</th>
                                            <th style="width: 140px; min-width: 130px;">Name</th>
                                            <th class="text-center" style="width: 80px; min-width: 75px;">Level</th>
                                            <th class="text-end" style="width: 145px; min-width: 135px;">Withdrawal Amount</th>
                                            <th class="text-end" style="width: 145px; min-width: 135px;">Withdrawal Charge</th>
                                            <th class="text-end" style="width: 110px; min-width: 95px;">Share</th>
                                            <th class="text-end" style="width: 130px; min-width: 120px;">Income Amount</th>
                                            <th style="width: 140px; min-width: 125px;">Income Type</th>
                                            <th class="text-center" style="width: 100px; min-width: 90px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @forelse ($directData as $list)
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td>{{ date('d-m-Y H:i', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['level_id'] ?? '-' }}</td>
                                                <td>{{ $list['name'] }}</td>
                                                <td class="text-center">{{ $list['level'] ?? '-' }}</td>
                                                <td class="text-end">$ {{ number_format((float) ($list['withdrawal_amount'] ?? 0), 2) }}</td>
                                                <td class="text-end">
                                                    <span class="text-danger fs-13 fw-semibold">
                                                        $ {{ number_format((float) ($list['withdrawal_charge'] ?? 0), 2) }}
                                                    </span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="text-info fs-13 fw-semibold">
                                                        $ {{ number_format((float) ($list['share'] ?? 0), 2) }}
                                                    </span>
                                                </td>
                                                <td class="text-end"><strong class="text-success">$
                                                        {{ number_format((float) ($list['amount'] ?? 0), 2) }}</strong></td>


                                                <td><span
                                                        class="badge bg-info-transparent">{{ $list['type'] ?? 'Withdrawal Income' }}</span>
                                                </td>

                                                <td class="text-center">
                                                    @if ($list['status'] == 'Paid')
                                                        <label class="btn btn-sm btn-success">{{ $list['status'] }}</label>
                                                    @else
                                                        <label class="btn btn-sm btn-danger">{{ $list['status'] }}</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $i++;  @endphp
                                        @empty
                                            <tr>
                                                <td colspan="12" class="no-data-found-cell text-center py-4">No Data Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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
                                class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)" class="tag-addon"><i
                                    class="fe fe-x"></i></a></span> <span class="search-tags"><i
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
    <script>
        $(document).ready(function () {
            //fund transfer memberid check
            $('.packView').click(function () {
                var id = $(this).prop('id');
                $('.mySec' + id).toggle();
            });
        });
    </script>
    {{-- @endpush --}}
    <style>
        .table-responsive {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch;
        }

        #file-export,
        .dataTables_scrollHeadInner,
        .dataTables_scrollHeadInner table,
        .dataTables_scrollBody table {
            min-width: 1320px !important;
        }

        .dataTables_scrollBody {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch;
        }

        .dataTables_scrollBody td.dataTables_empty,
        .dataTables_scrollBody td.no-data-found-cell {
            min-width: 1320px !important;
            text-align: center !important;
            padding: 35px 15px !important;
        }

        /* Force all 12 th and td to stay visible and never be hidden by DataTables responsive */
        #file-export th,
        #file-export td,
        .dataTables_scrollHeadInner table th,
        .dataTables_scrollBody table td {
            display: table-cell !important;
            visibility: visible !important;
            white-space: nowrap !important;
            vertical-align: middle !important;
        }
    </style>
@endsection