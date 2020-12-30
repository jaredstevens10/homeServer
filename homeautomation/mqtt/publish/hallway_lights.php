<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require('/var/www/html/homeautomation/mqtt/publish/mqttPublish.php');

  //echo "page opened";

  if($_GET) {

	$command = $_GET['command'];
	$message = $_GET['message'];	
	//$command = $_GET['command'];
	echo "command:" . $command;
	echo "<br>";
	echo "message:" . $message;
	$mqttClient = new MQTTClient_Items();
	$mqttClient->MQTTClient('home-assistant-1', '192.168.1.20', '1883'); 
	$mqttClient->connect();

	$mainTopic = 'hallway_light/' . $command . '/POWER';
	$topic = $mainTopic;
	$qos = '0';
	$retain = 'y';
	$content = strtoupper($message);


	$mqttClient->publish($topic,$qos,$retain,$content);

  }

  if($_POST) {
	$command = $_POST['command'];
	//$command = $_GET['command'];
	echo "got command " . $command;
  }



?>






