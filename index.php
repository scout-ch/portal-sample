<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$config = include("config.php");

$title = "Test";
$content = "Test";

$array = ["title" => ["de" => "Midata Meldet: "], "content" => ["de" => "Nein!"]];
$json = json_encode($array);

$client = new Client();
$res = $client->request('PUT', $config['baseURL'] . "message", [
    'headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'X-Tile-Authorization' => $config['apiKey']
    ],
    'body' => $json
]);

echo $res->getStatusCode();
echo '<br />';
echo $res->getBody()->getContents();
