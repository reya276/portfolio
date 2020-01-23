<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
								<h1>News & Media</h1>
						</div>
				</div>
		</div>
</section>

<section class="main-content">
 <div class="container normal">
  <h2>News & Media</h2>
	<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div class="widget2 margin1 clearfix">
							<h4>Filter</h4>
							<div class="panel-group nm-filter" id="line-of-business-accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="heading1">
													<h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#line-of-business-accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1"><i class="fa fa-angle-up"></i> Line of Business</a></h4>
											</div>
											<div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
													<div class="panel-body">
														<ul class="categ-filters">
<?php wp_list_categories('orderby=name&title_li'); ?>
</ul>

													</div>
											</div>
									</div>
							</div>
							<div class="panel-group nm-filter mb0" id="date-accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="heading2">
													<h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#date-accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2"><i class="fa fa-angle-up"></i> Date</a></h4>
											</div>
											<div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
													<div class="panel-body">
														<ul class="categ-filters">
		<?php wp_get_archives('type=yearly'); ?>
	</ul>
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<div class="widget2 margin1 clearfix hidden-xs">
						<h4><?php printf( __( 'Line of Business: %s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h4>
					</div>
					<div class="widget2 clearfix">
						<?php if ( have_posts() ) : ?>
				<?php

				// The Loop
				while ( have_posts() ) : the_post(); ?>
				<div class="row">
				        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				          <?php the_date('F j, Y', '<p><em>', '</em></p>'); ?>
				        </div>
				        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
				            <div class="article clearfix">
				      <h5><?php the_title(); ?></h5>
				      <?php echo substr(strip_tags($post->post_content), 0, 400);?>
				      <p class="read-more"><a href="<?php the_permalink() ?>">Read more </a> &nbsp;-&rsaquo;</p>

				    </div>
				</div>
				</div>




				<?php endwhile; // End Loop

				else: ?>
				<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>
					</div>
			</div>

		</div>
</section>

 <?php get_footer(); ?>
