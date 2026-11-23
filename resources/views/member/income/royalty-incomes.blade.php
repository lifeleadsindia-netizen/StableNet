@extends('member.layouts.main')
@section('title', 'Royalty Income')
@section('container')


    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <h4 class="fw-bold text-white py-3 mb-4 text-white">
                <span class="text-white fw-light text-white">{{ config('detailsApp.name') }} /</span> Royalty Income

            </h4>
            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Royalty Income </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Memberid</th>
                                        <th>Total Club Members</th>
                                        <th>Club Amount</th>
                                        <th>Rank</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($royaltyData as $list)
                                        @php
                                            $mdata = getAllData($list['memberid']);
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}</td>
                                            <td>{{ $list['memberid'] }}</td>
                                            <td>{{ $list['count_club_member'] }}</td>
                                            <td>$ {{ $list['club_amount'] }}</td>
                                            <td>{{ $list['rank'] }}</td>
                                            <td>$ {{ $list['amount'] }}</td>
                                            <td>
                                                @if ($list['status'] == 'Paid')
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

    <!--**********************************
                Content body end
            ***********************************-->


@endsection
