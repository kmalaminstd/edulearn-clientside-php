<link rel="stylesheet" href="./css/courses.css">
<?php

	if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    if(!isset($_SESSION['token']) && $_SESSION['role'] !== 'student'){
        header('Location: ./login.php');
        exit;
    }

    include('./includes/shared/meta.php');
    include('./includes/shared/navbar.php');
    include('./includes/searchCourse/course-layout.php');
    include('./includes/shared/footer.php');


?>
