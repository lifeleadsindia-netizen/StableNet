@extends('member.layouts.main')
@section('title', 'Level Member Table')
@section('container')

    <div class="main-content app-content">

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Level Member Table</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Level Member Table</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Start:: row-4 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">Level Member Table</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Level No') }}</th>
                                            <th>{{ __('Total Members') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ __('1st Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success">
                                                    {{ levelMembersCount($data['memberid'], '1') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '1' }}">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>{{ __('2nd Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '2') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '2' }}">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>{{ __('3rd Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '3') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '3' }}">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>{{ __('4th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '4') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '4' }}">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>{{ __('5th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '5') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '5' }}">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>{{ __('6th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success">
                                                    {{ levelMembersCount($data['memberid'], '6') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '6' }}">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>{{ __('7th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '7') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '7' }}">View</a>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>8</td>
                                            <td>{{ __('8th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '8') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '8' }}">View</a>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>9</td>
                                            <td>{{ __('9th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '9') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '9' }}">View</a>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>10</td>
                                            <td>{{ __('10th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '10') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '10' }}">View</a>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>11</td>
                                            <td>{{ __('11th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '11') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '11' }}">View</a>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>12</td>
                                            <td>{{ __('12th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '12') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '12' }}">View</a>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>13</td>
                                            <td>{{ __('13th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '13') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '13' }}">View</a>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>14</td>
                                            <td>{{ __('14th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '14') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '14' }}">View</a>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td>15</td>
                                            <td>{{ __('15th Level') }}</td>
                                            <td>
                                                <div class="btn btn-pill btn-success ">
                                                    {{ levelMembersCount($data['memberid'], '15') }}</div>
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ url('member/levels/level-members-details') }}/{{ '15' }}">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End:: row-4 -->


        </div>


    </div>
    <!-- END MAIN-CONTENT -->


@endsection
