<?php
// in order to view this page, a user must have loggin in.
// if not, they will be directed to do so

session_start();

// if the username has not been set, msg to login and direct user to the login page
if( ! isset($_SESSION['UserName']) ) {
    $_SESSION['msg'] = 'You must log in first.';
    header('Location: login.php');
}

// if user wants to logout, destroy session associated with username, redirects back to loging page
if( isset($_GET['logout']) ) {
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}

include('includes/config.php');
include('includes/header.php');

?>


<main>

<h2>Welcome to our home page.</h2>

<?php 
// notification message

if( isset($_SESSION['success']) ) : ?>

    <div class="error success">
        <h3>
            <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
        </h3>
    </div>

<?php endif; ?>


<?php
// welcome message

if( isset($_SESSION['UserName']) ) : ?>

    <div class="error success">
        <h3>Welcome, <?php echo $_SESSION['UserName']; ?></h3>
    </div>

    <p><a href="index.php?logout=1">Log out</a></p>

<?php endif; ?>

</main>


<?php include('includes/footer.php'); ?>
