<?php
$imglogo = $_SERVER['SCRIPT_URI'];
$pagename = "Home";
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
    <div class="container-fluid">
        <!-- Navigation -->
        <?php include 'inc/nav.php'; ?>
    </div>
    <div class="container-fluid">
        <!-- Start Jumbotron -->
        <div class="jumbotron text-center bgimg">
            <div class="logodiv">
                <div id="logo"><i class="logo-stellar1" style="font-size:150px; color:#7974ab;" aria-hidden="true"></i></div>
                <h1 class="text-center">Stellar Networks</h1>
                <p class="logotxt">Affordable Information Technology Solutions</p>
            </div>
            <!-- Post-it image div -->
            <div id="postit">
                <div class="content">
                    <!-- Carousel -->
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="..." alt="First slide">
                                <p>Test content</p>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="..." alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="..." alt="Third slide">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Line divider div -->
        <div id="linediv"></div>
        <!-- home page content -->
        <div id="oss">
            <div class="ossimg-a">
            </div>
                <div class="oss-a">
                    <div class="txtcontainer">
                        <h2 class="h-special-a">What is open source software?</h2>
                        <p>Open source software (OSS) is computer code that is freely distributed under several licenses such as the GPL (General Public License) version 2 & 3 or copyleft.
                            There are also other licenses which provide which provide a non copyleft license.
                        </p>
                        <p>This means that software developers can create software applications for any operating system and freely distribute the code so that it can be use and modified by the public according to their needs.
                            Software under the GPL v2 or v3 usually do not come with a price tag; however some developers opt to charge for a service that may be tied to the software.<br/>
                            <a href="open_source.php" title="See more details">See more details</a>
                        </p>
                    </div>
                </div>
            <div class="ossimg-b">
            </div>
            <div class="oss-b">
                <div class="txtcontainer">
                    <h2 class="h-special-b">What is closed source software?</h2>
                    <p class="p-special">Closed source software is proprietary software that is distributed under a licensing agreement for authorized users.
                        These licensing agreements can contain several clauses and restrictions imposed by the software developer or distributing company such as modifying the code, copying,
                        republishing and redistribution.
                    </p>
                </div>
            </div>
        </div>
    </div>

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
