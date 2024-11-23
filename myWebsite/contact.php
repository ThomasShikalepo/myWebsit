<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Your email address
    $to = "thomasshikalepo@gmail.com"; // Replace with your email
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Compose email body
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
            document.getElementById('success-message').style.display = 'block';
        </script>";
    } else {
        echo "<script>
            alert('An error occurred while sending the email. Please try again later.');
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid request method.');
    </script>";
}
?>
