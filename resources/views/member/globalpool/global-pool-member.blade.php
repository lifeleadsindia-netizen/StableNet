@extends('member.layouts.main')
@section('title', 'Global Pool Members')
@section('container')

    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h1 class="page-title fw-semibold fs-18 mb-1">Global Pool Members</h1>
                    <p class="text-muted fs-12 mb-0">Visual 2x binary genealogy tree of members placed in your global autopool matrix</p>
                </div>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Global Pool Section</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Global Pool Members</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @php
                $activePool = $pool ?? 1;
                $activeSlot = $currentSlot ?? ($slots[$activePool] ?? ['name' => 'Slot 1 ($5)', 'price' => '$5', 'value' => 5]);
                $directCount = $pool_data ? count($pool_data) : 0;
            @endphp

            <!-- Slot Selection Toolbar Card -->
            <div class="card custom-card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-body p-3">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-sm rounded-circle bg-primary-transparent text-primary me-2.5 d-flex align-items-center justify-content-center">
                                <i class="ri-node-tree fs-16"></i>
                            </div>
                            <div>
                                <span class="fs-11 text-muted text-uppercase fw-semibold d-block">Autopool Genealogy</span>
                                <h6 class="fw-bold mb-0 text-dark">{{ $activeSlot['name'] }} Tree</h6>
                            </div>
                        </div>

                        <!-- Slot Navigation Pills (Desktop & Tablet) -->
                        <div class="d-none d-lg-flex flex-wrap gap-1.5">
                            @foreach ($slots as $sId => $slotItem)
                                <a href="{{ url('/member/globalpool/globalpool-members/' . $sId . '/' . $slotItem['value']) }}"
                                   class="btn btn-sm px-2.5 py-1.5 fw-semibold {{ $sId == $activePool ? 'btn-primary shadow-sm' : 'btn-outline-light text-dark bg-light border-0' }}"
                                   style="border-radius: 8px; font-size: 11.5px;">
                                    {{ $slotItem['name'] }}
                                </a>
                            @endforeach
                        </div>

                        <!-- Dropdown (Mobile Devices) -->
                        <div class="d-lg-none w-100">
                            <label class="form-label fs-11 text-muted fw-semibold mb-1">Switch Pool Slot:</label>
                            <select class="form-select form-select-sm" onchange="window.location.href=this.value">
                                @foreach ($slots as $sId => $slotItem)
                                    <option value="{{ url('/member/globalpool/globalpool-members/' . $sId . '/' . $slotItem['value']) }}"
                                            {{ $sId == $activePool ? 'selected' : '' }}>
                                        {{ $slotItem['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Info & Legend Cards -->
            <div class="row g-3 mb-4">
                <!-- Current Member Node Info -->
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-success text-uppercase">Root Position</span>
                                <span class="badge bg-success text-white fs-10 px-2 py-0.5">Tier 0</span>
                            </div>
                            <div class="fs-18 fw-bold text-dark mb-0 d-flex align-items-center">
                                <i class="ri-user-star-fill text-success me-1.5"></i>
                                {{ $data['memberid'] }}
                            </div>
                            <div class="text-muted fs-11 mt-1">
                                Package: ${{ number_format((float) ($data['package'] ?? 0), 2) }} &bull; Status: {{ $data['status'] }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Direct Matrix Downlines in this Slot -->
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-primary text-uppercase">Direct Placements</span>
                                <span class="badge bg-primary text-white fs-10 px-2 py-0.5">Tier 1</span>
                            </div>
                            <div class="fs-18 fw-bold text-dark mb-0 d-flex align-items-center">
                                <i class="ri-group-line text-primary me-1.5"></i>
                                {{ $directCount }} / 2 Members
                            </div>
                            <div class="text-muted fs-11 mt-1">
                                Level 1 capacity: 2 downlines in {{ $activeSlot['name'] }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tree Legend -->
                <div class="col-xxl-4 col-xl-4 col-lg-12 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100" style="background: #ffffff; border-radius: 14px;">
                        <div class="card-body p-3 d-flex flex-column justify-content-center">
                            <span class="fs-11 fw-semibold text-muted text-uppercase mb-2 d-block">Node Status Legend</span>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-primary text-white px-2 py-1 fs-11">
                                    <i class="ri-user-star-fill me-1"></i> Root User
                                </span>
                                <span class="badge bg-success-transparent text-success px-2 py-1 fs-11 border border-success-subtle">
                                    <i class="ri-checkbox-circle-fill me-1"></i> Active Member
                                </span>
                                <span class="badge bg-light text-muted px-2 py-1 fs-11 border border-dashed">
                                    <i class="ri-add-circle-line me-1"></i> Open Position
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom Clean Scoped Styles for Binary Tree -->
            <style>
                .genealogy-scroll {
                    overflow-x: auto;
                    padding: 30px 10px;
                    min-height: 480px;
                }
                .genealogy-tree {
                    display: inline-block;
                    min-width: 680px;
                }
                .genealogy-tree ul {
                    padding-top: 24px !important;
                    position: relative;
                    padding-left: 0px;
                    display: flex;
                    justify-content: center;
                    margin-bottom: 0;
                }
                .genealogy-tree li {
                    float: left;
                    text-align: center;
                    list-style-type: none;
                    position: relative;
                    padding: 24px 10px 0 10px;
                }
                .genealogy-tree li::before,
                .genealogy-tree li::after {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: 50%;
                    border-top: 2px solid #6366f1 !important;
                    width: 50%;
                    height: 24px;
                }
                .genealogy-tree li::after {
                    right: auto;
                    left: 50%;
                    border-left: 2px solid #6366f1 !important;
                }
                .genealogy-tree li:only-child::after,
                .genealogy-tree li:only-child::before {
                    display: none;
                }
                .genealogy-tree li:only-child {
                    padding-top: 0;
                }
                .genealogy-tree li:first-child::before,
                .genealogy-tree li:last-child::after {
                    border: 0 none;
                }
                .genealogy-tree li:last-child::before {
                    border-right: 2px solid #6366f1 !important;
                    border-radius: 0 8px 0 0;
                }
                .genealogy-tree li:first-child::after {
                    border-radius: 8px 0 0 0;
                }
                .genealogy-tree ul ul::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 50%;
                    border-left: 2px solid #6366f1 !important;
                    width: 0;
                    height: 24px;
                }
                .genealogy-tree li a {
                    display: inline-block;
                    text-decoration: none;
                }
                .gp-node-card {
                    border-radius: 14px;
                    padding: 12px 8px;
                    transition: all 0.25s ease;
                    text-align: center;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                }
                .gp-node-card:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
                }
                .gp-root-node {
                    width: 145px;
                    background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
                    color: #ffffff;
                    border: 2px solid #ffffff;
                }
                .gp-filled-node {
                    width: 130px;
                    background: #ffffff;
                    border: 2px solid #10b981;
                }
                .gp-empty-node {
                    width: 120px;
                    background: #f8fafc;
                    border: 2px dashed #94a3b8;
                    opacity: 0.85;
                }
            </style>

            <!-- Genealogy Tree Visual Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card custom-card shadow-sm border-0" style="border-radius: 14px;">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom py-3">
                            <div class="card-title mb-0 d-flex align-items-center">
                                <i class="ri-git-merge-line text-primary me-2 fs-18"></i>
                                <span class="fw-bold fs-15">{{ $activeSlot['name'] }} Binary Tree Structure</span>
                            </div>
                            <a href="{{ url('/member/globalpool/globalpool-matrix/' . $activePool) }}"
                               class="btn btn-sm btn-outline-primary fw-semibold fs-12">
                                <i class="ri-table-line me-1"></i> View Level Breakdown Table
                            </a>
                        </div>
                        <div class="card-body p-4 text-center">
                            <div class="genealogy-scroll">
                                <div class="genealogy-tree">
                                    <ul class="ps-0">
                                        <li>
                                            <!-- Tier 0: Root User (Current Member) -->
                                            <a href="javascript:void(0);">
                                                <div class="gp-node-card gp-root-node">
                                                    <div class="avatar avatar-sm rounded-circle bg-white text-primary mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                        <i class="ri-user-star-fill fs-14"></i>
                                                    </div>
                                                    <div class="fw-bold fs-12 text-truncate">{{ $data['memberid'] }}</div>
                                                    <div class="fs-10 text-white-50">Root User</div>
                                                    <div class="mt-1">
                                                        @if ($value <= ($data['package'] ?? 0))
                                                            <span class="badge bg-success fs-9 px-1.5 py-0.5">Active</span>
                                                        @else
                                                            <span class="badge bg-warning text-dark fs-9 px-1.5 py-0.5">Slot Locked</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- Tier 1: 2 Binary Positions (Left & Right) -->
                                            <ul>
                                                <!-- Position 1 (Left) -->
                                                <li>
                                                    @if ($pos1)
                                                        @php $status1 = getMemberStatus($pos1->memberid); @endphp
                                                        <a href="javascript:void(0);">
                                                            <div class="gp-node-card gp-filled-node">
                                                                <div class="avatar avatar-xs rounded-circle bg-success-transparent text-success mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                    <i class="ri-user-3-fill fs-12"></i>
                                                                </div>
                                                                <div class="fw-bold fs-11 text-dark text-truncate">{{ $pos1->memberid }}</div>
                                                                <div class="fs-9 text-muted">Tier 1 &bull; Left</div>
                                                                <div class="mt-1">
                                                                    <span class="badge {{ $status1 == 'Temp' ? 'bg-warning-transparent text-warning' : 'bg-success-transparent text-success' }} fs-9 px-1.5 py-0.5">
                                                                        {{ $status1 == 'Temp' ? 'Inactive' : $status1 }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);">
                                                            <div class="gp-node-card gp-empty-node">
                                                                <div class="avatar avatar-xs rounded-circle bg-light text-muted mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                    <i class="ri-user-add-line fs-12"></i>
                                                                </div>
                                                                <div class="fw-semibold fs-11 text-secondary">Open Slot</div>
                                                                <div class="fs-9 text-muted">Tier 1 &bull; Left</div>
                                                                <div class="mt-1">
                                                                    <span class="badge bg-light text-muted border fs-9 px-1.5 py-0.5">Available</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endif

                                                    <!-- Tier 2 Children under Pos 1 -->
                                                    <ul>
                                                        <!-- Pos 1.1 -->
                                                        <li>
                                                            @if ($pos1_1)
                                                                @php $status1_1 = getMemberStatus($pos1_1->memberid); @endphp
                                                                <a href="javascript:void(0);">
                                                                    <div class="gp-node-card gp-filled-node">
                                                                        <div class="avatar avatar-xs rounded-circle bg-info-transparent text-info mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                            <i class="ri-user-line fs-11"></i>
                                                                        </div>
                                                                        <div class="fw-bold fs-10 text-dark text-truncate">{{ $pos1_1->memberid }}</div>
                                                                        <div class="fs-9 text-muted">Tier 2</div>
                                                                        <div class="mt-1">
                                                                            <span class="badge {{ $status1_1 == 'Temp' ? 'bg-warning-transparent text-warning' : 'bg-success-transparent text-success' }} fs-9 px-1.5 py-0.5">
                                                                                {{ $status1_1 == 'Temp' ? 'Inactive' : $status1_1 }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <div class="gp-node-card gp-empty-node">
                                                                        <div class="avatar avatar-xs rounded-circle bg-light text-muted mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                            <i class="ri-add-line fs-11"></i>
                                                                        </div>
                                                                        <div class="fw-medium fs-10 text-muted">Open</div>
                                                                        <div class="fs-9 text-muted">Tier 2</div>
                                                                        <div class="mt-1">
                                                                            <span class="badge bg-light text-muted border fs-9 px-1 py-0.5">Empty</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @endif
                                                        </li>

                                                        <!-- Pos 1.2 -->
                                                        <li>
                                                            @if ($pos1_2)
                                                                @php $status1_2 = getMemberStatus($pos1_2->memberid); @endphp
                                                                <a href="javascript:void(0);">
                                                                    <div class="gp-node-card gp-filled-node">
                                                                        <div class="avatar avatar-xs rounded-circle bg-info-transparent text-info mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                            <i class="ri-user-line fs-11"></i>
                                                                        </div>
                                                                        <div class="fw-bold fs-10 text-dark text-truncate">{{ $pos1_2->memberid }}</div>
                                                                        <div class="fs-9 text-muted">Tier 2</div>
                                                                        <div class="mt-1">
                                                                            <span class="badge {{ $status1_2 == 'Temp' ? 'bg-warning-transparent text-warning' : 'bg-success-transparent text-success' }} fs-9 px-1.5 py-0.5">
                                                                                {{ $status1_2 == 'Temp' ? 'Inactive' : $status1_2 }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <div class="gp-node-card gp-empty-node">
                                                                        <div class="avatar avatar-xs rounded-circle bg-light text-muted mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                            <i class="ri-add-line fs-11"></i>
                                                                        </div>
                                                                        <div class="fw-medium fs-10 text-muted">Open</div>
                                                                        <div class="fs-9 text-muted">Tier 2</div>
                                                                        <div class="mt-1">
                                                                            <span class="badge bg-light text-muted border fs-9 px-1 py-0.5">Empty</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </li>

                                                <!-- Position 2 (Right) -->
                                                <li>
                                                    @if ($pos2)
                                                        @php $status2 = getMemberStatus($pos2->memberid); @endphp
                                                        <a href="javascript:void(0);">
                                                            <div class="gp-node-card gp-filled-node">
                                                                <div class="avatar avatar-xs rounded-circle bg-success-transparent text-success mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                    <i class="ri-user-3-fill fs-12"></i>
                                                                </div>
                                                                <div class="fw-bold fs-11 text-dark text-truncate">{{ $pos2->memberid }}</div>
                                                                <div class="fs-9 text-muted">Tier 1 &bull; Right</div>
                                                                <div class="mt-1">
                                                                    <span class="badge {{ $status2 == 'Temp' ? 'bg-warning-transparent text-warning' : 'bg-success-transparent text-success' }} fs-9 px-1.5 py-0.5">
                                                                        {{ $status2 == 'Temp' ? 'Inactive' : $status2 }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);">
                                                            <div class="gp-node-card gp-empty-node">
                                                                <div class="avatar avatar-xs rounded-circle bg-light text-muted mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                    <i class="ri-user-add-line fs-12"></i>
                                                                </div>
                                                                <div class="fw-semibold fs-11 text-secondary">Open Slot</div>
                                                                <div class="fs-9 text-muted">Tier 1 &bull; Right</div>
                                                                <div class="mt-1">
                                                                    <span class="badge bg-light text-muted border fs-9 px-1.5 py-0.5">Available</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endif

                                                    <!-- Tier 2 Children under Pos 2 -->
                                                    <ul>
                                                        <!-- Pos 2.1 -->
                                                        <li>
                                                            @if ($pos2_1)
                                                                @php $status2_1 = getMemberStatus($pos2_1->memberid); @endphp
                                                                <a href="javascript:void(0);">
                                                                    <div class="gp-node-card gp-filled-node">
                                                                        <div class="avatar avatar-xs rounded-circle bg-info-transparent text-info mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                            <i class="ri-user-line fs-11"></i>
                                                                        </div>
                                                                        <div class="fw-bold fs-10 text-dark text-truncate">{{ $pos2_1->memberid }}</div>
                                                                        <div class="fs-9 text-muted">Tier 2</div>
                                                                        <div class="mt-1">
                                                                            <span class="badge {{ $status2_1 == 'Temp' ? 'bg-warning-transparent text-warning' : 'bg-success-transparent text-success' }} fs-9 px-1.5 py-0.5">
                                                                                {{ $status2_1 == 'Temp' ? 'Inactive' : $status2_1 }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <div class="gp-node-card gp-empty-node">
                                                                        <div class="avatar avatar-xs rounded-circle bg-light text-muted mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                            <i class="ri-add-line fs-11"></i>
                                                                        </div>
                                                                        <div class="fw-medium fs-10 text-muted">Open</div>
                                                                        <div class="fs-9 text-muted">Tier 2</div>
                                                                        <div class="mt-1">
                                                                            <span class="badge bg-light text-muted border fs-9 px-1 py-0.5">Empty</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @endif
                                                        </li>

                                                        <!-- Pos 2.2 -->
                                                        <li>
                                                            @if ($pos2_2)
                                                                @php $status2_2 = getMemberStatus($pos2_2->memberid); @endphp
                                                                <a href="javascript:void(0);">
                                                                    <div class="gp-node-card gp-filled-node">
                                                                        <div class="avatar avatar-xs rounded-circle bg-info-transparent text-info mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                            <i class="ri-user-line fs-11"></i>
                                                                        </div>
                                                                        <div class="fw-bold fs-10 text-dark text-truncate">{{ $pos2_2->memberid }}</div>
                                                                        <div class="fs-9 text-muted">Tier 2</div>
                                                                        <div class="mt-1">
                                                                            <span class="badge {{ $status2_2 == 'Temp' ? 'bg-warning-transparent text-warning' : 'bg-success-transparent text-success' }} fs-9 px-1.5 py-0.5">
                                                                                {{ $status2_2 == 'Temp' ? 'Inactive' : $status2_2 }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <div class="gp-node-card gp-empty-node">
                                                                        <div class="avatar avatar-xs rounded-circle bg-light text-muted mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                            <i class="ri-add-line fs-11"></i>
                                                                        </div>
                                                                        <div class="fw-medium fs-10 text-muted">Open</div>
                                                                        <div class="fs-9 text-muted">Tier 2</div>
                                                                        <div class="mt-1">
                                                                            <span class="badge bg-light text-muted border fs-9 px-1 py-0.5">Empty</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Footer Matrix Explanation Box -->
                            <div class="p-3 mt-3 rounded-3 bg-light border text-start d-flex align-items-center gap-3">
                                <div class="avatar avatar-md rounded-circle bg-primary-transparent text-primary flex-shrink-0 d-flex align-items-center justify-content-center">
                                    <i class="ri-information-line fs-20"></i>
                                </div>
                                <div class="fs-12 text-muted">
                                    <strong class="text-dark">How Global Autopool Placement Works:</strong>
                                    Members worldwide activating <strong>{{ $activeSlot['name'] }}</strong> are sequentially allocated from top-to-bottom and left-to-right across a 2x binary matrix. When a position under your structure is filled, it automatically highlights in green and 3% income is instantly credited to your wallet.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
