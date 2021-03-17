<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>


    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="/css/master.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script type="text/javascript">
    function registerFail(){
      var x = "Username has been taken";
      document.getElementById("unameFail").innerHTML = x;
    }
    function checkForm(form){
      if((form.uname.value == "") || (form.name.value == "") || (form.pword.value == "")){
        return false;
      }else{
        return true;
      }
    }
    function validation(form){
      if(checkForm(form)==false){
        alert("Please fill in the fields");
        return false;
      }else if(checkText(form.uname) == false){
        alert ("Username should only contain letter");
        return false;
      }else if(checkText(form.name) == false){
        alert("Name should only contain letter");
        return false;
      }else{
        confirm("Are you sure you want to submit?");
        return true;
      }
    }
    function checkText(textBox){
      if( textBox.value.length != 0){
        for (var i = 0; i < textBox.value.length;i++){
          var ch= textBox.value.charAt(i);
          if((ch < "A" || ch > "Z") && (ch< "a" || ch >"z") && (ch!=" ")){
            return false;
          }
        }
      }else{
        return true;
      }
    }
    </script>
    <h1 align="center" style="margin-top:40px;font-size:30pt;"><logo-ia>SOCIALIZE</logo-ia></h1>
    <div class="login-form">
    <form class="" action="process.php" method="post" target="_top" enctype="multipart/form-data" onSubmit="return validation(this)">
        <input id="name" type="text" name="name" value="" placeholder="Name" required minlength="3">
        <input id="uname" type="text" name="uname" value="" placeholder="Username" required minlength="8">
        <p id="unamefail"></p>
        <input id="pword" type="password" name="pword" value="" placeholder="Password" required minlength="8">
        <br>
        <br>
        Gender
        <select id= class="" name="gender" required>
          <option value="M">Male</option>
          <option value="F">Female</option>
        </select>
        <br>
        <br>
        <br>
        <label for="filename">Profile Picture</label>
        <input type="file" name="filename" value="">
        <input type="submit" name="submit" value="REGISTER">
      </form>
    </div>
  </body>
</html>
