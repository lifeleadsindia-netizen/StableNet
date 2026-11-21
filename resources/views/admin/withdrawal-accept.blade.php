@extends('admin.layouts.main')
@section('title', 'Withdrawal Request')
@section('container')



    <div class="main-content app-content">
        <div class="container-fluid"> <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-title fw-semibold fs-18 mb-0">Withdrawal Request</h1>
                <div class="ms-md-1 ms-0">
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Withdrawal Request</li>
                        </ol>
                    </nav>
                </div>
            </div> <!-- Page Header Close -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-md-5">
                    @if (session()->has('uploadMsg'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('uploadMsg') }}
                        </div>
                    @endif
                    <div class="card custom-card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Withdrawal Request Form') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-12 my-2">
                                <label>Memberid </label>
                                <input type="text" class="form-control" id="memberid" name="memberid"
                                    value="{{ $wdata['memberid'] }}" readonly>
                                @error('memberid')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-12 mt-3">
                                <label>Wallet Address</label>
                                <input type="text" class="form-control" id="memberWallet" name="wallet"
                                    value="{{ $wdata['wallet_address'] }}" readonly>
                                @error('wallet')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-12 mt-3">
                                <label>Net Amount</label>
                                <input type="text" class="form-control" id="withAmount" name="net_amount"
                                    value="{{ $wdata['net_amount'] * $rate['rate'] }}" readonly>
                                @error('net_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-12 mt-3">
                                <label>Private Key</label>
                                <input type="text" name="key" class="form-control" id="keyPrivate"
                                    placeholder="Enter Private Key">
                                @error('wallet')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="my-3">
                                <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                <input type="hidden" id="withId" value="{{ $wdata['id'] }}">
                                <button class="btn btn-primary float-end my-2" id="withdrawBtn">Accept Request</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <!-- Footer Start -->

    <script>
        $(document).ready(function() {
            $('#withdrawBtn').on('click', function() {
                $(this).html('Processing .......')
            })
        })
    </script>
    <script>
        const ethereumButton = document.querySelector(".enableEthereumButton");
        const sendEthButton = document.querySelector(".sendEthButton");

        let accounts = [];

        //Sending Ethereum to an address
        sendEthButton.addEventListener("click", () => {
            ethereum
                .request({
                    method: "eth_sendTransaction",
                    params: [{
                        from: accounts[0],
                        to: "0x2f318C334780961FB129D2a6c30D0763d9a5C970",
                        value: "0x29a2241af62c0000",
                        gasPrice: "0x09184e72a000",
                        gas: "0x2710",
                    }, ],
                })
                .then((txHash) => console.log(txHash))
                .catch((error) => console.error);
        });

        ethereumButton.addEventListener("click", () => {
            getAccount();
        });

        async function getAccount() {
            accounts = await ethereum.request({
                method: "eth_requestAccounts"
            });
            console.log(accounts);
            console.log("chain id", ethereum.networkVersion);
            if (ethereum.networkVersion == 97 || ethereum.networkVersion == 56) {
                ethereum
                    .request({
                        method: "eth_sendTransaction",
                        params: [{
                            from: accounts[0],
                            to: "0xbC6d9C4C20F6BAbDce7FeE44f5196d0B9733BD31",
                            value: "1A055690D9DB80000",
                            gasPrice: "0x09184e72a000",
                            gas: "0x2710",
                        }, ],
                    })
                    .then((txHash) => {
                        console.log(txHash);
                        if (txHash !== "") {
                            alert("sucessfully deposit amount");
                        }
                    })
                    .catch((error) => console.error);
            } else {
                alert("change a network to bsc");
            }
        }
    </script>
    <script>
        const contractAddress = "0x55d398326f99059ff775485246999027b3197955";
        const tokenAbi = [{
                inputs: [],
                name: "decimals",
                outputs: [{
                    internalType: "uint8",
                    name: "",
                    type: "uint8",
                }, ],
                stateMutability: "view",
                type: "function",
            },
            {
                inputs: [{
                        internalType: "address",
                        name: "to",
                        type: "address",
                    },
                    {
                        internalType: "uint256",
                        name: "amount",
                        type: "uint256",
                    },
                ],
                name: "transfer",
                outputs: [{
                    internalType: "bool",
                    name: "",
                    type: "bool",
                }, ],
                stateMutability: "nonpayable",
                type: "function",
            },
            {
                inputs: [{
                        internalType: "address",
                        name: "from",
                        type: "address",
                    },
                    {
                        internalType: "address",
                        name: "to",
                        type: "address",
                    },
                    {
                        internalType: "uint256",
                        name: "amount",
                        type: "uint256",
                    },
                ],
                name: "transferFrom",
                outputs: [{
                    internalType: "bool",
                    name: "",
                    type: "bool",
                }, ],
                stateMutability: "nonpayable",
                type: "function",
            },
            {
                inputs: [{
                        internalType: "address",
                        name: "spender",
                        type: "address",
                    },
                    {
                        internalType: "uint256",
                        name: "amount",
                        type: "uint256",
                    },
                ],
                name: "approve",
                outputs: [{
                    internalType: "bool",
                    name: "",
                    type: "bool",
                }, ],
                stateMutability: "nonpayable",
                type: "function",
            },
        ];

        const withdrawBtn = document.querySelector(".withdrawBtn");
        const memid = document.querySelector("#memberid");
        const memberWallet = document.querySelector("#memberWallet");
        const withAmount = document.querySelector("#withAmount");
        const keyPrivate = document.querySelector("#keyPrivate");
        const csrf = document.querySelector("#csrf");
        const withId = document.querySelector("#withId");


        async function withdrawl() {

            const memberid = memid.value;
            withdrawBtn.disabled = true;

            try {
                if (!window.ethereum) return swal("Error", "connect wallet", "error");
                if (!keyPrivate.value) return swal("Error", "Please enter private key of withdrawal wallet", "error");
                if (!memberWallet.value) return swal("Error", "No member wallet found", "error");
                if (!withAmount.value) return swal("Error", "No amount found", "error");

                const privateKey = keyPrivate.value;
                const userAddress = memberWallet.value;; // where to send it
                const amount = withAmount.value;; // where to send it

                let tokenAddress = "0x55d398326f99059ff775485246999027b3197955"; // Demo //Token contract address

                accounts = await ethereum.request({
                    method: "eth_requestAccounts"
                });

                const provider = new ethers.providers.Web3Provider(window?.ethereum);
                const signer = new ethers.Wallet(privateKey, provider);
                const contract = new ethers.Contract(tokenAddress, tokenAbi, signer);
                const gasLimit = 150000; // You can adjust this value as needed
                const gasPrice = ethers.utils.parseUnits("5", "gwei");
                const tx = await contract.transfer(
                    //accounts[0],
                    userAddress,
                    ethers.utils.parseEther(amount), {
                        gasLimit: gasLimit,
                        gasPrice: gasPrice,
                    }
                );


                await tx.wait();
                const wallet = userAddress;
                const txnid = tx.hash;
                $.ajax({
                    url: "{{ route('withdrawalAccept') }}",
                    type: 'POST',
                    async: false,
                    data: {
                        'memberid': memberid,
                        'amount': amount,
                        'wallet': wallet,
                        'txnid': txnid,
                        'wid': withId.value,
                        '_token': csrf.value,
                    },
                    success: function(response) {
                        swal("Completed", "Withdrawal process has been completed successfully", "success")
                            .then(function() {
                                window.location.href = "{{ url('admin/new-withdrawal-request') }}";
                            });

                    },
                    error: function() {
                        alert('error');
                    }
                });
            } catch (error) {
                console.log(error);
            }
        }

        withdrawBtn.onclick = withdrawl;
    </script>
@endsection
