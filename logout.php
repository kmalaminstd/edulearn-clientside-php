<?php

    session_name("eduwebclientui_session");
    session_start();

    session_unset();

    session_destroy();

    header('Location: ./index.php');

?>