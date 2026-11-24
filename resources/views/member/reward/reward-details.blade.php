@extends('member.layouts.main')
@section('title', 'Reward Details')
@section('container')

    <div class="main-content app-content">
        <div class="container-fluid">

            @php
                // Fallback reward disbursement structure from TempController::rewardIncomeDis()
                $allRewards = $rewards ?? [
                    5 => [
                        ['status' => 0, 'count' => 50, 'amount' => 12.5],
                        ['status' => 1, 'count' => 200, 'amount' => 37.5],
                        ['status' => 2, 'count' => 700, 'amount' => 125],
                        ['status' => 3, 'count' => 1700, 'amount' => 250],
                        ['status' => 4, 'count' => 6700, 'amount' => 1250],
                        ['status' => 5, 'count' => 16700, 'amount' => 2500],
                    ],
                    15 => [
                        ['status' => 0, 'count' => 50, 'amount' => 37.5],
                        ['status' => 1, 'count' => 200, 'amount' => 112.5],
                        ['status' => 2, 'count' => 700, 'amount' => 375],
                        ['status' => 3, 'count' => 1700, 'amount' => 750],
                        ['status' => 4, 'count' => 6700, 'amount' => 3750],
                        ['status' => 5, 'count' => 16700, 'amount' => 7500],
                    ],
                    50 => [
                        ['status' => 0, 'count' => 50, 'amount' => 125],
                        ['status' => 1, 'count' => 200, 'amount' => 375],
                        ['status' => 2, 'count' => 700, 'amount' => 1250],
                        ['status' => 3, 'count' => 1700, 'amount' => 2500],
                        ['status' => 4, 'count' => 6700, 'amount' => 12500],
                        ['status' => 5, 'count' => 16700, 'amount' => 25000],
                    ],
                    100 => [
                        ['status' => 0, 'count' => 50, 'amount' => 250],
                        ['status' => 1, 'count' => 200, 'amount' => 750],
                        ['status' => 2, 'count' => 700, 'amount' => 2500],
                        ['status' => 3, 'count' => 1700, 'amount' => 5000],
                        ['status' => 4, 'count' => 6700, 'amount' => 25000],
                        ['status' => 5, 'count' => 16700, 'amount' => 50000],
                    ],
                    300 => [
                        ['status' => 0, 'count' => 50, 'amount' => 750],
                        ['status' => 1, 'count' => 200, 'amount' => 2250],
                        ['status' => 2, 'count' => 700, 'amount' => 7500],
                        ['status' => 3, 'count' => 1700, 'amount' => 15000],
                        ['status' => 4, 'count' => 6700, 'amount' => 75000],
                        ['status' => 5, 'count' => 16700, 'amount' => 150000],
                    ],
                    500 => [
                        ['status' => 0, 'count' => 50, 'amount' => 1250],
                        ['status' => 1, 'count' => 200, 'amount' => 3750],
                        ['status' => 2, 'count' => 700, 'amount' => 12500],
                        ['status' => 3, 'count' => 1700, 'amount' => 25000],
                        ['status' => 4, 'count' => 6700, 'amount' => 125000],
                        ['status' => 5, 'count' => 16700, 'amount' => 250000],
                    ],
                    1000 => [
                        ['status' => 0, 'count' => 50, 'amount' => 2500],
                        ['status' => 1, 'count' => 200, 'amount' => 7500],
                        ['status' => 2, 'count' => 700, 'amount' => 25000],
                        ['status' => 3, 'count' => 1700, 'amount' => 50000],
                        ['status' => 4, 'count' => 6700, 'amount' => 250000],
                        ['status' => 5, 'count' => 16700, 'amount' => 500000],
                    ],
                    3000 => [
                        ['status' => 0, 'count' => 50, 'amount' => 7500],
                        ['status' => 1, 'count' => 200, 'amount' => 22500],
                        ['status' => 2, 'count' => 700, 'amount' => 75000],
                        ['status' => 3, 'count' => 1700, 'amount' => 150000],
                        ['status' => 4, 'count' => 6700, 'amount' => 750000],
                        ['status' => 5, 'count' => 16700, 'amount' => 1500000],
                    ],
                    5000 => [
                        ['status' => 0, 'count' => 50, 'amount' => 12500],
                        ['status' => 1, 'count' => 200, 'amount' => 37500],
                        ['status' => 2, 'count' => 700, 'amount' => 125000],
                        ['status' => 3, 'count' => 1700, 'amount' => 250000],
                        ['status' => 4, 'count' => 6700, 'amount' => 1250000],
                        ['status' => 5, 'count' => 16700, 'amount' => 2500000],
                    ],
                    10000 => [
                        ['status' => 0, 'count' => 50, 'amount' => 25000],
                        ['status' => 1, 'count' => 200, 'amount' => 75000],
                        ['status' => 2, 'count' => 700, 'amount' => 250000],
                        ['status' => 3, 'count' => 1700, 'amount' => 500000],
                        ['status' => 4, 'count' => 6700, 'amount' => 2500000],
                        ['status' => 5, 'count' => 16700, 'amount' => 5000000],
                    ],
                ];

                $myPackage = (int) ($memberPackage ?? ($data['package'] ?? 0));
                $curPkg = (int) ($selectedPackage ?? request('package', $myPackage > 0 ? $myPackage : 5));
                if (!array_key_exists($curPkg, $allRewards)) {
                    $curPkg = 5;
                }

                $activeTiers = $rewardTiers ?? $allRewards[$curPkg];
                $activeCount = $currentCount ?? (isset($data['memberid']) ? totalMembers($data['memberid'], $curPkg) : 0);

                $myPaid = $paidRewards ?? (isset($data['memberid'])
                    ? \App\Models\RewardIncome::where('memberid', $data['memberid'])->where('status', 'Paid')->get()->keyBy('reward_status')
                    : collect());

                $achievedCount = 0;
                $totalAchievedAmount = 0;
                $nextTargetTier = null;

                foreach ($activeTiers as $t) {
                    $isPaid = isset($myPaid[$t['status']]);
                    $isAchieved = $isPaid || ($activeCount >= $t['count']);
                    if ($isAchieved) {
                        $achievedCount++;
                        $totalAchievedAmount += $t['amount'];
                    } elseif ($nextTargetTier === null) {
                        $nextTargetTier = $t;
                    }
                }
            @endphp

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h1 class="page-title fw-semibold fs-18 mb-1">Reward Details</h1>
                    <p class="text-muted fs-12 mb-0">Track your downline team milestones, reward levels, and real-time eligibility</p>
                </div>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Reward Section</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reward Details</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Package Selection Toolbar Card -->
            <div class="card custom-card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-body p-3">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-sm rounded-circle bg-primary-transparent text-primary me-2.5 d-flex align-items-center justify-content-center">
                                <i class="ri-gift-line fs-18"></i>
                            </div>
                            <div>
                                <span class="fs-11 text-muted text-uppercase fw-semibold d-block">Viewing Reward Plan</span>
                                <h6 class="fw-bold mb-0 text-dark">
                                    ${{ number_format($curPkg) }} Package Rewards
                                    @if($myPackage === $curPkg)
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-0.5 fs-11 ms-1">
                                            Your Package
                                        </span>
                                    @endif
                                </h6>
                            </div>
                        </div>

                        <!-- Package Pills (Desktop & Tablet) -->
                        <div class="d-none d-lg-flex flex-wrap gap-1.5">
                            @foreach ($allRewards as $pkgVal => $slotItem)
                                <a href="{{ url('/member/income/reward-details?package=' . $pkgVal) }}"
                                   class="btn btn-sm px-2.5 py-1.5 fw-semibold {{ $pkgVal == $curPkg ? 'btn-primary shadow-sm' : 'btn-outline-light text-dark bg-light border-0' }}"
                                   style="border-radius: 8px; font-size: 11.5px;">
                                    ${{ number_format($pkgVal) }}
                                    @if($pkgVal == $myPackage)
                                        <span class="badge bg-white text-primary ms-1" style="font-size: 9px; padding: 2px 4px;">Active</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>

                        <!-- Dropdown (Mobile Devices) -->
                        <div class="d-lg-none w-100">
                            <label class="form-label fs-11 text-muted fw-semibold mb-1">Switch Package Reward:</label>
                            <select class="form-select form-select-sm" onchange="window.location.href='{{ url('/member/income/reward-details?package=') }}' + this.value">
                                @foreach ($allRewards as $pkgVal => $slotItem)
                                    <option value="{{ $pkgVal }}" {{ $pkgVal == $curPkg ? 'selected' : '' }}>
                                        ${{ number_format($pkgVal) }} {{ $pkgVal == $myPackage ? '(Your Active Package)' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Stat Cards -->
            <div class="row g-3 mb-4">
                <!-- My Active Package -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #1d4ed8; letter-spacing: 0.5px;">
                                    My Active Package
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(37, 99, 235, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-shield-user-line fs-18 text-primary"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format($myPackage) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(37, 99, 235, 0.15); color: #1e40af; border-radius: 6px;">
                                    Member: {{ $data['memberid'] ?? session('MEMBER_ID') }}
                                </span>
                                <span class="text-muted fs-11">{{ $data['name'] ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Downline Team Count -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #15803d; letter-spacing: 0.5px;">
                                    Downline Team ($ {{ number_format($curPkg) }}+)
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(34, 197, 94, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-team-line fs-18 text-success"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                {{ number_format($activeCount) }} <span class="fs-13 fw-normal text-muted">Members</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(34, 197, 94, 0.15); color: #166534; border-radius: 6px;">
                                    Eligible Team
                                </span>
                                <span class="text-muted fs-11">Total Counted</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Levels Achieved -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #7e22ce; letter-spacing: 0.5px;">
                                    Levels Achieved
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(147, 51, 234, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-medal-line fs-18 text-purple" style="color: #9333ea;"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                {{ $achievedCount }} <span class="fs-13 fw-normal text-muted">/ 6 Levels</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(147, 51, 234, 0.15); color: #6b21a8; border-radius: 6px;">
                                    {{ $achievedCount > 0 ? 'Reward Qualified' : 'Progressing' }}
                                </span>
                                <span class="text-muted fs-11">{{ 6 - $achievedCount }} Remaining</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Achieved Reward -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #b45309; letter-spacing: 0.5px;">
                                    Achieved Rewards
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(245, 158, 11, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-money-dollar-circle-line fs-18 text-warning"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format($totalAchievedAmount, 2) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(245, 158, 11, 0.15); color: #92400e; border-radius: 6px;">
                                    Eligible Pool
                                </span>
                                <span class="text-muted fs-11">${{ number_format($curPkg) }} Plan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Milestone Target Alert -->
            @if ($nextTargetTier)
                <div class="alert alert-primary bg-primary-transparent border-0 d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4" style="border-radius: 10px;">
                    <div class="d-flex align-items-center">
                        <i class="ri-sparkling-fill fs-20 text-primary me-2"></i>
                        <div>
                            <span class="fw-bold text-primary">Next Milestone: Level {{ $nextTargetTier['status'] + 1 }} Reward</span>
                            <span class="text-dark fs-13 ms-1">
                                — Need <strong>{{ number_format($nextTargetTier['count'] - $activeCount) }}</strong> more downline member(s) with package ${{ number_format($curPkg) }}+ to unlock <strong>${{ number_format($nextTargetTier['amount'], 2) }}</strong> reward!
                            </span>
                        </div>
                    </div>
                    <div>
                        <span class="badge bg-primary text-white px-3 py-1.5 rounded-pill fs-12 fw-semibold">
                            Target: {{ number_format($nextTargetTier['count']) }} Members
                        </span>
                    </div>
                </div>
            @else
                <div class="alert alert-success bg-success-transparent border-0 d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4" style="border-radius: 10px;">
                    <div class="d-flex align-items-center">
                        <i class="ri-trophy-fill fs-22 text-success me-2"></i>
                        <div>
                            <span class="fw-bold text-success fs-14">Congratulations!</span>
                            <span class="text-dark fs-13 ms-1">You have completed all 6 reward levels for the ${{ number_format($curPkg) }} package!</span>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Reward Milestones Table Card -->
            <div class="card custom-card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white flex-wrap gap-2">
                    <div class="d-flex align-items-center">
                        <span class="avatar avatar-sm avatar-rounded bg-primary-transparent text-primary me-2">
                            <i class="ri-award-line fs-16"></i>
                        </span>
                        <div>
                            <h5 class="card-title mb-0 fw-bold text-dark fs-15">Reward Milestones & Eligibility (Package ${{ number_format($curPkg) }})</h5>
                            <small class="text-muted fs-11">Disbursement logic based on active downline team members</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 fs-12 fw-semibold">
                            Total 6 Levels
                        </span>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive dash-table-wrapper bg-white">
                        <table id="file-export" class="table table-hover align-middle w-100 text-nowrap mb-0"
                            aria-describedby="file-export_info">
                            <thead class="dash-table-head">
                                <tr>
                                    <th class="text-center" style="width: 60px;">#</th>
                                    <th style="width: 140px;">Level / Slot</th>
                                    <th style="width: 160px;">Required Team</th>
                                    <th style="width: 160px;">Team Achieved</th>
                                    <th style="width: 220px;">Completion Progress</th>
                                    <th class="text-end" style="width: 140px;">Reward Amount</th>
                                    <th class="text-center" style="width: 160px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 1; @endphp
                                @foreach ($activeTiers as $tier)
                                    @php
                                        $levelNum = $tier['status'] + 1;
                                        $reqCount = $tier['count'];
                                        $rewAmt = $tier['amount'];
                                        $isPaid = isset($myPaid[$tier['status']]);
                                        $isAchieved = $isPaid || ($activeCount >= $reqCount);
                                        $progressPercent = $reqCount > 0 ? min(100, round(($activeCount / $reqCount) * 100, 1)) : 0;
                                        $remainingNeeded = max(0, $reqCount - $activeCount);
                                    @endphp
                                    <tr class="dash-table-row {{ $isAchieved ? 'bg-success-transparent-light' : '' }}">
                                        <!-- Row Number -->
                                        <td class="text-center fw-semibold text-muted">{{ $index }}</td>

                                        <!-- Level / Slot -->
                                        <td>
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 fw-bold fs-12 d-inline-flex align-items-center gap-1">
                                                <i class="ri-vip-crown-line fs-13"></i> Level {{ $levelNum }}
                                            </span>
                                        </td>

                                        <!-- Required Team -->
                                        <td>
                                            <div class="d-flex align-items-center gap-1.5">
                                                <i class="ri-user-shared-line text-muted fs-14"></i>
                                                <span class="fw-semibold text-dark fs-13">{{ number_format($reqCount) }}</span>
                                                <span class="text-muted fs-11">members</span>
                                            </div>
                                        </td>

                                        <!-- Team Achieved -->
                                        <td>
                                            <div class="d-flex align-items-center gap-1.5">
                                                <span class="fw-bold {{ $isAchieved ? 'text-success' : 'text-primary' }} fs-13">
                                                    {{ number_format(min($activeCount, $reqCount)) }}
                                                </span>
                                                <span class="text-muted fs-12">/ {{ number_format($reqCount) }}</span>
                                            </div>
                                        </td>

                                        <!-- Completion Progress -->
                                        <td>
                                            <div class="d-flex align-items-center gap-2" style="min-width: 180px;">
                                                <div class="progress flex-grow-1" style="height: 7px; border-radius: 4px; background-color: #e9ecef;">
                                                    <div class="progress-bar {{ $isAchieved ? 'bg-success' : ($progressPercent > 50 ? 'bg-primary' : 'bg-info') }}"
                                                         role="progressbar"
                                                         style="width: {{ $progressPercent }}%;"
                                                         aria-valuenow="{{ $progressPercent }}"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100">
                                                    </div>
                                                </div>
                                                <span class="fs-12 fw-semibold {{ $isAchieved ? 'text-success' : 'text-dark' }} text-nowrap" style="min-width: 42px;">
                                                    {{ $progressPercent }}%
                                                </span>
                                            </div>
                                        </td>

                                        <!-- Reward Amount -->
                                        <td class="text-end">
                                            <span class="fw-bold text-success fs-14">
                                                ${{ number_format($rewAmt, 2) }}
                                            </span>
                                        </td>

                                        <!-- Status Badge -->
                                        <td class="text-center">
                                            @if ($isPaid)
                                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fs-12 fw-semibold d-inline-flex align-items-center gap-1">
                                                    <i class="ri-checkbox-circle-fill fs-13"></i> Paid
                                                </span>
                                            @elseif ($isAchieved)
                                                <span class="badge bg-success text-white rounded-pill px-3 py-1 fs-12 fw-semibold d-inline-flex align-items-center gap-1 shadow-sm">
                                                    <i class="ri-check-line fs-13"></i> Eligible / Achieved
                                                </span>
                                            @else
                                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-1 fs-11 fw-medium d-inline-flex align-items-center gap-1">
                                                    <i class="ri-time-line fs-12"></i> Need {{ number_format($remainingNeeded) }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @php $index++; @endphp
                                @endforeach
                            </tbody>
                            <tfoot class="bg-light fw-bold">
                                <tr>
                                    <td colspan="2" class="text-start ps-3">Total Potential Rewards</td>
                                    <td colspan="3" class="text-muted fs-12">6 Progressive Milestones</td>
                                    <td class="text-end text-success fs-14">
                                        ${{ number_format(array_sum(array_column($activeTiers, 'amount')), 2) }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-0.5 fs-11">
                                            ${{ number_format($curPkg) }} Plan
                                        </span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Reward Disbursement Rules Card -->
            <div class="card custom-card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark fs-14 mb-2">
                        <i class="ri-information-line text-primary me-1"></i> Reward Distribution Guidelines:
                    </h6>
                    <ul class="text-muted fs-12 mb-0 ps-3" style="line-height: 1.8;">
                        <li>Rewards are calculated automatically based on your <strong>active package</strong> and the number of downline members holding package <strong>${{ number_format($curPkg) }}+</strong>.</li>
                        <li>Once your downline team reaches the required target count, your status updates to <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-0.2 fs-10">Eligible / Achieved</span>.</li>
                        <li>Eligible reward earnings are processed and disbursed into your main wallet via the automated distribution schedule.</li>
                        <li>Each reward tier is credited once per package level.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

@endsection
