<?php

    require './functions/env.php';

    if(session_status() === PHP_SESSION_NONE){  
        session_name("eduwebclientui_session");
        session_start();
    }

    $url = $SELF_API_BASE_URL . 'user-showed-course-list.php';

    // $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    try{

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $_SESSION['token'],
                'page: ' . $page
            ]
        ]);

        $resp = curl_exec($curl);
        $data = json_decode($resp, true);

        // print_r($data);

        curl_close($curl);

    }catch(Exception $e){
        echo $e;
    }

?>
