<?php

    require "./functions/env.php";

    $username = '';
    $email = '';
    $user_id = '';
    $role = '';
    $role_id = '';
    $image_link = '';

    $url = $SELF_API_BASE_URL . "user-info.php";

    try{

        if(!isset($_SESSION['token'])){
            echo "Token is unvav in session";
        }

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $_SESSION['token'],
                'user_id: ' . $_SESSION['user_id']
            ]
        ]);
    
        $resp = curl_exec($curl);
        $decoded = json_decode($resp);
        
        $user_id = $decoded->data->id;
        $role = $decoded->data->role;
        $role_id = $decoded->data->role_id;
        // // $created_at = $decoded->data->created_at;
        $email = $decoded->data->email;
        $username = $decoded->data->username;
        $image_link = $decoded->data->image_link;

        // print_r($decoded);

    }catch(Exception $e){
        echo $e;
    }finally{
        curl_close($curl);
    }

?>
