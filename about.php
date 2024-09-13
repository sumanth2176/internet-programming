<?php
// submit_registration.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership = $_POST['membership'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    // Sanitize input data to prevent SQL injection and XSS attacks
    $first_name = htmlspecialchars(trim($first_name));
    $last_name = htmlspecialchars(trim($last_name));
    $email = htmlspecialchars(trim($email));
    $phone = htmlspecialchars(trim($phone));
    $membership = htmlspecialchars(trim($membership));
    $gender = htmlspecialchars(trim($gender));
    $dob = htmlspecialchars(trim($dob));

    // Process the form (e.g., save to a database, send an email, etc.)
    // Example of saving to a database:
    /*
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "fitness_zone";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO registrations (first_name, last_name, email, phone, membership, gender, dob)
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$membership', '$gender', '$dob')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    */

    // Example of sending a confirmation email
    /*
    $to = $email;
    $subject = "Fitness Zone Registration Confirmation";
    $message = "Hello $first_name $last_name,\n\nThank you for registering with Fitness Zone! We're excited to help you on your fitness journey.\n\nBest regards,\nFitness Zone Team";
    $headers = "From: no-reply@fitnesszone.com";

    mail($to, $subject, $message, $headers);
    */

    // Redirect to a confirmation page or display a success message
    echo "Thank you, $first_name! Your registration is complete.";
} else {
    echo "Invalid request method.";
}
?>
