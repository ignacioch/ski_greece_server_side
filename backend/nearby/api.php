<?php
//API implementation to come here

$link = mysql_connect("db27.grserver.gr:3306","vima_admin","p2nas0qe");
mysql_select_db("SkiGreece_BackUp");
mysql_set_charset("utf8");

function stream($place) {
  if (strcmp($place,"all") == 0) {
    $result=mysql_query("SELECT IdPost,name,title,type,url,place FROM posts p ORDER BY p.IdPost LIMIT 50");
  } else {
    $result=mysql_query("SELECT IdPost,name,title,type,url,place FROM posts p WHERE p.place='$place' ORDER BY p.IdPost LIMIT 50");
  }
  if (!$result) {
      //errorJson('Could not retrieve entries');
  } else {
    $output= array();
     while($row = mysql_fetch_assoc($result)) {
         $output[] = $row;
     }
   $cart['result']=$output;
   print json_encode($cart);
  }
}


function makePost($name,$title,$type,$address,$url,$place) {
  //local variables

  //check if a user ID is passed
  //if (!$id) errorJson('Authorization required');

  $query= "INSERT INTO posts(name,title,type,address,url,place) VALUES('$name','$title',$type,'$address','$url','$place')";
  //echo $query;

  $result = mysql_query($query);
  if (!$result) {      
      die('Invalid query: ' . mysql_error());
  } else {
      print json_encode(array('successful'=>1));
      //errorJson('Upload database problem.'.$result['error']);
  }
}

function getPins($place) {
  
  if (strcmp($place,"all") == 0) {
    $result=mysql_query("SELECT name,type,lat,lon FROM map p ");
  } else {
    $result=mysql_query("SELECT name,type,lat,lon FROM map p WHERE p.place='$place' ");
  }

  if (!$result) {
      //errorJson('Could not retrieve entries');
  } else {
    $output= array();
     while($row = mysql_fetch_assoc($result)) {
         $output[] = $row;
     }
   $cart['result']=$output;
   print json_encode($cart);
  }
}

?>