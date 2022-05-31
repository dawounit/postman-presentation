<?php

header('Content-Type: text/xml');

$input = new SimpleXMLElement(file_get_contents('php://input'));
$output = new SimpleXMLElement('<?xml version="1.0"?><content/>');
$output->addChild('welcome', sprintf('Hello %s! You are so pretty %s <3 <3 <3', $input->name, $input->kind));
$data = $output->addChild('your-data');
$data->addChild('1', 'ras');
$data->addChild('2', 'dwa');
$data->addChild('3', 'czy');
$child = $data->addChild('999');
$child->addChild('firstProperty', 'Nah, nah, nah.');
$child->addChild('secondProperty', 'Blah, blah, blah.');
$child->addChild('thirdProperty', 'Nioch, nioch, nioch.');
$data->addChild('abc', '123');

echo $output->asXML();
