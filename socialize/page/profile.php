<?php session_start();
include("../connection.php");
if(isset($_GET['id'])){
  $id=$_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="../css/profile.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="main">
      <div class="pp">

      <?php
      $id=$_SESSION['id'];

      if($data = $pdo->query("SELECT*FROM user where id='".$id."' limit 1")->fetch()){
        $photo=$data['filename'];
        if(isset($photo)){
          echo "<img src=\"../img/pp/".$photo."\">";
        }
        ?>
      </div>
      <?php
        echo "<h1 align='center'>".$data['name']."</h1>";
        if(isset($data['gender'])){
          if($data['gender']==="F"){
            $gender="Female";
          }else{
            $gender="Male";
          }
        }else{
          $gender="Undefined";
        }
        echo "<h3 align='center'>Gender : $gender<h3>";
        $sql = "SELECT count(*) FROM friend where (id1='$id' and status=1) or (id2='$id' and status=1) limit 1";
      	$result = $pdo->prepare($sql);
      	$result->execute();
      	$friend = $result->fetchColumn();
        echo "<h3 align='center'>Friends : $friend<h3>";
      }
      ?>
    </div>
  </body>
</html>
