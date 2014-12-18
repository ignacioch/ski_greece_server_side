<?php

$link = mysql_connect("db24.grserver.gr:3306","Nearby_Admin","p2nas0qe");
mysql_select_db("SkiGreece_Nearby");

function getOffers() {

  $query="SELECT * FROM offers WHERE offerId=1";

  $result = mysql_query($query);

  if (!$result) {      
      die('Invalid query: ' . mysql_error());
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