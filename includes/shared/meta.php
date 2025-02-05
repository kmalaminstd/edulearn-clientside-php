<?php

    if(session_status() == PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    if(isset($_SESSION['token'], $_SESSION['user_id'], $_SESSION['role'])){
        try{
            
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'http://localhost/eduwebbackend/update-last-activity.php',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $_SESSION['token'],
                    'user_id: ' . $_SESSION['user_id'],
                    'role: ' . $_SESSION['role']
                ]
            ]);

            $resp = curl_exec($curl);
            $msg = json_decode($resp, true);

            curl_close($curl);
        
        }catch(Exception $e){
            echo $e;
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLearn - Online Learning Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    

</head>