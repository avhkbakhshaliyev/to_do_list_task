<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if(!$this->session->userdata('user'))
      redirect('user/login');
  }

  public function index()
  {
    $this->load->view('home/index.php');
  }
}
