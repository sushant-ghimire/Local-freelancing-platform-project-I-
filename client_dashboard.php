<?php
require_once 'includes/header.php';
?>

<div class="container">
    <div class="dashboard-header">
        <h1>Client Dashboard</h1>
        <p>Manage your projects and hire talented freelancers.</p>
    </div>


    <div class="client-dashboard-grid">
        <div class="post-job-form">
            <h2>Post a New Job</h2>
            <form action="client_dashboard.php" method="POST">
                <div class="form-group">
                    <label for="title">Project Title</label>
                    <input type="text" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Project Description</label>
                    <textarea name="description" id="description" rows="6" required></textarea>
                </div>
                <div class="form-group">
                    <label for="budget">Budget (NPR)</label>
                    <input type="number" name="budget" id="budget" step="100" min="500" required>
                </div>
                <button type="submit" name="post_job" class="btn">Post Job</button>
            </form>
        </div>

        <div class="my-jobs-list">
            <h2>My Posted Jobs</h2>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>