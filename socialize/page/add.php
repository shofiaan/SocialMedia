<?php
session_start();
include("../connection.php");
$id=$_SESSION['id'];
$result=$_GET['resID'];
if(isset($_GET['state']) && $_GET['state']==='confirm'){
  $sql = "UPDATE friend SET status=1 WHERE id2=$id and id1=$result";
  $pdo->execute($sql);
  echo "<script type='text/javascript'>
      window.top.location.href='index.php';
      </script>";
}else if(isset($_GET['state']) && $_GET['state']==='like'){
  if(!$likestatus = $pdo->query("SELECT*FROM likes where userid='$id' and statusid='$result' limit 1")->fetch()){
    $sql = "INSERT INTO likes VALUES ('$id','$result')";
    $pdo->exec($sql);
    echo "<script type='text/javascript'>
        window.top.location.href='index.php';
        </script>";
  }else{
    echo "<script type='text/javascript'>
        alert('You cannot like what you have liked');
        window.top.location.href='index.php';
        </script>";
  }
}else if(isset($_GET['state']) && $_GET['state']==='dislike'){
  if($likestatus = $pdo->query("SELECT*FROM likes where userid='$id' and statusid='$result' limit 1")->fetch()){
    $sql = "DELETE FROM likes where userid='$id' and statusid=$result";
    $pdo->exec($sql);
    echo "<script type='text/javascript'>
        window.top.location.href='index.php';
        </script>";
  }else{
    echo "<script type='text/javascript'>
        alert('You can\'t dislike this');
        window.top.location.href='index.php';
        </script>";
  }
}else{
  $sql = "INSERT INTO friend VALUES ('$id','$result','0')";
  $pdo->exec($sql);
  echo "<script type='text/javascript'>
      window.top.location.href='index.php';
      </script>";
}

?>
