@extends('member.layouts.main')
@section('title', 'Daily Income')
@section('container')


    <!--**********************************Content body start***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <h4 class="fw-bold py-3 mb-4 text-white">
                <span class=" fw-light text-white">{{ config('detailsApp.name') }} /</span> Daily Income

            </h4>
            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daily Income </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow: auto">
                            <table id="example" class="display table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Memberid</th>
                                        <th>Total Investment</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($Data as $list)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                        <td>{{ $list['memberid'] }}</td>
                                        <td>$ {{ number_format($list['total_investment'], 2) }}</td>
                                        <td>{{ $list['rate'] }} %</td>
                                        <td>$ {{ number_format($list['amount'], 2) }}</td>
                                        <td>
                                            @if ($list['status'] == 'Paid')
                                                <div class="btn btn-primary">{{ $list['status'] }}</div>
                                            @else
                                                <div class="btn btn-danger">{{ $list['status'] }}</div>
                                            @endif
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
    </div>

    <!--**********************************
                Content body end
            ***********************************-->


@endsection
