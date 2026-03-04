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
    echo $response;
}

curl_close($ch);
