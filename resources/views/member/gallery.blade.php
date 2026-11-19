@extends('member.layouts.main')
@section('title', 'Gallery')
@section('container')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    @if (session()->has('updateErr'))
                        <div class="alert alert-success" role="alert">
                            {{ session('updateErr') }}
                        </div>
                    @endif
                    @if (session()->has('failedMsg'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failedMsg') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h5>Member Gallery Updates</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body px-5">
                                    <form action="{{ route('galleryUpdate') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if ($gdata)
                                                    @if ($gdata['image'] == null)
                                                        <img src="{{ asset('uploads/avatar.jpg') }}" alt=""
                                                            style="width: 90%">
                                                    @else
                                                        <img src="{{ asset('uploads') }}/{{ $gdata['image'] }}"
                                                            alt="" style="width: 90%">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('uploads/avatar.jpg') }}" alt=""
                                                        style="width: 90%">
                                                @endif
                                                <img src="" />
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Member ID </label>
                                                    <input type="text" class="form-control" name="memberid"
                                                        value="{{ $data['memberid'] }}" readonly>
                                                </div>
                                                @if ($gdata)
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title"
                                                            value="{{ $gdata['title'] }}">
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title"
                                                            placeholder="Enter Title">
                                                    </div>
                                                @endif
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <div class="input-group col-xs-12">
                                                            <input type="file" name="image"
                                                                class="form-control file-upload-default">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-default btn btn-primary"
                                                                    type="button">{{ __('Upload') }}</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <input type="hidden" class="form-control" name="memberid"
                                                    value="{{ $data['memberid'] }}">
                                                <button class="btn btn-primary float-end mt-4">Update Details</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
