<?php
include_once 'handlers/DatabaseEdited.php';

$db = EDatabase::getInstance();
?>



<section class="show-products">
    <h1 class="heading text-center">কৃষিপণ্যের ক্যাটাগরিসমূহ</h1>
    <div class="box-container">
        <?php
        if (isset($category_list)) {

            if (count($category_list) > 0) {

                foreach ($category_list as $category) {
        ?>


        <div class="box">
            <div class="product-box-content">
                <img src="../assets/uploaded_img/category/<?php echo $category['category_img']; ?>"
                     alt="">
                <div class="name"><?php echo $category['category_name']; ?>
                </div>

                <a href="categoryHandler.php?update_id=<?php echo $category['category_id']; ?>"
                   class="bttn">update</a>
                <a href="categoryHandler.php?delete_id=<?php echo $category['category_id']; ?>"
                   class="dlt-btn"
                   onclick="return confirm('ক্যাটাগরি ডিলেট করতে চান?');">delete</a>
            </div>
        </div>

        <?php }
            } else {

                echo "<h1 class='empty-heading'>কোন ক্যাটাগরি যোগ করা হয়নি</h1>";
            }
        }
        ?>


    </div>


</section>


<section class="add-products">
    <form action=""
          method="post"
          enctype="multipart/form-data">
        <h3 class="heading">ক্যাটাগরি যোগ করুন</h3>
        <input type="text"
               name="name"
               class="box"
               placeholder="ক্যাটাগরির নাম দিন"
               required>

        <input type="file"
               name="image"
               accept="image/jpg, image/jpeg, image/png"
               class="box"
               required>
        <input type="submit"
               value="যোগ করুন"
               name="add_category"
               class="bttn">
    </form>

</section>



<!-- product CRUD section ends -->

<!-- update  products  -->

<?php


if (isset($_GET['update_id'])) {
    $update_id = $_GET['update_id'];
    $update_query =  "SELECT * FROM product_category WHERE category_id = '$update_id'";
    $stmnt = $db->connection->prepare($update_query);
    $stmnt->execute();
    if ($stmnt->rowCount()) {
        while ($category_update = $stmnt->fetch()) {
?>
<section class="edit-product-form">
    <form action=""
          method="post"
          enctype="multipart/form-data">
        <input type="hidden"
               name="update_c_id"
               value="<?php echo $category_update['category_id']; ?>">
        <input type="hidden"
               name="update_old_image"
               value="<?php echo $category_update['category_img']; ?>">
        <input type="text"
               name="update_name"
               class="box"
               placeholder="ক্যাটাগরির নাম দিন"
               required
               value="<?php echo $category_update['category_name']; ?>">
        <input type="file"
               name="update_image"
               accept="image/jpg, image/jpeg, image/png"
               class="box"
               required>
        <div id="btn-img-grp">
            <img src="../assets/uploaded_img/category/<?php echo $category_update['category_img']; ?>"
                 alt="">
            <div class="buttons-grp"> <input type="submit"
                       value="আপডেট করুন"
                       name="update_category"
                       class="bttn">
                <input type="reset"
                       value="cancel"
                       id="close-category"
                       class="dlt-btn">
            </div>
        </div>
    </form>
    <?php
        }
    }
} else {
    echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
}
    ?>

</section>




<?php include 'handlers/footer.php' ?>