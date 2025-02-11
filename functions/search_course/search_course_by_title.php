<?php
	
	require './functions/env.php';

	$url = $SELF_API_BASE_URL . 'search-course-by-title.php';

	$searchText = $_GET['courseText'];
	$page = $_GET['page'];

	$data = ['searchText' => $searchText];

	try{

		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_HTTPHEADER => [
				'page: ' . $page
			]
		]);

		$res = curl_exec($curl);
		$sCourseData = json_decode($res, true);

		curl_close($curl);

	}catch(Exception $e){
		echo $e;
	}

?>
