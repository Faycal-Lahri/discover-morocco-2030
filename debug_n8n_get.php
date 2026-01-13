<?php
$url = 'http://localhost:5678/webhook/b153f3ed-ca8f-4ff0-ba11-044b551937e3';

echo "Testing GET to: " . $url . "\n";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, 1); // Send GET request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    echo "Curl Error: " . curl_error($ch) . "\n";
}

curl_close($ch);

echo "HTTP Status Code: " . $httpCode . "\n";
echo "Response: " . $response . "\n";
