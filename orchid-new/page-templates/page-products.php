<?php
/*
Template Name: Products Template
*/
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


 <section class="main-content">
 	<div class="container normal">

          <div class="row">
            <?php
          // check if the repeater field has rows of data
          if( have_rows('product') ):
          // loop through the rows of data
          while ( have_rows('product') ) : the_row();
          // vars
          $product_image = get_sub_field('product_image');
          $product_name = get_sub_field('product_name');
          $product_desc = get_sub_field('product_description');
          $product_link = get_sub_field('product_link');
          ?>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <div class="widget3" data-mh="widget3-h">
                      <p class="thumb-img"><img src="<?php echo $product_image; ?>" alt="" class="img-responsive"></p>
                      <div class="widget-content clearfix">
                          <h4 data-mh="widget3-title1-h"><?php echo $product_name; ?></h4>
                          <p class="txt-desc1" data-mh="widget3-txt-desc1-h"><?php echo $product_desc; ?></p>
                          <p class="learn-more"><a href="<?php echo $product_link; ?>" class="btn btn-primary btn-lg">Learn More</a></p>
                      </div>
                  </div>
              </div>
            <?php endwhile; ?>
            <?php endif; ?>

</div>
</section>


 <?php get_footer(); ?>
