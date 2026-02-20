<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Order Status</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #fff;
        color: #000;
    }

    .order-container {
        border: 1px solid #ddd;
        padding: 20px;
        max-width: 700px;
        margin: auto;
        border-radius: 8px;
    }

    h2 {
        margin: 0 0 5px;
    }

    .date {
        color: #555;
    }

    .status-header {
        display: flex;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
        margin: 20px 0 10px;
    }

    .status-header img {
        width: 25px;
        margin-right: 10px;
    }

    .progress-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 20px 0;
    }

    .step {
        text-align: center;
        flex: 1;
        position: relative;
    }

    .step:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 16px;
        right: -50%;
        width: 100%;
        height: 4px;
        background-color: #f90;
        z-index: -1;
    }

    .step.complete:not(:last-child)::after {
        background-color: #f90;
    }

    .circle {
        background: #f90;
        color: #fff;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 8px;
    }

    .step.incomplete .circle {
        background-color: #ccc;
    }

    .address {
        margin: 20px 0;
    }

    .summary {
        text-align: right;
        font-size: 16px;
    }

    .summary div {
        margin: 4px 0;
    }

    .total {
        font-weight: bold;
    }

    .button {
        background-color: #ff7900;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 20px;
        display: inline-block;
    }
    </style>
</head>

<body>
    <?php
    include_once('header.php');
    ?>
    <div class="order-container">
        <h2>Order #1234567890</h2>
        <div class="date">May 15, 2025</div>

        <div class="status-header">
            <img src="https://img.icons8.com/ios-filled/50/000000/parcel.png" alt="icon">
            Order Ready
        </div>

        <div class="progress-bar">
            <div class="step complete">
                <div class="circle">✔</div>
                <div>Received<br><small>10:30<br>May 15, 2025</small></div>
            </div>
            <div class="step complete">
                <div class="circle">✔</div>
                <div>Preparing<br><small>10:57<br>May 15, 2025</small></div>
            </div>
            <div class="step complete">
                <div class="circle">✔</div>
                <div>Ready<br><small>16:25<br>May 15, 2025</small></div>
            </div>
            <div class="step incomplete">
                <div class="circle">•</div>
                <div>En Route</div>
            </div>
            <div class="step incomplete">
                <div class="circle">•</div>
                <div>Delivered<br><small>Est. 17:30</small></div>
            </div>
        </div>

        <div class="address">
            <strong>Deliver To:</strong><br>
            Box No. 34264<br>
            Dubai - 34264
        </div>

        <div class="summary">
            <div>Order Subtotal: 1500 د.إ</div>
            <div>Delivery Fee: 50 د.إ</div>
            <div>Tax: 25 د.إ</div>
            <div class="total">Order Total: 1575 د.إ</div>
        </div>

        <button class="button">View Order Details</button>
    </div>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>