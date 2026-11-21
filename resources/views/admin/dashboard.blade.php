@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('container')

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Start::page-header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-3 page-header-breadcrumb">
                <div>
                    <h5 class="fw-bold mb-0 text-dark">Admin Overview</h5>
                    <p class="text-muted fs-12 mb-0">Welcome back to {{ config('detailsApp.name') }} management portal</p>
                </div>
            </div>
            <!-- End::page-header -->

            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <div class="row">

                        <!-- Member Stat Cards -->
                        <div class="col-sm-6 col-md-3">
                            <div class="card custom-card card-heavy card-light-navy">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1 text-muted fs-13">Total Members</p>
                                        <h4 class="mb-0 fw-bold text-dark">{{ totalMembersadmin() }}</h4>
                                    </div>
                                    <div>
                                        <span class="avatar avatar-md avatar-rounded avatar-navy p-2">
                                            <i class="ti ti-users fs-20"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="card custom-card card-heavy card-light-emerald">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1 text-muted fs-13">Total Active</p>
                                        <h4 class="mb-0 fw-bold text-dark">{{ totalActiveMembers() }}</h4>
                                    </div>
                                    <div>
                                        <span class="avatar avatar-md avatar-rounded avatar-emerald p-2">
                                            <i class="ti ti-user-check fs-20"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="card custom-card card-heavy card-light-orange">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1 text-muted fs-13">Total Inactive</p>
                                        <h4 class="mb-0 fw-bold text-dark">{{ totalTempMembers() }}</h4>
                                    </div>
                                    <div>
                                        <span class="avatar avatar-md avatar-rounded avatar-orange p-2">
                                            <i class="ti ti-user-x fs-20"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="card custom-card card-heavy card-light-rose">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1 text-muted fs-13">Total Blocked</p>
                                        <h4 class="mb-0 fw-bold text-dark">{{ totalblockedMembers() }}</h4>
                                    </div>
                                    <div>
                                        <span class="avatar avatar-md avatar-rounded avatar-rose p-2">
                                            <i class="ti ti-user-off fs-20"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wallet & Overview Cards -->
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card card-heavy card-light-blue overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-blue">
                                                <i class="ti ti-wallet fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <p class="mb-0">Total In Wallet</p>
                                                    <h4 class="mb-0 fw-bold text-dark">$ {{ number_format(totalinWallet(), 2) }}</h4>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Member's Total Wallet</small>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card card-heavy card-light-indigo overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-indigo">
                                                <i class="ti ti-coin fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <p class="mb-0">Total In Fund Wallet</p>
                                                    <h4 class="mb-0 fw-bold text-dark">$ {{ number_format(totalinFundWallet(), 2) }}</h4>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Member's Total Fund Wallet</small>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card card-heavy card-light-purple overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-purple">
                                                <i class="ti ti-stack-2 fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <p class="mb-0">Total In Level Wallet</p>
                                                    <h4 class="mb-0 fw-bold text-dark">$ {{ number_format(totalinlevelWallet(), 2) }}</h4>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Member's Total Level Wallet</small>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card card-heavy card-light-amber overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-amber">
                                                <i class="bx bx-time fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <p class="mb-0">Today's Withdrawal</p>
                                                    <h4 class="mb-0 fw-bold text-dark">$ {{ number_format(todaysWithdrawal(), 2) }}</h4>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Member's Today's Withdrawal</small>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card card-heavy card-light-teal overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-teal">
                                                <i class="bx bx-money-withdraw fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <p class="mb-0">Total Withdrawal</p>
                                                    <h4 class="mb-0 fw-bold text-dark">$ {{ number_format(totalWithdrawal(), 2) }}</h4>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Member's Total Withdrawal</small>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card card-heavy card-light-cyan overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-cyan">
                                                <i class="ti ti-box fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <p class="mb-0">Total Package Value</p>
                                                    <h4 class="mb-0 fw-bold text-dark">$ {{ number_format(totalpackageValue(), 2) }}</h4>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Member's Total Package Value</small>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card card-heavy card-light-navy overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-navy">
                                                <i class="ti ti-world fs-20"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <p class="mb-0">Total Pool Member</p>
                                                    <h4 class="mb-0 fw-bold text-dark">{{ totalpoolMember() }}</h4>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Total Pool Member's </small>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Random colors shuffle for 5 incomes -->
                        @php
                            $incomeColorList = ['bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger', 'bg-purple', 'bg-teal', 'bg-orange'];
                            $todayColors = $incomeColorList;
                            shuffle($todayColors);
                            $totalColors = $incomeColorList;
                            shuffle($totalColors);
                        @endphp

                        <!-- Today's Income Section Banner Header -->
                        <div class="col-xl-12 mb-2">
                            <div class="card custom-card section-banner-card">
                                <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="section-banner-icon">
                                            <i class="ti ti-calendar-event fs-20"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark section-banner-title">Today's Income</h6>
                                            <small class="text-muted">Real-time daily income summary</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="text-muted fs-13 fw-semibold">Total Today:</span>
                                        <span class="section-banner-badge">
                                            $ {{ number_format(todayInc(), 2) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Today's Top 3 Cards (col-4 each) -->
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card card-heavy card-light-indigo overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-indigo">
                                                <i class="ti ti-layers-intersect fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(todayLevelInc(), 2) }}
                                                    </h4>
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
                            <div class="card custom-card card-heavy card-light-blue overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-blue">
                                                <i class="ti ti-user-plus fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(todayDirectInc(), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Today's Direct Income</p>
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
                            <div class="card custom-card card-heavy card-light-teal overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-teal">
                                                <i class="ti ti-world fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(todayGlobalPoolInc(), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Today's Global Autopool Income</p>
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

                        <!-- Today's Bottom 2 Cards (col-6 each) -->
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card card-heavy card-light-amber overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-amber">
                                                <i class="bx bx-transfer fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(todayWithdrawalInc(), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Today's Withdrawal Income</p>
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

                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card card-heavy card-light-purple overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-purple">
                                                <i class="ti ti-trophy fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(todayRewardInc(), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Today's Reward Income</p>
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

                        <!-- Total Income Section Banner Header -->
                        <div class="col-xl-12 mb-2 mt-2">
                            <div class="card custom-card section-banner-card banner-total">
                                <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="section-banner-icon">
                                            <i class="ti ti-chart-arrows-vertical fs-20"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark section-banner-title">Total Income</h6>
                                            <small class="text-muted">Accumulated platform income across all streams</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="text-muted fs-13 fw-semibold">Grand Total:</span>
                                        <span class="section-banner-badge">
                                            $ {{ number_format(totalInc(), 2) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total's Top 3 Cards (col-4 each) -->
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card card-heavy card-light-indigo overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-indigo">
                                                <i class="ti ti-layers-intersect fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(totalLevelInc(), 2) }}
                                                    </h4>
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
                            <div class="card custom-card card-heavy card-light-blue overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-blue">
                                                <i class="ti ti-user-plus fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(totalDirectInc(), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Total Direct Income</p>
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
                            <div class="card custom-card card-heavy card-light-teal overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-teal">
                                                <i class="ti ti-world fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(totalGlobalPoolInc(), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Total Global Autopool Income</p>
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

                        <!-- Total's Bottom 2 Cards (col-6 each) -->
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card card-heavy card-light-amber overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-amber">
                                                <i class="bx bx-transfer fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(totalWithdrawalInc(), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Total Withdrawal Income</p>
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

                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card card-heavy card-light-purple overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-purple">
                                                <i class="ti ti-trophy fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-green">
                                                        $ {{ number_format(totalRewardInc(), 2) }}
                                                    </h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Total Reward Income</p>
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

                        <!-- Bottom Withdrawal Summary Cards -->
                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card card-heavy card-bottom-summary summary-orange overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-summary-orange">
                                                <i class="ti ti-file-dollar fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-dark">$ {{ number_format(totalgrossAmount(), 2) }}</h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Withdrawal Gross Amount</p>
                                                </div>
                                            </div>
                                            <div class="progress-stacked progress-animate progress-xs mb-4">
                                                <div class="progress-bar bg-orange" role="progressbar" style="width: 45%"
                                                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 55%"
                                                    aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card card-heavy card-bottom-summary summary-green overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-summary-green">
                                                <i class="ti ti-cash fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-dark">$ {{ number_format(totalnetAmount(), 2) }}</h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Withdrawal Net Amount</p>
                                                </div>
                                            </div>
                                            <div class="progress-stacked progress-animate progress-xs mb-4">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%"
                                                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 35%"
                                                    aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-4 col-md-4">
                            <div class="card custom-card card-heavy card-bottom-summary summary-yellow overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded avatar-summary-yellow">
                                                <i class="ti ti-cut fs-18"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="col-9">
                                                    <h4 class="mb-2 text-dark">$ {{ number_format(totaldeductions(), 2) }}</h4>
                                                </div>
                                                <div id="crm-total-deals"></div>
                                            </div>
                                            <div class="row align-items-center mb-15">
                                                <div class="col-auto">
                                                    <p class="mb-2">Deduction on Withdrawal</p>
                                                </div>
                                            </div>
                                            <div class="progress-stacked progress-animate progress-xs mb-4">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End::app-content -->

    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="input-group">
                        <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i
                                class="fe fe-search header-link-icon fs-18"></i></a>
                        <input type="search" class="form-control border-0 px-2" placeholder="Search" aria-label="Username">
                        <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i
                                class="fe fe-mic header-link-icon"></i></a>
                        <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
