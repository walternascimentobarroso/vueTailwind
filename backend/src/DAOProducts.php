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
        project_id   INTEGER PRIMARY KEY,
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

  public function get()
  {
    $stmt = $this->pdo->query("SELECT * FROM products");
    $tables = [];
    $i = 0;
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
      $tables[$i]["sku"] = $row["sku"];
      $tables[$i]["atributes"] = json_decode($row["atributes"]);
      $i++;
    }

    return $tables;
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
}
