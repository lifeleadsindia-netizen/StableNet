@extends('admin.layouts.main')
@section('title', 'Update Member Deatils')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Update Member Deatils</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Member Deatils</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-6">
                    @if (session()->has('updateErr'))
                        <div class="alert alert-success" role="alert">
                            {{ session('updateErr') }}
                        </div>
                    @endif
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">Update Member Deatils</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('updateDetails') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label text-default">Name </label>
                                    <input type="text" class="form-control form-control-lg" name="name" value="{{ $data['name'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">Mobile</label>
                                    <input type="text" class="form-control form-control-lg" name="mobile" value="{{ $data['mobile'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">Email </label>
                                    <input type="text" class="form-control form-control-lg" name="email" value="{{ $data['email'] }}">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">Father Name</label>
                                    <input type="text" class="form-control form-control-lg" name="father_name"
                                        value="{{ $data['father_name'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">Date of Birth </label>
                                    <input type="date" class="form-control form-control-lg" name="dob" value="{{ $data['dob'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">Address </label>
                                    <input type="text" class="form-control form-control-lg" name="address"
                                        value="{{ $data['address'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">City </label>
                                    <input type="text" class="form-control form-control-lg" name="city" value="{{ $data['city'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">State </label>
                                    <input type="text" class="form-control form-control-lg" name="state" value="{{ $data['state'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">Country </label>
                                    <input type="text" class="form-control form-control-lg" name="country"
                                        value="{{ $data['country'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">Gender </label>
                                    <input type="text" class="form-control form-control-lg" name="gender"
                                        value="{{ $data['gender'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">Occupation </label>
                                    <input type="text" class="form-control form-control-lg" name="occupation"
                                        value="{{ $data['occupation'] }}">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-default">Profile Image </label>
                                    <input type="file" class="form-control form-control-lg" name="image"
                                        value="{{ $data['occupation'] }}">
                                    
                                </div>

                                <input type="hidden" name="id" value="{{ $data['id'] }}">
                                <button class="btn btn-primary float-end">Update Details</button>
                            </form>
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
                                class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)"
                                class="tag-addon"><i class="fe fe-x"></i></a></span> <span class="search-tags"><i
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            //fund transfer memberid check
            $('#memberid').on('input', function() {
                var memberid = $(this).val();
                var csrf = $('#csrf').val();
                $.ajax({
                    url: '/getMember',
                    type: 'POST',
                    data: {
                        'memberid': memberid,
                        _token: csrf,
                    },
                    success: function(response) {
                        $('#memMsg').html(response['data']);

                    }
                });
            });
        });
    </script>
    {{-- @endpush --}}
@endsection
