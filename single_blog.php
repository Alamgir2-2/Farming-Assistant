<?php
session_start();
if (isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] == "farmer") {
        include_once 'farmer_header.php';
    } else if ($_SESSION['user_type'] == "admin") {
        include_once 'admin_header.php';
    } else if ($_SESSION['user_type'] == "customer") {
        include_once 'customer_header.php';
    } else {
        include_once 'agri_header.php';
    }
} else include_once 'basic_header.php';
include_once 'Database.php';


if (isset($_GET['blog_id'])) {
    $blog["blog_id"] = $_GET['blog_id'];

    $db = database::getInstance();
    $sql = "SELECT * from blog where blog_id={$_GET['blog_id']}";
    $stmnt = $db->connection->prepare($sql);
    $stmnt->execute();
    while ($row = $stmnt->fetch()) {


        $blog["title"] = $row['title'];
        $blog["blog_img"] = $row['blog_img'];
        $blog["description"] = $row['description'];
        $sql = "SELECT name from user where user_id={$row['author']}";
        $stmnt = $db->connection->prepare($sql);
        $stmnt->execute();
        while ($result = $stmnt->fetch()) {
            $blog["author"] = $result['name'];
        }
    }


?>
<section class="blog-container"
         id="posts">

    <div class="posts-container">

        <div class="post">
            <img src="assets/uploaded_img/blog/<?php echo $blog['blog_img']; ?>"
                 alt=""
                 class="image">

            <h3 class="title heading"><?php echo $blog["title"] ?></h3>
            <p class="text"><?php echo $blog["description"] ?></p>

            <div class="links">

                <i class="far fa-user"></i>
                <span style=" font-size: 13px;font-weight=600;">পোস্টদাতা <?php echo " " . $blog["author"] ?></span>



            </div>
        </div>

</section>





<?php
}
include_once 'footer.php'; ?>