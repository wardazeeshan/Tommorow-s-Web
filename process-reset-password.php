<?php
session_start();

include 'connect.php'; // Make sure this file establishes a valid database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $token = $_POST['token'];
    $token_hash = hash("sha256", $token);

    try {
        // Check if the token exists and is valid
        $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token_hash);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user === null) {
            $_SESSION['reset_error'] = "Token not found";
            header("Location: index.php");
            exit();
        }

        if (strtotime($user["reset_token_expires_at"]) <= time()) {
            $_SESSION['reset_error'] = "Token has expired";
            header("Location: index.php");
            exit();
        }

        // Update the user's password
        $hashed_password = md5($password); // Hash the new password
        $update_sql = "UPDATE users SET password = ? WHERE email = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $hashed_password, $user['email']);
        $update_stmt->execute();

        // Password updated successfully, set a session variable to indicate success
        $_SESSION['reset_success'] = true;

        // Redirect back to login.php after successful password reset
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        $_SESSION['reset_error'] = "Database error: " . $e->getMessage();
        header("Location: index.php");
        exit();
    }
} else {
    // If the request method is not POST, redirect back to the login page
    header("Location: index.php");
    exit();
}
?>
