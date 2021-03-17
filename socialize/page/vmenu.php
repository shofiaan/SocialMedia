<?php session_start();
include("../connection.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/vmenu.css">
    <link rel="stylesheet" href="../css/vmenu.css">
    <title></title>
  </head>
  <body>
      <?php
        $id=$_SESSION['id'];
        if($data = $pdo->query("SELECT*FROM user where id='".$id."' limit 1")->fetch()){
          $photo=$data['filename'];
          if(isset($photo)){

            echo "<div class='pp' style='background-image:url(../img/pp/$photo)'>";
          }
          ?>
    </div>
    <?php
      echo "<h3 align='center'>".$data['name']."</h3>";
      }
    ?>
    <ul>
      <li><a target="main" href="profile.php?<?php echo "id=$id ";?>">Profile</a></li>
      <li><a target="main" href="edit.php?<?php echo "id=$id ";?>">Edit Profile</a></li>
      <li><a target="main" href="search.php?<?php echo "id=$id ";?>">Search Friends</a></li>
      <li><a target="main" href="friend-req.php?<?php echo "id=$id ";?>">Friend Request</a></li>
    </ul>
  </body>
</html>
