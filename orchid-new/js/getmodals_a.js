/*
Author: Rey Angeles
Email: rangeles@orchidinsurance.com or reya276@gmail.com
Version: 0.1v
Functions: removeOptions, getLine
Objects: initValue,initTxt,linestate,sort
*/

var initValue = 0;
var portal = 0;

//Remove select options
function clearTxt(initValue)
{
    document.getElementById("#state").innerHTML = "";
    document.getElementById("ForgotP").innerHTML = "";
    document.getElementById("loginImg").innerHTML = "";
    console.log("Cle");
}

//Get login portals
function getPortal(portal){
  if (portal == 1){
    window.open("https://connect.orchidinsurance.com/Logon.aspx");
  } else if (portal == 2){
    window.open("https://brokers.coastalagentsalliance.com/scripts/RatingWebServer.dll/Login");
  } else if (portal == 3){
    window.open(" https://velocity.orchidinsurance.com/policyplus/");
  } else {
    window.open("");
  }
}
//Hide Error div
function OhNo(){
  $("#nostate").hide();
}
//Show Caribbean
function getCaribb(){
  if(fstate == 'Caribbean'){
    document.getElementById("state").innerHTML = "Caribbean";
    document.getElementById("velocity").innerHTML;
    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
    document.getElementById("providers").innerHTML = "<input type='radio' name='system' checked='true' value='3' onchange='getLogos(3);'/> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";
    console.log("It's Caribbean alright!");
  }
}
//Start Personal Lines function
function getLine(initValue,initTxt,linestate){
  var system = 0;
  var linestate = "Alabama, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
  var fstate = $("#fstate").val();
  //Check if state NOT Selected then Loop through list and create options
  if (fstate != 'Caribbean' || fstate != 'all'){
      if (initValue == 1){
        document.getElementById("state").innerHTML = fstate;
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        document.getElementById("providers").innerHTML = "<input type='radio' name='system' id='system' value='1' onchange='getLogos(1);' /> <i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/>"
        + "<input type='radio' name='system' id='system' value='2' onchange='getLogos(2);'/> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>"
        + "<input type='radio' name='system' id='system' value='3' onchange='getLogos(3);'/> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";

      } else if (initValue == 2){
        document.getElementById("state").innerHTML = fstate;
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        document.getElementById("providers").innerHTML = "<input type='radio' name='system' id='system' value='2' onchange='getLogos(2);'/> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>"
        + "<input type='radio' name='system' value='3' onchange='getLogos(3);'/> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";

      } else if (initValue == 3){
        document.getElementById("state").innerHTML = fstate;
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        document.getElementById("providers").innerHTML = "<input type='radio' name='system' id='system' checked='true' value='3' onchange='getLogos(3);'/> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";

      } else if (initValue == 4){
        document.getElementById("state").innerHTML = fstate;
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        document.getElementById("providers").innerHTML = "<input type='radio' name='system' id='system' value='2' checked='true' onchange='getLogos(2);'/> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>";

      } else if (initValue == 5){
        document.getElementById("state").innerHTML = fstate;
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        document.getElementById("providers").innerHTML = "<input type='radio' name='system' id='system' value='2' onchange='getLogos(2);'/> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>"
        + "<input type='radio' name='system' value='3' onchange='getLogos(3);'/> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>" + "<p style='font-weight:bold;'><a href='Orchid-HNW-Application.pdf' target='_blank' title='Click here for Orchid High Net Worth Application'>Click here for Orchid High Net Worth Application</a></p>";

      } else if (initValue == 6){
        document.getElementById("state").innerHTML = fstate;
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        document.getElementById().innerHTML = "<p style='font-weight:bold;'><a href='Orchid-HNW-Application.pdf' target='_blank' title='Click here for Orchid High Net Worth Application'>Click here for Orchid High Net Worth Application</a></p>";

      } else if (initValue == 0 && fstate == 'Caribbean'){


      }
  } else if (fstate == 'all'){
      document.getElementById("nostate").innerHTML;
      console.log(initValue + " - " + fstate);

  }
}


//Get login header logo
function getLogos(system){
  //Check which system(Provider) was selected and display logo
    if (system == 1){
      document.getElementById("ForgotP").innerHTML = "<br/>For help with your <span style='font-weight:bold;'>password</span>, please call 609-277-7809 extension 105 or email us at <a href='mailto:ssati@orchidinsurance.com'>ssati@orchidinsurance.com</a>.";
      document.getElementById("loginImg").innerHTML = "<img src='wp-content/themes/orchid-new/assets/img/caa.png' style='padding:3px;'/><br/><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Coastal Agents Alliance credentials</h5>";
      console.log("Coastal Agents Alliance");
    } else if (system == 2){
      document.getElementById("loginImg").innerHTML = "<img src='wp-content/themes/orchid-new/assets/img//o-connect.png' style='padding:3px;' /><br/><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Connect credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://connect.orchidinsurance.com/ForgottenPassword.aspx'  target='_blank'>Forgot Password</a>]";
      console.log("Connect");
    } else if (system == 3){
      document.getElementById("loginImg").innerHTML = "<img src='wp-content/themes/orchid-new/assets/img/o-velocity.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://velocity.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
      console.log("Policyplus");
    } else if (system == 4){
      document.getElementById("loginImg").innerHTML = "<img src='wp-content/themes/orchid-new/assets/img/o-hnw.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://velocity.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
      console.log("High Net Worth");
    } else if (system == 5){
      document.getElementById("loginImg").innerHTML = "<img src='wp-content/themes/orchid-new/assets/img/o-hnw.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://velocity.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
      console.log("High Net Worth");

    }else if (system == 6){
      document.getElementById("loginImg").innerHTML = "<img src='wp-content/themes/orchid-new/assets/img/o-velocity.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://velocity.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
      console.log("Policyplus");
    }else {
      $("#ForgotP").hide();

    }

}
