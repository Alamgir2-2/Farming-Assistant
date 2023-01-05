<?php
session_start();

include_once 'handlers/converter.php';
include_once 'handlers/DatabaseEdited.php';
include_once 'classes/users/user.php';
include_once 'classes/users/farmer.php';
include_once 'classes/users/customer.php';
include_once 'classes/product.php';
include_once 'classes/blog.php';

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
?>

<!-- home section starts  -->

<section class="home" id="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <section class="swiper-slide slide" style="background: url(assets/images/farmer2.jpg) no-repeat">
                <div class="content">
                    <h3>বাঁচাও কৃষক,বাঁচবে দেশ<br>
                        মুছবে দৈন্য,ঘুচবে ক্লেশ</h3>

                    <a style="margin-top: 86px;text-decoration-line:none;" href="#about" class="bttn">শুরু করুন</a>
                </div>
            </section>

            <section class="swiper-slide slide" style="background: url(assets/images/slider1.jpg) no-repeat">
                <div class="content">
                    <h3>বাঁচাও কৃষক,বাঁচবে দেশ
                        মুছবে দৈন্য,ঘুচবে ক্লেশ</h3>

                    <a style="margin-top: 86px;text-decoration-line:none;" href="#about" class="bttn">শুরু করুন</a>
                </div>
            </section>

            <section class="swiper-slide slide" style="background: url(assets/images/farmerinsert.jpg) no-repeat">
                <div class="content">
                    <h3>বাঁচাও কৃষক,বাঁচবে দেশ
                        মুছবে দৈন্য,ঘুচবে ক্লেশ</h3>

                    <a style="margin-top: 86px;text-decoration-line:none;" href="#about" class="bttn">শুরু করুন</a>
                </div>
            </section>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- home section ends -->


<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">
    <h1 class="heading">আমাদের লক্ষ্য</h1>

    <div class="roww">
        <div class="">
            <img src="assets/images/farmerinsert.jpg" />
        </div>

        <div class="content col-lg-6">
            <h3>কৃষকের দ্বারপ্রান্তে সর্বোচ্চ সেবা পৌঁছে দেওয়াই আমাদের লক্ষ্য</h3>
            <p>
                <span id="app-name">"Farming Assistant"</span> হল একটি ওয়েব
                অ্যাপ্লিকেশন যা কৃষকদের ক্রমাগত বিভিন্ন কৃষি সংক্রান্ত সর্বশেষ
                খবরাখবর এবং ব্লগ আকারে কৃষি সম্পর্কিত টিপস এবং তথ্যসেবা দিয়ে সাহায্য
                করে থাকে ।একই সাথে কৃষকদের বিভিন্ন পরিষেবা যেমন তাদের উৎপন্ন পণ্য সরাসরি
                বাজারজাতকরণের জন্য একটি অনলাইন প্লাটফর্ম এবং কৃষি সম্পর্কিত বিভিন্ন সমস্যাবলির
                সমাধান দিয়ে সহায়তা দিয়ে থাকে।
            </p>
            <a href="#services" style="text-decoration-line:none;" class="bttn">আরও দেখুন</a>
        </div>
    </div>
    <?php
    $farmer = new farmer();

    $customer = new customer();
    $product = new Product();
    $blog = new Blog();

    $total_farmers = converter::en2bn($farmer->countMembers());
    $total_customers = converter::en2bn($customer->countMembers());
    $total_products = converter::en2bn($product->countProducts());
    $total_blogs = converter::en2bn($blog->countBlogs());
    ?>
    <div class="box-container">
        <div class="box">
            <h3><?php echo $total_farmers . " "; ?>+</h3>
            <p>কৃষক</p>
        </div>
        <div class="box">
            <h3><?php echo $total_customers . " "; ?>+</h3>
            <p>ক্রেতা</p>
        </div>

        <div class="box">
            <h3><?php echo $total_products . " "; ?>+</h3>
            <p>কৃষিপণ্য</p>
        </div>

        <div class="box">
            <h3><?php echo $total_blogs . " "; ?>+</h3>
            <p>ব্লগ</p>
        </div>
    </div>
</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">
    <h1 class="heading">আমাদের সেবাসমূহ</h1>
    <div class="box-container">
        <div class="box">
            <img src="assets/images/internet.gif" alt="" />
            <h3>কৃষিবিষয়ক খবরাখবর</h3>
        </div>

        <div class="box">
            <img src="assets/images/document.gif" alt="" />
            <h3>ব্লগ</h3>
        </div>

        <div class="box">
            <img src="assets/images/shopping-cart.gif" alt="" />
            <h3>কৃষিপণ্য বাজারজাতকরণ</h3>
        </div>

        <div class="box">
            <img src="assets/images/tech-support.gif" alt="" />
            <h3>কৃষিবিষয়ক সমস্যাবলির সমাধান</h3>
        </div>
    </div>
</section>

<!-- services section ends -->

<!-- products section starts  -->

<!-- popular section starts  -->

<section class="popular" id="popular">
    <h1 class="heading "> <span class="green-span">সাম্প্রতিক</span> পণ্যসমূহ</h1>

    <div class="box-container">
        <?php
        $sql = "SELECT * from product ORDER BY product_id Desc LIMIT 4";
        $statement = $db->connection->prepare($sql);
        $statement->execute();
        if ($statement->rowCount()) {
            while ($product = $statement->fetch()) {



        ?>
                <div class="box">

                    <img src="assets/uploaded_img/product/<?php echo $product['product_img']; ?>" alt="">
                    <h3><?php echo $product['name']; ?></h3>



                    <a style="text-decoration-line:none;" href="market.php" class="bttn">সকল পণ্য দেখুন</a>
                </div>



        <?php }
        }
        ?>
    </div>


</section>

<!-- popular section ends -->
<!-- blogs section starts  -->

<section class="blogs" id="blogs">
    <h1 class="heading">ব্লগসমূহ</h1>

    <div class="swiper blogs-slider">
        <div class="swiper-wrapper">
            <?php $blog_list = $db->fetch_all_data("blog");



            if (count($blog_list) > 0) {

                foreach ($blog_list as $b) {
            ?>



                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="assets/uploaded_img/blog/<?php echo $b['blog_img']; ?>" alt="">

                        </div>
                        <div class="content">
                            <h3><?php echo $b["title"] ?></h3>
                            <p>
                                <?php echo $b["category"] ?>
                            </p>
                            <a href="single_blog.php?blog_id=<?php echo $b["blog_id"] ?>" class="bttn">সম্পূর্ণ পড়ুন</a>
                        </div>
                    </div>
            <?php }
            } ?>

        </div>

    </div>
    </div>
</section>

<!-- blogs section ends -->

<?php include 'footer.php';
?>