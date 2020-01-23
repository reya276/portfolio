<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _mbbasetheme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/base.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/bootstrap-tour.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/base.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/jquery.mobile.custom.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/jquery_cookie.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/getmodals_a.js?v=1.1.7"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/bootstrap-tour.js"></script>

<link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://orchidinsurance.com/favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://orchidinsurance.com/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://orchidinsurance.com/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://orchidinsurance.com/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="http://orchidinsurance.com/favicon/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="http://orchidinsurance.com/favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="http://orchidinsurance.com/favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="http://orchidinsurance.com/favicon/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="http://orchidinsurance.com/favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="http://orchidinsurance.com/favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="http://orchidinsurance.com/favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="http://orchidinsurance.com/favicon/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="http://orchidinsurance.com/favicon/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="http://orchidinsurance.com/favicon/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="http://orchidinsurance.com/favicon/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="http://orchidinsurance.com/favicon/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="http://orchidinsurance.com/favicon/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="http://orchidinsurance.com/favicon/mstile-310x310.png" />
<!-- For IE6+ -->
<link rel="shortcut icon" href="http://orchidinsurance.com/favicon/favicon.ico" type="image/vnd.microsoft.icon">
	
    <script>
    	//Check to see if localstorage is supported
    	function storageAvailable(type) {
        try {
            var storage = window[type],
                x = '__storage_test__';
            storage.setItem(x, x);
            storage.removeItem(x);
            return true;
          }
        catch(e) {
            return e instanceof DOMException && (
                // everything except Firefox
                e.code === 22 ||
                // Firefox
                e.code === 1014 ||
                // test name field too, because code might not be present
                // everything except Firefox
                e.name === 'QuotaExceededError' ||
                // Firefox
                e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
                // acknowledge QuotaExceededError only if there's something already stored
                storage.length !== 0;
           }
    	}
	//Check state selected and send to state landing page
    	function gotoURL(){
      	  var location = document.getElementById('footloc').value;
      	  if (location != '' || location != null){
            window.open("http://orchidinsurance.com/footprint/" + location, '_blank');
            console.log(location);
          } else {
            window.open("http://orchidinsurance.com/footprint", '_blank');
          }
        }
     
    </script>
<script>
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
	$("#feedbackbt").click(function (){
		$(".overlay").show();
	});
</script>
<script>
// Instance the tour
    var dashtour = new Tour({
      name: "dashtour",
      steps: [{
        element: "#newbiztour",
        title: "New Business Quotes",
        content: "Start a new business quote.",
        placement: 'bottom'
      },
	    {
        element: "#exbiztour",
        title: "Existing Policies",
        content: "View your existing policies.",
        placement: 'bottom'
      },
        {
        element: "#personal",
        title: "Personal Lines",
        content: "Our Personal Lines products.",
        placement: 'right'
      },
      {
        element: "#commercial",
        title: "Commercial Lines",
        content: "Our Commercial Lines products.",
        placement: 'right'
      },

      {
        element: "#announcements",
        title: "Announcements",
        content: "View our important announcements/news.",
        placement: 'bottom'
      },
      {
        element: "#contactorchid",
        title: "Contact Us",
        content: "Contact us if you have any questions.",
        placement: 'bottom'
      }
      ],
      container: "body",
      smartPlacement: false,
      keyboard: true,
      storage: window.localStorage,
      debug: true,
      backdrop: true,
      backdropContainer: 'body',
      backdropPadding: 5,
      redirect: true,
      orphan: false,
      duration: false,
      delay: false,
      basePath: "",
      template: "<div class='popover tour'><div class='arrow'><span class='pulse'><span class='dot'></span></span></div><h3 class='popover-title'></h3><div class='popover-content'></div><div class='popover-navigation'><button class='btn btn-default' data-role='prev'>« Prev</button><span data-role='separator'>|</span><button class='btn btn-default' data-role='next'>Next »</button></div><button class='btn btn-default' data-role='end'>End tour</button></div>",
      afterGetState: function (key, value) {},
      afterSetState: function (key, value) {},
      afterRemoveState: function (key, value) {},
      onStart: function (tour) {},
      onEnd: function (tour) {
        window.localStorage.setItem("tour_end", "true");
      },
      onShow: function (tour) {},
      onShown: function (tour) {},
      onHide: function (tour) {},
      onHidden: function (tour) {},
      onNext: function (tour) {},
      onPrev: function (tour) {},
      onPause: function (tour, duration) {},
      onResume: function (tour, duration) {},
      onRedirectError: function (tour) {}
    });
    // Initialize the tour
    dashtour.init();
    //Create tour_end var
    var tour_end = window.localStorage.getItem("tour_end");
    //Create date and time var
    var now = new Date();
    var hours = now.getHours();
    function showTour(){
      //Check what time is it, then create vars (isNight, isMorning, isAfternoon)
      if (hours >= 18){
          var isNight = "Good Evening Agent";
          $("#greetings").text(isNight);
          console.log(isNight);
      } else if (hours >= 13){
          var isAfternoon = "Good Afternoon Agent";
          $("#greetings").text(isAfternoon);
          console.log(isAfternoon);
      } else if (hours >= 0){
          var isMorning = "Good Morning Agent";
          $("#greetings").text(isMorning);
          console.log(isMorning);
      }
      //Check if localStorage is filled
      if ( tour_end == 'true'){
        console.log("Do not show tour modal!");
      }else{
        $("#agenttour").modal();
      }

    }
    function startTour(){
      // Start the tour
      dashtour.start();
      $("#agenttour").modal('toggle');
    }
    console.log(dashtour);
    function skiptit(){
        window.localStorage.setItem("tour_end", "true");
        $("#agenttour").modal('toggle');
    }
</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> onload="defaultCookie();">
	<!--[if lt IE 9]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<header style="">
	<nav class="navbar navbar-main">
        <div class="container large">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="sr-menu">Menu</span>
                </button>
                <a class="main-logo" href="<?php echo site_url(); ?>">Orchid</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <div class="hidden-xs">
                    <!--<a href="https://velocity.orchidinsurance.com/policyplus/" target="_blank" class="btn btn-primary btn-sm agent">Agent Login</a>-->
<ul class="top-links">
    <div id="navbar" class="collapse navbar-collapse">
        <ul id="menu-header-top" class="top-links">
		<?php if (is_page('4573')) { ?>
			<li></li>
		<?php } else { ?>
            <li id="menu-item-1465" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1465 dropdown"><a href="http://orchidinsurance.com/agentlogin/agency-dashboard/" onclick="__gaTracker('send', 'event', 'outbound-widget', 'http://orchidinsurance.com/agentlogin/agency-dashboard/', 'Agent Login');"><span title="Agent Login" style="color:#FFFFFF;" data-toggle="dropdown" class="btn btn-primary btn-sm agent" aria-haspopup="true">Agent Login</span></a>
            </li>
		<?php } ?>
        </ul>
    </div>
</ul>
                    <ul class="top-links">
											<?php
											wp_nav_menu( array(
													'menu'              => 'top',
													'theme_location'    => 'top',
													'depth'             => 2,
													'container'         => 'div',
													'container_class'   => 'collapse navbar-collapse',
													'container_id'      => 'navbar',
													'menu_class'        => 'top-links',
													'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
													'walker'            => new wp_bootstrap_navwalker())
											);
									?>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right hidden-xs">
									<?php
											wp_nav_menu( array(
													'menu'              => 'primary',
													'theme_location'    => 'primary',
													'depth'             => 2,
													'container'         => 'div',
													'container_class'   => 'collapse navbar-collapse',
													'container_id'      => 'navbar',
													'menu_class'        => 'nav navbar-nav navbar-right',
													'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
													'walker'            => new wp_bootstrap_navwalker())
											);
									?>
                </ul>
                <ul class="nav navbar-nav visible-xs">
                    <?php
											wp_nav_menu( array(
													'menu'              => 'top-primary-visible-xs',
													'theme_location'    => 'top-primary-visible-xs',
													'depth'             => 2,
													'container'         => 'div',
													'container_class'   => 'div',
													'container_id'      => 'navbar',
													'menu_class'        => 'nav navbar-nav navbar-right',
													'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
													'walker'            => new wp_bootstrap_navwalker())
											);
									?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<style>.main-content {padding: 104px 0;} header {padding: 12px 0px 0px 0px} .harvey:hover {color: #6f2020 !important;}</style>
			<!-- End Header. Begin Template Content -->
