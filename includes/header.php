<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>local freelancing Platform</title>
    <link rel="stylesheet" href="/freelancing/css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="/freelancing/index.php" class="logo">Local Freelancing Platform</a>
            <nav>
                <?php if (isset($_SESSION['user_id'])):
                    // Fetch user balance to display in header
                    $uid = $_SESSION['user_id'];
                    $balance_res = $conn->query("SELECT balance FROM users WHERE id = $uid");
                    $current_balance = $balance_res->fetch_assoc()['balance'];
                    ?>
                    <span style="color: var(--success-color); margin-right: 1.5rem;">
                        NPR <?php echo number_format($current_balance, 2); ?>
                    </span>
                    <a href="/freelancing/wallet.php">Wallet</a>
                    <?php if ($_SESSION['role'] === 'freelancer'): ?>
                        <a href="/freelancing/freelancer_dashboard.php">Find Projects</a>
                    <?php elseif ($_SESSION['role'] === 'client'): ?>
                        <a href="/freelancing/client_dashboard.php">My Projects</a>
                    <?php endif; ?>
                    <a href="/freelancing/logout.php" class="btn btn-logout">Logout</a>
                <?php else: ?>
                    <a href="/freelancing/login.php">Log In</a>
                    <a href="/freelancing/signup.php" class="btn">Sign Up</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main>