<?php
// Retrieve environment variables
$user   = getenv('CLOUDSQL_USER');
$pass   = getenv('CLOUDSQL_PASSWORD');
$db     = getenv('CLOUDSQL_DB');
$socket = getenv('CLOUDSQL_CONNECTION_NAME');

// Check if we're on Google App Engine Standard
if (isset($_SERVER['GAE_ENV']) && $_SERVER['GAE_ENV'] === 'standard') {
    // Use Unix socket to connect to Cloud SQL
    $conn = new mysqli(null, $user, $pass, $db, null, "/cloudsql/$socket");
} else {
    // Use local connection settings (127.0.0.1 for XAMPP/WAMP)
    $conn = new mysqli('127.0.0.1', $user, $pass, $db);
}

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: (" . $conn->connect_errno . ") " . $conn->connect_error);
}
?>
