<?php
	
	require '../../functions/env.php';

	

	function getCourseByid($id){

		global $SELF_API_BASE_URL;

		$course_by_id_url = $SELF_API_BASE_URL . 'get-course-by-id.php';

		if(!$id){
			echo 'Id not sending';
			exit;
		}

		$courseDetails;

		try{

			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => $course_by_id_url,
				CURLOPT_POST => true,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POSTFIELDS => http_build_query(['course_id' => $id]),
				CURLOPT_HTTPHEADER => [
				    'Authorization: Bearer ' . $_SESSION['token']
				]
			]);

			$res = curl_exec($curl);
			$courseDetails = json_decode($res, true);
			// $courseDetails = $res;
			// print_r($res);

			curl_close($curl);

		}catch(Exception $e){
			$courseDetails = $e;
		}

		return $courseDetails;
	}

?>
