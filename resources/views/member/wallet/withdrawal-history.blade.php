@extends('member.layouts.main')
@section('title', 'Withdrawal History')
@section('container')

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Withdrawal History</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Withdrawal History</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Withdrawal History</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Request Id</th>
                                            <th>Member Id</th>
                                            <th>Wallet Address</th>
                                            <!--<th>Type</th>-->
                                            <th>Gross</th>
                                            <th>Charges</th>
                                            <th>Net</th>
                                            <th>Status</th>
                                            <th>Payment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($reqdata as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['request_date'])) }}</td>
                                                <td>{{ $list['request_id'] }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['wallet_address'] }}</td>
                                                <!--<td><span class="btn btn-sm btn-primary">{{ $list['type'] }}</span></td>-->
                                                <td>{{ $list['gross_amount'] }} SBT</td>
                                                <td>{{ $list['service_charge'] }} SBT</td>
                                                <td>{{ $list['net_amount'] }} SBT</td>
                                                <td>
                                                    <label class="btn btn-success">{{ $list['status'] }}</label>
                                                </td>
                                                <td>{{ $list['payment_date'] }}</td>
                                            </tr>
                                            @php $i++;  @endphp
                                        @endforeach

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
