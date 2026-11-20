@extends('member.layouts.main')
@section('title', 'Global Pool Income')
@section('container')


    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <h4 class="fw-bold text-white py-3 mb-4 text-white">
                <span class="text-white fw-light text-white">{{ config('detailsApp.name') }} /</span>Global Pool Income

            </h4>
            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Global Pool Income </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No')}}</th>
                                        <th>{{ __('Date')}}</th>
                                        <th>{{ __('Memberid')}}</th>
                                        <th>{{ __('Amount')}}</th>
                                        <!--<th>{{ __('Name')}}</th>-->
                                        <th>{{ __('Package')}}</th>
                                        <th>{{ __('Level')}}</th>
                                         <th>{{ __('Activating Id')}}</th>
                                        <th>{{ __('Status')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($Data as $list)
                                        @php
                                            $mdata = getAllData($list['memberid']);
                                        @endphp
                                         <tr>
                                            <td>{{$i}}</td>
                                            <td>{{date('d-m-Y', strtotime($list['created_at']))}}</td>
                                            <td>{{ $list['memberid']}}</td>
                                            <td>$ {{ number_format($list['amount'], 2) }}</td>
                                            <!--<td>{{ getName($list['memberid'])}}</td>-->
                                            <td>${{ $list['package']}}</td>
                                            <td>{{ $list['level']}}</td>
                                            <td>{{ $list['activatingId']}}</td>
                                            <td>
                                                @if ($list['status']=='Unpaid')
                                                   <div class="badge badge-danger">{{$list['status']}}</div>
                                                @elseif ($list['status']=='Paid')
                                                   <div class="badge badge-success">{{$list['status']}}</div>
                                                @else
                                                   <div class="badge badge-warning">{{$list['status']}}</div>
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
