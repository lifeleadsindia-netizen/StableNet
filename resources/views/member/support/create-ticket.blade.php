@extends('member.layouts.main')
@section('title', 'Create Support Ticket')
@section('container')


    <div class="main-content app-content">
        <!-- row -->
        <div class="container-lg mt-3">
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Create Ticket</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Create Ticket</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Support Section</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row authentication authentication-basic h-100">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    @if (session()->has('createMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('createMsg') }}
                        </div>
                    @endif
                    <div class="card custom-card">
                        <div class="card-header">
                            <h5 class="title mt-3">Create New Support Ticket</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('createTicket') }}" method="post" id="stakingForm">
                                @csrf
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="memberid" class="form-label text-default">Memberid</label>
                                        <input type="text" class="form-control form-control-lg" name="userid"
                                            value="{{ $data['memberid'] }}" readonly />
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="memberid" class="form-label text-default">Subject</label>
                                        <input type="text" class="form-control form-control-lg" name="subject"
                                           placeholder="Enter Subject" />
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="form-label text-default">Particular</label>
										<textarea  class="form-control form-control-lg " name="issue" placeholder="Enter Your Issue" rows="5"></textarea>
										@error('issue')
											<span class="text-danger">{{$message}}</span>
										@enderror
                                    </div>
                                    <div class="col-xl-12 mt-2">
                                        {{-- <input type="hidden" class="form-control" value="{{ csrf_token() }}"
                                            id="csrf"> --}}
                                        <button class="btn btn-primary float-end" id="subsBtn">Create New Ticket</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
