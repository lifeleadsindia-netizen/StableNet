@php
    $mId = $member['id'] ?? ($member->id ?? '');
    $mMemberId = $member['memberid'] ?? ($member->memberid ?? '');
    $mName = $member['name'] ?? ($member->name ?? 'Member');
    $mProfileImage = $member['profile_image'] ?? ($member->profile_image ?? '');
    $mStatus = $member['status'] ?? ($member->status ?? 'Temp');
    $mSponsorId = $member['sponsorid'] ?? ($member->sponsorid ?? 'Root');
    $mPackage = (float)($member['package'] ?? ($member->package ?? 0));
    $mDownline = $member['downline'] ?? ($member->downline ?? 0);
    $mInvestment = (float)($member['investment'] ?? ($member->investment ?? 0));
    $mTeamBiz = (float)($member['team_biz'] ?? ($member->team_biz ?? 0));
    $mWallet = (float)($member['wallet'] ?? ($member->wallet ?? 0));
    $mFundWallet = (float)($member['p2p_wallet'] ?? ($member->p2p_wallet ?? 0));
    $isTemp = ($mStatus == 'Temp');
@endphp

<div class="performance-card {{ !empty($isRoot) ? 'tree-root-card' : 'tree-member-card' }} {{ $isTemp ? 'tree-card-inactive' : 'tree-card-active' }}">
    @if (!empty($isRoot))
        <span class="tree-root-tag"><i class="bx bxs-crown me-1"></i>ROOT</span>
    @endif

    <div class="member-image-wrapper">
        @if (empty($isRoot))
            <a href="{{ url('/member/team/view-geneology') }}/{{ $mId }}" class="member-avatar-link" title="Click to view {{ $mName }}'s downline tree">
                @if ($mProfileImage == '')
                    <img src="{{ asset('uploads/avatar.jpg') }}" alt="{{ $mMemberId }}" class="member-tree-avatar">
                @else
                    <img src="{{ asset('uploads') }}/{{ $mProfileImage }}" alt="{{ $mMemberId }}" class="member-tree-avatar">
                @endif
                <span class="tree-status-dot {{ $isTemp ? 'bg-danger' : 'bg-success' }}" title="{{ $isTemp ? 'Inactive' : 'Active' }}"></span>
            </a>
        @else
            @if ($mProfileImage == '')
                <img src="{{ asset('uploads/avatar.jpg') }}" alt="{{ $mMemberId }}" class="member-tree-avatar">
            @else
                <img src="{{ asset('uploads') }}/{{ $mProfileImage }}" alt="{{ $mMemberId }}" class="member-tree-avatar">
            @endif
            <span class="tree-status-dot {{ $isTemp ? 'bg-danger' : 'bg-success' }}" title="{{ $isTemp ? 'Inactive' : 'Active' }}"></span>
        @endif
    </div>

    <div class="perfomance-cont">
        <div class="tree-member-id">{{ $mMemberId }}</div>
        <div class="tree-member-name" title="{{ $mName }}">{{ $mName }}</div>
        <div class="tree-status-badge">
            @if ($isTemp)
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle"><i class="bx bxs-circle me-1"></i>Inactive</span>
            @else
                <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="bx bxs-circle me-1"></i>Active</span>
            @endif
        </div>
    </div>

    <!-- Hover Details Tooltip Popup -->
    <div class="dropdown">
        <div class="dropdown-menu performance-h-list shadow-lg">
            <div class="performance-h-title">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="text-start">
                        <h4 class="mb-0 fs-13 fw-bold text-white text-truncate" style="max-width: 170px;">{{ $mName }}</h4>
                        <span class="fs-11 font-monospace text-white-50">{{ $mMemberId }}</span>
                    </div>
                    @if ($isTemp)
                        <span class="badge bg-danger text-white fs-10 px-2 py-1 rounded-pill">Inactive</span>
                    @else
                        <span class="badge bg-success text-white fs-10 px-2 py-1 rounded-pill">Active</span>
                    @endif
                </div>
            </div>
            <div class="performance-h-cont">
                <div class="performance-h-data">
                    <h6><i class="bx bx-user-check me-1 text-primary"></i>Sponsor ID</h6>
                    <h5><span class="font-monospace fw-semibold">{{ $mSponsorId }}</span></h5>
                </div>
                <div class="performance-h-data">
                    <h6><i class="bx bx-package me-1 text-info"></i>Package</h6>
                    <h5><span class="text-primary fw-bold">$ {{ number_format($mPackage, 2) }}</span></h5>
                </div>
                <div class="performance-h-data">
                    <h6><i class="bx bx-group me-1 text-secondary"></i>Directs</h6>
                    <h5><span class="badge bg-light text-dark fw-bold border">{{ $mDownline }}</span></h5>
                </div>
                <div class="performance-h-data">
                    <h6><i class="bx bx-trending-up me-1 text-success"></i>Investment</h6>
                    <h5><span class="text-success fw-bold">$ {{ number_format($mInvestment, 2) }}</span></h5>
                </div>
                <div class="performance-h-data">
                    <h6><i class="bx bx-bar-chart-alt-2 me-1 text-warning"></i>Team Biz</h6>
                    <h5><span class="text-dark fw-bold">$ {{ number_format($mTeamBiz, 2) }}</span></h5>
                </div>
                <div class="performance-h-data">
                    <h6><i class="bx bx-wallet me-1 text-primary"></i>Wallet</h6>
                    <h5><span class="text-primary fw-semibold">$ {{ number_format($mWallet, 2) }}</span></h5>
                </div>
                <div class="performance-h-data">
                    <h6><i class="bx bx-wallet-alt me-1 text-success"></i>Fund Wallet</h6>
                    <h5><span class="text-success fw-semibold">$ {{ number_format($mFundWallet, 2) }}</span></h5>
                </div>
                @if (empty($isRoot))
                    <div class="mt-2 pt-2 border-top text-center">
                        <a href="{{ url('/member/team/view-geneology') }}/{{ $mId }}" class="btn btn-sm btn-primary w-100 py-1 fs-11 rounded-pill d-inline-flex align-items-center justify-content-center gap-1 shadow-sm">
                            <i class="bx bx-git-repo-forked"></i> View Downline Tree
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
