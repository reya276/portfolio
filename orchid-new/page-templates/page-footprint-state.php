<?php
/*
Template Name: Footprint State */
?>

<?php get_header(); ?>

 <section class="header-pages">
     <div class="image-holder" <?php if( get_field('page_header_image') ): ?> style="background-image:url('<?php the_field('page_header_image'); ?>')" <?php endif; ?>>
         <div class="container normal">
             <div class="text-holder">
                 <?php the_title( '<h1>', '</h1>' ); ?>
             </div>
         </div>
     </div>
 </section>
<!--Start Custom CSS -->
<style type="text/css">
.foot-pdf img {
    width: 198px;
    padding-bottom: 26px;
}
.maybe-here {display: none;}
.panel-group.style1 .panel-heading {padding: 0px !Important;} .panel-group.style1 .panel-body{background: white !important;} 
.carrier-tab ul {list-style: none; padding-left: 0px;}
.carrier-tab li {text-align: center; font-size: 13px; text-transform: uppercase;border-bottom: 1px solid #d8d8d8; padding-top: 6px; padding-bottom: 4px;} .carrier-tab h2 {font-size: 15px;
    text-align: center;
    margin-bottom: 0px !Important;
    text-transform: uppercase;
    border-bottom: 1px solid;
    margin: 0px 15px; padding-bottom: 5px;}  </style>
<!--End Custom CSS -->
 <section class="main-content pb30">
 	<div class="container normal">
    <div class="row">
    <!--Start Left State Panel -->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div style="padding: 12px; text-align: center;">
<img src="<?php the_field('state_image'); ?>" style="width: 80%">
</div>

</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="text-align: right; padding-top: 20px;">
Last Updated: <?php the_field('last_updated_date'); ?><br>
<a href="http://orchidinsurance.com/footprint" style="margin-top: 10px;" class="btn btn-primary btn-sm agent">Return to Map</a>
</div>
</div>
<h2>Quick Facts</h2>
<div aria-multiselectable="true" role="tablist" id="yacht-accordion" class="panel-group style1 mb0">
<div class="panel panel-default">
<div id="heading2" role="tab" class="panel-heading">
<h4 class="panel-title"><a aria-controls="collapse2" aria-expanded="true" href="#collapse12" data-parent="#yacht-accordion" data-toggle="collapse" role="button"><i class="fa fa-angle-down"></i> <span class="color-black">E&amp;S PERSONAL LINES</span></a></h4>
<p></p></div>
<div aria-labelledby="heading2" role="tabpanel" class="panel-collapse collapse" id="collapse12">
<div class="panel-body">
<div>
<h2 style="font-size: 18px; color: black;"><?php the_field('personal_lines1'); ?></h2>
<?php the_field('personal_lines2'); ?>
<p><a href="http://orchidinsurance.com/products/personal-lines/" style="margin-top: 10px;" class="btn btn-primary btn-sm agent">Personal Lines Page</a>
</p></div>
<p></p></div>
<p></p></div>
<p></p></div>
<p></p></div>
<div aria-multiselectable="true" role="tablist" id="forms-accordion" class="panel-group style1 mb0">
<div class="panel panel-default">
<div id="heading3" role="tab" class="panel-heading">
<h4 class="panel-title"><a aria-controls="collapse3" aria-expanded="true" href="#collapse3" data-parent="#forms-accordion" data-toggle="collapse" role="button"><i class="fa fa-angle-down"></i> <span class="color-black">COMMERCIAL LINES</span></a></h4>
<p></p></div>
<div aria-labelledby="heading3" role="tabpanel" class="panel-collapse collapse" id="collapse3">
<div class="panel-body">
<h2 style="font-size: 18px; color: black;"><?php the_field('commercial_lines1'); ?></h2>
<p><?php the_field('commercial_lines2'); ?></p>
<p><a href="http://orchidinsurance.com/products/commercial-lines/" style="margin-top: 10px;" class="btn btn-primary btn-sm agent">Commercial Lines Page</a>
                        </p></div>
<p></p></div>
<p></p></div>
<p></p></div>
<div aria-multiselectable="true" role="tablist" id="contact-accordion" class="panel-group style1 mb0">
<div class="panel panel-default">
<div id="heading4" role="tab" class="panel-heading">
<h4 class="panel-title"><a aria-controls="collapse4" aria-expanded="true" href="#collapse4" data-parent="#contact-accordion" data-toggle="collapse" role="button"><i class="fa fa-angle-down"></i> <span class="color-black">SPECIALTY HIGH NET WORTH</span></a></h4>
<p></p></div>
<div aria-labelledby="heading4" role="tabpanel" class="panel-collapse collapse" id="collapse4">
<div class="panel-body">
<h2 style="font-size: 18px; color: black;"><?php the_field('shnw1'); ?></h2>
<p><?php the_field('shnw2'); ?></p>
<p><a href="http://orchidinsurance.com/products/specialty-hnw/" style="margin-top: 10px;" class="btn btn-primary btn-sm agent">HNW Page</a>
                    </p></div>
<p></p></div>
<p></p></div>
<p></p></div>
<p></p></div>
<!--End Left State Panel -->
     <!--Start Right State Panel -->
     <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="padding: 0px;">
<div class="widget2 margin1 clearfix" id="stick-bar"  style="background: white; border: 1px solid whitesmoke;">
<h2 class="always-here" style="font-size: 20px; margin-bottom: 0px;">Contact Information</h2>
<h2 class="maybe-here" style="font-size: 20px; margin-bottom: 0px;">Contact Information</h2>
<h4 class="maybe-here" data-mh="widget4-title1-h" class="rep" style="margin-top: 20px;">For more details contact us at: 1-866-370-6505</h4>


<div class='im-here'>
<!--Start Contact Repeater -->
  <?php
          // check if the repeater field has rows of data
          if( have_rows('contacts') ):
          // loop through the rows of data
          while ( have_rows('contacts') ) : the_row();
          // vars
          $contact_title = get_sub_field('contact_title');
          $contact_name = get_sub_field('contact_name');
          $contact_phone = get_sub_field('contact_phone');
          $contact_email = get_sub_field('contact_email');
          ?>
         
          <h4 data-mh="widget4-title1-h" class="rep" style="margin-top: 20px;"><?php echo $contact_title; ?></h4>
          <p class="txt-desc1 mb0"><?php echo $contact_name; ?></p>
          <p class="txt-desc1 mb0"><?php echo $contact_phone; ?></p>
          <p class="txt-desc1 mb0"><?php echo $contact_email; ?></p>
          
          <?php endwhile; ?>
            <?php endif; ?>
<!--End Contact Repeater -->

</div>
</div>
<!--End Right State Panel -->
    </div> </div>
 </section>
 

<script>if($('.rep').length === 0) { $('.always-here').hide(); }</script>
<script>if($('.rep').length === 0) { $('.maybe-here').show(); }</script>

 <?php get_footer(); ?>