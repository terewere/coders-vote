
<?php

function vote($voter, $candidate){
  require_once('credentials.php');

  try {
 
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO votes (voter, candidate)
    VALUES (:voter, :candidate)");
    $stmt->bindParam(':voter', $voter);
    $stmt->bindParam(':candidate', $candidate);
  
    $stmt->execute();

    


   
  
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;

}

?>