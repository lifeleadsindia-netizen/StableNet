@extends('member.layouts.main')
@section('title', 'Investment Slot Details')
@section('container')

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Investment Slot Details</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Investment Slot Details</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-title">Investment Slot History</div>
                            <a href="{{ url('/member/invest-slot') }}" class="btn btn-sm btn-primary">
                                <i class="ri-add-line me-1"></i> Activate Next Slot
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Invest Date</th>
                                            <th>Member ID</th>
                                            <th>Order ID</th>
                                            <th>Txn ID</th>
                                            <th>Slot / Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($sdata as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['txn_date'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['order_id'] }}</td>
                                                <td>{{ $list['txnid'] }}</td>
                                                <td>
                                                    <span class="badge bg-primary-transparent fs-12 fw-semibold">
                                                        ${{ number_format((float) $list['package'], 0) }}
                                                    </span>
                                                </td>

                                                <td>
                                                    @if ($list['status'] == 'Accepted')
                                                        <span class="badge bg-success-transparent text-success">{{ $list['status'] }}</span>
                                                    @else
                                                        <span class="badge bg-danger-transparent text-danger">{{ $list['status'] }}</span>
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
