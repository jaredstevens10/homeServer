<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require('/var/www/html/homeautomation/mqtt/publish/mqttPublish.php');

  //echo "page opened";

  if($_GET) {

	$command = $_GET['command'];
	$action = $_GET['action'];	
	//$command = $_GET['command'];
	echo "command:" . $command;
	echo "<br>";
	echo "action:" . $action;
	$mqttClient = new MQTTClient_Items();
	$mqttClient->MQTTClient('playroom', '192.168.1.20', '1883'); 
	$mqttClient->connect();

	$mainTopic = 'playroom/playroom_light_1/cmnd/POWER';
	$topic = $mainTopic . $action;
	$qos = '0';
	$retain = 'y';
	$content = $command;


	$mqttClient->publish($topic,$qos,$retain,$content);

  }

  if($_POST) {
	$command = $_POST['command'];
	//$command = $_GET['command'];
	echo "got command " . $command;
  }



?>



