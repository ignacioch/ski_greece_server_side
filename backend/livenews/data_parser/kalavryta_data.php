<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.phpmailer.php';

$reportMessage="";

function updateDBLift($key,$value,$id) {

    global $reportMessage;
  
    echo $key." : ".$value."\t" ;
      
      $reportMessage.= $key." : ".$value."\t" ;
      if (strcmp($value,"GREEN") == 0) $open= 1;
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
      if (strcmp($value,"GREEN") == 0) $open= 1;
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

    $query= "UPDATE skicenter SET snow_up=$snow_up,snow_down=$snow_down,temp=$temp WHERE id=2";
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

function getCurrentDataCondition() {

  global $reportMessage;

   global $previous_open_tracks ;
   global $previous_open_lifts ;
   global $previous_snow_up;
   global $previous_snow_down;
   global $previous_temp;

    $ch = curl_init("http://ec2-54-194-95-194.eu-west-1.compute.amazonaws.com/backend2/index.php/skicenter/2");
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


  $body ='{ "channels": ["Admin"],"data": {"alert": "Όλοι οι αναβατήρες στο ΧΚ Καλαβρύτων βρίσκονται σε λειτουργία."}}';
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


  $body ='{ "channels": ["Admin"],"data": {"alert": "Φρέσκο χιόνι μόλις έπεσε και σε περιμένει στο Χ.Κ. Καλαβρύτων!"}}';
  curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
  curl_setopt($ch, CURLOPT_POST, true);

  // Execute post
  $result = curl_exec($ch);

  // Close connection
  curl_close($ch);
  echo "Notification result:".json_encode($result)."<br/>";
  $reportMessage.="Notification result:".json_encode($result)."<br/>";
}


$snow_u_number= "N/A";
$snow_b_number = "N/A";
$temp_number = "N/A";

$tracks=array();
$lifts=array();
$weather=array();
/*Live Ski Report web page*/
//$host = "localhost";
$host = "95.154.242.97";
$user = "kalavrit_pistes";
$pass = 'ft^M$h@$mrec';
$schema = "kalavrit_rms2";

$link = mysql_connect($host, $user, $pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}else{
    //echo 'Connected successfully';
    mysql_select_db($schema);
    mysql_query("SET NAMES UTF8");
}

//Anavatires
$q1 = "SELECT * FROM vv_pistes WHERE type='anavatiras' AND chk_visible=1  ORDER BY ord_orderid";
$rs1 = mysql_query($q1);
while ($row1 = mysql_fetch_array($rs1)) {
    echo $row1["vrc_title_gr"]." - ".$row1["vrc_descr"]." - ".$row1["vrc_color"]."<br />";
    $lifts[$row1["vrc_title_gr"]] = $row1["vrc_color"];
}

echo "-----------<br />";

//Pistes
$q1 = "SELECT * FROM vv_pistes WHERE type='pista' AND chk_visible=1 ORDER BY ord_orderid";
$rs1 = mysql_query($q1);
while ($row1 = mysql_fetch_array($rs1)) {
    echo $row1["vrc_title_gr"]." - ".$row1["vrc_descr"]." - ".$row1["vrc_color"]."<br />";
    $tracks[$row1["vrc_title_gr"]] = $row1["vrc_color"];
}

echo "-----------<br />";

//Weather conditions
$q1 = "SELECT * FROM vv_prosvasi WHERE type='weather' AND chk_visible=1 ORDER BY ord_orderid";
$rs1 = mysql_query($q1);
while ($row1 = mysql_fetch_array($rs1)) {
    echo $row1["vrc_title_gr"]." - ".$row1["vrc_descr_gr"]."<br />";
    $weather[$row1["vrc_title_gr"]] = $row1["vrc_descr_gr"];
}

echo "-----------<br />";
 
//Road Access
$q1 = "SELECT * FROM vv_prosvasi WHERE type='road access' AND chk_visible=1 ORDER BY ord_orderid";
$rs1 = mysql_query($q1);
while ($row1 = mysql_fetch_array($rs1)) {
    echo $row1["vrc_title_gr"]." - ".$row1["vrc_descr_gr"]."<br />";
}


echo "-----------<br />";



//save them into the DB

// close the previous DB connection
mysql_close($link);

echo "Opening New Database <br/>";
$link=mysql_connect("db27.grserver.gr:3306","skigreece","p2nas0qe");
mysql_select_db("skigreecedata");

getCurrentDataCondition();

echo "Function returned. Current open tracks: ".$previous_open_tracks." Current open lifts: ".$previous_open_lifts. '<br/>';
echo "Current snow_up:".$previous_snow_up." snow_down:".$previous_snow_down. " temp:".$previous_temp."<br/>" ;
echo "Function returned. Current snow up: ".$previous_snow_up." Current snow down: ".$previous_snow_down. '<br/>';
$reportMessage.="Function returned. Current open tracks: ".$previous_open_tracks." Current open lifts: ".$previous_open_lifts. '<br/>';
$reportMessage.="Function returned. Current snow up: ".$previous_snow_up." Current snow down: ".$previous_snow_down. '<br/>';


// debug print the data
$counter = 0 ;
foreach ($tracks as $key => $value) {
    echo "Key: $key; Value: $value<br />\n";
    updateDBTracks($key,$value,$counter+20);
    $counter = $counter + 1;
}
$lifts_counter = 0;
$open_lifts = 0;
$total_lifts = 0;
foreach ($lifts as $key => $value) {
    $total_lifts = $total_lifts + 1;
    echo "Key: $key; Value: $value<br />\n";
    updateDBLift($key,$value,$lifts_counter+17);
    $lifts_counter = $lifts_counter + 1;
    if (strcmp($value,"GREEN")==0) {
      $open_lifts = $open_lifts + 1;
    }
}

if (($previous_open_lifts != $total_lifts) && ($open_lifts == $total_lifts)) {
  echo "Notification for LIFTS should now be sent <br/>";
  $reportMessage.="Notification  for LIFTS should now be sent <br/>";
  sendNotificationForLifts();
} else {
  echo "Notification for LIFTS should NOT be sent <br/>";
  $reportMessage.="Notification for LIFTS should NOT be sent <br/>";
}

echo "-----------<br />";

foreach ($weather as $key => $value) {
    echo "Key: $key; Value: $value <br />\n";
    if (strpos($key, 'Ύψος τελευταίας χιονόπτωσης') !== false ) {
      $number = preg_replace("/[^0-9]/", '', $value); // ditch anything that is not a number 
      echo "Last Snowfall :".$number."<br/>";
      /*if ($number > 30) {
        echo "Notification for SNOW should now be sent <br/>";
        $reportMessage.="Notification for SNOW should now be sent <br/>";
        sendNotificationForSnow();
      } else {
        echo "Notification for SNOW should NOT be sent <br/>";
        $reportMessage.="Notification for SNOW should NOT be sent <br/>";
      }*/
    }

    if (strpos($key, 'Ποσότητα Χιονιού') !== false) {
      $myArray = explode('-', $value);
      $snow_b_array =explode(':', $myArray[0]);
      $snow_b_number = preg_replace("/[^0-9]/", '', $snow_b_array[1]); // ditch anything that is not a number 
      echo "Snow base: ".$snow_b_number."<br/>";

      $snow_u_array =explode(':', $myArray[2]);
      $snow_u_number = preg_replace("/[^0-9]/", '', $snow_u_array[1]); // ditch anything that is not a number 
      echo "Snow Up: ".$snow_u_number."<br/>";      
    }

    if (strpos($key, 'Θερμοκρασία') !== false) {      
      //$temp_number = preg_replace("/-?[0-9]+/", '', $value); // ditch anything that is not a number 
     preg_match_all("/-?[0-9]+/", $value, $matches);
      //var_dump($matches[0]);
     $temp_number= implode(' ', $matches[0]);
     echo "Temperature : ". $value . "Number : ".$temp_number."<br/>";
    }

}

echo "Snow Up:".$snow_u_number." Snow down: ".$snow_b_number." Temp:".$temp_number."<br/>";
updateDBSnows($snow_u_number,$snow_b_number,$temp_number);

if ($snow_u_number - $previous_snow_up > 30) {
  echo "Notification for SNOW should now be sent <br/>";
  $reportMessage.="Notification for SNOW should now be sent <br/>";
  sendNotificationForSnow();
} else {
  echo "Notification for SNOW should NOT be sent <br/>";
  $reportMessage.="Notification for SNOW should NOT be sent <br/>";
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
$mail->FromName = 'SkiGreece Kalavryta Automatic Data';
//$mail->addAddress('ankit_verma@example.net', 'ankit verma');  // Add a recipient
$mail->addAddress('skigreece@gmail.com');               // Name is optional
//$mail->addAddress('ign_ch@hotmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('ign_ch@hotmail.com');
//$mail->addBCC('bcc@example.com');

$mail->CharSet="utf-8";

$mail->WordWrap = 1500;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Kalavryta Conditions Update :".$date;
$mail->Body    = $reportMessage;

if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  exit;
} 




?>