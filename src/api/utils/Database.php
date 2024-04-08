<?php

class Database {

  private $host;
  private $username;
  private $password;
  private $dbname;
  private $conn;

  public function __construct($host, $username, $password, $dbname) {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;

    $this->connect();
  }

  private function connect() {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function disconnect() {
    $this->conn->close();
  }

  public function query($sql) {
    $result = $this->conn->query($sql);

    if (!$result) {
      die("Error in query: " . $this->conn->error);
    }

    return $result;
  }

  public function escapeString($data) {
    return $this->conn->real_escape_string($data);
  }

  // You can add more methods here for specific database operations

  // Example: fetch all rows from a table
  public function fetchAll($table) {
    $sql = "SELECT * FROM $table";
    $result = $this->query($sql);
    $rows = [];

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }

    return $rows;
  }
}
