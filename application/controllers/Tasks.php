<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('TasksModel');

    if(!$this->session->userdata('user'))
      redirect('user/login');
  }

  public function index()
  {
    $userId = $this->session->userdata('user')['id'];

    $params = [
      'user_id' => $userId
    ];

    $res = $this->TasksModel->getTasks($params);

    $this->load->view('tasks/index', [
      "tasks" => @$res["data"] ?: []
    ]);
  }

  public function tasksList()
  {
    $userId = $this->session->userdata('user')['id'];

    $params = [
      'user_id' => $userId
    ];

    $res = $this->TasksModel->getTasks($params);
    echo json_encode($res);
  }

  public function add()
  {
    $this->load->view('tasks/add');
  }

  public function create()
  {
    $userId = $this->session->userdata('user')['id'];
    $params = [
      'name'    => $this->input->post('name'),
      'descr'   => $this->input->post('descr'),
      'status'  => $this->input->post('status'),
      'user_id' => $userId,
      'created_at' => date('Y-m-d H:i:s')
    ];

    $res = $this->TasksModel->create($params);

    echo json_encode($res);
  }

  public function edit($id)
  {
    $params = [
      "id" => $id
    ];

    $res = $this->TasksModel->edit($params);

    $this->load->view('tasks/edit', [
      "id" => $id,
      "arTask" => @$res['data'] ?: []
    ]);
  }

  public function update($id)
  {
    $userId = $this->session->userdata('user')['id'];
    $params = [
      'id'      => $id,
      'name'    => $this->input->input_stream('name'),
      'descr'   => $this->input->input_stream('descr'),
      'status'  => $this->input->input_stream('status'),
      'user_id' => $userId,
      'updated_at' => date('Y-m-d H:i:s')
    ];

    $res = $this->TasksModel->update($params);

    echo json_encode($res);
  }

  public function delete($id)
  {
    $params = [
      'id' => $id,
      'deleted_at' => date('Y-m-d H:i:s')
    ];

    $res = $this->TasksModel->delete($params);

    echo json_encode($res);
  }
}
