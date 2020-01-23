<?php
/*
Template Name: Single Page
Template Post Type: post, page, product, wef-applet
*/
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

 get_header(); ?>

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

     <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
 			the_content();
 		endwhile; else: ?>
 			<p>Sorry, no posts matched your criteria.</p>
 		<?php endif; ?>

     </div>
 </section>


 <?php get_footer(); ?>
