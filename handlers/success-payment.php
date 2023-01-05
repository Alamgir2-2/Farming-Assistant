<?php
session_start();
include_once 'DatabaseEdited.php';
include_once '../classes/order.php';
$db = EDatabase::getInstance();

$val_id = urlencode($_POST['val_id']);
$store_id = urlencode("farmi631cb64938d85");
$store_passwd = urlencode("farmi631cb64938d85@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code == 200 && !(curl_errno($handle))) {

    # TO CONVERT AS ARRAY
    # $result = json_decode($result, true);
    # $status = $result['status'];

    # TO CONVERT AS OBJECT
    $result = json_decode($result);

    # TRANSACTION INFO
    echo   $status = $result->status;
    echo   $tran_date = $result->tran_date;
    echo  $tran_id = $result->tran_id;
    $val_id = $result->val_id;
    echo  $amount = $result->amount;
    $store_amount = $result->store_amount;
    $bank_tran_id = $result->bank_tran_id;
    $card_type = $result->card_type;

    # EMI INFO
    $emi_instalment = $result->emi_instalment;
    $emi_amount = $result->emi_amount;
    $emi_description = $result->emi_description;
    $emi_issuer = $result->emi_issuer;

    # ISSUER INFO
    $card_no = $result->card_no;
    $card_issuer = $result->card_issuer;
    $card_brand = $result->card_brand;
    $card_issuer_country = $result->card_issuer_country;
    $card_issuer_country_code = $result->card_issuer_country_code;

    # API AUTHENTICATION
    $APIConnect = $result->APIConnect;
    $validated_on = $result->validated_on;
    $gw_version = $result->gw_version;

    echo  $quantity = $result->value_a;
    echo "product id";


    echo  $product_id = $result->value_b;
    echo "farmer id";
    echo  $farmer_id = $result->value_c;
    echo  $customer_id = $result->value_d;
} else {

    echo "Failed to connect with SSLCOMMERZ";
}

$order = new order();
$sql = "SELECT * from product where product_id=$product_id";
$stmnt = $db->connection->prepare($sql);
$stmnt->execute();

while ($row = $stmnt->fetch()) {
    $order_info['product_name'] = $row['name'];
}
$order_info['product_id'] = $product_id;
$order_info['customer_id'] = $customer_id;
$order_info['farmer_id'] = $farmer_id;
$order_info['product_id'] = $product_id;
$order_info['quantity'] = $quantity;
$order_info['price'] = $amount;
$order_info['is_recieved'] = "no";
$order_info['transaction_id'] = $tran_id;
$order_info['is_delivered'] = "no";
$order_info['order_date'] = $tran_date;
$order->addOrder($order_info);
$_SESSION['user_id'] = $customer_id;
$_SESSION['user_type'] = "customer";
header("location:orderHandler.php");