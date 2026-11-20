@extends('member.layouts.main')
@section('title', 'Global Pool Members')
@section('container')

    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h1 class="page-title fw-semibold fs-18 mb-1">Global Pool Members</h1>
                    <p class="text-muted fs-12 mb-0">Visual genealogy tree of members placed in your global autopool matrix</p>
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
                                <span class="badge bg-success text-white fs-10 px-2 py-0.5">Level 0</span>
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
                                <span class="badge bg-primary text-white fs-10 px-2 py-0.5">2x Matrix</span>
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
                                <span class="badge bg-success-transparent text-success px-2 py-1 fs-11">
                                    <i class="ri-checkbox-circle-fill me-1"></i> Active Member
                                </span>
                                <span class="badge bg-warning-transparent text-warning px-2 py-1 fs-11">
                                    <i class="ri-time-line me-1"></i> Inactive (Temp)
                                </span>
                                <span class="badge bg-secondary-transparent text-secondary px-2 py-1 fs-11">
                                    <i class="ri-lock-line me-1"></i> Slot Not Activated
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                        <div class="card-body p-4">
                            <div class="genealogy-body genealogy-scroll text-center" style="overflow-x: auto; padding: 20px 0;">
                                <div class="genealogy-tree d-inline-block">
                                    <ul class="ps-0">
                                        <li style="padding: 10px 10px;">
                                            <!-- Root Node (Current User) -->
                                            <a href="javascript:void(0);" class="text-decoration-none">
                                                <div class="card border shadow-sm p-2 text-center"
                                                     style="width: 140px; border-radius: 12px; background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); color: #fff;">
                                                    <div class="avatar avatar-sm rounded-circle bg-white text-primary mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                        <i class="ri-user-star-line fs-14"></i>
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

                                            <!-- Level 1 Downlines -->
                                            @if ($pool_data && count($pool_data) > 0)
                                                <ul class="active">
                                                    @foreach ($pool_data as $item)
                                                        @php
                                                            $itemStatus = getMemberStatus($item['memberid']);
                                                        @endphp
                                                        <li style="padding: 10px 10px;">
                                                            <a href="javascript:void(0);" class="text-decoration-none">
                                                                <div class="card border shadow-sm p-2 text-center bg-white"
                                                                     style="width: 130px; border-radius: 12px; border-color: #e2e8f0;">
                                                                    <div class="avatar avatar-xs rounded-circle bg-primary-transparent text-primary mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                        <i class="ri-user-3-line fs-12"></i>
                                                                    </div>
                                                                    <div class="fw-bold fs-11 text-dark text-truncate">{{ $item['memberid'] }}</div>
                                                                    <div class="fs-9 text-muted">Level 1</div>
                                                                    <div class="mt-1">
                                                                        @if ($itemStatus == 'Temp')
                                                                            <span class="badge bg-warning-transparent text-warning fs-9 px-1.5 py-0.5">Inactive</span>
                                                                        @else
                                                                            <span class="badge bg-success-transparent text-success fs-9 px-1.5 py-0.5">{{ $itemStatus }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>

                                                            <!-- Level 2 Downlines -->
                                                            @if (getPoolDirectCount($item['memberid'], $pool) > 0)
                                                                @php
                                                                    $directs_2 = getPoolLevelData($item['memberid'], $pool);
                                                                @endphp
                                                                <ul>
                                                                    @foreach ($directs_2 as $item_2)
                                                                        @php
                                                                            $itemStatus_2 = getMemberStatus($item_2['memberid']);
                                                                        @endphp
                                                                        <li style="padding: 10px 8px;">
                                                                            <a href="javascript:void(0);" class="text-decoration-none">
                                                                                <div class="card border shadow-sm p-2 text-center bg-white"
                                                                                     style="width: 125px; border-radius: 12px; border-color: #e2e8f0;">
                                                                                    <div class="avatar avatar-xs rounded-circle bg-info-transparent text-info mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                                        <i class="ri-user-line fs-12"></i>
                                                                                    </div>
                                                                                    <div class="fw-bold fs-11 text-dark text-truncate">{{ $item_2['memberid'] }}</div>
                                                                                    <div class="fs-9 text-muted">Level 2</div>
                                                                                    <div class="mt-1">
                                                                                        @if ($itemStatus_2 == 'Temp')
                                                                                            <span class="badge bg-warning-transparent text-warning fs-9 px-1.5 py-0.5">Inactive</span>
                                                                                        @else
                                                                                            <span class="badge bg-success-transparent text-success fs-9 px-1.5 py-0.5">{{ $itemStatus_2 }}</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </a>

                                                                            <!-- Level 3 Downlines -->
                                                                            @if (getPoolDirectCount($item_2['memberid'], $pool) > 0)
                                                                                @php
                                                                                    $directs_3 = getPoolLevelData($item_2['memberid'], $pool);
                                                                                @endphp
                                                                                <ul>
                                                                                    @foreach ($directs_3 as $item_3)
                                                                                        @php
                                                                                            $itemStatus_3 = getMemberStatus($item_3['memberid']);
                                                                                        @endphp
                                                                                        <li style="padding: 10px 6px;">
                                                                                            <a href="javascript:void(0);" class="text-decoration-none">
                                                                                                <div class="card border shadow-sm p-2 text-center bg-white"
                                                                                                     style="width: 120px; border-radius: 12px; border-color: #e2e8f0;">
                                                                                                    <div class="avatar avatar-xs rounded-circle bg-secondary-transparent text-secondary mx-auto mb-1 d-flex align-items-center justify-content-center">
                                                                                                        <i class="ri-user-line fs-11"></i>
                                                                                                    </div>
                                                                                                    <div class="fw-bold fs-10 text-dark text-truncate">{{ $item_3['memberid'] }}</div>
                                                                                                    <div class="fs-9 text-muted">Level 3</div>
                                                                                                    <div class="mt-1">
                                                                                                        @if ($itemStatus_3 == 'Temp')
                                                                                                            <span class="badge bg-warning-transparent text-warning fs-9 px-1.5 py-0.5">Inactive</span>
                                                                                                        @else
                                                                                                            <span class="badge bg-success-transparent text-success fs-9 px-1.5 py-0.5">{{ $itemStatus_3 }}</span>
                                                                                                        @endif
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
                                            @else
                                                <div class="mt-4 p-4 border rounded-3 bg-light d-inline-block text-center" style="max-width: 460px;">
                                                    <i class="ri-organization-chart text-muted fs-32 mb-2 d-block"></i>
                                                    <h6 class="fw-bold text-dark mb-1">No Members Placed Yet in {{ $activeSlot['name'] }}</h6>
                                                    <p class="text-muted fs-12 mb-0">
                                                        As members worldwide activate {{ $activeSlot['name'] }}, the global autopool matrix will automatically place downlines under your structure.
                                                    </p>
                                                </div>
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
    </div>

@endsection
