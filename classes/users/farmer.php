<?php




class farmer extends user
{



  function __construct()
  {

    $this->user_info['user_type'] = "farmer";
    $this->db = EDatabase::getInstance();
  }
}