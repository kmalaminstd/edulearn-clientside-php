<?php

    require "./functions/env.php";

    if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    $data;

    $url = $SELF_API_BASE_URL . "mycourse-list.php";

    try{

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $_SESSION['token'],
                'user_id: ' . $_SESSION['user_id']
            ]
        ]);

        $resp = curl_exec($curl);
        $data = json_decode($resp, true);

        curl_close($curl);


    }catch(Exception $e){
        var_dump($e);
    }

?>
