@extends('member.layouts.main')
@section('title', 'Global Pool Matrix')
@section('container')


    <!--**********************************
                        Content body start
                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <!-- row -->
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <select name="" id="pool" class="form-select">
                            <option value="{{$pool}}">{{$pool}}$ Autopool</option>
                            @if ($pool != 10)
                                <option value="10">10$ Autopool</option>
                            @endif
                            @if ($pool != 20)
                                <option value="20">20$ Autopool</option>
                            @endif
                            @if ($pool != 40)
                                <option value="40">40$ Autopool</option>
                            @endif
                            @if ($pool != 80)
                                <option value="80">80$ Autopool</option>
                            @endif
                            @if ($pool != 160)
                                <option value="160">160$ Autopool</option>
                            @endif
                            @if ($pool != 320)
                                <option value="320">320$ Autopool</option>
                            @endif
                            @if ($pool != 640)
                                <option value="640">640$ Autopool</option>
                            @endif
                            @if ($pool != 1280)
                                <option value="1280">1280$ Autopool</option>
                            @endif
                            @if ($pool != 2560)
                                <option value="2560">2560$ Autopool</option>
                            @endif
                            @if ($pool != 5120)
                                <option value="5120">5120$ Autopool</option>
                            @endif
                            @if ($pool != 10240)
                                <option value="10240">10240$ Autopool</option>
                            @endif
                            @if ($pool != 20480)
                                <option value="20480">20480$ Autopool</option>
                            @endif
                            @if ($pool != 40960)
                                <option value="40960">40960$ Autopool</option>
                            @endif
                            @if ($pool != 81920)
                                <option value="81920">81920$ Autopool</option>
                            @endif
                            @if ($pool != 163840)
                                <option value="163840">163840$ Autopool</option>
                            @endif
                            
                        </select>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><span id="value">{{$pool}}$</span> Global Autopool</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-primary table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Level No</th>
                                        <th>Members Pool</th>
                                        <th>Achieved</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Level 1</td>
                                        <td>2</td>
                                        <td>{{ $array['1'] }}</td>
                                        <td>${{ $amount['1'] }}</td>
                                        <th>
                                            @if ($array['1'] >= 2)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Level 2</td>
                                        <td>4</td>
                                        <td>{{ $array['2'] }}</td>
                                        <td>${{ $amount['2'] }}</td>
                                        <th>
                                            @if ($array['2'] >= 4)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Level 3</td>
                                        <td>8</td>
                                        <td>{{ $array['3'] }}</td>
                                        <td>${{ $amount['3'] }}</td>
                                        <th>
                                            @if ($array['3'] >= 8)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Level 4</td>
                                        <td>16</td>
                                        <td>{{ $array['4'] }}</td>
                                        <td>${{ $amount['4'] }}</td>
                                        <th>
                                            @if ($array['4'] >= 16)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Level 5</td>
                                        <td>32</td>
                                        <td>{{ $array['5'] }}</td>
                                        <td>${{ $amount['5'] }}</td>
                                        <th>
                                            @if ($array['5'] >= 32)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Level 6</td>
                                        <td>64</td>
                                        <td>{{ $array['6'] }}</td>
                                        <td>${{ $amount['6'] }}</td>
                                        <th>
                                            @if ($array['6'] >= 64)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Level 7</td>
                                        <td>128</td>
                                        <td>{{ $array['7'] }}</td>
                                        <td>${{ $amount['7'] }}</td>
                                        <th>
                                            @if ($array['7'] >= 128)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Level 8</td>
                                        <td>256</td>
                                        <td>{{ $array['8'] }}</td>
                                        <td>${{ $amount['8'] }}</td>
                                        <th>
                                            @if ($array['8'] >= 256)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Level 9</td>
                                        <td>512</td>
                                        <td>{{ $array['9'] }}</td>
                                        <td>${{ $amount['9'] }}</td>
                                        <th>
                                            @if ($array['9'] >= 512)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Level 10</td>
                                        <td>1024</td>
                                        <td>{{ $array['10'] }}</td>
                                        <td>${{ $amount['10'] }}</td>
                                        <th>
                                            @if ($array['10'] >= 1024)
                                                <span class="badge badge-primary">Achieved</span>
                                            @else
                                                <span class="badge badge-dark">Not Achieved</span>
                                            @endif
                                        </th>
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
