<?php

	require '../../functions/env.php';

	function coursePayment($price, $title, $cancel_url, $success_url){
		global $SELF_API_BASE_URL;

		$url = $SELF_API_BASE_URL . 'pay-with-stripe.php';

		try{

			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_HTTPHEADER => [
					'Authorization: ' . $_SESSION['token']
				],
				CURLOPT_POSTFIELDS => http_build_query([
					'price' => $price,
					'title' => $title,
					'cancel_url' => $cancel_url,
					'success_url' => $success_url
				])
			]);

			$res = curl_exec($curl);

			return $res;

			curl_close($curl);

		}catch(Exception $e){
			echo $e;
		}
	}

?>
