<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require('/var/www/html/homeautomation/mqtt/publish/mqttPublish.php');

  //echo "page opened";

  if($_GET) {

	$command = $_GET['command'];
	$message = $_GET['message'];
	$entity = $_GET['entity'];
	$item = $_GET['item'];	
	//$command = $_GET['command'];
	echo "command:" . $command;
	echo "<br>";
	echo "message:" . $message;
	echo "<br>";
	//$mqttClient = new MQTTClient_Items();
	//$mqttClient->MQTTClient('home-assistant-1', '192.168.1.20', '1883'); 
	//$mqttClient->connect();

	if ($entity == "ALL") {

	$allLights = array(
		array("name" => "playroom_kitchen_main", "item" => "POWER1"),
		array("name" => "playroom_kitchen_main", "item" => "POWER2"),
		array("name" => "front_hallway_lights", "item" => "POWER1"),
		array("name" => "front_hallway_lights", "item" => "POWER2"),
		);

	foreach ($allLights as $entityGroup) {

		$mqttClient = new MQTTClient_Items();
        	$mqttClient->MQTTClient('home-assistant-1', '192.168.1.20', '1883'); 
        	$mqttClient->connect();

		$itemName = $entityGroup['name'];
		$itemObject = $entityGroup['item'];

		echo "\n Toggle lights, name: " . $itemName . ", Object: " . $itemObject . "\n";

		$mainTopic = $command . '/' . $itemName . '/' . $itemObject;
        	//$mainTopic = 'hallway_light/' . $command . '/POWER';
        	$topic = $mainTopic;
        	$qos = '0';
	        $retain = 'y';
        	$content = strtoupper($message);

        	$mqttClient->publish($topic,$qos,$retain,$content);

		//sleep(1);
		usleep(500000);
		}

	} else {

	$mqttClient = new MQTTClient_Items();
        $mqttClient->MQTTClient('home-assistant-1', '192.168.1.20', '1883'); 
        $mqttClient->connect();

	$mainTopic = $command . '/' . $entity . '/' . $item;
	//$mainTopic = 'hallway_light/' . $command . '/POWER';
	$topic = $mainTopic;
	$qos = '0';
	$retain = 'y';
	$content = strtoupper($message);

	$mqttClient->publish($topic,$qos,$retain,$content);

	}

  }

  if($_POST) {
	$command = $_POST['command'];
	//$command = $_GET['command'];
	echo "got command " . $command;
  }



?>
