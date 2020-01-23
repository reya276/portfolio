var system = 0;

function submitForm(){
  var systemlogin = document.getElementById("system").value;
  var username = $("#username").val();
  var password = $("#password").val();
  //CAA = 1 Connect = 2 PP = 3
  if (systemlogin == 1){
      if (username == '' || password == ''){
        document.getElementById("loginerror").innerHTML = "Please enter your username and password";

        $('input[type="text"], input[type="password"]').css("border","2px solid #a31818");
        $('input[type="text"], input[type="password"]').css("box-shadow","0 0 3px #a31818");

        console.log(systemlogin);
      } else {
          document.getElementById("loginerror").innerHTML = "";
          //Submit info via Ajax POST
          // var xhttp = new XMLHttpRequest();
          // xhttp.onreadystatechange = function() {
          //   if (this.readyState == 4 && this.status == 200) {
          //     document.getElementById("modalform").innerHTML = this.responseText;
          //   }
          // };
          // xhttp.open("POST", "http://brokers.coastalagentsalliance.com/scripts/RatingWebServer.dll/Login/VerifyLogin", true);
          // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          //xhttp.setRequestHeader("Access-Control-Allow-Origin:","*");
          //xhttp.send("username="+username+"&password="+password);
          // document.getElementById("modalform").innerHTML = "Method='POST' Action=''" + "ouauser="+username+"&ouapw="+password;
          // var username = username;
          // var password = password;
          // var Method = document.createElement('Method');
          // var Action = document.createElement('Action');
          // var form = document.getElementById("modalform");
          // form.Method = "POST";
          // form.Action = "http://brokers.coastalagentsalliance.com/scripts/RatingWebServer.dll/Login/VerifyLogin";
          // $.ajax({
          //   type: 'POST',
          //   url: 'http://brokers.coastalagentsalliance.com/scripts/RatingWebServer.dll/Login/VerifyLogin',
          //   contentType: 'application/x-www-form-urlencoded',
          //   data: {username:username, password:password},
          //   success: function() {
          //     console.log("success!");
          //   },
          //   error: function() {
          //     console.log("Failed!");
          //   }
          // });
          document.getElementById("modalform").action = "http://brokers.coastalagentsalliance.com/scripts/RatingWebServer.dll/Login/VerifyLogin";
          document.forms['loginForm'].submit();
        }
  } else if (systemlogin == 2) {
      if (username == '' || password == ''){
        document.getElementById("loginerror").innerHTML = "Please enter your username and password";

        $('input[type="text"], input[type="password"]').css("border","2px solid #a31818");
        $('input[type="text"], input[type="password"]').css("box-shadow","0 0 3px #a31818");

        console.log(systemlogin);
      } else {
          document.getElementById("loginerror").innerHTML = "";
          document.getElementById("modalform").action = "https://connect.orchidinsurance.com/Logon.aspx";
          document.forms['loginForm'].submit();

      }
  } else if (systemlogin == 3) {
      if (username == '' || password == ''){
        document.getElementById("loginerror").innerHTML = "Please enter your username and password";

        $('input[type="text"], input[type="password"]').css("border","2px solid #a31818");
        $('input[type="text"], input[type="password"]').css("box-shadow","0 0 3px #a31818");

        console.log(systemlogin);
      } else {
          document.getElementById("loginerror").innerHTML = "";

          document.getElementById("modalform").action = "http://64.14.148.118/policyplus/Landing";
          document.forms['loginForm'].submit();

      }
  } else if (systemlogin == 6) {
    if (username == '' || password == ''){
      document.getElementById("loginerror").innerHTML = "Please enter your username and password";
      $('input[type="text"], input[type="password"]').css("border","2px solid #a31818");
      $('input[type="text"], input[type="password"]').css("box-shadow","0 0 3px #a31818");

      console.log(systemlogin);

    } else {
      document.getElementById("loginerror").innerHTML = "";

      document.getElementById("modalform").action = "https://qbe.torrentflood.com/Flood/Membership/SignIn";
      document.forms['loginForm'].submit();
    }
  }

}
