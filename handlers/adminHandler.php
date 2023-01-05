<?php
session_start();
include_once '../admin_header.php';
include_once 'DatabaseEdited.php';
include_once 'Database.php';
include_once '../classes/users/user.php';
include_once '../classes/users/admin.php';






if (isset($_POST['add_admin'])) {
    echo "post ";

    echo $admin_info["name"] =  $_POST['name'];
    echo $admin_info["phone_number"] =  $_POST['phone'];
    echo $admin_info["address"] =  $_POST['address'];
    echo $admin_info["user_type"] = 'admin';
    echo $admin_info['password'] = $_POST['password'];
    print_r($admin_info);




    $a = new admin();
    if ($a->signup($admin_info)) {
        echo "new adminculturist added";
    }
}

$a = new admin();

$admin_list = $a->viewAllMembers();
if (($a->countMembers()) > 0) {
    include '../admin-details.php';
}