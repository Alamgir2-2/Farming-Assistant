<?php
session_start();


include_once 'converter.php';
if (isset($_SESSION['user_type'])) {


    if ($_SESSION['user_type'] == "farmer") {
        include_once '../farmer_header.php';
    }
    if ($_SESSION['user_type'] == "admin") {
        include_once '../admin_header.php';
    }
    if ($_SESSION['user_type'] == "customer") {
        include_once '../customer_header.php';
    }
} else {
    header("location:../loginpage.php");
}
if (isset($_SESSION['message'])) {

    echo '
      <div class="message">
         <span>' . $_SESSION['message'] . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    unset($_SESSION['message']);
}
include_once 'DatabaseEdited.php';
include_once '../classes/order.php';
$order = new order();

if (isset($_POST['update_order'])) {

    $edit_info['is_recieved'] = $_POST['is_recieved'];
    $edit_info['is_delivered'] = $_POST['is_delivered'];
    $edit_info['order_id'] = $_POST['order_id'];
    $order->editOrder($edit_info);
}


if (isset($_GET['delete_id'])) {
    $order->deleteOrder($_GET['delete_id']);
}


$order_list = $order->viewOrder();
include_once '../order-details.php';