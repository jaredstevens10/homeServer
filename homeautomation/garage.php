<?php




error_reporting(E_ALL);
ini_set('display_errors', 'On');

//header('Content-type: application/-www-form-urlencoded');

//header('Content-type: application/json');
if($_GET) {

$garagePW = $_GET["password"];
$action = $_GET["action"];

$title = "garage";


if ($action == "close") {
    $newStatus = "closed";
} 

if ($action == "open") {
    $newStatus = "open";
} 

//$dbname = "members";
//application address



require('/var/www/html/homeautomation/homeConfig.php');
$dbname = "Home_Automation";

//define('DIR','http://'.$servername.'/Apps/TelePictionary/');
//define('SITEEMAIL','admin@clavensolutions.com');

            
try {

    $db = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);


	//if no errors have been created carry on
	if(!isset($error)){


$stmt2 = $db->prepare("UPDATE Home_Appliances SET status = :status WHERE title = \"".$title."\"");
			$stmt2->execute(array(
			':status' => $newStatus
			));

$row_count = $stmt2->rowCount();

if ($row_count > 0) {
$success = 1;
} else {
$success = 0;
}

//echo "Success: ".$success;


$homeItem = "SELECT * FROM Home_Appliances WHERE title = \"".$title."\"";
//$homeItem = "SELECT * FROM Home_Appliances WHERE id = 1";
$stmt = $db->prepare($homeItem);
$stmt->execute();

$rowStatus = $stmt->fetch(PDO::FETCH_ASSOC);

echo "<html>";
echo "<br>";
echo "<head>";
echo "<br>";
echo "</head>";
echo "<br>";
echo "<body>";
echo "<br>";
echo "<div style=\"float: left;\">";

echo "GarageStatus: ".$rowStatus['status'];

echo "</div>";
echo "</body>";
echo "<br>";
echo "</html>";

        }
      }
catch(Exception $e)
{
         {
           // echo '{"success":0,"error_message":'.$e->getMessage().'}';
         }
        
        
}

//$success = 1;

if ($success > 0) {

if($garagePW == "stevensgarage123*") {

if ($action == "open") {
//echo "OpenGarage";
} 

if ($action == "close") {
//echo "CloseGarage";
} 


}


				} else {
					//echo '{"success":2,"error_message":"No Status Change."}';
				}
	
} else {
    
    echo '{"success":0,"error_message":"Invalid Data."}';
    
}


?>

