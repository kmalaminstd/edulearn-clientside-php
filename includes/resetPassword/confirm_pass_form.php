<div class="rp-container">
    <div class="rp-card">
        <div class="rp-header">
            <h1>Create New Password</h1>
            <p>Please enter your new password</p>
        </div>

        <form class="rp-form" method="POST" action="./functions/reset_password/confirm_reset_pass.php">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>"> 
            
            <div class="rp-form-group">
                <label for="password">New Password</label>
                <div class="rp-input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           placeholder="Enter new password"
                           minlength="8"
                           required>
                    <button type="button" class="rp-toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <span class="rp-help-text">Minimum 8 characters</span>
            </div>

            <button type="submit" name="confirm-reset-password" class="rp-submit-btn">Reset Password</button>
        </form>
    </div>
</div>
