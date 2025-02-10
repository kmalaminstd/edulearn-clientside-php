<?php

    if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    require '../../functions/env.php';

    // header('Location: ../../teacher-profile.php');

    echo isset($_POST['submit']);

    $course_id = filter_input(INPUT_POST , 'course_id' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_input(INPUT_POST, 'title' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category = filter_input(INPUT_POST, 'category' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, 'price' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $url = $SELF_API_BASE_URL . 'publisher-update-course.php';

    $postData = [
        'title' => $title,
        'description' => $description,
        'category' => $category,
        'price' => $price
    ];

    // var_dump($postData);

    try{

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $_SESSION['token'],
                'course_id: ' . $course_id
            ]
        ]);

        $updateRes = curl_exec($curl);
        $updateData = json_decode($updateRes, true);

        // var_dump($updateRes);

        curl_close($curl);

        header('Location: ../../teacher-profile.php');

    }catch(Exception $e){
        echo $e;
        header('Location: ../../edit-course.php');
    }

?>
