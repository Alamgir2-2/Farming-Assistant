<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible"
              content="ie=edge">
        <title>Document</title>

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
        <style>
        body {
            background: url("https://fastcdn.impakter.com/wp-content/uploads/2019/08/Image-5.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-color: #b0bec5;
            color: black;
        }

        a {
            text-decoration: none;
            color: black;
            font-size: 19px;
            font-weight: 600;
        }

        .notice_container {
            text-align: center;
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

                $html = file_get_html("http://dam.gov.bd/damweb/PublicPortal/MarketDisplayFullScreenBangla.php");

                echo $html->find('#ticker_container', 0);
                ?>

                </div>
            </div>

        </div>


        <script type="text/javascript">
        $(document).ready(function() {

            var rowcount = 0;
            $('table td[rowspan]').parent().each(function(index) {
                if (rowcount % 2 == 0) {
                    $(this).css('background-color', 'green');
                    $(this).next('tr').css('background-color', 'green');

                    if ($(this).next('tr').find('td[rowspan]').length == 1) {
                        $(this).next('tr').css('background-color', '#ffffff');
                        index++;
                    }
                }
                rowcount++;
            });

            var table_ticker = setInterval(function() {
                var content = $('#example tr:first');

                if (content.next('tr').find('td[rowspan]').length) {
                    content1 = null;
                } else {
                    content = $('#example tr:first, #example tr:nth-child(2)');
                }

                $(content).animate({
                    opacity: 0 //use more parameter for effect
                }, 1200, function() {
                    $(content).css('opacity', 1);
                    $(content).appendTo('#example');
                    // Animation complete.
                });

            }, 10000);

        });
        </script>

    </body>

</html>