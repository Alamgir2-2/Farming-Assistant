<?php



interface ManageCategory
{
    public function manage();
}

class AddCategory implements ManageCategory
{
    public $category;

    public $category_info = array();
    public $image_info = array();
    public function __construct($category, $category_info, $image_info)
    {
        $this->category_info = $category_info;
        $this->category = $category;
        $this->image_info = $image_info;
    }
    public function manage()
    {

        if ($this->category->addCategory($this->category_info)) {

            move_uploaded_file($this->image_info['image_tmp_name'], $this->image_info['image_folder']);
        }
    }
}



class updateCategory implements ManageCategory
{
    public $category;
    public $edit_info = array();

    public function __construct($category, $edit_info)
    {

        $this->category = $category;
        $this->edit_info = $edit_info;
    }

    public function manage()
    {

        $this->category->editCategory($this->edit_info);
    }
}

class DeleteCategory implements ManageCategory
{
    public $category;
    public $delete_info = array();
    public function __construct($category, $delete_info)
    {
        $this->delete_info = $delete_info;
        $this->category = $category;
    }
    public function manage()
    {
        $this->category->deleteCategory($this->delete_info);
    }
}

class CategoryManager
{

    public  $manageCategory;
    public function __construct(ManageCategory $manageCategory)
    {
        $this->manageCategory = $manageCategory;
    }
    public function action()
    {
        return $this->manageCategory->manage();
    }
}