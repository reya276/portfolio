<?php

if ($_GET['getdb'] == 1) {
  //Start DB connection
  $usrnameProd = '<username>';
  $passwdProd = '<password>';
  $dbnameProd = '<database_nmame>';
  $serverIP = '0.0.0.0:3306';
} else if ($_GET['getdb'] == 2) {
  //Start DB connection
  $usrnameProd = '<username>';
  $passwdProd = '<password>';
  $dbnameProd = '<database_nmame>';
  $serverIP = '1.1.1.1:3306';
}


$connProd = new mysqli($serverIP, $usrnameProd, $passwdProd, $dbnameProd);

//check the DB connection
if ( !$connProd ) {
  die("Connection failed : " . mysql_error());
 }

 if ( !$dbnameProd ) {
  die("Database Connection failed : " . mysql_error());
 }

?>
