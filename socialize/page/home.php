<?php
  session_start();
  include("../connection.php");
  $id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
        padding: 10px 20px;
        float: left;
      }
    </style>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="../css/master.css">
  </head>
  <body>
    <div class="content">
      <p>You have to add friend first before you can see your status!</p>
      <form class="" action="process.php" method="post">
        <input type="text" name="content" placeholder="What's on your mind?..." style="resize:none" rows="8" cols="80"></input>
        <br>
        <br>
        <input type="submit" name="submit" value="Send">
        <br>
        <br>
      </form>
      <div class="">
        <script type="text/javascript">
          var statuscontent=[
        <?php
        $data=$pdo->query("SELECT DISTINCT user.id, status.userid,status.id as 'status_id',name,content,date,status FROM status,user,friend WHERE status.userid=user.id and (friend.id1=$id or friend.id2=$id) and friend.status=1 and (status.userid=id1 or status.userid=id2)");
        $countstmt = $pdo->prepare("SELECT count(DISTINCT user.id,status.userid,status.id,name,content,date,status) FROM status,user,friend WHERE status.userid=user.id and (friend.id1=$id or friend.id2=$id) and friend.status=1 and (status.userid=id1 or status.userid=id2)");
        $countstmt->execute();
        $rowcount = $countstmt->fetchColumn();
        $i=1;
          while($row = $data->fetch()){
            $statusid=$row['status_id'];
            $userid=$row['id'];
            echo " [".$statusid.",";
            echo $row['userid'].",'";
            echo $row['name']."','";
            $content=addslashes($row['content']);
            echo $content."','";
            echo $row['date']."',";
          	$result = $pdo->prepare("SELECT count(*) FROM likes where statusid=$statusid limit 1");
          	$result->execute();
          	$likes = $result->fetchColumn();
            echo $likes.",";
            echo (($likes+1)*$statusid*strlen($content))."]";

            if($i<$rowcount){
              echo ",
              ";
              $i++;
            }
            // if($likestatus = $pdo->query("SELECT*FROM likes where userid='$id' and statusid='$statusid' limit 1")->fetch()){
            //   //resID because the add,php process the 'result' as resID
            //   echo "<a href='add.php?state=dislike&resID=$statusid'>Dislike</a><br>";
            // }else{
            //   //resID because the add,php process the 'result' as resID
            //   echo "<a href='add.php?state=like&resID=$statusid'>Like</a><br>";
            // }
          }
         ?>];
          statuscontent.sort(function(a,b) {
            return b[6]-a[6];
          });
          for(var i=0;i<statuscontent.length;i++){
            document.writeln("<div class='status-content'>");
            document.writeln("<h5>"+statuscontent[i][2]+" : </h5>");
            document.writeln("<p class='date'>"+statuscontent[i][4]+"</p>");
            document.writeln("<p class='content'>"+statuscontent[i][3]+"</p>");
            document.writeln("<a href='add.php?state=like&resID="+statuscontent[i][0]+"'>Like</a>");
            document.writeln("<a href='add.php?state=dislike&resID="+statuscontent[i][0]+"'>Dislike</a>");
            document.writeln("<p><sub>"+statuscontent[i][5]+" Like(s)</sub></p>");
            document.writeln("</div>");
          }
         </script>
      </div>
    </div>
  </body>
</html>
