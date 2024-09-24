<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate the inputs
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Recipient email address
        $to = 'hi@tobiolusa.com';
        
        // Subject
        $subject = 'New Submission From Tobiolusa';
        
        // Message content
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        
        // Headers
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "<div>Message sent successfully!</div>";
        } else {
            echo "<div>There was an error sending your message. Please try again later.</div>";
        }
    } else {
        echo "<div>Please fill in all fields correctly.</div>";
    }
} else {
    echo "<div>Invalid request method.</div>";
}
?>
