<?php

    require "../../functions/env.php";

    $url = $SELF_API_BASE_URL . 'reset-password-request.php';

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

    $data = ['email' => $email];

    if(isset($_POST['pass_reset_req'])){

        try{

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $data
            ]);

            $res = curl_exec($curl);
            $resData = json_decode($res, true);

            print_r($res);

            curl_close($curl);

            header('Location: ../../logout.php');

        }catch(Exception $e){
            echo $e;
        }

    }

    

?>
