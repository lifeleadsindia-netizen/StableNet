@extends('member.layouts.main')
@section('title', 'Geneology')
@section('container')

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header Banner -->
            <div class="page-highlight-header d-flex flex-wrap align-items-center justify-content-between mb-4 mt-2">
                <div class="d-flex align-items-center gap-3">
                    <div class="header-icon-box">
                        <i class="bx bx-git-repo-forked fs-22"></i>
                    </div>
                    <div>
                        <h1 class="page-title fw-bold fs-18 mb-1">Genealogy Tree</h1>
                        <p class="text-muted fs-12 mb-0">Visual downline hierarchy, active direct lines & team performance</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 fs-12">
                            <li class="breadcrumb-item"><a href="{{ url('/member/dashboard') }}" class="text-muted"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-muted">My Referral</a></li>
                            <li class="breadcrumb-item active text-primary fw-semibold" aria-current="page">Geneology</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @if (session()->has('failedMsg'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 shadow-sm" role="alert">
                    <i class="bx bx-error-circle fs-18"></i>
                    <div>{{ session('failedMsg') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Controls & Legend Bar -->
            <div class="card custom-card border mb-3 shadow-sm">
                <div class="card-body p-3">
                    <div class="row g-3 align-items-center justify-content-between">
                        <!-- Search Form -->
                        <div class="col-lg-5 col-md-6 col-12">
                            <form action="{{ route('searchGenelogy') }}" method="post" class="d-flex gap-2">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-light border-end-0 text-muted">
                                        <i class="bx bx-search"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-sm border-start-0 ps-0"
                                        placeholder="Enter Member ID (e.g. SC1234567)" name="searchid" maxlength="8"
                                        minlength="8" required>
                                    <button class="btn btn-sm btn-primary px-3 fw-medium" type="submit">
                                        Search
                                    </button>
                                </div>
                                @if (session('MEMBER_ID') != $d_data['memberid'])
                                    <a href="{{ url('/member/team/geneology') }}" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1 text-nowrap" title="Reset to your root tree">
                                        <i class="bx bx-refresh"></i> My Tree
                                    </a>
                                @endif
                            </form>
                        </div>

                        <!-- Legend & Zoom Tools -->
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="d-flex flex-wrap align-items-center justify-content-md-end gap-3">
                                <!-- Legend Indicators -->
                                <div class="d-flex align-items-center gap-2 fs-12">
                                    <span class="d-inline-flex align-items-center gap-1">
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1"><i class="bx bxs-crown fs-8 me-1"></i>Root</span>
                                    </span>
                                    <span class="d-inline-flex align-items-center gap-1">
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1"><i class="bx bxs-circle fs-8 text-success me-1"></i>Active</span>
                                    </span>
                                    <span class="d-inline-flex align-items-center gap-1">
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1"><i class="bx bxs-circle fs-8 text-danger me-1"></i>Inactive</span>
                                    </span>
                                </div>

                                <!-- Zoom Controls -->
                                <div class="btn-group btn-group-sm" role="group" aria-label="Zoom controls">
                                    <button type="button" class="btn btn-outline-light border text-dark" onclick="zoomTree(-0.1)" title="Zoom Out"><i class="bx bx-minus"></i></button>
                                    <button type="button" class="btn btn-outline-light border text-dark px-2 fs-11 fw-semibold disabled" id="zoom-percentage">100%</button>
                                    <button type="button" class="btn btn-outline-light border text-dark" onclick="zoomTree(0.1)" title="Zoom In"><i class="bx bx-plus"></i></button>
                                    <button type="button" class="btn btn-outline-light border text-dark" onclick="resetZoomTree()" title="Reset Zoom"><i class="bx bx-reset"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tree Canvas Container -->
            <div class="card custom-card genealogy-wrapper-card shadow-sm mb-4">
                <div class="card-body p-0">
                    <div class="genealogy-canvas genealogy-scroll">
                        <div class="genealogy-tree-container" id="treeCanvasContainer">
                            <div class="genealogy-tree">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                @include('member.levels.card-node', ['member' => $d_data, 'isRoot' => true])
                                            </div>
                                        </a>

                                        @if (getDirectCount($d_data['memberid']) > 0)
                                            <ul class="active">
                                                @foreach ($directs as $item)
                                                    <li style="padding-top:0px !important;">
                                                        <a href="javascript:void(0);">
                                                            <div class="member-view-box">
                                                                @include('member.levels.card-node', ['member' => $item, 'isRoot' => false])
                                                            </div>
                                                        </a>

                                                        @if (getDirectCount($item['memberid'] ?? $item->memberid) > 0)
                                                            <ul style="padding-top:0px !important;">
                                                                @php
                                                                    $directs_2 = getLevelData($item['memberid'] ?? $item->memberid);
                                                                @endphp
                                                                @foreach ($directs_2 as $item_2)
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <div class="member-view-box">
                                                                                @include('member.levels.card-node', ['member' => $item_2, 'isRoot' => false])
                                                                            </div>
                                                                        </a>

                                                                        @if (getDirectCount($item_2['memberid'] ?? $item_2->memberid) > 0)
                                                                            <ul style="padding-top:0px !important;">
                                                                                @php
                                                                                    $directs_3 = getLevelData($item_2['memberid'] ?? $item_2->memberid);
                                                                                @endphp
                                                                                @foreach ($directs_3 as $item_3)
                                                                                    <li>
                                                                                        <a href="javascript:void(0);">
                                                                                            <div class="member-view-box">
                                                                                                @include('member.levels.card-node', ['member' => $item_3, 'isRoot' => false])
                                                                                            </div>
                                                                                        </a>

                                                                                        @if (getDirectCount($item_3['memberid'] ?? $item_3->memberid) > 0)
                                                                                            <ul style="padding-top:0px !important;">
                                                                                                @php
                                                                                                    $directs_4 = getLevelData($item_3['memberid'] ?? $item_3->memberid);
                                                                                                @endphp
                                                                                                @foreach ($directs_4 as $item_4)
                                                                                                    <li>
                                                                                                        <a href="javascript:void(0);">
                                                                                                            <div class="member-view-box">
                                                                                                                @include('member.levels.card-node', ['member' => $item_4, 'isRoot' => false])
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

    <script>
        let currentTreeScale = 1;
        function zoomTree(delta) {
            currentTreeScale = Math.min(Math.max(0.4, currentTreeScale + delta), 1.5);
            const container = document.getElementById('treeCanvasContainer');
            if (container) {
                container.style.transform = `scale(${currentTreeScale})`;
                container.style.transformOrigin = 'top center';
            }
            const badge = document.getElementById('zoom-percentage');
            if (badge) {
                badge.textContent = Math.round(currentTreeScale * 100) + '%';
            }
        }
        function resetZoomTree() {
            currentTreeScale = 1;
            const container = document.getElementById('treeCanvasContainer');
            if (container) {
                container.style.transform = 'scale(1)';
            }
            const badge = document.getElementById('zoom-percentage');
            if (badge) {
                badge.textContent = '100%';
            }
        }
    </script>

@endsection
