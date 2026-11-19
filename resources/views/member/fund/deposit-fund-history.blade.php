@extends('member.layouts.main')
@section('title', 'Import Fund History')
@section('container')

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Import Fund History</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Import Fund History</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Import Fund History</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Date</th>
                                            <th>Memberid</th>
                                            <th>Order Id</th>
                                            <th>Type</th>
                                            <!--<th>Txn Id</th>-->
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($addfundData as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['orderid'] }}</td>
                                                <td>{{ $list['type'] }}</td>
                                                <!--<td>{{ $list['txnid'] }}</td>-->
                                                <td class="text-center">$ {{ number_format($list['amount'],2) }}</td>
                                                <td>
                                                    @if ($list['status'] == 'Accepted')
                                                        <span class="btn btn-success">{{ $list['status'] }}</span>
                                                    @elseif ($list['status'] == 'Cancelled')
                                                        <span class="btn btn-danger">{{ $list['status'] }}</span>
                                                    @else
                                                        <span class="btn btn-primary">{{ $list['status'] }}</span>
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
