@extends('member.layouts.main')
@section('title', 'Global Autopool Income')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Global Autopool Income</h1>
                <span>{{ __('Global Autopool Income details') }}</span>

                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Global Autopool Income</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('wMessage'))
                        <div class="alert alert-primary">{{ session('wMessage') }}</div>
                    @endif
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title"> Global Autopool Income </div>
                        </div>
                        <div class="card-body" style="overflow: auto;">
                            <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Memberid</th>
                                        <th>Package</th>
                                        <th>Pool No</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1;  @endphp
                                    @forelse ($profitData as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                            <td>{{ $list['memberid'] }}</td>
                                            <td>$ {{ number_format((float)$list['package'], 2) }}</td>
                                            <td>{{ $list['pool_no'] }}</td>
                                            <td>$ {{ number_format($list['amount'], 2) }}</td>
                                            <td>
                                                @if ($list['status'] == 'Unpaid')
                                                    <div class="btn btn-sm btn-danger">{{ $list['status'] }}</div>
                                                @elseif ($list['status'] == 'Paid')
                                                    <div class="btn btn-sm btn-success">{{ $list['status'] }}</div>
                                                @else
                                                    <div class="btn btn-sm btn-warning">{{ $list['status'] }}</div>
                                                @endif
                                            </td>
                                        </tr>
                                        @php $i++;  @endphp
                                    @empty
                                        <tr>
                                            <td colspan="7" class="no-data-found-cell">No Data Found</td>
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
