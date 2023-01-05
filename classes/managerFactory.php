<?php

include_once 'manageCategory.php';
class ManagerFactory
{

    public $manager_type;
    public function __construct($manager_type)
    {

        $this->manager_type = $manager_type;
    }


    public function getManager($category, $category_info, $image_info = array())
    {
        if ($this->manager_type == "add") {
            return new AddCategory($category, $category_info, $image_info);
        } else  if ($this->manager_type == "update") {
            return new UpdateCategory($category, $category_info);
        } else   if ($this->manager_type == "delete") {
            return new DeleteCategory($category, $category_info);
        }
    }
}