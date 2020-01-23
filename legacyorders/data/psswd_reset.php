<?php
//PHPPass
require 'PasswordHash.php';

// DB connection
include_once "db_conn.php";

$stmt = "";
$psswdhash = "";
//Set var to trigger page display
$updpage = 0;

if (isset($_POST['xxddy']) && $_POST['newpass'] != "" && $_POST['updpsswd'] == 1) {
  //This is the userid from email link
  $xxddy = $_POST['xxddy'];
  //Set New Password var
  $newpsswd = $_POST['newpass'];

  //MD5 hash/salt for password
  //$hasher = new PasswordHash(8, TRUE);
  $psswdhash = crypt($newpsswd, '$1$Mxzypliz$');
  // echo $psswdhash;
  // exit;

  if ($stmt = $connProd->prepare("UPDATE wp_users SET user_pass='".$psswdhash."' WHERE ID=?")) {
    /* bind parameters for markers */
    $stmt->bind_param("s", $xxddy);
    /* execute query */
    $stmt->execute();
    //Set var to trigger page display
    $updpage = 1;
  }
} else {
  //echo "Nope, the new passsword can't be blank!";
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../assets/fonts/font-awesome/css/all.css"/>
    <script>
        function chkPsswd(npsswd) {
          psswd1 = npsswd.newpass.value;
          psswd2 = npsswd.renewpass.value;
          //check the entered values
          if(psswd1 == '') {
            alert("New Password can't be blank!");
          } else if (psswd2 == '') {
            alert("Please enter a confirm password");
          } else if (psswd1 != psswd2) {
            alert ("\nPassword did not match: Please try again...")
            return false;
          } else {
            return true;
          }
        }
    </script>
  </head>
  <body>
    <?php if ($updpage == 1) { ?>
      <div id="header">
          <span id="bang-logo"></span>
          <h2 class="logout"></h2>
      </div>
      <div id="header-top"></div>
      <div id="header-img"></div>
      <div id="header-top"></div>
      <div id="errormsg"></div>
      <div id="main">
        <h2 style="text-align: center; width:80%;color:rgb(6,71,201);padding:10px 10px;border-bottom:1px solid #555;">Password Reset Successful</h2>
        <div class="awesome">
          Awesome, you have successfully updated your password.
        </div>
        <div style="padding-top:3%;width:80%;">
          <p style="font-size:1em;font-weight:500;color:#555;text-align:center;">Now that you are you again, check if <a href="../customer_login.php">your profile</a> data is correct.
        </div>
      </div>
      <!-- Begin fotter -->
      <div id="footer-top"></div>
      <div id="footer-main">
          <span style="float:left;color:#fff;">Copyright &copy; 2019 Bang Energy | <a href="https://bang-energy.com" title="Bang Energy" style="color:#fff;" target="_blank">Bang Energy</a></span>
          <span style="float:right;color:#fff;">All Rights Reserved Bang Energy</span>
      </div>
    <?php } else if ($updpage == 0) { ?>
      <div id="header">
          <span id="bang-logo"></span>
          <h2 class="logout"></h2>
      </div>
      <div id="header-top"></div>
      <div id="header-img"></div>
      <div id="header-top"></div>
      <div id="errormsg"></div>
      <div id="main">
        <form id="npsswd" name="npsswd" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return chkPsswd(this);">
          <input type="hidden" name="xxddy" id="xxddy" value="<?php echo $_GET['xxddy']; ?>">
          <input type="hidden" name="updpsswd" value='1' />
          <h2 style="color:red;width:80%;">Reset Your Password</h2>
          <div class="form-group" style="width:80%;">
            <label for="newpass" style="color:#0074e8;font-weight:bold;">Enter New Password:</label>
            <input type="password" class="form-control" style="border:1px solid #0074e8;" name="newpass" id="newpass" placeholder="Enter new password" required>
          </div>
          <div class="form-group" style="width:80%;">
            <label for="renewpass" style="color:#0074e8;font-weight:bold;">Confirm New Password:</label>
            <input type="password" class="form-control" style="border:1px solid #0074e8;" name="renewpass" id="renewpass" placeholder="Re-Enter new password" required>
          </div>
          <div class="form-group" style="width:80%;">
            <button type="submit" class="btn btn-primary" style="float:right;">Reset Password</button>
          </div>
        </form>
      </div>
      <!-- Begin fotter -->
      <div id="footer-top"></div>
      <div id="footer-main">
          <span style="float:left;color:#fff;">Copyright &copy; 2019 Bang Energy | <a href="https://<domain_name>" title="Bang Energy" style="color:#fff;" target="_blank">Bang Energy</a></span>
          <span style="float:right;color:#fff;">All Rights Reserved Bang Energy</span>
      </div>
    <?php } ?>
  </body>
</html>
