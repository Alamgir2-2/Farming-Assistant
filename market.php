<?php
session_start();

include_once 'handlers/DatabaseEdited.php';
include_once 'handlers/converter.php';
$db = EDatabase::getInstance();

if (isset($_SESSION['user_type'])) {


    if ($_SESSION['user_type'] == "farmer") {
        include_once 'farmer_header.php';
    }
    if ($_SESSION['user_type'] == "admin") {
        include_once 'admin_header.php';
    }
    if ($_SESSION['user_type'] == "customer") {
        include_once 'customer_header.php';
    }

    if ($_SESSION['user_type'] == "agriculturist") {
        include_once 'agri_header.php';
    }
} else {
    include_once 'basic_header.php';
}

?>

<!-- slider section start -->

<!-- home section starts  -->

<!-- home section starts  -->



<!-- home section ends -->
<section class="home"
         id="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <section class="swiper-slide slide"
                     style="background: url(assets/images/sp1.jpg) no-repeat">
                <div class="content">
                    <h3>কৃষিপণ্য কিনুন ঘরে বসেই</h3>
                    <a style="text-decoration-line:none;"
                       href="#products"
                       class="bttn">শুরু করুন</a>
                </div>
            </section>
            <section class="swiper-slide slide"
                     style="background: url(assets/images/sp2.jpg) no-repeat">
                <div class="content">
                    <h3>কৃষিপণ্য কিনুন ঘরে বসেই</h3>
                    <a style="text-decoration-line:none;"
                       href="#products"
                       class="bttn">শুরু করুন</a>
                </div>
            </section>
            <section class="swiper-slide slide"
                     style="background: url(assets/images/tomato.jpg) no-repeat">
                <div class="content">
                    <h3>কৃষিপণ্য কিনুন ঘরে বসেই</h3>
                    <a style="text-decoration-line:none;"
                       href="#products"
                       class="bttn">শুরু করুন</a>
                </div>
            </section>


        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- home section ends -->


<!-- speciality section starts  -->



<section id="products"
         class="speciality"
         id="speciality">
    <h1 class="heading">ক্যাটাগরিসমূহ</h1>
    <!-- si -->
    <div class="box-container">


        <?php

        $sql = "SELECT * from product_category";
        $statement = $db->connection->prepare($sql);
        $statement->execute();
        if ($statement->rowCount()) {
            while ($category = $statement->fetch()) {
        ?>
        <a style="text-decoration-line:none;"
           href="market.php?category=<?php echo  $category['category_name']; ?>">
            <div class="box">
                <img class="image"
                     src="assets/uploaded_img/category/<?php echo $category["category_img"]; ?>"
                     alt="" />
                <div class="content">

                    <h3><?php echo $category["category_name"]; ?></h3>


                </div>
            </div>
        </a>
        <!-- single  -->
        <?php }
        } ?>


    </div>
</section>


<!-- speciality section ends -->

<!-- popular section starts  -->

<section class="popular"
         id="popular">
    <h1 class="heading"> <span>পন্য</span> সমূহ</h1>
    <div class="search__container">
        <p class="search__title">
            কৃষিপণ্য অনুসন্ধান করুন
        </p>
        <form action=""
              method="post">
            <input class="search__input"
                   type="text"
                   name="search_product"
                   placeholder="অনুসন্ধান করুন">
            <input type="submit"
                   hidden
                   name="search" />
        </form>
    </div>

    <div class="box-container">

        <?php
        if (isset($_POST['search_product'])) {
            $name = $_POST['search_product'];
            $sql = "SELECT * from product  where name like '%$name%' or category like '%$name%' ";
        } else  if (isset($_GET['category'])) {
            $sql = "SELECT * from product  where category='{$_GET['category']}' ";
        } else {
            $sql = "SELECT * from product ORDER BY product_id ";
        }
        $statement = $db->connection->prepare($sql);
        $statement->execute();
        if ($statement->rowCount()) {
            while ($product = $statement->fetch()) {

                if ($product['quantity'] > 0) {

        ?>
        <div class="box">
            <span class="price"><?php echo converter::en2bn($product['quantity'] * $product['unit_price']) ?> টাকা
            </span>
            <img src="assets/uploaded_img/product/<?php echo $product['product_img']; ?>"
                 alt="">
            <h3><?php echo $product['name']; ?></h3>

            <p style="background-color: transparent; font-size: 20px; margin: auto; padding: auto; padding: 10px; height: 50px;"
               class="text-muted info"><span
                      class="quantity"><?php echo converter::en2bn($product['quantity']); ?></span><span
                      class="quantity type"><?php echo $product['quantity_type']; ?></span></p>

            <a style="text-decoration-line:none;"
               href="checkout-page.php?product_id=<?php echo $product['product_id'] ?>"
               class="bttn"> অর্ডার করুন</a>
        </div>
        <?php }
            }
        } else {

            echo "<h1 class='empty-heading'>কোন পণ্য নেই </h1>";
        }


        ?>


    </div>
</section>

<!-- popular section ends -->



<!--Product
    section
    start
    -->





<?php include 'footer.php';
?>