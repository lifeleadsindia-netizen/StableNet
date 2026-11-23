@extends('member.layouts.main')
@section('title', 'Wallet To P2P History')
@section('container')

    <!-- Content wrapper -->
    <div class="content-body">
        <div class="container-fluid">
            <h4 class="fw-bold text-white py-3 mb-4 text-white">
                <span class="text-white fw-light text-white">{{ config('detailsApp.name') }} /</span> 'Wallet To P2P History
            </h4>

            <div class="row px-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Wallet To P2P History</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Particular</th>
                                        <th>Add</th>
                                        <th>Deduct</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($passdata as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}<br>{{ date('h:i:s', strtotime($list['created_at'])) }}
                                            </td>
                                            <td>{{ $list['particular'] }}</td>
                                            <td>$ {{ $list['debit'] }}</td>
                                            <td>$ {{ $list['credit'] }}</td>
                                            <td><span class="btn btn-sm btn-primary">$ {{ $list['balance'] }}</span></td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="6" class="no-data-found-cell">No Data Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /Browser Default -->
    </div>
    <!-- / Content -->
@endsection
