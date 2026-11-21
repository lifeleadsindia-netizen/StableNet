@extends('member.layouts.main')
@section('title', 'Trade Details')
@section('container')

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Trade Details</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Trade Details</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Trade Details</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Trade Time</th>
                                            <th>Memberid</th>
                                            <th>Sponsorid</th>
                                            <th>Package</th>
                                            <th>Target Pool</th>
                                            <th>Achieved Pool</th>
                                            <th>Total Profit</th>
                                            <th>Status</th>
                                            <th>Details</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($sdata as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td> {{ date('d-m-Y', strtotime($list['activated_at'])) }} | {{ date('d-m-Y', strtotime($list['activated_at'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>{{ $list['sponsorid'] }}</td>
                                                <td>$ 100.00</td>
                                                <td> 30 Trades / 32 Trades</td>
                                                <td>
                                                    @if (getPoolCount($list['id']) <= 30)
                                                        {{ getPoolCount($list['id']) }} Trades
                                                    @else
                                                        30 Trades
                                                    @endif

                                                    /

                                                    @if (getPoolCount($list['id']) <= 32)
                                                        {{ getPoolCount($list['id']) }} Trades
                                                    @else
                                                        32 Trades
                                                    @endif
                                                </td>
                                                <td>$ {{ number_format(100 + (function_exists('getTotalProfit') ? getTotalProfit($list['id']) : 0), 2) }}</td>
                                                <td>
                                                    @if ($list['status'] == 'Open')
                                                        <span class="btn btn-sm btn-success">{{ $list['status'] }}</span>
                                                    @else
                                                        <span class="btn btn-sm btn-danger ">{{ $list['status'] }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('member/trade/detailed-income')}}/{{$list['id']}}" class="btn btn-sm btn-primary">Detailed</a>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
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
