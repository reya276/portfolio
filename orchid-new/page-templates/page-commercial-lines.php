<?php
/*
Template Name: Commercial Lines Template
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
  <?php the_field('main_description'); ?>


    <!-- Top Solutions -->
     <div class="row">
       <?php
     // check if the repeater field has rows of data
     if( have_rows('commercial_solutions') ):
     // loop through the rows of data
     while ( have_rows('commercial_solutions') ) : the_row();
     // vars
     $cs_name = get_sub_field('solution_name');
     $cs_desc = get_sub_field('solution_description');
     $cs_image = get_sub_field('solution_image');
     $cs_fa1 = get_sub_field('file_attachement_#1');
     $cs_fa1n = get_sub_field('file_attachement_#1_name');
     $cs_fa2 = get_sub_field('file_attachement_#2');
     $cs_fa2n = get_sub_field('file_attachement_#2_name');
     $cs_fa3 = get_sub_field('file_attachement_#3');
     $cs_fa3n = get_sub_field('file_attachement_#3_name');

     ?>
     <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                     <div data-mh="widget4-h" class="widget4">
                         <p class="thumb-img thumb2"><img class="img-responsive" alt="" src="<?php echo $cs_image; ?>"></p>
                         <div class="widget-content clearfix">
                             <h4 data-mh="widget4-title1-h"><?php echo $cs_name; ?></h4>
                             <p data-mh="widget4-desc1-h" class="txt-desc1"><?php echo $cs_desc; ?></p>
                             <p class="mb0">
                            <?php if( get_sub_field('file_attachement_#1') ): ?>
                             <i class="fa fa-file-pdf-o"></i>&nbsp; <a target="_blank" href="<?php echo $cs_fa1; ?>"><?php echo $cs_fa1n; ?></a>
                           <?php endif; ?>
                           <?php if( get_sub_field('file_attachement_#2') ): ?>
                              <br>
                              <i class="fa fa-file-pdf-o"></i>&nbsp; <a target="_blank" href="<?php echo $cs_fa2; ?>"><?php echo $cs_fa2n; ?></a>
                            <?php endif; ?>
                            <?php if( get_sub_field('file_attachement_#3') ): ?>
                              <br>
                              <i class="fa fa-file-pdf-o"></i>&nbsp; <a target="_blank" href="<?php echo $cs_fa3; ?>"><?php echo $cs_fa2n; ?></a>
                            <?php endif; ?>
                          </p>
                         </div>
                     </div>
                 </div>

              <?php endwhile; ?>
              <?php endif; ?>

            </div>

    <!-- Top Solutions -->





     </div>

 </section>


 <?php get_footer(); ?>
