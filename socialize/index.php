<!DOCTYPE html>
<?php
    if(isset($_GET['status'])){
      if($_GET['status']==='registerSuccess'){
        echo "
        <script>
          var status=2;
        </script>
        ";
      }else if($_GET['status']==='loginFail'){
        echo "
        <script>
          var status=1;
        </script>
        ";
      }
  }
 ?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/master.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <frameset rows="90%,*" frameborder="0">
    <frameset cols="60%,*">
      <frame src="login-image.html" noresize="noresize" frameborder="0">
      <frame src="page/login.php" noresize="noresize" frameborder="0">
    </frameset>
    <frame src="page/footer.php" noresize="noresize" frameborder="0">
  </frameset frameborder="0">
  <body>
  </body>
</html>
