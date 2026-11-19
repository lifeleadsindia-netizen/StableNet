@extends('member.layouts.main')
@section('title','Level Details')
@section('container')

		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <h4 class="fw-bold text-white py-3 mb-4 text-white">
                    <span class="text-white fw-light text-white">{{config('detailsApp.name')}}  /</span> Level Details
                    
                </h4>
                <!-- row -->
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Level Details </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table text-center">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Memberid</th>
                                            <th>Package</th>
                                            <th>Amount</th>
                                            <th>Level</th>
                                            <th>Level Id</th>
                                            <th>Daily Amount</th>
                                            <th>Installments</th>
                                            <th>Flushed Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                    @foreach ($levelData as $list)
                                        @php
                                            $mdata = getAllData($list['memberid']);
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{date('d-m-Y', strtotime($list['created_at']))}}</td>
                                            <td>{{$list['memberid']}}</td>
                                            <td>{{$list['package']}} SBT</td>
                                            <td>{{$list['amount']}} SBT</td>
                                            <td>{{$list['level']}}</td>
                                            <td>{{$list['level_id']}}</td>
                                            <td>{{$list['daily_amount']}} SBT</td>
                                            <td>{{$list['installments']}}</td>
                                            <td>{{$list['flushed_amount']}} SBT</td>
                                            
                                            <td>
                                                @if ($list['status'] == 'Active')
                                                <label class="badge badge-success">{{$list['status']}}</label>
                                                @else
                                                <label class="badge badge-danger">{{$list['status']}}</label>
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