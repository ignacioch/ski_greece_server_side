<?php
echo 'test';

$link = mysql_connect("db27.grserver.gr:3306","vima_admin","p2nas0qe");
mysql_select_db("SkiGreece_BackUp");
mysql_set_charset("utf8");

$result=mysql_query("SELECT name,title,type,address,url,place FROM posts p WHERE p.place='%s' ORDER BY IdPost DESC LIMIT 50",$_POST['place']);
  if (!$result) {
      errorJson('Could not retrieve entries');
  } else {
    $output= array();
     while($row = mysql_fetch_assoc($result)) {
         $output[] = $row;
     }
   $cart['result']=$output;
   print json_encode($cart);
  }

?>