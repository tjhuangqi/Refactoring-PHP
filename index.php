<?php

function curlPost($url, $post_data)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
    $returnValue = curl_exec($ch);
    curl_close($ch);
    return $returnValue;
}

$url = 'api.j13.com/storage/';

$data = [
    'a' => [
        1,2,3
    ],
];

$response = curlPost($url, $data);

