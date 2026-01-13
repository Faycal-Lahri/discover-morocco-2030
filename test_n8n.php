<?php
$url = getenv('N8N_WORKFLOW_WEBHOOK_URL');
if (!$url) {
    // try to read from .env manually if getenv fails (env variables might not be loaded in CLI without artisan)
    $envFile = file_get_contents('.env');
    preg_match('/N8N_WORKFLOW_WEBHOOK_URL=(.*)/', $envFile, $matches);
    $url = isset($matches[1]) ? trim($matches[1]) : null;
}

echo "Testing URL: " . $url . "\n";

if (!$url) {
    echo "URL not found in environment.\n";
    exit(1);
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "test=true");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    echo "Curl Error: " . curl_error($ch) . "\n";
}

curl_close($ch);

echo "HTTP Status Code: " . $httpCode . "\n";
echo "Response: " . $response . "\n";
