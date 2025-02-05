<?php

    if(session_status() == PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    // $data = json_encode(file_get_contents('php://input'));

    $title;
    $description;
    $category;
    $price;
    $image;
    $video;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $title = filter_input(INPUT_POST , 'title' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST , 'description' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category = filter_input(INPUT_POST , 'category' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST , 'price' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $image = new CURLFile($_FILES['image']['tmp_name'] , $_FILES['image']['type'] , $_FILES['image']['name']);
        $video = new CURLFile($_FILES['video']['tmp_name'] , $_FILES['video']['type'] , $_FILES['video']['name']);

        $postData = [
            'title' => $title,
            'description' => $description,
            'category' => $category,
            'price' => $price,
            'image' => $image,
            'video' => $video
        ];


        // sending data through api

        try{

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'http://localhost/eduwebbackend/publish-course.php',
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => $postData,
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $_SESSION['token'],
                    'user_id: ' . $_SESSION['user_id']
                ]
                ]
            );
    
            $resp = curl_exec($curl);
            $decoded = json_decode($resp, true);
            // print_r($decoded);
            header('Location: ../index.php');
    
            curl_close($curl);   
            
        }catch(Exception $e){
            // print_r($e);
            header('Location: ./publish-course.php');
        }

    }else{
        echo 'Method not allowed';
    }

?>