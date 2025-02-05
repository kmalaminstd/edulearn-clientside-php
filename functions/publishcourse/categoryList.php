<?php

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'http://localhost/eduwebbackend/all-category.php',
        CURLOPT_RETURNTRANSFER => true
    ]);

    $resp = curl_exec($curl);
    $decoded = json_decode($resp);

    $category = $decoded->data->data;

?>