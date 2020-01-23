$(document).ready(function(){
    //Hide Announcements row
    $("#showannoun").hide();

    //Start Ajax call using get
    if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              var annountxt = this.responseText;
              console.log(annountxt);
              $("#showannoun").show();
              document.getElementById("showannoun").innerHTML = annountxt;
          }
      }
      xmlhttp.open("GET", "http://74.117.185.189/wp-snapshots/wp-content/themes/orchid-new/page-templates/announcements.php", true);
      xmlhttp.send();
      //End Ajax call
});
