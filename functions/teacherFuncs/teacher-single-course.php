<?php

    if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    $baseUrl = 'http://localhost/eduwebbackend/teacher-single-course-view.php?';

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $tid = isset($_GET['tid']) ? $_GET['tid'] : null;

    $url = $baseUrl . 'id=' . $id . '&tid=' . $tid ;

    $data;

    try{

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $_SESSION['token']
            ]
        ]);

        $resp = curl_exec($curl);
        $data = json_decode($resp, true);

        // print_r($data);

        curl_close($curl);

    }catch(Exception $e){
        echo $e;
    }

// id=1&tid=3


?>