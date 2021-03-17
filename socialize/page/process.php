<?php
  session_start();
  include("../connection.php");
  $id=$_SESSION['id'];
  switch($_POST['submit']){
      case 'Send':
        $content=addslashes($_POST['content']);
        $date=date("Y-m-d");
        $sql = "INSERT INTO status VALUES ('','$id','$content','$date')";
        $pdo->exec($sql);
        echo "<script type='text/javascript'>
            window.top.location.href='index.php';
          </script>";
      break;
      case 'REGISTER':

        $name=$_POST['name'];
        $uname=$_POST['uname'];
        $pword=$_POST['pword'];
        $gender=$_POST['gender'];
        if($data = $pdo->query("SELECT uname FROM user where uname='$uname' limit 1")->fetch()){
          echo "<script type='text/javascript'>
            alert('Username has been taken');
            window.top.location.href='register.php';
            </script>";
        }else{
        $fname       = $_FILES['filename']['name'];
        $temp_name  = $_FILES['filename']['tmp_name'];
        if(isset($fname)){
          $dir="../img/pp/";
          move_uploaded_file($temp_name, $dir.$fname);
        }

      $sql = "INSERT INTO user VALUES('','$name','$uname','$pword','$gender','$fname')";
      $pdo->exec($sql);
      echo "<script type='text/javascript'>
        window.top.location.href='../index.php?status=registerSuccess';
        </script>";
      }
      break;
  }

 ?>
