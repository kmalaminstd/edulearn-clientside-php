<div class="register-container">
        <div class="register-form-wrapper">
            <h1>Create Instructor Account</h1>
            <p class="form-subtitle">Join our learning community today</p>

            <form class="register-form" action="./functions/registration/teach-reg.php" method="POST">
                <!-- <div class="profile-upload">
                    <div class="profile-preview">
                        <img src="./assets/default-avatar.png" alt="Profile Preview" id="preview-img">
                    </div>
                    <label for="profile-photo" class="upload-btn">
                        Upload Photo
                        <input type="file" id="profile-photo" accept="image/*" hidden>
                    </label>
                </div> -->

                <div class="form-group">

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <!-- <div class="password-strength"></div> -->
                </div>

                <!-- <div class="form-group terms">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I agree to the Terms and Conditions</label>
                </div> -->

                <button type="submit" name="submit" class="register-submit-btn">Create Account</button>

                <p class="login-link">
                    Already have an account? <a href="./login.php">Login here</a>
                </p>
            </form>
        </div>
    </div>