<?php

include_once 'handlers/DatabaseEdited.php';

$db = EDatabase::getInstance();



if (isset($_SESSION['user_id'])) {

      $sql = "SELECT * from user where user_id={$_SESSION['user_id']}";
      $stmnt = $db->connection->prepare($sql);
      $stmnt->execute();

      while ($row = $stmnt->fetch()) {
            $user_info['name'] = $row['name'];
            $user_info['phone_number'] = $row['phone_number'];
      }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge" />
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0" />
        <title>Farming-Assistant</title>
        <!-- Font awesome cdn link -->

        <link rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css" />

        <link rel="stylesheet"
              href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
              crossorigin="anonymous">
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">

        <!-- bootstrap paths -->

        <link rel="stylesheet"
              href="assets/css/bootstrap.min.css" />

        <link rel="stylesheet"
              href="../assets/css/bootstrap.min.css" />

        <link rel="stylesheet"
              href="../assets/icon/bootstrap-icons.css" />
        <link rel="stylesheet"
              href="assets/icon/bootstrap-icons.css" />
        <link rel="stylesheet"
              href="assets/custom/loginpage.css" />
        <!-- Custom css files -->

        <link rel="stylesheet"
              href="assets/custom/style.css" />

        <!-- bootstrap paths -->


        <!-- Custom css files -->

        <link rel="stylesheet"
              href="../assets/custom/style.css" />

        <link rel="stylesheet"
              href="../assets/custom/loginpage.css" />
        <!-- Bootstrap CSS -->

        <style>
        a {
            text-decoration: none;
            text-decoration-color: none;
        }

        .container {
            margin-top: 3%;
        }

        .inner {
            overflow: hidden;
        }

        .inner img {
            transition: all 1.5s ease;
        }

        .inner:hover img {
            transform: scale(1.5);
        }
        </style>

    </head>

    <body>
        <header class="header">
            <a href="#"
               class="logo">Farming<span>Assistant</span></a>

            <nav class="navbar">
                <a href="http://localhost/Farming-assistant/index.php">হোম</a>

                <a href="http://localhost/Farming-assistant/noticeboard.php">খবরাখবর</a>
                <a href="http://localhost/Farming-assistant/market.php">কৃষিপণ্য</a>

            </nav>

            <div class="icons">
                <div id="menu-btn"
                     class="fas fa-bars"></div>

                <a href="http://localhost/Farming-assistant/logoutpage.php">
                    <div title="লগআউট করুন"
                         class="bi bi-box-arrow-right">
                        </button>
                    </div>
                </a>

                <div id="info-btn"
                     class="fas fa-info-circle"></div>
            </div>


        </header>

        <div class="contact-info">
            <div id="close-contact-info"
                 class="fas fa-times"></div>
            <div class="info">
                <a href="http://localhost/Farming-assistant/edit-profile-page.php"><i class="fas fa-user-edit"></i></a>
                <h3><?php echo $user_info['name'] ?></h3>
                <p><?php echo $user_info['phone_number'] ?></p>
            </div>

            <div id="side-actions">
                <div class="action"><a style="text-decoration:none;"
                       href="http://localhost/Farming-assistant/admin-panel.php"> এডমিন প্যানেল</a>
                </div>
                <div class="action"><a style="text-decoration:none;"
                       href="http://localhost/Farming-assistant/handlers/adminHandler.php">এডমিনদের
                        বিবরণ </a>
                </div>
                <div class="action"><a style="text-decoration:none;"
                       href="http://localhost/Farming-assistant/handlers/farmerHandler.php"> কৃষকদের
                        বিবরণ</a>
                </div>
                <div class="action"><a style="text-decoration:none;"
                       href="http://localhost/Farming-assistant/handlers/agriHandler.php"> কৃষিবিদদের
                        বিবরণ</a>
                </div>
                <div class="action"><a style="text-decoration:none;"
                       href="http://localhost/Farming-assistant/handlers/customerHandler.php"> ক্রেতাদের
                        বিবরণ</a>
                </div>
                <div class="action"><a style="text-decoration:none;"
                       href="http://localhost/Farming-assistant/handlers/productHandler.php"> কৃষিপণ্য
                        ম্যানেজ
                        করুন</a></div>
                <div class="action"><a style="text-decoration:none;"
                       href="http://localhost/Farming-assistant/handlers/orderHandler.php"> অর্ডার
                        ম্যানেজ
                        করুন</a>
                </div>
                <div class="action"><a style="text-decoration:none;"
                       href="http://localhost/Farming-assistant/handlers/blogHandler.php"> ব্লগ ম্যানেজ
                        করুন</a>
                </div>
                <div class="action"><a style="text-decoration:none;"
                       href="http://localhost/Farming-assistant/handlers/categoryHandler.php">
                        কৃষিপণ্যের
                        ক্যাটাগরি ম্যানেজ করুন</a>
                </div>

            </div>
        </div>
        </div>

        <!-- header section ends -->