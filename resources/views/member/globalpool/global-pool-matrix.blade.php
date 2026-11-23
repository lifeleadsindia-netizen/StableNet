@extends('member.layouts.main')
@section('title', 'Global Pool Matrix')
@section('container')

    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h1 class="page-title fw-semibold fs-18 mb-1">Global Pool Matrix</h1>
                    <p class="text-muted fs-12 mb-0">10-Level autopool 2x matrix distribution and real-time level progress</p>
                </div>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Global Pool Section</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Global Pool Matrix</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @php
                $activePoolId = $pool_id ?? 1;
                $activeSlot = $currentSlot ?? ($slots[$activePoolId] ?? ['name' => 'Slot 1 ($5)', 'price' => '$5', 'value' => 5]);
                $totalMatrixMembers = array_sum($array);
                $totalMatrixIncome = array_sum($amount);
                $perMemberIncome = $poolAmount ?? (($activeSlot['value'] ?? 5) * 0.03);
            @endphp

            <!-- Slot Selection Toolbar Card -->
            <div class="card custom-card shadow-sm border-0 mb-4" style="border-radius: 14px;">
                <div class="card-body p-3">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-sm rounded-circle bg-primary-transparent text-primary me-2.5 d-flex align-items-center justify-content-center">
                                <i class="ri-apps-2-line fs-16"></i>
                            </div>
                            <div>
                                <span class="fs-11 text-muted text-uppercase fw-semibold d-block">Selected Autopool</span>
                                <h6 class="fw-bold mb-0 text-dark">{{ $activeSlot['name'] }} Matrix</h6>
                            </div>
                        </div>

                        <!-- Slot Navigation Pills (Desktop & Tablet) -->
                        <div class="d-none d-lg-flex flex-wrap gap-1.5">
                            @foreach ($slots as $sId => $slotItem)
                                <a href="{{ url('/member/globalpool/globalpool-matrix/' . $sId) }}"
                                   class="btn btn-sm px-2.5 py-1.5 fw-semibold {{ $sId == $activePoolId ? 'btn-primary shadow-sm' : 'btn-outline-light text-dark bg-light border-0' }}"
                                   style="border-radius: 8px; font-size: 11.5px;">
                                    {{ $slotItem['name'] }}
                                </a>
                            @endforeach
                        </div>

                        <!-- Dropdown (Mobile Devices) -->
                        <div class="d-lg-none w-100">
                            <label class="form-label fs-11 text-muted fw-semibold mb-1">Switch Pool Slot:</label>
                            <select class="form-select form-select-sm" onchange="window.location.href='{{ url('/member/globalpool/globalpool-matrix') }}/' + this.value">
                                @foreach ($slots as $sId => $slotItem)
                                    <option value="{{ $sId }}" {{ $sId == $activePoolId ? 'selected' : '' }}>
                                        {{ $slotItem['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Stat Cards -->
            <div class="row g-3 mb-4">
                <!-- Total Matrix Members -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #15803d; letter-spacing: 0.5px;">
                                    Total Matrix Team
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(34, 197, 94, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-user-follow-line fs-18 text-success"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                {{ number_format($totalMatrixMembers) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(34, 197, 94, 0.15); color: #166534; border-radius: 6px;">
                                    Capacity: 2,046
                                </span>
                                <span class="text-muted fs-11">Levels 1-10</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Matrix Income Earned -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #1d4ed8; letter-spacing: 0.5px;">
                                    Earned in {{ $activeSlot['name'] }}
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(59, 130, 246, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-wallet-3-line fs-18 text-primary"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format($totalMatrixIncome, 2) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(59, 130, 246, 0.15); color: #1e40af; border-radius: 6px;">
                                    Wallet Credited
                                </span>
                                <span class="text-muted fs-11">Real-Time</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Income Rate Per Member -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #7e22ce; letter-spacing: 0.5px;">
                                    Rate Per Member
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(168, 85, 247, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-percent-line fs-18" style="color: #9333ea;"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format($perMemberIncome, 2) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(168, 85, 247, 0.15); color: #6b21a8; border-radius: 6px;">
                                    3% of {{ $activeSlot['price'] }}
                                </span>
                                <span class="text-muted fs-11">Each Downline</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Max Pool Potential -->
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="card custom-card border-0 shadow-sm h-100 overflow-hidden"
                        style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); border-radius: 14px;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="fs-12 fw-semibold text-uppercase tracking-wider" style="color: #b45309; letter-spacing: 0.5px;">
                                    Total Potential
                                </span>
                                <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center"
                                    style="background: rgba(245, 158, 11, 0.2); width: 34px; height: 34px;">
                                    <i class="ri-trophy-line fs-18 text-warning"></i>
                                </div>
                            </div>
                            <div class="fs-22 fw-bold text-dark mb-1">
                                ${{ number_format(2046 * $perMemberIncome, 2) }}
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge px-2 py-0.5 fs-11 fw-medium"
                                    style="background: rgba(245, 158, 11, 0.15); color: #92400e; border-radius: 6px;">
                                    10-Level Cap
                                </span>
                                <span class="text-muted fs-11">100% Fill</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Matrix Breakdown Table Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card custom-card shadow-sm border-0" style="border-radius: 14px;">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom py-3">
                            <div class="card-title mb-0 d-flex align-items-center">
                                <i class="ri-node-tree text-primary me-2 fs-18"></i>
                                <span class="fw-bold fs-15">{{ $activeSlot['name'] }} Matrix Levels Progression</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-light text-dark border px-2.5 py-1 fs-12">
                                    <i class="ri-user-shared-line me-1 text-primary"></i> 2x Binary Matrix
                                </span>
                                <a href="{{ url('/member/globalpool/globalpool-members/' . $activePoolId . '/' . $activeSlot['value']) }}"
                                   class="btn btn-sm btn-primary-transparent fw-semibold fs-12">
                                    <i class="ri-team-line me-1"></i> View Tree Members
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table id="file-export" class="table table-bordered table-hover text-nowrap w-100 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 70px;">Level</th>
                                            <th>Required Capacity</th>
                                            <th>Members Achieved</th>
                                            <th style="min-width: 180px;">Completion Progress</th>
                                            <th>Income Rate</th>
                                            <th>Total Earned</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($l = 1; $l <= 10; $l++)
                                            @php
                                                $required = pow(2, $l);
                                                $achieved = $array[$l] ?? 0;
                                                $percent = min(100, round(($achieved / $required) * 100));
                                                $lvlIncome = $amount[$l] ?? 0;
                                            @endphp
                                            <tr>
                                                <td class="text-center" data-order="{{ sprintf('%02d', $l) }}" data-sort="{{ sprintf('%02d', $l) }}">
                                                    <span class="badge bg-primary-transparent text-primary px-2.5 py-1 fs-12 fw-bold">
                                                        Level {{ $l }}
                                                    </span>
                                                </td>
                                                <td data-order="{{ $required }}" data-sort="{{ $required }}">
                                                    <span class="fw-semibold text-dark">{{ number_format($required) }}</span>
                                                    <span class="text-muted fs-11">members</span>
                                                </td>
                                                <td data-order="{{ $achieved }}" data-sort="{{ $achieved }}">
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-bold fs-13 {{ $achieved > 0 ? 'text-primary' : 'text-muted' }}">
                                                            {{ number_format($achieved) }}
                                                        </span>
                                                        <span class="text-muted fs-11 ms-1">/ {{ number_format($required) }}</span>
                                                    </div>
                                                </td>
                                                <td data-order="{{ $percent }}" data-sort="{{ $percent }}">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="progress progress-xs flex-grow-1" style="height: 6px; border-radius: 10px; background: #e2e8f0;">
                                                            <div class="progress-bar {{ $percent >= 100 ? 'bg-success' : 'bg-primary' }}"
                                                                 role="progressbar" style="width: {{ $percent }}%"
                                                                 aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="fs-11 fw-semibold {{ $percent >= 100 ? 'text-success' : 'text-secondary' }}" style="min-width: 38px;">
                                                            {{ $percent }}%
                                                        </span>
                                                    </div>
                                                </td>
                                                <td data-order="{{ $perMemberIncome }}" data-sort="{{ $perMemberIncome }}">
                                                    <span class="badge bg-light text-secondary border px-2 py-1 fs-11 fw-medium">
                                                        ${{ number_format($perMemberIncome, 2) }} / member
                                                    </span>
                                                </td>
                                                <td data-order="{{ $lvlIncome }}" data-sort="{{ $lvlIncome }}">
                                                    <span class="badge bg-success-transparent text-success px-2.5 py-1.5 fs-12 fw-bold">
                                                        ${{ number_format($lvlIncome, 2) }}
                                                    </span>
                                                </td>
                                                <td class="text-center" data-order="{{ $achieved >= $required ? 2 : ($achieved > 0 ? 1 : 0) }}">
                                                    @if ($achieved >= $required)
                                                        <span class="badge bg-success text-white px-2.5 py-1 fs-11 fw-semibold">
                                                            <i class="ri-checkbox-circle-line me-1"></i> Completed
                                                        </span>
                                                    @elseif ($achieved > 0)
                                                        <span class="badge bg-info-transparent text-info px-2.5 py-1 fs-11 fw-semibold">
                                                            <i class="ri-loader-4-line ri-spin me-1"></i> In Progress
                                                        </span>
                                                    @else
                                                        <span class="badge bg-light text-muted border px-2.5 py-1 fs-11">
                                                            Pending
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                    <tfoot class="table-light">
                                        <tr class="fw-bold">
                                            <td class="text-center">Total</td>
                                            <td>2,046 Members</td>
                                            <td>{{ number_format($totalMatrixMembers) }} Members</td>
                                            <td>
                                                @php
                                                    $overallPercent = min(100, round(($totalMatrixMembers / 2046) * 100, 1));
                                                @endphp
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress progress-xs flex-grow-1" style="height: 6px; border-radius: 10px; background: #cbd5e1;">
                                                        <div class="progress-bar bg-success" style="width: {{ $overallPercent }}%"></div>
                                                    </div>
                                                    <span class="fs-11 fw-bold text-success">{{ $overallPercent }}%</span>
                                                </div>
                                            </td>
                                            <td>3% per level</td>
                                            <td>
                                                <span class="badge bg-success text-white px-3 py-1.5 fs-13 fw-bold">
                                                    ${{ number_format($totalMatrixIncome, 2) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-muted fs-12">10 Levels</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
