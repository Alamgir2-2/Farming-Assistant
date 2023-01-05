<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="//bangladesh.gov.bd/nav/js/obd.main.js?v=1.0.1"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <style>
        body {
            background: url("https://fastcdn.impakter.com/wp-content/uploads/2019/08/Image-5.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            /* background-color: #e2e8f0; */
            background-color: #b0bec5;
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
    <h1>নোটিশ : কৃষি মন্ত্রণালয়</h1>
    <hr>
    <div class="container">

        <?php

        require_once "simple_html_dom.php";

        $html = file_get_html("http://moa.gov.bd/site/view/notices");

        echo $html->find('#example1', 0);
        ?>
    </div>
    </div>


    <div class="notice_container m-5">
    <h1>নোটিশ : কৃষি সম্প্রসারণ অধিদপ্তর</h1>
    <hr>
    <div class="container">

        <table id="example2" class="table table-striped bordered table-hover" cellspacing="0" width="100%"
               style="width:100%">
            <thead>
            <tr>
                <th>ক্রমিক</th>
                <th>শিরোনাম</th>
                <th>প্রকাশের তারিখ</th>
                <th>ডাউনলোড</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    </div>

</div>


<script>

    $(document).ready(function () {
        var domainId = '118';
        var subdomain = 'moa.portal.gov.bd';
        var contentType = 'notices';
        var cur_lang = 'bn';
        console.log('///api/datatable/notices_view.php?domain_id=' + domainId + '&lang=' + cur_lang + '&subdomain=' + subdomain + '&content_type=' + contentType);
        $('#example1').DataTable({
            "lengthMenu": [[20, 40, 60, 80, 100], [20, 40, 60, 80, 100]],
            /*"bPaginationType": "full_numbers",*/
            "bProcessing": true,
            "bServerSide": true,
            "ordering": false,
            "sAjaxSource": '//moa.gov.bd/api/datatable/notices_view.php?domain_id=' + domainId + '&lang=' + cur_lang + '&subdomain=' + subdomain + '&content_type=' + contentType,
            "sServerMethod": "POST"
        });
    });

    $(document).ready(function () {
        var domainId = '6261';
        var subdomain = 'dae.portal.gov.bd';
        var contentType = 'notices';
        var cur_lang = 'bn';
        console.log('///api/datatable/notices_view.php?domain_id=' + domainId + '&lang=' + cur_lang + '&subdomain=' + subdomain + '&content_type=' + contentType);
        $('#example2').DataTable({
            "lengthMenu": [[20, 40, 60, 80, 100], [20, 40, 60, 80, 100]],
            /*"bPaginationType": "full_numbers",*/
            "bProcessing": true,
            "bServerSide": true,
            "ordering": false,
            "sAjaxSource": '//www.dae.gov.bd/api/datatable/notices_view.php?domain_id=' + domainId + '&lang=' + cur_lang + '&subdomain=' + subdomain + '&content_type=' + contentType,
            "sServerMethod": "POST"
        });
    });

</script>

</body>
</html>




