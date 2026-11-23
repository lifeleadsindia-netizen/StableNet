@extends('member.layouts.main')
@section('title', 'Reward Details')
@section('container')


    <!--**********************************
                    Content body start
                ***********************************-->
    <div class="main-content app-content">
        <div class="container-fluid">

            <h4 class="fw-bold py-3 mb-4 ">
                <span class=" fw-light ">{{ config('detailsApp.name') }} /</span> Reward Details

            </h4>
            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mt-2">Reward Details </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow: auto">
                            <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Rank</th>
                                        <th>Strong Leg</th>
                                        <th>Weaker Leg</th>
                                        <th>Reward Amount</th>
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
                                        <td><strong class="text-primary">Star</strong></td>
                                        <td>$500</td>
                                        <td>$500</td>
                                        <td>$20</td>
                                        <td>
                                            @if ($first >= 500 && $second >= 500)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><strong class="text-primary">Red Star</strong></td>
                                        <td>$1,000</td>
                                        <td>$1,000</td>
                                        <td>$40</td>
                                        <td>
                                            @if ($first >= 1500 && $second >= 1500)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><strong class="text-primary">Blue Star</strong></td>
                                        <td>$2,500</td>
                                        <td>$2,500</td>
                                        <td>$100</td>
                                        <td>
                                            @if ($first >= 4000 && $second >= 4000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><strong class="text-primary">Silver Star</strong></td>
                                        <td>$5,000</td>
                                        <td>$5,000</td>
                                        <td>$200</td>
                                        <td>
                                            @if ($first >= 9000 && $second >= 9000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><strong class="text-primary">Paral Star</strong></td>
                                        <td>$10,000</td>
                                        <td>$10,000</td>
                                        <td>$400</td>
                                        <td>
                                            @if ($first >= 19000 && $second >= 19000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><strong class="text-primary">Gold Star</strong></td>
                                        <td>$25,000</td>
                                        <td>$25,000</td>
                                        <td>$1,000</td>
                                        <td>
                                            @if ($first >= 44000 && $second >= 44000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td><strong class="text-primary">Platinum Star</strong></td>
                                        <td>$50,000</td>
                                        <td>$50,000</td>
                                        <td>$2,000</td>
                                        <td>
                                            @if ($first >= 94000 && $second >= 94000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td><strong class="text-primary">Ruby</strong></td>
                                        <td>$1,00,000</td>
                                        <td>$1,00,000</td>
                                        <td>$4,000</td>
                                        <td>
                                            @if ($first >= 194000 && $second >= 194000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td><strong class="text-primary">Emerald</strong></td>
                                        <td>$2,50,000</td>
                                        <td>$2,50,000</td>
                                        <td>$10,000</td>
                                        <td>
                                            @if ($first >= 444000 && $second >= 444000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td><strong class="text-primary">Sapphire</strong></td>
                                        <td>$5,00,000</td>
                                        <td>$5,00,000</td>
                                        <td>$20,000</td>
                                        <td>
                                            @if ($first >= 944000 && $second >= 944000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td><strong class="text-primary">Diamond</strong></td>
                                        <td>$10,00,000</td>
                                        <td>$10,00,000</td>
                                        <td>$40,000</td>
                                        <td>
                                            @if ($first >= 1944000 && $second >= 1944000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td><strong class="text-primary">White Diamond</strong></td>
                                        <td>$25,00,000</td>
                                        <td>$25,00,000</td>
                                        <td>$1,00,000</td>
                                        <td>
                                            @if ($first >= 4444000 && $second >= 4444000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td><strong class="text-primary">Black Diamond</strong></td>
                                        <td>$50,00,000</td>
                                        <td>$50,00,000</td>
                                        <td>$5,00,000</td>
                                        <td>
                                            @if ($first >= 9444000 && $second >= 9444000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td><strong class="text-primary">Royal Diamond</strong></td>
                                        <td>$1,00,00,000</td>
                                        <td>$1,00,00,000</td>
                                        <td>$10,00,000</td>
                                        <td>
                                            @if ($first >= 19444000 && $second >= 19444000)
                                                <span class="btn btn-primary">Achieved</span>
                                            @else
                                                <span class="btn btn-danger">Not Achieved</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td><strong class="text-primary">Ambassador</strong></td>
                                        <td>$2,50,00,000</td>
                                        <td>$2,50,00,000</td>
                                        <td>$20,00,000</td>
                                        <td>
                                            @if ($first >= 44444000 && $second >= 44444000)
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
