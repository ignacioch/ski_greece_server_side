<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.phpmailer.php';

$link=mysql_connect("db27.grserver.gr:3306","skigreece","p2nas0qe");
mysql_select_db("skigreecedata");

function updateDBLift($key,$value,$name,$id) {

    global $reportMessage;
  
    echo $name." --- ".$key." : ".$value."\t" ;
      
      $reportMessage.= $name." --- ".$key." : ".$value."\t" ;
      if (strcmp($value,"green") == 0) $open= 1;
      else $open=0;

    $query= "UPDATE lift SET open=$open WHERE id=$id";
    echo "Query:".$query."\t";

    $result=mysql_query($query) or die(mysql_error());
      if (!$result) {
          echo "ERROR: Database could not be updated";
          $reportMessage.="ERROR: Database could not be updated";
      } else {
        echo "SUCCESSFUL";
        $reportMessage.="SUCCESS";
      }
      
      $reportMessage.="<br />\n";

      echo "<br />\n";
}

function updateDBTracks($key,$value,$name,$id) {

    global $reportMessage;
  
    echo $name." --- ".$key." : ".$value."\t" ;
      
      $reportMessage.= $name." --- ".$key." : ".$value."\t" ;
      if (strcmp($value,"green") == 0) $open= 1;
      else $open=0;

    $query= "UPDATE track SET open=$open WHERE id=$id";
    echo "Query:".$query."\t";

    $result=mysql_query($query) or die(mysql_error());
      if (!$result) {
          echo "ERROR: Database could not be updated";
          $reportMessage.="ERROR: Database could not be updated";
      } else {
        echo "SUCCESSFUL";
        $reportMessage.="SUCCESS";
      }
      
      $reportMessage.="<br />\n";

      echo "<br />\n";
}

function updateDBSnows($snow_up,$snow_down,$temp) {

    global $reportMessage;
    global $previous_snow_up;
    global $previous_snow_down;
    global $previous_temp;
  
    echo "Snow up : ".$snow_up."\t" ;
    echo "Snow down : ".$snow_down."\t" ;
    echo "Temperature : ".$temp."\t";
      

    $reportMessage.= "Snow up : ".$snow_up."\t" ;
    $reportMessage.= "Snow down : ".$snow_down."\t" ;
    $reportMessage.= "Temperature : ".$temp."\t";

    if (strcmp($snow_up, "N/A") == 0) $snow_up=$previous_snow_up;
    if (strcmp($snow_down, "N/A") == 0) $snow_down=$previous_snow_down;
    if (strcmp($temp, "N/A") == 0) $temp=$previous_temp;

    $query= "UPDATE skicenter SET snow_up=$snow_up,snow_down=$snow_down,temp=$temp WHERE id=5";
    echo "    Query:".$query."\t";

    $result=mysql_query($query) or die(mysql_error());
      if (!$result) {
          echo "ERROR: Database could not be updated";
          $reportMessage.="ERROR: Database could not be updated";
      } else {
        echo "SUCCESSFUL";
        $reportMessage.="SUCCESS";
      }
      
      $reportMessage.="<br />\n";

      echo "<br />\n";
}

$previous_open_tracks = 0;
$previous_open_lifts = 0;
$previous_snow_up =0;
$previous_snow_down = 0;
$previous_temp =0;

function getCurrentDataCondition() {

  global $reportMessage;

   global $previous_open_tracks ;
   global $previous_open_lifts ;
   global $previous_snow_up;
   global $previous_snow_down;
   global $previous_temp;

    $ch = curl_init("http://ec2-54-194-95-194.eu-west-1.compute.amazonaws.com/backend2/index.php/skicenter/5");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, 'GET');
    //curl_setopt($ch, CURLOPT_URL,"");
    //curl_setopt($ch, CURLOPT_GET, 1);
    //$cookiefile = './cookie.txt';
    //curl_setopt($curl, CURLOPT_COOKIEFILE, $cookiefile);
    $result= curl_exec ($ch);
    curl_close ($ch);
    
    $json = json_decode($result, true);

    $lifts_array = $json['lifts'];
    for($i=0; $i<count($lifts_array); $i++) {
      //echo " ".$i.": Previous Lift Condition is " . $lifts_array[$i]["open"] . "<BR>";
      if ($lifts_array[$i]["open"] == 1) {
        $previous_open_lifts ++;
      } 
    }

    $tracks_array = $json['tracks'];
    for($i=0; $i<count($tracks_array); $i++) {
      //echo " ".$i.": Previous Track Condition is " . $tracks_array[$i]["open"] . "<BR>";
      if ($tracks_array[$i]["open"] == 1) {
        $previous_open_tracks ++;
      } 
    }

    $previous_temp = $json['temp'];
    $previous_snow_up = $json['snow_up'];
    $previous_snow_down = $json['snow_down'];

}



function sendNotificationForLifts() {

  global $reportMessage;

  $ch = curl_init('');

  curl_setopt($ch, CURLOPT_URL, "https://api.parse.com/1/push");

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-Parse-Application-Id: Q982ewBYSL47LhFVnPfn84btjrLOSiWmvbjetvI6',
    'X-Parse-REST-API-Key: hPg6L5EBuwDHoQQyC5Z3UnilsAdExwT90FyEB2nK',
    'Content-Type: application/json'
    ));


  $body ='{ "channels": ["Admin"],"data": {"alert": "Όλοι οι αναβατήρες στο ΧΚ Σελίου βρίσκονται σε λειτουργία."}}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
  curl_setopt($ch, CURLOPT_POST, true);

  // Execute post
  $result = curl_exec($ch);

  // Close connection
  curl_close($ch);
  echo "Notification result:".json_encode($result)."<br/>";
  $reportMessage.="Notification result:".json_encode($result)."<br/>";
}

function sendNotificationForSnow() {

  global $reportMessage;

  $ch = curl_init('');

  curl_setopt($ch, CURLOPT_URL, "https://api.parse.com/1/push");

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-Parse-Application-Id: Q982ewBYSL47LhFVnPfn84btjrLOSiWmvbjetvI6',
    'X-Parse-REST-API-Key: hPg6L5EBuwDHoQQyC5Z3UnilsAdExwT90FyEB2nK',
    'Content-Type: application/json'
    ));


  $body ='{ "channels": ["Admin"],"data": {"alert": "Φρέσκο χιόνι μόλις έπεσε και σε περιμένει στο Χ.Κ. Σελίου!"}}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
  curl_setopt($ch, CURLOPT_POST, true);

  // Execute post
  $result = curl_exec($ch);

  // Close connection
  curl_close($ch);
  echo "Notification result:".json_encode($result)."<br/>";
  $reportMessage.="Notification result:".json_encode($result)."<br/>";
}


//fetch current data

getCurrentDataCondition();

echo "Function returned. Current open tracks: ".$previous_open_tracks." Current open lifts: ".$previous_open_lifts. '<br/>';
echo "Current snow_up:".$previous_snow_up." snow_down:".$previous_snow_down. " temp:".$previous_temp."<br/>" ;
$reportMessage.="Function returned. Current open tracks: ".$previous_open_tracks." Current open lifts: ".$previous_open_lifts. '<br/>';

$snow_up= "N/A";
$snow_down = "N/A";
$temp = "N/A";

// parsing new data

foreach ( $elements as $element ) {
        $temp=$temp+1;
        $str1=$element->getAttribute('color');
        $index=$element->nodeValue;
     
        /*echo "Index: ";
        echo $temp;
        echo"Name :";
  echo $index;
  echo "  Condition :";
  echo $str1;
        echo '<br />';*/

     if ((strpos($index,'Φίλιππος') !== false) && ($total_lifts==0)) {
      
           if (strcmp($str1,"green")==0){
            $total_lifts=$total_lifts+1;
            $cart["lift_1"]=$str1;
          } else {
             $closed_lifts=$closed_lifts+1;
             $total_lifts=$total_lifts+1; 
             $cart["lift_1"]="red"; 
          }
         updateDBLift("lift_1",$cart["lift_1"],'Φίλιππος',37);
      
       } else  if ((strpos($index,'Αλέξανδρος 2') !== false) && ($total_lifts==1)) {

            if (strcmp($str1,"green")==0){
            $total_lifts=$total_lifts+1;
            $cart["lift_2"]=$str1;
          } else {
             $closed_lifts=$closed_lifts+1;
             $total_lifts=$total_lifts+1; 
             $cart["lift_2"]="red"; 
          }
         updateDBLift("lift_2",$cart["lift_2"],'Αλέξανδρος 2',38);

       } else  if ((strpos($index,'Ηρακλής') !== false) && ($total_lifts==2)) {

            if (strcmp($str1,"green")==0){
            $total_lifts=$total_lifts+1;
            $cart["lift_3"]=$str1;
          } else {
             $closed_lifts=$closed_lifts+1;
             $total_lifts=$total_lifts+1; 
             $cart["lift_3"]="red"; 
          }
         updateDBLift("lift_3",$cart["lift_3"],'Ηρακλής',39);

       } else  if ((strpos($index,'Αλέξανδρος 1') !== false) && ($total_lifts==3)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_4"]="red";      
          } else if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_4"]=$str1;
      }
       } else  if ((strpos($index,'Αρης') !== false) && ($total_lifts==4)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_5"]="red";      
          } else if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_5"]=$str1;
      }
       } else  if ((strpos($index,'Δίας') !== false) && ($total_lifts==5)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_6"]="red";      
          } else if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_6"]=$str1;
      }
       }  else  if ((strpos($index,'Αμύντας') !== false) && ($total_lifts==6)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_7"]="red";      
          } else if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_7"]=$str1;
      }
       }  else  if ((strpos($index,'Ιάσων') !== false) && ($total_lifts==7)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_8"]="red";      
          } else if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_8"]=$str1;
      }
       }  else  if ((strpos($index,'Ορφέας') !== false) && ($total_lifts==8)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_9"]="red";      
          } else if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_9"]=$str1;
      }
       }  else  if ((strpos($index,'Ερμής') !== false) && ($total_lifts==9)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_10"]="red";       
          } else if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_10"]=$str1;
      }
       }  else  if ((strpos($index,'Βέρης') !== false) && ($total_lifts==10)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_11"]="red";       
          } else if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_11"]=$str1;
      }
       }  
}
$cnt=0;
$nodes = $xpath->query("//center/table/td/font");
foreach ($nodes as $node) {
    $cnt=$cnt+1;
   /* echo " Index:";
    echo  $cnt;
    echo "   : ";
    echo  $node->nextSibling->nodeValue  . '<br/>';*/
  /*if (strpos($node->nodeValue,'χιον.βάσης' ) !== false){
      $cart["snow_up"]= intval($node->nextSibling->nodeValue);
  } else if (strpos($node->nodeValue,'χιον.κορυφ') !== false){
      $cart["snow_up"]= intval($node->nextSibling->nodeValue);
  } else if (strpos($node->nodeValue,'Θερμ.βάσης') !== false){
      $cart["snow_up"]= intval($node->nextSibling->nodeValue);
  }*/
    if ($cnt==2) {
       $cart["snow_up"]= intval($node->nextSibling->nodeValue);
    } else if ($cnt==4) {
        $cart["snow_down"]= intval($node->nextSibling->nodeValue);
   } else if ($cnt==6) {
        $cart["temp"]= intval($node->nextSibling->nodeValue);
   }
}

?>