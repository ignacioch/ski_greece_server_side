<?php

#require 'PHPMailer/PHPMailerAutoload.php';
#require 'PHPMailer/class.phpmailer.php';

$link=mysql_connect("db27.grserver.gr:3306","skigreece","p2nas0qe");
mysql_select_db("skigreecedata");

function updateDBLift($key,$value,$id) {

    global $reportMessage;
  
    echo $key." : ".$value."\t" ;
      
      $reportMessage.= $key." : ".$value."\t" ;
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

function updateDBTracks($key,$value,$id) {

    global $reportMessage;
  
    echo $key." : ".$value."\t" ;
      
      $reportMessage.= $key." : ".$value."\t" ;
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
  
    echo "Snow up : ".$snow_up."\t" ;
    echo "Snow down : ".$snow_down."\t" ;
    echo "Temperature : ".$temp."\t";
      

    $reportMessage.= "Snow up : ".$snow_up."\t" ;
    $reportMessage.= "Snow down : ".$snow_down."\t" ;
    $reportMessage.= "Temperature : ".$temp."\t";

    $query= "UPDATE skicenter SET snow_up=$snow_up,snow_down=$snow_down,temp=$temp WHERE id=1";
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

    $ch = curl_init("http://ec2-54-194-95-194.eu-west-1.compute.amazonaws.com/backend2/index.php/skicenter/1");
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



function getCondition() {

  global $reportMessage;

  $query = "SELECT open FROM skicenter WHERE id=1";
  //echo "Query:".$query."\t";

  $result=mysql_query($query) or die(mysql_error());
  if (!$result) {
      echo "ERROR: Database could not be updated";
      $reportMessage.="ERROR: Database could not be updated";
  } else {
     
    $output= array();
    while($row = mysql_fetch_assoc($result)) {
         $output[] = $row;
    }
    $cond = ($output[0]['open']);

    echo "Condtion :".$cond ."  SUCCESSFUL";
    $reportMessage.="Condition :".$cond."  SUCCESS";
  }
      
  $reportMessage.="<br /> \n";

  echo "<br />\n";

  return $cond;
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


  $body ='{ "channels": ["Admin"],"data": {"alert": "Όλοι οι αναβατήρες του Χ.Κ. Παρνασσού βρίσκονται σε λειτουργία."}}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
  curl_setopt($ch, CURLOPT_POST, true);

  // Execute post
  $result = curl_exec($ch);

  // Close connection
  curl_close($ch);
  echo "Notification result:".json_encode($result)."<br/> \n";
  $reportMessage.="Notification result:".json_encode($result)."\n";
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


  $body ='{ "channels": ["Admin"],"data": {"alert": "Φρέσκο χιόνι μόλις έπεσε και σε περιμένει στο Χ.Κ. Παρνασσού!"}}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
  curl_setopt($ch, CURLOPT_POST, true);

  // Execute post
  $result = curl_exec($ch);

  // Close connection
  curl_close($ch);
  echo "Notification result:".json_encode($result)."<br/> \n";
  $reportMessage.="Notification result:".json_encode($result)."\n";
}


//fetch current data

getCurrentDataCondition();

echo "Function returned. Current open tracks: ".$previous_open_tracks." Current open lifts: ".$previous_open_lifts. "<br/> \n";
echo "Current snow_up:".$previous_snow_up." snow_down:".$previous_snow_down. " temp:".$previous_temp."<br/> \n" ;
$reportMessage.="Function returned. Current open tracks: ".$previous_open_tracks." Current open lifts: ".$previous_open_lifts. "<br/> \n";


//$previous_condition = getCondition() ;



$curl = curl_init('http://www.snowreport.gr/parnassos/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.224 Safari/534.10');
$html = curl_exec($curl);
curl_close($curl);

if (!$html) {
    die("something's wrong!");
}

$dom = new DOMDocument();
@$dom->loadHTML($html);

$my_xpath_query ="html/body";

$xpath = new DOMXPath($dom);
$json = array();

$elements = $xpath->query('//font');
$cart=array();

$end=0;
$last=0;
$opened=0;
$total_lifts=0;
$getDate=0;
$closed_lifts=0;
$total_tracks=0;
$closed_tracks=0;
$temp=0;


$startOfTracksFound = false;

foreach ( $elements as $element ) {
        $temp=$temp+1;
        $str1=$element->getAttribute('color');
        $index=$element->nodeValue;
     
        //echo "Index: ".$temp."Name :".$index."-Condition :".$str1."\n";

      if (strcmp($index,"ΑΝΑΒΑΤΗΡΕΣ:")==0) {
        $startOfTracksFound = true;
        //echo "Start of tracks found: ".$index."\n";
      }

      if ($startOfTracksFound == true) {
        if ((strpos($index,'Τηλεκαμπίνα') !== false) && ($total_lifts==0)) {
     // echo "Index: ".$index.":".$str1."\n";
      if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_1"]=$str1;
       updateDBLift("lift_1",$cart["lift_1"],1);
      } else
          {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_1"]="red";
       updateDBLift("lift_1",$cart["lift_1"],1);       
          }
      
       } else  if ((strpos($index,'Αίολος') !== false) && ($total_lifts==1)) {
        if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_2"]=$str1;
       updateDBLift("lift_2",$cart["lift_2"],2);
      } else
        {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_2"]="red";   
       updateDBLift("lift_2",$cart["lift_2"],2);   
          } 
       } else  if ((strpos($index,'Βάκχος') !== false) && ($total_lifts==2)) {
         if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_3"]=$str1;
       updateDBLift("lift_3",$cart["lift_3"],3);
      } else
          {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_3"]="red";   
       updateDBLift("lift_3",$cart["lift_3"],3);   
          }
       } else  if ((strpos($index,'Ηρακλής') !== false) && ($total_lifts==3)) {
        if (strcmp($str1,"green")==0){
          // 2014-15 FIXME : Τηλέμαχος does not exist anymore. Therefore it needs to stay closed. => update the counter by 2.
         $total_lifts=$total_lifts+2;
         $cart["lift_4"]=$str1;
         updateDBLift("lift_4",$cart["lift_4"],4);
        } else {
          $closed_lifts=$closed_lifts+1;
          // 2014-15 FIXME : Τηλέμαχος does not exist anymore. Therefore it needs to stay closed. => update the counter by 2.
          $total_lifts=$total_lifts+2; 
          $cart["lift_4"]="red";   
       updateDBLift("lift_4",$cart["lift_4"],4);   
          }  
       }
      //else  if ((strpos($index,'Τηλέμαχος') !== false) && ($total_lifts==4)) {
      // if (strcmp($str1,"green")==0){
      //  $total_lifts=$total_lifts+1;
      //$cart["lift_5"]=$str1;
      //updateDBLift("lift_5",$cart["lift_5"],5);  
      // else {
      //      $closed_lifts=$closed_lifts+1;
      //$total_lifts=$total_lifts+1; 
      //$cart["lift_5"]="red";   
      //updateDBLift("lift_5",$cart["lift_5"],5);   
      //   }  
      //} 
      else  if ((strpos($index,'Περικλής') !== false) && ($total_lifts==5)) {
         if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_6"]=$str1;
       updateDBLift("lift_6",$cart["lift_6"],6);  
      } else {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_6"]="red";     
       updateDBLift("lift_6",$cart["lift_6"],6);   
          }
       } else  if ((strpos($index,'Οδυσσέας') !== false) && ($total_lifts==6)){
              if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_7"]=$str1;
       updateDBLift("lift_7",$cart["lift_7"],7);
      } else {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_7"]=$str1;      
       updateDBLift("lift_7",$cart["lift_7"],7);  
          } 
       } else  if ((strpos($index,'Ερμής') !== false) && ($total_lifts==7)) {
        if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
         $cart["lift_8"]=$str1;
         updateDBLift("lift_8",$cart["lift_8"],8);
      } else {
          $closed_lifts=$closed_lifts+1;
          $total_lifts=$total_lifts+1; 
          $cart["lift_8"]=$str1;  
          updateDBLift("lift_8",$cart["lift_8"],8);    
          }
       } else  if ((strpos($index,'7 Φτερ') !== false) && ($total_lifts==8)) {
          if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_9"]=$str1;
       updateDBLift("lift_9",$cart["lift_9"],9);
      } else {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_9"]=$str1; 
       updateDBLift("lift_9",$cart["lift_9"],9);     
          } 
       } else  if ((strpos($index,'10 Φτερ') !== false) && ($total_lifts==9)) {
        if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_10"]=$str1;
       updateDBLift("lift_10",$cart["lift_10"],10);
      } else {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_10"]=$str1;  
       updateDBLift("lift_10",$cart["lift_10"],10);    
          } 
       }else  if ((strpos($index,'14 Φτερ') !== false) && ($total_lifts==10)) {
        if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_11"]=$str1;
       updateDBLift("lift_11",$cart["lift_11"],11);
      } else {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_11"]=$str1;      
       updateDBLift("lift_11",$cart["lift_11"],11); 
          } 
       }else  if ((strpos($index,'6 Φτερ') !== false) && ($total_lifts==11)) {
        if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_12"]=$str1;
       updateDBLift("lift_12",$cart["lift_12"],12);
      } else {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_12"]=$str1;  
       updateDBLift("lift_12",$cart["lift_12"],12);    
          } 
       }else  if ((strpos($index,'Δίας') !== false) && ($total_lifts==12)) {
        if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_13"]=$str1;
       updateDBLift("lift_13",$cart["lift_13"],13);
      } else {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_13"]=$str1;  
       updateDBLift("lift_13",$cart["lift_13"],13);    
          } 
       }else  if ((strpos($index,'Baby lift 3') !== false) && ($total_lifts==13)) {
           if (strcmp($str1,"green")==0){
         $total_lifts=$total_lifts+1;
       $cart["lift_14"]=$str1;
       updateDBLift("lift_14",$cart["lift_14"],14);
      } else {
             $closed_lifts=$closed_lifts+1;
       $total_lifts=$total_lifts+1; 
       $cart["lift_14"]=$str1;  
       updateDBLift("lift_14",$cart["lift_14"],14);    
          } 
       }else  if ((strpos($index,'Αφροδίτη Α (No 1)') !== false)  && ($total_tracks==0)){
          if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_1"]="green";
            updateDBTracks("track_1",$cart["track_1"],1);  
          } else {
              $closed_tracks=$closed_tracks+1;
              $total_tracks=$total_tracks+1;
              $cart["track_1"]="red";   
              $closed_tracks=$closed_tracks+1;
              updateDBTracks("track_1",$cart["track_1"],1);         
          }
      } else  if ((strpos($index,'Βάκχος (No 2)') !== false) && ($total_tracks==1)) {
          if (strcmp($str1,"green")==0){
               $total_tracks=$total_tracks+1;
               $cart["track_2"]="green";
               updateDBTracks("track_2",$cart["track_2"],2);  
            } else{
             $closed_tracks=$closed_tracks+1;
             $total_tracks=$total_tracks+1;
             $cart["track_2"]="red";     
             updateDBTracks("track_2",$cart["track_2"],2);        
            } 
       } else  if ((strpos($index,'Βάκχος A (No 2a)') !== false) && ($total_tracks==2)) {

          if (strcmp($str1,"green")==0){
              $total_tracks=$total_tracks+1;
              $cart["track_3"]="green";
              updateDBTracks("track_3",$cart["track_3"],3); 
          } else {
             $closed_tracks=$closed_tracks+1;
             $total_tracks=$total_tracks+1;
             $cart["track_3"]="red"; 
             updateDBTracks("track_3",$cart["track_3"],3); 
          }

       } else  if ((strpos($index,'Βάκχος B (No 2b') !== false) && ($total_tracks==3)) {
                     
          if (strcmp($str1,"green")==0){
            // 2014-15 FIXME : Τηλέμαχος (No 3) does not exist anymore. Therefore it needs to stay closed. => counter increased by 2
             $total_tracks=$total_tracks+2;
             $cart["track_4"]="green";
             updateDBTracks("track_4",$cart["track_4"],4); 
        } else {
             $closed_tracks=$closed_tracks+1;
             // 2014-15 FIXME : Τηλέμαχος (No 3) does not exist anymore. Therefore it needs to stay closed. => counter increased by 2
             $total_tracks=$total_tracks+2;
             $cart["track_4"]="red"; 
             updateDBTracks("track_4",$cart["track_4"],4);  
        }

       } 
       //else  if ((strpos($index,'Τηλέμαχος (No 3)') !== false) && ($total_tracks==//4)){
//
       //    if (strcmp($str1,"green")==0){
       //     $total_tracks=$total_tracks+1;
       //     $cart["track_5"]="green";
       //     updateDBTracks("track_5",$cart["track_5"],5); 
       //   } else {
       //       $closed_tracks=$closed_tracks+1;
       //       $total_tracks=$total_tracks+1;
       //       $cart["track_5"]="red"; 
       //       updateDBTracks("track_5",$cart["track_5"],5); 
       //   }
//
       //} 
       else  if ((strpos($index,'Αίολος (No 4)') !== false) && ($total_tracks==5)) {

            if (strcmp($str1,"green")==0){
              $total_tracks=$total_tracks+1;
              $cart["track_6"]="green";
              updateDBTracks("track_6",$cart["track_6"],6); 
            } else {
              $closed_tracks=$closed_tracks+1;
              $total_tracks=$total_tracks+1;
              $cart["track_6"]="red"; 
              updateDBTracks("track_6",$cart["track_6"],6);  
            }       

       } else  if ((strpos($index,'Περικλής (No 5)') !== false) && ($total_tracks==6)) {

          if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_7"]="green";
            updateDBTracks("track_7",$cart["track_7"],7);
          }  else {
            $closed_tracks=$closed_tracks+1;
            $total_tracks=$total_tracks+1;
            $cart["track_7"]="red";
            updateDBTracks("track_7",$cart["track_7"],7);
          }         
           
       } else  if ((strpos($index,'Ηνίοχος (No 6)') !== false) && ($total_tracks==7)) {

          if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_8"]="green";
            updateDBTracks("track_8",$cart["track_8"],8);
          } else {
            $closed_tracks=$closed_tracks+1;
            $total_tracks=$total_tracks+1;
            $cart["track_8"]="red";
            updateDBTracks("track_8",$cart["track_8"],8);
          }
          
       } else  if ((strpos($index,'Ηρα Α (No 7)') !== false) && ($total_tracks==8)) {

          if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_9"]="green";
            updateDBTracks("track_9",$cart["track_9"],9);
          } else {
            $closed_tracks=$closed_tracks+1;
            $total_tracks=$total_tracks+1;
            $cart["track_9"]="red"; 
            updateDBTracks("track_9",$cart["track_9"],9);
          }
            
       } else  if ((strpos($index,'Ηρακλής (No 8)') !== false) && ($total_tracks==9)) {

           if (strcmp($str1,"green")==0){
              $total_tracks=$total_tracks+1;
              $cart["track_10"]="green";
              updateDBTracks("track_10",$cart["track_10"],10);
            } else {
              $closed_tracks=$closed_tracks+1;
              $total_tracks=$total_tracks+1;
              $cart["track_10"]="red";   
              updateDBTracks("track_10",$cart["track_10"],10);
            }
           
       } else  if ((strpos($index,'Οδυσσέας (No 9)') !== false) && ($total_tracks==10)){

          if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_11"]="green";
            updateDBTracks("track_11",$cart["track_11"],11);
          } else {
            $closed_tracks=$closed_tracks+1;
            $total_tracks=$total_tracks+1;
            $cart["track_11"]="red";
            updateDBTracks("track_11",$cart["track_11"],11);
          }
 
       } else  if ((strpos($index,'Παν (No 10)') !== false) && ($total_tracks==11)){

        if (strcmp($str1,"green")==0){
          $total_tracks=$total_tracks+1;
          $cart["track_12"]="green";
          updateDBTracks("track_12",$cart["track_12"],12);
        } else {
          $closed_tracks=$closed_tracks+1;
          $total_tracks=$total_tracks+1;
          $cart["track_12"]="red"; 
          updateDBTracks("track_12",$cart["track_12"],12);
        }
       
       } else  if ((strpos($index,'Ερμής (No 11)') !== false) && ($total_tracks==12)){

        if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_13"]="green";
            updateDBTracks("track_13",$cart["track_13"],13);
        } else {
            $closed_tracks=$closed_tracks+1;
            $total_tracks=$total_tracks+1;
            $cart["track_13"]="red";  
            updateDBTracks("track_13",$cart["track_13"],13);
        }

       } else  if ((strpos($index,'Δηιανείρα (No 12)') !== false) && ($total_tracks==13)){

        if (strcmp($str1,"green")==0){
          $total_tracks=$total_tracks+1;
          $cart["track_14"]="green";
          updateDBTracks("track_14",$cart["track_14"],14);
        } else {
          $closed_tracks=$closed_tracks+1;
          $total_tracks=$total_tracks+1;
          $cart["track_14"]="red";
          updateDBTracks("track_14",$cart["track_14"],14);
        }
           
       } else  if ((strpos($index,'Δίας (No 13)') !== false) && ($total_tracks==14)){

          if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_15"]="green";
            updateDBTracks("track_15",$cart["track_15"],15);
          } else {
            $closed_tracks=$closed_tracks+1;
            $total_tracks=$total_tracks+1;
            $cart["track_15"]="red"; 
            updateDBTracks("track_15",$cart["track_15"],15);
          }

       } else  if ((strpos($index,'Πυθία (No 14)') !== false) && ($total_tracks==15)){

        if (strcmp($str1,"green")==0){
          $total_tracks=$total_tracks+1;
          $cart["track_16"]="green";
          updateDBTracks("track_16",$cart["track_16"],16);
        } else {
          $closed_tracks=$closed_tracks+1;
          $total_tracks=$total_tracks+1;
          $cart["track_16"]="red"; 
          updateDBTracks("track_16",$cart["track_16"],16);
        }
          
       } else  if ((strpos($index,'Πυθία Α (No 14a)') !== false) && ($total_tracks==16)){

        if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_17"]="green";
            updateDBTracks("track_17",$cart["track_17"],17);
        } else {
            $closed_tracks=$closed_tracks+1;
            $total_tracks=$total_tracks+1;
            $cart["track_17"]="red";   
            updateDBTracks("track_17",$cart["track_17"],17); 
        }

       } else  if ((strpos($index,'Ski-Route Σαχάρα') !== false) && ($total_tracks==17)){
           
          if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_18"]="green";
            updateDBTracks("track_18",$cart["track_18"],18);
          } else {
            $closed_tracks=$closed_tracks+1;
            $total_tracks=$total_tracks+1;
            $cart["track_18"]="red"; 
            updateDBTracks("track_18",$cart["track_18"],18);
          }
           
       } else  if ((strpos($index,'Snowboard Park') !== false) && ($total_tracks==18)){
           
          if (strcmp($str1,"green")==0){
            $total_tracks=$total_tracks+1;
            $cart["track_19"]="green";
            updateDBTracks("track_19",$cart["track_19"],19);
          } else {
            $closed_tracks=$closed_tracks+1;
            $total_tracks=$total_tracks+1;
            $cart["track_19"]="red"; 
            updateDBTracks("track_19",$cart["track_19"],19);
          }
          
       }  
      }

       
    
}

// 2014-15 FIXME : Τηλέμαχος does not exist anymore. Therefore it needs to stay closed.
updateDBLift("lift_5","red",5); 
updateDBTracks("track_5","red",5); 

// Initial values
$snow_up = 0;
$snow_down = 0;
$temp = 10 ;

$cnt=0;
$nodes = $xpath->query("//center/table/td/font");
foreach ($nodes as $node) {
    $cnt=$cnt+1;
    /*echo " Index:";
    echo  $cnt;
    echo "   : ";
    echo  $node->nextSibling->nodeValue  . '<br/>';*/
  /*if (strpos($node->nodeValue,'χιον.βάσης' ) !== false){
      $cart["snow_up"]= intval($node->nextSibling->nodeValue);
  } else if (strpos($node->nodeValue,'χιον.κορυφ') !== false){
      $cart["snow_up"]= intval($node->nextSibling->nodeValue);
  }  else if (strpos ($node->nodeValue,'Θερμ.βάσης') !== false){
      $cart["snow_up"]= intval($node->nextSibling->nodeValue);
  }*/
    if ($cnt==2) {
       //$cart["snow_up"]= intval($node->nextSibling->nodeValue);
       $snow_up= intval($node->nextSibling->nodeValue);
    } else if ($cnt==4) {
        //$cart["snow_down"]= intval($node->nextSibling->nodeValue);
      $snow_down= intval($node->nextSibling->nodeValue);
   } else if ($cnt==5) {
        $temp= intval($node->nextSibling->nodeValue);
   }
   //FIXME: should update the entries in the DB
}

// check if all tracks were not all open and now they are all
$open_tracks = $total_tracks-$closed_tracks;
$open_lifts = $total_lifts-$closed_lifts;

echo "New condition. Lifts:".$open_lifts." Tracks:".$open_tracks."<br/> \n";
$reportMessage.="New condition. Lifts:".$open_lifts." Tracks:".$open_tracks."\n";

if (($previous_open_lifts != $total_lifts) && ($open_lifts == $total_lifts)) {
  echo "Notification for LIFTS should now be sent <br/> \n";
  $reportMessage.="Notification  for LIFTS should now be sent \n";
  sendNotificationForLifts();
} else {
  echo "Notification for LIFTS should NOT be sent <br/> \n";
  $reportMessage.="Notification for LIFTS should NOT be sent \n";
}

// check snow up and down
echo "Snow Up:".$snow_up." Snow down: ".$snow_down."<br/> \n";
updateDBSnows($snow_up,$snow_down,$temp);

if ($snow_up - $previous_snow_up > 30) {
  echo "Notification for SNOW should now be sent <br/> \n";
  $reportMessage.="Notification for SNOW should now be sent \n";
  sendNotificationForSnow();
} else {
  echo "Notification for SNOW should NOT be sent <br/> \n";
  $reportMessage.="Notification for SNOW should NOT be sent \n";
}

$timezone = date_default_timezone_get();
echo "The current server timezone is: " . $timezone;
date_default_timezone_set($timezone);
$date = date('m/d/Y h:i:s a', time());


//$mail = new PHPMailer;
//
//$mail->isSMTP();                                      // Set mailer to use SMTP
////$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
//$mail->Host = 'localhost';  // Specify main and backup server
//$mail->SMTPAuth = true;                               // Enable SMTP //authentication
//$mail->Username = 'info@vimateam.gr';                            // SMTP username
//$mail->Password = 'marios1989';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' //also        
//
//$mail->From = 'info@vimateam.gr';
//$mail->FromName = 'SkiGreece Parnassos Automatic Data';
////$mail->addAddress('ankit_verma@example.net', 'ankit verma');  // Add a recipient
//$mail->addAddress('skigreece@gmail.com');               // Name is optional
////$mail->addAddress('ign_ch@hotmail.com');               // Name is optional
////$mail->addReplyTo('info@example.com', 'Information');
////$mail->addCC('ign_ch@hotmail.com');
////$mail->addBCC('bcc@example.com');
//
//$mail->CharSet="utf-8";
//
//$mail->WordWrap = 50;                                 // Set word wrap to 50 //characters
////$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
////$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//$mail->isHTML(true);                                  // Set email format to HTML
//
//$mail->Subject = "Parnassos Conditions Update :".$date;
//$mail->Body    = $reportMessage;
//
//if(!$mail->send()) {
//  echo 'Message could not be sent.';
//  echo 'Mailer Error: ' . $mail->ErrorInfo;
//  exit;
//}

$logfile = fopen("parnassos.log","w") or die("Unable to open file");
fwrite($logfile,$date."\n\n");
fwrite($logfile,$reportMessage);
fclose($logfile);


?>
