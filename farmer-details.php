<section class="show-products">
    <h1 class="heading text-center">কৃষকগণ</h1>
    <div class="box-container">
        <?php
              if (isset($farmer_list)) {

                     if (count($farmer_list) > 0) {

                            foreach ($farmer_list as $farmer) {
              ?>


        <div class="box "
             style="height: 200px ;">
            <div class="product-box-content">
                <div class="name"><?php echo $farmer['name']; ?>
                </div>
                <div class="price text-muted"><?php echo $farmer['phone_number']; ?></div>
                <div class="price text-muted"><?php echo $farmer['address']; ?></div>

                <a href="farmerHandler.php?delete_id=<?php echo $farmer['user_id']; ?>"
                   class=" dlt-btn"
                   onclick="return confirm('কৃষককে রিমুভ করতে চান?');">delete</a>

            </div>
        </div>

        <?php }
                     } else {

                            echo "<h1 class='empty-heading'>কোন কৃষক নেই</h1>";
                     }
              }
              ?>


    </div>


</section>







<!-- show products  -->



<?php include 'handlers/footer.php' ?>