@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('container')

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Start::page-header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-3 page-header-breadcrumb">
            </div> <!-- End::page-header --> <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <div class="row">
                        <!--<div class="row">-->
                            <div class="col-sm-3">
                                <div class="card custom-card" >
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-2">Total Members</p>
                                            <h4 class="mb-0 fw-semibold mb-2">{{ totalMembersadmin() }}</h4>
                                            {{-- <span class="badge bg-success-transparent">1.5% <i
                                                    class="ti ti-trending-up"></i></span> --}}
                                            {{-- <span
                                                class="text-muted fs-11 ms-1">This Project</span> --}}
                                        </div>
                                        <div>
                                            <span class="avatar avatar-md bg-blue p-2">
                                                <i class="ti ti-users fs-16"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card custom-card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-2">Total Active</p>
                                            <h4 class="mb-0 fw-semibold mb-2">{{ totalActiveMembers() }}</h4>
                                            {{-- <span class="badge bg-success-transparent">1.5% <i
                                                    class="ti ti-trending-up"></i></span> --}}
                                            {{-- <span
                                                class="text-muted fs-11 ms-1">This Project</span> --}}
                                        </div>
                                        <div>
                                            <span class="avatar avatar-md bg-orange p-2">
                                                <i class="ti ti-users fs-16"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card custom-card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-2">Total Inactive</p>
                                            <h4 class="mb-0 fw-semibold mb-2">{{ totalTempMembers() }}</h4>
                                            {{-- <span class="badge bg-success-transparent">1.5% <i
                                                    class="ti ti-trending-up"></i></span> --}}
                                            {{-- <span
                                                class="text-muted fs-11 ms-1">This Project</span> --}}
                                        </div>
                                        <div>
                                            <span class="avatar avatar-md bg-green p-2">
                                                <i class="ti ti-users fs-16"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card custom-card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-2">Total Blocked</p>
                                            <h4 class="mb-0 fw-semibold mb-2">{{ totalblockedMembers() }}</h4>
                                            {{-- <span class="badge bg-success-transparent">1.5% <i
                                                    class="ti ti-trending-up"></i></span> --}}
                                            {{-- <span
                                                class="text-muted fs-11 ms-1">This Project</span> --}}
                                        </div>
                                        <div>
                                            <span class="avatar avatar-md bg-warning p-2">
                                                <i class="ti ti-users fs-16"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <p class="mb-0">Total In Wallet</p>
                                                        <h4>$ {{ number_format(totalinWallet(), 2) }}</h4>
                                                    </div>
                                                    <div>
                                                        {{-- <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                        <small>Member's Total Wallet</small>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <p class="mb-0">Total In Fund Wallet</p>
                                                        <h4>$ {{ number_format(totalinFundWallet(), 2) }}</h4>
                                                    </div>
                                                    <div>
                                                        {{-- <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                        <small>Member's Total Fund Wallet</small>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-danger"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <p class="mb-0">Total In Level Wallet</p>
                                                        <h4>$ {{ number_format(totalinlevelWallet(), 2) }}</h4>
                                                    </div>
                                                    <div>
                                                        {{-- <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                        <small>Member's Total Level Wallet</small>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-6 col-md-6">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <p class="mb-0">Today's Withdrawal</p>
                                                        <h4>$ {{ number_format(todaysWithdrawal(), 2) }}</h4>
                                                    </div>
                                                    <div>
                                                        {{-- <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                        <small>Member's Today's Withdrawal</small>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-6 col-md-6">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-primary"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <p class="mb-0">Total Withdrawal</p>
                                                        <h4>$ {{ number_format(totalWithdrawal(), 2) }}</h4>
                                                    </div>
                                                    <div>
                                                        {{-- <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                        <small>Member's Total Withdrawal</small>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xxl-6 col-lg-4 col-md-6">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <p class="mb-0">Total Bot Fee</p>
                                                        {{-- <h4>${{ number_format(adminFee(), 2) }}</h4>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mt-1">
                                                    <small class="text-small mt-10 d-block">Total Bot Fee</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-xxl-6 col-lg-6 col-md-6">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-success"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <p class="mb-0">Total Package Value</p>
                                                        <h4>$ {{ number_format(totalpackageValue(), 2) }}</h4>
                                                    </div>
                                                    <div>
                                                        {{-- <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                        <small>Member's Total Package Value</small>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-lg-6 col-md-6">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <p class="mb-0">Total Pool Member</p>
                                                        <h4>{{ totalpoolMember() }}</h4>
                                                    </div>
                                                    <div>
                                                        {{-- <a class="text-primary" href="javascript:void(0);">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a> --}}
                                                        <small>Total Pool Member's </small>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card custom-card overflow-hidden">
                                    <div class="row">
                                        <div class="card-body py-2">
                                            <div class="card-title mt-1 pl-3" style="font-size:100px;">
                                                <h4><b style="text-decoration: underline;">Today's Income</b>&#8628;<b class="float-end mx-4">$ {{ number_format(todayInc(),2) }}</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <h4 class="mb-2 text-green">
                                                            $ {{ number_format(todayLevelInc(), 2) }}</h4>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="row align-items-center mb-15">
                                                    <div class="col-auto">
                                                        <p class="mb-2">Today's Level Income</p>
                                                    </div>
                                                </div>
                                                <div class="progress-stacked progress-animate progress-xs mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 21%"
                                                        aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 26%" aria-valuenow="26" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 18%" aria-valuenow="18" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">

                                                        <h4 class="mb-2 text-green">
                                                            $ {{ number_format(todaytradebonusInc(), 2) }}</h4>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="row align-items-center mb-15">
                                                    <div class="col-auto">
                                                        <p class="mb-2">Today's Trading Bonus Income</p>
                                                    </div>
                                                </div>
                                                <div class="progress-stacked progress-animate progress-xs mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 21%"
                                                        aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 26%" aria-valuenow="26" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 18%" aria-valuenow="18" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <h4 class="mb-2 text-green">
                                                            $ {{ number_format(todaytradeprofitInc(), 2) }}</h4>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="row align-items-center mb-15">
                                                    <div class="col-auto">
                                                        <p class="mb-2">Today's Trading Profit Income</p>
                                                    </div>
                                                    <div class="progress-stacked progress-animate progress-xs mb-4">
                                                        <div class="progress-bar" role="progressbar" style="width: 21%"
                                                            aria-valuenow="21" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 26%" aria-valuenow="26" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 18%" aria-valuenow="18" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-12">
                                <div class="card custom-card overflow-hidden">
                                    <div class="row">
                                        <div class="card-body py-2">
                                            <div class="card-title mt-1 pl-3" style="font-size:100px;">
                                                <h4><b style="text-decoration: underline;">Total Income</b>&#8628;<b class="float-end mx-4">$ {{ number_format(totalInc(),2) }}</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <h4 class="mb-2 text-green">
                                                            $ {{ number_format(totalLevelInc(), 2) }}</h4>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="row align-items-center mb-15">
                                                    <div class="col-auto">
                                                        <p class="mb-2">Total Level Income</p>
                                                    </div>
                                                </div>
                                                <div class="progress-stacked progress-animate progress-xs mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 21%"
                                                        aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 26%" aria-valuenow="26" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 18%" aria-valuenow="18" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">

                                                        <h4 class="mb-2 text-green">
                                                            $ {{ number_format(totaltradeBonusInc(), 2) }}</h4>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="row align-items-center mb-15">
                                                    <div class="col-auto">
                                                        <p class="mb-2">Total Trading Bonus Income</p>
                                                    </div>
                                                </div>
                                                <div class="progress-stacked progress-animate progress-xs mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 21%"
                                                        aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 26%" aria-valuenow="26" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 18%" aria-valuenow="18" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <h4 class="mb-2 text-green">
                                                            $ {{ number_format(totaltradeprofitInc(), 2) }}</h4>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="row align-items-center mb-15">
                                                    <div class="col-auto">
                                                        <p class="mb-2">Total Trading Profit Income</p>
                                                    </div>
                                                    <div class="progress-stacked progress-animate progress-xs mb-4">
                                                        <div class="progress-bar" role="progressbar" style="width: 21%"
                                                            aria-valuenow="21" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 26%" aria-valuenow="26" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 18%" aria-valuenow="18" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body bg-orange">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <div class="col-9">
                                                            <h4 class="mb-2">$ {{ number_format(totalgrossAmount(),2) }}</h4>
                                                        </div>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="row align-items-center mb-15">
                                                    <div class="col-auto">
                                                        <p class="mb-2">Withdrawal Gross Amount</p>
                                                    </div>
                                                </div>
                                                <div class="progress-stacked progress-animate progress-xs mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 21%"
                                                        aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 26%" aria-valuenow="26" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 18%" aria-valuenow="18" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body bg-green">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <div class="col-9">
                                                            <h4 class="mb-2">$ {{ number_format(totalnetAmount(),2) }}</h4>
                                                        </div>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="row align-items-center mb-15">
                                                    <div class="col-auto">
                                                        <p class="mb-2">Withdrawal Net Amount</p>
                                                    </div>
                                                </div>
                                                <div class="progress-stacked progress-animate progress-xs mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 21%"
                                                        aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 26%" aria-valuenow="26" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 18%" aria-valuenow="18" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-4">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-body bg-yellow">
                                        <div class="d-flex align-items-top justify-content-between">
                                            <div> <span class="avatar avatar-md avatar-rounded bg-warning"> <i
                                                        class="ti ti-briefcase fs-16"></i> </span> </div>
                                            <div class="flex-fill ms-3">
                                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="col-9">
                                                        <div class="col-9">
                                                            <h4 class="mb-2">$ {{ number_format(totaldeductions(),2) }}</h4>
                                                        </div>
                                                    </div>
                                                    <div id="crm-total-deals"></div>
                                                </div>
                                                <div class="row align-items-center mb-15">
                                                    <div class="col-auto">
                                                        <p class="mb-2">Deduction on Withdrawal</p>
                                                    </div>
                                                </div>
                                                <div class="progress-stacked progress-animate progress-xs mb-4">
                                                    <div class="progress-bar" role="progressbar" style="width: 21%"
                                                        aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 26%" aria-valuenow="26" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 18%" aria-valuenow="18" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- End::app-content -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="input-group"> <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i
                                class="fe fe-search header-link-icon fs-18"></i></a> <input type="search"
                            class="form-control border-0 px-2" placeholder="Search" aria-label="Username"> <a
                            href="javascript:void(0);" class="input-group-text" id="voice-search"><i
                                class="fe fe-mic header-link-icon"></i></a> <a href="javascript:void(0);"
                            class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false"> <i
                                class="fe fe-more-vertical"></i> </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p><span
                            class="search-tags"><i class="fe fe-user me-2"></i>People<a href="javascript:void(0)"
                                class="tag-addon"><i class="fe fe-x"></i></a></span>
                        <span class="search-tags"><i class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0)"
                                class="tag-addon"><i class="fe fe-x"></i></a></span>
                        <span class="search-tags"><i class="fe fe-align-left me-2"></i>Articles<a
                                href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                        <span class="search-tags"><i class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)"
                                class="tag-addon"><i class="fe fe-x"></i></a></span>
                    </div>
                    <div class="my-4">
                        <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
                        <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert"> <a
                                href="notifications.html"><span>Notifications</span></a> <a class="ms-auto lh-1"
                                href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i
                                    class="fe fe-x text-muted"></i></a> </div>
                        <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert"> <a
                                href="alerts.html"><span>Alerts</span></a> <a class="ms-auto lh-1"
                                href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i
                                    class="fe fe-x text-muted"></i></a> </div>
                        <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert"> <a
                                href="mail.html"><span>Mail</span></a> <a class="ms-auto lh-1" href="javascript:void(0);"
                                data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group ms-auto"> <button class="btn btn-sm btn-primary-light">Search</button>
                        <button class="btn btn-sm btn-primary">Clear Recents</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Footer Start -->
@endsection
