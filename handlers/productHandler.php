<?php
session_start();


if (isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] == "farmer") {
        include_once '../farmer_header.php';
    } else if ($_SESSION['user_type'] == "admin") {
        include_once '../admin_header.php';
    } else {
        header("location:../index.php");
    }
}



include 'Database.php';
include_once 'DatabaseEdited.php';
include 'converter.php';
include '../classes/product.php';


if (isset($_SESSION['message'])) {

    echo '
      <div class="message">
         <span>' . $_SESSION['message'] . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    unset($_SESSION['message']);
}

$db = EDatabase::getInstance();

$p = new Product();


if (isset($_GET['delete_id'])) {

    $sql = "select * from orders where product_id={$_GET['delete_id']} AND is_recieved='no'";

    $p->deleteProduct($_GET['delete_id']);
}


if (isset($_POST['update_product'])) {

    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];

    $update_category = $_POST['update_category'];
    $update_quantity_type = $_POST['update_quantity_type'];
    $update_quantity = $_POST['update_quantity'];
    $update_unit_price = $_POST['update_unit_price'];
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = '../assets/uploaded_img/product/' . $update_image;
    $update_old_image = $_POST['update_old_image'];


    // $error_messages = array(
    //     UPLOAD_ERR_OK         => 'There is no error, the file uploaded with success',
    //     UPLOAD_ERR_INI_SIZE   => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    //     UPLOAD_ERR_FORM_SIZE  => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    //     UPLOAD_ERR_PARTIAL    => 'The uploaded file was only partially uploaded',
    //     UPLOAD_ERR_NO_FILE    => 'No file was uploaded',
    //     UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
    //     UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
    //     UPLOAD_ERR_EXTENSION  => 'A PHP extension stopped the file upload',
    // );
    // echo $error_messages[$_FILES['update_image']["error"]];

    $update_query =  "UPDATE product SET  name='$update_name',
    category='$update_category',quantity_type='$update_quantity_type', quantity=$update_quantity,unit_price=$update_unit_price,
      product_img = '$update_image' WHERE product_id = $update_p_id";
    $stmnt = $db->connection->prepare($update_query);
    $stmnt->execute() or die("update query failed");
    move_uploaded_file($update_image_tmp_name, $update_image_folder);
    unlink('../assets/uploaded_img/product/' . $update_old_image);

    unset($_GET['update_id']);
}

if (isset($_POST['add_product'])) {




    $product_info["name"] = $_POST['name'];

    $product_info["category"] =  $_POST['category'];
    $product_info["unit_price"] = $_POST['unit_price'];
    $product_info["product_img"] = $_FILES['image']['name'];
    $product_info["quantity"] =  $_POST['quantity'];
    $product_info["quantity_type"] =  $_POST['quantity_type'];
    $product_info["farmer_id"] =  $_SESSION['user_id'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../assets/uploaded_img/product/' . $_FILES['image']['name'];







    if ($p->addProduct($product_info)) {
        move_uploaded_file($image_tmp_name, $image_folder);
    }
    // header("Location:http://localhost/spl_php/handlers/productHandler.php");
}


$product_list = $p->viewAllproducts();
include '../product-details.php';