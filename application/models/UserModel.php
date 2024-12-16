<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
  public function register($arUserData)
  {
    $this->db->insert('users', $arUserData);
  }

  public function getUserByLogin($sLogin)
  {
    return $this->db->where('login', $sLogin)->get('users')->row_array();
  }
}
