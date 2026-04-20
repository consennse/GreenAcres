<?php

$apiUrl = "https://greenacres-5lyl.onrender.com";

$data = [
    "source_url" => "https://greenacres-5lyl.onrender.com",
    "ftp_host" => "ftp.vizzit.com",
    "ftp_username" => "inmoenter",
    "ftp_password" => "2chfjtag",
    "ftp_target_path" => "33079a.zip"
];

$ch = curl_init($apiUrl);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => ['Content-Type: application/json']
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "Error: " . curl_error($ch);
} else {

    $result = json_decode($response, true);

    if (isset($result['logs'])) {

        $logFile = __DIR__ . "/logs/green_alps.log";

        $logText = implode("\n", $result['logs']);

        file_put_contents($logFile, $logText . "\n", FILE_APPEND);

        echo "Logs saved successfully";
    }

    echo "<pre>";
    print_r($result);
    echo "</pre>";
}

curl_close($ch);
