<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation username message
 */

// create username password variable from input forms
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

      
// Check if user with that username already exists
$result = $mysqli->query("SELECT * FROM usermanager WHERE username='$username'") or die($mysqli->error());

// We know username exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this username already exists!';
    header("location: error.php");
    
}
else { // username doesn't already exist in a database, proceed...

    
    $sql = "INSERT INTO usermanager (username, password) " 
            . "VALUES ('$username','$password')";

    // Add user to the database
    if ( $mysqli->query($sql) ){
        $_SESSION['message'] = $username.' added successfully';
        header("location: error.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}