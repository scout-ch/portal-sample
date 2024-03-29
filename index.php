<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$config = include 'config.php';

$array = [
    // Tell the pbs-portal which users should see this notification.
    // Enter at least one user-id. You can load it from the OAuth-Connection.
    // The ID 2 belongs to the user "hussein_kohlmann@hitobito.example.com"
    'limitToUserIds' => [
      2,
    ],
    // Tell the pbs-portal what title the notification should have.
    // You need to pass the title in all four supported languages.
    'title' => [
        'de' => 'Midata Meldung: ',
        'en' => 'Midata message: ',
        'fr' => 'Message de Midata: ',
        'it' => 'Messaggio di Midata: ',
    ],
    // Tell the pbs-portal what content the notification should have.
    // You need to pass the content in all four supported languages.
    'content' => [
        'de' => 'Hallo!',
        'en' => 'Hello!',
        'fr' => 'Bonjour!',
        'it' => 'Ciao!',
    ],
    // Tell the pbs-portal what URL the notification should point to.
    // You need to pass the URL in all four supported languages.
    // This attribute is optional.
    'url' => [
        'de' => 'https://pbs.puzzle.ch/de/groups/1/people/2.html',
        'en' => 'https://pbs.puzzle.ch/en/groups/1/people/2.html',
        'fr' => 'https://pbs.puzzle.ch/fr/groups/1/people/2.html',
        'it' => 'https://pbs.puzzle.ch/it/groups/1/people/2.html',
    ],
];

$json = json_encode($array);

$client = new Client();
$res = $client->request('PUT', $config['baseURL'] . 'message', [
    'headers' => [
        'Accept'               => 'application/json',
        'Content-Type'         => 'application/json',
        'X-Tile-Authorization' => $config['apiKey'],
    ],
    'body' => $json,
]);

echo $res->getStatusCode();
echo '<br />';
echo $res->getBody()->getContents();
