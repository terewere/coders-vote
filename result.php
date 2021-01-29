<!DOCTYPE html>
<html>
<head>
    <title>2020 Election Results</title>
    <style>

table {
        font-size: 25px;
    }

    table, th, td {
  border: 2px solid green;
  border-collapse: collapse;
}

    th, td {
  padding: 5px;
}
th {
  text-align: left;
}
 

    .lt {
        float: left;
        margin: 20px;
        font-size: 25px;
    }
    .red {
        color:red;
        font-size: 40px;

    }
    .blue {
        color: blue;
        font-size: 40px;

    }

    </style>
</head>
<body>
<h1 style="color:green">Zongo Coders Election 2020 Polls</h1>

<?php


require_once('credentials.php');

  $A = "abass";
  $B = "alfa";
  
  try {
 
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT count(*) FROM `votes`"; 
    $result = $conn->prepare($sql); 
    $result->execute(); 
    $totalCount = $result->fetchColumn(); 


    if ( $totalCount == 0) {
        echo  '<h2>Results not available  </h2>';
         return;

    }

  

    $sql = "SELECT count(*) FROM `votes` WHERE candidate = ?"; 
    $result = $conn->prepare($sql); 
    $result->execute([$A]); 
    $candidateACount = $result->fetchColumn(); 
    $candidateAPercentage = number_format(($candidateACount/$totalCount) * 100,2 ). '%';


    $sql = "SELECT count(*) FROM `votes` WHERE candidate = ?"; 
    $result = $conn->prepare($sql); 
    $result->execute([$B]); 
    $candidateBCount = $result->fetchColumn();
    
    $candidateBPercentage = number_format(($candidateBCount/$totalCount) * 100,2) . '%';


    echo "  
    <table>
    <tr>
    <th>Candidates</th>
    <th>Vote %</th>
    <th>Vote Count</th>
    </tr>
  
    <tr>
    <td class='red'>$A</td>
    <td>$candidateAPercentage</td>
    <td>$candidateACount</td>
    </tr>
  
    <tr>
    <td class='blue'>$B</td>
    <td>$candidateBPercentage</td>
    <td>$candidateBCount</td>
    </tr>
    </table>";


    echo  '<h2>Total Vote Count: ' . $totalCount .  '</h2>';



   
  
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;


?>
</body>
</html>





