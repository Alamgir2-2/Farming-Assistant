<?php
session_start();
include_once 'Database.php';
include_once 'DatabaseEdited.php';
include_once '../classes/users/user.php';
include_once '../classes/users/farmer.php';
include_once '../classes/users/admin.php';
include_once '../classes/users/customer.php';
include_once '../classes/users/agriculturist.php';
include_once 'UserFactory.php';

if (isset($_POST['phone'])) {

    echo $signup_info['phone_number'] = $_POST['phone'];
    echo $signup_info['password'] = md5($_POST['password']);
    echo $signup_info['name'] = $_POST['name'];
    echo $signup_info['address'] = $_POST['address'];
    $signup_info['user_type'] = $_POST['user_type'];



    print_r($signup_info);

    $userFactory = new userFactory();
    $user = $userFactory->getUser($_POST['user_type']);
    $user->signup($signup_info);
}