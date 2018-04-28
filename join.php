<?php include('includes/header.php'); ?>

<section id="join-container">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Join Notely</h1>
                <p>The best way to organize your life</p>
                <form action="scripts/create_account.php" method="POST" id="signup-form">
                    <label for="username">Choose a Username</label>
                    <input type="text" name="username">
                    <label for="password">Choose a Password</label>
                    <input type="password" name="password">
                    <input type="submit" value="Create Account" id="create-account-button">
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>

</body>
</html>