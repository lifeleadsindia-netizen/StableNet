 <style>
    /* Blinking text for Live Trading */
    .blinking-text {
        color: #ffcc00;
        font-size: 20px;
        font-weight: bold;
        animation: blink 1s infinite;
    }

    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
    }

    /* Flashing Effect for Dummy Trading Data */
    .price-change {
        font-size: 22px;
        font-weight: bold;
        transition: color 0.5s, transform 0.5s;
    }

    .green-flash {
        color: #00ff00;
        transform: scale(1.1);
    }

    .red-flash {
        color: #ff0000;
        transform: scale(1.1);
    }

    /* Flashing Border for Live Charts */
    .flashing-border {
        border: 2px solid #ffcc00;
        box-shadow: 0px 0px 10px #ffcc00;
        animation: border-flash 1.5s infinite;
    }

    @keyframes border-flash {
        0% { box-shadow: 0px 0px 10px #ffcc00; }
        50% { box-shadow: 0px 0px 20px #ff6600; }
        100% { box-shadow: 0px 0px 10px #ffcc00; }
    }

    /* Buy/Sell Orders */
    .trade-box {
        background: #222;
        color: white;
        padding: 10px;
        font-size: 18px;
        border-radius: 5px;
        text-align: center;
        margin-top: 10px;
    }

    .trade-history-container {
        width: 100%;
        overflow-x: auto;
    }
    
    .trade-history-table {
        width: 100%;
        border-collapse: collapse;
        background: #222;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        overflow: hidden;
        min-width: 600px; /* Ensures the table structure remains intact */
    }

    .trade-history-table th, .trade-history-table td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #444;
        white-space: nowrap; /* Prevents text from breaking into multiple lines */
    }

    .trade-history-table th {
        background: #333;
    }

    .buy-order {
        color: #00ff00;
        font-weight: bold;
    }

    .sell-order {
        color: #ff0000;
        font-weight: bold;
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .trade-history-container {
            overflow-x: auto;
        }
        .trade-history-table {
            font-size: 14px;
        }
    }
</style>
@extends('member.layouts.main')
@section('title', 'Exchange')
@section('container')


<div class="content-body">
    <div class="container-fluid">
        <!-- AI Robo Animation -->
        <div class="text-center my-4">
            <img src="{{asset('f_assets/images/logo-full-white.png')}}" alt="Robo9" style="height: 100px; width: 100px" class="robo-animation">
        </div>

        <!-- Blinking Live Trading Text -->
        <div class="text-center mb-3">
            <span class="blinking-text">🔥 Live Trading in Progress…</span>
        </div>

        <!-- Page Header -->
        <h4 class="fw-bold py-3 mb-4 text-white">
            <span class="fw-light">{{config('detailsApp.name')}} /</span> Dashboard
        </h4>

         <!-- Live Dummy Trading Data -->
        <div class="text-center my-3" style="display:none;">
            <h4>BTC Price: <span id="btc-price" class="price-change">$30,000</span></h4>
            <h4>EUR/USD: <span id="forex-price" class="price-change">1.1000</span></h4>
        </div>

        <!-- Live Bitcoin Trading Chart -->
        <div class="card mb-4 flashing-border">
            <div class="card-header bg-dark text-white">
                <h5>Live Bitcoin Trading Chart</h5>
            </div>
            <div class="card-body">
                <iframe 
                    src="https://s.tradingview.com/widgetembed/?symbol=BINANCE:BTCUSDT&interval=1&theme=dark"
                    width="100%" height="400" frameborder="0" allowfullscreen style="border: none;">
                </iframe>
                <div class="trade-box">
                    BTC Trade: <span id="btc-trade" class="buy-order">Buy Order 0.5 BTC</span>
                </div>
            </div>
        </div>

        <!-- Live Forex Trading Chart -->
        <div class="card mb-4 flashing-border">
            <div class="card-header bg-dark text-white">
                <h5>Live Forex Trading Chart</h5>
            </div>
            <div class="card-body">
                <iframe 
                    src="https://s.tradingview.com/widgetembed/?symbol=OANDA:EURUSD&interval=1&theme=dark"
                    width="100%" height="400" frameborder="0" allowfullscreen style="border: none;">
                </iframe>
                <div class="trade-box">
                    Forex Trade: <span id="forex-trade" class="sell-order">Sell Order 1.2 Lots</span>
                </div>
            </div>
        </div>


        <!-- Forex Heat Map -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5>Forex Heat Map</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <iframe 
                            src="https://s.tradingview.com/embed-widget/forex-heat-map/?locale=en#%7B%22width%22:%22100%25%22,%22height%22:400,%22currency%22:%22USD%22%7D"
                            width="100%" height="400" frameborder="0" allowfullscreen style="border: none;">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
   
<!-- AI Robo Trade History (Last 24 Hours) -->
<div class="card mb-4">
    <div class="card-header bg-dark text-white">
       <h5 style="
    color: white;
    font-size: 15px;
">{{config('detailsApp.name')}} History (Last 24 Hours)</h5>
    </div>
    <div class="card-body trade-history-container">
        <table class="trade-history-table">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Asset</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody id="trade-history"></tbody>
        </table>
    </div>
</div>

    </div>
</div>

<script>
    function generateTradeHistory() {
        const tradeHistory = document.getElementById("trade-history");
        tradeHistory.innerHTML = "";
        const assets = ["BTC", "EUR/USD", "ETH", "GBP/USD"];
        const types = ["Buy", "Sell"];

        for (let i = 0; i < 20; i++) {
            let time = new Date(Date.now() - Math.random() * 86400000).toLocaleTimeString();
            let asset = assets[Math.floor(Math.random() * assets.length)];
            let type = types[Math.floor(Math.random() * types.length)];
            let amount = (Math.random() * 3).toFixed(2);
            let price = (Math.random() * 1000 + 20000).toFixed(2);
            let row = `<tr>
                <td>${time}</td>
                <td>${asset}</td>
                <td class="${type === 'Buy' ? 'buy-order' : 'sell-order'}">${type}</td>
                <td>${amount}</td>
                <td>$${price}</td>
            </tr>`;
            tradeHistory.innerHTML += row;
        }
    }

    setInterval(generateTradeHistory, 60000);
    generateTradeHistory();
</script>


<script>
    function updateDummyData() {
        let btcPrice = parseFloat(document.getElementById("btc-price").innerText.replace("$", ""));
        let forexPrice = parseFloat(document.getElementById("forex-price").innerText);

        let btcChange = (Math.random() * 200 - 100).toFixed(2); // Random change between -100 to +100
        let forexChange = (Math.random() * 0.01 - 0.005).toFixed(4); // Random change between -0.005 to +0.005

        let newBtcPrice = (btcPrice + parseFloat(btcChange)).toFixed(2);
        let newForexPrice = (forexPrice + parseFloat(forexChange)).toFixed(4);

        let btcElement = document.getElementById("btc-price");
        let forexElement = document.getElementById("forex-price");

        btcElement.innerText = "$" + newBtcPrice;
        forexElement.innerText = newForexPrice;

        // Add flashing effect
        if (parseFloat(btcChange) > 0) {
            btcElement.classList.add("green-flash");
            document.getElementById("btc-trade").innerHTML = `Buy Order ${(Math.random() * 2).toFixed(2)} BTC`;
            document.getElementById("btc-trade").className = "buy-order";
        } else {
            btcElement.classList.add("red-flash");
            document.getElementById("btc-trade").innerHTML = `Sell Order ${(Math.random() * 2).toFixed(2)} BTC`;
            document.getElementById("btc-trade").className = "sell-order";
        }

        if (parseFloat(forexChange) > 0) {
            forexElement.classList.add("green-flash");
            document.getElementById("forex-trade").innerHTML = `Buy Order ${(Math.random() * 3).toFixed(2)} Lots`;
            document.getElementById("forex-trade").className = "buy-order";
        } else {
            forexElement.classList.add("red-flash");
            document.getElementById("forex-trade").innerHTML = `Sell Order ${(Math.random() * 3).toFixed(2)} Lots`;
            document.getElementById("forex-trade").className = "sell-order";
        }

        setTimeout(() => btcElement.classList.remove("green-flash", "red-flash"), 500);
        setTimeout(() => forexElement.classList.remove("green-flash", "red-flash"), 500);
    }

    setInterval(updateDummyData, 2000); // Update every 2 seconds
</script>


@endsection
