<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('UserModel');
    }

    public function register()
    {
      if($this->session->userdata('user'))
        redirect('tasks');

      if($this->input->post())
      {
        $arUserData = [
            'name' => $this->input->post('name'),
            'login' => $this->input->post('login'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
        ];
        $this->UserModel->register($arUserData);

        redirect('user/login');
      }

      $this->load->view('user/register');
    }

    public function login()
    {
      if($this->session->userdata('user'))
        redirect('tasks');

      if($this->input->post())
      {
        $sLogin = $this->input->post('login');
        $sPassword = $this->input->post('password');
        $arUser = $this->UserModel->getUserByLogin($sLogin);

        if($arUser && password_verify($sPassword, $arUser['password']))
        {
          $this->session->set_userdata('user', $arUser);

          redirect('tasks');
        }
      }

      $this->load->view('user/login');
    }

    public function logout()
    {
      $this->session->sess_destroy();

      redirect('user/login');
    }
}
