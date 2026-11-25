@extends('member.layouts.main')
@section('title', 'Reward Income')
@section('container')


    <!--**********************************Content body start****************************-->
    <div class="main-content app-content">
        <div class="container-fluid">

            <h5 class="fw-bold pt-3 mb-4">
                <span class="fw-light">{{ config('detailsApp.name') }} /</span> Reward Income
            </h5>
            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mt-2">Reward Income Table</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Date</th>
                                        <th>Member Id</th>
                                        <th>Package</th>
                                        <th>Members</th>
                                        <th>Amount</th>
                                        <th>Reward Status</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($rewData as $list)

                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{date('d-m-Y', strtotime($list['created_at']))}}</td>
                                            <td>{{ $list['memberid'] }}</td>
                                            <td>${{ $list['package'] }}</td>
                                            <td>{{ $list['members'] }}</td>
                                            <td>$ {{ $list['amount'] }}</td>
                                            <td class="text-center">
                                                @if (($list['reward_status'] ?? '') == 1 || ($list['reward_status'] ?? '') === '1' || strtolower($list['reward_status'] ?? '') == 'achieved')
                                                    <span
                                                        class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fs-11 fw-bold">
                                                        <i class="bx bx-check-circle me-0.5"></i> Achieved
                                                    </span>
                                                @elseif (($list['reward_status'] ?? '') === 0 || ($list['reward_status'] ?? '') === '0' || strtolower($list['reward_status'] ?? '') == 'pending')
                                                    <span
                                                        class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2.5 py-1 fs-11 fw-bold">
                                                        <i class="bx bx-time-five me-0.5"></i> Pending
                                                    </span>
                                                @elseif (!empty($list['reward_status']))
                                                    <span
                                                        class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2.5 py-1 fs-11 fw-bold">
                                                        {{ $list['reward_status'] }}
                                                    </span>
                                                @else
                                                    <span class="text-muted fs-12">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($list['status'] == 'Paid')
                                                    <span class="badge badge-success">{{ $list['status'] }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ $list['status'] }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="7" class="no-data-found-cell">No Data Found</td>
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

    <!--**********************************
                                                                                                                                                    Content body end
                                                                                                                                                ***********************************-->


@endsection