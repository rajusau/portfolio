<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $suggestion = trim($_POST["suggestion"]);

    // Validate data
    if (empty($name) || empty($email) || empty($suggestion)) {
        http_response_code(400);
        echo "Please fill out all fields.";
        exit;
    }

    // Set recipient email address (your email address)
    $to = "theraju2003@gmail.com";

    // Set email subject
    $subject = "New Suggestion from $name";

    // Build the email content
    $message = "Name: $name\n";
    $message .= "Email: $email\n\n";
    $message .= "Suggestion:\n$suggestion\n";

    // Set headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        http_response_code(200);
        echo "Thank you! Your suggestion has been sent.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
