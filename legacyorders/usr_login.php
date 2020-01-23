<?php
ini_set('display_errors', 1);
//Start the session
session_start();
//PHPPass
require 'data/PasswordHash.php';
// DB connection
include_once "data/db_conn.php";

header('Content-type: text/plain');
//form vars
if (isset($_GET['usrname'])) {
    $usrname = $_GET['usrname'];
    $psswd = trim($_GET['psswd']);
    // $psswd = strip_tags($psswd);
    // $psswd = htmlspecialchars($psswd);
    $islogin = $_GET['islogin'];
} else {
    $usrname = '';
    $psswd = '';
    $islogin = 0;
}

$result = "";
$usrdata = "";
$usrtype = "";
$usrrights = 'administrator';
$usrrights1 = 'shop_manager';
//check to make sure the form vars are passed
if (isset($usrname) && $usrname != "user") {
    //Query the DB
    $getUsrQ = "SELECT u.id, u.user_login, u.user_pass, u.user_email, um.meta_key, um.meta_value AS user_role
                FROM wp_users u INNER JOIN wp_usermeta um on u.id = um.user_id
                WHERE (u.user_login = '".$usrname."' OR u.user_email = '".$usrname."') AND um.meta_key = 'wp_capabilities'
                Limit 1";

    //check to see if the query returned any values
    if ($result = $connProd->query($getUsrQ)) {
        //set the hash
        $hasher = new PasswordHash(8, TRUE);
        //loop through resutls
        while ($row = $result->fetch_row()) {
            printf ("%s (%s)\n", $row[0], $row[1]);
            $usrid = $row[0];
            $usrpass = $row[2];
            $usremail = $row[3];
            $usrtype = $row[5] ;
            $strresult =  strpos($usrtype, $usrrights1);
        }
        //Check to make sure the passwords match
        if ($hasher->CheckPassword( $psswd, $usrpass )){
            //Get the user IP Address
            $ip = $_SERVER['REMOTE_ADDR'];
            //Check to see if the client IP is coming from a proxy
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            //Update the users table
            if (isset($ip)){
                $updateQ = "UPDATE wp_users SET user_url='".$ip."' WHERE id='".$usrid."'";
            }
            //Redirect to legacy order search
            if ($strresult !== false) {
                $_SESSION["userid"] = $usrid;
                $_SESSION["islogin"] = 1;
                $location = "lookup.php?sortby=1&userid=".$usrid."&islogin=2&getdb=1&lsearch=";
                header('Location: '.$location.'');
            } else {
                $_SESSION["userid"] = $usrid;
                $_SESSION["islogin"] = 2;
                $location = "lookup.php?sortby=1&userid=".$usrid."&islogin=2&getdb=1&lsearch=";
                header('Location: '.$location.'');
            }

        } else {
            //Redirect
            header('Location: customer_login.php?errmsg=ER2');
        }

    }
} else {
    header('Location: customer_login.php?errmsg=ER2');
}

//close DB connection
$connProd->close();
//encode data into json for items
//echo json_encode($usrdata);

?>
