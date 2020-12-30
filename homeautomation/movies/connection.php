<?php

//require('../Apps/AppsConfig.php'); 
require('/var/www/html/homeautomation/moviesConfig.php');
$dbname = "Home_Automation";
 /*

	$servername = "localhost";
	$username = "clavenso_Admin";
	$password = "claven01*";
	$dbname = "clavenso_PartyTraits";
*/

	//$conn = mysqli("$hostname","$username","$password") or die(mysql_error());
	//mysql_select_db("$dbname", $conn) or die(mysql_error());
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);

?>