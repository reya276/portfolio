
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Database Migrate V0.1</title>
        <link rel="stylesheet" href="dbmigrate.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
          $( function() {
            //set the date format
            $( "#gdate" ).datepicker( { dateFormat: 'yy-mm-dd 00:00:00' }).val();

          } );
          function showTables(){
              var dbsource = document.getElementById("dbsource").value;
              //var wptables0 = document.getElementById("wptables0").checked;

              console.log(dbsource +"-"+ wptables0);
              if (dbsource !='none') {
                  $( "#show-tb" ).show();
                  $( "#show-tbt" ).show();
                  document.getElementById("dbtarget").disabled = false;

              } else {
                  $( "#show-tb" ).hide();
                  $( "#show-tbt" ).hide();
                  document.getElementById("dbtarget").disabled = true;
              }
              //Check if all is checked and disable the other checkboxes
              $('#wptables0'). click(function(){
                if($(this). prop("checked") == true){
                    //alert("Checkbox is checked." );
                    document.getElementById("wptables1").disabled = true;
                    document.getElementById("wptables2").disabled = true;
                    document.getElementById("wptables3").disabled = true;
                    document.getElementById("wptables4").disabled = true;
                    document.getElementById("wptables5").disabled = true;
                    document.getElementById("wptables6").disabled = true;
                    document.getElementById("wptables7").disabled = true;
                }
                else if($(this). prop("checked") == false){
                    //alert("Checkbox is unchecked." );
                    document.getElementById("wptables1").disabled = false;
                    document.getElementById("wptables2").disabled = false;
                    document.getElementById("wptables3").disabled = false;
                    document.getElementById("wptables4").disabled = false;
                    document.getElementById("wptables5").disabled = false;
                    document.getElementById("wptables6").disabled = false;
                    document.getElementById("wptables7").disabled = false;

                }
              });

              $('#truncatetbls0'). click(function(){
                if($(this). prop("checked") == true){
                    //alert("Checkbox is checked." );
                    document.getElementById("truncatetbls1").disabled = true;
                    document.getElementById("truncatetbls2").disabled = true;
                    document.getElementById("truncatetbls3").disabled = true;
                    document.getElementById("truncatetbls4").disabled = true;
                    document.getElementById("truncatetbls5").disabled = true;
                    document.getElementById("truncatetbls6").disabled = true;
                    document.getElementById("truncatetbls7").disabled = true;
                }
                else if($(this). prop("checked") == false){
                    //alert("Checkbox is unchecked." );
                    document.getElementById("truncatetbls1").disabled = false;
                    document.getElementById("truncatetbls2").disabled = false;
                    document.getElementById("truncatetbls3").disabled = false;
                    document.getElementById("truncatetbls4").disabled = false;
                    document.getElementById("truncatetbls5").disabled = false;
                    document.getElementById("truncatetbls6").disabled = false;
                    document.getElementById("truncatetbls7").disabled = false;

                }
              });
          }
          function checkEnv() {
              var dbsource = document.getElementById("dbsource").value;
              var dbtarget = document.getElementById("dbtarget").value;
              //check the source and target database
              if (dbsource != 'none' && dbsource == dbtarget) {
                  alert("Source Database Can't be the same as the Target Database!");
                  document.getElementById("dbtarget").disabled = true;

              }
              if (dbsource == 'prod') {
                  var dbsrc = "Production";
                  document.getElementById("dbsrc").innerHTML = dbsrc;
              } else if (dbsource == 'stg'){
                  var dbsrc = "Staging";
                  document.getElementById("dbsrc").innerHTML = dbsrc;
              }
          }
          function seeTable(t){
              if (t == 'yes'){
                  $( "#hideTb" ). show();
              } else {
                  $( "#hideTb" ). hide();
              }
          }
          function showMsg(x) {
              //var xTable = document.getElementById("wptables-7").checked;
              if (x == 1) {
                  selectTable = confirm("Are you sure you want to migrate the WP_OPTIONS table?");
                  alert(selectTable);
              }


          }
          function chkRemLogs(){
              //alert("Are you sure you want to delete the logs from environment?");
              var dbsource = document.getElementById("dbsource").value;
              window.location="remdb_logs.php?rmdblogs=1&dbsource="+dbsource;
          }
          function chkTrgt(){
              var dbtarget = document.getElementById("dbtarget").value;
              if (dbtarget == 'none') {
                  alert("Please select a target environment!");
              }
          }
        </script>


        </head>
    <body onload="showTables();seeTable();">
        <div id="main">
            <div class="txt-a">
                This tool is to migrate data from one environment to another. Please note that you can only migrate data from top to bottom; <br/>
                For example you can migrate data from <span class="txt-b">TOP = Production -> Staging</span> but NOT from <span class="txt-c">BOTTOM = Staging -> Production</span>.
            </div>
            <?php

            if (isset($_GET["Pdone"]) && $_GET["Pdone"] != '')  {
                switch ($_GET["Pdone"]) {
                    case "p":
                        echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP POSTS insert has completed!</span></p>';
                    break;
                    case "pm":
                        echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP POSTMETA insert has completed!</span></p>';
                    break;
                    case "u":
                        echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP USERS insert has completed!</span></p>';
                    break;
                    case "um":
                        echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP USERMETA insert has completed!</span></p>';
                    break;
                    case "oi":
                        echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP ORDER ITEMS insert has completed!</span></p>';
                    break;
                    case "oim":
                        echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP ORDER ITEMMETA insert has completed!</span></p>';
                    break;
                    echo "";
                }

            }
            ?>
            <form id="frm-send" method="POST" action="sync_databases.php">
                <input type="hidden" name="mstart" value="1"/>

                <div class="frm-main">
                    <div class="frm-div">
                        Please select the source database:
                        <select name="dbsource" id="dbsource" class="input-sel" onchange="showTables();checkEnv();">
                            <option value="none" selected='true'>Select source environment</option>
                            <option value="prod">Production</option>
                            <option value="stg">Staging</option>
                        </select>
                        <div class="db-list" id="show-tbt">
                            <li class="db-li"><input type="checkbox" id="wptables0" name="wptables0" value="all" />Select All Tables</li>
                            <li class="db-li"><input type="checkbox" id="wptables1" name="wptables1" value="1" />WP POSTS</li>
                            <li class="db-li"><input type="checkbox" id="wptables2" name="wptables2" value="2" />WP POSTMETA</li>
                            <li class="db-li"><input type="checkbox" id="wptables3" name="wptables3" value="3" />WP USERS</li>
                            <li class="db-li"><input type="checkbox" id="wptables4" name="wptables4" value="4" />WP USERMETA</li>
                            <li class="db-li"><input type="checkbox" id="wptables5" name="wptables5" value="5" />WP WOOCOMMER ORDER ITEMS</li>
                            <li class="db-li"><input type="checkbox" id="wptables6" name="wptables6" value="6" />WP WOOCOMMER ORDER ITEMMETA</li>
                            <li class="db-li"><a href="##" onclick="seeTable('yes');" title="Show Options Table?">Show Options Table?</a></li>
                            <li class="db-li" id="hideTb"><input type="checkbox" id="wptables7" name="wptables7" value="7" onclick="showMsg(1);"/>WP OPTIONS</li>
                            <div class="rem-logs">
                                <h4>Remove <span id="dbsrc" style="color:#b71c1c;"></span> Database Logs</h4>
                                <button type="button" title="Remove Logs" class="frm-bt" onclick="chkRemLogs();">Remove Logs</button>
                            </div>
                        </div>
                    </div>
                    <div class="frm-div">
                        <?php
                        if (isset($_GET["Pdone"]) && $_GET["Pdone"] != '')  {
                            switch ($_GET["Pdone"]) {
                                case "ta":
                                    echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP POSTS truncate has completed!</span></p>';
                                break;
                                case "tb":
                                    echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP POSTMETA truncate has completed!</span></p>';
                                break;
                                case "tc":
                                    echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP USERS truncate has completed!</span></p>';
                                break;
                                case "td":
                                    echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP USERMETA truncate has completed!</span></p>';
                                break;
                                case "te":
                                    echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP ORDER ITEMS truncate has completed!</span></p>';
                                break;
                                case "tf":
                                    echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">Job WP ORDER ITEMMETA truncate has completed!</span></p>';
                                break;
                                case "trnk":
                                echo '<p><span id="isDonetxt" style="color:#b71c1c;font-size:1.5em;font-weight:bold;">All truncate Jobs have completed!</span></p>';
                                break;
                                default:
                                echo "";

                            }

                        }
                        ?>
                        Please select the target database:
                        <select name="dbtarget" id="dbtarget" class="input-sel" onchange="checkEnv();">
                            <option value="none" selected='true'>Select source environment</option>
                            <option value="stg">Staging</option>
                            <option value="dev">Development</option>
                        </select>
                        <div class="db-list" id="show-tb">
                            <li class="db-li"><input type="checkbox" id="truncatetbls0" name="truncatetbls0" value="all" />Truncate All Tables</li>
                            <li class="db-li"><input type="checkbox" id="truncatetbls1" name="truncatetbls1" value="yes" />Truncate WP POSTS</li>
                            <li class="db-li"><input type="checkbox" id="truncatetbls2" name="truncatetbls2" value="yes" />Truncate WP POSTMETA</li>
                            <li class="db-li"><input type="checkbox" id="truncatetbls3" name="truncatetbls3" value="yes" />Truncate WP USERS</li>
                            <li class="db-li"><input type="checkbox" id="truncatetbls4" name="truncatetbls4" value="yes" />Truncate WP USERMETA</li>
                            <li class="db-li"><input type="checkbox" id="truncatetbls5" name="truncatetbls5" value="yes" />Truncate WP WOOCOMMER ORDER ITEMS</li>
                            <li class="db-li"><input type="checkbox" id="truncatetbls6" name="truncatetbls6" value="yes" />Truncate WP WOOCOMMER ORDER ITEMMETA</li>
                            <li class="db-li"><input type="checkbox" id="truncatetbls7" name="truncatetbls7" value="yes" />Truncate WP OPTIONS (Be careful!)</li>
                        </div>
                    </div>
                    <div class="frm-div">
                        Please enter a date:
                        <input type="text" class="frm-input" name="gdate" id="gdate" value="" placeholder="Please select a date" />
                    </div>
                    <div class="frm-div">
                        <button type="submit" name="bt-sub" id="bt-sub" class="frm-bt" onclick="chkTrgt">Start Migration</button>
                    </div>
                    <div></div>
                </div>
            </form>
        </div>
    </body>
</html>
