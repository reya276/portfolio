$(document).ready(function(){
    //Get footprint info via ajax
    var fstate = $("#fstate").data("postid");
    function showHover(fstate) {
        if (fstate.length == 0) {
            document.getElementByClassName("footprintinfo").innerHTML = "";
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
    }

});
