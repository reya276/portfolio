<?php
/*
Template Name: Coverage Alert */
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
<!--Start Custom CSS -->
<style type="text/css">
	td {width: 20%}  .image-holder {
  height: 200px !important; 
} .text-holder {display: none !important} table {border-color: transparent}  td, th {
    border-right: 0px !important;
} .table>thead>tr>th {
    vertical-align: middle;} .table-start {background-color: white; margin-bottom: 30px; padding: 20px; border: 1px solid whitesmoke;} .warning {
    background-color: yellow !important;
}

.success {
    background-color: green !important; color: white;
}

.danger {
    background-color: red!important;
    color: white;
} 

.success, .danger, .warning {
    border-left: 8px solid white !important;
}

</style>
<!--End Custom CSS -->
 <section class="main-content pb30">
 	<div class="container normal">
<p style="padding: 20px;
    background-color: #eaeaea;
    border-radius: 6px;
    border: 1px solid gainsboro;"><img src="http://orchidinsurance.com/wp-content/uploads/2017/09/warn.png" style="float: left;
    width: 41px;
    margin-right: 17px;
    opacity: 0.3;">Important Note:  New requests to bind coverage for new business risks located in areas impacted by Harvey or Irma will require a completed Storm Damage Affidavit, <a href="http://orchidinsurance.com/wp-content/uploads/2017/09/OUA-Storm-Damage-Affidavit.pdf" style="color: #005798;">click here to download the form</a>. </p>
	 	<!--Default Message -->
	 	<div class="alert alert-success blank-alert" role="alert">
  <strong>Great News!</strong> There are currently no moratoriums in place.
</div><!-- End Default Message -->

	 	<!--Start Repeater Section -->
	 	<?php if( have_rows('grid') ): ?>

	<div class="grid-active"> <style>.blank-alert {display: none !important;}</style>

	<?php while( have_rows('grid') ): the_row(); 

		// vars
		$estatus = get_sub_field('estatus');
		$astatus = get_sub_field('astatus');
		$sstatus = get_sub_field('sstatus');
		$cstatus = get_sub_field('cstatus');
		$name = get_sub_field('name');
		$state = get_sub_field('state');
		$ecolor = get_sub_field('es_color');
		$acolor = get_sub_field('acolor');
		$scolor = get_sub_field('scolor');
		$ccolor = get_sub_field('ccolor');
		$last_update = get_sub_field('last_update');
		$edetail = get_sub_field('edetail');
		$adetail = get_sub_field('adetail');
		$sdetail = get_sub_field('sdetail');
		$cdetail = get_sub_field('cdetail');
		$erec = get_sub_field('erec');
		$arec = get_sub_field('arec');
		$srec = get_sub_field('srec');
		$crec = get_sub_field('crec');

		?>

		<div class="table-start">
				
			
<h2><?php echo $name; ?></h2>
<b>State:</b> <?php echo $state; ?>  &nbsp;&nbsp;&nbsp;&nbsp;<b>Last Update:</b> <?php echo $last_update; ?><hr>
  <table class="table">
    <thead>
      <tr>
        <th></th>
        <th>E&amp;S Personal Lines</th>
        <th>Admitted Personal Lines</th>
        <th>Specialty High Net Worth</th>
        <th>Commercial Lines</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Status</td>
        <td class="<?php echo $ecolor; ?>"><?php echo $estatus; ?></td>
        <td class="<?php echo $acolor; ?>"><?php echo $astatus; ?></td>
        <td class="<?php echo $scolor; ?>"><?php echo $sstatus; ?></td>
        <td class="<?php echo $ccolor; ?>"><?php echo $cstatus; ?></td>

      </tr>
      <tr>
        <td>Details</td>
        <td class="<?php echo $ecolor; ?>"><?php echo $edetail; ?></td>
        <td class="<?php echo $acolor; ?>"><?php echo $adetail; ?></td>
        <td class="<?php echo $scolor; ?>"><?php echo $sdetail; ?></td>
        <td class="<?php echo $ccolor; ?>"><?php echo $cdetail; ?></td>

      </tr>
      <tr>
        <td>Recommended Actions</td>
        <td class="<?php echo $ecolor; ?>"><?php echo $erec; ?></td>
        <td class="<?php echo $acolor; ?>"><?php echo $arec; ?></td>
        <td class="<?php echo $scolor; ?>"><?php echo $srec; ?></td>
        <td class="<?php echo $ccolor; ?>"><?php echo $crec; ?></td>

      </tr>
    </tbody>
  </table>
				

			


		</div>

	<?php endwhile; ?>

	</div>

<?php endif; ?>

 	

<!--End Repeater Section -->
	 </div>
 </section>
 

<script>if($('.rep').length === 0) { $('.always-here').hide(); }</script>
<script>if($('.rep').length === 0) { $('.maybe-here').show(); }</script>

 <?php get_footer(); ?>