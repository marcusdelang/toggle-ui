<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/> 
    <title>Delicious pancakes! - Tasty recipe</title>
    <link rel="stylesheet" href="../../resources/css/reset.css">
    <link rel="stylesheet" href="../../resources/css/nav.css">
    <link rel="stylesheet" href="../../resources/css/signup.css">
</head>
<body>
    <div class="wrapper">
    <?php include Tasty\Util\Constants::getViewFragmentsDir() . 'header.php' ?>
         <div id=signup-grid>
            <h1>Signup</h1>
            <form action="SignupPage" method="post">
                <input type="text" name="username" placeholder="Username">
                <p>Enter a username.</p>
                <input type="text" name="mailadress" placeholder="Email adress">
                <p>Enter your E-mail.</p>
                <input type="password" name="password" placeholder="Password">
                <p>Enter a password.</p>
                <input type="password" name="passwordconfirm" placeholder="Confirm password">
                <p>Enter the same password again.</p>
                <button type="submit" name="signupsubmit">Confirm</button>            
            </form>
        </div>
    </div>
</body>
</html>       