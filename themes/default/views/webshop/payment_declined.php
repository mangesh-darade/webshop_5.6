<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Declined</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container text-center mt-5">
        <div class="card shadow p-4">
            <h1 class="text-danger mb-3">😞 Payment Failed!</h1>
            <p class="lead">Payment didn’t go through. Please call <span style="color: #fa8507; text-decoration: underline;">+97143403346</span>  for placing your order.</p>
            <!-- <p class="lead">Sorry, your payment could not be processed.</p> -->
            <p>Please try again.</p>
            <div class="text-center">
            <a href="<?= base_url('webshop/checkout') ?>" class="btn mt-4"
                style="background-color: #fa8507; color: #fff; min-height: 40px; line-height: 40px; width: 50%; border: none;">
                Back To Order
            </a>
        </div>
        </div>
    </div>

</body>
<!-- Payment didn’t go through. Please call <Phone No> for placing your order. -->
</html>
