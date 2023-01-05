<?php
session_start();
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
?>

<div class="container">

    <h4 class="py-3 text-center display-3">কৃষি সংক্রান্ত খবরাখবর </h4>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow"
                 style="width: 27rem;">
                <div class="inner">
                    <img style="height: 192px;"
                         class="card-img-top"
                         src="assets/images/dam.jpg"
                         alt="Card image cap">
                </div>

                <div class="card-body text-center">
                    <h1 class="card-title">বাজার দর</h1>
                    <p class="card-text">দৈনিক জাতীয় গড় বাজার মূল্য জানতে নিচের বাটনে ক্লিক করুন</p>
                    <a href="http://localhost/Farming-assistant/dam.php"
                       class="btn btn-success">দেখুন</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow"
                 style="width: 27rem;">
                <div class=" inner">
                    <img style="height: 192px;"
                         class="card-img-top"
                         src="assets/images/weather3.png"
                         alt="Card image cap">
                </div>

                <div class="card-body text-center">
                    <h1 class="card-title">আবহাওয়া পরামর্শ</h1>
                    <p class="card-text">জেলা কৃষি আবহাওয়া পরামর্শ সেবা বুলেটিন দেখতে নিচের বাটনে ক্লিক করুন
                    </p>
                    <a href="http://localhost/Farming-assistant/fetchweather.php"
                       class="btn btn-success">দেখুন</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow"
                 style="width: 27rem;">
                <div class="inner">
                    <img style="height: 192px;"
                         class="card-img-top"
                         src="assets/images/Krishe.jpg"
                         alt="Card image cap">
                </div>

                <div class="card-body text-center">
                    <h1 class="card-title">নোটিশ বোর্ড</h1>
                    <p class="card-text">কৃষি মন্ত্রণালয় এবং কৃষি সম্প্রসারণ অধিদপ্তর থেকে প্রকাশিত নোটিশ দেখতে
                        নিচের বাটনে ক্লিক করুন </p>
                    <a href="http://localhost/Farming-assistant/notice.php"
                       class="btn btn-success">দেখুন</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include_once 'footer.php'; ?>