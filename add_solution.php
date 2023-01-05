<?php
require_once 'DatabaseEdited.php';
session_start();

$data=[
    'problem_id'=>$_GET['problem_id'],
    'solution_des'=>$_POST['solution_des'],
    'user_id'=>$_SESSION['user_id']
];


$db=EDatabase::getInstance();

if(!$db->insert('solution',$data)){
    $stmt=$db->connection->prepare('update solution set solution_des=:solution_des, user_id=:user_id where problem_id=:problem_id');
    $stmt->execute([
        ':problem_id'=>$_GET['problem_id'],
        ':solution_des'=>$_POST['solution_des'],
        ':user_id'=>$_SESSION['user_id']
    ]);
}

header('location:display_problem.php');