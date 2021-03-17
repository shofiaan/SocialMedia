<?php
	include("connection.php");
	$uname=addslashes($_POST["uname"]);
	$pword=addslashes($_POST["pword"]);

	// $sql = "SELECT count(*) FROM user where uname='$uname' and pword='$pword' limit 1";
	// $result = $pdo->prepare($sql);
	// $result->execute();
	// $number_of_rows = $result->fetchColumn();

	// $query=mysql_query($select)or die (mysql_error());
	// $row=mysql_num_rows($query);
	if($data = $pdo->query("SELECT*FROM user where uname='$uname' and pword='$pword' limit 1")->fetch()){
		session_start();
		$_SESSION['id']=$data['id'];
  	echo "<script type='text/javascript'>window.top.location.href='page/index.php';</script>";
	}else{
		// echo "SELECT*FROM user where uname='$uname' and pword='$pword' limit 1";
    echo "<script type='text/javascript'>window.top.location.href='index.php?status=loginFail';</script>";
	}
?>
