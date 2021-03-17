<?php session_start();
include("../connection.php");
if(isset($_GET['id'])){
  $id=$_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <script type="text/javascript">
      function check(var gender){
        document.getElementById("gender").checked = true;
      }
    </script>
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="../css/edit.css">
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
      <form class="" action="change.php" method="POST" enctype="multipart/form-data">
      <div class="change" align='center'>
        <h5>Change photo profile</h5>
          <input type="file" name="filename" value="">
          <input type="submit" name="submit" value="Change Profile Picture">
      </div>
      <div class="" align="center">
        <br>


      <?php
        echo "<input type='text' name='name' value='".$data['name']."'>";
        ?>

        <input type="submit" name="submit" value="Change Name">

        <?php

        if(isset($data['gender'])){
          if($data['gender']==="F"){
          echo '
            <script type="text/javascript">
              check(female);
            </script>';
          }else {
          echo '
            <script type="text/javascript">
              check(male);
            </script>';
          }
        }else{
          $gender="Undefined";
        }
        echo "<h3 align='center'>Gender :<h3>";
        echo "<input type='radio' id='male' name='gender' value='M'>Male<br>";
        echo "<input type='radio' id='female' name='gender' value='F'>Female<br>";
      }
      ?>
      <input type="submit" name="submit" value="Change Gender">
      </div>
      </form>
    </div>
  </body>
</html>
