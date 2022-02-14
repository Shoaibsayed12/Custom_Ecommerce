<?php

require('config.php');
include "db.php";
session_start();
$order_id = $_SESSION['order_detail_id'];

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{   

   
$qry = mysqli_query($connect,"SELECT * from order_details WHERE id  ='$order_id'");

$data = mysqli_fetch_array($qry); 


  $edit = mysqli_query($connect,"UPDATE order_details SET status ='processing' WHERE id  ='$order_id'");




    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
             ?>
             <form method="POST" action="index.php">
        	<input type="submit" name="back" style="margin-top:5px;" class="btn" value="Back to homepage">

				</form>
                <?php
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
