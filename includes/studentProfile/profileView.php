<?php
    require './functions/userInfo.php';

?>

<div class="profile-container">


        <div class="profile-container">
            <div class="profile-header">
                <div class="avatar-wrapper">
                    <img src="<?php echo $image_link ? $image_link : "./image/profile (1).png"  ?>" alt="Profile Picture">
                    <!-- <label class="upload-btn" for="avatar-upload">
                        <i class="fas fa-camera"></i>
                        <input type="file" id="avatar-upload" hidden>
                    </label> -->
                </div>
                <div class="profile-info">
                    <h2><?php echo $username ?></h2>
                    <p><?php echo $email ?></p>
                </div>
            </div>
        
            