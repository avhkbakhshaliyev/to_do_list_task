<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model
{
  public function getUniversities($params = null)
  {
    $sql = "SELECT DISTINCT
                  `university`
            FROM `students`
            ";

    if(!!$params)
    {
      $keyword = $params["keyword"];
      $sql .= " WHERE `university` LIKE '%{$keyword}%'";
    }

    $query = $this->db->query($sql);

    if(!$query->num_rows())
    {
      $response = [
        "code" => 204,
        "message" => "Error"
      ];

      return $response;
    }

    $data = $query->result_array();

    $response = [
      "code" => 200,
      "data" => $data,
      "message" => "Universities fetched successfully!"
    ];

    return $response;
  }

  public function getStudents($params)
  {
    $uni = strtoupper($params["uni"]);

    $sql = "SELECT *
            FROM `students`
            WHERE `university` = '{$uni}'
            AND `deleted_at` IS NULL
            ";

    $keyword = @$params["keyword"]?:null;

    if(!!$keyword)
    {
      $sql .= " AND `name` LIKE '%{$keyword}%'";
    }

    $query = $this->db->query($sql);

    if(!$query->num_rows())
    {
      $response = [
        "code" => 204,
        "message" => "Error"
      ];

      return $response;
    }

    $data = $query->result_array();

    $response = [
      "code" => 200,
      "data" => $data,
      "message" => "Students fetched successfully!"
    ];

    return $response;
  }

  public function delete($params)
  {
    $data = $params;
    unset($data["id"]);
    $result = $this->db->where("id", $params["id"])->update("students", $data);

    if($result)
    {
      $response = [
        "code" => 202,
        "message" => "Student deleted successfully!"
      ];
    }
    else
    {
      $response = [
        "code" => 204,
        "message" => "Error"
      ];
    }

    return $response;
  }
}
