
<link rel="stylesheet" href="./css/courses.css">

<?php

    session_name("eduwebclientui_session");
    session_start();

    if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'student'){
        header('Location: ./index.php');
        exit();
    }

//    var_dump($_SESSION['role']);

    include('./includes/shared/meta.php');
    include('./includes/shared/navbar.php');
    include('./includes/courses/filterOption.php');
    include('./includes/courses/courseList.php');
    include('./includes/shared/footer.php');
?>
    