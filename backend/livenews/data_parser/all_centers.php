<?php

require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.phpmailer.php';

$cart=array();

$link=mysql_connect("db27.grserver.gr:3306","skigreece","p2nas0qe");
//mysqli_select_db($link, "SkiGreece_Community");
mysql_select_db("skigreecedata");


//echo "Connecting to DB".'<br\>';

$mode=1;
$total=0;

if ($mode==1) {
  $curl = curl_init('http://www.snowreport.gr');
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

$elements = $xpath->query('//a/font');

$end=0;
$last=0;
$opened=0;
$total_lifts=0;
$getDate=0;
$closed_lifts=0;
$total_tracks=0;
$closed_tracks=0;
$temp=0;

	foreach ( $elements as $element ) {
       
        $temp=$temp+1;
        $str1=$element->getAttribute('color');
        $index=$element->nodeValue;

		
		if ((strpos($index,'ΠΑΡΝΑΣΣΟΣ') !== false) && ($total==0)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["parnassos"]="red";	
				$total=$total+1;
          } else if (strcmp($str1,"green")==0){
			 $cart["parnassos"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΚΑΛΑΒΡΥΤΑ') !== false) && ($total==1)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["kalavryta"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["kalavryta"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΣΕΛΙ') !== false) && ($total==2)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["seli"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["seli"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'3-5 ΠΗΓΑΔΙΑ') !== false) && ($total==3)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["pigadia"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["pigadia"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΠΗΛΙΟ') !== false) && ($total==4)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["pilio"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["pilio"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΒΑΣΙΛΙΤΣΑ') !== false) && ($total==5)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["vasilitsa"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["vasilitsa"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΚΑΡΠΕΝΗΣΙ') !== false) && ($total==6)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["karpenisi"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["karpenisi"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΚΑΙΜΑΚΤΣΑΛΑΝ') !== false) && ($total==7)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["kaimaktsalan"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["kaimaktsalan"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΛΑΙΛΙΑΣ') !== false) && ($total==8)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["lailias"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["lailias"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΠΙΣΟΔΕΡΙ') !== false) && ($total==9)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["pisoderi"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["pisoderi"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΦΑΛΑΚΡΟ') !== false) && ($total==10)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["falakro"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["falakro"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΜΑΙΝΑΛΟ') !== false) && ($total==11)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["mainalo"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["mainalo"]=$str1;
			 $total=$total+1;
		  }
       } 
	   else if ((strpos($index,'ΠΕΡΤΟΥΛΙ') !== false) && ($total==12)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["pertouli"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["pertouli"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΕΛΑΤΟΧΩΡΙ') !== false) && ($total==13)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["elatohori"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["elatohori"]=$str1;
			 $total=$total+1;
		  }
       } else if ((strpos($index,'ΑΝΗΛΙΟ') !== false) && ($total==14)) {
            if ((strcmp($str1,"red")==0) or (strcmp($str1,"#ff8000")==0) or (strcmp($str1,"brown")==0) or (strcmp($str1,"black")==0)) {
			 $cart["metsovo"]="red";		
             $total=$total+1;			 
          } else if (strcmp($str1,"green")==0){
			 $cart["metsovo"]=$str1;
			 $total=$total+1;
		  }
       } 

	}

	$reportMessage ="";

	foreach ($cart as $key => $value) {
    	echo $key." : ".$value."\t" ;
    	$reportMessage.= $key." : ".$value."\t" ;
    	if (strcmp($value,"red") == 0) $open= 0;
    	else $open=1;

		$query= "UPDATE skicenter SET open=$open WHERE englishName='$key'";
		echo "Query:".$query."\t";

		$result=mysql_query($query) or die(mysql_error());
  		if (!$result) {
      		echo "ERROR: Database could not be updated";
      		$reportMessage.="ERROR: Database could not be updated";
  		} else {
    		echo "SUCCESSFUL";
    		$reportMessage.="SUCCESS";
     	}
     	echo "<br />\n";
     	$reportMessage.="<br />\n";
	}

	// report Message to be sent in an email
	// Subject: Ski Centers Condition Update , + Date.
	// Body the message
	// recipient ign_ch@hotmail.com , papanbros@gmail.com , vimateamgr@gmail.com

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
$mail->FromName = 'SkiGreece Automatic Data';
//$mail->addAddress('ankit_verma@example.net', 'ankit verma');  // Add a recipient
$mail->addAddress('skigreece@gmail.com');               // Name is optional
//$mail->addAddress('papanbros@gmail.com');               // Name is optional
//$mail->addAddress('ign_ch@hotmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('ign_ch@hotmail.com');
//$mail->addBCC('bcc@example.com');

$mail->CharSet="utf-8";

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Ski Center Conditions Update :".$date;
$mail->Body    = $reportMessage;

if(!$mail->send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
exit;
}

echo 'ΕMail has been sent successfully';
}

?>