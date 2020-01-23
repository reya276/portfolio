<?php
/*
Template Name: Specialty High Net Worth Template
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


 <section class="main-content pb30">
 	<div class="container normal">
    <?php the_field('main_description'); ?>
     </div>
 </section>
 <section class="main-content white-bg">
    <div class="container normal">
        <div aria-multiselectable="true" role="tablist" id="yacht-accordion" class="panel-group style1 mb0">
            <div class="panel panel-default">
                <div id="heading2" role="tab" class="panel-heading">
                    <h4 class="panel-title"><a aria-controls="collapse2" aria-expanded="true" href="#collapse2" data-parent="#yacht-accordion" data-toggle="collapse" role="button"><i class="fa fa-angle-down"></i> <span class="color-black"><?php the_field('section_1_title'); ?></span></a></h4>
                </div>
                <div aria-labelledby="heading2" role="tabpanel" class="panel-collapse collapse" id="collapse2">
                    <div class="panel-body">
                        <?php the_field('section_1_content'); ?>
                    </div>
                </div>
            </div>
        </div>

	<div aria-multiselectable="true" role="tablist" id="yacht-accordion" class="panel-group style1 mb0">
            <div class="panel panel-default">
                <div id="heading2" role="tab" class="panel-heading">
                    <h4 class="panel-title"><a aria-controls="collapse2" aria-expanded="true" href="#collapse12" data-parent="#yacht-accordion" data-toggle="collapse" role="button"><i class="fa fa-angle-down"></i> <span class="color-black"><?php the_field('section_1.2_title'); ?></span></a></h4>
                </div>
                <div aria-labelledby="heading2" role="tabpanel" class="panel-collapse collapse" id="collapse12">
                    <div class="panel-body">
                        <?php the_field('section_1.2_content'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div aria-multiselectable="true" role="tablist" id="forms-accordion" class="panel-group style1 mb0">
            <div class="panel panel-default">
                <div id="heading3" role="tab" class="panel-heading">
                    <h4 class="panel-title"><a aria-controls="collapse3" aria-expanded="true" href="#collapse3" data-parent="#forms-accordion" data-toggle="collapse" role="button"><i class="fa fa-angle-down"></i> <span class="color-black"><?php the_field('section_2_title'); ?></span></a></h4>
                </div>
                <div aria-labelledby="heading3" role="tabpanel" class="panel-collapse collapse" id="collapse3">
                    <div class="panel-body">
                  <?php the_field('section_2_content'); ?>
                        </div>
                    </div>
                </div>

        </div>

        <div aria-multiselectable="true" role="tablist" id="contact-accordion" class="panel-group style1 mb0">
            <div class="panel panel-default">
                <div id="heading4" role="tab" class="panel-heading">
                    <h4 class="panel-title"><a aria-controls="collapse4" aria-expanded="true" href="#collapse4" data-parent="#contact-accordion" data-toggle="collapse" role="button"><i class="fa fa-angle-down"></i> <span class="color-black"><?php the_field('section_3_title'); ?></span></a></h4>
                </div>
                <div aria-labelledby="heading4" role="tabpanel" class="panel-collapse collapse" id="collapse4">
                    <div class="panel-body">
                      <?php the_field('section_3_content'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div aria-multiselectable="true" role="tablist" id="claims-accordion" class="panel-group style1 mb0">
            <div class="panel panel-default">
                <div id="heading5" role="tab" class="panel-heading">
                    <h4 class="panel-title"><a aria-controls="collapse5" aria-expanded="true" href="#collapse5" data-parent="#claims-accordion" data-toggle="collapse" role="button"><i class="fa fa-angle-down"></i> <span class="color-black"><?php the_field('section_4_title'); ?></span></a></h4>
                </div>
                <div aria-labelledby="heading5" role="tabpanel" class="panel-collapse collapse" id="collapse5">
                    <div class="panel-body">
                    <?php the_field('section_4_content'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div aria-multiselectable="true" role="tablist" id="billing-accordion" class="panel-group style1 mb0">
            <div class="panel panel-default">
                <div id="heading6" role="tab" class="panel-heading">
                    <h4 class="panel-title"><a aria-controls="collapse6" aria-expanded="true" href="#collapse6" data-parent="#billing-accordion" data-toggle="collapse" role="button"><i class="fa fa-angle-down"></i> <span class="color-black"><?php the_field('section_5_title'); ?></span></a></h4>
                </div>
                <div aria-labelledby="heading6" role="tabpanel" class="panel-collapse collapse" id="collapse6">
                    <div class="panel-body">
                        <?php the_field('section_5_content'); ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>


 <?php get_footer(); ?>
