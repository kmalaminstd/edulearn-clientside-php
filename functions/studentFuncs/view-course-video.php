<?php

    if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    try{

        $uid = $_GET['uid'];
        $cid = $_GET['cid'];

        if(!$uid || !$cid){
            header('Location: ../../index.php');
            exit;
        }

        $data = [
            'uid' => $uid,
            'cid' => $cid
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/eduwebbackend/user-requested-course-for-show.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $_SESSION['token'],
                'uid: ' . $uid,
                'cid: ' . $cid 
            ]
        ]);

        $res = curl_exec($curl);
        $data = json_decode($res, true);

        curl_close($curl);

    }catch(Exception $e){
        echo $e;
    }

?>