<?php

ob_start();  // prevents header errors before reading the whole page

define('DEBUG', 'TRUE');  // shows errors

include('creds.php');

define( 'THIS_PAGE', basename($_SERVER['PHP_SELF']) );  // the page that i'm on is the page that i'm on


switch(THIS_PAGE) {
    case 'index.php' :
        $title = 'Tevinter Teas';
        $layout = 'single';
    break;

    case 'login.php' :
        $title = 'Tevinter Teas | Login';
        $layout = 'single';
    break;

    case 'register.php' :
        $title = 'Tevinter Teas | Register';
        $layout = 'single';
    break;

    case 'about.php' :
        $title = 'About page for our new website';
        $mainHeadline = 'Welcome to Our wonderful About Page';
        // $center = 'center';
        // $body = 'about inner';
    break;

    case 'daily.php' :
        $title = 'Daily page';
        $mainHeadline = 'Welcome to the Daily Page';
        // $center = 'center';
        // $body = 'daily inner';
    break;

    case 'customers.php' :
        $title = 'Our very important cutomers';
        $mainHeadline = 'Hello Customers, Good to See You!';
        // $center = 'center';
        // $body = 'customers inner';
    break;

    case 'teas.php' :
        $title = 'Tevinter Teas | Teas';
        $layout = 'single';
    break;

    case 'contact.php' :
        $title = 'Tevinter Teas | Contact';
        $layout = 'single';
    break;

    case 'thx.php' :
        $title = 'Tevinter Teas | Thank you!';
        $layout = 'single';
    break;

}  // end switch


// NAV -------------------------------------------------------------------------

$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily';
$nav['teas.php'] = 'Teas';
$nav['contact.php'] = 'Contact';

function makeLinks($n) {

    $myReturn = '';

    foreach($n as $key => $value) {  // if THIS_PAGE is the __ page, and we're on the __ page, do this 

        $myReturn .= '<li><a href="' .$key. '">' .$value. '</a></li>';

    }  // end foreach

    return $myReturn;

}  // end function makeLinks



// FORM -----------------------------------------------------------------------

$firstName = '';  // text
$lastName = '';  // text
$email = '';  // email
$returnCust = '';  // radio
$teaTypes = '';  // checkbox
$howHear = '';  // select
$comments = '';  // text
$privacy = '';  // radio
    // because code is moved, must now initialize vars

$firstNameErr = '';
$lastNameErr = '';
$emailErr = '';
$returnCustErr = '';
$teaTypesErr = '';
$howHearErr = '';
$commentsErr = '';
$privacyErr = '';


if($_SERVER['REQUEST_METHOD'] == 'POST') {  // IF server has a request method of post, do the following

    // IF name is empty, create var $nameErr and say, "please fill out your name" and assign to var
    // if NOT empty, $name = $_POST['name']

    // delcare errors - if field is empty, do something
    // a lot of IF statements - if all IF statements are true, then yay

    if( empty($_POST['firstName']) ) {  // always declare emptys at the top
        $firstNameErr = 'Please fill out your first name.';
    } else {
        $firstName = $_POST['firstName'];  // IF empty, display error, else assn the post name to var $name
    }

    if( empty($_POST['lastName']) ) {
        $lastNameErr = 'Please fill out your last name.';
    } else {
        $lastName = $_POST['lastName'];
    }

    if( empty($_POST['email']) ) {
        $emailErr = 'Please fill out your email.';
    } else {
        $email = $_POST['email'];
    }

    if( empty($_POST['returnCust']) ) {
        $returnCustErr = 'Please select one.';
    } else {
        $returnCust = $_POST['returnCust'];
    }

        if($returnCust == 'yes') {
            $yes = 'checked';
        } elseif($returnCust == 'no') {
            $no = 'checked';
        }


    if( empty($_POST['teaTypes']) ) {
        $teaTypesErr = 'You forgot to select a type of tea...';
    } else {
        $teaTypes = $_POST['teaTypes'];
    }

    if( $_POST['howHear'] == 'NULL' ) {
        $howHearErr = 'Please let us know how you heard about us.';
    } else {
        $howHear = $_POST['howHear'];
    }

    if( empty($_POST['comments']) ) {
        $commentsErr = "Don't forget to leave a comment!";
    } else {
        $comments = $_POST['comments'];
    }

    if( empty($_POST['privacy']) ) {
        $privacyErr = 'Please agree to our privacy policy.';
    } else {
        $privacy = $_POST['privacy'];
    }


    // if user checks the checkboxes, all of them, we want to know
    // implode the array

    function favTeaType() {
        $myReturn = '';

        if( !empty($_POST['teaTypes']) ) {  // if it's not empty, take contents of array teaTypes
            $myReturn = implode(', ', $_POST['teaTypes']);
        }

        return $myReturn;

    } // end favTeaType



    if( isset(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['returnCust'],
        $_POST['teaTypes'],
        $_POST['howHear'],
        $_POST['comments'],
        $_POST['privacy']) ) {

            $to = 'szemeo@mystudentswa.com';
            $subject = 'Webform from Tevinter Teas on ' . date('m/d/y');
            $body = ''.$firstName. ' ' .$lastName. ' has filled out your form.' .PHP_EOL.'';
            $body .= 'Email: ' .$email. '' .PHP_EOL.'';
            $body .= 'Are you a returning customer? ' .$returnCust. '' .PHP_EOL.'';
            $body .= 'What is your favorite type of tea? ' .favTeaType(). '' .PHP_EOL.'';
            $body .= 'How did you hear about us? ' .$howHear. '' .PHP_EOL.'';
            $body .= 'Comments: ' .$comments. '' .PHP_EOL.'';

            $headers = array(
                'From' => 'no-reply@nightscrawl.net',  // obfuscate self mail
                'Reply-to' => ''.$email.''  // info to reply to sender
            );

            mail($to, $subject, $body, $headers);
                header('Location: thx.php');
                
        } // end isset

} // close server request method




// ERRORS

function myerror($myFile, $myLine, $errorMsg) {
    if( defined('DEBUG') && DEBUG ) {
        echo 'Error in file: <b>' .$myFile. '</b> on line: <b>' .$myLine. '</b>';
        echo 'Error message: <b>' .$errorMsg. '</b>';
        die();
    } else {
        echo 'Houston, we have a problem!';
        die();
    }
}


