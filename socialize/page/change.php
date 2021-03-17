<?php
session_start();
include("../connection.php");

$id=$_SESSION['id'];
if(isset($_POST['submit'])){
  switch($_POST['submit']){
    case 'Change Profile Picture':
      $name       = $_FILES['filename']['name'];
      $temp_name  = $_FILES['filename']['tmp_name'];
      if(isset($name)){
        $dir="../img/pp/";
        move_uploaded_file($temp_name, $dir.$name);
      }

    $sql = "UPDATE user SET filename = '$name' WHERE id = $id";
    $pdo->exec($sql);
    echo "<script type='text/javascript'>
      window.top.location.href='index.php';
      </script>";
    break;

    case 'Change Gender':
      $gender = $_POST['gender'];
      $sql = "UPDATE user SET gender = '$gender' WHERE id = $id";
      $pdo->exec($sql);
      echo "<script type='text/javascript'>
        window.top.location.href='index.php';
        </script>";
    break;
  }
}

?>
