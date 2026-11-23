@extends('member.layouts.main')
@section('title','Detailed Direct Income')
@section('container')

		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <h4 class="fw-bold text-white py-3 mb-4">
                    <span class="text-white fw-light">{{config('detailsApp.name')}}  /</span> Detailed Direct Income
                    
                </h4>
                <!-- row -->
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detailed Direct Income </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Memberid</th>
                                            <th>Package</th>
                                            <th>Directid</th>
                                            
                                            <th>Installment</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                    @forelse ($directData as $list)
                                        @php
                                            $mdata = getAllData($list['memberid']);
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{date('d-m-Y', strtotime($list['created_at']))}}</td>
                                            <td>{{$list['memberid']}}</td>
                                            <td>$ {{ number_format((float)$list['package'], 2) }}</td>
                                            <td>{{$list['directid']}}</td>
                                            
                                            <td>{{$list['installment']}}</td>
                                            <td>$ {{ number_format((float)$list['amount'], 2) }}</td>
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
                                    @empty
                                        <tr>
                                            <td colspan="8" class="no-data-found-cell">No Data Found</td>
                                        </tr>
                                    @endforelse
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