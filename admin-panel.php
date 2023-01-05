<?php
session_start();
include_once 'Database.php';
include_once 'handlers/DatabaseEdited.php';
include_once 'admin_header.php';
include_once 'classes/users/user.php';
include_once 'classes/users/farmer.php';
include_once 'classes/users/customer.php';
include_once 'classes/users/agriculturist.php';
include_once 'classes/users/admin.php';
include_once 'classes/blog.php';
include_once 'classes/product.php';
include_once 'classes/order.php';
include_once 'handlers/converter.php';

$farmer = new farmer();
$admin = new admin();
$customer = new customer();
$agri = new agriculturist();
$product = new Product();
$blog = new Blog();
$order = new order();
$total_farmers = converter::en2bn($farmer->countMembers());
$total_customers = converter::en2bn($customer->countMembers());
$total_admin = converter::en2bn($admin->countMembers());
$total_agri = converter::en2bn($agri->countMembers());
$total_products = converter::en2bn($product->countProducts());
$total_blogs = converter::en2bn($blog->countBlogs());
$total_orders
    = converter::en2bn($order->countOrders());
$pending_orders
    = converter::en2bn($order->countPendingOrders());


?>

<section class="dashboard">

    <h1 class="heading text-center ">এডমিন প্যানেল</h1>

    <div class="box-container">

        <div class="box">

            <h3><?php echo $total_admin ?></h3>
            <div class='p-div'>
                <p>এডমিনের সংখ্যা</p>
            </div>

        </div>

        <div class="box">

            <h3><?php echo $total_farmers ?></h3>
            <div class='p-div'>
                <p>কৃষকের সংখ্যা</p>
            </div>
        </div>

        <div class="box">

            <h3><?php echo $total_customers ?></h3>
            <div class='p-div'>
                <p>ক্রেতার সংখ্যা</p>
            </div>
        </div>

        <div class="box">
            <h3><?php echo $total_agri ?></h3>
            <div class='p-div'>
                <p>কৃষিবিদের সংখ্যা</p>
            </div>
        </div>

        <div class="box">

            <h3><?php echo $total_products ?></h3>
            <div class='p-div'>
                <p>মোট কৃষিপণ্য</p>
            </div>
        </div>

        <div class="box">

            <h3><?php echo $total_orders ?></h3>
            <div class='p-div'>
                <p>মোট অর্ডার</p>
            </div>
        </div>

        <div class="box">

            <h3><?php echo $pending_orders; ?></h3>
            <div class='p-div'>
                <p>পেন্ডিং অর্ডার</p>
            </div>
        </div>

        <div class="box">

            <h3><?php echo $total_blogs ?></h3>
            <div class='p-div'>
                <p>ব্লগের সংখ্যা
                </p>
            </div>





        </div>
    </div>

</section>
<?php include 'footer.php';
?>