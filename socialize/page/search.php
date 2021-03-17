<?php session_start();
include("../connection.php");
$id=$_SESSION['id'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style media="screen">
      input[type=text]{
        border-radius: 10px;
        border-style: solid;
        border: 1px solid #B00020;
        padding: 10px;
        height: 20px;
        width: 80%;
      }
      input[type=submit]{
        border-radius: 10px;
        border-style: solid;
        border: 2px solid #B00020;
        padding: 10px;
      }
    </style>
    <title></title>
  </head>
  <body>
    <div class="">
      <form class="" action="search.php" method="post">
        <input type="text" placeholder="Search..." name="search" value="">
        <input type="submit" name="" value="Search now">
      </form>
      <?php
      if(isset($_POST['search'])){
        $search=$_POST['search'];
        $data=$pdo->query("SELECT*FROM user where name like '%$search%' or uname like '%$search%'");
        while($row = $data->fetch(PDO::FETCH_ASSOC)){
          if($row['id']!=$id){
            echo " Name : ".$row['name']."<br>";
            echo " Username : ".$row['uname']."<br>";
            $id_result=$row['id'];
              if($check = $pdo->query("SELECT status FROM friend where (id1=$id and id2=$id_result) or (id2=$id and id1=$id_result) limit 1")){
              //fetch datas from the newer sql
              $status = $check->fetch(PDO::FETCH_ASSOC);
              //check whether friend has been requested or not
              if(isset($status['status']) && $status['status']==='0'){
                echo "Sent Friend Request<br>";
              }else if(!isset($status['status'])){
                echo "<a href='add.php?resID=$id_result' target='menu'>Add Friend</a>";
              }else{
                echo "Friend<br>";
              }
            }
          }
        }
      }

       ?>
    </div>
  </body>
</html>
