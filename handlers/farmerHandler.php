<?php
session_start();
include_once '../admin_header.php';
include_once 'DatabaseEdited.php';
include_once 'Database.php';
include_once '../classes/users/user.php';
include_once '../classes/users/farmer.php';





$a = new farmer();

if (isset($_GET['delete_id'])) {
    $a->deleteUser($_GET['delete_id']);
}


$farmer_list = $a->viewAllMembers();
include '../farmer-details.php';