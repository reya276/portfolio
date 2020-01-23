<?php
//Check to see if there is an active session
if (isset($_SESSION["userid"]) !="") {
    print_r($_SESSION);
    header('Location: lookup.php');
}
//Error message
if (isset($_GET['errmsg']) == "ER1"){
    $msg = "Your Username and Password is incorrect.";
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
            <input type="hidden" id="islogin" name="islogin" value="1">

            <div id="form-login" style="height:100%;width:100%;padding:50px 0;">
                <div id="loginbox" class="login-form">
                    <div class="form-group">
                        <div class="col-auto text-center">
                            <p><img src="assets/img/bang-logo.png" title="Bang Energy" style="width:100%;"/></p>
                            <h5>Bang Energy Legacy Orders</h5>
                            <div id="errmsg" style="color:#cc0000;font-weight:bold;font-size:1em;">
                                <?php
                                    if (isset($msg)) {
                                        echo $msg;
                                    } else {
                                        //nothing
                                    }
                                 ?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" >Username or Email</label>
                            <input type="text" class="form-control form-control-sm" name="usrname" id="usrname" aria-describedby="emailHelp" placeholder="Username or Email">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-auto">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control form-control-sm" name="psswd" id="psswd" placeholder="Password">
                            <small id="usrnameHelp" class="form-text text-muted"><a href="##" id="usrnameHelp" title="Forgot Username?">Forgot Username or Password?</a></small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary" title="Log in">Log in <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
