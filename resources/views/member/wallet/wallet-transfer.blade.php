@extends('member.layouts.main')
@section('title', 'Transaction Passbook')
@section('container')

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Transaction Passbook</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaction Passbook</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Transaction Passbook</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Amount Add</th>
                                            <th>Amount Deduct</th>
                                            <th>Balance</th>
                                            <th>Particular</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1;  @endphp
                                        @foreach ($transdata as $list)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}<br>
                                                    {{ date('H:i:s', strtotime($list['created_at'])) }}</td>
                                                <td>{{ $list['walletType'] }}</td>
                                                <td>
                                                    @if ($list['walletType'] == 'Staking Broken')
                                                        {{ $list['debit'] }} Coins
                                                    @else
                                                        {{ $list['debit'] }} SBT
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($list['walletType'] == 'Staking Broken')
                                                        {{ $list['credit'] }} Coins
                                                    @else
                                                        {{ $list['credit'] }} SBT
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($list['walletType'] == 'Staking Broken')
                                                        {{ $list['balance'] }} Coins
                                                    @else
                                                        {{ $list['balance'] }} SBT
                                                    @endif
                                                </td>
                                                <td>{{ $list['particular'] }}</td>
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
