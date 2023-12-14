<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <?php include '../includes/links.php' ?>
</head>
<!--
    Name: Goddess Taylor
    Date: 12/13/2023
    Assignment: Final Project
-->

<body>
    <?php include '../includes/navbar.php' ?>
    <header>
        <h1>Closer to creating your dream sims....</h1>
    </header>
    <main>
        <!-- Creating a form to register a new user -->
        <form action="newuserpage.php" method="post">
            <label for="signupusername">Username</label>
            <input type="text" name="signupusername" id="signupusername">

            <label for="email">Email</label>
            <input type="text" name="email" id="email">

            <input type="submit" value="Sign up!" id="registerBtn" class="btn btn-secondary">
        </form>
    </main>
    <script src="../model/js/app.js"></script>
</body>

</html>