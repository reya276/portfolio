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
function removeOptions(selectbox)
{
    var i;
    for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
    {
        selectbox.remove(i);
    }
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
//Start Personal Lines function
function getLine(initValue,initTxt,linestate){
  var system = 0;
  var initValue = initValue;
  //Check for Initial Value(initValue) passed
  if (initValue == 1){
    //Clear select options
    removeOptions(document.getElementById("state"));

      if (linestate.indexOf("texas") > -1){
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        document.getElementById("system").innerHTML = "<option value='1'>Coastal Agents Alliance</option>" + "<option value='2'>Connect</option>" +
        "<option value='3'>Policyplus</option>";
        console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
      } else if (linestate.indexOf("Alabama")  > -1 || linestate.indexOf("Mississippi")  > -1){
        var fstate = $("#fstate").val();
        var states = linestate.split(',');
        var i;
        var select = document.getElementById('state');
        //Check if state NOT Selected then Loop through list and create options
        if (fstate == 'all' || fstate == ''){
          for (i = 0; i < states.length; i++) {
            select.options[i] = null;
            var opt = document.createElement('option');
            opt.value = states[i];
            opt.text = states[i];
            select.add(opt);
          }
        } else {
          document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
        }
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        $( "#sysdiv" ).show();
        $("#proploc").removeClass('hidden');
        $("#hnwapp").addClass('hidden');
        $("#usr").removeClass('hidden');
        $("#pwd").removeClass('hidden');
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>";
        console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
      } else {
        var linestate = "Alabama, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas,Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
        document.getElementById("velocity").innerHTML;
        $( "#sysdiv" ).show();
        $("#proploc").removeClass('hidden');
        $("#hnwapp").addClass('hidden');
        $("#usr").removeClass('hidden');
        $("#pwd").removeClass('hidden');
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>" + "<option value='3'>Policyplus</option>";
        console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
      }
  } else if (initValue == 2){
      //Clear select options
      removeOptions(document.getElementById("state"));
      if (linestate.indexOf("Connecticut") > -1 || linestate.indexOf("Delaware") > -1 || linestate.indexOf("Massachusetts") > -1 || linestate.indexOf("Maryland") > -1 || linestate.indexOf("New Jersey") > -1 || linestate.indexOf("New York") > -1 || linestate.indexOf("Rhode Island") > -1 || linestate.indexOf("Virginia") > -1){
        var fstate = $("#fstate").val();
        var states = linestate.split(',');
        var i;
        //Check for state filter
        // if (fstate != 'all'){
        //   var select = fstate;
        //   console.log(select);
        // } else {
        //   //var select = document.getElementById('state');
        //   var select = document.getElementById('fstate');
        //   console.log(select);
        // };
        var select = document.getElementById('state');
        //Check if state NOT Selected then Loop through list and create options
        if (fstate == 'all' || fstate == ''){
          for (i = 0; i < states.length; i++) {
            select.options[i] = null;
            var opt = document.createElement('option');
            opt.value = states[i];
            opt.text = states[i];
            select.add(opt);
          }
        } else {
          document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
        }
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        $( "#sysdiv" ).show();
        $("#proploc").removeClass('hidden');
        $("#hnwapp").addClass('hidden');
        $("#usr").removeClass('hidden');
        $("#pwd").removeClass('hidden');
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1'>Coastal Agents Alliance</option>" + "<option value='3'>Policyplus</option>";
        console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
      } else {
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        $( "#sysdiv" ).show();
        $("#proploc").removeClass('hidden');
        $("#usr").removeClass('hidden');
        $("#pwd").removeClass('hidden');
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='3'>Policyplus</option>";
        console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);

      }
  } else if (initValue == 3){
      //Clear select options
      removeOptions(document.getElementById("state"));
      if (linestate.indexOf("Texas") > -1){
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        document.getElementById("state").innerHTML = "<option value='Texas'>" + linestate + "</option>"
        $( "#sysdiv" ).show();
        $("#proploc").removeClass('hidden');
        $("#hnwapp").addClass('hidden');
        $("#usr").removeClass('hidden');
        $("#pwd").removeClass('hidden');
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>";
        console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
      } else {
        removeOptions(document.getElementById("state"));
        var linestate = "Alabama, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas,Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
        var fstate = $("#fstate").val();
        var states = linestate.split(',');
        var i;
        var select = document.getElementById('state');
        //Check if state NOT Selected then Loop through list and create options
        if (fstate == 'all' || fstate == ''){
          for (i = 0; i < states.length; i++) {
            select.options[i] = null;
            var opt = document.createElement('option');
            opt.value = states[i];
            opt.text = states[i];
            select.add(opt);
          }
        } else {
          document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
        }
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        $( "#sysdiv" ).show();

        //Check for Excess Wind
        if (initTxt.indexOf("Excess Wind Only") > -1){
          $("#proploc").removeClass('hidden');
          document.getElementById("state").innerHTML = "<option value='North Carolina' selected='true'>North Carolina</option>";
          document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='3'>Policyplus</option>";
          console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        }  else {
          $("#proploc").removeClass('hidden');
          $("#hnwapp").addClass('hidden');
          $("#usr").removeClass('hidden');
          $("#pwd").removeClass('hidden');
          document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>" + "<option value='3'>Policyplus</option>";
          console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        }

      }
  } else if (initValue == 4){
    //document.getElementById('prog').value = initValue;
      //Clear select options
      removeOptions(document.getElementById("state"));
      if (linestate.indexOf("Connecticut") > -1 || linestate.indexOf("Delaware") > -1 || linestate.indexOf("Massachusetts") > -1 || linestate.indexOf("Maryland") > -1 || linestate.indexOf("New Jersey") > -1 || linestate.indexOf("New York") > -1 || linestate.indexOf("Rhode Island") > -1 || linestate.indexOf("Virginia") > -1){
        var fstate = $("#fstate").val();
        var states = linestate.split(',');
        var i;

        //Check if state NOT Selected then Loop through list and create options
        if (fstate == 'all' || fstate == ''){
          for (i = 0; i < states.length; i++) {
            select.options[i] = null;
            var opt = document.createElement('option');
            opt.value = states[i];
            opt.text = states[i];
            select.add(opt);
          }
        } else {
          document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
        }
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
        $( "#sysdiv" ).show();
        $("#proploc").removeClass('hidden');
        $("#hnwapp").addClass('hidden');
        $("#usr").removeClass('hidden');
        $("#pwd").removeClass('hidden');
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1'>Coastal Agents Alliance</option>";
        console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
      } else if (linestate.indexOf("Texas") > -1) {
        document.getElementById("velocity").innerHTML;
        document.getElementById("state").innerHTML = "<option value='Texas'>" + linestate + "</option>"
        $( "#sysdiv" ).show();
        $("#proploc").removeClass('hidden');
        $("#hnwapp").addClass('hidden');
        $("#usr").removeClass('hidden');
        $("#pwd").removeClass('hidden');
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>";
        console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
      } else {
        //Clear select options
        removeOptions(document.getElementById("state"));
        //Create States List
        var linestate = "Alabama, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas,Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
        var fstate = $("#fstate").val();
        var states = linestate.split(',');
        var i;
        var select = document.getElementById('state');
        //Check if state NOT Selected then Loop through list and create options
        if (fstate == 'all' || fstate == ''){
          for (i = 0; i < states.length; i++) {
            select.options[i] = null;
            var opt = document.createElement('option');
            opt.value = states[i];
            opt.text = states[i];
            select.add(opt);
          }
        } else {
          document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
        }
        document.getElementById("velocity").innerHTML;
        $( "#sysdiv" ).show();
        $("#proploc").removeClass('hidden');
        $("#hnwapp").addClass('hidden');
        $("#usr").removeClass('hidden');
        $("#pwd").removeClass('hidden');
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1'>Coastal Agents Alliance</option>"+ "<option value='2'>Connect</option>"+ "<option value='3'>Policyplus</option>";
        console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
      }
  } else if (initValue == 5){
    //document.getElementById('prog').value = initValue;
    //Clear select options
    removeOptions(document.getElementById("state"));
    //Check the states
    if (linestate.indexOf("Arizona") > -1 || linestate.indexOf("New Mexico") > -1 || linestate.indexOf("North Dakota") > -1 || linestate.indexOf("South Dakota") > -1){
      var fstate = $("#fstate").val();
      var states = linestate.split(',');
      var i;
      var select = document.getElementById('state');
      //Check if state NOT Selected then Loop through list and create options
      if (fstate == 'all' || fstate == ''){
        for (i = 0; i < states.length; i++) {
          select.options[i] = null;
          var opt = document.createElement('option');
          opt.value = states[i];
          opt.text = states[i];
          select.add(opt);
        }
      } else {
        document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
      }
      document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
      document.getElementById("velocity").innerHTML;
      $( "#sysdiv" ).show();
      $("#proploc").removeClass('hidden');
      $("#hnwapp").addClass('hidden');
      $("#usr").removeClass('hidden');
      $("#pwd").removeClass('hidden');
      document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='4'>High Net Worth</option>";
      console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
    } else if (linestate.indexOf("none") > -1) {
      //Clear select options
      removeOptions(document.getElementById("state"));
      //Create States List
      var linestate = "Alabama, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas,Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
      var fstate = $("#fstate").val();
      var states = linestate.split(',');
      var i;
      var select = document.getElementById('state');
      //Check if state NOT Selected then Loop through list and create options
      if (fstate == 'all' || fstate == ''){
        for (i = 0; i < states.length; i++) {
          select.options[i] = null;
          var opt = document.createElement('option');
          opt.value = states[i];
          opt.text = states[i];
          select.add(opt);
        }
      } else {
        document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
      }
      document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
      document.getElementById("velocity").innerHTML;
      $( "#sysdiv" ).show();
      $("#proploc").removeClass('hidden');
      $("#hnwapp").addClass('hidden');
      $("#usr").removeClass('hidden');
      $("#pwd").removeClass('hidden');
      document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='4'>High Net Worth</option>";
      console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
    }
  } else if (initValue == 10 ){
    //Clear select options
    removeOptions(document.getElementById("state"));
    if (initTxt.indexOf("Caribbean Properties") > -1){
        //document.geElementById("proploc").addClass('hidden');
        $("#proploc").addClass('hidden');
        $("#hnwapp").addClass('hidden');
        $("#usr").removeClass('hidden');
        $("#pwd").removeClass('hidden');
        document.getElementById("state").innerHTML = "";
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='3'>Policyplus</option>";
      }
  } else if (initValue == 9){
    //Clear select options
    removeOptions(document.getElementById("state"));
    var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
    var fstate = $("#fstate").val();
    var states = linestate.split(',');
    var i;
    var select = document.getElementById('state');
    //Check if state NOT Selected then Loop through list and create options
      if (fstate == 'all' || fstate == ''){
        for (i = 0; i < states.length; i++) {
          select.options[i] = null;
          var opt = document.createElement('option');
          opt.value = states[i];
          opt.text = states[i];
          select.add(opt);
        }
      } else {
        document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
      }
      document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
      document.getElementById("velocity").innerHTML;
      $( "#sysdiv" ).show();
      $("#proploc").removeClass('hidden');
      $("#hnwapp").addClass('hidden');
      $("#usr").removeClass('hidden');
      $("#pwd").removeClass('hidden');
      //Check for Wind Only Policy and DO NOT SHOW Coastal
      if (initTxt.indexOf("Wind Only Policy") > -1 || initTxt.indexOf("HO4 Renters") > -1 || initTxt.indexOf("Builders Risk") > -1 || initTxt.indexOf("Primary Flood & Excess") > -1){
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>" + "<option value='3'>Policy Plus</option>";
      } else if (initTxt.indexOf("Inland Marine & Valuable Articles") > -1){
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1'>Connect</option>" + "<option value='4'>High Net Worth</option>" + "<option value='3'>Policy Plus</option>";
      }else{
        document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1'>Coastal Agents Alliance</option>" +  "<option value='2'>Connect</option>" + "<option value='3'>Policy Plus</option>";
      }
      console.log("Outside");
    //START Wind Only Policy
    if (initTxt.indexOf("Wind Only Policy") > -1 || initTxt.indexOf("HO4 Renters") > -1 || initTxt.indexOf("Builders Risk") > -1 || initTxt.indexOf("Primary Flood & Excess") > -1){
      //Clear select options
      removeOptions(document.getElementById("state"));
      var linestate = "Alabama, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas,Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";

      console.log("Inside");
      //check which login system was selected
      //1=CAA 2=Connect 3=Policy Plus
      $("#system").change(function(){
        var selectedSysType = this.options[this.selectedIndex].value;

        if (selectedSysType == 2){
              //Clear select options
              removeOptions(document.getElementById("state"));
              var linestate = "Alabama, Mississippi, Texas";
              var fstate = $("#fstate").val();
              var states = linestate.split(',');
              var i;
              var select = document.getElementById('state');
              //Check if state NOT Selected then Loop through list and create options
              if (fstate == 'all' || fstate == ''){
                for (i = 0; i < states.length; i++) {
                  select.options[i] = null;
                  var opt = document.createElement('option');
                  opt.value = states[i];
                  opt.text = states[i];
                  select.add(opt);
                }
              } else {
                document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
              }
              document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
              document.getElementById("velocity").innerHTML;
              $( "#sysdiv" ).show();
              $("#proploc").removeClass('hidden');
              $("#hnwapp").addClass('hidden');
              $("#usr").removeClass('hidden');
              $("#pwd").removeClass('hidden');
              document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2' selected='true'>Connect</option>" + "<option value='3'>Policy Plus</option>";
              console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        } else if (selectedSysType == 3) {
              //Clear select options
              removeOptions(document.getElementById("state"));
              var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
              var fstate = $("#fstate").val();
              var states = linestate.split(',');
              var i;
              var select = document.getElementById('state');
              //Check if state NOT Selected then Loop through list and create options
              if (fstate == 'all' || fstate == ''){
                for (i = 0; i < states.length; i++) {
                  select.options[i] = null;
                  var opt = document.createElement('option');
                  opt.value = states[i];
                  opt.text = states[i];
                  select.add(opt);
                }
              } else {
                document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
              }
              document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
              document.getElementById("velocity").innerHTML;
              $( "#sysdiv" ).show();
              $("#proploc").removeClass('hidden');
              $("#hnwapp").addClass('hidden');
              $("#usr").removeClass('hidden');
              $("#pwd").removeClass('hidden');
              document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>" + "<option value='3' selected='true'>Policy Plus</option>";
              console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        }
      });
      //START Excess & Surplus Homeowners
    } else if (initTxt.indexOf("Excess & Surplus Homeowners") > -1) {
      //Clear select options
      removeOptions(document.getElementById("state"));
      var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
      var fstate = $("#fstate").val();
      var states = linestate.split(',');
      var i;
      var select = document.getElementById('state');
      $("#system").change(function(){
        var selectedSysType = this.options[this.selectedIndex].value;
        if (selectedSysType == 1){
            //Clear select options
            removeOptions(document.getElementById("state"));
            var linestate = "Connecticut, Delaware,  Maryland, Massachusetts, New Jersey, New York, Rhode Island, Virginia";
            var fstate = $("#fstate").val();
            var states = linestate.split(',');
            var i;
            var select = document.getElementById('state');
            //Check if state NOT Selected then Loop through list and create options
            if (fstate == 'all' || fstate == ''){
              for (i = 0; i < states.length; i++) {
                select.options[i] = null;
                var opt = document.createElement('option');
                opt.value = states[i];
                opt.text = states[i];
                select.add(opt);
              }
            } else {
              document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
            }
            document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
            document.getElementById("velocity").innerHTML;
            $( "#sysdiv" ).show();
            $("#proploc").removeClass('hidden');
            $("#hnwapp").addClass('hidden');
            $("#usr").removeClass('hidden');
            $("#pwd").removeClass('hidden');
            document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1' selected='true'>Coastal Agents Alliance</option>" +  "<option value='2'>Connect</option>" + "<option value='3'>Policy Plus</option>";
            console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        } else if (selectedSysType == 2){
            //Clear select options
            removeOptions(document.getElementById("state"));
            var linestate = "Alabama, Mississippi, Texas";
            var fstate = $("#fstate").val();
            var states = linestate.split(',');
            var i;
            var select = document.getElementById('state');
            //Check if state NOT Selected then Loop through list and create options
            if (fstate == 'all' || fstate == ''){
              for (i = 0; i < states.length; i++) {
                select.options[i] = null;
                var opt = document.createElement('option');
                opt.value = states[i];
                opt.text = states[i];
                select.add(opt);
              }
            } else {
              document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
            }
            document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
            document.getElementById("velocity").innerHTML;
            $( "#sysdiv" ).show();
            $("#proploc").removeClass('hidden');
            $("#hnwapp").addClass('hidden');
            $("#usr").removeClass('hidden');
            $("#pwd").removeClass('hidden');
            document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1'>Coastal Agents Alliance</option>" +  "<option value='2' selected='true'>Connect</option>" + "<option value='3'>Policy Plus</option>";
            console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        } else if (selectedSysType == 3){
          //Clear select options
          removeOptions(document.getElementById("state"));
          var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
          var fstate = $("#fstate").val();
          var states = linestate.split(',');
          var i;
          var select = document.getElementById('state');
          //Check if state NOT Selected then Loop through list and create options
          if (fstate == 'all' || fstate == ''){
            for (i = 0; i < states.length; i++) {
              select.options[i] = null;
              var opt = document.createElement('option');
              opt.value = states[i];
              opt.text = states[i];
              select.add(opt);
            }
          } else {
            document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
          }
          document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
          document.getElementById("velocity").innerHTML;
          $( "#sysdiv" ).show();
          $("#proploc").removeClass('hidden');
          $("#hnwapp").addClass('hidden');
          $("#usr").removeClass('hidden');
          $("#pwd").removeClass('hidden');
          document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1'>Coastal Agents Alliance</option>" +  "<option value='2'>Connect</option>" + "<option value='3' selected='true'>Policy Plus</option>";
          console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        }
      });
      //START HO6 Condo Unit
    } else if (initTxt.indexOf("HO6 Condo Unit") > -1){
      //Clear select options
      removeOptions(document.getElementById("state"));
      var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
      var fstate = $("#fstate").val();
      var states = linestate.split(',');
      var i;
      var select = document.getElementById('state');
      $("#system").change(function(){
        var selectedSysType = this.options[this.selectedIndex].value;
        if (selectedSysType == 1){
            //Clear select options
            removeOptions(document.getElementById("state"));
            var linestate = "Connecticut, Delaware,  Maryland, Massachusetts, New Jersey, New York, Rhode Island, Virginia";
            var fstate = $("#fstate").val();
            var states = linestate.split(',');
            var i;
            var select = document.getElementById('state');
            //Check if state NOT Selected then Loop through list and create options
            if (fstate == 'all' || fstate == ''){
              for (i = 0; i < states.length; i++) {
                select.options[i] = null;
                var opt = document.createElement('option');
                opt.value = states[i];
                opt.text = states[i];
                select.add(opt);
              }
            } else {
              document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
            }
            document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
            document.getElementById("velocity").innerHTML;
            $( "#sysdiv" ).show();
            $("#proploc").removeClass('hidden');
            $("#hnwapp").addClass('hidden');
            $("#usr").removeClass('hidden');
            $("#pwd").removeClass('hidden');
            document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1' selected='true'>Coastal Agents Alliance</option>" +  "<option value='2'>Connect</option>" + "<option value='3'>Policy Plus</option>";
            console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        } else if (selectedSysType == 2){
            //Clear select options
            removeOptions(document.getElementById("state"));
            var linestate = "Alabama, Mississippi, Texas";
            var fstate = $("#fstate").val();
            var states = linestate.split(',');
            var i;
            var select = document.getElementById('state');
            //Check if state NOT Selected then Loop through list and create options
            if (fstate == 'all' || fstate == ''){
              for (i = 0; i < states.length; i++) {
                select.options[i] = null;
                var opt = document.createElement('option');
                opt.value = states[i];
                opt.text = states[i];
                select.add(opt);
              }
            } else {
              document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
            }
            document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
            document.getElementById("velocity").innerHTML;
            $( "#sysdiv" ).show();
            $("#proploc").removeClass('hidden');
            $("#hnwapp").addClass('hidden');
            $("#usr").removeClass('hidden');
            $("#pwd").removeClass('hidden');
            document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1'>Coastal Agents Alliance</option>" +  "<option value='2' selected='true'>Connect</option>" + "<option value='3'>Policy Plus</option>";
            console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        } else if (selectedSysType == 3){
          //Clear select options
          removeOptions(document.getElementById("state"));
          var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
          var fstate = $("#fstate").val();
          var states = linestate.split(',');
          var i;
          var select = document.getElementById('state');
          //Check if state NOT Selected then Loop through list and create options
          if (fstate == 'all' || fstate == ''){
            for (i = 0; i < states.length; i++) {
              select.options[i] = null;
              var opt = document.createElement('option');
              opt.value = states[i];
              opt.text = states[i];
              select.add(opt);
            }
          } else {
            document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
          }
          document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
          document.getElementById("velocity").innerHTML;
          $( "#sysdiv" ).show();
          $("#proploc").removeClass('hidden');
          $("#hnwapp").addClass('hidden');
          $("#usr").removeClass('hidden');
          $("#pwd").removeClass('hidden');
          document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='1'>Coastal Agents Alliance</option>" +  "<option value='2'>Connect</option>" + "<option value='3' selected='true'>Policy Plus</option>";
          console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        }
      });
      //START Inland Marine & Valuable Articles
    } else if (initTxt.indexOf("Inland Marine & Valuable Articles") > -1){
      //Clear select options
      removeOptions(document.getElementById("state"));
      var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
      var fstate = $("#fstate").val();
      var states = linestate.split(',');
      var i;
      var select = document.getElementById('state');
      $("#system").change(function(){
        var selectedSysType = this.options[this.selectedIndex].value;
        if (selectedSysType == 2){
            //Clear select options
            removeOptions(document.getElementById("state"));
            var linestate = "Alabama, Mississippi, Tex";
            var fstate = $("#fstate").val();
            var states = linestate.split(',');
            var i;
            var select = document.getElementById('state');
            //Check if state NOT Selected then Loop through list and create options
            if (fstate == 'all' || fstate == ''){
              for (i = 0; i < states.length; i++) {
                select.options[i] = null;
                var opt = document.createElement('option');
                opt.value = states[i];
                opt.text = states[i];
                select.add(opt);
              }
            } else {
              document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
            }
            document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
            document.getElementById("velocity").innerHTML;
            $( "#sysdiv" ).show();
            $("#proploc").removeClass('hidden');
            $("#hnwapp").addClass('hidden');
            $("#usr").removeClass('hidden');
            $("#pwd").removeClass('hidden');
            document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2' selected='true'>Connect</option>" + "<option value='4'>High Net Worth</option>" + "<option value='3'>Policy Plus</option>";
            console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        } else if (selectedSysType == 4){
            //Clear select options
            removeOptions(document.getElementById("state"));
            var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
            var fstate = $("#fstate").val();
            var states = linestate.split(',');
            var i;
            var select = document.getElementById('state');
            //Check if state NOT Selected then Loop through list and create options
            if (fstate == 'all' || fstate == ''){
              for (i = 0; i < states.length; i++) {
                select.options[i] = null;
                var opt = document.createElement('option');
                opt.value = states[i];
                opt.text = states[i];
                select.add(opt);
              }
            } else {
              document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
            }
            document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
            document.getElementById("velocity").innerHTML;
            $( "#sysdiv" ).show();
            document.getElementById("hnwapp").innerHTML = "<p style='font-weight:bold;'><a href='Orchid-HNW-Application.pdf' target='_blank' title='Click here for Orchid High Net Worth Application'>Click here for Orchid High Net Worth Application</a></p>";
            $("#proploc").addClass('hidden');
            $("#hnwapp").removeClass('hidden');
            $("#usr").addClass('hidden');
            $("#pwd").addClass('hidden');
            document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>" +  "<option value='4' selected='true'>High Net Worth</option>" + "<option value='3'>Policy Plus</option>";
            console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        } else if (selectedSysType == 3){
          //Clear select options
          removeOptions(document.getElementById("state"));
          var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
          var fstate = $("#fstate").val();
          var states = linestate.split(',');
          var i;
          var select = document.getElementById('state');
          //Check if state NOT Selected then Loop through list and create options
          if (fstate == 'all' || fstate == ''){
            for (i = 0; i < states.length; i++) {
              select.options[i] = null;
              var opt = document.createElement('option');
              opt.value = states[i];
              opt.text = states[i];
              select.add(opt);
            }
          } else {
            document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
          }
          document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
          document.getElementById("velocity").innerHTML;
          $( "#sysdiv" ).show();
          $("#proploc").removeClass('hidden');
          $("#hnwapp").addClass('hidden');
          $("#usr").removeClass('hidden');
          $("#pwd").removeClass('hidden');
          document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>" +  "<option value='4'>High Net Worth</option>" + "<option value='3' selected='true'>Policy Plus</option>";
          console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
        }
      });
    } else if (initTxt.indexOf("WYO NFIP Flood @ 22% Commission") > -1){
          //Clear select options
          removeOptions(document.getElementById("state"));
          var linestate = "Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
          var fstate = $("#fstate").val();
          var states = linestate.split(',');
          var i;
          var select = document.getElementById('state');
          //Check if state NOT Selected then Loop through list and create options
          if (fstate == 'all' || fstate == ''){
            for (i = 0; i < states.length; i++) {
              select.options[i] = null;
              var opt = document.createElement('option');
              opt.value = states[i];
              opt.text = states[i];
              select.add(opt);
            }
          } else {
            document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
          }
          document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
          document.getElementById("velocity").innerHTML;
          $( "#sysdiv" ).show();
          $("#proploc").removeClass('hidden');
          $("#hnwapp").addClass('hidden');
          $("#usr").removeClass('hidden');
          $("#pwd").removeClass('hidden');
          document.getElementById("system").innerHTML = "<option value='0'  selected='true'>Select a site</option>" + "<option value='6'>Policy Plus</option>";
          console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
    } else if (initTxt.indexOf("") > -1){

    }
  } else {
      //Clear select options
      removeOptions(document.getElementById("state"));
      //Create States List
      var linestate = "Alabama, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas,Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
      var fstate = $("#fstate").val();
      var states = linestate.split(',');
      var i;
      var select = document.getElementById('state');
      //Check if state NOT Selected then Loop through list and create options
      if (fstate == 'all' || fstate == ''){
        for (i = 0; i < states.length; i++) {
          select.options[i] = null;
          var opt = document.createElement('option');
          opt.value = states[i];
          opt.text = states[i];
          select.add(opt);
        }
      } else {
        document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
      }
      document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
      document.getElementById("velocity").innerHTML;
      document.getElementById("ForgotP").innerHTML = "[<a href='https://velocity.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
      $( "#sysdiv" ).show();
      $("#proploc").removeClass('hidden');
      $("#hnwapp").addClass('hidden');
      $("#usr").removeClass('hidden');
      $("#pwd").removeClass('hidden');
      document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='3'>Policyplus</option>";
      console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
  }

}
//Start Commercial Lines function
function getCLine(initValue,initTxt,initsys){
  //var initValue = initValue;
  //Set states list variable
  var linestate = "Alabama, Florida, Louisiana, Mississippi, New Jersey, North Carolina, South Carolina, Texas";

  if (initValue == 6 && initsys == 2){
    //Clear select options
    removeOptions(document.getElementById("state"));
    var fstate = $("#fstate").val();
    var states = linestate.split(',');
    var i;
    var select = document.getElementById('state');
    //Check if state NOT Selected then Loop through list and create options
    if (fstate == 'all' || fstate == ''){
      for (i = 0; i < states.length; i++) {
        select.options[i] = null;
        var opt = document.createElement('option');
        opt.value = states[i];
        opt.text = states[i];
        select.add(opt);
      }
    } else {
      document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
    }
    document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
    document.getElementById("velocity").innerHTML;
    if (initsys != 4 && initValue != 8){
      $( "#sysdiv" ).show();
      document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='2'>Connect</option>";
    }
    console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate);
  } else if (initValue == 7 && initsys == 3){
    //Clear select options
    removeOptions(document.getElementById("state"));
    var fstate = $("#fstate").val();
    var states = linestate.split(',');
    var i;
    var select = document.getElementById('state');
    //Check if state NOT Selected then Loop through list and create options
    if (fstate == 'all' || fstate == ''){
      for (i = 0; i < states.length; i++) {
        select.options[i] = null;
        var opt = document.createElement('option');
        opt.value = states[i];
        opt.text = states[i];
        select.add(opt);
      }
    } else {
      document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
    }
    document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
    document.getElementById("velocity").innerHTML;
    if (initsys != 4 && initValue != 8){
      $( "#sysdiv" ).show();
      document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='3'>PolicyPlus</option>";
    }
    console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate + "Sys:" + initsys);
  } else if (initValue == 8 && initsys == 4){
    //Clear select options
    removeOptions(document.getElementById("state"));
    var fstate = $("#fstate").val();
    var states = linestate.split(',');
    var i;
    var select = document.getElementById('state');
    //Check if state NOT Selected then Loop through list and create options
    if (fstate == 'all' || fstate == ''){
      for (i = 0; i < states.length; i++) {
        select.options[i] = null;
        var opt = document.createElement('option');
        opt.value = states[i];
        opt.text = states[i];
        select.add(opt);
      }
    } else {
      document.getElementById("state").innerHTML = "<option value="+fstate+" selected='true'>"+fstate+"</option>";
    }

    $("#sysdiv").hide();
    $("#hnwapp").addClass('hidden');
    $("#usr").removeClass('hidden');
    $("#pwd").removeClass('hidden');
    document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
    document.getElementById("velocity").innerHTML;
    document.getElementById("loginImg").innerHTML = "<img src='images/logo.png' style='padding:3px;' /><br/><br><h5 class='modal-title' style='text-align:center;'>Please log in with your credentials</h5>";
    //document.getElementById("system").innerHTML = "<option value='0'>Select a site</option>" + "<option value='3'>PolicyPlus</option>";
    document.getElementById("ForgotP").innerHTML = "<br/>This will be a manual(Inbox) process for now</span>, please call 609-277-7809 extension 105 or email us at <a href='mailto:email@orchidinsurance.com'>email@orchidinsurance.com</a>.";
    console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate + initsys);
  } else if (initValue == 9 && initsys == 2){
    //Clear select options
    removeOptions(document.getElementById("state"));
    var fstate = $("#fstate").val();
    console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate + initsys);
    console.log("");
  }  else if (initValue == 10 && initsys == 2){
      //Clear select options
      removeOptions(document.getElementById("state"));
      var fstate = $("#fstate").val();
      console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate + initsys);
  } else {
    //Clear select options
    removeOptions(document.getElementById("state"));
    var fstate = $("#fstate").val();
    console.log("check:" + initValue, + "Display:" + initTxt, + "States" + linestate + initsys);
  }

}

//Get login header logo
function getLogos(){
var system = document.getElementById("system").value;
    if (system == 1){
      document.getElementById("ForgotP").innerHTML = "<br/>For help with your <span style='font-weight:bold;'>password</span>, please call 609-277-7809 extension 105 or email us at <a href='mailto:ssati@orchidinsurance.com'>ssati@orchidinsurance.com</a>.";
      document.getElementById("loginImg").innerHTML = "<img src='images/caa.png' style='padding:3px;'/><br/><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Coastal Agents Alliance credentials</h5>";
      console.log("Coastal Agents Alliance");
    } else if (system == 2){
      document.getElementById("loginImg").innerHTML = "<img src='images/o-connect.png' style='padding:3px;' /><br/><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Connect credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://connect.orchidinsurance.com/ForgottenPassword.aspx'  target='_blank'>Forgot Password</a>]";
      console.log("Connect");
    } else if (system == 3){
      document.getElementById("loginImg").innerHTML = "<img src='images/o-velocity.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://velocity.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
      console.log("Policyplus");
    } else if (system == 4){
      document.getElementById("loginImg").innerHTML = "<img src='images/o-hnw.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://velocity.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
      console.log("High Net Worth");
    } else if (system == 5){
      document.getElementById("loginImg").innerHTML = "<img src='images/o-hnw.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://velocity.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
      console.log("High Net Worth");

    }else if (system == 6){
      document.getElementById("loginImg").innerHTML = "<img src='images/o-velocity.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
      document.getElementById("ForgotP").innerHTML = "[<a href='https://velocity.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
      console.log("Policyplus");
    }else {
      $("#ForgotP").hide();

    }

}
