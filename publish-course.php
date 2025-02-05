<?php

    session_name("eduwebclientui_session");
    session_start();

    // var_dump($_SESSION);

    if(!isset($_SESSION['token']) || $_SESSION['role'] !== 'teacher'){
        header('Location: ./index.php');
        exit();
    }


    include('./includes/shared/meta.php');
    include('./includes/shared/navbar.php');
    include('./includes/publishCourse/publishForm.php');
    include('./includes/shared/footer.php');

?>   
<link rel="stylesheet" href="./css/publishForm.css">