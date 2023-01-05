<?php
session_start();
include 'Database.php';
include 'converter.php';
include '../classes/category.php';
include_once '../classes/managerFactory.php';
include_once '../classes/manageCategory.php';
include_once 'DatabaseEdited.php';
include_once '../admin_header.php';


$manager_type;
$category_info = array();
$category = new category();
$image_info = array();



if (isset($_GET['delete_id'])) {
    $manager_type = "delete";
    $category_info['category_id'] = $_GET['delete_id'];
}

if (isset($_POST['update_category'])) {
    $manager_type = "update";
    $category_info['update_id'] = $_POST['update_c_id'];
    $category_info['update_name'] = $_POST['update_name'];
    $category_info['update_image'] = $_FILES['update_image']['name'];
    $category_info['update_image_tmp_name'] = $_FILES['update_image']['tmp_name'];
    $update_image = $_FILES['update_image']['name'];
    $category_info['update_image_folder'] = '../assets/uploaded_img/category/' . $update_image;
    $category_info['update_old_image'] = $_POST['update_old_image'];
}

if (isset($_POST['add_category'])) {
    $manager_type = "add";

    $category_info['category_name'] = $_POST['name'];
    $category_info['category_img'] = $_FILES['image']['name'];
    $image_info['image_tmp_name'] = $_FILES['image']['tmp_name'];
    $image = $_FILES['image']['name'];
    $image_info['image_folder'] = '../assets/uploaded_img/category/' . $image;
}

if (isset($manager_type)) {
    $manager_factory = new ManagerFactory($manager_type);
    $manage_category = $manager_factory->getManager($category, $category_info, $image_info);

    $manager = new CategoryManager($manage_category);
    $manager->action();
}


$category_list = $category->viewAllCategory();
include '../product-category-page.php';