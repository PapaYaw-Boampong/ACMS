<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $to = "ako.oku@ashesi.edu.gh, chelsea.owusu@ashesi.edu.gh, yaw.boampong@ashesi.edu.gh, darryl.king@ashesi.edu.gh";
    $subject = "Complaint from " . $name;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $email_body = "<html>
    <head>
        <title>Complaint from " . $name . "</title>
    </head>
    <body>
        <h2>Complaint Details</h2>
        <p><strong>Name:</strong> " . $name . "</p>
        <p><strong>Email:</strong> " . $email . "</p>
        <p><strong>Phone:</strong> " . $phone . "</p>
        <p><strong>Message:</strong></p>
        <p>" . nl2br($message) . "</p>
    </body>
    </html>";

    if (mail($to, $subject, $email_body, $headers)) {
        echo "Complaint sent successfully.";
    } else {
        echo "Error sending complaint.";
    }
}
?>
