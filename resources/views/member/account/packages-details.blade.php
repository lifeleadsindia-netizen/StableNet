@extends('member.layouts.main')
@section('title', 'Package Details')
@section('container')
    <!-- partial -->
    <div class="content-body">
        <div class="container-fluid">
         <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Package Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Date</th>
                                                <th>Order Id</th>
                                                <th>Package Type</th>
                                                <th>Value</th>
                                                <th>Activated By</th>
                                                <th>Mode</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse ($package_data as $list)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                                    <td>{{ $list['order_id'] }}</td>
                                                    <td>{{ $list['package_type'] }}</td>
                                                    <td>$ {{ $list['package_value'] }}</td>
                                                    <td>{{ $list['activated_by'] }}</td>
                                                    <td>{{ $list['payment_mode'] }}</td>
                                                    <td>
                                                        @if ($list['status'] == 'Accepted')
                                                            <label class="badge badge-success">{{ $list['status'] }}</label>
                                                        @else
                                                            <label class="badge badge-danger">{{ $list['status'] }}</label>
                                                        @endif
                                                    </td>
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
            </div>
         </div>
        </div>
    </div>
        <!-- content-wrapper ends -->
    @endsection
