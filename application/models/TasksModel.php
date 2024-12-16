<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TasksModel extends CI_Model
{
  public function create($params)
  {
    $result = $this->db->insert("tasks", $params);

    if($result)
    {
      $response = [
        "code" => 201,
        "message" => "Task created successfully!"
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

  public function edit($params)
  {
    $sql = "SELECT
                  `name`,
                  `descr`,
                  `status`
            FROM `tasks`
            WHERE `deleted_at` IS NULL
            AND `id` = {$params["id"]}
           ";

    $query = $this->db->query($sql);

    if (!$query->num_rows())
    {
      $response = [
        "code" => 204,
        "message" => "Error"
      ];

      return $response;
    }

    $data = $query->row_array();

    $response = [
      "code" => 200,
      "data" => $data,
      "message" => "Task fetched successfully!"
    ];

    return $response;
  }

  public function update($params)
  {
    $data = $params;
    unset($data["id"]);
    $result = $this->db->where('id', $params["id"])->update("tasks", $data);

    if($result)
    {
      $response = [
        "code" => 202,
        "message" => "Task updated successfully!"
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

  public function delete($params)
  {
    $data = $params;
    unset($data["id"]);
    $result = $this->db->where("id", $params["id"])->update("tasks", $data);

    if($result)
    {
      $response = [
        "code" => 202,
        "message" => "Task deleted successfully!"
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

  public function getTasks($params)
  {
    $sql = "SELECT
                  `id`,
                  `name`,
                  `status`
            FROM `tasks`
            WHERE `deleted_at` IS NULL
            AND `user_id` = {$params["user_id"]}
           ";

    $query = $this->db->query($sql);

    if (!$query->num_rows())
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
      "message" => "Task fetched successfully!"
    ];

    return $response;
  }
}
