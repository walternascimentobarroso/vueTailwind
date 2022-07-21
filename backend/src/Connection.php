<?php

namespace App;

/**
 * SQLite connnection
 */
class Connection
{
  /**
   * PDO instance
   * @var type
   */
  private $pdo;

  /**
   * return in instance of the PDO object that connects to the SQLite database
   * @return \PDO
   */
  public function connect()
  {
    try {
      if ($this->pdo == null) {
        $this->pdo = new \PDO("sqlite:" . Config::DB_HOST);
      }
      return $this->pdo;
    } catch (PDOException $e) {
      print "Error in openhrsedb " . $e->getMessage();
    }
  }
}
