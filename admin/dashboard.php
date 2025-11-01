<?php
require_once '../includes/db.php'; // DB connection

// Admin Authentication Check
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

// Fetch pending jobs (READ)
$pending_jobs = $conn->query("SELECT j.id, j.title, u.full_name FROM jobs j JOIN users u ON j.client_id = u.id WHERE status = 'pending_approval'");

// Fetch current commission rate (READ)
$commission_rate_result = $conn->query("SELECT setting_value FROM settings WHERE setting_name = 'commission_rate'");
$commission_rate = $commission_rate_result->fetch_assoc()['setting_value'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <div class="container">
        <a href="#" class="logo">KamBazar Admin</a>
        <nav>
            <a href="../logout.php" class="btn btn-logout">Logout</a>
        </nav>
    </div>
</header>
<main>
<div class="container admin-dashboard">
    <h1>Welcome, <?php echo $_SESSION['admin_name']; ?></h1>

    <div class="admin-section">
        <h2>Jobs Pending Approval</h2>
        <?php if ($pending_jobs && $pending_jobs->num_rows > 0): ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Posted By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($job = $pending_jobs->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($job['title']); ?></td>
                    <td><?php echo htmlspecialchars($job['full_name']); ?></td>
                    <td>
                        <form action="approve_job.php" method="POST" style="display:inline;">
                            <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
                            <button type="submit" class="btn">Approve</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No jobs are currently pending approval.</p>
        <?php endif; ?>
    </div>

    <div class="admin-section">
        <h2>Site Settings</h2>
        <form action="update_settings.php" method="POST">
            <div class="form-group">
                <label for="commission_rate">Commission Rate (%)</label>
                <input type="number" name="commission_rate" id="commission_rate" value="<?php echo $commission_rate; ?>" min="0" max="100" step="1">
            </div>
            <button type="submit" class="btn">Update Settings</button>
        </form>
    </div>
</div>
</main>
</body>
</html>