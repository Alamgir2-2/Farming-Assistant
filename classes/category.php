<?php
//implements ExistingCheckable
class category
{

    public $table = "product_category";
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


    function addCategory($category_info)
    {


        if ($this->db->insert($this->table, $category_info)) {

            return true;
        }
    }


    public function deleteCategory($where)
    {

        $sql = "DELETE FROM $this->table WHERE category_id={$where['category_id']}";
        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        if ($statement->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function editCategory($edit_info = array())
    {
        $update_query =  "UPDATE $this->table SET  category_name='{$edit_info["update_name"]}',category_img='{$edit_info["update_image"]}' WHERE category_id={$edit_info["update_id"]}";
        $stmnt = $this->db->connection->prepare($update_query);
        $stmnt->execute() or die("update query failed");
        move_uploaded_file($edit_info['update_image_tmp_name'], $edit_info['update_image_folder']);
        unlink('../assets/uploaded_img/category/' . $edit_info['update_old_image']);
        unset($_GET['update_id']);
    }

    public function viewAllCategory()
    {
        $result = $this->db->fetch_all_data($this->table);
        return $result;
    }
}