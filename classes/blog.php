<?php
//implements ExistingCheckable
class Blog
{

    public $table = "blog";
    public $db;
    function __construct()
    {
        $this->db = EDatabase::getInstance();
    }


    // public function checkExisting(ExistingChecker $ex, $category_info = array())
    // {
    //     if ($ex->checkExistingCategory($category_info)) {
    //         echo "category existing";
    //     } else {
    //         echo "no existing found";
    //     }
    // }


    function addBlog($blog_info)
    {


        if ($this->db->insert($this->table, $blog_info)) {


            return true;
        }
    }


    public function deleteBlog($where)
    {

        $sql = "DELETE FROM $this->table WHERE blog_id={$where['blog_id']}";
        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        if ($statement->execute()) {

            return true;
        } else {

            return false;
        }
    }


    public function countBlogs()
    {
        return (count($this->db->fetch_all_data($this->table)));
    }

    public function editBlog($edit_info = array())
    {
        $update_query =  "UPDATE $this->table SET  title='{$edit_info["update_name"]}',description='{$edit_info["update_description"]}',category='{$edit_info["update_category"]}',blog_img='{$edit_info["update_image"]}' WHERE blog_id={$edit_info["update_id"]}";
        $stmnt = $this->db->connection->prepare($update_query);
        $stmnt->execute() or die("update query failed");
        move_uploaded_file($edit_info['update_image_tmp_name'], $edit_info['update_image_folder']);
        unlink('../assets/uploaded_img/blog/' . $edit_info['update_old_image']);
        unset($_GET['update_id']);
    }
    function viewAllBlogs()
    {



        $blog_list = array();
        $blog = array();
        $result = $this->db->fetch_all_data($this->table);


        if (count($result)) {
            $blog_list = array();
            foreach ($result as $r) {

                $sql = "SELECT name from user where user_id={$r['author']}";
                $stmnt = $this->db->connection->prepare($sql);
                $stmnt->execute();
                while ($row = $stmnt->fetch()) {
                    $blog["author"] = $row['name'];
                }

                $blog['title'] = $r['title'];
                $blog['category'] = $r['category'];
                $blog['blog_id'] = $r['blog_id'];

                $blog_list[] = $blog;
            }
        }
        return $blog_list;
    }
}