<?php

$owner = 'mohinzamer';
$repo = 'ecommerce';
$committer = 'mohin.m@technotackle.com';
$token = 'YOUR-TOKEN';

$url = "https://api.github.com/repos/{$owner}/{$repo}/commits?committer={$committer}";

$options = [
    CURLOPT_URL => $url,
    CURLOPT_HTTPHEADER => [
        'Accept: application/vnd.github.v3+json',
        'Authorization: Bearer ' . $token,
    ],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTPGET => true,
];

$ch = curl_init();
curl_setopt_array($ch, $options);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    $decodedResponse = json_decode($response, true);
    print_r($decodedResponse); // Output the response as an array
}

curl_close($ch);
?>
