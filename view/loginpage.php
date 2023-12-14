<?php
/*
Name: Goddess Taylor
Date: 12/13/23
Assignment: Final Project
*/
// Starting a session 
session_start();
// Including UserDB and SimDB files
include '../model/UserDB.php';
include '../model/SimDB.php';

// Creating objects for UserDB and SimDB class
$userObj = new UserDB();
$simObj = new SimDB();

// Checking for a post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Storing username from post data
    $username = filter_input(INPUT_POST, 'username');


    // Checking if the username is available
    if (!$userObj->checkUserAvail($username)) {

        // Getting user id using checkId method from UserDB
        $userIdArray = $userObj->checkId($username);

        // Checking if a valid user ID was found
        if ($userIdArray !== "User not found") {
            // Store the user ID and username in the session
            $_SESSION['userId'] = $userIdArray;
            $_SESSION['username'] = $username;

            // Redirecting the user to the dashboard page
            header('Location: dashboard.php');
            exit;
        } else {
            // If the user ID was not found, display an error message
            echo "Username not found.";
        }
    } else {
        // If the username is available, it means the user doesn't have an account
        echo "Invalid username or password.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <?php include '../includes/links.php' ?>
</head>

<body>
    <?php include '../includes/navbar.php';

    ?>
    <header>
        <h1>Welcome back! Let's get you signed in...</h1>
    </header>
    <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">


        <input type="submit" value="Log in" class="btn btn-secondary">
    </form>
</body>

</html>