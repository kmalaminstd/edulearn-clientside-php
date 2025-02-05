<?php

    session_name("eduwebclientui_session"); 
    session_start();

    echo $_SESSION['role'];
 
    // echo $_SESSION['role'] == 'teacher';

    if(isset($_SESSION['token']) && isset($_SESSION['role']) && $_SESSION['role'] == 'student'){
        
            header('Location: ./student-profile.php');
            exit();
        
    }elseif(isset($_SESSION['token']) && isset($_SESSION['role']) && $_SESSION['role'] == 'teacher'){
        header('Location: ./teacher-profile.php');
        exit();
    }else{
        header('Location: ./index.php');
        exit();
        
    }

    // header('Location: ./index.php');

?>