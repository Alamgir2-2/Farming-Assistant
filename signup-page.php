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
    <div class="wrapper">

        <div class="text-center mt-4 name heading">
            একাউন্ট তৈরি করুন
        </div>
        <div class="form-container">
            <form id="access-form"
                  class="p-3 mt-3"
                  action="handlers/signup-handler.php"
                  method="post"
                  onsubmit="return validate_mbl_pass()">
                <div class="form-field d-flex align-items-center">
                    <input type="text"
                           name="name"
                           placeholder="নাম লিখুন"
                           required>
                </div>
                <div class="form-field d-flex align-items-center">
                    <input type="text"
                           name="address"
                           placeholder="ঠিকানা লিখুন"
                           required>
                </div>
                <div class="
              form-field
              d-flex
              align-items-center">
                    <i class="bi bi-telephone-fill"></i>
                    <input type="text"
                           name="phone"
                           id="phone"
                           placeholder="ফোন নাম্বার"
                           required>
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password"
                           name="password"
                           id="pwd"
                           placeholder="পাসওয়ার্ড"
                           required>

                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password"
                           name="r_password"
                           id="c_pwd"
                           placeholder="পুনরায় পাসওয়ার্ড দিন"
                           required>

                </div>

                <div class=" d-flex align-items-center">

                    <div><select class="role"
                                name="user_type"
                                required>

                            <option value="farmer">কৃষক</option>
                            <option value="customer">ক্রেতা</option>

                        </select></div>
                </div>
                <input type="submit"
                       name="signup-button"
                       class="btn mt-3"
                       value="একাউন্ট তৈরি করুন"
                       id="signup_submit">

        </div>
        </form>
    </div>
    <div class="signup-footer fs-6">

        <p class="already">আগে থেকেই একাউন্ট আছে?<a style="text-decoration: none;color:green;"
               href=" loginpage.php">লগইন করুন </a></p>
    </div>
</div>
</div>

<?php include 'footer.php' ?>