<?php

    if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    // echo $_SESSION['role'];

    if(!isset($_SESSION['token']) && $_SESSION['role'] !== 'teacher'){
        header('Location: ./login.php');
        exit;
    }


    include('./includes/shared/meta.php');
    include('./includes/shared/navbar.php');
    include('./includes/teacherProfile/profilleView.php');
    include('./includes/teacherProfile/profileSettings.php');
    include('./includes/teacherProfile/uploadedCourse.php');
    include('./includes/shared/footer.php');

?>
