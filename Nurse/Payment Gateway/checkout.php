<?php
session_start();

require 'config.php';
require 'vendor/autoload.php';


use Razorpay\Api\Api;

if (($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $api = new Api(API_KEY,API_SECRET);  //API start

    $res = $api->order->create(
        array(
            'receipt' => 'OID'.rand(10,100).'END',
            'name' => $name,
            'currency' => 'INR'
        )
        );

        if(!empty($res['id'])){
            $_SESSION['order_id'] = $res['id'];
            ?>

        
        <form action="<?php echo BASE_URL ?>.success.php" method="POST">
            <script>
                 function startPayment() {
                src="https://checkout.razorpay.com/v1/checkout.js";
                data-key = "<?php echo API_KEY ;?>"
                data-amount = "500"          //remarks*********************
                data-currency = "INR"
                data-order_id = "<?php echo $res['id'] ;?>"
                data-buttontext = "pay with Razorpay"
                data-name="<?php echo COMPANY_NAME ;?>"
                data-description = "Thank you for payment"
                data-prefill.name = "<?php echo $name ;?>"
                data-prefill.email = "<?php echo $email ;?>"
                data-theme.color="#F37254"
                 }
            </script>
        <input type="hidden" custom="Hidden Element" name="hidden">
        </form>
            <?php

        }

}

?>
