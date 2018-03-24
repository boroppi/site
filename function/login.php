<?php
/* User login process, checks if user exists and password is correct */

// create username password variable from input forms
$username = $_POST['username'];
$result = $mysqli->query("SELECT * FROM usermanager WHERE username='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that username doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['username'] = $user['username'];
        
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: dashboard.php");
    }
    else { // wrong password
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

