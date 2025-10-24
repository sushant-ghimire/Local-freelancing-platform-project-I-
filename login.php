<?php
require_once 'includes/header.php';
?>

<div class="form-container">
    <form action="login.php" method="POST">
        <h1>Log In</h1>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Log In</button>
        <p class="switch-form">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>