<?php


  //Start DB connection
  $usrnameProd = '<username>';
  $passwdProd = '<password>';
  $dbnameProd = '<database_nmame>';
  $serverIP = '0.0.0.0:3306';

$connProd = new mysqli($serverIP, $usrnameProd, $passwdProd, $dbnameProd);

//check the DB connection
if ( !$connProd ) {
  die("Connection failed : " . mysql_error());
 }

 if ( !$dbnameProd ) {
  die("Database Connection failed : " . mysql_error());
 }

?>
