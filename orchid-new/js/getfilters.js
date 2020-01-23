//Create the states list(Array)
//var states = ["Alabama, Alaska, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas,Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming"];
$(document).ready(function(){
$('#showfootprint').hide();
$('.footprintinfo').hide();
  $( "#fstate" ).change(function() {
    var selectedEventType = this.options[this.selectedIndex].value;
    //var cCount = $(".rowC .hidden").length;
    //var pCount = $(".rowP .hidden").length;

    //$('#fstate').popover('destroy');
      //Personal Lines Filter
      if (selectedEventType == "all") {
        $('.rowP .filterrowP').removeClass('hidden');
        var pCount = $(".rowP .hidden").length;
      } else {
        $('.rowP .filterrowP').addClass('hidden');
        $('.rowP .filterrowP[data-state*="' + selectedEventType + '"]').removeClass('hidden');
        var pCount = $(".rowP .hidden").length;
      }
      //Commercial Lines Filter
      if (selectedEventType == "all") {
        $('.rowC .filterrowC').removeClass('hidden');
        var cCount = $(".rowC .hidden").length;
      } else {
        $('.rowC .filterrowC').addClass('hidden');
        $('.rowC .filterrowC[data-state*="' + selectedEventType + '"]').removeClass('hidden');
        var cCount = $(".rowC .hidden").length;
        if (cCount == 16){
          document.getElementById("messageC").innerHTML = "There are no commercial product lines available in this state";
          $('#messageC').show();
        } else {
          document.getElementById("messageC").innerHTML = "";
          $('#messageC').hide();
        }
      }
      var selectedstate = this.options[this.selectedIndex].value;
      var postid = $(this).find(':selected').attr('data-postid');
      var popovertxt = "";
      //Start Ajax Call using GET
      if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            var popovertxt = this.responseText;
            //document.getElementByClassName("footprintinfo").innerHTML = this.responseText;
            console.log(popovertxt);
            $('.footprintinfo').popover('destroy');
            setTimeout(function () {
            $('.footprintinfo').popover(
              {
                html: true,
                animation: true,
                trigger: "hover",
                title: selectedstate,
                content: popovertxt,
                placement: "auto"
              }
            );
            }, 200);
            $('#showfootprint').show();
            $('.footprintinfo').show();
            document.getElementById("showfootprint").innerHTML = '<div class="footprintinfo" style="background:#f4f4f4;position:absolute;z-index:2147483647;cursor:pointer;font-weight:bold;padding:8px;">'+'Orchid Footprint for '+selectedstate+' <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i></div>';
        }
      };
      xmlhttp.open("GET","http://74.117.185.189/wp-snapshots/wp-content/themes/orchid-new/popover.php?post_id="+postid,true);
      xmlhttp.send();
      //End Ajax call
      console.log(selectedstate + "- PostID:" +postid);

      console.log(selectedstate + "- PostID:" +postid);
      console.log('C ='+cCount + 'P = '+pCount);
  });
});

// if (storageAvailable('localStorage')){
//   console.log("Local Storage is supported by your web browser.");
// } else {
//   console.log("Local Storage is NOT supported by your web browser");
// }
function setCookies(){
  var cname = "OrchidDash";
  var cvalue = $("#fstate").val();
  var exdays = 365;
  document.cookie = cname + "=" + cvalue + ";" + exdays + ";path=/";
  console.log(document.cookie);

}
// //set the default location cookie
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + ";" + cvalue + ";" + expires + ";path=/";
    console.log(document.cookie);
}

function getCookie(cname) {
    var name = cname + "=";
    var cvalue = fstate;
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {

    var name=getCookie(name);
    if (locdefault != "") {
        //alert("Your default location is " + locdefault);
        console.log(document.cookie + ";path=/");
    } else {
       name = alert("Please select your property location:","");
       $("#fstate").focus();
       if (name != "" && name != null) {
           setCookies("OrchidDash", fstate, 365);
           console.log(name + ";path=/");
       }
    }
}
// //Set the tour completed cookie
// function setTourCookie(){
//   var tour = 0;
//   if (tour == 0){
//     document.cookie = "name=Tour";
//     document.cookie = "tour=1";
//   }
// }
