<?php session_start();
include_once 'handlers/DatabaseEdited.php';
include_once 'handlers/converter.php';
$db = EDatabase::getInstance();
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

$sql = "SELECT  * from user where user_id={$_SESSION['user_id']}";
$stmnt = $db->connection->prepare($sql);
$stmnt->execute() or die("query failed");

while ($row = $stmnt->fetch()) {
    $user['name'] = $row['name'];
    $user['phone_number'] = $row['phone_number'];
    $user['address'] = $row['address'];
}

?>
<div class="login-container">
    <div class="wrapper">

        <div class="text-center mt-4 name heading">
            প্রোফাইল পরিবর্তন করুন
        </div>
        <div class="form-container">
            <form id="access-form"
                  class="p-3 mt-3"
                  action="handlers/editProfileHandler.php"
                  method="post"
                  onsubmit="return validate_mbl_pass()">

                <div class="form-field d-flex align-items-center">
                    <input type="text"
                           name="name"
                           placeholder="নাম লিখুন"
                           value="<?php echo $user['name']; ?>"
                           required>
                </div>
                <div class="form-field d-flex align-items-center">
                    <input type="text"
                           name="address"
                           placeholder="ঠিকানা লিখুন"
                           value="<?php echo $user['address']; ?>"
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
                           value="<?php echo $user['phone_number']; ?>"
                           required>
                </div>

                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password"
                           name="old-password"
                           placeholder="পুরাতন পাসওয়ার্ড দিন"
                           required>

                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password"
                           name="password"
                           id="pwd"
                           placeholder="নতুন পাসওয়ার্ড দিন"
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

                <input type="submit"
                       name="update"
                       class="btn mt-3"
                       value="পরিবর্তন করুন"
                       id="signup_submit">

        </div>
        </form>
    </div>

</div>
</div>

<?php include 'footer.php' ?>