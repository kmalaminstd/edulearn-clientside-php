<?php


    if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    require "../../functions/env.php";

    $url = $SELF_API_BASE_URL . 'publisher-delete-course.php';

    // echo $_SESSION['token'];

    try{
    
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $_SESSION['token'],
                'course_id: ' . $_GET['course-id']
            ]
        ]);

        $resp = curl_exec($curl);
        $msg = json_decode($resp, true);

        var_dump($resp);
        
        curl_close($curl);

        header('Location: ../../teacher-profile.php');
    
    }catch(Exception $e){
        echo $e;
    }


?>