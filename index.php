<?php

    session_name("eduwebclientui_session");
    session_start();

    if(isset($_SESSION['token'])){
        $token = $_SESSION['token'];
        if($_SESSION['role'] == 'student'){
            header('Location: ./courses.php');
        }
        if($_SESSION['role'] == 'teacher'){
            header('Location: ./teacher-profile.php');
        }
    }


    include('./includes/shared/meta.php');
    // include('./includes/shared/navbar.php');

    
    include('./includes/shared/navbar.php');
    include('./includes/indexPage/hero.php');
    include('./includes/indexPage/feature.php');
    include('./includes/indexPage/instructorBenefit.php');
    include('./includes/shared/footer.php');
    

?>