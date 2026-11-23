@extends('member.layouts.main')
@section('title', 'P2P Fund Passbook')
@section('container')


    <!--**********************************Content body start***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <h4 class="fw-bold text-white py-3 mb-4">
                <span class="text-white fw-light">{{ config('detailsApp.name') }} /</span> P2P Fund Passbook

            </h4>
            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">P2P Fund Passbook</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Memberid</th>
                                        <th>Type</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                        <th>Particular</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($passdata as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $list['memberid'] }}</td>
                                            <td>{{ $list['walletType'] }}</td>
                                            <td class="text-success">+ $ {{ $list['debit'] }}</td>
                                            <td class="text-danger">- $ {{ $list['credit'] }}</td>
                                            <td>$ {{ $list['balance'] }}</td>
                                            <td>{{ $list['particular'] }}</td>
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
