<?php

    session_name("eduwebclientui_session");
    session_start();

    // echo $_SESSION['role'];

    if(!isset($_SESSION['token']) && $_SESSION['role'] !== 'student'){
        header('Location: ./login.php');
    }

    // echo $_SESSION['token'];


    include('./includes/shared/meta.php');
    include('./includes/shared/navbar.php');
    include('./includes/studentProfile/profileView.php');
    include('./includes/studentProfile/profileSettings.php');
    include('./includes/studentProfile/enrolledCourse.php');
    include('./includes/shared/footer.php');

    
?>