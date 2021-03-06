<?php
// server page

session_start();
include('includes/config.php');


// initialize vars
$FirstName = '';
$LastName = '';
$Email = '';
$UserName = '';
$errors = array();
$success = 'You are now logged in!';

// connect to the db
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// register user
if( isset($_POST['reg_user']) ) {

    $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']); // receives info; removes special chars
    $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password1 = mysqli_real_escape_string($db, $_POST['Password1']);
    $Password2 = mysqli_real_escape_string($db, $_POST['Password2']);


    // array push function; adds exact error that we will be referring to
    if( empty($FirstName) ) {
        array_push($errors, 'First name is required.');
    }

    if( empty($LastName) ) {
        array_push($errors, 'Last name is required.');
    }

    if( empty($Email) ) {
        array_push($errors, 'Email is required.');
    }

    if( empty($UserName) ) {
        array_push($errors, 'User name is required.');
    }

    if( empty($Password1) ) {
        array_push($errors, 'Password is required.');
    }

    if( $Password1 != $Password2 ) {
        array_push($errors, 'Passwords do not match!');
    }


    // check for existing user name
    $user_check_query = "SELECT * FROM Users WHERE UserName = '$UserName' OR Email = '$Email' LIMIT 1";
        // limit 1 = there can be one one of each username and email; unique

    $result = mysqli_query($db, $user_check_query);  // inside this db, we are looking for this

    $user = mysqli_fetch_assoc($result);

    if($user) {

        if( $user['UserName'] == $UserName ) {
            array_push($errors, 'User name already exists.');
        }

        if( $user['Email'] == $Email ) {
            array_push($errors, 'Email already exists.');
        }

    }  // end if user


    // if there are no errors
    if( count($errors) == 0 ) {

        $Password = md5($Password1);  // encrypt the password

        $query = "INSERT INTO Users (FirstName, LastName, Email, UserName, Password) VALUES ('$FirstName', '$LastName', '$Email', '$UserName', '$Password')";

        mysqli_query($db, $query);

        $_SESSION['UserName'] = $UserName;
        $_SESSION['success'] = $success;

        header('Location: login.php');

    }  // end if count errors

}  // end reg_user if isset


// return to server.php to enter login info
if( isset($_POST['login_user']) ) {

    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);

    if( empty($UserName) ) {
        array_push($errors, 'User name is required');
    }

    if( empty($Password) ) {
        array_push($errors, 'Password is required');
    }

    if( count($errors) == 0 ) {

        $Password = md5($Password);

        $query = "SELECT * FROM Users WHERE UserName = '$UserName' AND Password = '$Password'";

        $result = mysqli_query($db, $query);

        if( mysqli_num_rows($result) == 1 ) {
            $_SESSION['UserName'] = $UserName;
            $_SESSION['success'] = $success;

            header('Location: index.php');


        } else {
            array_push($errors, 'Wrong user name/password combination.');
        }

    } // end if count



} // end if isset login
