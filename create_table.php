<?php
require_once('credentials.php');

function createTable(){

 global $servername;
 global $username;
 global $password;
 global $dbname;

try {

$pdo = new PDO("mysql:host=$servername", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
$pdo->query("use $dbname");

echo "DB vote created successfully <br>" ;

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE votes (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  voter VARCHAR(30) NOT NULL,
  candidate VARCHAR(50)
  )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table votes created successfully <br>";
} catch(PDOException $e) {
  echo  $e->getMessage() . "<br>";
}

$conn = null;

}

?>