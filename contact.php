<?php
// send_message.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Sanitize input data to prevent security risks (e.g., XSS or SQL injection)
    $name = htmlspecialchars(trim($name));
    $email = htmlspecialchars(trim($email));
    $message = htmlspecialchars(trim($message));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Example: Sending an email (You can also save this data in a database)
    $to = "support@fitnesszone.com"; // Replace with your email
    $subject = "Contact Form Submission from $name";
    $body = "You have received a new message from the contact form on your website:\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Message:\n$message";
    $headers = "From: $email\r\nReply-To: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you, $name! Your message has been sent successfully.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }

    // Example: Saving to a database (commented out, but you can uncomment if needed)
    /*
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "fitness_zone";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO messages (name, email, message, date_submitted)
            VALUES ('$name', '$email', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Message saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    */
} else {
    echo "Invalid request.";
}
?>
