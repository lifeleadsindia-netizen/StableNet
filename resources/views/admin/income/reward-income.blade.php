@extends('admin.layouts.main')
@section('title', 'Reward Income')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Reward Income</h1>

                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reward Income</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('wMessage'))
                        <div class="alert alert-primary">{{ session('wMessage') }}</div>
                    @endif
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
                            <div class="card-title">Reward Income details</div>
                        </div>
                        <div class="card-body">
                            <table id="file-export" class="table table-bordered text-nowrap w-100 dataTable no-footer"
                                aria-describedby="file-export_info">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Member ID</th>
                                        <th>Name</th>
                                        <th>Team Count</th>
                                        <th>Reward</th>
                                        <th>Reward Status</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1;  @endphp
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ !empty($list['created_at']) ? date('d-m-Y', strtotime($list['created_at'])) : '-' }}</td>
                                            <td>{{ $list['memberid'] }}</td>
                                            <td>{{ getName($list['memberid']) }}</td>
                                            <td>{{ $list['team_count'] ?? 0 }}</td>
                                            <td>
                                                @if (isset($list['reward']) && is_numeric($list['reward']))
                                                    $ {{ number_format((float)$list['reward'], 2) }}
                                                @else
                                                    {{ $list['reward'] ?? '-' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (($list['reward_status'] ?? '') == 1 || ($list['reward_status'] ?? '') === '1')
                                                    <span class="badge bg-success">Achieved</span>
                                                @elseif (($list['reward_status'] ?? '') === 0 || ($list['reward_status'] ?? '') === '0')
                                                    <span class="badge bg-secondary">Pending</span>
                                                @elseif (!empty($list['reward_status']))
                                                    <span class="badge bg-info">{{ $list['reward_status'] }}</span>
                                                @else
                                                    <span class="badge bg-light text-dark">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (($list['status'] ?? '') == 'Paid')
                                                    <span class="badge bg-success">{{ $list['status'] }}</span>
                                                @elseif (($list['status'] ?? '') == 'Unpaid')
                                                    <span class="badge bg-danger">{{ $list['status'] }}</span>
                                                @else
                                                    <span class="badge bg-warning">{{ $list['status'] ?? 'Pending' }}</span>
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
