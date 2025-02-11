<?php

    include('./includes/shared/meta.php');
    include('./includes/shared/navbar.php');

    if(!isset($_GET['token'])){
        include('./includes/resetPassword/reset_pass_form.php');
    }

    if(isset($_GET['token'])){
        include('./includes/resetPassword/confirm_pass_form.php');
    }

    include('./includes/shared/footer.php');

?>