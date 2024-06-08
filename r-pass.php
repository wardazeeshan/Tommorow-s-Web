<?php
session_start();

include 'connect.php'; // Make sure this file establishes a valid database connection

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

try {
    $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token_hash);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user === null) {
        die("Token not found");
    }

    if (strtotime($user["reset_token_expires_at"]) <= time()) {
        die("Token has expired");
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// If the password reset is successful, redirect to login.php without the error message
if (isset($_SESSION['reset_success']) && $_SESSION['reset_success'] === true) {
    unset($_SESSION['reset_success']); // Unset the session variable to avoid redirecting again
    header("Location: index.php");
    exit();
}
?>
<!---HTML CODE--->
<!DOCTYPE html>
<html5 lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0">
    <title>MusicCoffee</title>
    <!-- Linking the Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!--Importing font from Google fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
    </style>
    <!--Include your styles here or just put them in the style.css-->
    <link rel="stylesheet" href="resetpass.css" /> <!--The default one used by amina for navigation bar-->
</head>
<body>
<div class="container">
        <div class="heading">
            <br>
        <h1>Reset password</h1>
        <br>
        </div>
        <div class="content">
        <form method="POST" action="process-reset-password.php"> 
              <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>" />
                <div class="input-group">
                <label for="password">New Password</label> <!-- Label for the input field -->
                <input type="password" id="password" name="password"/>
                </div>
                <div class="input-group">
                <label for="password_confirmation">Repeat Password</label> <!-- Label for the input field -->
                <input type="password" id="password_confirmation" name="password_confirmation"/>               
                </div>

            <input type="submit" class="btn" value="Submit" name="signIn"> <!-- Submit button for sign-in form -->                 
    </form>
        
    </div>

</body>
</html5>
