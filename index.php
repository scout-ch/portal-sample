<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$title = "Test";
$content = "Test";

$array = ["title" => ["de" => "Midata Meldet: "], "content" => ["de" => "Nein!"]];
$json = json_encode($array);

$apiKey = "35d28606-0be4-47f1-b0c8-37df82ea12d8";
$baseURL = "https://pbsportal.itds-test.ch/api/v1/";

$client = new Client();
$res = $client->request('PUT', $baseURL . "message", [
    'headers' => [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'X-Tile-Authorization' => '35d28606-0be4-47f1-b0c8-37df82ea12d8'
    ],
    'body' => $json
]);

echo $res->getStatusCode();
echo '<br />';
echo $res->getBody()->getContents();
