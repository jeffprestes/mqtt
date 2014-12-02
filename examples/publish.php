<?php
require(__DIR__ . '/../spMQTT.class.php');

$mqtt = new spMQTT('tcp://iot.eclipse.org:1883/');

spMQTTDebug::Disable();

//$mqtt->setAuth('sskaje', '123123');
$connected = $mqtt->connect();
if (!$connected) {
    die("Not connected\n");
}

$mqtt->ping();

$msg = "release";

# mosquitto_sub -t 'sskaje/#'  -q 1 -h test.mosquitto.org
$mqtt->publish('jeffprestes/candies/paulista', $msg, 0, 1, 0, 1);

?>
