<?php
/*
Template Name: NewAgencyDashboard */
global $wpdb;

//Check the DB connection
if ($wpdb->connect_error) {
return ['status'=>'error', 'message'=> "Connection failed: $wpdb->connect_error"];
}
//Get all tiles`
$sql="SELECT * FROM wp_tiles ORDER BY `tile_order` ASC LIMIT 0,100";
//Get all tiles for personal lines
$sqlA="SELECT * FROM wp_tiles WHERE `type` = 'PL' ORDER BY `tile_order` ASC LIMIT 0,50";
//Get all tiles for commercial lines
$sqlB="SELECT * FROM wp_tiles WHERE `type` = 'CL' ORDER BY `tile_order` ASC LIMIT 0,50";

$tileData = $wpdb->get_results($sql, ARRAY_A); //<--- All tiles
$tileDataP = $wpdb->get_results($sqlA, ARRAY_A); //<--- Personal Lines
$tileDataC = $wpdb->get_results($sqlB, ARRAY_A); //<--- Commercial Lines
?>

<!-- Bootstrap -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/ad_styles.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/ad_filters.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
//convert db results to json data format
  var tileData = <?=json_encode($tileData)?>;
  var tileDataP = <?=json_encode($tileDataP)?>;
  var tileDataC = <?=json_encode($tileDataC)?>;
</script>
<section class="main-content" onload="loadProducts(); loadCatergories(); loadStates(); loadPtiles(); loadCtiles();">
    <!-- Start Main AD container -->
    <div class="container-fluid">
        <!-- Start AD navigation -->
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-ad">
                    <li><a href="#" title="1-866-370-6505" target="_blank"><i class="fa fa-phone-square" aria-hidden="true"></i> 1-866-370-6505</a></li>
                    <li><a href="#" title="Take a Tour"  target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i> Take a Tour</a></li>
                    <li><a href="#" title="Watch the Video"  target="_blank"><i class="fa fa-play-circle" aria-hidden="true"></i> Watch the Video</a></li>
                    <li><a href="#" title="User's Guide"  target="_blank"><i class="fa fa-file-text" aria-hidden="true"></i> User's Guide</a></li>
                </div>
            </div>
        </div>
        <!--// END AD navigation -->
        <!-- Start AD title and Existing Policies Logins -->
        <div class="row">
            <div class="col-lg-12">
                <div class=" row div-existing">
                    <div class="col-md-3 ad-title-box">
                        <div class="ad-title">Agency Dashboard</div>
                        <span class="ad-subtitle">Click Here for Existing<br/></span>
                        <span class="ad-subtitle">Policies & Quotes <i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></span>

                    </div>
                    <div class="col-md-3 ad-login-box">
                        <div class="ad-login-pp">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/policyplus-login.png" class="ad-login-img" title="Orchid Policy Plus" />
                            <button type="button" id="" name="" class="ad-bt-login" onclick="ppModal();" title="Orchid Policy Plus">Orchid Policy Plus</button>
                        </div>
                    </div>
                    <div class="col-md-3 ad-login-box">
                        <div class="ad-login-caa">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/caa-login.png" class="ad-login-img" title="Coastal Agents Alliance" />
                            <button type="button" id="" name="" class="ad-bt-login" onclick="caaModal();" title="Coastal Agents Alliance">Coastal Agents Alliance</button>
                        </div>
                    </div>
                    <div class="col-md-3 ad-login-box">
                        <div class="ad-login-conn">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/connect-login.png" class="ad-login-img" title="Orchid Connect" />
                            <button type="button" id="" name="" class="ad-bt-login" onclick="connModal();" title="Orchid Connect">Orchid Connect</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// END AD title and Existing Policies Logins -->
        <!-- Start New Policies & State selection -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row div-newbiz">
                    <div class="col-md-3">
                        <div class="ad-newquote">
                            Start a New Business Quote <i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i>
                        </div>
                    </div>
                    <form id="ad-newbiz" name="ad-newbiz">
                    <div id="statelist" class="col-md-3">
                        <select id="fstate" name="fstate" class="ad-property" onchange="getCaribb();">

                        </select>
                    </div>
                    <div class="col-md-3 ad-df-location">
                        <label for="locdefault">Make this my default location: </label>
                        <input type="checkbox" value="1" id="locdefault" onclick="setCookies('OrchidDash',fstate,'365');" name="locdefault" class="locdefault" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--// END New Policies & State selection -->
        <!-- Start Filter and Product Lines -->
        <div class="row ad-row-padding">
            <div class="col-lg-12">
                <!-- AD Filters -->
                <div class="col-sm-2 ad-filters-box">
                    <form id="ad-filters">
                        <p class="ad-filter-title">Products</p>
                        <div id="products" class="form-group ad-filters">

                        </div>
                        <p class="ad-filter-title">Categories</p>
                        <div id="categories" class="form-group ad-filters">

                        </div>
                        <!-- <p class="ad-filter-title">Sort by</p>
                        <div id="categories" class="form-group ad-filters">
                            <li><input type="radio" id="filter-by" value="0" title="All"/> <label for="filter-by">Alphabetical</label></li>
                            OR
                            <li><input type="radio" id="filter-by" value="0" title="All"/> <label for="filter-by">Product Type</label></li>
                        </div> -->
                        <p><button type="button" title="Reset" class="btn reset-bt" onclick="resetFilters();">Reset</button></p>
                    </form>
                </div>
                <!-- AD Products -->
                <div class="col-md-10 ad-products">
                    <div class="col-md-10 ad-personal" id="personal-lines">
                        <div id="sorttilesP" class="ad-personal-title" align="center">PERSONAL LINES
                            <span id="sortTrigP" class="ad-tile-sort">
                                    <i class="fa fa-sort fa-lg" aria-hidden="true" onclick="loadPtiles(2);" title="Sort Tiles"></i>
                            </span>
                        </div>

                        <div id="rowP" class="row row-margin rowP"  align="center">

                          <x-tile class="filterrowP" data-id="${id}" data-state="${states}" data-category="${category}">
                            <div class="col-sm-4 ad-tile" data-sort="${id}">
                                <div  name="footprintinfo" class="footprintinfo" style="position:absolute;left:122px;z-index:2147483647;"></div>
                                <a href="#" onclick="getLine('${getLine}','${tile_name}','none');__gaTracker('send', 'event', 'outbound-widget', 'https://orchidinsurance.com/agentlogin/agency-dashboard/','${tile_name}');" class="href-nav" title="${tile_name}">
                                    <img src="http://castor.orchidinsurance.com/wp-content/themes/orchid-new/assets/img/${image}" class="ad-tileimg-a" title="${tile_name}"/>
                                    <div class="ad-tile-txt">${tile_name}</div>
                                </a>
                            </div>
                          </x-tile>

                        </div>
                    </div>
                    <div class="col-md-10 ad-commercial">
                        <div id="sorttilesC" class="ad-commercial-title"  align="center">COMMERCIAL LINES
                            <span id="sortTrigC" class="ad-tile-sort">
                                    <i class="fa fa-sort fa-lg" aria-hidden="true" onclick="loadCtiles(2);" title="Sort Tiles"></i>
                            </span>
                        </div>
                        <div id="rowC" class="row row-margin rowC">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// END Filter and Product Lines -->
    </div>
    <script>
        $(document).ready(function(){
            //State Filter
            $( "#fstate" ).change(function() {
              var selectedEventType = this.options[this.selectedIndex].value;
                //Personal Lines Filter
                if (selectedEventType == "all") {
                  $('.rowP .filterrowP').removeClass('hidden');
                } else {
                  $('.rowP .filterrowP').addClass('hidden');
                  $('.rowP .filterrowP[data-state*="' + selectedEventType + '"]').removeClass('hidden');
                }
                //Commercial Lines Filter
                if (selectedEventType == "all") {
                  $('.rowC .filterrowC').removeClass('hidden');
                } else {
                  $('.rowC .filterrowC').addClass('hidden');
                  $('.rowC .filterrowC[data-state*="' + selectedEventType + '"]').removeClass('hidden');
                }
            });
        });

        //Create a bind handler for the filter checkboxes
        var $filtercatchk = $('.catchk');

        $filtercatchk.on('change', function(){
            var selectedFilters = {};
            $filtercatchk.filter( ':checked').each( function() {
                if ( !selectedFilters.hasOwnProperty( this.name )) {
                    selectedFilters[ this.name ] = [];
                }
                selectedFilters[ this.name ].push( this.value );
                console.log(selectedFilters);
            });


            //create a collection with all filter elements
            var $filteredResults = $( '.catchk' );
            //Loop over the selected filters array
            $.each( selectedFilters, function( name, filterValues)  {
                //filter Each .catchk element
                $filteredResults = $filteredResults.filter( function() {
                    var matched = false,
                        currentFilterValues = $( this ).data( 'category' ).split(' ');
                    $.each( currentFilterValues , function(_, currentFilterValue) {
                        if ( $.inArray( currentFilterValue, filterValues) != -1 ) {
                            matched = true;
                            return false;
                          }
                    });
                    // if matched is true the current .flower element is returned
                    return matched;

                });
            });
            //$('.rowP .filterrowP').hide().filter($filteredResults).show();
            //$('.rowC .filterrowC').hide().filter($filteredResults).show();

            $('.rowP .filterrowP').addClass('hidden');
            $('.rowP .filterrowP[data-category*="' + $filteredResults + '"]').removeClass('hidden');
        });


        function resetFilters(){
            //reset tiles
            $('.rowP .filterrowP').removeClass('hidden');
            $('.rowC .filterrowC').removeClass('hidden');
            //reset column width
            $('.col-md-10 .ad-personal').removeClass('hidden');
                $('.ad-personal').removeClass('expand');
            $('.col-md-10 .ad-commercial').removeClass('hidden');
                $('.ad-commercial').removeClass('expand');
            //reset inputs to defaults
            $('#fstate').prop('selectedIndex',0);
            $("input[name=filtercat_1]").prop("checked",false);
            $("input[name=filtercat_2]").prop("checked",false);
            $("input[name=filtercat_3]").prop("checked",false);
            $("input[name=filtercat_4]").prop("checked",false);
            $("input[name=filtercat_5]").prop("checked",false);
            $("input[name=filtercat_6]").prop("checked",false);
            $("input[name=filtercat_7]").prop("checked",false);
            $("input[name=filtercat_8]").prop("checked",false);
            $("input[name=filterby][value='0']").prop("checked",true);
        }
        //Check to see if localstorage is supported
        function storageAvailable(type) {
            try {
                var storage = window[type],
                    x = '__storage_test__';
                storage.setItem(x, x);
                storage.removeItem(x);
                return true;
            }
            catch(e) {
                return e instanceof DOMException && (
                    // everything except Firefox
                    e.code === 22 ||
                    // Firefox
                    e.code === 1014 ||
                    // test name field too, because code might not be present
                    // everything except Firefox
                    e.name === 'QuotaExceededError' ||
                    // Firefox
                    e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
                    // acknowledge QuotaExceededError only if there's something already stored
                    storage.length !== 0;
            }
        }
    </script>
</section>
