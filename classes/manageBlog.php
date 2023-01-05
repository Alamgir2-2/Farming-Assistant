<?php



interface ManageBlog
{
    public function manage();
}

class AddBlog implements ManageBlog
{
    public $blog;

    public $blog_info = array();
    public $image_info = array();
    public function __construct($blog, $blog_info, $image_info)
    {
        $this->blog_info = $blog_info;
        $this->blog = $blog;
        $this->image_info = $image_info;
    }
    public function manage()
    {

        if ($this->blog->addBlog($this->blog_info)) {


            move_uploaded_file($this->image_info['image_tmp_name'], $this->image_info['image_folder']);
        }
    }
}



class UpdateBlog implements ManageBlog
{
    public $blog;
    public $edit_info = array();

    public function __construct($blog, $edit_info)
    {

        $this->blog = $blog;
        $this->edit_info = $edit_info;
    }

    public function manage()
    {

        $this->blog->editBlog($this->edit_info);
    }
}

class DeleteBlog implements ManageBlog
{
    public $blog;
    public $delete_info = array();
    public function __construct($blog, $delete_info)
    {
        $this->delete_info = $delete_info;
        $this->blog = $blog;
    }
    public function manage()
    {
        if ($this->blog->deleteBlog($this->delete_info)) {
        }
    }
}

class BlogManager
{

    public  $manageBlog;
    public function __construct(ManageBlog $manageBlog)
    {
        $this->manageBlog = $manageBlog;
    }
    public function action()
    {
        return $this->manageBlog->manage();
    }
}