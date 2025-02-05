<?php

    if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    $data;

    try{

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/eduwebbackend/mycourse-list.php',
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