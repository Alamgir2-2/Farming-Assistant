<?php


class agriculturist extends user
{



  function __construct()
  {
    $this->db = EDatabase::getInstance();
    $this->user_info['user_type'] = "agriculturist";
  }



  public function addAgri($signup_info)
  {
    if ($this->memberExist($signup_info['phone_number'])) {
      $_SESSION['message'] = "একই নাম্বারে একাধিক একাউন্ট গ্রহণযোগ্য নয়!";
    } else {
      $this->db->insert($this->table, $signup_info);
      $_SESSION['message'] = "নতুন কৃষিবিদ যোগ করা হয়েছে";
    }
  }
}