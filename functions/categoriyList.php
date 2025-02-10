<?php
require __DIR__ . "/env.php";

$url = $SELF_API_BASE_URL . "all-category.php";

try {
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    ]);

    $catResp = curl_exec($curl);

    // Check if cURL request failed
    if ($catResp === false) {
        die("cURL Error: " . curl_error($curl));
    }

    curl_close($curl);

    // Debugging: Check raw API response
    // echo "<pre>API Response: ";
    // var_dump($catResp);
    // echo "</pre>";

    // Decode JSON
    $decodedData = json_decode($catResp, true);

    // Check for JSON errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        die("JSON Decode Error: " . json_last_error_msg());
    }

    // Ensure 'data' key exists
    if (!isset($decodedData['data'])) {
        die("API response is missing 'data' key");
    }

    $catList = $decodedData['data'];

    // Debugging: Check decoded category data
    // echo "<pre>Decoded Data: ";
    // print_r($catList);
    // echo "</pre>";
} catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}
?>
