<?php

require_once 'DatabaseEdited.php';
session_start();
//die(dirname(__FILE__));

$file_name=$_FILES['img']['name'];

move_uploaded_file($_FILES['img']['tmp_name'],"assets/uploaded_img/".$file_name);



$data=[
    'title'=>$_POST['title'],
    'problem_des'=>$_POST['problem_des'],
    'img'=>$file_name,
    'user_id'=>$_SESSION['user_id']
];


$db=EDatabase::getInstance();

$db->insert('problem',$data);

print_r($data);


header('location: display_problem.php');