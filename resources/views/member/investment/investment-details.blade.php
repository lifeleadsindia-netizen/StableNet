@extends('member.layouts.main')
@section('title', 'Buy Orders Details')
@section('container')

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Buy Orders Details</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buy Orders Details</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Buy Orders Details</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Invest Date</th>
                                            <th>Memberid</th>
                                            <th>OrderId</th>
                                            <!--<th>Package Name</th>-->
                                            <th>TxnId</th>
                                            <th>Package</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($sdata as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td> {{ date('d-m-Y', strtotime($list['txn_date'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td> {{ $list['order_id'] }}</td>
                                                <!--<td class="text-center">{{ $list['package_name'] }}</td>-->
                                                <td>{{ $list['txnid'] }}</td>
                                                <td>{{ $list['package'] }} SBT</td>

                                                <td>
                                                    @if ($list['status'] == 'Accepted')
                                                        <span class="btn  btn-success">{{ $list['status'] }}</span>
                                                    @else
                                                        <span class="btn  btn-danger ">{{ $list['status'] }}</span>
                                                    @endif
                                                </td>
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
