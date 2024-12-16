<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('StudentModel');
  }

  public function index()
  {
    $this->load->view('student/index');
  }

  public function unisList()
  {
    $keyword = $this->input->get("keyword");

    if(!!$keyword)
    {
      $params = [
        "keyword" => $keyword
      ];

      $res = $this->StudentModel->getUniversities($params);
    }
    else
    {
      $res = $this->StudentModel->getUniversities();
    }

    echo json_encode($res);
  }

  public function list($uni)
  {
    $this->load->view('student/list', [
      "uni" => $uni
    ]);
  }

  public function studentsList($uni)
  {
    $params = [
      "uni" => $uni
    ];

    $keyword = $this->input->get("keyword");

    if(!!$keyword)
    {
      $params["keyword"] = $keyword;
    }

    $res = $this->StudentModel->getStudents($params);
    echo json_encode($res);
  }

  public function delete($id)
  {
    $params = [
      "id" => $id,
      "deleted_at" => date('Y-m-d H:i:s')
    ];
    $res = $this->StudentModel->delete($params);
    echo json_encode($res);
  }
}
