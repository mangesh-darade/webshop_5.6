<!-- application/views/payment_success.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Successful</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container text-center mt-5">
        <div class="card shadow p-4">
            <h1 class="text-success mb-3">🎉 Payment Successful!</h1>
            <p class="lead">Thank you for your purchase.</p>

            <div class="text-start mt-4" style ="display : none;">
                <p><strong>Order ID:</strong> <?= htmlspecialchars(isset($order_id) ? $order_id : '') ?></p>
                <p><strong>Amount Paid:</strong> ₹<?= htmlspecialchars(isset($amount) ? $amount : '') ?></p>
                <p><strong>Status:</strong> <?= htmlspecialchars(isset($order_status) ? $order_status : '') ?></p>
            </div>
            <!-- <a href="<?= base_url('webshop') ?>" class="btn btn-primary mt-4">Continue Shopping</a> -->
            <div class="text-center">
            <a href="<?= base_url('webshop') ?>" class="btn mt-4"
                style="background-color: #fa8507; color: #fff; min-height: 40px; line-height: 40px; border: none;">
                Continue Ordering
            </a>
        </div>
        </div>
    </div>

</body>

</html>