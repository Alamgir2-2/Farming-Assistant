<?php
include_once 'Database.php';
interface ExistingCheckable


{
    public function checkExisting(ExistingChecker $ex, $category_info = array());
}

class ExistingChecker
{

    public function __construct()
    {
        $this->db = database::getInstance();
    }
    public function checkExistingCategory($category_info)
    {
        $found_row = $this->db->fetch_data_with_one_column_check($category_info, "category", "category_name");
        print(count($found_row));
        return (count($found_row) > 0);
    }
    public function checkExistingUser($user_info)
    {
        $found_row = $this->db->fetch_data_with_one_column_check($user_info, "user", "user_id");
        print(count($found_row));
        if (count($found_row) > 0) {
            return true;
        } else {
            return false;
        }
    }
}