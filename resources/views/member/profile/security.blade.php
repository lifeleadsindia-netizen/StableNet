@extends('member.layouts.main')
@section('title','Security')
@section('container')



		<!--**********************************
            Content body start
        ***********************************-->
        <div class="main-content app-content">
            <!-- row -->
			<div class="container-fluid">
				<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Security</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Security</li>
                        </ol>
                    </nav>
                </div>
            </div>
				<!-- row -->
				<div class="row">
                    <div class="col-xl-6 col-lg-6">
						@if(session()->has('successMsg'))
						   <div class="alert alert-success" role="alert">
							  {{session('successMsg')}}
						   </div>
						@endif
						<div class="card profile-card card-bx m-b30">
							<div class="card-header">
								<h6 class="title mt-2">Transaction Password Change</h6>
							</div>
							<form  action="{{route('txnpassChange')}}" method="post">
								@csrf
								<div class="card-body mb-5 pb-4">
										<div class="col-sm-12 mb-2">
											<label class="form-label">New Transaction Password</label>
											<input type="password" class="form-control" name="password" placeholder="Enter Password">
											@error('password')
												<span class="text-danger"> {{$message}}</span>
											@enderror
										</div>
										<div class="col-sm-12 mb-4">
											<label class="form-label">Confirm Transaction Password</label>
											<input id="newPass" type="password" class="form-control" name="password_confirm" placeholder="Enter Confirm Password">
											@error('password_confirm')
											    <span class="text-danger"> {{$message}}</span>
											@enderror
										</div>
										<div class="col-sm-12">
											<input type="hidden" class="form-control" value="{{$data['id']}}" name="id">
										   <button class="btn btn-primary float-end" type="submit" name="submit">Change Password</button>
										</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						@if(session()->has('successMsg_pass'))
						   <div class="alert alert-success" role="alert">
							  {{session('successMsg_pass')}}
						   </div>
						@endif
						<div class="card profile-card card-bx mb-2">
							<div class="card-header">
								<h6 class="title mt-2">Password Change</h6>
							</div>
							<form  action="{{route('passChange')}}" method="post">
								@csrf
								<div class="card-body mb-5 pb-4">
										<div class="col-sm-12 mb-2">
											<label class="form-label">New Password</label>
											<input type="password" class="form-control" name="password" placeholder="Enter Password">
											@error('password')
												<span class="text-danger"> {{$message}}</span>
											@enderror
										</div>
										<div class="col-sm-12 mb-4">
											<label class="form-label">Confirm Password</label>
											<input id="newPass" type="password" class="form-control" name="password_confirm" placeholder="Enter Confirm Password">
											@error('password_confirm')
											    <span class="text-danger"> {{$message}}</span>
											@enderror
										</div>
										<div class="col-sm-12 m-b30">
											<input type="hidden" class="form-control" value="{{$data['id']}}" name="id">
										   <button class="btn btn-primary float-end" type="submit" name="submit">Change Password</button>
										</div>
								</div>
							</form>
						</div>
					</div>
				</div>
            </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->


@endsection
