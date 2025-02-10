<?php

    if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    if(!isset($_SESSION['token']) && $_SESSION['role'] !== 'teacher'){
        header('Location: ./login.php');
    }

    include('./includes/shared/meta.php');
    include('./includes/shared/navbar.php');
    include('./includes/editCourse/editCourseForm.php');
    include('./includes/shared/footer.php');

?>