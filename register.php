<?php 
    include('server.php');
    include('includes/header.php');
?>


<main>

<h2 class="center">Register Today!</h2>

<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="POST">

    <label class="label-input">
        First Name
        <input type="text" name="FirstName" value="<?php if( isset($_POST['FirstName']) ) echo $_POST['FirstName']; ?>" />
    </label>

    <label class="label-input">
        Last Name
        <input type="text" name="LastName" value="<?php if( isset($_POST['LastName']) ) echo $_POST['LastName']; ?>" />
    </label>

    <label class="label-input">
        Email
        <input type="email" name="Email" value="<?php if( isset($_POST['Email']) ) echo $_POST['Email']; ?>" />
    </label>

    <label class="label-input">
        User Name
        <input type="text" name="UserName" value="<?php if( isset($_POST['UserName']) ) echo $_POST['UserName']; ?>" />
    </label>

    <label class="label-input">
        Password
        <input type="password" name="Password1" value="" />
    </label>

    <label class="label-input">
        Confirm Password
        <input type="password" name="Password2" value="" />
    </label>

    <button class="button" type="submit" name="login_user">Login</button>

    <button class="button" type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'">Reset</button>


    <?php include('errors.php'); ?>
        
</form>

<p class="center">Already a member? <a href="login.php">Please sign in.</a></p>

</main>


<?php include('includes/footer.php'); ?>