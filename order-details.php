<?php

?>



<section>
    <h1 class="heading text-center ">অর্ডারসমূহ</h1>
    <?php
    if (isset($order_list)) {

        if (count($order_list) > 0) {
    ?>
    <div style="overflow-x:auto ;">
        <table class="
                 order-table">
            <tr>
                <th>অর্ডার</th>
                <?php if ($_SESSION['user_type'] == "admin" or $_SESSION['user_type'] == "farmer") { ?>
                <th>ক্রেতা</th>
                <?php } ?>
                <th>কৃষিপণ্য</th>
                <th>তারিখ</th>
                <?php if ($_SESSION['user_type'] == "admin" or $_SESSION['user_type'] == "customer") { ?>
                <th>কৃষক</th>

                <?php if ($_SESSION['user_type'] == "admin") { ?>
                <th>ট্রান্সেকশন আইডি</th>
                <?php }
                        }

                        if ($_SESSION['user_type'] == "admin") { ?>
                <th> পণ্য গ্রহণ </th>
                <?php }
                        if ($_SESSION['user_type'] == "farmer") { ?>
                <th> পণ্য প্রদান </th>
                <?php } ?>
                <th>পণ্য ডেলিভারি</th>
                <?php if ($_SESSION['user_type'] == "admin") { ?>
                <th>আপডেট </th>
                <?php } ?>
            </tr>
            <?php

                    foreach ($order_list as $order) {
                    ?>
            <tr>
                <td><?php echo $order['order_id']; ?></td>
                <?php if ($_SESSION['user_type'] == "admin" or $_SESSION['user_type'] == "farmer") { ?>
                <td><?php echo $order['customer']; ?> <div><?php echo $order['customer_no']; ?></div>
                    <div><?php echo $order['customer_address']; ?></div>
                </td>
                <?php } ?>
                <td>
                    <div><?php echo $order['product']; ?></div>
                    <div>(<?php echo $order['quantity']; ?>)</div>
                    <div><?php echo $order['price']; ?><span>টাকা</span></div>

                </td>
                <td><?php echo $order['order_date']; ?></td>
                <?php if ($_SESSION['user_type'] == "admin" or $_SESSION['user_type'] == "customer") { ?>
                <td><?php echo $order['seller']; ?> <div><?php echo $order['farmer_no']; ?></div>
                    <div><?php echo $order['farmer_address']; ?></div>
                </td>

                <?php if ($_SESSION['user_type'] == "admin") { ?>
                <td><?php echo $order['transaction_id']; ?></td>


                <form action=""
                      method="post">
                    <input type="hidden"
                           name="order_id"
                           value="<?php echo $order['e_order_id']; ?>">

                    <td>
                        <?php if ($order['is_recieved'] == 'no') { ?>
                        <select name="is_recieved"
                                style="    margin: 0;
    width: max-content;
    padding: 11px;
    
    text-align: center;
    border-radius: 8px;"
                                name="is_recieved"
                                class="dlt-btn">

                            <option value="no"
                                    selected>করা হয়নি</option>
                            <option value="yes">করা হয়েছে</option>
                        </select>
                        <?php } else {
                                            ?>
                        <select name="is_recieved"
                                style="margin: 0;
    width: max-content;
    padding: 11px;
    
    text-align: center;
    border-radius: 8px;"
                                name="is_recieved"
                                class="bttn">
                            <option value="no">করা হয়নি</option>
                            <option value="yes"
                                    selected>করা হয়েছে</option>

                        </select><?php  } ?>
                    </td>
                    <td>
                        <?php if ($order['is_delivered'] == 'no') { ?>
                        <select name="is_delivered"
                                style="    margin: 0;
    width: max-content;
    padding: 11px;
    
    text-align: center;
    border-radius: 8px;"
                                name="is_delivered"
                                class="dlt-btn">

                            <option value="no"
                                    selected>করা হয়নি</option>
                            <option value="yes">করা হয়েছে</option>
                        </select>
                        <?php } else {
                                            ?>
                        <select name="is_delivered"
                                style="margin: 0;
    width: max-content;
    padding: 11px;
    
    text-align: center;
    border-radius: 8px;"
                                name="is_delivered"
                                class="bttn">
                            <option value="no">করা হয়নি</option>
                            <option value="yes"
                                    selected>করা হয়েছে</option>

                        </select><?php  } ?>
                    </td>

                    <td style="display:flex ; flex-direction:column;"><input type="submit"
                               class="bttn"
                               style="margin: 5px 0px;
    padding: 11px;
    border-radius: 8px;"
                               name="update_order"
                               value="আপডেট">

                        <a href="orderHandler.php?delete_id=<?php echo $order['e_order_id']; ?>"
                           class="dlt-btn"
                           style="margin: 0; padding: 11px; border-radius: 8px;">ডিলেট</a>
                    </td>

                </form>
                <?php }
                            }


                            if ($_SESSION['user_type'] == "customer") {
                                if ($order['is_delivered'] == 'no') {
                                ?>

                <td>
                    <div class="dlt-btn">করা হয়নি</div>
                </td>
                <?php } else { ?>

                <td>
                    <div class="bttn">করা হয়েছে</div>
                </td>

                <?php }
                            }

                            if ($_SESSION['user_type'] == "farmer") {
                                if ($order['is_recieved'] == 'no') {
                                ?>

                <td>
                    <div class="dlt-btn">করা হয়নি</div>
                </td>
                <?php } else { ?>

                <td>
                    <div class="bttn">করা হয়েছে</div>
                </td>

                <?php }
                                if ($order['is_delivered'] == 'no') {  ?>

                <td>
                    <div class="dlt-btn">করা হয়নি</div>
                </td>
                <?php } else { ?>

                <td>
                    <div class="bttn">করা হয়েছে</div>
                </td>

                <?php  }
                            } ?>

            </tr>
            <?php }
                } else {
                    echo "<h1 class='empty-heading'>কোন অর্ডার নেই </h1>";
                }
            } ?>

        </table>
    </div>
</section>







<?php

include 'footer.php';
?>