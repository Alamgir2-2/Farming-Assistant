<section class="show-products">
    <h1 class="heading text-center">কৃষিপণ্যসমূহ</h1>
    <div class="box-container">
        <?php
              if (isset($product_list)) {

                     if (count($product_list) > 0) {

                            foreach ($product_list as $product) {
              ?>


        <div class="box">
            <div class="product-box-content">
                <img src="../assets/uploaded_img/product/<?php echo $product['product_img']; ?>"
                     alt="">
                <div class="name"><?php echo $product['name']; ?>
                    <span class="text-muted">(<?php echo $product['category']; ?>)</span>
                </div>
                <div class="price"><?php echo $product['quantity'] . " "; ?><span
                          class="text-muted"><?php echo $product['quantity_type']; ?></span></div>
                <div class="price"><?php echo $product['price'] . " "; ?><span class="text-muted">টাকা</span></div>
                <?php if ($_SESSION['user_type'] == 'admin') { ?>
                <div class="price">কৃষকঃ<?php echo $product['seller']; ?></div> <?php } ?>
                <a href="productHandler.php?update_id=<?php echo $product['product_id']; ?>"
                   class="bttn">পরিবর্তন</a>
                <a href="productHandler.php?delete_id=<?php echo $product['product_id']; ?>"
                   class="dlt-btn"
                   onclick="return confirm('পণ্যটি মুছে ফেলতে চান?');">মুছুন</a>
            </div>
        </div>

        <?php }
                     } else {

                            echo "<h1 class='empty-heading'>কোন কৃষিপণ্য যোগ করা হয়নি</h1>";
                     }
              }
              ?>


    </div>


</section>

<?php if ($_SESSION['user_type'] == "farmer") { ?>
<section class="add-products">
    <form action="../handlers/productHandler.php"
          method="post"
          enctype="multipart/form-data">
        <h3 class="heading">পণ্য যোগ করুন</h3>
        <input type="text"
               name="name"
               class="box"
               placeholder="পণ্যের নাম দিন"
               required>

        <select name="category"
                id=""
                class="box"
                required>
            <option value=""
                    selected>পণ্যের ধরণ নির্ধারণ করুন</option>
            <?php
                            $sql = "SELECT * from product_category";
                            $statement = $db->connection->prepare($sql);
                            $statement->execute();
                            if ($statement->rowCount()) {
                                   while ($category = $statement->fetch()) {
                            ?>



            <option value="<?php echo $category['category_name'] ?>"><?php echo $category['category_name'] ?></option>
            <?php }
                            } ?>
        </select>
        <select name="quantity_type"
                id=""
                class="box"
                required>
            <option value=""
                    selected>পণ্যের একক নির্ধারণ করুন</option>
            <option value="কেজি">কেজি</option>
            <option value="টি">টি</option>

        </select>

        <input type="number"
               min="1"
               name="quantity"
               class="box"
               placeholder="পণ্যের পরিমাণ লিখুন"
               required>

        <input type="number"
               min="1"
               name="unit_price"
               class="box"
               placeholder=" প্রতি এককে মূল্য লিখুন"
               required>


        <input type="file"
               name="image"
               accept="image/jpg, image/jpeg, image/png"
               class="box"
               required>
        <input type="submit"
               value="যোগ করুন"
               name="add_product"
               class="bttn">
    </form>

</section>
<?php } ?>


<!-- product CRUD section ends -->

<!-- update  products  -->
<section class="edit-product-form">
    <?php


       if (isset($_GET['update_id'])) {
              $update_id = $_GET['update_id'];
              $update_query =  "SELECT * FROM product WHERE product_id = '$update_id'";
              $stmnt = $db->connection->prepare($update_query);
              $stmnt->execute();
              if ($stmnt->rowCount()) {
                     while ($product_update = $stmnt->fetch()) {
       ?>
    <form action=""
          method="post"
          enctype="multipart/form-data">
        <input type="hidden"
               name="update_p_id"
               value="<?php echo $product_update['product_id']; ?>">
        <input type="hidden"
               name="update_old_image"
               value="<?php echo $product_update['product_img']; ?>">
        <input type="text"
               name="update_name"
               class="box"
               placeholder="পণ্যের নাম দিন"
               required
               value="<?php echo $product_update['name']; ?>">

        <select name="update_category"
                id=""
                class="box"
                required>
            <option value=""
                    selected>পণ্যের ধরণ নির্ধারণ করুন</option>
            <?php
                                          $sql = "SELECT * from product_category";
                                          $statement = $db->connection->prepare($sql);
                                          $statement->execute();
                                          if ($statement->rowCount()) {
                                                 while ($category = $statement->fetch()) {
                                          ?>



            <option value="<?php echo $category['category_name'] ?>"><?php echo $category['category_name'] ?></option>
            <?php }
                                          } ?>
        </select>
        <select name="update_quantity_type"
                id=""
                class="box"
                required>
            <option value=""
                    selected>পণ্যের একক নির্ধারণ করুন</option>
            <option value="কেজি">কেজি</option>
            <option value="টি">টি</option>

        </select>

        <input type="number"
               min="1"
               name="update_quantity"
               class="box"
               placeholder="পণ্যের পরিমাণ লিখুন"
               required
               value="<?php echo $product_update['quantity']; ?>">

        <input type="number"
               min="1"
               name="update_unit_price"
               class="box"
               placeholder=" প্রতি এককে মূল্য লিখুন"
               required
               value="<?php echo $product_update['unit_price']; ?>">


        <input type="file"
               name="update_image"
               accept="image/jpg, image/jpeg, image/png"
               class="box"
               required>
        <div id="btn-img-grp">
            <img src="../assets/uploaded_img/product/<?php echo $product_update['product_img']; ?>"
                 alt="">
            <div class="buttons-grp"> <input id="updatebutton"
                       type="submit"
                       value="আপডেট করুন"
                       name="update_product"
                       class="bttn">
                <input type="reset"
                       value="বাতিল করুন"
                       id="close-update"
                       class="dlt-btn"
                       onclick="hide()">
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

<script>
function hide() {
    console.log(" hello");
    document.querySelector(".edit-product-form").style.display = "none";
    window.location.href = "productHandler.php";
}
</script>


<?php include 'handlers/footer.php' ?>