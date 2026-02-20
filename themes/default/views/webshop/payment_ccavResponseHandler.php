<?php
error_reporting(0);

?>


<?php
$pageTitle = "Payment Status ";
$menuGroup = "Payment Status ";
$menuPage = "Payment Status ";
?>


<!-- main area -->
<div class="main-content">
    <div class="panel">
        <div class="panel-heading border">
            <ol class="breadcrumb mb0 no-padding">
                <li><?php echo $menuGroup; ?></li>
                <li class="active">Thank You!</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="widget bg-white">
                    <div class="row row-margin">
                        <span class="col-md-10">

                            <?php
                            if ($order_status === "Success") {
                                $institutionObj = new Institution ();
                                if (empty($paymentStatus)) {
                                    $staffObj = new Staff ();
                                    $numberOfSms = $responseMap ['amount'] / SMS_COST;
                                    $newSmsCredit = $numberOfSms + $currentInstitution [0] ["sms_credit"];
                                    $institutionObj->updateSmsCredit($newSmsCredit, $currentInstitution [0] ["id"]);

                                    $pymtOrderObj = new PymtOrder ();
                                    $pymtOrderObj->updateSmsCredit($newSmsCredit, $responseMap ["order_id"]);
                                }
                                $instNow = $institutionObj->getByID($currentInstitution [0] ["id"]);
                                echo "Thank you for shopping with us. Your transaction is successful and the Order ID is " . $responseMap ['order_id'] .
                                ". Your current SMS credit balance is " . $instNow [0] ["sms_credit"] . ".";
                            } else if ($order_status === "Aborted") {
                                echo "Thank you for shopping with us. We will keep you posted regarding the status of your order.";
                            } else if ($order_status === "Failure") {
                                echo "Thank you for shopping with us. However, the transaction has been declined.";
                            } else {
                                echo "Security Error. Illegal access detected";
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /main area -->

