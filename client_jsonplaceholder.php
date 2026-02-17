<?php 

require 'vendor/autoload.php';

$client = new \GuzzleHttp\Client();

// GET https://jsonplaceholder.typicode.com/posts/1
$response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();


$response = $client->request('POST', 'https://jsonplaceholder.typicode.com/posts', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'body' => json_encode([
        'title' => 'foo',
        'body' => 'bar',
        'userId' => 1,
    ])
]);

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();

// PUT https://jsonplaceholder.typicode.com/posts/1
$response = $client->request('PUT', 'https://jsonplaceholder.typicode.com/posts/1', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'body' => json_encode([
        'title' => 'foo',
        'body' => 'bar',
        'userId' => 1,
    ])
]);

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();

// PATCH https://jsonplaceholder.typicode.com/posts/1
$response = $client->request('PATCH', 'https://jsonplaceholder.typicode.com/posts/1', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'body' => json_encode([
        'title' => 'lorem ipsum',
    ])
]);

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();

// DELETE https://jsonplaceholder.typicode.com/posts/1
$response = $client->request('DELETE', 'https://jsonplaceholder.typicode.com/posts/1');

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();
