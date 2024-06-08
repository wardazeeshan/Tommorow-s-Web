<?php
session_start();
include 'nav.php';
// Check if user is logged in manually or through Google OAuth
if (!isset($_SESSION['id']) && !isset($_SESSION['google_loggedin'])) {
    header("Location: index.php");
    exit();
}

include 'connect.php'; // Include your database connection file

// Retrieve user data from the database
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $sql = "SELECT fullname, email FROM users WHERE id = '$userId'";
} elseif (isset($_SESSION['google_loggedin'])) {
    $email = $_SESSION['google_email'];
    $sql = "SELECT fullname FROM users WHERE email = '$email'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fullname = $row['fullname'];
    $email = $row['email'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css"> <!-- Link your CSS file here -->
</head>

<body>
<div class="pro-cover">
    <div class="prof-container">
        <h1>User Profile</h1>
        <div class="profile-info">
            <p><strong>Name:</strong> <?php echo $fullname; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
        </div>
        <form action="logout.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</div>
    
</body>

</html>
