<?php
/*
Template Name: Leadership Page Template
*/
?>

<?php get_header(); ?>

 <section class="header-pages">
     <div class="image-holder" <?php if( get_field('page_header_image') ): ?> style="background-image:url('http://orchidinsurance.com/wp-content/uploads/2016/05/lightHouse.jpg')" <?php endif; ?>>
         <div class="container normal">
             <div class="text-holder">
                 <?php the_title( '<h1>', '</h1>' ); ?>
             </div>
         </div>
     </div>
 </section>


 <section class="main-content">
 	<div class="container normal">
 <?php the_title( '<h2>', '</h2>' ); ?>
     <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
 			the_content();
 		endwhile; else: ?>
 			<p>Sorry, no posts matched your criteria.</p>
 		<?php endif; ?>
    <div class="row">
                    <?php

              // check if the repeater field has rows of data
              if( have_rows('leader') ):
               	// loop through the rows of data
                  while ( have_rows('leader') ) : the_row();
                  // vars
              		$image = get_sub_field('leader_image');
              		$name = get_sub_field('leader_name');
              		$position = get_sub_field('leader_job_position');
                  ?>

                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                    <div data-mh="widget1-h" class="widget1 clearfix" style="height: 286px;">
                        <p class="thumb-img"><img class="img-responsive" alt="" src="<?php echo $image; ?>"></p>
                        <h4><?php echo $name; ?></h4>
                        <p class="post"><?php echo $position; ?></p>
                    </div>
                </div>
              <?php endwhile; ?>
              <?php endif; ?>


            </div>
     </div>
 </section>


 <?php get_footer(); ?>
