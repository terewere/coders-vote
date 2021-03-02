
<?php
  require_once('credentials.php');
  require_once('create_table.php');

function vote($voter, $candidate){

 global $servername;
 global $username;
 global $password;
 global $dbname;

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

    echo "Error: " . $e->getMessage() . '<br>';

    echo 'Creating DATABASE.....' . '<br>';

    createTable();
    echo 'Try voting again.....' . '<br>';

  }
  $conn = null;

}

?>