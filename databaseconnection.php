<?php

$config = [
   "database" => array(
     "driver"   => "mysql",
     "host"     => "localhost", //Jouw host als je op webserver werkt
     "username" => "root", //Jouw SQL username
     "password" => "toermalijn", //Jouw SQL password
     "dbname"   => "personalstorage" //Jouw SQL database naam
   ),
 ];
final class Database {
  private static $instance = null;
  public $db;
  private function __construct() {
    global $config;
    try {
      $dsn = sprintf("%s:hostname=%s;dbname=%s;", $config["database"]["driver"],
                                                  $config["database"]["host"],
                                                  $config["database"]["dbname"]);
      $this->db = new PDO($dsn, $config["database"]["username"], $config["database"]["password"]);
      $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch(PDOException $e) {
      exit("Error: " . $e->getMessage());
    }
  }

  public static function getDb() {
    if(is_null(Database::$instance)) Database::$instance = new Database();
    return Database::$instance->db;
  }
}
