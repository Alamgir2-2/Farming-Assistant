<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible"
              content="ie=edge">
        <title>Weather</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>

        <script type="text/javascript"
                src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="//bangladesh.gov.bd/nav/js/obd.main.js?v=1.0.1"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet"
              href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />

        <link rel="stylesheet"
              href="https://www.bamis.gov.bd/assets/css/bootstrap.min.css?v=v2.022051" />
        <link rel="stylesheet"
              href="https://www.bamis.gov.bd/assets/css/owl.carousel.min.css?v=v2.022051" />
        <link rel="stylesheet"
              href="https://www.bamis.gov.bd/assets/css/font-awesome.min.css?v=v2.022051" />
        <link rel="stylesheet"
              href="https://www.bamis.gov.bd/assets/css/select2.min.css?v=v2.022051" />
        <link rel="stylesheet"
              href="https://www.bamis.gov.bd/assets/css/select2-bootstrap4.min.css?v=v2.022051" />
        <link rel="stylesheet"
              href="https://www.bamis.gov.bd/assets/css/jquery.fancybox.min.css?v=v2.022051" />
        <link rel="stylesheet"
              href="https://www.bamis.gov.bd/assets/css/responsive.css?v=v2.022051" />
        <link rel="stylesheet"
              href="https://www.bamis.gov.bd/assets/css/bamis.css?v=v2.022051" /> <!-- scripts -->


        <!-- <style>
        #loadingDiv {
            width: 100px;
            height: 5px;
            background-color: green;
            animation-name: LoadingDiv;
            animation-duration: 15s;
            animation-iteration-count: infinite;
        }
        #loadingWrap{
            display:block;
            height:5px;
            background-color: yellow;
        }
        @keyframes LoadingDiv {
            from {width: 1px;}
            to {width: 100%;}
        }
        @-webkit-keyframes LoadingDiv {
            from {width: 1px;}
            to {width: 100%;}
        }
        @-moz-keyframes LoadingDiv {
            from {width: 1px;}
            to {width: 100%;}loadPageUrl
        }
        @-ms-keyframes LoadingDiv {
            from {width: 1px;}
            to {width: 100%;}
        } -->
        <style>
        .single_big_btn_menu {
            display: none;
        }
        </style>


        <style>
        body {
            background: url("https://fastcdn.impakter.com/wp-content/uploads/2019/08/Image-5.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-color: #b0bec5;
        }

        .notice_container {
            box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
            border-radius: 5px;
            background-color: rgba(255, 255, 255, .25);

            backdrop-filter: blur(5px);
        }
        </style>
    </head>

    <body>

        <div class="container m-5">

            <div class="notice_container m-5">
                <div class="container">

                    <?php

                require_once "simple_html_dom.php";

                $html = file_get_html("https://www.bamis.gov.bd/bulletin/district/current/0");

                echo $html->find('#the_main_container', 0);

                $scripts = $html->find('script');

                foreach ($scripts as $script) {
                    echo $script;
                }

                ?>

                </div>
            </div>

        </div>

        <script>
        $('.single_big_btn_menu').hide();
        </script>
    </body>

</html>