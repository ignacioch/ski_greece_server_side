<?php
//session_start();
require("api.php");

header("Content-Type: application/json");

switch ($_POST['command']) {

  case "newPost":
    makePost($_POST['name'],$_POST['title'],$_POST['type'],$_POST['address'],$_POST['url'],$_POST['place']);break;

  case "stream":
       stream($_POST['place']);break;

  case "getPins":
       getPins($_POST['place']);break;


 
}

exit();
?>