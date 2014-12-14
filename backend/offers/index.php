<?
require("api.php");

header("Content-Type: application/json");

switch ($_POST['command']) {
  case "getOffers": 
    getOffers(); break;
}

exit();
?>