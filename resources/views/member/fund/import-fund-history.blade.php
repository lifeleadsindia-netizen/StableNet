@extends('member.layouts.main')
@section('title','Import Fund History')
@section('container')

		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <h4 class="fw-bold py-3 mb-4 text-light">
                    <span class=" fw-light">{{config('detailsApp.name')}}  /</span> Import Fund History
                    
                </h4>
                <!-- row -->
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Import Fund History Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Date</th>
                                            <th>Memberid</th> 
                                            <th>Txn Id</th>
                                            <th>Order Id</th>
                                            <th>Amount</th> 
                                            <th>Type</th> 
                                            <th>Mode</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                    @foreach ($addfundData as $list)
                                        @php
                                            $mdata = getAllData($list['memberid']);
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{date('d-m-Y', strtotime($list['created_at']))}}</td>
                                            <td>{{$list['memberid']}}</td>
                                            <td>{{$list['txnid']}}</td>
                                            <td>{{$list['orderid']}}</td>
                                            <td>$ {{$list['amount']}}</td>
                                            <td>{{$list['type']}}</td>
                                            <td><span class="badge badge-primary">{{$list['mode']}}</span></td>
                                            <td>
                                                @if ($list['status'] == 'Cancelled')
                                                <span class="badge badge-danger">{{$list['status']}}</span>
                                                @elseif ($list['status'] == 'Approved')
                                                <span class="badge badge-success">{{$list['status']}}</span>
                                                @else
                                                <span class="badge badge-primary">{{$list['status']}}</span>
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