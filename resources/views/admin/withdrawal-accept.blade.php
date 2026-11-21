@extends('admin.layouts.main')
@section('title', 'Process Online Withdrawal')
@section('container')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header Banner with Highlighted Background -->
            <div class="row mb-4 mt-2">
                <div class="col-12">
                    <div class="card custom-card page-highlight-header mb-0">
                        <div class="card-body p-4">
                            <div class="d-md-flex d-block align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="header-icon-box me-3">
                                        <span class="avatar avatar-lg avatar-rounded avatar-teal">
                                            <i class="bx bx-broadcast fs-24"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h4 class="fw-bold mb-0 text-dark">Online Crypto Withdrawal</h4>
                                            <span class="badge bg-teal-subtle text-teal border border-teal-subtle rounded-pill px-2.5 py-0.5 fs-12 fw-semibold">
                                                Web3 Payout Gateway
                                            </span>
                                        </div>
                                        <p class="text-muted fs-13 mb-0">Disburse USDT / crypto tokens directly to member's on-chain wallet address via smart contract</p>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-3 d-flex align-items-center gap-3">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-primary"><i class="bx bx-home-alt me-1"></i>Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ url('/admin/new-withdrawal-request') }}" class="text-muted">Payment Management</a></li>
                                            <li class="breadcrumb-item active text-muted" aria-current="page">Online Payout</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alerts Section -->
            @if (session()->has('uploadMsg'))
                <div class="alert custom-alert custom-alert-success alert-dismissible fade show d-flex align-items-center justify-content-between mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-check-circle fs-20 me-2 text-success"></i>
                        <span>{{ session('uploadMsg') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-xl-6 col-lg-7">
                    <div class="card custom-card card-heavy">
                        <div class="card-header border-bottom py-3 px-4 d-flex align-items-center justify-content-between bg-white">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-sm avatar-rounded avatar-teal me-2">
                                    <i class="bx bx-send fs-16"></i>
                                </span>
                                <div>
                                    <h5 class="card-title mb-0 fw-bold text-dark fs-15">Disburse Crypto Payout</h5>
                                    <small class="text-muted fs-11">Verify destination address and transfer tokens</small>
                                </div>
                            </div>
                            <span class="badge bg-teal-subtle text-teal border border-teal-subtle rounded-pill px-3 py-1 fs-11 fw-semibold">
                                <i class="bx bx-shield-check me-1"></i>Web3 Signer
                            </span>
                        </div>

                        <div class="card-body p-4">
                            <div class="mb-3">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-user text-primary me-1"></i> Member ID
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-id-card fs-16"></i></span>
                                    <input type="text" class="form-control bg-light" id="memberid" name="memberid"
                                        value="{{ $wdata['memberid'] }}" readonly>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-wallet text-primary me-1"></i> Recipient Wallet Address
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-wallet-alt fs-16"></i></span>
                                    <input type="text" class="form-control bg-light font-monospace" id="memberWallet" name="wallet"
                                        value="{{ $wdata['wallet_address'] }}" readonly>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-dollar-circle text-primary me-1"></i> Net Payout Amount (Tokens)
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-dollar fs-16"></i></span>
                                    <input type="text" class="form-control bg-light fw-bold text-success fs-15" id="withAmount" name="net_amount"
                                        value="{{ $wdata['net_amount'] * ($rate['rate'] ?? 1) }}" readonly>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label-custom fw-semibold mb-1">
                                    <i class="bx bx-key text-primary me-1"></i> Admin Sender Private Key <span class="text-danger">*</span>
                                </label>
                                <div class="input-group filter-input-group">
                                    <span class="input-group-text"><i class="bx bx-lock-alt fs-16"></i></span>
                                    <input type="password" name="key" class="form-control font-monospace" id="keyPrivate"
                                        placeholder="Enter Sender Wallet Private Key" autocomplete="off">
                                </div>
                                <small class="text-muted fs-11 mt-1 d-block">Used strictly client-side to sign the transaction via ethers.js</small>
                            </div>

                            <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                            <input type="hidden" id="withId" value="{{ $wdata['id'] }}">

                            <div class="d-flex align-items-center justify-content-between pt-3 border-top">
                                <a href="{{ url('admin/new-withdrawal-request') }}" class="btn btn-light border px-4 py-2">
                                    <i class="bx bx-arrow-back me-1"></i> Back to Queue
                                </a>
                                <button type="button" class="btn btn-signin withdrawBtn px-4 py-2 d-inline-flex align-items-center gap-1 shadow-sm" id="withdrawBtn">
                                    <i class="bx bx-send fs-15"></i> Send Tokens Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Web3 Instructions Card -->
                <div class="col-xl-6 col-lg-5">
                    <div class="card custom-card card-heavy mb-4">
                        <div class="card-header border-bottom py-3 px-4 bg-white">
                            <h6 class="fw-bold text-dark mb-0 fs-14 d-flex align-items-center gap-2">
                                <i class="bx bx-info-circle text-primary fs-18"></i> Blockchain Payout Notice
                            </h6>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-3 fs-13 text-muted">
                                <li class="d-flex align-items-start gap-2">
                                    <i class="bx bx-check-circle text-success fs-18 mt-0.5"></i>
                                    <div>
                                        <strong class="text-dark d-block">Network Verification:</strong>
                                        Ensure your connected Web3 browser wallet (MetaMask) is active on the Binance Smart Chain (BSC Network, Chain ID 56 or 97).
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-2">
                                    <i class="bx bx-check-circle text-success fs-18 mt-0.5"></i>
                                    <div>
                                        <strong class="text-dark d-block">Automated Status Update:</strong>
                                        Upon successful on-chain transaction confirmation, the transaction hash is automatically logged and the withdrawal marked as <strong>Approved</strong>.
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-2">
                                    <i class="bx bx-check-circle text-success fs-18 mt-0.5"></i>
                                    <div>
                                        <strong class="text-dark d-block">Network Gas:</strong>
                                        Ensure the sender wallet has sufficient BNB for gas fees before executing transfer.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ethers/5.7.2/ethers.umd.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        const contractAddress = "0x55d398326f99059ff775485246999027b3197955";
        const tokenAbi = [
            {
                inputs: [],
                name: "decimals",
                outputs: [{ internalType: "uint8", name: "", type: "uint8" }],
                stateMutability: "view",
                type: "function",
            },
            {
                inputs: [
                    { internalType: "address", name: "to", type: "address" },
                    { internalType: "uint256", name: "amount", type: "uint256" }
                ],
                name: "transfer",
                outputs: [{ internalType: "bool", name: "", type: "bool" }],
                stateMutability: "nonpayable",
                type: "function",
            }
        ];

        const withdrawBtn = document.querySelector("#withdrawBtn");
        const memid = document.querySelector("#memberid");
        const memberWallet = document.querySelector("#memberWallet");
        const withAmount = document.querySelector("#withAmount");
        const keyPrivate = document.querySelector("#keyPrivate");
        const csrf = document.querySelector("#csrf");
        const withId = document.querySelector("#withId");

        async function withdrawl() {
            const memberid = memid.value;
            withdrawBtn.disabled = true;
            withdrawBtn.innerHTML = '<i class="bx bx-loader-alt bx-spin me-1"></i> Processing...';

            try {
                if (!window.ethereum) {
                    withdrawBtn.disabled = false;
                    withdrawBtn.innerHTML = '<i class="bx bx-send fs-15"></i> Send Tokens Now';
                    return swal("Error", "Please connect a Web3 wallet (e.g. MetaMask)", "error");
                }
                if (!keyPrivate.value) {
                    withdrawBtn.disabled = false;
                    withdrawBtn.innerHTML = '<i class="bx bx-send fs-15"></i> Send Tokens Now';
                    return swal("Error", "Please enter the private key of the sender wallet", "error");
                }
                if (!memberWallet.value) {
                    withdrawBtn.disabled = false;
                    withdrawBtn.innerHTML = '<i class="bx bx-send fs-15"></i> Send Tokens Now';
                    return swal("Error", "No recipient wallet address found", "error");
                }
                if (!withAmount.value) {
                    withdrawBtn.disabled = false;
                    withdrawBtn.innerHTML = '<i class="bx bx-send fs-15"></i> Send Tokens Now';
                    return swal("Error", "No withdrawal amount found", "error");
                }

                const privateKey = keyPrivate.value;
                const userAddress = memberWallet.value;
                const amount = withAmount.value;

                let tokenAddress = "0x55d398326f99059ff775485246999027b3197955";

                await window.ethereum.request({ method: "eth_requestAccounts" });

                const provider = new ethers.providers.Web3Provider(window.ethereum);
                const signer = new ethers.Wallet(privateKey, provider);
                const contract = new ethers.Contract(tokenAddress, tokenAbi, signer);
                const gasLimit = 150000;
                const gasPrice = ethers.utils.parseUnits("5", "gwei");

                const tx = await contract.transfer(
                    userAddress,
                    ethers.utils.parseEther(amount),
                    { gasLimit: gasLimit, gasPrice: gasPrice }
                );

                await tx.wait();
                const wallet = userAddress;
                const txnid = tx.hash;

                $.ajax({
                    url: "{{ route('withdrawalAccept') }}",
                    type: 'POST',
                    data: {
                        'memberid': memberid,
                        'amount': amount,
                        'wallet': wallet,
                        'txnid': txnid,
                        'wid': withId.value,
                        '_token': csrf.value,
                    },
                    success: function(response) {
                        swal("Completed", "Withdrawal has been processed and logged successfully!", "success")
                            .then(function() {
                                window.location.href = "{{ url('admin/new-withdrawal-request') }}";
                            });
                    },
                    error: function() {
                        swal("Warning", "Blockchain transfer succeeded (" + txnid + "), but server sync encountered an issue. Please check logs.", "warning");
                    }
                });
            } catch (error) {
                console.error(error);
                withdrawBtn.disabled = false;
                withdrawBtn.innerHTML = '<i class="bx bx-send fs-15"></i> Send Tokens Now';
                swal("Transaction Error", error.message || "Failed to process withdrawal", "error");
            }
        }

        withdrawBtn.onclick = withdrawl;
    </script>
@endsection
