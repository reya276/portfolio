<?php
/*
Template Name: Personal Lines Template
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
    <p class="lead color-blue"><?php the_field('main_description'); ?></p>

    <!-- Top Solutions -->
     <div class="row">
       <?php
     // check if the repeater field has rows of data
     if( have_rows('top_solutions') ):
     // loop through the rows of data
     while ( have_rows('top_solutions') ) : the_row();
     // vars
     $ts_image = get_sub_field('top_solution_image');
     $ts_name = get_sub_field('top_solution_name');
     $ts_desc = get_sub_field('top_solution_description');
     ?>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div data-mh="widget4-h" class="widget4">
                        <p class="thumb-img thumb1"><img class="img-responsive" alt="" src="<?php echo $ts_image; ?>"></p>
                        <div class="widget-content clearfix">
                            <h4 data-mh="widget4-title1-h"><?php echo $ts_name; ?></h4>
                            <p class="txt-desc1 mb0"><?php echo $ts_desc; ?></p>
                        </div>
                    </div>
                </div>
              <?php endwhile; ?>
              <?php endif; ?>

            </div>

    <!-- Top Solutions -->

    <!-- Bottom Solutions -->
    <div class="row">
      <?php
    // check if the repeater field has rows of data
    if( have_rows('bottom_solutions') ):
    // loop through the rows of data
    while ( have_rows('bottom_solutions') ) : the_row();
    // vars
    $bs_image = get_sub_field('bottom_solution_image');
    $bs_name = get_sub_field('bottom_solution_name');
    $bs_desc = get_sub_field('bottom_solution_description');
    ?>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div data-mh="widget4-h" class="widget4">
                        <p class="thumb-img thumb2"><img class="img-responsive" alt="" src="<?php echo $bs_image; ?>"></p>
                        <div class="widget-content clearfix">
                            <h4 data-mh="widget4-title1-h"><?php echo $bs_name; ?></h4>
                            <p class="txt-desc1 mb0"><?php echo $bs_desc; ?></p>
                        </div>
                    </div>
                </div>
    <?php endwhile; ?>
    <?php endif; ?>
            </div>

    <!-- Bottom Solutions -->
 <?php the_field('bottom_description'); ?>
     </div>
 </section>


 <?php get_footer(); ?>
