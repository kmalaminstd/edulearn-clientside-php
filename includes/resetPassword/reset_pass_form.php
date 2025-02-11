<div class="rp-container">
    <div class="rp-card">
        <div class="rp-header"> 
            <h1>Reset Password</h1>
            <p>Enter your email address to receive password reset instructions</p>
        </div>

        <form class="rp-form" method="POST" action="./functions/reset_password/request_reset_pass.php">
            <div class="rp-form-group">
                <label for="email">Email Address</label>
                <div class="rp-input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>

            <button type="submit" name="pass_reset_req" class="rp-submit-btn">Reset Password</button>
            
            <div class="rp-links">
                <a href="./login.php" class="rp-back-link">
                    <i class="fas fa-arrow-left"></i> Back to Login
                </a>
            </div>
        </form>
    </div>
</div>
