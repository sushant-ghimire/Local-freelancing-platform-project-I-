<?php
// Start the session at the very beginning of your script
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// --- DATABASE CONNECTION ---
// Replace with your actual database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Default XAMPP username
define('DB_PASSWORD', '');     // Default XAMPP password
define('DB_NAME', 'kambazar_db');

// Create a database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- HELPER FUNCTIONS ---

// Function to prevent sharing of contact information
function sanitize_text($text) {
    // Regular expression to find Nepali phone numbers (starting with 98 or 97)
    $pattern = '/\b(98|97)\d{8}\b/';
    // Replace found numbers with a placeholder
    $replacement = '[Contact Info Hidden]';
    return preg_replace($pattern, $replacement, $text);
}
?>