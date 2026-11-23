@extends('member.layouts.main')
@section('title', 'P2P Wallet History')
@section('container')

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">P2P Wallet History</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">P2P Wallet History</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">P2P Wallet History</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Memberid</th>
                                            <th>Type</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Balance</th>
                                            <th>Particular</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @forelse ($passdata as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}<br>{{ date('H:i:s', strtotime($list['created_at'])) }}
                                                </td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['walletType'] }}</td>
                                                <td class="text-danger">- $ {{ $list['credit'] }}</td>
                                                <td class="text-success">+ $ {{ $list['debit'] }}</td>
                                                <td>$ {{ $list['balance'] }}</td>
                                                <td>{{ $list['particular'] }}</td>
                                            </tr>
                                            @php $i++;  @endphp
                                        @empty
                                            <tr>
                                                <td colspan="8" class="no-data-found-cell">No Data Found</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End:: row-4 -->


        </div>


    </div>
    <!-- END MAIN-CONTENT -->


@endsection
