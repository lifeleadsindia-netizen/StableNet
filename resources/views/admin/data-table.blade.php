@extends('admin.layouts.main')
@section('title', 'Data Table')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Data Table</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Data Table</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered text-nowrap w-100 dataTable no-footer"
                                    aria-describedby="file-export_info">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Joining</th>
                                            <th>Member Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Sponsor Id</th>
                                            <th>Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr class="odd">
                                                <td>{{ $i }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item['created_at'])) }}<br>{{ date('h:i:s', strtotime($item['created_at'])) }}
                                                </td>
                                                <td>{{ $item['memberid'] }}</td>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['email'] }}</td>
                                                <td>{{ $item['mobile'] }}</td>
                                                <td>{{ $item['sponsorid'] }}</td>
                                                <td>
                                                    @if ($item['status'] == 'Active')
                                                        <a href="{{ url('admin/account-control') }}/{{ $item['id'] }}"><button
                                                                class="btn btn-success">{{ $item['status'] }}</button></a>
                                                    @elseif($item['status'] == 'Blocked')
                                                        <a href="{{ url('admin/account-control') }}/{{ $item['id'] }}"><button
                                                                class="btn btn-danger">{{ $item['status'] }}</button></a>
                                                    @else
                                                        <a href="javascript:;"><button
                                                                class="btn btn-primary">{{ $item['status'] }}</button></a>
                                                    @endif
                                                </td>
                                                <td><a href="{{ url('admin/member-login') }}/{{ $item['id'] }}"
                                                        class="btn btn-primary"><i class="ik ik-eyw"></i> View</a></td>
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
    </div>

@endsection
