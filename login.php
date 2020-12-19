<?php 
    include('server.php');
    include('includes/header.php'); 
?>


<main>

    <h2 class="center">Login</h2>

    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="POST">

        <label class="label-input">User Name
            <input type="text" name="UserName" value="<?php if( isset($_POST['UserName']) ) echo $_POST['UserName']; ?>" />
        </label>

        <label class="label-input">Password
            <input type="password" name="Password" value="" />
        </label>


        <?php include('errors.php'); ?>

        <button class="button" type="submit" name="login_user">Login</button>

        <button class="button" type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'">Reset</button>

    </form>

<p class="center">Haven't registered? <a href="register.php">Register here</a>.</p>

</main>


<?php include('includes/footer.php'); ?>