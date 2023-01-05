<?php
session_start();
include_once '../admin_header.php';
include_once 'DatabaseEdited.php';
include_once 'Database.php';
include_once '../classes/users/user.php';
include_once '../classes/users/agriculturist.php';


$a = new agriculturist();
if (isset($_GET['delete_id'])) {
    $a->deleteUser($_GET['delete_id']);
}


if (isset($_POST['add_agri'])) {


    $agri_info["name"] =  $_POST['name'];
    $agri_info["phone_number"] =  $_POST['phone'];
    $agri_info["address"] =  $_POST['address'];
    $agri_info["user_type"] = 'agriculturist';
    $agri_info['password'] = md5($_POST['password']);






    $a->addAgri($agri_info);
    unset($_POST['add_agri']);
}



$agri_list = $a->viewAllMembers();
include '../agri-details.php';