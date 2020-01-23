<?php
/**
 * Template Name: Claims
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
<?php
function myscript() {
?>
<script type="text/javascript">
    var ajaxurl = "<?=admin_url( 'admin-ajax.php' )?>";

    $( document ).ready(function() {
        $('.searchResults').hide();
        $('.searchButton').click(searchCarrier);
        $('.searchValue').keyup(function (e) {
            if (e.keyCode == 13) {
                searchCarrier();
            }
        });
    });

    function searchCarrier() {
        $('.searchResults').hide();
        var searchText = $('.searchValue').val();
        searchText = searchText.substring(0,7);
        var carrier = lookUpCarrier(searchText);
        if(!carrier) {
            $('.busy').attr('disabled', true);
            startProgress();
            $.post(ajaxurl, {"action": "oi_get_carrier", "PolicyNumber":$('.searchValue').val()}, function (data) {
	      $('.busy').attr('disabled', false);
              clearProgress();
              if ('CarrierDetail' in data) {
                   var cd = data.CarrierDetail;

                   showResults(cd["Name"], cd["Claim Phone"], cd["Claim Email"]);
              } else {
                   console.log(data);
                   showResults('None');
              }
            }, 'json');
        } else {
            showCarrier(carrier);
        }
    }

    function showCarrier(carrier) {
        var carrierPhoneNumber = lookUpCarrierPhone(carrier);
        var carrierEmail = lookUpCarrierEmail(carrier);
        showResults(carrier, carrierPhoneNumber, carrierEmail);
    }


    function lookUpCarrier(searchText) {
	searchText = searchText.toUpperCase();
        var carriers = {
            "BMSA" : "Ace (Lloyds)",
            "AB" : "Aspen",
            "AQU" : "AQUA/DUAL (Lloyds)",
            "DC" : "AQUA/DUAL (Lloyds)",
            "LBT" : "Brit (Lloyds)",
            "ORD" : "Ironshore",
            "LP" : "Lloyd's Preferred",
            "KLN" : "Kiln",
            "QSN" : "QBE_OC",
            "RCPWORC" : "Rockhill",
            "RCPKORC" : "Rockhill",
            "CUS47" : "Canopius",
            "VCFM" : "WNC (Lloyds)",
            "CAL" : "100% Lloyds",
            "CAG" : "Ace European Group",
            "CLL" : "Lloyds 2488",
            "CLI" : "Lloyds 4242 (iCAT)",
            "CAA" : "QBE_CAA",
            "268" : "Ace Private Risk",
            "NZF" : "Fireman's Fund",
            "PRA" : "Plymouth Rock",
            "HP" : "Andover",
            "DP" : "Andover",
			"OUA2" : "Spinnaker",
            "CUS47" : "Canopius",
            "OUA3000" : "Canopius",
			"PCG" : "AIG Private Client Group",
			"IP" : "Ironshore Private Insurance"
        };

        for(var key in carriers) {
            var regex = new RegExp('^'+key);
            if(searchText.match(regex)) return carriers[key];
        }
    }

    function lookUpCarrierPhone(carrier) {
        var carrierPhoneNumbers = {
            "Ace (Lloyds)" : "(877) 270-2581",
            "Aspen" : "(818) 251-3506",
            "AQUA/DUAL (Lloyds)" : "(772) 237-8531",
            "Brit (Lloyds)" : "(877) 270-2581",
            "Ironshore" : "(800) 466-9165",
            "Lloyd's Preferred" : "(877) 270-2581",
            "Kiln" : "(800) 627-7601",
            "QBE_OC" : "(800) 362-5448",
            "Rockhill" : "(772) 237-8531",
/* code above sets carrier to just Rockhill
            "Rockhill (Wind Only)" : "(772) 237-8531",
            "Rockhill (Multi-Peril)" : "(772) 237-8531",
*/
            "Rockhill" : "(800) 766-1853",
            "Canopius" : "(877) 270-2581",
            "WNC (Lloyds)" : "(800) 627-7601",
            "100% Lloyds" : "(855) 345-3235",
            "Ace European Group" : "(855) 345-3235",
            "Lloyds 2488" : "(855) 345-3235",
            "Lloyds 4242 (iCAT)" : "(866) 789-4228",
            "QBE_CAA" : "(844) 723-2524",
            "Ace Private Risk" : "(800) 945-7461",
            "Fireman's Fund" : "(888) 347-3428",
            "Plymouth Rock" : "(888) 324-1620",
            "Andover" : "(978) 548-3797",
			"Spinnaker" : "(877) 270-2581",
			"Lloyds Commercial" : "(877) 270-2581",
			"AIG Private Client Group" : "(888) 760-9195",
			"Ironshore Private Insurance" : "(800) 466-9165",
        };

        for(var key in carrierPhoneNumbers) {
            if(carrier === key) return carrierPhoneNumbers[key];
        }
    }

    function lookUpCarrierEmail(carrier) {
        var carrierPhoneNumbers = {
            "Ace (Lloyds)" : "orchid@pibadjusters.com",
            "Aspen" : "cnitz@wcis-ins.com",
            "AQUA/DUAL (Lloyds)" : "dualaquaproperty@yorkrsg.com",
            "Brit (Lloyds)" : "orchid@pibadjusters.com",
            "Ironshore" : "ironshoreho@raphaelandassociates.com",
            "Lloyd's Preferred" : "orchid@pibadjusters.com",
            "Kiln" : "msarrett@preciseadjustments.com",
            "QBE_OC" : "orchid-claims@us.qbe.com",
/* Code above sets carrier to just Rockhill
            "Rockhill (Wind Only)" : "rhnewpropertyclaims@rhkc.com",
            "Rockhill (Multi-Peril)" : "rhnewpropertyclaims@rhkc.com",
*/
            "Rockhill" : "rhnewpropertyclaims@rhkc.com",
            "Canopius" : "orchid@pibadjusters.com",
            "WNC (Lloyds)" : "msarrett@preciseadjustments.com",
            "100% Lloyds" : "coastalclaims@capstoneisg.com",
            "Ace European Group" : "coastalclaims@capstoneisg.com",
            "Lloyds 2488" : "coastalclaims@capstoneisg.com",
            "Lloyds 4242 (iCAT)" : "faxfnol@boulderclaims.com",
            "QBE_CAA" : "coastal_claims@us.qbe.com",
            "Ace Private Risk" : "prsfirst_reports@acegroup.com",
            "Fireman's Fund" : "prsfirst_reports@acegroup.com",
            "Plymouth Rock" : "Not Available",
            "Andover" : "hnwclaims@orchidinsurance.com",
			"Spinnaker" : "orchid@pibadjusters.com",
			"Lloyds Commercial" : "orchid@pibadjusters.com",
			"Ironshore Private Insurance" : "Not Available",
        };

        for(var key in carrierPhoneNumbers) {
            if(carrier === key) return carrierPhoneNumbers[key];
        }
    }

    function showResults(carrier, phone, email) {
        if(carrier === 'None') {
            $('.noResults').show();
        } else {
            $('.carrierValue').text(carrier.replace('_OC','').replace('_CAA',''));
            $('.phoneValue').text(phone);
            $('.emailValue').text(email);
            $('.searchResults').show();
            $('.noResults').hide();
        }
    }

  var progress_start;
  var progress_timer;

  function nowSeconds() {
  	return (new Date()).getTime()/1000;
  }

  function startProgress() {
	$('#search_progress').show();
  	progress_start = nowSeconds();
    $('#search_progress').val(0);
    progress_timer = setInterval(bumpProgress, 10);
  }
  
  function bumpProgress() {
  	var pp = (nowSeconds()-progress_start)/5.0;
    $('#search_progress').val(Math.min(100, pp*100));
    if (pp > 1.0) {
    	clearInterval(progress_timer);
        progress_timer = null;
    }
  }
  
  function clearProgress() {
	if (progress_timer) {
            clearInterval(progress_timer);
        }
  	$('#search_progress').hide();
  }
</script>
<?php
}
add_action('wp_footer', 'myscript');
?>
 <?php get_footer(); ?>
