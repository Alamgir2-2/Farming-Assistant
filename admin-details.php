<section class="show-products">
    <h1 class="heading text-center">অ্যাডমিনগণ</h1>
    <div class="box-container">
        <?php
              if (isset($admin_list)) {

                     if (count($admin_list) > 0) {

                            foreach ($admin_list as $admin) {
              ?>


        <div class="box "
             style="height: 200px ;">
            <div class="product-box-content">
                <div class="name"><?php echo $admin['name']; ?>
                </div>
                <div class="price text-muted"><?php echo $admin['phone_number']; ?></div>
                <div class="price text-muted"><?php echo $admin['address']; ?></div>

            </div>
        </div>

        <?php }
                     } else {

                            echo "No Admin  to show";
                     }
              }
              ?>


    </div>


</section>



</section>
<section class="add-products">
    <form id="access-form"
          action="adminHandler.php"
          method="post"
          onsubmit="return validate_mbl_pass()">
        <h3 class="text-center heading">নতুন অ্যাডমিন যোগ করুন</h3>
        <input type="text"
               name="name"
               class="box"
               placeholder=" নাম লিখুন"
               required>
        <input type="text"
               name="phone"
               id="phone"
               placeholder="ফোন নাম্বার"
               class="box"
               required>
        <input type="text"
               name="address"
               class="box"
               placeholder="ঠিকানা লিখুন"
               required>
        <input type="password"
               name="password"
               id="pwd"
               placeholder="পাসওয়ার্ড"
               required
               class="box">
        <input type="password"
               name="r_password"
               id="c_pwd"
               placeholder="পুনরায় পাসওয়ার্ড দিন"
               class="box"
               required>


        <input type="submit"
               value="অ্যাডমিন যোগ করুন"
               name="add_admin"
               class="bttn">
    </form>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->



<?php include 'handlers/footer.php' ?>