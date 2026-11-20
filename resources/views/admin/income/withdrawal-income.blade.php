@extends('admin.layouts.main')
@section('title', 'Withdrawal Income')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Withdrawal Income</h1>

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
                            <div class="card-title">Withdrawal Income details</div>
                        </div>
                        <div class="card-body">
                            <table id="file-export" class="table table-bordered text-nowrap w-100 dataTable no-footer"
                                aria-describedby="file-export_info">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Member Id</th>
                                        <th>Investment</th>
                                        <th>Profit</th>
                                        <th>Amount</th>
                                        <th>Pool Id</th>
                                        <th>Buy No</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1;  @endphp
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                            <td>{{ $list['memberid'] }}</td>
                                            <td>$ {{ number_format((float) ($list['investment'] ?? 0), 2) }}</td>
                                            <td>$ {{ number_format((float) ($list['profit'] ?? 0), 2) }}</td>
                                            <td>$ {{ number_format((float) ($list['amount'] ?? 0), 2) }}</td>
                                            <td>{{ $list['pool_id'] ?? '-' }}</td>
                                            <td>{{ $list['buy_no'] ?? '-' }}</td>

                                            <td>
                                                @if (($list['status'] ?? '') == 'Paid')
                                                    <label class="btn btn-sm btn-success">{{ $list['status'] }}</label>
                                                @else
                                                    <label class="btn btn-sm btn-danger">{{ $list['status'] ?? 'Unpaid' }}</label>
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
    </div>
@endsection
