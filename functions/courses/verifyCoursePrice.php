<?php

	require './getCourseDetailsById.php';
	require './courseEnroll.php';
	require './coursePayment.php';

	if(!isset($_POST['course_enroll_btn'])){
		echo "Something went wrong";
		exit;
	}

	$id = filter_input(INPUT_POST, 'course_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	$courseDetails = getCourseByid($id);

	if($courseDetails['data']['price'] > 0){

		$course_id = $courseDetails['data']['course_id'];
		$course_price = $courseDetails['data']['price'] * 100;
		$course_title = $courseDetails['data']['title'];
		$cancel_url = 'http://localhost/eduwebclientui/';
		$success_url = 'http://localhost/eduwebclientui/payment-success.php?session_id={CHECKOUT_SESSION_ID}';

		$payUrl = coursePayment($course_price, $course_title, $cancel_url, $success_url);
		header("Location: $payUrl");
		// echo $payUrl;

	}else{
		enroll_course();
	}


?>
