<?php
	
	require "../../functions/env.php";

    $url = $SELF_API_BASE_URL . 'confirm-reset-password.php';
    echo $url;

    $password = $_POST['password'];
    $token = $_POST['token'];

    $data = [
    	'password' => $password,
    	'token' => $token
    ];

    try{

    	$curl = curl_init();
    	curl_setopt_array($curl, [
    		CURLOPT_URL => $url,
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_POST => true,
    		CURLOPT_POSTFIELDS => $data
    	]);

    	$res = curl_exec($curl);
    	$passMsg = json_decode($res, true);
    	
    	curl_close($curl);

    	header('Location: ../../logout.php');

    }catch(Exception $e){
    	var_dump($e);
    }

?>
