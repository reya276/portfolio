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
function clearTxt(initValue) {
    document.getElementById("#state").innerHTML = "";
    document.getElementById("ForgotP").innerHTML = "";
    document.getElementById("loginImg").innerHTML = "";
    console.log("Cleared");
}

//Get login portals
function getPortal(portal) {
    if (portal == 1) {
        window.open("https://orchid.imp.conf.oceanwidebridge.com");
    } else if (portal == 2) {
        window.open("http://demo.netrate.com/scripts/CAALogin.dll");
    } else if (portal == 3) {
        window.open(" http://polplus2.orchidinsurance.com/policyplus/");
    } else {
        window.open("");
    }
}


//Show Caribbean
function getCaribb() {
    var system = 3;
    var initValue = 0;
    var fstate = $("#fstate").val();
    //Checked providers
    var ppradiok = "<input type='radio' class='chkradio' name='system' value='3' onchange='getLogos(3);' checked='true' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";
    var connradiok = "<input type='radio' class='chkradio' name='system' value='2' onchange='getLogos(2);' checked='true' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>";
    //var caaradiok = "<i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/><a href='http://demo.netrate.com/scripts/CAALogin.dll' target='_blank' title='Click here to login to CAA'>Login to Coastal Agents Alliance</a>";
    var caaradiok = "<input type='radio' class='chkradio' name='system' value='1' onchange='getLogos(1);' checked='true' /> <i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/>";
    //NONE checked providers
    var ppradio = "<input type='radio' class='chkradio' name='system' value='3' onchange='getLogos(3);' checked='false' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";
    var connradio = "<input type='radio' class='chkradio' name='system' value='2' onchange='getLogos(2);' checked='false' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>";
    var caaradio = "<input type='radio' class='chkradio' name='system' value='1' onchange='getLogos(1);' checked='false' /> <i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/>";
    //var caaradio = "<i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/><a href='http://demo.netrate.com/scripts/CAALogin.dll' target='_blank' title='Click here to login to CAA'>Login to Coastal Agents Alliance</a>";
    var combined = "<input type='radio' class='chkradio' name='system' value='3' onchange='getLogos(3);' /> Policy Plus<br/><input type='radio' id='system' class='chkradio' name='system' value='1' onchange='getLogos(1);' checked='true' /> Coastal Agents Alliance<br/>";
    //check for state change
    if (fstate == 'Caribbean') {
        document.getElementById("state").innerHTML = fstate;
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - Caribbean properties";
        document.getElementById("providers").innerHTML = ppradiok;
        $("#velocity").modal();
        //check to see if the default system is checked and show logo
        if ($('.chkradio').is(':checked')) {
            return getLogos(3, initTxt);
        }
        console.log(fstate);
    } else {
        console.log("nothing");
    }
}
//Start Personal Lines function
function getLine(initValue, initTxt) {
    var initValue = initValue;
    var fstate = $("#fstate").val();
    //Checked providers
    var ppradiok = "<input type='radio' class='chkradio' id='system' name='system' value='3' onchange='getLogos(3);' checked='true' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";
    var connradiok = "<input type='radio' class='chkradio' name='system' value='2' onchange='getLogos(2);' checked='true' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>";
    //var caaradiok = "<i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/><a href='http://demo.netrate.com/scripts/CAALogin.dll' target='_blank' title='Click here to login to CAA'>Login to Coastal Agents Alliance</a>";
    var caaradiok = "<input type='radio' class='chkradio' id='system' name='system' value='1' onchange='getLogos(1);' checked='true' /> <i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/>";
    var caamsg = "<span style='font-size:0.8em; text-align:left; padding:3px 2px 5px 2px;'><span style='font-weight:600'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</span>";
    //NONE checked providers
    var ppradio = "<input type='radio' class='chkradio' name='system' value='3' onchange='getLogos(3);' checked='false' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";
    var connradio = "<input type='radio' class='chkradio' name='system' value='2' onchange='getLogos(2);' checked='false' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>";
    //var caaradio = "<i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/><a href='http://demo.netrate.com/scripts/CAALogin.dll' target='_blank' title='Click here to login to CAA'>Login to Coastal Agents Alliance</a>";
    var caaradio = "<input type='radio' class='chkradio' name='system' value='1' onchange='getLogos(1);' checked='false' /> <i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/>";
    //Check if state NOT Selected then Loop through list and create options
    if (fstate == 'all' || fstate == null) {
        alert("Error! Please select a state from the properties location list.");
        $('#fstate').focus();
        $('#fstate').css("border", "2px solid #0057b8");
        $('#fstate').css("box-shadow", "0 0 4px #0057b8");
        console.log(initValue + " - " + fstate);

    } else if (fstate != 'all' || fstate != 'Caribbean') {
        //start state logic based on initValue
        if (initValue == 1) {
            //switch based on state selected
            switch (fstate) {
                case 'Alabama':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = connradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    // console.log(initValue + " - " + fstate);
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                case 'Arizona':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'California':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Colorado':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Connecticut':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = combined;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(1);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Delaware':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = combined;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(1);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'District of Columbia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Florida':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Georgia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Hawaii':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Idaho':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Illinois':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Indiana':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Kansas':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Kentucky':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Louisiana':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Maine':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Maryland':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = combined;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(1);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Massachusetts':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = combined;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        console.log(initValue + " - " + fstate + " - " + system);
                        return getLogos(1);
                    }

                    break;
                case 'Michigan':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Minnesota':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Mississippi':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = connradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                    console.log(initValue + " - " + fstate);
                case 'Missouri':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Montana':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Nevada':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New Hampshire':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New Jersey':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = combined;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(1);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New Mexico':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New York':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = combined;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(1);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'North Carolina':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Ohio':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Oklahoma':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Oregon':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Pennsylvania':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Rhode Island':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = combined;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(1);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'South Carolina':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Tennessee':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Texas':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = connradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    // console.log(initValue + " - " + fstate);
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                case 'Utah':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Vermont':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Virginia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = caaradio + ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Washington':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'West Virginia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Wisconsin':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Wyoming':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;

            }
        } else if (initValue == 2) {
            switch (fstate) {
                case 'Alabama':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = connradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                    console.log(initValue + " - " + fstate);
                case 'Mississippi':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = connradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                    console.log(initValue + " - " + fstate);
                case 'Texas':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = connradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                    console.log(initValue + " - " + fstate);
            }
        } else if (initValue == 3) {
            //switch based on state selected
            switch (fstate) {
                case 'Alabama':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = ppradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    // console.log(initValue + " - " + fstate);
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                case 'Arizona':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'California':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Colorado':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Connecticut':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Delaware':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'District of Columbia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Florida':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Georgia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Hawaii':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Idaho':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Illinois':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Indiana':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Kansas':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Kentucky':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Louisiana':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Maine':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Maryland':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Massachusetts':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate + "-" + system);
                    break;
                case 'Michigan':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Minnesota':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Missouri':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Mississippi':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Montana':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Nevada':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New Hampshire':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New Jersey':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New Mexico':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New York':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'North Carolina':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Ohio':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Oklahoma':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Oregon':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Pennsylvania':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Rhode Island':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'South Carolina':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Tennessee':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Texas':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Utah':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Vermont':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Virginia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Washington':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'West Virginia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Wisconsin':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Wyoming':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;

            }
        } else if (initValue == 4) {
            switch (fstate) {
                case 'Alabama':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = connradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                    console.log(initValue + " - " + fstate);
                case 'Mississippi':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = connradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                    console.log(initValue + " - " + fstate);
                    // case 'Texas':
                    //   document.getElementById("state").innerHTML = fstate;
                    //   document.getElementById("velocity").innerHTML;
                    //   document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    //   document.getElementById("providers").innerHTML = connradiok;
                    //   $("#velocity").modal();
                    //   //check to see if the default system is checked and show logo
                    //   if($('.chkradio').is(':checked')) { return getLogos(2); }
                    // break;
                    // console.log(initValue + " - " + fstate);
            }
        } else if (initValue == 5) {
            //switch based on state selected
            switch (fstate) {
                case 'Alabama':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    // $("#velocity").modal();
                    // if (initTxt.indexOf('USLI') > -1) {
                    //     //check to see if the default system is checked and show logo
                    //     if ($('.chkradio').is(':checked')) {
                    //         return getLogos(3, initTxt);
                    //     }
                    //     console.log(initValue + " - " + fstate);
                    // } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    //}

                    break;
                case 'Arizona':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'California':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Colorado':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Connecticut':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Delaware':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'District of Columbia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Florida':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Georgia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Hawaii':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Idaho':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Illinois':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Indiana':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Kansas':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Kentucky':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Louisiana':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Maine':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Maryland':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Massachusetts':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Michigan':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Minnesota':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Missouri':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Mississippi':
                    // document.getElementById("state").innerHTML = fstate;
                    // document.getElementById("velocity").innerHTML;
                    // document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    // document.getElementById("providers").innerHTML = connradiok;
                    // $("#velocity").modal();
                    // //check to see if the default system is checked and show logo
                    // if($('.chkradio').is(':checked')) { return getLogos(2); }
                    // console.log(initValue + " - " + fstate);
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    break;
                case 'Montana':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Nevada':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New Hampshire':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New Jersey':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'New York':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'North Carolina':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Ohio':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Oklahoma':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Oregon':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Pennsylvania':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Rhode Island':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'South Carolina':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Tennessee':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Texas':
                    if (initTxt.indexOf("USLI") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Utah':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Vermont':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Virginia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Washington':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'West Virginia':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Wisconsin':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
                case 'Wyoming':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;

            }
        } else if (initValue == 6) {
            switch (fstate) {
                case 'North Carolina':
                    document.getElementById("state").innerHTML = fstate;
                    document.getElementById("velocity").innerHTML;
                    document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                    document.getElementById("providers").innerHTML = ppradiok;
                    $("#velocity").modal();
                    //check to see if the default system is checked and show logo
                    if ($('.chkradio').is(':checked')) {
                        return getLogos(3, initTxt);
                    }
                    console.log(initValue + " - " + fstate);
                    break;
            }
        } else if (initValue == 0) {

        }
    } else if (fstate == 'Caribbean') {
        document.getElementById("state").innerHTML = fstate;
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
        document.getElementById("providers").innerHTML = ppradiok;
        $("#velocity").modal();
        //check to see if the default system is checked and show logo
        if ($('.chkradio').is(':checked')) {
            return getLogos(3, initTxt);
        }
        console.log(initValue + " - " + fstate);
    }

}



//Start Commercial Lines function
function getCLine(initValue, initTxt, linestate) {
    var system = 0;
    var initValue = initValue;
    var fstate = $("#fstate").val();
    //Checked providers
    var ppradiok = "<input type='radio' class='chkradio' name='system' value='3' onchange='getLogos(3);' checked='true' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";
    var connradiok = "<input type='radio' class='chkradio' name='system' value='2' onchange='getLogos(2);' checked='true' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>";
    //var caaradiok = "<i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/><a href='http://demo.netrate.com/scripts/CAALogin.dll' target='_blank' title='Click here to login to CAA'>Login to Coastal Agents Alliance</a>";
    var caaradiok = "<input type='radio' class='chkradio' name='system' value='1' onchange='getLogos(1);' checked='true' /> <i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/>";
    //NONE checked providers
    var ppradio = "<input type='radio' class='chkradio' name='system' value='3' onchange='getLogos(3);' checked='false' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Policy Plus<br/>";
    var connradio = "<input type='radio' class='chkradio' name='system' value='2' onchange='getLogos(2);' checked='false' /> <i class='orc-orchid-logo' aria-hidden='true' style='color:#004eb4;'></i>Orchid Connect<br/>";
    var caaradio = "<input type='radio' class='chkradio' name='system' value='1' onchange='getLogos(1);' checked='false' /> <i class='coast-coastal-logo' aria-hidden='true' style='color:#004eb4;'></i>Coastal Agents Alliance<br/>";
    //Check if state NOT Selected then Loop through list and create options
    if (fstate == 'all' || fstate == null) {
        alert("Error! Please select a state from the properties location list.");
        $('#fstate').focus();
        $('#fstate').css("border", "2px solid #0057b8");
        $('#fstate').css("box-shadow", "0 0 4px #0057b8");
        console.log(initValue + " - " + fstate);

    } else if (fstate != 'all' || fstate != 'Caribbean') {
        if (initValue == 10) {
            switch (fstate) {
                case 'Alabama':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("Wind Deductible Buyback") > -1){
                        window.open("http://orchidinsurance.com/wp-content/themes/orchid-new/assets/pdf/Commercial-Specialty-Perils-WDBB-Dual-Deductible-Buyback-Application-OrchidBrand-v5.pdf", "_blank");
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Delaware':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("Residential Condominium Association") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Personal Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = caaradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(1);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Florida':
                    if (initTxt.indexOf("Wind Deductible Buyback") > -1){
                        window.open("http://orchidinsurance.com/wp-content/themes/orchid-new/assets/pdf/Commercial-Specialty-Perils-WDBB-Dual-Deductible-Buyback-Application-OrchidBrand-v5.pdf", "_blank");
                    } else {
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Louisiana':
                    if (initTxt.indexOf("Wind Deductible Buyback") > -1){
                        window.open("http://orchidinsurance.com/wp-content/themes/orchid-new/assets/pdf/Commercial-Specialty-Perils-WDBB-Dual-Deductible-Buyback-Application-OrchidBrand-v5.pdf", "_blank");
                    } else {
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Mississippi':
                    if (initTxt.indexOf("Wind Deductible Buyback") > -1){
                        window.open("http://orchidinsurance.com/wp-content/themes/orchid-new/assets/pdf/Commercial-Specialty-Perils-WDBB-Dual-Deductible-Buyback-Application-OrchidBrand-v5.pdf", "_blank");
                    } else {
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'New Jersey':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("Residential Condominium Association") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = caaradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(1, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                        console.log(initValue + " - " + fstate);
                    //Check for Wind Deductible Buyback
                    } else if (initTxt.indexOf("Wind Deductible Buyback") > -1){
                        window.open("http://orchidinsurance.com/wp-content/themes/orchid-new/assets/pdf/Commercial-Specialty-Perils-WDBB-Dual-Deductible-Buyback-Application-OrchidBrand-v5.pdf", "_blank");
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'North Carolina':
                    if (initTxt.indexOf("Wind Deductible Buyback") > -1){
                        window.open("http://orchidinsurance.com/wp-content/themes/orchid-new/assets/pdf/Commercial-Specialty-Perils-WDBB-Dual-Deductible-Buyback-Application-OrchidBrand-v5.pdf", "_blank");
                    } else {
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'South Carolina':
                    if (initTxt.indexOf("Wind Deductible Buyback") > -1){
                        window.open("http://orchidinsurance.com/wp-content/themes/orchid-new/assets/pdf/Commercial-Specialty-Perils-WDBB-Dual-Deductible-Buyback-Application-OrchidBrand-v5.pdf", "_blank");
                    } else {
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Texas':
                    if (initTxt.indexOf("Wind Deductible Buyback") > -1){
                        window.open("http://orchidinsurance.com/wp-content/themes/orchid-new/assets/pdf/Commercial-Specialty-Perils-WDBB-Dual-Deductible-Buyback-Application-OrchidBrand-v5.pdf", "_blank");
                    } else {
                    window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
            }
        } else if (initValue == 11) {
            //switch based on state selected
            switch (fstate) {
                case 'Alabama':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Arizona':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'California':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Colorado':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Connecticut':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Delaware':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'District of Columbia':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Florida':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Georgia':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Hawaii':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Idaho':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Illinois':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Indiana':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Kansas':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Kentucky':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Louisiana':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Maine':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Maryland':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Massachusetts':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Michigan':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Minnesota':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Missouri':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Montana':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Nevada':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'New Hampshire':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'New Jersey':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'New Mexico':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'New York':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'North Carolina':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Ohio':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Oklahoma':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Oregon':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Pennsylvania':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Rhode Island':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'South Carolina':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Tennessee':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Texas':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Utah':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Vermont':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Virginia':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Washington':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'West Virginia':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Wisconsin':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;
                case 'Wyoming':
                    //Check for Residental tile selection
                    if (initTxt.indexOf("NFIP Commercial Flood") > -1) {
                        document.getElementById("state").innerHTML = fstate;
                        document.getElementById("velocity").innerHTML;
                        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
                        document.getElementById("providers").innerHTML = ppradiok;
                        $("#velocity").modal();
                        //check to see if the default system is checked and show logo
                        if ($('.chkradio').is(':checked')) {
                            return getLogos(3, initTxt);
                        }
                        console.log(initValue + " - " + fstate);
                    } else {
                        window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
                    }
                    break;

            }
        }
    } else if (fstate == 'Caribbean') {
        document.getElementById("state").innerHTML = fstate;
        document.getElementById("velocity").innerHTML;
        document.getElementById("ModalLabel").innerHTML = "Commercial Line Selected - " + initTxt;
        document.getElementById("providers").innerHTML = ppradiok;
        $("#velocity").modal();
        //check to see if the default system is checked and show logo
        if ($('.chkradio').is(':checked')) {
            return getLogos(3, initTxt);
        }
        console.log(initValue + " - " + fstate);
    }
}
//Default login for existing policies
function defaultLogin(system) {
    if (system == 1) {
        $("#defaultLogin").modal();
        var UserID = $("#usernameA").val();
        var UserPassword = $("#passwordA").val();
        document.getElementById("ForgotPA").innerHTML = "<br/>For help with your <span style='font-weight:bold;'>password</span>, please call 609-277-7809 extension 405 or email us at <a href='mailto:ssati@orchidinsurance.com'>ssati@orchidinsurance.com</a>.";
        document.getElementById("loginImgA").innerHTML = "<img src='http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/caa.png' style='padding:3px;'/><br/><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Coastal Agents Alliance credentials</h5>";
        document.getElementById("chkradioA").innerHTML = "<input type='hidden' class='chkradio' name='system' value='1' checked='true' />";
        document.getElementById("caamsgdivb").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold;'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
        $("#caamsgdivb").show();
        $("#usrA").replaceWith('<p id="demoA"></p><div id="caamsgdivb" class="text-left"></div><p id="loginerrorA" style="color:#a31818;font-weight:bold;"> </p><label for="username">Username:</label><input type="text" class="form-control" id="username" name="UserID" required placeholder="Enter your username" style="font-family: Helvetica, Arial, sans-serif !important;"/>');
        $("#pwdA").replaceWith('<label for="password">Password:</label><input type="password" class="form-control" id="password" name="UserPassword" required placeholder="Enter your password" style="font-family: Helvetica, Arial, sans-serif !important;"/>');
        //Set the form Action
        document.getElementById("modalformA").action = "http://demo.netrate.com/scripts/CAALogin.dll";

    } else if (system == 2) {
        $("#defaultLogin").modal();
        document.getElementById("loginImgA").innerHTML = "<img src='http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/o-connect.png' style='padding:3px;' /><br/><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Connect credentials</h5>";
        document.getElementById("ForgotPA").innerHTML = "[<a href='https://connect.orchidinsurance.com/ForgottenPassword.aspx'  target='_blank'>Forgot Password</a>]";
        document.getElementById("chkradioA").innerHTML = "<input type='hidden' class='chkradio' name='system' value='2' checked='true' />";
        $("#caamsgdivb").hide();

    } else if (system == 3) {
        $("#defaultLogin").modal();
        document.getElementById("loginImgA").innerHTML = "<img src='http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/o-velocity.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
        document.getElementById("ForgotPA").innerHTML = "[<a href='http://polplus2.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
        document.getElementById("chkradioA").innerHTML = "<input type='hidden' class='chkradio' name='system' value='3' checked='true' />";
        $("#caamsgdivb").hide();

        $("#usrA").replaceWith('<p id="demoA"></p><div id="caamsgdivb" class="text-left"></div><p id="loginerrorA" style="color:#a31818;font-weight:bold;"> </p><label for="usernameA">Username:</label><input type="text" class="form-control" id="username" name="username" required placeholder="Enter your username" style="font-family: Helvetica, Arial, sans-serif !important;"/>');
        $("#pwdA").replaceWith('<label for="passwordA">Password:</label><input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password" style="font-family: Helvetica, Arial, sans-serif !important;"/>');
        document.getElementById("modalformA").action = "https://velocity.orchidinsurance.com/";

        $("#Velocity").on('hidden.bs.modal', function() {
            $(this).data('bs.modal', null);
        });
        console.log('#modalformA');
        console.log("Yes setTimeout was triggered with a value of 2");

    }
    console.log(system);
}
//Get login header logo
var combined = "<input type='radio' class='chkradio' name='system' value='3' onchange='getLogos(3);' /> Policy Plus<br/><input type='radio' id='system' class='chkradio' name='system' value='1' onchange='getLogos(1);' checked='true' /> Coastal Agents Alliance<br/>";

function getLogos(system, initTxt) {
    //Check which system(Provider) was selected and display logo
    if (system == 1) {
        $("#usr").show();
        $("#pwd").show();
        document.getElementById("uslitxt").innerHTML = "";
        document.getElementById("ForgotP").innerHTML = "<br/>For help with your <span style='font-weight:bold;'>password</span>, please call 609-277-7809 extension 405 or email us at <a href='mailto:ssati@orchidinsurance.com'>ssati@orchidinsurance.com</a>.";
        document.getElementById("loginImg").innerHTML = "<img src='http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/caa.png' style='padding:3px;'/><br/><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Coastal Agents Alliance credentials</h5>";
        document.getElementById("chkradio").innerHTML = "<input type='hidden' class='chkradio' name='system' value='1' checked='true' />";
        document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
        $("#caamsgdiva").show();
        $("#usr").replaceWith('<p id="demo"></p><div id="caamsgdiva" class="text-left"></div><p id="loginerror" style="color:#a31818;font-weight:bold;"> </p><label for="username">Username:</label><input type="text" class="form-control" id="username" name="username" required placeholder="Enter your username" style="font-family: Helvetica, Arial, sans-serif !important;"/>');
        $("#pwd").replaceWith('<label for="password">Password:</label><input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password" style="font-family: Helvetica, Arial, sans-serif !important;"/>');
        //Switch for IE11 Bug fix
        switch(fstate) {
            case "Connecticut":
                document.getElementById("providers").innerHTML = combined;
                document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
                $("#caamsgdiva").show();
            break;
            case "Delaware":
                document.getElementById("providers").innerHTML = combined;
                document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
                $("#caamsgdiva").show();
            break;
            case "Maryland":
                document.getElementById("providers").innerHTML = combined;
                document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
                $("#caamsgdiva").show();
            break;
            case "Massachusetts":
                document.getElementById("providers").innerHTML = combined;
                document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
                $("#caamsgdiva").show();
            break;
            case "New York":
                document.getElementById("providers").innerHTML = combined;
                document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
                $("#caamsgdiva").show();
            break;
            case "New Jersey":
                document.getElementById("providers").innerHTML = combined;
                document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
                $("#caamsgdiva").show();
            break;
            case "Rhode Island":
                document.getElementById("providers").innerHTML = combined;
                document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
                $("#caamsgdiva").show();
            break;
            case "Virginia":
                document.getElementById("providers").innerHTML = combined;
                document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
                $("#caamsgdiva").show();
            break;
            default:
                document.getElementById("caamsgdiva").innerHTML = "<div style='font-size:0.8em; text-align:left; margin-top:5px;padding:3px 5px 5px 5px;border:1px solid #cccccc;'><span style='font-weight:bold'>IMPORTANT UPDATES for 2018</span><br/> ICAT (Lloyds 4242) has reduced their new business rate in Suffolk County NY, and most coastal counties in NJ.<br/> Also, a “Choose Limits” option for NY QBE policies is now available.</div>";
                $("#caamsgdiva").show();
            break;
        }
        //Set the form Action
        document.getElementById("modalform").action = "http://demo.netrate.com/scripts/CAALogin.dll";
        console.log("Coastal Agents Alliance");

    } else if (system == 2) {
        $("#caamsgdiva").hide();
        document.getElementById("uslitxt").innerHTML = "";
        document.getElementById("loginImg").innerHTML = "<img src='http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/o-connect.png' style='padding:3px;' /><br/><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Connect credentials</h5>";
        document.getElementById("ForgotP").innerHTML = "[<a href='https://connect.orchidinsurance.com/ForgottenPassword.aspx'  target='_blank'>Forgot Password</a>]";
        // $("#usr").hide();
        // $("#pwd").hide();
        // window.open("https://orchid.imp.conf.oceanwidebridge.com", "_blank");
        //Check for Residential tile selection
        // if (initTxt.indexOf("Residential Condominium Association") > -1){
        //     document.getElementById("usr").innerHTML = "<a href='https://orchid.imp.conf.oceanwidebridge.com' target='_blank' style='font-weight:bold;'>Click here for Orchid Connect</a>";
        //     document.getElementById("pwd").innerHTML = "";
        //     console.log(system);
        // } else {
        document.getElementById("chkradio").innerHTML = "<input type='hidden' class='chkradio' name='system' value='2' checked='true' />";
        //     console.log(system);
        // }
        console.log(initTxt);
    } else if (system == 3) {
        var uslitext = "<span style='color:#676a6b;font-weight:600;width:auto;padding-left:8px;'>Call 888-845-1725 for an instant quote!</span>";
        $("#usr").show();
        $("#pwd").show();
        document.getElementById("uslitxt").innerHTML = "";
        $("#caamsgdiva").hide();
        document.getElementById("loginImg").innerHTML = "<img src='http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/o-velocity.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
        document.getElementById("ForgotP").innerHTML = "[<a href='http://polplus2.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
        document.getElementById("chkradio").innerHTML = "<input type='hidden' class='chkradio' name='system' value='3' checked='true' />";
        $("#usr").replaceWith('<p id="demo"></p><div id="caamsgdiva" class="text-left"></div><p id="loginerror" style="color:#a31818;font-weight:bold;"> </p><label for="username">Username:</label><input type="text" class="form-control" id="username" name="username" required placeholder="Enter your username" style="font-family: Helvetica, Arial, sans-serif !important;"/>');
        $("#pwd").replaceWith('<label for="password">Password:</label><input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password" style="font-family: Helvetica, Arial, sans-serif !important;"/>');
        document.getElementById("modalform").action = "http://polplus2.orchidinsurance.com/";
        // $("#defaultLogin").on('hidden.bs.modal', function() {
        //     $(this).data('bs.modal', null);
        // });

          //Check for USLI tile
          switch(initTxt){
            case "USLI 1-4 Dwelling":
                document.getElementById("uslitxt").innerHTML = uslitext;
            break;
            case "USLI Personal Lines Umbrella":
                document.getElementById("uslitxt").innerHTML = uslitext;
            break;
            case "USLI Primary CPL":
                document.getElementById("uslitxt").innerHTML = uslitext;
            break;
            case "USLI Special Events":
                document.getElementById("uslitxt").innerHTML = uslitext;
            break;
            default:
                document.getElementById("uslitxt").innerHTML = "";
            break;
          }
        console.log("Policyplus");

    } else if (system == 4) {
        document.getElementById("loginImg").innerHTML = "<img src='http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/o-hnw.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
        document.getElementById("ForgotP").innerHTML = "[<a href='http://polplus2.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
        console.log("High Net Worth");

    } else if (system == 5) {
        document.getElementById("loginImg").innerHTML = "<img src='http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/o-hnw.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
        document.getElementById("ForgotP").innerHTML = "[<a href='http://polplus2.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
        console.log("High Net Worth");

    } else if (system == 6) {
        document.getElementById("loginImg").innerHTML = "<img src='http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/o-velocity.png' style='padding:3px;' /><br><br><h5 class='modal-title' style='text-align:center;'>Please log in with your Policyplus credentials</h5>";
        document.getElementById("ForgotP").innerHTML = "[<a href='http://polplus2.orchidinsurance.com/policyplus/RetrievePassword'  target='_blank'>Forgot Password</a>]";
        console.log("Policyplus");

    } else {
        $("#ForgotP").hide();
        $("#caamsgdiva").hide();

    }

}
