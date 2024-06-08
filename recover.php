<?php
session_start();

$page_title = "Password reset form";
include ('connect.php'); 

// Check if the form is submitted
if(isset($_POST['signIn'])){
    // Assuming you have code here to send the password recovery link to the user's email

    // Display the statement after the email is sent
    $message = "Link to recover password has been sent to your email";
}
?>

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
    <link rel="stylesheet" href="recovers.css" /> <!--The default one used by amina for navigation bar-->
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="heading">
            <br>
            <h1>Forgot password</h1>
            <br>
        </div>
        <div class="ins">
            <p>*Enter your e-mail account to receive the Reset link</p>
        </div>
        <div class="content">
            <form id="recoverForm" method="POST" action="sendpass.php"> <!-- Form for user sign-in, submits to "sendpass.php" -->
                <div class="input-group"> <!-- Input group for user's email -->
                    <input type="email" name="email" id="email" placeholder="Email" required />
                    <label for="email">Email</label> <!-- Label for the input field -->
                </div>
                <input type="button" class="btn" value="Submit" id="submitButton"> <!-- Button for submitting email -->
                <p id="successMessage" style="display: none; color: green;"></p> <!-- Message to display upon successful submission -->
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#submitButton').click(function() {
                var email = $('#email').val(); // Get email input value
                $.ajax({
                    type: 'POST',
                    url: 'sendpass.php', // URL to send the form data
                    data: { email: email }, // Data to send
                    success: function(response) {
                     $('#successMessage').text('Link to reset password has been sent to your email').show(); // Show success message
                    }
                });
            });
        });
    </script>
</body>
</html5>
