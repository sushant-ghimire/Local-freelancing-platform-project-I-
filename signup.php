<?php
require_once 'includes/header.php';
?>

<div class="form-container">
    <form action="signup.php" method="POST">
        <h1>Create Account</h1>

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="form-group">
            <label for="role">I am a:</label>
            <select id="role" name="role" required>
                <option value="freelancer">Freelancer (Looking for work)</option>
                <option value="client">Client (Looking to hire)</option>
            </select>
        </div>
        <button type="submit" class="btn">Create Account</button>
        <p class="switch-form">Already have an account? <a href="login.php">Log In</a></p>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>