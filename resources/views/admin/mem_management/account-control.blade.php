@extends('admin.layouts.main')
@section('title', 'Account Control')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Account Control</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Account Control</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    @if (session()->has('statusDeact'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('statusDeact') }}
                        </div>
                    @endif
                    @if (session()->has('statusAct'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('statusAct') }}
                        </div>
                    @endif
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Account Control Page</div>
                        </div>
                        <div class="card-body">
                            <table id="file-export" class="table table-bordered text-nowrap w-100 dataTable no-footer"
                                aria-describedby="file-export_info">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Joining</th>
                                        <th>Avatar</th>
                                        <th>Member Id</th>
                                        <th>Name</th>
                                        <!--<th>Email</th>-->
                                        <!--<th>Mobile</th>-->
                                        <th>Sponsor Id</th>
                                        <th>Change Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1;  @endphp
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}<br>{{ date('h:i:s', strtotime($list['created_at'])) }}
                                            </td>
                                            <td>
                                                @if ($list['profile_image'] == '')
                                                    <img src="{{ asset('uploads/avatar.jpg') }}" class="table-user-thumb"
                                                        alt="" height="50px" width="50px"
                                                        style="border-radius: 50%">
                                                @else
                                                    <img src="{{ asset('uploads') }}/{{ $list['profile_image'] }}"
                                                        class="table-user-thumb" alt="" height="50px"
                                                        width="50px" style="border-radius: 50%">
                                                @endif
                                            </td>
                                            <td>{{ $list['memberid'] }}</td>
                                            <td>{{ $list['name'] }}</td>
                                            <!--<td>{{ $list['email'] }}</td>-->
                                            <!--<td>{{ $list['mobile'] }}</td>-->
                                            <td>{{ $list['sponsorid'] }}</td>
                                            <td>
                                                @if ($list['status'] == 'Active')
                                                    <a href="{{ url('admin/account-control') }}/{{ $list['id'] }}"><button
                                                            class="btn btn-success">{{ $list['status'] }}</button></a>
                                                @elseif($list['status'] == 'Blocked')
                                                    <a href="{{ url('admin/account-control') }}/{{ $list['id'] }}"><button
                                                            class="btn btn-danger">{{ $list['status'] }}</button></a>
                                                @else
                                                    <a href="javascript:;"><button
                                                            class="btn btn-primary">{{ $list['status'] }}</button></a>
                                                @endif
                                            </td>
                                            <td><a href="{{ url('admin/members/member-update') }}/{{ $list['id'] }}"
                                                    class="btn btn-primary"><i class="ik ik-edit"></i> Edit</a></td>

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
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="input-group"> <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i
                                class="fe fe-search header-link-icon fs-18"></i></a> <input type="search"
                            class="form-control border-0 px-2" placeholder="Search" aria-label="Username"> <a
                            href="javascript:void(0);" class="input-group-text" id="voice-search"><i
                                class="fe fe-mic header-link-icon"></i></a> <a href="javascript:void(0);"
                            class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false"> <i
                                class="fe fe-more-vertical"></i> </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p><span
                            class="search-tags"><i class="fe fe-user me-2"></i>People<a href="javascript:void(0)"
                                class="tag-addon"><i class="fe fe-x"></i></a></span> <span class="search-tags"><i
                                class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0)" class="tag-addon"><i
                                    class="fe fe-x"></i></a></span> <span class="search-tags"><i
                                class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)" class="tag-addon"><i
                                    class="fe fe-x"></i></a></span> <span class="search-tags"><i
                                class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)" class="tag-addon"><i
                                    class="fe fe-x"></i></a></span>
                    </div>
                    <div class="my-4">
                        <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
                        <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert"> <a
                                href="notifications.html"><span>Notifications</span></a> <a class="ms-auto lh-1"
                                href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i
                                    class="fe fe-x text-muted"></i></a> </div>
                        <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert"> <a
                                href="alerts.html"><span>Alerts</span></a> <a class="ms-auto lh-1"
                                href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i
                                    class="fe fe-x text-muted"></i></a> </div>
                        <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert"> <a
                                href="mail.html"><span>Mail</span></a> <a class="ms-auto lh-1" href="javascript:void(0);"
                                data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group ms-auto"> <button class="btn btn-sm btn-primary-light">Search</button>
                        <button class="btn btn-sm btn-primary">Clear Recents</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Footer Start -->
@endsection
