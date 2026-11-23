@extends('member.layouts.main')
@section('title', 'Detailed Income')
@section('container')

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Detailed Income</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detailed Income</li>
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
                                <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Date & Time</th>
                                            <th>Memberid</th>
                                            <th>Level</th>
                                            <th>Amount</th>
                                            <th>Total Amount</th>
                                            <th>Downline Id</th>
                                            <th>Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($sdata as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td> {{ date('d-m-Y', strtotime($list['created_at'])) }} <br>{{ date('H:i:s', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['memberid'] }}</td>
                                                <td>Level {{ $list['level'] }}</td>
                                                <td>$ {{ number_format((float)$list['amount'], 2) }}</td>
                                                <td>$ {{ number_format((float)$list['total_amount'], 2) }}</td>
                                                <td> {{ $list['downline_id'] }}</td>
                                                <td> {{ $list['name'] }}</td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
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
