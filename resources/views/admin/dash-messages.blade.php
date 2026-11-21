@extends('admin.layouts.main')
@section('title', 'Dashboard Messages')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Dashboard Messages</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard Messages</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-md-5">
                    @if (session()->has('uploadMsg'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('uploadMsg') }}
                        </div>
                    @endif
                    <div class="card custom-card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Dashboard Messages') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashMsg') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-12 my-2">
                                    <label>Rank </label>
                                    <input type="number" class="form-control" name="rank" placeholder="Enter Rank">
                                    @error('rank')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12 my-2">
                                    <label>Message </label>
                                    <input type="text" class="form-control" name="message" placeholder="Enter Message">
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button class="btn btn-primary float-end my-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    @if (session()->has('delMsg'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('delMsg') }}
                        </div>
                    @endif
                    <div class="card custom-card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Messages History') }}</h4>
                        </div>
                        <div class="card-body px-5">
                            <table id="file-export" class="table table-bordered text-nowrap w-100 dataTable no-footer"
                                aria-describedby="file-export_info">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Rank</th>
                                        <th>Message</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1;  @endphp
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $list['rank'] }}</td>
                                            <td>{{ $list['message'] }}</td>
                                            <td>
                                                <div class="text-center">
                                                    <a class="btn btn-danger text-white"
                                                        href="{{ url('admin/dash-messages/delete') }}/{{ $list['id'] }}">Delete</a>
                                                </div>
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

    {{-- @push('script') --}}

    {{-- @endpush --}}
@endsection
