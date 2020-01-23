<?php

//Check to see if there is an active session
if (isset($_SESSION["userid"]) != "") {
    $location = "lookup.php?userid=".$_SESSION["userid"];
    //print_r($_SESSION);
    header('Location: '.$location.'');
}
//check for email msg var
if (isset($_GET['emailmsg']) && $_GET['emailmsg'] == 'ggy') {
  $emailmsg = 'We have sent an email to the email address provided.';
} else if (isset($_GET['emailmsg']) && $_GET['emailmsg'] == 'nny'){
  $emailmsg = 'Message could not be sent. Mailer Error!';
} else {
  $emailmsg = '';
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Legacy Orders - Bang-Energy</title>
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css"/>
    </head>
    <body style="height:100%;background-color:#440874; background-image: linear-gradient(#dc57a8,#440874);background-position: bottom; background-repeat:no-repeat;">
        <form method="GET" action="usr_login.php" autocomplete="off">
            <div id="form-login" style="height:100%;width:100%;padding:50px 0;">
                <div id="loginbox" class="login-form">
                    <div class="form-group">
                        <div class="col-auto text-center">
                            <p><img src="assets/img/bang-logo.png" title="Bang Energy" style="width:68%;"/></p>
                            <h5>Bang Energy Legacy Orders</h5>
                            <div id="errmsg" style="color:#cc0000;font-weight:bold;font-size:1em;">
                                <?php
                                    //Error message
                                    switch (isset($_GET['errmsg'])) {
                                        case "ER1":
                                            $msg = "Your Password is incorrect.";
                                            echo $msg;
                                        break;
                                        case "ER2":
                                            $msg = "Your Username and Password is incorrect.";
                                            echo $msg;
                                        break;
                                        case "ER3":
                                            $msg = "Your session has expired, please login.";
                                            echo $msg;
                                        break;
                                        default:
                                            //nothing
                                        break;
                                    }
                              ?>
                            </div>
                            <div style="color:blue;font-weight:bold;font-size:1em;">
                              <?php
                                //Email message
                                if ($emailmsg !='') {
                                  echo $emailmsg;
                                }
                              ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="usrname" >Username or Email</label>
                            <input type="text" class="form-control form-control-sm" name="usrname" id="usrname" aria-describedby="usrname" placeholder="Username or Email">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-auto">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control form-control-sm" name="psswd" id="psswd" placeholder="Password">
                            <small id="usrnameHelp" class="form-text text-muted"><a href="##" id="usrnameHelp" title="Forgot Username?" data-toggle="modal" data-target="#fpmodal">Forgot Username or Password?</a></small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary" title="Log in">Log in <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <!-- START forgot password modal -->
        <div class="modal fade" id="fpmodal" tabindex="-1" role="dialog" aria-labelledby="fpmodalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <form id="fpform" method="GET" action="data/getusrid.php">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Forgot Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="fpemail">Email address</label>
                    <input type="email" class="form-control" id="fpemail" name="fpemail" required message="Please enter a valid email." aria-describedby="emailHelp" placeholder="Enter a valid email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Recover Password</button>
              </div>
            </div>
            </form>
          </div>
        </div>
    </body>
</html>
