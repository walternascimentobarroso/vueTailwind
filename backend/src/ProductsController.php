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
    $result = $this->personGateway->find($id);
    if (!$result) {
      return $this->notFoundResponse();
    }
    $input = (array) json_decode(file_get_contents("php://input"), true);
    if (!$this->validatePerson($input)) {
      return $this->unprocessableEntityResponse();
    }
    $this->personGateway->update($id, $input);
    $response["status_code_header"] = "HTTP/1.1 200 OK";
    $response["body"] = null;
    return $response;
  }

  public function delete($id)
  {
    $result = $this->personGateway->find($id);
    if (!$result) {
      return $this->notFoundResponse();
    }
    $this->personGateway->delete($id);
    $response["status_code_header"] = "HTTP/1.1 200 OK";
    $response["body"] = null;
    return $response;
  }
}
