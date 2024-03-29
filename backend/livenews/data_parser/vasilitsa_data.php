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

    $query= "UPDATE skicenter SET snow_up=$snow_up,snow_down=$snow_down,temp=$temp WHERE id=3";
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

    $ch = curl_init("http://ec2-54-194-95-194.eu-west-1.compute.amazonaws.com/backend2/index.php/skicenter/3");
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


  $body ='{ "channels": ["Vasilitsa"],"data": {"alert": "Όλοι οι αναβατήρες στο ΧΚ Βασιλίτσας βρίσκονται σε λειτουργία."}}';
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


  $body ='{ "channels": ["Vasilitsa"],"data": {"alert": "Φρέσκο χιόνι μόλις έπεσε και σε περιμένει στο Χ.Κ. Βασιλίτσας!"}}';
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



// parsing new data
/*$url = 'http://www.snowreport.gr/vasilitsa/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$html = curl_exec($ch);
curl_close($ch);*/


$curl = curl_init('http://www.snowreport.gr/vasilitsa/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
curl_setopt($curl,CURLOPT_VERBOSE,true);
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

$snow_up= "N/A";
$snow_down = "N/A";
$temp = "N/A";


$cnt=0;
$nodes = $xpath->query("//center/table/td/font");
foreach ($nodes as $node) {
    $cnt=$cnt+1;
   /* echo " Index:";
    echo  $cnt;
    echo "   : ";
    echo  $node->nextSibling->nodeValue  . '<br/>';*/
  if (strpos($node->nodeValue,'χιον.βάσης' ) !== false){
      $snow_down= intval($node->nextSibling->nodeValue);
  } else if (strpos($node->nodeValue,'χιον.κορυφ') !== false){
      $snow_up= intval($node->nextSibling->nodeValue);
  } else if (strpos($node->nodeValue,'Θερμ.βάσης') !== false){
      $temp= intval($node->nextSibling->nodeValue);
  }
   /* if ($cnt==2) {
       $snow_up= intval($node->nextSibling->nodeValue);
    } else if ($cnt==4) {
        $snow_down= intval($node->nextSibling->nodeValue);
   } else if ($cnt==6) {
        $temp= intval($node->nextSibling->nodeValue);
   }*/
}

echo "Snow Up:".$snow_up." Snow down: ".$snow_down." Temp:".$temp."<br/>";
updateDBSnows($snow_up,$snow_down,$temp);

if ($snow_up - $previous_snow_up > 30) {
  echo "Notification for SNOW should now be sent <br/>";
  $reportMessage.="Notification for SNOW should now be sent <br/>";
  sendNotificationForSnow();
} else {
  echo "Notification for SNOW should NOT be sent <br/>";
  $reportMessage.="Notification for SNOW should NOT be sent <br/>";
}


// go for the tracks

foreach ( $elements as $element ) {
        $temp=$temp+1;
        $str1=$element->getAttribute('color');
        $index=$element->nodeValue;
     
       

      if ((strpos($index,'Μ.Αλέξανδρος') !== false) && ($total_lifts==0)) {

        if (strcmp($str1,"green")==0){
          $total_lifts=$total_lifts+1;
          $cart["lift_1"]=$str1;
          updateDBLift("lift_1",$cart["lift_1"],'Μ.Αλέξανδρος',24);
        } else {
          $closed_lifts=$closed_lifts+1;
          $total_lifts=$total_lifts+1; 
          $cart["lift_1"]="red";
          updateDBLift("lift_1",$cart["lift_1"],'Μ.Αλέξανδρος',24);
        }


       } else  if ((strpos($index,'Φίλιππος') !== false) && ($total_lifts==1)) {
            
            if (strcmp($str1,"green")==0){
              $total_lifts=$total_lifts+1;
              $cart["lift_2"]=$str1;
            } else {
              $closed_lifts=$closed_lifts+1;
              $total_lifts=$total_lifts+1; 
              $cart["lift_2"]="red"; 
            }
            updateDBLift("lift_2",$cart["lift_2"],'Φίλιππος',25);

       } else  if ((strpos($index,'Ελιμεία') !== false) && ($total_lifts==2)) {
            
          if (strcmp($str1,"green")==0){
            $total_lifts=$total_lifts+1;
            $cart["lift_3"]=$str1;

          } else {
            $closed_lifts=$closed_lifts+1;
            $total_lifts=$total_lifts+1; 
            $cart["lift_3"]="red";  
          }
          updateDBLift("lift_3",$cart["lift_3"],'Φίλιππος',26);

           
       } else  if ((strpos($index,'Χρήστος Μιγδάνης') !== false) && ($total_lifts==3)) {
            
          if (strcmp($str1,"green")==0){
            $total_lifts=$total_lifts+1;
            $cart["lift_4"]=$str1;
          } else {
            $closed_lifts=$closed_lifts+1;
            $total_lifts=$total_lifts+1; 
            $cart["lift_4"]="red"; 
          }
          updateDBLift("lift_4",$cart["lift_4"],'Χρήστος Μιγδάνης',27);

            
       } else  if ((strpos($index,'Τυμφαία') !== false) && ($total_lifts==4)) {

        if (strcmp($str1,"green")==0){
          $total_lifts=$total_lifts+1;
          $cart["lift_5"]=$str1;
        } else {
          $closed_lifts=$closed_lifts+1;
          $total_lifts=$total_lifts+1; 
          $cart["lift_5"]="red";
        }     
        updateDBLift("lift_5",$cart["lift_5"],'Τυμφαία',28);
   
            
       } else  if ((strpos($index,'Baby lift') !== false) && ($total_lifts==5)) {

        if (strcmp($str1,"green")==0){
          $total_lifts=$total_lifts+1;
          $cart["lift_6"]=$str1;
        } else {
          $closed_lifts=$closed_lifts+1;
          $total_lifts=$total_lifts+1; 
          $cart["lift_6"]="red";   
        }
        updateDBLift("lift_6",$cart["lift_6"],'Baby lift',29);

       }  else  if ((strpos($index,'Συνδετικό Γομάρας') !== false) && ($total_lifts==6)) {
            
          if (strcmp($str1,"green")==0){
            $total_lifts=$total_lifts+1;
            $cart["lift_7"]=$str1;
          } else {
            $closed_lifts=$closed_lifts+1;
            $total_lifts=$total_lifts+1; 
            $cart["lift_7"]="red"; 
          }
        updateDBLift("lift_7",$cart["lift_7"],'Συνδετικό Γομάρας',30);

            
       }
}

// check if all tracks were not all open and now they are all
$open_tracks = $total_tracks-$closed_tracks;
$open_lifts = $total_lifts-$closed_lifts;

echo "New condition. Lifts:".$open_lifts." Tracks:".$open_tracks.'<br/>';
echo "Previous lifts:".$previous_open_lifts. "  Total Lifts:".$total_lifts."<br/>";
$reportMessage.="New condition. Lifts:".$open_lifts." Tracks:".$open_tracks.'<br/>';
$reportMessage.="Previous lifts:".$previous_open_lifts. "  Total Lifts:".$total_lifts."<br/>";


if (($previous_open_lifts != $total_lifts) && ($open_lifts == $total_lifts)) {
  echo "Notification for LIFTS should now be sent <br/>";
  $reportMessage.="Notification  for LIFTS should now be sent <br/>";
  sendNotificationForLifts();
} else {
  echo "Notification for LIFTS should NOT be sent <br/>";
  $reportMessage.="Notification for LIFTS should NOT be sent <br/>";
}


$timezone = date_default_timezone_get();
echo "The current server timezone is: " . $timezone;
date_default_timezone_set($timezone);
$date = date('m/d/Y h:i:s a', time());


$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
$mail->Host = 'localhost';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@vimateam.gr';                            // SMTP username
$mail->Password = 'marios1989';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also        

$mail->From = 'info@vimateam.gr';
$mail->FromName = 'SkiGreece Vasilitsa Automatic Data';
//$mail->addAddress('ankit_verma@example.net', 'ankit verma');  // Add a recipient
$mail->addAddress('skigreece@gmail.com');               // Name is optional
//$mail->addAddress('ign_ch@hotmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('ign_ch@hotmail.com');
//$mail->addBCC('bcc@example.com');

$mail->CharSet="utf-8";

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Vasilitsa Conditions Update :".$date;
$mail->Body    = $reportMessage;

if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  exit;
}



?>