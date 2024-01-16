<?php
//alustetaan sessio 
session_start();

//tuhotaan kaikki session muuttujat
$_SESSION = array();

//tuhotaan sessio
session_destroy();

//palataan etusivulle
header("location: etusivu.php");
exit;