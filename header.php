<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge" />
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet"
              href="../assets/css/bootstrap.min.css" />
        <link rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link rel="stylesheet"
              href="../assets/icon/bootstrap-icons.css" />
        <link rel="stylesheet"
              href="../assets/sass/style.css" />
        <link rel="stylesheet"
              href="../assets/sass/sidenav.css" />
        <link rel="stylesheet"
              href="../assets/sass/loginpage.css" />

    </head>

    <body>
        <header>
            <div class="mySidenav sidenav">
                <button class="closebtn"
                        onclick="closeNav()">&times;</button>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Clients</a>
                <a href="#">Contact</a>
            </div>



            <nav class="navbar navbar-expand-lg my-nav">
                <div class="container-fluid row">
                    <div class="nav-div1 col-lg-6">
                        <h2 class="open"
                            onclick="openNav()"><i class="bi bi-box-arrow-right"></i></i></i></h2>
                        <a class="navbar-brand"
                           href="#">Navbar</a>
                    </div>
                    <div class="nav-div2 col-lg-6">
                        <button class="navbar-toggler"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse"
                             id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active"
                                       aria-current="page"
                                       href="#">হোম</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="#">ব্লগ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="#">নোটিশ</a>
                                </li>



                                <div class="search">
                                    <button class="search-button">
                                        <i class="bi bi-search"></i>
                                    </button>
                                    <input type="text"
                                           class="input"
                                           placeholder="Search..." />
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>