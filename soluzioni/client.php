<?php 

require '../vendor/autoload.php';

$client = new \GuzzleHttp\Client();

// GET https://localhost:8000/posts/1
$response = $client->request('GET', 'http://localhost:8000/api/posts/1');

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();

// POST https://localhost:8000/api/posts with JSON body { "title": "foo", "content": "bar" }
$response = $client->request('POST', 'http://localhost:8000/api/posts', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'body' => json_encode([
        'title' => 'foo',
        'content' => 'bar'
    ])
]);

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();

// PUT https://localhost:8000/api/posts/1
$response = $client->request('PUT', 'http://localhost:8000/api/posts/4', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'body' => json_encode([
        'title' => 'foo updated',
        'content' => 'bar',
    ])
]);

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();

// PATCH https://localhost:8000/api/posts/4
$response = $client->request('PATCH', 'http://localhost:8000/api/posts/4', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'body' => json_encode([
        'content' => 'bar updated',
    ])
]);

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();

// DELETE https://localhost:8000/api/posts/4
$response = $client->request('DELETE', 'http://localhost:8000/api/posts/4');

echo $response->getStatusCode();
echo $response->getHeaderLine('content-type');
echo $response->getBody();
