

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "thehorizonhearts@gmail.com";
        $subject = "New Email Signup";
        $message = "Some one wants us to be in touch with her,Email: $email";
        $headers = "From: info@horizonhearts.rw";

        if (mail($to, $subject, $message, $headers)) {
            echo "Email received successfully! we will get back to you soon!";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Invalid email.";
    }
} else {
    echo "Only POST requests are accepted.";
}
?>
