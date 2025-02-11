


<section class="profile-settings">
                <h2 class="section-title">Profile Settings</h2>

                <div class="prof-set-btns">
                    <a href="./reset-password.php" class="reset_pass_btn">Reset Password</a>
                </div>
                

                <form class="settings-form" method="POST" action="./functions/update-student-profile.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="image">Update Profile Image:</label>
                        <input type="file" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
                    </div>
                    
                    <button type="submit" name="submit" class="save-btn">Save Changes</button>
                </form>
            </section>
