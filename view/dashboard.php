<?php
// starting a session
session_start();

// Checking if both userId and username are set in the session
if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {

    // Storing userid and username in local variables if userid and username are set
    $userId = $_SESSION['userId'];
    $username = $_SESSION['username'];

} else {

    // Else redirect user to login page

    echo "User not logged in or username not set";

    header('Location: loginpage.php');

    exit;
}

?>
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

    // Creating a SimDB object
    $simObj = new SimDB();
    // Storing uppercase username in a variable
    $uUsername = ucfirst($username);
    // if a user doesn't have sims on there account, prompt user to add one
    if (!$simObj->checkSimUserRelationship($userId)) {
        $randomSim = $simObj->generateRandomSim();
        $_SESSION['simId'] = $randomSim->getSimId();
        echo ("
        
        <h1 id='simTitle'>Hi, {$uUsername}! How about we create {$randomSim->getName()}?</h1>
        <div id='simContainer'>
        
        ");
        echo ("<h4> Name: " . $randomSim->getName() . "</h4>");
        echo ("<h4> Degree: " . $randomSim->getDegree() . "</h4>");
        echo ("<h4> Occupation: " . $randomSim->getOccupation() . "</h4>");
        echo ("<h4> Personality: " . $randomSim->getPersonality() . "</h4>");
        echo ("<h4> Skills: " . $randomSim->getSkills() . "</h4>");
        echo ("<h4> Sign: " . $randomSim->getSign() . "</h4> </div>");

        //else display users sims, and also give an option to add more sims.
    } else {
        $sims = $simObj->getSimsByUserId($userId);
        $randomSim = $simObj->generateRandomSim();
        $_SESSION['simId'] = $randomSim->getSimId();
        echo ("<h1>Your sims</h1>");
        foreach ($sims as $sim) {
            echo "<div id='simContainer'><h4>Name: " . $sim->getName() . "</h4>";
            echo "<h4>Degree: " . $sim->getDegree() . "</h4>";
            echo "<h4>Occupation: " . $sim->getOccupation() . "</h4>";
            echo "<h4>Personality: " . $sim->getPersonality() . "</h4>";
            echo "<h4>Skills: " . $sim->getSkills() . "</h4>";
            echo "<h4>Sign: " . $sim->getSign() . "<hr> </h4></div>";
        }

        echo ("<h1 id='simTitle'></h1>");
        echo ("<h4> Name: " . $randomSim->getName() . "</h4>");
        echo ("<h4> Degree: " . $randomSim->getDegree() . "</h4>");
        echo ("<h4> Occupation: " . $randomSim->getOccupation() . "</h4>");
        echo ("<h4> Personality: " . $randomSim->getPersonality() . "</h4>");
        echo ("<h4> Skills: " . $randomSim->getSkills() . "</h4>");
        echo ("<h4> Sign: " . $randomSim->getSign() . "</h4> ");
    }

    ?>
    <input type="button" value="Add Sim" class="btn btn-dark" id="addSimBtn">
    <input type="button" value="Generate Another Sim" class="btn btn-secondary" id="generateRandomSimBtn">
    <input type="button" value="Logout" id="logOutBtn" class="btn btn-secondary">

    <script src="../model/js/app.js"></script>
</body>

</html>