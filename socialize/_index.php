<?php
  $page=$_GET['page'];
  $page_dir="page/";
  $page_name=$page.".php";
  $fl = scandir($page_dir);
  foreach (scandir($page_dir) as $fl)
    if($page_name==$fl){
      include($page_dir.$page_name);
      break;
    }elseif($page==""){
      include($page_dir."home.php");
      break;
    }elseif($fl==".." || $fl=="."){
      continue;
    }else{
      $page_counted+=1;
    }
    if($page_counted==countFile($page_dir)){
      $notfound=1;
      include("page/notfound.php");
    }
?>
