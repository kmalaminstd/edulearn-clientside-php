<?php

    // echo $_SESSION['token'];

?>

        
            <section class="profile-settings">
                <h2 class="section-title">Profile Settings</h2>
                <form class="settings-form" enctype="multipart/form-data" method="POST" action="./functions/update-teacher-profile.php">
                    <div class="form-group">
                        <label for="image">Update Profile Image:</label>
                        <input type="file" value="<?php echo $image_link ?>" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
                    </div>
                    
                    <button type="submit" name="submit" class="save-btn">Save Changes</button>
                </form>
            </section>