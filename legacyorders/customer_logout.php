<?php
// Initialize the session
session_start();

if (isset($_GET["islogin"]) !=="") {
    //print_r($_SESSION);
    // Unset all of the session variables
    unset($_SESSION['islogin']);
    unset($_SESSION['userid']);
    unset($_SESSION['lastactive']);
    // Destroy the session.
    session_destroy();
    header('Location:  customer_login.php');

}
?>
