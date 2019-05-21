<?php

require("phpMQTT.php");

$server  = "m24.cloudmqtt.com"; //Server ip address
$port  = 1883;
$username = "orqtvkxp";  //username ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$password = "4Wc8k_8KxJxf";  //password ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$client_id = "Client-".rand();


$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
 $mqtt->publish("test/topic", "Hello World! This is message from publisher.", 0);
 $mqtt->close();
} else {
    echo "Time out!\n";
}

?>