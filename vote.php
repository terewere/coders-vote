<?php 
 //require_once('create_table.php');
 require_once('insert.php');


 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Presidential Vote</title>
    <style>

table {
        font-size: 25px;
       
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


<h2 > <?php echo 'Thank you, ' . $_GET['name'] ;?></h2>
<p style="font-size:20px;"> <?php echo 'You have successfully voted for <strong>' . $_GET['candidate']. '</strong>' ;?></p>
<p style="font-size:30px"><a href="result.php">View Result</a></p>

<?php
$candidate =  strtolower( trim($_GET['candidate']) );

vote($_GET['name'], $candidate)

?>


</body>
</html>





