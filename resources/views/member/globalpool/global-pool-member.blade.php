@extends('member.layouts.main')
@section('title', 'Global Pool Members')
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
                        <select name="" id="pool_member" class="form-select">
                            <option value="{{ $value }}">{{ $value }}$ Autopool</option>
                            @if ($value != 10)
                                <option value="10">10$ Autopool</option>
                            @endif
                            @if ($value != 20)
                                <option value="20">20$ Autopool</option>
                            @endif
                            @if ($value != 40)
                                <option value="40">40$ Autopool</option>
                            @endif
                            @if ($value != 80)
                                <option value="80">80$ Autopool</option>
                            @endif
                            @if ($value != 160)
                                <option value="160">160$ Autopool</option>
                            @endif
                            @if ($value != 320)
                                <option value="320">320$ Autopool</option>
                            @endif
                            @if ($value != 640)
                                <option value="640">640$ Autopool</option>
                            @endif
                            @if ($value != 1280)
                                <option value="1280">1280$ Autopool</option>
                            @endif
                            @if ($value != 2560)
                                <option value="2560">2560$ Autopool</option>
                            @endif
                            @if ($value != 5120)
                                <option value="5120">5120$ Autopool</option>
                            @endif
                            @if ($value != 10240)
                                <option value="10240">10240$ Autopool</option>
                            @endif
                            @if ($value != 20480)
                                <option value="20480">20480$ Autopool</option>
                            @endif
                            @if ($value != 40960)
                                <option value="40960">40960$ Autopool</option>
                            @endif
                            @if ($value != 81920)
                                <option value="81920">81920$ Autopool</option>
                            @endif
                            @if ($value != 163840)
                                <option value="163840">163840$ Autopool</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Global Pool Members </h4>
                    </div>
                    <div class="card-body" style="">
                        <div class="body genealogy-body genealogy-scroll" style="overflow-y: scroll;">
                            <div class="genealogy-tree">
                                <ul>
                                    <li style="padding: 18px 3px 0px 4px;">
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box" style="width: 125px;margin: auto;">
                                                <div class="card" style="background-color: #3b455a;margin-bottom: 0;">
                                                    <div class="card-body">
                                                        @if ($value <= $data['package'])
                                                            <h4 style="color: #ffffff"><b>{{ $data['memberid'] }}</b></h4>
                                                            @if ($data['status'] == 'Temp')
                                                                <h4 style="color: #ffffff"><b>Inactive</b></h4>
                                                            @else
                                                                <h4 style="color: #ffffff"><b>{{ $data['status'] }}</b></h4>
                                                            @endif
                                                        @else
                                                            <h4 style="color: #ffffff"><b>Slot Not<br> Activated</b></h4>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @if (getPoolDirectCount($data['memberid'], $pool) > 0)
                                            <ul class="active">
                                                @foreach ($pool_data as $item)
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="member-view-box" style="width: 125px;margin: auto;">
                                                                <div class="card"
                                                                    style="background-color: #3b455a;margin-bottom: 0;">
                                                                    <div class="card-body">
                                                                        <h4 style="color: #ffffff">
                                                                            <b>{{ $item['memberid'] }}</b>
                                                                        </h4>
                                                                        @if (getMemberStatus($item['memberid']) == 'Temp')
                                                                            <h4 style="color: #ffffff"><b>Inactive</b></h4>
                                                                        @else
                                                                            <h4 style="color: #ffffff">
                                                                                <b>{{ getMemberStatus($item['memberid']) }}</b>
                                                                            </h4>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        @if (getPoolDirectCount($item->memberid, $pool) > 0)
                                                            <ul>
                                                                @php
                                                                    $directs_2 = getPoolLevelData(
                                                                        $item['memberid'],
                                                                        $pool,
                                                                    );
                                                                @endphp
                                                                @foreach ($directs_2 as $item_2)
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <div class="member-view-box"
                                                                                style="width: 125px;margin: auto;">
                                                                                <div class="card"
                                                                                    style="background-color: #3b455a;margin-bottom: 0;">
                                                                                    <div class="card-body">
                                                                                        <h4 style="color: #ffffff">
                                                                                            <b>{{ $item_2['memberid'] }}</b>
                                                                                        </h4>
                                                                                        @if (getMemberStatus($item_2['memberid']) == 'Temp')
                                                                                            <h4 style="color: #ffffff">
                                                                                                <b>Inactive</b>
                                                                                            </h4>
                                                                                        @else
                                                                                            <h4 style="color: #ffffff">
                                                                                                <b>{{ getMemberStatus($item_2['memberid']) }}</b>
                                                                                            </h4>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        @if (getPoolDirectCount($item_2['memberid'], $pool) > 0)
                                                                            <ul>
                                                                                @php
                                                                                    $directs_3 = getPoolLevelData(
                                                                                        $item_2['memberid'],
                                                                                        $pool,
                                                                                    );
                                                                                @endphp
                                                                                @foreach ($directs_3 as $item_3)
                                                                                    <li>
                                                                                        <a href="javascript:void(0);">
                                                                                            <div class="member-view-box"
                                                                                                style="width: 125px;margin: auto;">
                                                                                                <div class="card"
                                                                                                    style="background-color: #3b455a;margin-bottom: 0;">
                                                                                                    <div class="card-body">
                                                                                                        <h4
                                                                                                            style="color: #ffffff">
                                                                                                            <b>{{ $item_3['memberid'] }}</b>
                                                                                                        </h4>
                                                                                                        @if (getMemberStatus($item_3['memberid']) == 'Temp')
                                                                                                            <h4
                                                                                                                style="color: #ffffff">
                                                                                                                <b>Inactive</b>
                                                                                                            </h4>
                                                                                                        @else
                                                                                                            <h4
                                                                                                                style="color: #ffffff">
                                                                                                                <b>{{ getMemberStatus($item_3['memberid']) }}</b>
                                                                                                            </h4>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                        @if (getPoolDirectCount($item_3['memberid'], $pool) > 0)
                                                                                            <ul>
                                                                                                @php
                                                                                                    $directs_4 = getPoolLevelData(
                                                                                                        $item_3[
                                                                                                            'memberid'
                                                                                                        ],
                                                                                                        $pool,
                                                                                                    );
                                                                                                @endphp
                                                                                                @foreach ($directs_4 as $item_4)
                                                                                                    <li>
                                                                                                        <a
                                                                                                            href="javascript:void(0);">
                                                                                                            <div class="member-view-box"
                                                                                                                style="width: 125px;margin: auto;">
                                                                                                                <div class="card"
                                                                                                                    style="background-color: #3b455a;margin-bottom: 0;">
                                                                                                                    <div
                                                                                                                        class="card-body">
                                                                                                                        <h4
                                                                                                                            style="color: #ffffff">
                                                                                                                            <b>{{ $item_4['memberid'] }}</b>
                                                                                                                        </h4>
                                                                                                                        @if (getMemberStatus($item_4['memberid']) == 'Temp')
                                                                                                                            <h4
                                                                                                                                style="color: #ffffff">
                                                                                                                                <b>Inactive</b>
                                                                                                                            </h4>
                                                                                                                        @else
                                                                                                                            <h4
                                                                                                                                style="color: #ffffff">
                                                                                                                                <b>{{ getMemberStatus($item_4['memberid']) }}</b>
                                                                                                                            </h4>
                                                                                                                        @endif
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        @endif
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                </ul>
                            </div>
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
