<?php

$owner = 'mohinzamer';
$repo = 'ecommerce';
$committer = 'mohinzamer';
$token = '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';
$date="2024-01-02";

// $url = "https://api.github.com/repos/{$owner}/{$repo}/commits?author=mohinzamer&since=".$date."T00:00:00.000+05:30&until=".$date."T23:59:59.000+05:30";
$url = "https://api.github.com/repos/{$owner}/{$repo}/commits?author=".$committer."&since=".$date."T00:00:01Z&until=".$date."T23:59:59Z";


$options = [
    CURLOPT_URL => $url,
    CURLOPT_HTTPHEADER => [
        'Accept: application/vnd.github.v3+json',
        'Authorization: Bearer ' . $token,
        'User-Agent: 123', // Replace with a custom User-Agent
    ],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTPGET => true,
    CURLOPT_SSL_VERIFYPEER => false, // Disable SSL verification (not recommended for production)
    CURLOPT_SSL_VERIFYHOST => false,
];

$ch = curl_init();
curl_setopt_array($ch, $options);

$response = curl_exec($ch);
//print_r(json_decode($response, true));

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    $decodedResponse = json_decode($response, true);
    echo "<pre>";
    print_r($decodedResponse); // Output the response as an array
}




curl_close($ch);
?>
