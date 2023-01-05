<?php session_start();

include_once 'handlers/converter.php';

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


?>



<div class="login-container">
    <div class="wrapper"
         style="min-height: 400px;">
        <div class="text-center mt-4 name heading">
            লগইন করুন
        </div>
        <form id="access-form"
              class="p-3 mt-3"
              action="handlers/login-handler.php"
              method="post"
              onsubmit="return validate_mobile()">
            <div class="
              form-field
              d-flex
              align-items-center"
                 style="height: 48px;
    margin-bottom: 17px;">
                <i class="bi bi-telephone-fill"></i>
                <input type="number"
                       name="phone"
                       id="phone"
                       placeholder="ফোন নাম্বার"
                       required>
            </div>
            <div class="form-field d-flex align-items-center"
                 style="height: 48px;
    margin-bottom: 17px;">
                <span class="fas fa-key"></span>
                <input type="password"
                       name="login_password"
                       id="pwd"
                       placeholder="পাসওয়ার্ড"
                       required>
            </div>

            <input type="submit"
                   class="btn mt-3"
                   value="লগইন করুন"
                   id="login_submit">
        </form>
        <div class="login-footer fs-6">

            <p class="create"><a style="text-decoration: none;color:green;padding-top:2rem;"
                   href="signup-page.php">নতুন একাউন্ট তৈরি করুন </a></p>
        </div>
    </div>
</div>

<?php

include 'footer.php' ?>