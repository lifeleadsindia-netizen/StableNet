@extends('member.layouts.main')
@section('title', 'Royalty Details')
@section('container')


    <!--**********************************
                    Content body start
                ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <h4 class="fw-bold py-3 mb-4 text-white">
                <span class=" fw-light text-white">{{ config('detailsApp.name') }} /</span> Royalty Details

            </h4>
            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Royalty Details </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow: auto">
                            <table id="example" class="display table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Strong Leg</th>
                                        <th>Weaker Leg</th>
                                        <th>Royalty Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                         $first = powerLegBiz($data['memberid']);
                                         $second = weakerLegBiz($data['memberid']);
                                    @endphp
                                    <tr>
                                        <td>1</td>
                                        <td>$25000</td>
                                        <td>$25000</td>
                                        <td>$10</td>
                                        <td>
                                            @if ($data['salary_status'] >= 1)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>$50000</td>
                                        <td>$50000</td>
                                        <td>$20</td>
                                        <td>
                                            @if ($data['salary_status'] >= 2)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>$100000</td>
                                        <td>$100000</td>
                                        <td>$40</td>
                                        <td>
                                            @if ($data['salary_status'] >= 3)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>$250000</td>
                                        <td>$250000</td>
                                        <td>$100</td>
                                        <td>
                                            @if ($data['salary_status'] >= 4)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>$500000</td>
                                        <td>$500000</td>
                                        <td>$200</td>
                                        <td>
                                            @if ($data['salary_status'] >= 5)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>$1000000</td>
                                        <td>$1000000</td>
                                        <td>$4000</td>
                                        <td>
                                            @if ($data['salary_status'] >= 6)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>$2500000</td>
                                        <td>$2500000</td>
                                        <td>$10000</td>
                                        <td>
                                            @if ($data['salary_status'] >= 7)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>$5000000</td>
                                        <td>$5000000</td>
                                        <td>$40000</td>
                                        <td>
                                            @if ($data['salary_status'] >= 8)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>$10000000</td>
                                        <td>$10000000</td>
                                        <td>$80000</td>
                                        <td>
                                            @if ($data['salary_status'] >= 9)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>$25000000</td>
                                        <td>$25000000</td>
                                        <td>$200000</td>
                                        <td>
                                            @if ($data['salary_status'] >= 10)
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
