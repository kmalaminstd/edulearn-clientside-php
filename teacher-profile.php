<?php

    session_name("eduwebclientui_session");
    session_start();

    // echo $_SESSION['role'];

    if(!isset($_SESSION['token']) && $_SESSION['role'] !== 'teacher'){
        header('Location: ./login.php');
    }


    include('./includes/shared/meta.php');
    include('./includes/shared/navbar.php');
    include('./includes/teacherProfile/profilleView.php');
    include('./includes/teacherProfile/profileSettings.php');
    include('./includes/teacherProfile/uploadedCourse.php');
    include('./includes/shared/footer.php');

?>
