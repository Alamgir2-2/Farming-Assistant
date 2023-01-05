<?php

class user
{
  public $table = "user";
  public $user_info;
  public $db;
  function __construct()
  {


    $this->db = EDatabase::getInstance();
  }



  public function login($login_info)
  {
    $found_row = $this->db->fetch_data_with_two_column_check($login_info, $this->table, "phone_number", "password");

    if (count($found_row) > 0) {
      echo "login successfull";
      echo  $_SESSION['user_id'] = $found_row[0]['user_id'];
      echo $_SESSION['user_type']
        = $found_row[0]['user_type'];
      $_SESSION['message'] = "লগইন সফল হয়েছে!";
      header("location:http://localhost/Farming-assistant/index.php");
    } else {
      $_SESSION['message'] = "লগইন ব্যার্থ হয়েছে। সঠিক তথ্য দিয়ে পুনরায় চেষ্টা করুন";
      header("location:http://localhost/Farming-assistant/loginpage.php");
    }
  }
  public function deleteUser($where = null)
  {

    $sql = "DELETE FROM $this->table WHERE user_id=$where";
    $statement = $this->db->connection->prepare($sql);
    $statement->execute();
    if ($statement->execute()) {

      $sql = "DELETE FROM product WHERE farmer_id=$where";
      $product_delete = $this->db->connection->prepare($sql);
      $product_delete->execute();
      if ($product_delete->execute()) {

        return true;
      }
    } else {

      return false;
    }
  }

  public function signup($signup_info)
  {
    if ($this->memberExist($signup_info['phone_number'])) {
      $_SESSION['message'] = "একই নাম্বারে একাধিক একাউন্ট গ্রহণযোগ্য নয়!";

      header("Location:../signup-page.php");
    } else {
      $this->db->insert($this->table, $signup_info);
      $_SESSION['message'] = "একাউন্ট তৈরি সফল হয়েছে। লগিন করুন!";
      header("Location:../loginpage.php");
    }
  }

  public function memberExist($phone_number)
  {
    $row = array();
    $sql = "select * from $this->table Where phone_number=$phone_number";

    $statement = $this->db->connection->prepare($sql);
    $statement->execute();
    if ($statement->rowCount()) {
      $row = $statement->fetchAll();

      return true;
    } else {

      return false;
    }
  }
  public function viewAllMembers()
  {


    $members = $this->db->fetch_data_with_one_column_check($this->user_info, $this->table, "user_type");
    return $members;
  }

  public function countMembers()
  {
    return (count($this->viewAllMembers()));
  }




  public function editUser($edit_info = array())
  {


    echo  $update_query =  "UPDATE $this->table SET  name='{$edit_info["name"]}',phone_number='{$edit_info["phone_number"]}',address='{$edit_info["address"]}',password='{$edit_info["password"]}' WHERE user_id={$edit_info["user_id"]}";
    $stmnt = $this->db->connection->prepare($update_query);
    $stmnt->execute() or die("update query failed");
  }
}