<?php

require "../vendor/autoload.php";

use App\SQLiteConnection;
// new \PDO("sqlite:db/phpsqlite.db");
// exit();
$pdo = (new SQLiteConnection())->connect();
if ($pdo != null) {
  echo "Connected to the SQLite database successfully!";
} else {
  echo "Whoops, could not connect to the SQLite database!";
}
