<?php
/*
Template Name: Single Page
Template Post Type: post, page, product, wef-applet
*/

/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

 <section class="header-pages">
     <div class="image-holder blog" <?php if( get_field('page_header_image') ): ?> style="background-image:url('<?php the_field('page_header_image'); ?>')" <?php endif; ?>>
         <div class="container normal">
             <div class="text-holder">
                 <?php the_title( '<h1>', '</h1>' ); ?>
             </div>
         </div>
     </div>
 </section>

<section class="main-content">
 <div class="container normal">

   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   <h1><?php the_title(); ?></h1>
       <?php the_content(); ?>
   <?php endwhile; else: ?>
       <?php _e( 'Sorry, no pages matched your criteria.', 'textdomain' ); ?>
   <?php endif; ?>
 </div>
</section>

<?php get_footer(); ?>
