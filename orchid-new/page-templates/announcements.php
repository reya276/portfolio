<?php
/*
Template Name: Announcements */
define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');
?>
<?php
//create array for query parms
// $args = array(
//     'post_type' => 'post',
//     'post_status' => 'publish',
//     'category_name' => 'Announcements',
//     'orderby' => 'post_title',
//     'order' => 'ASC'
// );
$query = new WP_Query( array( 'category_name' => 'Announcements','orderby' => 'post_title', 'order' => 'ASC' ) );
?>
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <div class="row-1">
        <div class="col-lg-1">
          <h4 class="h4-a"><?php the_title(); ?></h4>
          <div class="annTypeColor" style="color: #999;margin-top:-8px;margin-right:10px;"><i class="material-icons md-18">announcement</i></div>
          <span style="float:left;padding:0px;margin-top:-3px;"><?php the_content(); ?></span>
        </div>
    </div>
<?php endwhile;
wp_reset_postdata();
else : ?>
    <div class="row-1">
        <div class="col-lg-1">
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        </div>
    </div>
<?php endif; ?>
