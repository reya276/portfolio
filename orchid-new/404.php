<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<section class="header-pages home">
    <div class="video-holder">
        <video loop autoplay poster="assets/video/video3.jpg" id="backgroundvid">
            <source src="<?php echo get_stylesheet_directory_uri();?>/assets/video/video3.webm" type='video/webm; codecs="vp8.0, vorbis"'>
            <source src="<?php echo get_stylesheet_directory_uri();?>/assets/video/video3.ogv" type='video/ogg; codecs="theora, vorbis"'>
            <source src="<?php echo get_stylesheet_directory_uri();?>/assets/video/video3.mp4" type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"'>
            <p>Fallback content to cover incompatibility issues</p>
        </video>
    </div>
</section>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>
			</div><!-- .page-content -->


<?php get_footer(); ?>
