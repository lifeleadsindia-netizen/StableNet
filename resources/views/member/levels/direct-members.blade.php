@extends('member.layouts.main')
@section('title', 'Direct Members')
@section('container')


    <!--**********************************
                        Content body start
                    ***********************************-->
    <div class="main-content app-content">
        <div class="container-fluid">

             <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Direct Members</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Direct Members</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- row -->
            <div class="col-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h4 class="card-title mt-2">List Of Direct Members</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file-export" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Joining Date') }}</th>
                                        <th>{{ __('Activation Date') }}</th>
                                        <th>{{ __('Memberid') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Mobile') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Joining Package') }}</th>
                                        <th>{{ __('Investment') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($directData as $list)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>
                                                @if ($list['profile_image'] == '')
                                                    <img src="{{ asset('uploads/avatar.jpg') }}"
                                                        class="img-fluid img-thumbnail" width="50" alt="">
                                                @else
                                                    <img src="{{ asset('uploads') }}/{{ $list['profile_image'] }}"
                                                        width="50" class="img-fluid img-thumbnail" alt="">
                                                @endif
                                            </td>
                                            <td>{{ __(date('d-m-Y', strtotime($list['created_at']))) }}<br>{{ __(date('H:i:s', strtotime($list['created_at']))) }}
                                            </td>
                                            <td>
                                                @if ($list['activated_at'] == null)
                                                    -- / -- / ----
                                                @else
                                                    {{ __(date('d-m-Y', strtotime($list['activated_at']))) }}<br>{{ __(date('H:i:s', strtotime($list['activated_at']))) }}
                                                @endif
                                            </td>
                                            <td>{{ __($list['memberid']) }}</td>
                                            <td>
                                                @if ($list['name'] == null)
                                                    --
                                                @else
                                                    {{ __($list['name']) }}
                                                @endif
                                            </td>
                                            <td>{{ __($list['mobile']) }}</td>
                                            <td>{{ __($list['email']) }}</td>
                                            <td>$ {{ number_format((float)$list['package'], 2) }}</td>
                                            <td>$ {{ number_format((float)$list['investment'], 2) }}</td>
                                            <td>
                                                @if ($list['status'] == 'Active')
                                                    <span
                                                        class="btn btn-success text-white">{{ __($list['status']) }}</span>
                                                @elseif ($list['status'] == 'Temp')
                                                    <span class="btn btn-warning ">{{ __($list['status']) }}</span>
                                                @elseif ($list['status'] == 'Deactive')
                                                    <span class="btn btn-primary ">{{ __($list['status']) }}</span>
                                                @else
                                                    <span class="btn btn-danger ">{{ __($list['status']) }}</span>
                                                @endif
                                            </td>
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

    <!--**********************************
                        Content body end
                    ***********************************-->


@endsection
