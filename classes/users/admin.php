<?php




class admin extends user
{



  function __construct()
  {
    $this->db = EDatabase::getInstance();
    $this->user_info['user_type'] = "admin";
  }
}