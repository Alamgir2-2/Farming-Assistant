<?php if (isset($_SESSION['message'])) {

       echo '
<div class="message">
       <span>' . $_SESSION['message'] . '</span>
       <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
</div>
';
       unset($_SESSION['message']);
} ?>

<section class="show-products">
    <h1 class="heading text-center">কৃষিবিদগণ</h1>
    <div class="box-container">
        <?php
              if (isset($agri_list)) {

                     if (count($agri_list) > 0) {

                            foreach ($agri_list as $agri) {
              ?>


        <div class="box "
             style="height: 200px ;">
            <div class="product-box-content">
                <div class="name"><?php echo $agri['name']; ?>
                </div>
                <div class="price text-muted"><?php echo $agri['phone_number']; ?></div>
                <div class="price text-muted"><?php echo $agri['address']; ?></div>

                <a href="agriHandler.php?delete_id=<?php echo $agri['user_id']; ?>"
                   class=" dlt-btn"
                   onclick="return confirm('কৃষিবিদ রিমুভ করতে চান?');">মুছুন</a>
            </div>
        </div>

        <?php }
                     } else {

                            echo "No agriculturist  to show";
                     }
              }
              ?>


    </div>


</section>



</section>
<section class="add-products">
    <form id="access-form"
          action="agriHandler.php"
          method="post"
          onsubmit="return validate_mbl_pass()">
        <h3 class="text-center heading">নতুন কৃষিবিদ যোগ করুন</h3>
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
               value="যোগ করুন"
               name="add_agri"
               class="bttn">
    </form>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->



<?php include 'handlers/footer.php' ?>