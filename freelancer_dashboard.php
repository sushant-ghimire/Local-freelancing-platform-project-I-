<?php
// FILE: /freelancer_dashboard.php
// PURPOSE: To show freelancers a list of available jobs.

// This is a protected page. Include the auth_check to ensure the user is logged in.
require_once 'includes/auth_check.php';

// Also check if the user is actually a freelancer.
if ($_SESSION['role'] !== 'freelancer') {
    // If not, redirect them away to prevent access.
    header("Location: client_dashboard.php");
    exit();
}

// Include the page header.
require_once 'includes/header.php';
?>

<div class="container">
    <div class="dashboard-header">
        <h1>Find Your Next Project</h1>
        <p>Browse projects posted by clients across Nepal that are open for bidding.</p>
    </div>

    <div class="job-listings">
        <?php
        // --- FETCH OPEN JOBS FROM DATABASE (READ operation) ---
        // We select jobs that have been approved by the admin (status = 'open').
        // We also use a JOIN to get the client's name from the 'users' table.
        $sql = "SELECT j.id, j.title, j.description, j.budget, u.full_name as client_name
                FROM jobs j
                JOIN users u ON j.client_id = u.id
                WHERE j.status = 'open'
                ORDER BY j.created_at DESC"; // Show the newest jobs first
        
        $result = $conn->query($sql);

        // Check if any jobs were found.
        if ($result && $result->num_rows > 0) {
            // Loop through each job found in the database.
            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- This is an HTML card to display job information -->
                <div class="job-card">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <div class="budget">NPR <?php echo number_format($row['budget']); ?></div>
                    <!-- nl2br() converts newlines to <br> tags, htmlspecialchars() prevents XSS attacks. -->
                    <p><?php echo nl2br(htmlspecialchars(substr($row['description'], 0, 250))); ?>...</p>
                    <div class="job-actions">
                        <!-- This button links to the project details page, passing the job ID in the URL. -->
                        <a href="project.php?id=<?php echo $row['id']; ?>" class="btn">View & Send Proposal</a>
                    </div>
                </div>
                <?php
            } // End of the while loop
        } else {
            // If no open jobs are found, display a friendly message.
            echo "<p>No open projects found at the moment. Please check back later!</p>";
        }
        ?>
    </div>
</div>

<?php
// Include the page footer.
require_once 'includes/footer.php';
?>