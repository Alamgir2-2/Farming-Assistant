<?php
session_start();

if (isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] == "admin") {
        include_once '../admin_header.php';
    } else if ($_SESSION['user_type'] == "agriculturist") {
        include_once '../agri_header.php';
    } else {
        header("location:../index.php");
    }
}
include_once 'DatabaseEdited.php';

include 'converter.php';
include '../classes/blog.php';
include_once '../classes/blogManagerFactory.php';
include_once '../classes/manageBlog.php';



$manager_type;
$blog_info = array();
$blog = new Blog();
$image_info = array();



if (isset($_GET['delete_id'])) {
    $manager_type = "delete";
    $blog_info['blog_id'] = $_GET['delete_id'];
}

if (isset($_POST['update_blog'])) {

    $manager_type = "update";
    $blog_info['update_id'] = $_POST['update_b_id'];

    $blog_info['update_name'] = $_POST['update_name'];
    $blog_info['update_description'] = $_POST['update_description'];
    $blog_info['update_category'] = $_POST['update_category'];
    $blog_info['update_image'] = $_FILES['update_image']['name'];
    $blog_info['update_image_tmp_name'] = $_FILES['update_image']['tmp_name'];
    $update_image = $_FILES['update_image']['name'];
    $blog_info['update_image_folder'] = '../assets/uploaded_img/blog/' . $update_image;
    $blog_info['update_old_image'] = $_POST['update_old_image'];
}

if (isset($_POST['add_blog'])) {
    $manager_type = "add";
    $blog_info["title"] = $_POST['name'];
    $blog_info["description"] = $_POST['description'];
    $blog_info["category"] = $_POST['category'];

    $blog_info["blog_img"] = $_FILES['image']['name'];

    $blog_info["author"] = $_SESSION['user_id'];
    $image_info['image_tmp_name'] = $_FILES['image']['tmp_name'];
    $image = $_FILES['image']['name'];
    $image_info['image_folder'] = '../assets/uploaded_img/blog/' . $image;
}

if (isset($manager_type)) {
    $manager_factory = new BlogManagerFactory($manager_type);
    $manage_blog = $manager_factory->getManager($blog, $blog_info, $image_info);

    $manager = new BlogManager($manage_blog);
    $manager->action();
}


$blog_list = $blog->viewAllBlogs();
include '../blog-details.php';