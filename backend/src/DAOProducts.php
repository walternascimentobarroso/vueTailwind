<?php

namespace App;

class DAOProducts
{
  /**
   * PDO object
   * @var \PDO
   */
  private $pdo;

  /**
   * connect to the SQLite database
   */
  public function __construct()
  {
    $this->pdo = (new SQLiteConnection())->connect();
  }

  /**
   * create tables
   */
  public function createTables()
  {
    $commands = <<<TABLE
    CREATE TABLE IF NOT EXISTS products (
        id   INTEGER PRIMARY KEY,
        sku   VARCHAR (255),
        atributes TEXT
    )
TABLE;

    try {
      $createTable = $this->pdo->exec($commands);
      echo "Success!\n";
    } catch (\PDOException $e) {
      exit($e->getMessage());
    }
  }

  public function getAll()
  {
    $stmt = $this->pdo->query("SELECT * FROM products");
    $data = [];
    $i = 0;
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
      $data[$i]["sku"] = $row["sku"];
      $data[$i]["atributes"] = json_decode($row["atributes"]);
      $i++;
    }

    return $data;
  }

  public function get($id)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $data = [];
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
      $data["sku"] = $row["sku"];
      $data["atributes"] = json_decode($row["atributes"]);
    }

    return $data;
  }

  public function insert($data)
  {
    $sql = "INSERT INTO products(sku, atributes) VALUES(:sku, :atributes)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(":sku", $data["sku"]);
    $stmt->bindValue(":atributes", json_encode($data["atributes"]));
    $stmt->execute();
    return $this->pdo->lastInsertId();
  }

  public function update($id, $data)
  {
    $sql =
      "UPDATE products SET sku = :sku, atributes = :atributes WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":sku", $data["sku"]);
    $stmt->bindValue(":atributes", json_encode($data["atributes"]));

    return $stmt->execute();
  }

  public function delete($id)
  {
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([":id" => $id]);
    return $stmt->rowCount();
  }
}
