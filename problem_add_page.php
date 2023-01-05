<?php
session_start();
if ($_SESSION['user_type'] == "farmer") {
    include_once 'farmer_header.php';
}


if ($_SESSION['user_type'] == "agriculturist") {
    include_once 'agri_header.php';
}
?>

<div class="container">
    <h2 class="py-3 text-center display-3">কৃষি সংক্রান্ত সমস্যা লিখুন </h2>
    <form action="add_problem.php"
          method="post"
          enctype="multipart/form-data">

        <div class="form-group">
            <label for="title"
                   class="font-weight-bold">শিরোনাম</label>
            <input name="title"
                   id="title"
                   type="text"
                   class="form-control"
                   required>
        </div>
        <div class="form-group">
            <label for="problem_des"
                   class="font-weight-bold">সমস্যা</label>
            <textarea style="resize:none"
                      name="problem_des"
                      id="problem_des"
                      class="form-control"
                      rows="20"
                      cols="20"
                      required> </textarea>
        </div>
        <div class="form-group">
            <label for="img"
                   class="font-weight-bold">ছবি যোগ করুন</label><br>
            <input name="img"
                   id="img"
                   type="file"
                   accept="image/png, image/jpeg"
                   class="py-2">

        </div>
        <div class="form-group">

            <input name="submit"
                   id="submit"
                   type="submit"
                   value="প্রেরণ করুন"
                   class="form-control py-2">

        </div>
    </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include_once 'footer.php'; ?>