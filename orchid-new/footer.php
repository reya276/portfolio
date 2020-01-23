<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>


<footer>
    <div class="container large">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p class="f-logo"><img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo.png" alt="Orchid"></p>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <h4>Products</h4>
                <div class="botNav clearfix">
                    <?php
											wp_nav_menu( array(
													'menu'              => 'secondary',
													'theme_location'    => 'secondary',
													'depth'             => 2,
													'container'         => 'div',
													'menu_class'        => 'botNav',
													'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
													'walker'            => new wp_bootstrap_navwalker())
											);
									?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <h4>About Us</h4>
                <div class="botNav clearfix">
                    <?php
											wp_nav_menu( array(
													'menu'              => 'tertiary',
													'theme_location'    => 'tertiary',
													'depth'             => 2,
													'container'         => 'div',
													'menu_class'        => 'botNav',
													'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
													'walker'            => new wp_bootstrap_navwalker())
											);
									?>
                </div>
            </div>
        </div>

        <p class="copyright">Copyright © 2016  Orchid</p>


        <div  class="f-social clearfix">
            <ul>
                <li><a href="https://www.linkedin.com/company/orchid-insurance" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

			<!-- Modal Company Info -->
<div class="modal fade modal-generic-style" id="company-info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Orchid</h4>
      </div>
      <div class="modal-body">
       "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
      </div><!-- /modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal More Discmalimer -->
<div class="modal fade modal-generic-style" id="more-dislaimer" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Orchid</h4>
      </div>
      <div class="modal-body">
       "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
      </div><!-- /modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Start Velocity Modal(images) -->
      <div class="modal fade" id="velocity" role="dialog">
        <!-- Start modal -->
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div id="loginImg" align="center">
                </div>
            </div>
            <!-- Body -->
            <div class="modal-body">
                <p>If you are not an Orchid Agent and need access to our online quoting system, please contact Agency Services at 772-237-8545.</p>
                  <span id="ModalLabel" style="font-size:0.9em;font-weight:bold;color:#004EB4;"></span>
                <form id='modalform' name='loginForm' MEthod="POST" >
                  <div id="chkradio">
                    <input type="hidden" id="progA" value="" />
                  </div>
				<div id="uslitxt"></div>
                <label for="State">Property Location: </label>&nbsp;<span id="state" style="font-weight:600;color:#004EB4;"></span>
                <div id="sysdiv">
                  <div class="form-group">
                    <label for="System">Provider(s):</label>
                    <br/>
                    <div id="providers" style="border: 1px dotted #5a5a5a;padding:5px;">
                    </div>
                  </div>
                </div>
                <!-- Only Show for high network -->
                <div id="hnwapp">
                </div>
                <div class="form-group" id="usr">
                  <p id="demo"></p>
                  <div id="caamsgdiva" class="text-left"></div>
                  <p id="loginerror" style="color:#a31818;font-weight:bold;"> </p>
                  <label for="username">Username:</label>

                </div>
                <div class="form-group" id="pwd">
                  <label for="password">Password:</label>

                </div>
                <div class="checkbox">
                  <label><input type="checkbox"> Remember me</label>
                  </div>
                  <button type="button" id="subbutton" onclick="submitForm();" class="btn btn-primary">Log In</button>
                  <span id="ForgotP" style="font-size:0.8em;"></span>
                </form>
            </div>
            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<!-- Start tour Modal -->
      <div class="modal fade" id="agenttour" role="dialog">
        <!-- Start modal -->
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="h5-a"style="text-align:center;"><span id="greetings"></span></h5>
              <p style="text-align:center;color:#4c4f51;"><i class="material-icons md-48">account_circle</i></p>
            </div>
            <div class="modal-body">
              <p>Welcome to the new Agency Dashboard. This will give you a brief tour of the new dashboard.</p>
              <p style="text-align:center;font-weight:bold;"><button type="button" onclick="startTour();" class="btn-info" title="Start the tour"><i class="fa fa-play-circle fa-2x" aria-hidden="true"></i> <span style="position:relative;top:-3px;">Start Tour</span></button></p>
              <p style="text-align:center">
                <a href="#" id="skipTour" onclick="skiptit();" title="Skip Tour">Skip Tour</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- Start modal for existing policies -->
      <div class="modal fade" id="defaultLogin" role="dialog">
        <!-- Start modal -->
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <!-- <p style="text-align:left"><i class="material-icons md-24-l">account_circle</i> -->
                <div id="loginImgA" align="center">

                </div>
              <!-- </p> -->
            </div>
            <!-- Body -->
            <div class="modal-body">
                <p>If you are not an Orchid Agent and need access to our online quoting system, please contact Agency Services at 772-237-8545.</p>
                  <p id="ModalLabelA" style="font-size:0.9em;font-weight:bold;color:#004EB4;"></p>
                <form id='modalformA' name='loginFormA' Method="POST" enctype="application/x-www-form-urlencoded">
                 <div id="chkradioA">
                   <input type="hidden" id="progA" value="" />
                  </div>
                <div id="switchcaa">
                <div class="form-group" id="usrA">
                  <p id="demoA"></p>
                  <div id="caamsgdivb" class="text-left"></div>
                  <p id="loginerrorA" style="color:#a31818;font-weight:bold;"> </p>
                  <label for="usernameA">Username:</label>

                </div>
                <div class="form-group" id="pwdA">
                  <label for="passwordA">Password:</label>

                </div>
                <div class="checkbox">
                  <label><input type="checkbox"> Remember me</label>
                  </div>
                  <button type="button" onclick="submitExisting();" class="btn btn-primary">Log In</button>
                  <span id="ForgotPA" style="font-size:0.8em;"></span>
                </div>
                </form>

            </div>
            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
	<?php wp_footer(); ?>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/getfilters.js?v=1.1"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/submitforms.js?v=1.1.4"></script>
</body>
</html>
