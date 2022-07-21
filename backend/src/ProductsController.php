<?php

namespace App;

/**
 * SQLite connnection
 */
class ProductsController
{
  public function getAll()
  {
    $result = (new DAOProducts())->getAll();
    // $result = (new DAOProducts())->createTables();
    $response["status_code_header"] = "HTTP/1.1 200 OK";
    $response["body"] = json_encode($result);
    return $response;
  }

  public function get($id)
  {
    $result = (new DAOProducts())->get($id);
    $response["status_code_header"] = "HTTP/1.1 200 OK";
    $response["body"] = json_encode($result);
    return $response;
  }

  public function create()
  {
    $data = (array) json_decode(file_get_contents("php://input"), true);

    (new DAOProducts())->insert($data);
    $response["status_code_header"] = "HTTP/1.1 201 Created";
    $response["body"] = null;
    return $response;
  }

  public function update($id)
  {
    $data = (array) json_decode(file_get_contents("php://input"), true);
    (new DAOProducts())->update($id, $data);
    $response["status_code_header"] = "HTTP/1.1 200 OK";
    $response["body"] = null;
    return $response;
  }

  public function delete($id)
  {
    (new DAOProducts())->delete($id);
    $response["status_code_header"] = "HTTP/1.1 200 OK";
    $response["body"] = null;
    return $response;
  }
}
