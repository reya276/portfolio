<?php
$imglogo = $_SERVER['SCRIPT_URI'];
$pagename = "Open Source";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $pagename; ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
        function sendContact() {
            var name = document.forms["sendMail"]["name"].value;
            var email = document.forms["sendMail"]["email"].value;
            var comments = document.forms["sendMail"]["comments"].value;
            var msg = "Please enter your name, email and a comment."
            if (name == "" && email == "" && comments == "") {
                document.getElementById("error").innerHTML = msg;
                return false;
            } else {
                document.sendMail.action = "index.php#contact";
                document.sendMail.submit();
            }
        }
    </script>
    <script>
        //$( document).ready(function(){
        //$( "#sendBT" ).click(function(){
         // $( "#name").focus();
            //console.log( "Handler for .focus() called." );
        //});
    //});
    </script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#isOther').change(function() {
            $("#other").prop("disabled", !$(this).is(':checked'));
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });

        $(window).scroll(function() {
            $(".slideanim").each(function() {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>
</body>

</html>
