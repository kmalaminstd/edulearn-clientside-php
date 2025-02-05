<?php

    if(session_status() == PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    try{



        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/eduwebbackend/user-enrolled-course.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $_SESSION['token'],
                'user_id: ' . $_SESSION['user_id'],
            ]
        ]);

        $resp = curl_exec($curl);
        $data = json_decode($resp, true);


        curl_close($curl);

    }catch(Exception $e){
        echo $e;
    }

?>