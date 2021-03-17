<?php session_start();
include("../connection.php");
$id=$_SESSION['id'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="../css/master.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="">
      <h1>Friend Request</h1>
      <?php
        $data=$pdo->query("SELECT id1, name, uname FROM user, friend where id2=$id and status=0 and id1=user.id");
        while($row = $data->fetch(PDO::FETCH_ASSOC)){
            echo " Name : ".$row['name']."<br>";
            echo " Username : ".$row['uname']."<br>";
            $id_result=$row['id1'];
            echo "<a href='add.php?resID=$id_result&state=confirm' target='menu'>Confirm Friend</a>";
        }


       ?>
    </div>
  </body>
</html>
