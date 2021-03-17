<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="/css/master.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1 align="center" style="margin-top:40px;font-size:30pt;"><logo-ia>SOCIALIZE</logo-ia></h1>
    <div class="login-form">
      <form class="" action="../login-process.php" method="post" target="_top">
        <input type="text" name="uname" value="" placeholder="username">
        <input type="password" name="pword" value="" placeholder="password">
        <p id="message"></p>
        <input type="submit" name="" value="SIGN IN">
      </form>
      <p>Don't have account yet? <a style="cursor:pointer;" href="register.php" target="_top">Register Here</a></p>
    </div>

      <script>

        function loginFail(){
          var x = "Account doesn\'t exist";
          document.getElementById("message").innerHTML = x;
        }
        function registerSuccess(){
          var x = "Account has been successfully created";
          document.getElementById("message").innerHTML = x;
        }
        if(window.parent.status==1){
          loginFail();
        }else if(window.parent.status==2){
          registerSuccess();
        }
      </script>
  </body>
</html>
