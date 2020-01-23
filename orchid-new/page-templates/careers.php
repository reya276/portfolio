<?php
/**
 * Template Name: Carrers
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section class="header-pages careers">
    <div class="image-holder">
        <div class="container normal">
            <div class="text-holder">
                <h1>Careers</h1>
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