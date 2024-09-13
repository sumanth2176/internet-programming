<?php
// track_interaction.php

// Check if the request is valid
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect interaction data (like button clicks, page views, etc.)
    $interaction_type = $_POST['interaction_type']; // e.g., 'button_click'
    $user_ip = $_SERVER['REMOTE_ADDR']; // Get user IP address
    $timestamp = date("Y-m-d H:i:s"); // Get the current time

    // Optional: Collect additional data (e.g., button or link clicked)
    $details = isset($_POST['details']) ? $_POST['details'] : 'N/A';

    // Sanitize inputs to prevent security issues
    $interaction_type = htmlspecialchars(trim($interaction_type));
    $details = htmlspecialchars(trim($details));

    // Process the interaction (e.g., log to a database or file)
    // Example of saving the interaction data to a file
    $log_file = 'interactions_log.txt';
    $log_entry = "$timestamp - IP: $user_ip - Interaction: $interaction_type - Details: $details\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);

    // You can also store this data in a database like this:
    /*
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "fitness_zone";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO interactions (interaction_type, details, user_ip, timestamp)
            VALUES ('$interaction_type', '$details', '$user_ip', '$timestamp')";

    if ($conn->query($sql) === TRUE) {
        echo "Interaction logged successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    */

    // Response for AJAX or redirect (optional)
    echo "Interaction recorded successfully.";
} else {
    echo "Invalid request.";
}
?>
