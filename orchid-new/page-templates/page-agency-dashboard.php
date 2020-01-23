<?php
/*
Template Name: AgencyDashboard */
?>

<!-- Start Page main header -->
<?php get_header(); ?>


 <!---<section class="header-pages-ag" style="height:80px;">
   <div class="container normal">
       <div class="text-holder">

       </div>
   </div>
 </section>--->

  <section class="main-content">
   <div class="container normal">
        <h1 class="h1-a">Agency Dashboard</h1>
        <style>
            #feedback {position: fixed;left:0;bottom:0;height:200px;margin-left: -3px;margin-bottom: 275px; z-index:200 !important;}
            #feedback-tab {
                float:right;color:#ffffff;font-size: 16px;font-weight: 600;cursor:pointer;text-align:center;width:150px;height:50px;background-color: rgba(0, 78, 180, 1);margin:50px 0px 0px -50px;padding-top:0px;
                -moz-border-radius: 0px;-webkit-border-radius: 0px;border-radius: 0px;-webkit-transform: rotate(90deg);-moz-transform: rotate(90deg);-ms-transform: rotate(90deg);-o-transform: rotate(90deg);transform: rotate(90deg); z-index:200 !important;
            }
            #feedback-tab:hover { background-color: rgba(0,0,0,0.4);  z-index:200 !important;}
            #feeedback-tab:a{}
            #feedback-form {
                float:left;width:200px;height:150px;z-index:2147483647;padding: 10px;background-clip: 'padding-box';border:1px solid rgba(0,0,0,0.2);-moz-border-radius: 0px;-webkit-border-radius: 0px;border-radius: 0px;
                -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);-moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);box-shadow: 0 5px 10px rgba(0,0,0,.2);background-color: #ffffff;
            }
        </style>
            <div id="feedback">
                <div id="feedback-form" style='display:none;' class="col-xs-4 col-md-4 panel panel-default">
                    <p style="text-align:center;font-weight:600;padding:0;">
                        <a href="#" onclick="window.open('https://www.surveymonkey.com/r/6YCLC3F','_blank');"><img src="http://orchidinsurance.com/wp-content/themes/orchid-new/assets/img/monkey.png" title="Surveymonkey Feedback" style="border:0 !important;" /></a><br/>
                    <a href="#" onclick="window.open('https://www.surveymonkey.com/r/6YCLC3F','_blank');">Please take our<br/>
                       Customer Feedback<br/>
                       Survey.</a>
                    </p>
                </div>
                <div id="feedback-tab"><a href="#" class="pull_feedback" style="color:#ffffff;font-weight:bold;" title="Feedback Survey">Feedback<br/>Survey</a></div>
            </div>
            <div id="contactorchid" style="position: absolute;top:40px;left:82.5%;border:1px solid #ccc;width:12%;height:auto;padding:0;box-shadow: 3px 3px #cccccc;z-index:100 !important;">
                <div style="float:left;margin-left:10px;text-align:left;">
                      <h5 class="h5-a">Contact Orchid</h5>
                  <p class="agenncy"><strong><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i> :</strong> 772-226-5546</p>
                  <h5 class="h5-a"><strong><i class="fa fa-question-circle fa-lg" aria-hidden="true" style="color:#555555;"></i></strong> Need Help</h5>
                  <p class="agenncy">
                      <a href="http://orchidinsurance.com/agency-dashboard-instructions-2/" class="none" style="text-decoration:none;" target="_blank">Instructional Video</a><br/>
                      <a href="wp-content/themes/orchid-new/assets/pdf/AgencyDashboardGuiderev2.pdf" class="none" style="text-decoration:none;" target="_blank">User's Guide</a>
                  </p>
                </div>
            </div>
    <div id="exg-pol">
       <div class="table-responsive">
            <table width="100%" style="border:0px;border-width: 0 0 0 0;cellpadding:0px;padding:0px;">
              <tr>
                <td style="border:0px;border-width: 0 0 0 0;"><span style="color:#0057B8;font-weight:bold;font-size:1.2em;">Start Here for New Business: </span></td>
                <td style="border:0px;border-width: 0 0 0 0;padding-bottom:5px;"><span style="color:#0057B8;font-weight:bold;font-size:1.2em;">Login to Existing Policies and Quotes:</span></td>
                <td style="border:0px;border-width: 0 0 0 0;padding-bottom:5px;"></td>
              </tr>
              <tr>
                <td id="newbiztour" style="border:0px;border-width: 0 0 0 0;" valign="top">
                  <p>
                    <select id="fstate" name="fstate" style="float:left;padding:8px;width:250px;color:#5a5a5a; border:1px solid #cccccc;background-color:#fff;" onchange="getCaribb();">
                  <option value="all" selected='true'>Select a property location</option>
                  <option value="Caribbean" style="background:#f0f4c3;">Caribbean Properties</option>
                  <option value="Alabama" data-postid="721">Alabama</option>
                  <option value="Arizona" data-postid="1599">Arizona</option>
                  <option value="California" data-postid="1601">California</option>
                  <option value="Colorado" data-postid="1603">Colorado</option>
                  <option value="Connecticut" data-postid="1605">Connecticut</option>
                  <option value="Delaware" data-postid="1686">Delaware</option>
                  <option value="District of Columbia" data-postid="0">District of Columbia</option>
                  <option value="Florida" data-postid="691">Florida</option>
                  <option value="Georgia" data-postid="1608">Georgia</option>
                  <option value="Hawaii" data-postid="1611">Hawaii</option>
                  <option value="Idaho" data-postid="1614">Idaho</option>
                  <option value="Illinois" data-postid="1616">Illinios</option>
                  <option value="Indiana" data-postid="1618">Indiana</option>
                  <option value="Kansas" data-postid="1621">Kansas</option>
                  <option value="Kentucky" data-postid="1624">Kentucky</option>
                  <option value="Louisiana" data-postid="1626">Louisiana</option>
                  <option value="Maine" data-postid="1628">Maine</option>
                  <option value="Maryland" data-postid="1630">Maryland</option>
                  <option value="Massachusetts" data-postid="1249">Massachusetts</option>
                  <option value="Michigan" data-postid="1632">Michigan</option>
                  <option value="Minnesota" data-postid="1635">Minnesota</option>
                  <option value="Mississippi" data-postid="1637">Mississippi</option>
                  <option value="Missouri" data-postid="1640">Missouri</option>
                  <option value="Montana" data-postid="1642">Montana</option>
                  <option value="Nevada" data-postid="1644">Nevada</option>
                  <option value="New Hampshire" data-postid="1649">New Hampshire</option>
                  <option value="New Jersey" data-postid="1646">New Jersey</option>
                  <option value="New York" data-postid="1275">New York</option>
                  <option value="North Carolina" data-postid="1679">North Carolina</option>
                  <option value="Ohio" data-postid="1651">Ohio</option>
                  <option value="Oklahoma" data-postid="1653">Oklahoma</option>
                  <option value="Oregon" data-postid="1655">Oregon</option>
                  <option value="Pennsylvania" data-postid="1657">Pennsylvania</option>
                  <option value="Rhode Island" data-postid="1659">Rhode Island</option>
                  <option value="South Carolina" data-postid="1681">South Carolina</option>
                  <option value="Tennessee" data-postid="1661">Tennessee</option>
                  <option value="Texas" data-postid="1683">Texas</option>
                  <option value="Utah" data-postid="1663">Utah</option>
                  <option value="Vermont" data-postid="1665">Vermont</option>
                  <option value="Virginia" data-postid="1667">Virginia</option>
                  <option value="Washington" data-postid="1670">Washington</option>
                  <option value="Wisconsin" data-postid="1675">Wisconsin</option>
                  <option value="West Virginia" data-postid="1672">West Virginia</option>
                  <option value="Wyoming" data-postid="1677">Wyoming</option>
                </select>
              </p>
              <br/>
                  <div style="display:inline;position:relative;top:0px;left:3px;">
                    <label style="position:relative;top:0px;font-size:0.8em;font-weight:normal;">Make this my default location:<label> <input type="checkbox" value="1" id="locdefault" onclick="setCookies('OrchidDash',fstate,'365');" name="locdefault" style="position:relative;top:5px;" />
                  </div>
              </td>
                <td id="exbiztour" valign="top" style="border:0px;border-width: 0 0 0 0;display:inline;">
                  <div style="float:left;margin-top:-7px;">
                      <button class="btn btn-info" title="Orchid PolicyPlus" onclick="defaultLogin('3');"><i class="orc-orchid-logo" aria-hidden="true" style="color:#fff;font-size:18px;"></i>Orchid Policy Plus</button>
                      <button class="btn btn-info" title="Coastal Agents Alliance" onclick="defaultLogin('1');"><i class="coast-coastal-logo" aria-hidden="true" style="color:#fff;font-size:18px;"></i>Coastal Agents Alliance</button>
                      <button class="btn btn-info" title="Orchid Connect" onclick="window.open('http://connect.orchidinsurance.com','_blank');"><i class="orc-orchid-logo" aria-hidden="true" style="color:#fff;font-size:18px;"></i>Orchid Connect</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="left" style="border:0px;border-width: 0 0 0 0;">
                </td>
              </tr>
              <tr><td colspan="2" style="border:0px;border-width: 0 0 0 0;">
                  </td>
              </tr>
            </table>
          </div>
    </div>
    <div id="content">
             <div id="left-cont">
                 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                     <?php the_content(); ?>
                 <?php endwhile; else: ?>
                     <?php _e( 'Sorry, no pages matched your criteria.', 'textdomain' ); ?>
                 <?php endif; ?>
             </div>
             <div id="right-cont">
             <span class="h2-a" id="announcements">Announcements</span>
             <div class="col-ann">
            	<?php $query = new WP_Query( array( 'category_name' => 'Announcements','orderby' => 'post_title', 'order' => 'ASC' ) ); ?>
            	<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="row-1"><div class="col-lg-1"><h4 class="h4-a"><?php the_title(); ?></h4><div class="annTypeColor" style="color: #006cb4;margin-top:-8px;margin-right:10px;"><i class="material-icons md-18">&#xE85A;</i></div><span style="float:left;padding:0px;margin-top:-3px;"><?php the_content(); ?></span></div></div>
                <?php endwhile;
                wp_reset_postdata();
                else : ?>
                <span class="h2-a" id="announcements">Announcements</span><div class="col-ann"><div class="row-1"><div class="col-lg-1"><p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p></div></div></div>
                <?php endif; ?>
               </div>
             </div>
    </div>
   </div>
  </section>

 <?php get_footer(); ?>
