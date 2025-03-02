<?php

    require "./functions/env.php";

    $url = $SELF_API_BASE_URL . "all-category.php";

    try{

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        ]);

        $resp = curl_exec($curl);
        $decoded = json_decode($resp);

        $category = $decoded->data->data;

        print_r($category);

        curl_close($curl);

    }catch(Exception $e){
        echo $e;
    }

    

?>
