<?php
require_once 'DatabaseEdited.php';
session_start();

$db = EDatabase::getInstance();

$data = $db->fetch_data_with_one_column_check($_GET, 'problem', 'problem_id');

$sol = $db->fetch_data_with_one_column_check($_GET, 'solution', 'problem_id');

//die('count: '.count($sol));
?>



<!DOCTYPE html>
<html lang="en">

    <head>

        <title>কৃষি বিষয়ক সমস্যার সমাধান</title>
        <!-- favicons Icons -->
        <link rel="apple-touch-icon"
              sizes="180x180"
              href="assets/images/favicons/apple-touch-icon.png">
        <link rel="icon"
              type="image/png"
              sizes="32x32"
              href="assets/images/favicons/favicon-32x32.png">
        <link rel="icon"
              type="image/png"
              sizes="16x16"
              href="assets/images/favicons/favicon-16x16.png">
        <link rel="manifest"
              href="assets/images/favicons/site.webmanifest">

        <!-- fonts -->
        <link rel="preconnect"
              href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
              rel="stylesheet">

        <link rel="stylesheet"
              href="assets/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet"
              href="assets/css/swiper.min.css">
        <link rel="stylesheet"
              href="assets/css/animate.min.css">
        <link rel="stylesheet"
              href="assets/css/odometer.min.css">
        <link rel="stylesheet"
              href="assets/css/jarallax.css">
        <link rel="stylesheet"
              href="assets/css/magnific-popup.css">
        <link rel="stylesheet"
              href="assets/css/bootstrap-select.min.css">
        <link rel="stylesheet"
              href="assets/css/agrikon-icons.css">
        <link rel="stylesheet"
              href="assets/css/nouislider.min.css">
        <link rel="stylesheet"
              href="assets/css/nouislider.pips.css">

        <!-- template styles -->
        <link rel="stylesheet"
              href="assets/css/main.css">
    </head>

    <body>
        <div class="preloader">
            <img class="preloader__image"
                 width="55"
                 src="assets/images/loader.png"
                 alt="">
        </div><!-- /.preloader -->

        <div class="page-wrapper">

            <div class="stricky-header stricked-menu main-menu">
                <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
            </div><!-- /.stricky-header -->
            <section class="page-header">
                <div class="page-header__bg"
                     style="background-image: url(assets/images/page-header-bg-1-1.jpg);"></div>
                <!-- /.page-header__bg -->
                <div class="container">
                    <h2>কৃষি বিষয়ক সমস্যার সমাধান</h2>
                </div><!-- /.container -->
            </section><!-- /.page-header -->


            <section class="blog-details">
                <div class="container ">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="blog-details__image">
                                <?php if ($data[0]['img'] != "") : ?>
                                <img style="width: 99%;
    height: 400px;
    object-fit: cover;"
                                     src="assets/uploaded_img/<?php echo $data[0]['img']; ?>"
                                     class="img-fluid"
                                     alt="">
                                <?php endif; ?>
                            </div><!-- /.blog-details__image -->
                            <div class="blog-card__content">
                                <div class="blog-card__date"
                                     style="width: 136px;
    height: 98px;
    background-color: #6ab17b;"><?php echo $data[0]['date']; ?></div>
                                <!-- /.blog-card__date -->
                                <div class="blog-card__meta">
                                </div><!-- /.blog-card__meta -->
                                <h3><?php echo $data[0]['title']; ?></h3>
                            </div><!-- /.blog-card__content -->
                            <div class="blog-details__content">
                                <p><?php echo $data[0]['problem_des']; ?></p>

                            </div><!-- /.blog-details__content -->

                            <div class="blog-details__meta">
                                <div class="blog-details__tags">
                                </div><!-- /.blog-details__tags -->
                            </div><!-- /.blog-details__meta -->

                            <?php if (count($sol) > 0) : ?>
                            <div class="blog-author">
                                <div class="blog-author__content">
                                    <h3>সমাধান</h3>
                                    <p><?php echo $sol[0]['solution_des']; ?></p>
                                </div><!-- /.blog-author__content -->
                            </div><!-- /.blog-author -->
                            <?php endif; ?>

                            <?php if ($_SESSION['user_type'] == 'agriculturist') : ?>
                            <div class="comment-form">
                                <h2>সমস্যার সমাধান লিখুন</h2>

                                <form action="add_solution.php?problem_id=<?php echo $_GET['problem_id']; ?>"
                                      method="post"
                                      class="contact-one__form">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <textarea placeholder="কৃষি বিষয়ক সমস্যার সমাধান লিখুন"
                                                      class="textarea"
                                                      name="solution_des"
                                                      id="solution_des"></textarea>
                                        </div><!-- /.col-lg-12 -->
                                        <div class="col-lg-12">
                                            <input type="submit"
                                                   class="thm-btn"
                                                   value="প্রেরণ করুন"><!-- /.thm-btn -->
                                        </div><!-- /.col-lg-12 -->
                                    </div><!-- /.row -->
                                </form>
                            </div><!-- /.comment-form -->

                            <?php endif; ?>
                        </div><!-- /.col-lg-8 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.blog-details -->
        </div><!-- /.page-wrapper -->


        <a href="#"
           data-target="html"
           class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/swiper.min.js"></script>
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/wow.js"></script>
        <script src="assets/js/odometer.min.js"></script>
        <script src="assets/js/jquery.appear.min.js"></script>
        <script src="assets/js/jarallax.min.js"></script>
        <script src="assets/js/circle-progress.min.js"></script>
        <script src="assets/js/wNumb.min.js"></script>
        <script src="assets/js/nouislider.min.js"></script>

        <!-- template js -->
        <script src="assets/js/theme.js"></script>
    </body>

</html>