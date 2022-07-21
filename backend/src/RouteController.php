<?php

namespace App;

/**
 * SQLite connnection
 */
class RouteController
{
  private $requestMethod;
  private $uri;
  private $controller;

  public function __construct($requestMethod, $uri)
  {
    $this->requestMethod = $requestMethod;
    $this->uri = $uri;
    $this->loadController();
  }

  private function loadController()
  {
    $this->controller = new ProductsController();
  }

  public function processRequest()
  {
    switch ($this->requestMethod) {
      case "GET":
        if ($this->uri[2]) {
          $response = $this->controller->get($this->uri[2]);
        } else {
          $response = $this->controller->getAll();
        }
        break;
      case "POST":
        $response = $this->controller->create();
        break;
      case "PUT":
        $response = $this->controller->update($this->uri[2]);
        break;
      case "DELETE":
        $response = $this->controller->delete($this->uri[2]);
        break;
      default:
        $response = $this->notFoundResponse();
        break;
    }
    header($response["status_code_header"]);
    if ($response["body"]) {
      echo $response["body"];
    }
  }

  private function notFoundResponse()
  {
    $response["status_code_header"] = "HTTP/1.1 404 Not Found";
    $response["body"] = null;
    return $response;
  }
}
