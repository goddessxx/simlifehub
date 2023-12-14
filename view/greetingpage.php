<header>
    <h1>Ready to create a sim?</h1>
    <h4>Press the button below to get started!</h4>
    <input type="button" value="Sign up!" id="signUpBtn" class="btn btn-secondary">
</header>
<script>
    // Click event to direct user to the sign up page
    let signUpBtn = document.getElementById("signUpBtn");

    signUpBtn.addEventListener("click", () => {
        window.location.href = "view/signuppage.php";
    });

</script>