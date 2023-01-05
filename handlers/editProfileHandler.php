<?php
session_start();
include_once 'Database.php';
include_once 'DatabaseEdited.php';
include_once '../classes/users/user.php';
$db = EDatabase::getInstance();
$user = new user();
if (isset($_POST['update'])) {

    echo $edit_info['phone_number'] = $_POST['phone'];
    echo $edit_info['password'] = md5($_POST['password']);
    echo $edit_info['name'] = $_POST['name'];
    echo $edit_info['address'] = $_POST['address'];
    echo $edit_info['user_id'] = $_SESSION['user_id'];
    echo $old_password = md5($_POST['old-password']);

    $password_match = false;
    echo $sql1 = "SELECT password from user where user_id={$edit_info['user_id']}";
    $stmnt1 = $db->connection->prepare($sql1);
    if ($stmnt1->execute()) {

        while ($row = $stmnt1->fetch()) {
            if ($old_password == $row['password']) {
                echo  $password_match = true;
            }
        }
    }

    if ($password_match) {
        $sql = "SELECT COUNT(*) FROM user WHERE phone_number='{$edit_info['phone_number']}' AND user_id<>{$edit_info['user_id']}";
        $res = $db->connection->query($sql);
        $count = $res->fetchColumn();
        if ($count > 0) {
            $_SESSION['message'] = "প্রদত্ত নাম্বারে আগে থেকে একাউন্ট রয়েছে";
            header("location:../edit-profile-page.php");
        } else {
            $user->editUser($edit_info);
            echo "profile edit successfull";
            header("location:../index.php");
        }
    } else {
        $_SESSION['message'] = "ভুল পাসওয়ার্ড দিয়েছেন!";
        header("location:../edit-profile-page.php");
    }
}