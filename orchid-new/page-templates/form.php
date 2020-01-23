<?php
/**
 * Template Name: Appointed Form
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<style>
	header {display: none;}
	.ologo {height: 65px;padding-top: 1px; padding-bottom: 1px;}
	.navbar-brand {padding: 0px !important;}
	.navbar-nav>li>a {padding-top: 25px !important;padding-bottom: 25px !important; text-decoration: none;}
	.navbar-nav>li {border-left: 1px solid #e7e7e7;
    float: left;
    min-width: 156px;
    text-align: center;
}
	body {padding-top: 2px !important}
</style>
<script type="text/javascript">
	var hashParams = hash.substr(1).split('&'); // substr(1) to remove the #
for(var i = 0; i < hashParams.length; i++){
    var p = hashParams[i].split('=');
    document.getElementById(p[0]).value = decodeURIComponent(p[1]);
}
	</script>
<div style="background-color: white;"><div class="container"><img class="ologo" src="http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/logo.png"></div></div>
<nav class="navbar navbar-default navbar-static-top" style="background-color: #f4f5f9; margin-bottom: 0px;">
	

      <div class="container">
        <div class="container">
        <div class="row">
    <div class="col-md-2 col-md-offset-1">1</div>
    <div class="col-md-2">2</div>
    <div class="col-md-2">3</div>
    <div class="col-md-2">4</div>
    <div class="col-md-2">5</div>
</div>
      </div>
      </div>
    </nav>
   <section class="main-content">
   <script type="text/javascript" src="https://orchidinsurance.formstack.com/forms/js.php/get_appointed_approved"></script><noscript><a href="https://orchidinsurance.formstack.com/forms/get_appointed_approved" title="Online Form">Online Form - Get Appointed - Approved</a></noscript> 
   </section>
   
   
<section class="header-pages home">
    <div class="video-holder">
        <video class="hidden-xs hidden-sm" loop autoplay poster="<?php echo get_stylesheet_directory_uri();?>/assets/video/video3.jpg" id="backgroundvid">
            <source src="<?php echo get_stylesheet_directory_uri();?>/assets/video/video4.webm" type='video/webm; codecs="vp8.0, vorbis"'>
            <source src="<?php echo get_stylesheet_directory_uri();?>/assets/video/video4.ogv" type='video/ogg; codecs="theora, vorbis"'>
            <source src="<?php echo get_stylesheet_directory_uri();?>/assets/video/video4.mp4" type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"'>
            <p>Fallback content to cover incompatibility issues</p>
        </video>
    </div>
</section>





<section class="index-main-content">
	<div class="container normal">
        <h1 class="text-center index-text"><?php the_field('welcome_text'); ?></h1>
        <p class="text-center under-title"><?php the_field('welcome_text_subtile'); ?></p>
        <ul class="products-list1 mb0">
            <li><a href="<?php echo get_page_link(21); ?>">Personal Lines</a></li>
            <li><a href="<?php echo get_page_link(23); ?>">Commercial Lines</a></li>
            <li><a href="<?php echo get_page_link(25); ?>">Specialty High Net Worth</a></li>
            <li><a href="<?php echo get_page_link(27); ?>">Yacht Coverage</a></li>
        </ul>
    </div>
</section>


<section class="main-content first style1">
    <div class="container normal">
        <div class="widget5">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                    <div class="thumb-img"><img src="<?php the_field('products_image'); ?>" class="img-responsive"></div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="widget-content clearfix">
                        <h4 class="text-center">Products</h4>
                        <p><?php the_field('products_text'); ?></p>
                        <p class="text-center more"><a href="<?php echo get_page_link(8); ?>" class="btn btn-primary btn-lg">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main-content second style1">
    <div class="container normal">
        <div class="widget5">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-sm-push-5 col-md-7 col-md-push-5 col-lg-7 col-lg-push-5">
                    <div class="thumb-img"><img src="<?php the_field('agent_image'); ?>" class="img-responsive"></div>
                </div>
                <div class="col-xs-12 col-sm-5 col-sm-pull-7 col-md-5 col-md-pull-7 col-lg-5 col-lg-pull-7">
                    <div class="widget-content clearfix">
                        <h4 class="text-center">Become an Agent</h4>
                        <p><?php the_field('agent_text'); ?></p>
                        <p class="text-center more"><a href="<?php echo get_page_link(10); ?>" class="btn btn-primary btn-lg">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="main-content shadow style1">
    <div class="container normal">
        <div class="widget5">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                    <div class="thumb-img"><img src="<?php the_field('about_image'); ?>" class="img-responsive"></div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="widget-content clearfix">
                        <h4 class="text-center">About Us</h4>
                        <p><?php the_field('about_text'); ?></p>
                        <p class="text-center more"><a href="<?php echo get_page_link(88); ?>" class="btn btn-primary btn-lg">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php get_footer(); ?>
