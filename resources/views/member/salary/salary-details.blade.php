@extends('member.layouts.main')
@section('title', 'Salary Details')
@section('container')


    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <h4 class="fw-bold text-white py-3 mb-4 text-white">
                <span class="text-white fw-light text-white">{{ config('detailsApp.name') }} /</span> Salary Details

            </h4>
            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Salary Details </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow: auto">
                            <table id="example" class="display table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Duration</th>
                                        <th>Strong Leg</th>
                                        <th>Weaker Leg</th>
                                        <th> Reward Amount</th>
                                        {{-- <th>Luxury Fund</th> --}}
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $first = firstStrongLeg($data['memberid']);
                                        $second = secondStrongLeg($data['memberid']);
                                    @endphp
                                    <tr>
                                        <td>1</td>
                                        <td><span class="badge badge-success">12 Months</span></td>
                                        <td>$25,000</td>
                                        <td>$25,000</td>
                                        <td>$200</td>
                                        {{-- <td>1N/2D DLP Training</td> --}}
                                        <td>
                                            @if ($first >= 25000 && $second >= 25000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><span class="badge badge-success">12 Months</span></td>
                                        <td>$60,000 </td>
                                        <td>$60,000 </td>
                                        <td>$500</td>
                                        {{-- <td>1N/2D DLP Training</td> --}}
                                        <td>
                                            @if ($first >= 85000  && $second >= 85000 )
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><span class="badge badge-success">12 Months</span></td>
                                        <td>$1,50,000</td>
                                        <td>$1,50,000</td>
                                        <td>$1000</td>
                                        {{-- <td>1N/2D DLP Training</td> --}}
                                        <td>
                                            @if ($first >= 235000 && $second >= 235000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
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
