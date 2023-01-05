<?php

include_once 'manageBlog.php';
class BlogManagerFactory
{

    public $manager_type;
    public function __construct($manager_type)
    {

        $this->manager_type = $manager_type;
    }


    public function getManager($blog, $blog_info, $image_info = array())
    {
        if ($this->manager_type == "add") {
            return new AddBlog($blog, $blog_info, $image_info);
        } else  if ($this->manager_type == "update") {
            return new UpdateBlog($blog, $blog_info);
        } else   if ($this->manager_type == "delete") {
            return new DeleteBlog($blog, $blog_info);
        }
    }
}