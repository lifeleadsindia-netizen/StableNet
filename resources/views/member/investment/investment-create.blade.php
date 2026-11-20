@extends('member.layouts.main')
@section('title', 'Investment Slots')
@section('container')

    <div class="main-content app-content">
        <div class="container-lg mt-3">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h1 class="page-title fw-semibold fs-18 mb-1">Investment Slots</h1>
                    <p class="text-muted fs-12 mb-0">Activate investment slots sequentially to maximize your returns</p>
                </div>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Investment Slots</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session()->has('successMsg'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="ri-checkbox-circle-fill fs-5 me-2"></i>
                    <div>{{ session('successMsg') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('failedMsg'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="ri-error-warning-fill fs-5 me-2"></i>
                    <div>{{ session('failedMsg') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <!-- Left Column: Slot Activation Form -->
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12 mb-4">
                    <div class="card custom-card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <i class="ri-stack-line text-primary me-2"></i>Activate Investment Slot
                            </div>
                            @if (!empty($nextSlot))
                                <span class="badge bg-primary-transparent fs-12">
                                    Next: {{ $nextSlot['name'] }} ({{ $nextSlot['price'] }})
                                </span>
                            @else
                                <span class="badge bg-success-transparent fs-12">
                                    ✓ All Slots Active
                                </span>
                            @endif
                        </div>
                        <div class="card-body p-4">
                            <div id="ajaxAlertContainer"></div>
                            <form action="{{ route('createStaking') }}" method="post" id="stakingForm">
                                @csrf
                                <div class="row gy-3">
                                    <!-- Member ID -->
                                    <div class="col-12">
                                        <label for="memberid" class="form-label text-default fw-semibold">Member ID</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="ri-user-3-line"></i></span>
                                            <input type="text" class="form-control" name="memberid"
                                                value="{{ $data['memberid'] }}" readonly id="memberid" />
                                        </div>
                                        @error('memberid')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Slot Selection -->
                                    <div class="col-12">
                                        <label for="amount" class="form-label text-default fw-semibold d-flex justify-content-between">
                                            <span>Available Slot</span>
                                            <span class="text-muted fs-11">Sequential Progression</span>
                                        </label>
                                        <select class="form-select form-control" name="amount" id="amount" required {{ $allSlotsCompleted ? 'disabled' : '' }}>
                                            @if ($allSlotsCompleted)
                                                <option value="" selected>✓ All 10 Slots Activated</option>
                                            @elseif (!empty($nextSlot))
                                                <option value="{{ $nextSlot['amount'] }}" selected>
                                                    {{ $nextSlot['name'] }} ({{ $nextSlot['price'] }}) — Available
                                                </option>
                                            @else
                                                <option value="" disabled selected>No slots available</option>
                                            @endif
                                        </select>
                                        @error('amount')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Fund Wallet Balance -->
                                    <div class="col-12">
                                        <label for="fundWallet" class="form-label text-default fw-semibold d-flex justify-content-between">
                                            <span>Fund Wallet Balance</span>
                                            <a href="{{ url('member/funds/add-funds') }}" class="text-primary fs-12">Add Funds</a>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">$</span>
                                            <input type="text" class="form-control" id="fundWallet"
                                                value="{{ number_format($data['p2p_wallet'], 2) }}" readonly />
                                        </div>
                                        @if (!empty($nextSlot))
                                            @if ($data['p2p_wallet'] >= $nextSlot['amount'])
                                                <span class="text-success fs-12 mt-1 d-block">
                                                    <i class="ri-check-line"></i> Sufficient balance to activate {{ $nextSlot['name'] }} ({{ $nextSlot['price'] }})
                                                </span>
                                            @else
                                                <span class="text-danger fs-12 mt-1 d-block">
                                                    <i class="ri-alert-line"></i> Insufficient balance. Need ${{ number_format($nextSlot['amount'] - $data['p2p_wallet'], 2) }} more in Fund Wallet.
                                                </span>
                                            @endif
                                        @endif
                                    </div>

                                    <!-- Transaction Password -->
                                    <div class="col-12">
                                        <label for="txn_password" class="form-label text-default fw-semibold">Transaction Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="ri-lock-2-line"></i></span>
                                            <input type="password" class="form-control" name="txn_password"
                                                id="txn_password" placeholder="Enter Transaction Password" required {{ $allSlotsCompleted ? 'disabled' : '' }} />
                                            <button class="btn btn-light" type="button" onclick="toggleTxnPass(this)">
                                                <i class="ri-eye-off-line"></i>
                                            </button>
                                        </div>
                                        @error('txn_password')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12 mt-4">
                                        @if ($allSlotsCompleted)
                                            <button class="btn btn-success w-100 py-2 fs-15 fw-semibold" disabled>
                                                <i class="ri-checkbox-circle-line me-1"></i> All 10 Slots Fully Activated!
                                            </button>
                                        @else
                                            <button class="btn btn-primary w-100 py-2 fs-15 fw-semibold" id="subsBtn"
                                                {{ $data['p2p_wallet'] < ($nextSlot['amount'] ?? 0) ? 'disabled' : '' }}>
                                                <i class="ri-flashlight-line me-1"></i>
                                                Activate {{ $nextSlot['name'] ?? 'Slot' }} ({{ $nextSlot['price'] ?? '' }}) Now
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Visual Slot Roadmap / 10 Slots Progress -->
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12 mb-4">
                    <div class="card custom-card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <div class="card-title mb-0">
                                    <i class="ri-roadmap-line text-info me-2"></i>Slot Roadmap
                                </div>
                                <span class="text-muted fs-11">Sequential Progression (Slot 1 to 10)</span>
                            </div>
                            <span class="badge bg-info-transparent fs-12">
                                {{ $activatedCount }} / {{ $totalSlots }} Active
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <!-- Progress Bar -->
                            @php
                                $percent = round(($activatedCount / $totalSlots) * 100);
                            @endphp
                            <div class="mb-3">
                                <div class="d-flex justify-content-between fs-12 mb-1">
                                    <span class="fw-semibold">Total Progress</span>
                                    <span class="fw-bold text-primary">{{ $percent }}%</span>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $percent }}%"
                                        aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <!-- 10 Slots Cards Grid -->
                            <div class="row g-2">
                                @foreach ($slots as $slot)
                                    <div class="col-sm-6 col-12">
                                        <div class="p-3 rounded-3 border d-flex justify-content-between align-items-center
                                            @if ($slot['is_purchased'])
                                                bg-success-transparent border-success
                                            @elseif ($slot['is_next'])
                                                bg-primary-transparent border-primary shadow-sm
                                            @else
                                                bg-light border-light-subtle opacity-75
                                            @endif
                                        ">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="avatar avatar-sm rounded-circle 
                                                    @if ($slot['is_purchased'])
                                                        bg-success text-white
                                                    @elseif ($slot['is_next'])
                                                        bg-primary text-white
                                                    @else
                                                        bg-secondary-transparent text-muted
                                                    @endif
                                                ">
                                                    @if ($slot['is_purchased'])
                                                        <i class="ri-check-line"></i>
                                                    @elseif ($slot['is_next'])
                                                        <i class="ri-star-fill"></i>
                                                    @else
                                                        <i class="ri-lock-line"></i>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="fw-bold fs-13">{{ $slot['name'] }}</div>
                                                    <div class="text-muted fs-12">{{ $slot['price'] }}</div>
                                                </div>
                                            </div>
                                            <div>
                                                @if ($slot['is_purchased'])
                                                    <span class="badge bg-success fs-10">Active</span>
                                                @elseif ($slot['is_next'])
                                                    <span class="badge bg-primary fs-10">Next Slot</span>
                                                @else
                                                    <span class="badge bg-secondary-transparent text-muted fs-10">Locked</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Sequential Rules Alert Info -->
                            <div class="alert alert-info-transparent d-flex align-items-center mt-3 mb-0 fs-12 p-2">
                                <i class="ri-information-line fs-5 me-2"></i>
                                <div>
                                    <strong>Rule:</strong> Slots must be purchased one by one in sequential order starting from Slot 1 ($5). Once a slot is activated, the next slot unlocks automatically.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Processing Investment Alert Modal -->
    <div class="modal fade" id="slotProcessingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="slotProcessingModalLabel" aria-hidden="true" style="backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); background: rgba(15, 23, 42, 0.7);">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 480px;">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden text-center p-4" style="background: #ffffff;">
                <div class="modal-body p-0">
                    <!-- Animated Processing Spinner & Pulse Icon -->
                    <div class="d-flex justify-content-center my-3">
                        <div class="position-relative d-inline-flex align-items-center justify-content-center" style="width: 82px; height: 82px;">
                            <div class="spinner-border text-primary" style="width: 5rem; height: 5rem; border-width: 4px;" role="status">
                                <span class="visually-hidden">Processing...</span>
                            </div>
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <i class="ri-flashlight-fill text-warning fs-28"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Title & Subtitle in English -->
                    <h5 class="fw-bold text-dark mb-1 fs-18" id="slotProcessingModalLabel">Processing Slot Investment...</h5>
                    <p class="text-muted fs-12 mb-3">Please wait while your slot is activated and network matrix is allocated.</p>

                    <!-- Important Instructions Warning Alert Box in English -->
                    <div class="alert alert-warning border border-warning-subtle text-start p-3 mb-3 rounded-3" style="background-color: #fff9e6;">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-warning text-dark px-2 py-1 fs-11 me-2 fw-semibold">
                                <i class="ri-alert-fill me-1"></i> Important Instructions
                            </span>
                            <span class="text-warning-emphasis fw-semibold fs-12">Please Read Carefully</span>
                        </div>
                        <div class="d-flex flex-column gap-2 text-secondary fs-12">
                            <div class="d-flex align-items-start">
                                <i class="ri-close-circle-fill text-danger me-2 fs-14 mt-1 flex-shrink-0"></i>
                                <div><strong class="text-dark">Do Not Refresh:</strong> Please do not refresh or reload (F5) the page.</div>
                            </div>
                            <div class="d-flex align-items-start">
                                <i class="ri-close-circle-fill text-danger me-2 fs-14 mt-1 flex-shrink-0"></i>
                                <div><strong class="text-dark">Do Not Go Back:</strong> Please do not press the browser back button.</div>
                            </div>
                            <div class="d-flex align-items-start">
                                <i class="ri-close-circle-fill text-danger me-2 fs-14 mt-1 flex-shrink-0"></i>
                                <div><strong class="text-dark">Do Not Click Repeatedly:</strong> Transaction is currently in progress. Avoid duplicate clicks.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Animated Striped Progress Bar -->
                    <div class="progress progress-xs mb-2" style="height: 6px; border-radius: 10px; background: #e2e8f0; overflow: hidden;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-100" role="progressbar"></div>
                    </div>

                    <!-- Security & Status Footer in English -->
                    <div class="d-flex justify-content-between align-items-center text-muted fs-11 px-1">
                        <span><i class="ri-shield-check-fill text-success me-1"></i> 256-Bit Secure Processing</span>
                        <span class="text-primary fw-medium"><i class="ri-loader-4-line ri-spin me-1"></i> Processing, please wait...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleTxnPass(btn) {
            const input = document.getElementById('txn_password');
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'ri-eye-line';
            } else {
                input.type = 'password';
                icon.className = 'ri-eye-off-line';
            }
        }

        // Slot Investment Submit & Processing Alert Handler
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('stakingForm');
            const modalEl = document.getElementById('slotProcessingModal');
            const subsBtn = document.getElementById('subsBtn');
            const alertBox = document.getElementById('ajaxAlertContainer');
            let isSubmitting = false;
            let bsModal = null;

            function hideProcessingModal() {
                try {
                    if (bsModal) {
                        bsModal.hide();
                    } else if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                        const instance = bootstrap.Modal.getInstance(modalEl);
                        if (instance) instance.hide();
                    }
                } catch (e) {}

                if (typeof $ !== 'undefined') {
                    $(modalEl).modal('hide');
                }
                modalEl.classList.remove('show');
                modalEl.style.display = 'none';
                document.body.classList.remove('modal-open');
                document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                document.body.style.removeProperty('overflow');
                document.body.style.removeProperty('padding-right');
            }

            function resetSubmitButton(originalHtml) {
                isSubmitting = false;
                if (subsBtn) {
                    subsBtn.disabled = false;
                    subsBtn.innerHTML = originalHtml;
                }
                if (typeof $ !== 'undefined') {
                    $('#subsBtn').prop('disabled', false);
                }
            }

            function showErrorMessage(msg) {
                if (alertBox) {
                    alertBox.innerHTML = `
                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-3" role="alert">
                            <i class="ri-error-warning-fill fs-5 me-2"></i>
                            <div><strong>Failed:</strong> ${msg}</div>
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                } else if (typeof swal !== 'undefined') {
                    swal("Failed", msg, "error");
                } else {
                    alert(msg);
                }
            }

            if (form && modalEl) {
                const originalBtnHtml = subsBtn ? subsBtn.innerHTML : 'Activate Slot Now';

                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    if (isSubmitting) {
                        return false;
                    }

                    // Check standard HTML5 validation
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        return false;
                    }

                    isSubmitting = true;

                    // Clear any previous error alerts
                    if (alertBox) alertBox.innerHTML = '';

                    // 1. Show Processing Modal
                    if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                        try {
                            bsModal = bootstrap.Modal.getOrCreateInstance(modalEl, {
                                backdrop: 'static',
                                keyboard: false
                            });
                            bsModal.show();
                        } catch (err) {
                            $(modalEl).modal({ backdrop: 'static', keyboard: false });
                            $(modalEl).modal('show');
                        }
                    } else if (typeof $ !== 'undefined' && typeof $.fn.modal !== 'undefined') {
                        $(modalEl).modal({ backdrop: 'static', keyboard: false });
                        $(modalEl).modal('show');
                    } else {
                        modalEl.classList.add('show');
                        modalEl.style.display = 'block';
                        document.body.classList.add('modal-open');
                    }

                    // 2. Update and disable submit button
                    if (subsBtn) {
                        subsBtn.disabled = true;
                        subsBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Processing Slot Investment...';
                    }

                    // 3. Send AJAX Request to Controller
                    const formData = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(async response => {
                        const isJson = response.headers.get('content-type')?.includes('application/json');
                        const data = isJson ? await response.json() : null;

                        if (!response.ok) {
                            const err = (data && data.message) || 'Request failed with status ' + response.status;
                            throw new Error(err);
                        }
                        return data;
                    })
                    .then(data => {
                        // Immediately hide the alert window as soon as processing completes!
                        hideProcessingModal();

                        if (data && data.status) {
                            // Reload page to reflect newly active slot, updated wallet & flash success message
                            window.location.reload();
                        } else {
                            resetSubmitButton(originalBtnHtml);
                            showErrorMessage((data && data.message) || 'Activation failed. Please try again.');
                        }
                    })
                    .catch(error => {
                        // Immediately hide the alert window on error too!
                        hideProcessingModal();
                        resetSubmitButton(originalBtnHtml);
                        showErrorMessage(error.message || 'Something went wrong while processing. Please try again.');
                    });
                });
            }
        });
    </script>

@endsection
