<?php
session_start();

if ($_SESSION['user_type'] == "farmer") {
    include_once 'farmer_header.php';
}


if ($_SESSION['user_type'] == "agriculturist") {
    include_once 'agri_header.php';
}
require_once 'Database.php';

$db = Database::getInstance();

$posts = $db->fetch_all_data('problem');

//die(print_r($posts));


?>




<div class="container ">
    <div class="text-center my-5">
        <h1 class="heading text-center">কৃষি বিষয়ক সমস্যার সমাধান</h1>
        <hr>
    </div>

    <!-- Row start-->
    <div class="row">
        <?php foreach ($posts as $post) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-5 shadow-sm ">

                <?php if ($post['img'] != "") : ?>
                <img style="object-fit: cover;"
                     src="assets/uploaded_img/<?php echo $post['img']; ?>"
                     class="img-fluid">
                <?php endif; ?>

                <div style="height: 120px;"
                     class="card-body">
                    <div class="card-title">
                        <h2><?php echo $post['title']; ?></h2>
                    </div>

                    <a style="    width: 87px;
    height: 33px;
    display: flex;
    justify-content: center;
    align-items: center;"
                       href="http://localhost/Farming-assistant/solution.php?problem_id=<?php echo $post['problem_id'] ?>"
                       class="btn btn-outline-primary rounded-0 float-end">বিস্তারিত</a>
                </div>

                <!-- Row End -->
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include_once 'footer.php'; ?>