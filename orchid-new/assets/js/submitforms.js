var system = 0;
//Default login for New Business
function submitForm(){
  var systemlogin = $(".chkradio").val();
  var fstate = $("#fstate").val();
  //Check to see which system the user wants to login to
  //**** CAA = 1 Connect = 2 PP = 3 ***//
  if (systemlogin == 1){
      if (username == '' || password == ''){
         //Display error if usr/pwd is blank
        document.getElementById("loginerror").innerHTML = "Please enter your username and password";
        //Mark the form fields ***RED*** if they are blank
        $('input[type="text"], input[type="password"]').css("border","2px solid #a31818");
        $('input[type="text"], input[type="password"]').css("box-shadow","0 0 3px #a31818");
        //Console display validation output
        console.log(systemlogin);
      } else {
          //Reset the loginerror validation to blank(No Message)
          document.getElementById("loginerror").innerHTML = "";
          //Declare variables for passing to NetRate on form submit
          var UserID = document.getElementById("username").value;
          var UserPassword = document.getElementById("password").value;
          //ID and form ecryption type required for NetRate
          var SourceGUID = '{5C27D288-74D3-4B9A-BB3F-317F0D284355}';
          var enctype = document.getElementById("modalform").enctype = "application/x-www-form-urlencoded";
          document.getElementById("modalform").enctype = enctype;
          //Set the form Action
          document.getElementById("modalform").action = "http://demo.netrate.com/scripts/CAALogin.dll";
          //Append the hidden inputs to the modalform
          $("#chkradio").append("<input type='hidden' name='SourceGUID' value='{5C27D288-74D3-4B9A-BB3F-317F0D284355}'>");
          $("#chkradio").append("<input type='hidden' name='UserID' id='UserID' value='"+UserID+"'/>");
          $("#chkradio").append("<input type='hidden' id='UserPassword' name='UserPassword' value='"+UserPassword+"'/>");
          //Open a new tab
          document.getElementById("modalform").target = "_blank";
          //Submit the loginForm
          document.forms['loginForm'].submit();

          //Console display validation output
          console.log(UserID);
          console.log(UserPassword);
          console.log(SourceGUID);
          console.log(enctype);
        }
  } else if (systemlogin == 2) {
      if (username == '' || password == ''){
        //Display error if usr/pwd is blank
        document.getElementById("loginerror").innerHTML = "Please enter your username and password";
        //Mark the form fields ***RED*** if they are blank
        $('input[type="text"], input[type="password"]').css("border","2px solid #a31818");
        $('input[type="text"], input[type="password"]').css("box-shadow","0 0 3px #a31818");
        //Console display validation output
        console.log(systemlogin);
      } else {
          //Reset the loginerror validation to blank(No Message)
          document.getElementById("loginerror").innerHTML = "";
          //Set the form Action
          document.getElementById("modalform").action = "https://orchid.imp.conf.oceanwidebridge.com/Logon.aspx";
          //Open a new tab
          document.getElementById("modalform").target = "_blank";
          //Submit the loginForm
          document.forms['loginForm'].submit();

      }
  } else if (systemlogin == 3) {
      if (username == '' || password == ''){
         //Display error if usr/pwd is blank
        document.getElementById("loginerror").innerHTML = "Please enter your username and password";
        //Mark the form fields ***RED*** if they are blank
        $('input[type="text"], input[type="password"]').css("border","2px solid #a31818");
        $('input[type="text"], input[type="password"]').css("box-shadow","0 0 3px #a31818");
        //Console display validation output
        console.log(systemlogin);
      } else {
          document.getElementById("loginerror").innerHTML = "";
          //Declare variables for passing to Policy Plus on form submit
          var portalName = "policyplus";//<-- Orchid Portal name in Velocity
          var fstate = $("#fstate").val();
          //Check for the state select via dropdown list or set as default on cookie
          if (fstate !='' || fstate != null || fstate != 'all'){
              //switch base on fstate initial value
              switch(fstate){
                  case "Alabama":
                      var PSTATE = "AL";
                      break;
                  case "Alaska":
                      var PSTATE = "AK";
                      break;
                  case "Arizona":
                      var PSTATE = "AZ";
                      break;
                  case "California":
                      var PSTATE = "CA";
                      break;
                  case "Colorado":
                      var PSTATE = "CO";
                      break;
                  case "Connecticut":
                      var PSTATE = "CT";
                      break;
                  case "Delaware":
                      var PSTATE = "DE";
                      break;
                  case "Florida":
                      var PSTATE = "FL";
                  case "Georgia":
                      var PSTATE = "GA";
                      break;
                  case "Hawaii":
                      var PSTATE = "HI";
                      break;
                  case "Idaho":
                      var PSTATE = "ID";
                      break;
                  case "Illinois":
                      var PSTATE = "IL";
                      break;
                  case "Indiana":
                      var PSTATE = "IN";
                      break;
                  case "Iowa":
                      var PSTATE = "IA";
                      break;
                  case "Kansas":
                      var PSTATE = "KS";
                      break;
                  case "Kentucky":
                      var PSTATE = "KY";
                      break;
                  case "Louisiana":
                      var PSTATE = "LA";
                      break;
                  case "Maine":
                      var PSTATE = "ME";
                      break;
                  case "Maryland":
                      var PSTATE = "MD";
                      break;
                  case "Massachusetts":
                      var PSTATE = "MA";
                      break;
                  case "Michigan":
                      var PSTATE = "MI";
                      break;
                  case "Minnesota":
                      var PSTATE = "MN";
                      break;
                  case "Mississippi":
                      var PSTATE = "MS";
                      break;
                  case "Missouri":
                      var PSTATE = "MO";
                      break;
                  case "Montana":
                      var PSTATE = "MT";
                      break;
                  case "Nebraska":
                      var PSTATE = "NE";
                      break;
                  case "Nevada":
                      var PSTATE = "NV";
                      break;
                  case "New Hampshire":
                      var PSTATE = "NH";
                      break;
                  case "New Jersey":
                      var PSTATE = "NJ";
                      break;
                  case "New Mexico":
                      var PSTATE = "NM";
                      break;
                  case "New York":
                      var PSTATE = "NY";
                      break;
                  case "North Carolina":
                      var PSTATE = "NC";
                      break;
                  case "North Dakota":
                      var PSTATE = "ND";
                      break;
                  case "Ohio":
                      var PSTATE = "OH";
                      break;
                  case "Oklahoma":
                      var PSTATE = "OK";
                      break;
                  case "Oregon":
                      var PSTATE = "OR";
                      break;
                  case "Pennsylvania":
                      var PSTATE = "PA";
                      break;
                  case "Rhode Island":
                      var PSTATE = "RI";
                      break;
                  case "South Carolina":
                      var PSTATE = "SC";
                      break;
                  case "South Dakota":
                      var PSTATE  = "SD";
                      break;
                  case "Tennessee":
                      var PSTATE = "TN";
                      break;
                  case "Texas":
                      var PSTATE = "TX";
                      break;
                  case "Utah":
                      var PSTATE = "UT";
                      break;
                  case "Vermont":
                      var PSTATE = "VT";
                      break;
                  case "Virginia":
                      var PSTATE = "VA";
                      break;
                  case "Washington":
                      var PSTATE = "WA";
                      break;
                  case "West Virginia":
                      var PSTATE = "WV";
                      break;
                  case "Wisconsin":
                      var PSTATE = "WI";
                      break;
                  case "Wyoming":
                      var PSTATE = "WY";
                      break;
                  default:
                      var PSTATE = "FL";
              }
              //Append PSTATE to the form as a hidden value and pass to velocity
              var username = document.getElementById("username").value;
              var password = document.getElementById("password").value;
              $("#chkradio").append("<input type='hidden' id='PSTATE' name='PSTATE' value='"+PSTATE+"' />");
              //Console display validation output
              console.log(PSTATE);
          }
             //Do jQuery POST to velocity passing username,password and PSTATE
              // $.post("https://velocity.orchidinsurance.com/" + portalName + "/Landing", {username: username, password: password, PSTATE: PSTATE}, function(res) {
              //       if (res.indexOf('class="validationMsg"') != -1) {
              //           // do login failure code here; tell user to try logging in again
              //           document.getElementById("loginerror").innerHTML = "Login failed! Please enter your username and password";
              //           console.log("failed");
              //       } else {
              //           // do login success code here
              //           console.log("success");
              //           // example: navigate the current page to the oapp WebFlow
              //           window.location.href = "https://velocity.orchidinsurance.com/" + portalName + "/WebFlow?code=oapp&PSTATE="+PSTATE;
              //           //window.location.href = "http://64.14.148.118/" + portalName + "/Landing";
              //       }
              //   }, "html");

              //document.getElementById("modalform").action = "http://64.14.148.118/policyplus/Landing";
          }
          var targetURL = "http://polplus2.orchidinsurance.com/" + portalName + "/Landing";
          document.getElementById("modalform").action = targetURL;
          //Open a new tab
          document.getElementById("modalform").target = "_blank";
          //Submit the loginForm
          document.forms['loginForm'].submit();
          //Console display validation output
          console.log(username);
          console.log(password);
          console.log(SourceGUID);
          console.log(enctype);

  }else{

  }

}

//Default login for existing policies
function submitExisting(){
  var systemlogin = $(".chkradio").val();
  var fstate = $("#fstate").val();
  //Check to see which system the user wants to login to
  //CAA = 1 Connect = 2 PP = 3
  if (systemlogin == 1){
      //Check username and password passed by Modal
      if (username == '' || password == ''){
        //Display error if usr/pwd is blank
        document.getElementById("loginerror").innerHTML = "Please enter your username and password";
        //Mark the form fields ***RED*** if they are blank
        $('#username, #password').css("border","2px solid #a31818");
        $('#username, #password').css("box-shadow","0 0 3px #a31818");
      } else {
          //Reset the loginerror validation to blank(No Message)
          document.getElementById("loginerrorA").innerHTML = "";
          //Declare variables for passing to NetRate on form submit
          var UserID = document.getElementById("username").value;
          var UserPassword = document.getElementById("password").value;
          //ID and form ecryption type required for NetRate
          var SourceGUID = '{5C27D288-74D3-4B9A-BB3F-317F0D284355}';
          var enctype = document.getElementById("modalformA").enctype = "application/x-www-form-urlencoded";
          //Set the form Action
          document.getElementById("modalformA").action = "http://demo.netrate.com/scripts/CAALogin.dll";
          //Append the hidden inputs to the modalform
          $("#chkradioA").append("<input type='hidden' name='SourceGUID' value='{5C27D288-74D3-4B9A-BB3F-317F0D284355}'>");
          $("#chkradioA").append("<input type='hidden' name='UserID' id='UserID' value='"+UserID+"'/>");
          $("#chkradioA").append("<input type='hidden' id='UserPassword' name='UserPassword' value='"+UserPassword+"'/>");
          //Open a new tab
          document.getElementById("modalformA").target = "_blank";
          //Submit the loginFormA form
          document.forms['loginFormA'].submit();

          //Console display validation output
          console.log(UserID);
          console.log(UserPassword);
          console.log(SourceGUID);
          console.log(enctype);
        }
  } else if (systemlogin == 2) {
      //Check username and password passed by Modal
      if (username == '' || password == ''){
        //Display error if usr/pwd is blank
        document.getElementById("loginerrorA").innerHTML = "Please enter your username and password";
        //Mark the form fields ***RED*** if they are blank
        $('#username, #password').css("border","2px solid #a31818");
        $('#username, #password').css("box-shadow","0 0 3px #a31818");
      } else {
          //Reset the loginerror validation to blank(No Message)
          document.getElementById("loginerrorA").innerHTML = "";
          //Set the form Action
          document.getElementById("modalformA").action = "https://orchid.imp.conf.oceanwidebridge.com/Logon.aspx";
          document.getElementById("#chkradioA").innerHTML = "<input type='hidden' name='username' id='username' value='"+username+"'/><input type='hidden' id='password' name='password' value='"+password+"'/>";
          //Open a new tab
          document.getElementById("modalformA").target = "_blank";
          //Console display validation output
          document.forms['loginFormA'].submit();

      }
  } else if (systemlogin == 3) {
      if (username == '' || password == ''){
          //Display error if usr/pwd is blank
        document.getElementById("loginerrorA").innerHTML = "Please enter your username and password";
        //Mark the form fields ***RED*** if they are blank
        $('#username, #password').css("border","2px solid #a31818");
        $('#username, #password').css("box-shadow","0 0 3px #a31818");

      } else {
          //Reset the loginerror validation to blank(No Message)
          document.getElementById("loginerrorA").innerHTML = "";

          //Declare variables for passing to Policy Plus on form submit
          var username = document.getElementById("username").value;
          var password = document.getElementById("password").value;
          var portalName = "policyplus";
          var fstate = $("#fstate").val();
          //Check for the state select via dropdown list or set as default on cookie
          if (fstate !='' || fstate != null || fstate != 'all'){
              //switch based on fstate initValue
              switch(fstate){
                  case "Alabama":
                      var PSTATE = "AL";
                      break;
                  case "Alaska":
                      var PSTATE = "AK";
                      break;
                  case "Arizona":
                      var PSTATE = "AZ";
                      break;
                  case "California":
                      var PSTATE = "CA";
                      break;
                  case "Colorado":
                      var PSTATE = "CO";
                      break;
                  case "Connecticut":
                      var PSTATE = "CT";
                      break;
                  case "Delaware":
                      var PSTATE = "DE";
                      break;
                  case "Florida":
                      var PSTATE = "FL";
                  case "Georgia":
                      var PSTATE = "GA";
                      break;
                  case "Hawaii":
                      var PSTATE = "HI";
                      break;
                  case "Idaho":
                      var PSTATE = "ID";
                      break;
                  case "Illinois":
                      var PSTATE = "IL";
                      break;
                  case "Indiana":
                      var PSTATE = "IN";
                      break;
                  case "Iowa":
                      var PSTATE = "IA";
                      break;
                  case "Kansas":
                      var PSTATE = "KS";
                      break;
                  case "Kentucky":
                      var PSTATE = "KY";
                      break;
                  case "Louisiana":
                      var PSTATE = "LA";
                      break;
                  case "Maine":
                      var PSTATE = "ME";
                      break;
                  case "Maryland":
                      var PSTATE = "MD";
                      break;
                  case "Massachusetts":
                      var PSTATE = "MA";
                      break;
                  case "Michigan":
                      var PSTATE = "MI";
                      break;
                  case "Minnesota":
                      var PSTATE = "MN";
                      break;
                  case "Mississippi":
                      var PSTATE = "MS";
                      break;
                  case "Missouri":
                      var PSTATE = "MO";
                      break;
                  case "Montana":
                      var PSTATE = "MT";
                      break;
                  case "Nebraska":
                      var PSTATE = "NE";
                      break;
                  case "Nevada":
                      var PSTATE = "NV";
                      break;
                  case "New Hampshire":
                      var PSTATE = "NH";
                      break;
                  case "New Jersey":
                      var PSTATE = "NJ";
                      break;
                  case "New Mexico":
                      var PSTATE = "NM";
                      break;
                  case "New York":
                      var PSTATE = "NY";
                      break;
                  case "North Carolina":
                      var PSTATE = "NC";
                      break;
                  case "North Dakota":
                      var PSTATE = "ND";
                      break;
                  case "Ohio":
                      var PSTATE = "OH";
                      break;
                  case "Oklahoma":
                      var PSTATE = "OK";
                      break;
                  case "Oregon":
                      var PSTATE = "OR";
                      break;
                  case "Pennsylvania":
                      var PSTATE = "PA";
                      break;
                  case "Rhode Island":
                      var PSTATE = "RI";
                      break;
                  case "South Carolina":
                      var PSTATE = "SC";
                      break;
                  case "South Dakota":
                      var PSTATE  = "SD";
                      break;
                  case "Tennessee":
                      var PSTATE = "TN";
                      break;
                  case "Texas":
                      var PSTATE = "TX";
                      break;
                  case "Utah":
                      var PSTATE = "UT";
                      break;
                  case "Vermont":
                      var PSTATE = "VT";
                      break;
                  case "Virginia":
                      var PSTATE = "VA";
                      break;
                  case "Washington":
                      var PSTATE = "WA";
                      break;
                  case "West Virginia":
                      var PSTATE = "WV";
                      break;
                  case "Wisconsin":
                      var PSTATE = "WI";
                      break;
                  case "Wyoming":
                      var PSTATE = "WY";
                      break;
                  default:
                      var PSTATE = "FL";
              }
              //Append hidden fields to loginFormA and pass to policy plus
              $("#chkradioA").append("<input type='hidden' id='PSTATE' name='PSTATE' value='"+PSTATE+"' />");
              $("#chkradioA").append("<input type='hidden' name='username' id='username' value='"+username+"'/>");
              $("#chkradioA").append("<input type='hidden' id='password' name='password' value='"+password+"'/>");

              //Console display validation output
              console.log(PSTATE);
              //Console display validation output
          }

              // $.post("https://velocity.orchidinsurance.com/" + portalName + "/Landing", {username: username, password: password, PSTATE: PSTATE}, function(res) {
              //       if (res.indexOf('class="validationMsg"') != -1) {
              //           // do login failure code here; tell user to try logging in again
              //           document.getElementById("loginerrorA").innerHTML = "Login failed! Please enter your username and password";
              //           console.log("failed");
              //       } else {
              //           // do login success code here
              //           console.log("success");
              //           // example: navigate the current page to the oapp WebFlow
              //           window.location.href = "https://velocity.orchidinsurance.com/" + portalName + "/WebFlow?code=oapp&PSTATE="+PSTATE;
              //           //window.location.href = "http://64.14.148.118/" + portalName + "/Landing";
              //       }
              //   }, "html");

            }

            //Taget URL var
            //var targetURL = "https://velocity.orchidinsurance.com/" + portalName + "/WebFlow?code=oapp&PSTATE="+PSTATE;
            var targetURL = "http://polplus2.orchidinsurance.com/" + portalName + "/Landing";
            document.getElementById("modalformA").action = targetURL;
            //Open a new tab
            document.getElementById("modalformA").target = "_blank";
            //Submit the loginFormA form
            document.forms['loginFormA'].submit();
            //Console display validation output
            console.log(username);
            console.log(password);
            console.log(targetURL);

  } else {

  }

}
//Clear the form inputs on submit
function clrInputs(whichForm){
    if (whichForm == 1){
        $('#velocity').on('hidden.bs.modal', function (e) {
             $('#modalform').trigger('reset');
             $('this').find('input').val('');
             console.log('#modalform');
             //window.location.reload();
        });
    } else if (whichForm == 2){
        $('#defaultLogin').on('hidden.bs.modal', function (e) {
            $('#modalformA').trigger('reset');
            $('this').find('input').val('');
            console.log('#modalformA');
            console.log("Yes setTimeout was triggered with a value of 2");
            //window.location.reload();
        });
    }
}
