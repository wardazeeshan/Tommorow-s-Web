<?php
session_start();

include 'connect.php';

$email = $_POST["email"];

// Create a random token value
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);

// Create an expiry for the token
$expiry = date("Y-m-d H:i:s", time() + 60 * 30); // The token will only be valid for 30 minutes

// Connect to the database
$mysqli = $conn;

$sql = "UPDATE users SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";

// Prepare the SQL statement
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die("Prepare statement failed: " . $mysqli->error);
}

// Bind parameters
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

if ($mysqli->affected_rows) {
    $gmail = require __DIR__ . "/mailer.php";
    $gmail->setFrom("noreply@example.com", "noreply_link"); // Set the "noreply" address
    $gmail->addAddress($email);
    $gmail->Subject = "Password Reset";
    $gmail->Body = <<<END
    Click <a href="http://localhost/musiCoffee/r-pass.php?token=$token">Here</a> to reset your password.
    END;
    
    try {
        $gmail->send();
        echo "Message Sent, Check Inbox.";
        header("Location: recover.php");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$gmail->ErrorInfo}";
    }
} else {
    echo "Database update failed.";
}
?>
