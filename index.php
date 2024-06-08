<!DOCTYPE html> <!-- Declares the document type and version of HTML -->
<html5 lang="en" dir="ltr"> <!-- Root element of the HTML document -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0">
	<title>MusiCoffee</title> <!-- Title of the webpage -->
    <!-- Linking the Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<!-- Linking an external CSS file named "style1.css" -->
	<link rel="stylesheet" type="text/css" href="logins.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
    </style>
</head>
<body>
    <div class="container">
        <div class="left" style="display: none;" id="signup">
            <div class="dec">
                    <h1 class="form-title">Create an Account</h1> <!-- Heading for the sign-up form -->
                    <p class= "para">Let's get started!</p>
            </div> <!-- Paragraph encouraging users to sign up -->
                <div class="d_content">
                    <form method="POST" action="register.php"> <!-- Form for user sign-up, submits to "register.php" -->
                        <div class="input-group"> <!-- Input group for user's full name -->
                            <label for="name">Full Name</label> <!-- Label for the input field -->
                            <input type="text" name="name" placeholder="Name" required/>
                        </div>  
                        <div class="input-group"> <!-- Input group for user's email -->
                            <label for="email">Email</label> <!-- Label for the input field -->
                            <input type="email" name="email" placeholder="Email" required />
                        </div>
                        <div class="input-group"> <!-- Input group for user's password -->
                            <label for="password">Password</label> <!-- Label for the input field -->
                            <input type="password" name="password" placeholder="Password" />
                        </div>
                        <input type="submit" class="btn" value="Sign Up" name="signUp"> <!-- Submit button for sign-up form -->
                        <div class="google-btn">
                            <a href="google-oauth.php">
                                Continue with Google
                            </a>
                         </div>
                    </form>
                
                    <p class="extras">
                        ----------------------------------------- <!-- Separator line -->
                    </p>
                    <div class="links"> <!-- Container for sign-up link -->
                        <p>Alredy have an account?</p> <!-- Text indicating user doesn't have an account -->
                        <button id="signInButton">Sign In</button> <!-- Button to navigate to sign-up section -->
                    </div>
                </div>
            </div>
            <br>
    
            <!------------------------------------------------------------------->
            <!-- SIGN IN SECTION -->
            <div class="left" id="signIn"> <!-- Container for sign-in form (initially hidden) -->
                <div class="dec">
                    <h1 class="form-title">Sign into your account</h1> <!-- Heading for the sign-in form -->
                    <p class="para">To get started!</p> 
                </div> <!-- Paragraph encouraging users to sign in -->
                <div class="d_content">
                    <form method="POST" action="register.php"> <!-- Form for user sign-in, submits to "register.php" -->
                        <div class="input-group"> <!-- Input group for user's email -->
                            <label for="email">Email</label> <!-- Label for the input field -->
                            <input type="email" name="email" placeholder="Email" required />
                        </div>
                        <div class="input-group"> <!-- Input group for user's password -->
                            <label for="password">Password</label> <!-- Label for the input field -->
                            <input type="password" name="password" placeholder="Password" />
                        </div>

                        <?php if(isset($_GET['error']) && $_GET['error'] == 'invalid' && !isset($_GET['reset'])): ?>
                            <p style="color: red; margin-left:10px; font-size: 17px;">Invalid email or password</p>
                        <?php endif; ?>
                        
                        <p class="recover">
                            Forgot password?  <a href="recover.php">Recover Password</a> <!-- Link to password recovery -->
                        </p>
                        <input type="submit" class="btn" value="Sign In" name="signIn"> <!-- Submit button for sign-in form -->
                        <div class="google-btn">
                            <a href="google-oauth.php">
                                Continue with Google
                            </a>
                         </div>
                    </form>
                
               
                    <p class="extras">
                        ----------------------------------------- <!-- Separator line -->
                    </p>
                    <div class="links"> <!-- Container for sign-up link -->
                        <p>Don't have an account yet?</p> <!-- Text indicating user doesn't have an account -->
                        <button id="signUpButton">Sign Up</button> <!-- Button to navigate to sign-up section -->
                    </div>
                </div>
            </div>   
            <div class="right" id="signIn"> 
                <!-- Container for additional content (image and text) -->
                <img src="images/background.jpg"> 
                </div>
        </div>
        
     <!-- Including JavaScript file, make sure to locate your own javascript path correctly -->
     <script src="login.js"></script> <!-- Script for dynamic behavior -->
     <!----->
</body>
</html5>