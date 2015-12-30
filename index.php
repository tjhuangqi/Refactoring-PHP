<?php
require_once __DIR__ . '/vendor/autoload.php';


$a = new \Lib\Api\Api('yourappkey', 'yourappSecret');

$url = 'http://app.api.test.join10.com/app/getversion/';

$data = [
    'version' => 'V1.2',
];

try {
    $response = $a->post($url, $data);
} catch (\Exception $e) {
    print_r($e->getMessage());
    exit;
}

print_r(json_encode($response->getResult()));


