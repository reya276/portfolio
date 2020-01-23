//Create the states list(Array)
//var states = ["Alabama, Alaska, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas,Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming"];
$(document).ready(function(){

  $( "#fstate" ).change(function() {
    var selectedEventType = this.options[this.selectedIndex].value;
      //Personal Lines Filter
      if (selectedEventType == "all") {
        $('.rowP .filterrowP').removeClass('hidden');
      } else {
        $('.rowP .filterrowP').addClass('hidden');
        $('.rowP .filterrowP[data-state*="' + selectedEventType + '"]').removeClass('hidden');
      }
      //Commercial Lines Filter
      if (selectedEventType == "all") {
        $('.rowC .filterrowC').removeClass('hidden');
      } else {
        $('.rowC .filterrowC').addClass('hidden');
        $('.rowC .filterrowC[data-state*="' + selectedEventType + '"]').removeClass('hidden');
      }
      //Get footprint info via ajax
      setTimeout(function () {
          var fstate = $("#fstate").data("postid");
          //console.log(fstate);
              if (fstate.length == 0) {
                  document.getElementByClassName("footprintinfo").innerHTML = "Sorry no data!";
                  return;
              } else {
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          document.getElementByClassName("footprintinfo").innerHTML = this.responseText;
                          console.log(this.responseText);
                      }
                  };
                  xmlhttp.open("GET", "wp-content/themes/orchid-new/page-templates/popover.php?post_id=" + fstate, true);
                  xmlhttp.send();

              }
      }, 200);
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
//Set cookie to "all"
function defaultCookie(){
    var linestate = "Alabama, Alaska, Arizona, California, Colorado, Connecticut, Delaware, District of Columbia, Florida, Georgia, Hawaii, Idaho, Illinois, Indiana, Kansas, Kentucky, Louisiana, Maine, Maryland, Massachusetts, Michigan, Minnesota, Mississippi, Missouri, Montana, Nevada, New Hampshire, New Jersey, New York, North Carolina, Ohio, Oklahoma, Oregon, Pennsylvania, Rhode Island, South Carolina, Tennessee, Texas,Utah, Vermont, Virginia, Washington, West Virginia, Wisconsin, Wyoming";
    var states = linestate.split(',');
    if (document.cookie.indexOf('OrchidDash') > -1 ){
        if ($.cookie('OrchidDash') == states.indexOf(fstate) > -1 || $.cookie('OrchidDash') != "all"){
            // $('#locdefault').click(function() {
            //      var fstate = $("#fstate").val();
            //     $.cookie("OrchidDash", fstate);
            // });
            $("#fstate").val($.cookie('OrchidDash'));
            var selectedEventType = $.cookie('OrchidDash');
            //Apply filter for chosen location
                //personal lines
            $('.rowP .filterrowP').addClass('hidden');
            $('.rowP .filterrowP[data-state*="' + selectedEventType + '"]').removeClass('hidden');
                //commercial lines
            $('.rowC .filterrowC').addClass('hidden');
            $('.rowC .filterrowC[data-state*="' + selectedEventType + '"]').removeClass('hidden');
        }
    } else {
        var cname = "OrchidDash";
        var cvalue = "all";
        var exdays = 365;
        document.cookie = cname + "=" + cvalue + ";" + exdays + ";path=/";
        $("#fstate").val($.cookie('OrchidDash'));
    }
    console.log(document.cookie);

}
//Get the cookie
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
//For Feedback tab
$(function() {
	$("#feedback-tab").click(function() {
		$("#feedback-form").toggle("slide");
	});

	$("#feedback-form form").on('submit', function(event) {
		var $form = $(this);
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			data: $form.serialize(),
			success: function() {
				$("#feedback-form").toggle("slide").find("textarea").val('');
			}
		});
		event.preventDefault();
	});
});


// //Set the tour completed cookie
// function setTourCookie(){
//   var tour = 0;
//   if (tour == 0){
//     document.cookie = "name=Tour";
//     document.cookie = "tour=1";
//   }
// }
