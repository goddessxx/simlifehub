<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include '../includes/links.php' ?>
</head>
<!--
    Name: Goddess Taylor
    Date: 12/13/2023
    Assignment: Final Project
-->

<body>
    <?php include '../includes/navbar.php';
    include '../model/UserDB.php';
    include '../model/SimDB.php';
    // Creating a object for UserDB and SimDB class
    $userObj = new UserDB;
    $simObj = new SimDB;
    // Storing username and email from post request in variables
    $username = $_POST['signupusername'];
    $email = $_POST['email'];
    /* If there is a post request check if username is in database, if username is available, create user and redirect to login page else redirect to sign up page */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($userObj->checkUserAvail($username)) {
            // Creating a user using createUser method in UserDB
            $userObj->createUser($username, $email);
            // Redirecting the user to login page after sign up
            header('Location: loginpage.php');
        } else {
            echo ("username not available");
            header('Location: signuppage.php');
        }
    }
    ?>

</body>

</html>