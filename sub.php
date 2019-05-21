<?php

require("phpMQTT.php");

$server  = "m24.cloudmqtt.com"; //Server ip address
$port  = 1883;
$username = "orqtvkxp";  //username ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$password = "4Wc8k_8KxJxf";  //password ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$client_id = "Client-".rand();

$mqtt = new phpMQTT($server, $port, $client_id);
if( !$mqtt->connect(true, NULL, $username, $password) ) {
 exit(1);
}

$topics['test/topic'] = array("qos" => 0, "function" => "procmsg");
$mqtt->subscribe($topics, 0);

while($mqtt->proc()){
 
}

$mqtt->close();

function procmsg($topic, $msg){
  echo "Recieved at: " . date("Y-m-d H:i:s", time()) . "\n";
  echo "Topic: {$topic}\n";
  echo "Message: $msg\n\n";
}

?>