<?php
    date_default_timezone_set("America/New_York");
    $writeDate = date('Y-m-d');
    $writeDir = "reports";
    $fileNameA = "Report_Coupon_Discounts_By_Month_".$writeDate.".csv";
    $fileNameB = "Report_Coupon_Discounts_By_Year_".$writeDate.".csv";
    $fileNameC = "Report_Coupon_Discounts_Overall_".$writeDate.".csv";
    $rpt_name = '';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Create Discount Reports</title>
        <link rel="stylesheet" href="dbmigrate-nunna.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="fontawesome5.9/css/all.css"/>
        <script>
        $( function() {
            var dateFormat = "yy-mm-dd 00:00:00",
            from = $( "#startdate" )
              .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                dateFormat: "yy-mm-dd 00:00:00"
              })
              .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
              }),
            to = $( "#enddate" ).datepicker({
              defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 3,
              dateFormat: "yy-mm-dd 23:59:00"
            })
            .on( "change", function() {
              from.datepicker( "option", "maxDate", getDate( this ) );
            });

            function getDate( element ) {
            var date;
            try {
              date = $.datepicker.parseDate( element.value );
            } catch( error ) {
              date = null;
            }

            return date;
            }
            $( "#yearDate" ).datepicker( { dateFormat: 'yy' }).val();
            } );
            function showDivs() {
                var rptSelect = $( "#rptSelect" ).val();
                console.log(rptSelect);
                if (rptSelect == 1) {
                    $( "#dateSpan" ).show();
                    $( "#rpt-table-m" ).show();
                    $( "#dateYear" ).hide();
                    $( "#dateOvrAll" ).hide();
                    $( "#rpt-table-y" ).hide();
                    $( "#rpt-table-o" ).hide();
                } else if (rptSelect == 2) {
                    $( "#dateYear" ).show();
                    $( "#rpt-table-y" ).show();
                    $( "#dateOvrAll" ).hide();
                    $( "#dateSpan" ).hide();
                    $( "#rpt-table-m" ).hide();
                    $( "#rpt-table-o" ).hide();
                } else if (rptSelect == 3) {
                    $( "#dateOvrAll" ).show();
                    $( "#rpt-table-o" ).show();
                    $( "#dateSpan" ).hide();
                    $( "#dateYear" ).hide();
                    $( "#rpt-table-m" ).hide();
                    $( "#rpt-table-y" ).hide();
                } else {
                    $( "#dateSpan" ).hide();
                    $( "#dateYear" ).hide();
                    $( "#dateOvrAll" ).hide();
                    $( "#rpt-table-m" ).hide();
                    $( "#rpt-table-y" ).hide();
                    $( "#rpt-table-o" ).hide();
                }
            }
        </script>
    </head>
    <body onload="showDivs();">
        <div id="main">
            <div class="txt-a">
                <div class="logoImg">
                    <img src="./img/Rainbow-unicorn-logo.png"/>
                </div>
               <nav>
                   <h1>Generate Coupon Reports</h1>
                </nav>
                <img class="smokeL" src="img/Smoke_left.png"/>
                <div class="frm-main">
                    <form id="frm-runRpt" name="frm-runRpt" method="POST" action="create_rpt_xls_files.php">
                        <input type="hidden" name="rptstart" value="1"/>
                        <div class="frm-div">
                            <p>
                            <?php
                                if (isset($_GET["Rfinish"])) {
                                    $rpt_name = $_GET['rpt_name'];
                                    switch ($_GET["Rfinish"]) {
                                        case "mcr": {
                            ?>
                                            <select name="rptSelect" id="rptSelect" class="input-sel" onchange="showDivs();">
                                                <option value="0" selected='false'>Selecet a report to generate</option>
                                                <option value="1" selected='true'>Coupons by month</option>
                                                <option value="2">Coupons by Year</option>
                                                <option value="3">Coupons Overall</option>
                                            </select>
                            <?php
                                    break;
                                }
                                    case "ycr": {
                            ?>
                                            <select name="rptSelect" id="rptSelect" class="input-sel" onchange="showDivs();">
                                                <option value="0" selected='false'>Selecet a report to generate</option>
                                                <option value="1">Coupons by month</option>
                                                <option value="2" selected='true'>Coupons by Year</option>
                                                <option value="3">Coupons Overall</option>
                                            </select>
                            <?php
                                    break;
                                }
                                    case "ocr": {
                            ?>
                                            <select name="rptSelect" id="rptSelect" class="input-sel" onchange="showDivs();">
                                                <option value="0" selected='false'>Selecet a report to generate</option>
                                                <option value="1">Coupons by month</option>
                                                <option value="2">Coupons by Year</option>
                                                <option value="3" selected='true'>Coupons Overall</option>
                                            </select>
                            <?php
                                    break;
                                }
                            }
                            ?>

                            <?php } else { ?>
                                    <select name="rptSelect" id="rptSelect" class="input-sel" onchange="showDivs();">
                                        <option value="0" selected='true'>Selecet a report to generate</option>
                                        <option value="1">Coupons by month</option>
                                        <option value="2">Coupons by Year</option>
                                        <option id="Overall"value="3">Coupons Overall</option>
                                    </select>
                            <?php
                            }
                            ?>
                            </p>
                            <div id="dateSpan">
                                <p>Please enter a start date:<br/>
                                    <input type="text" class="frm-input" name="startdate" id="startdate" value="" placeholder="Please select a start date" />
                                <br/></br/>
                                Please enter a end date:<br/>
                                    <input type="text" class="frm-input" name="enddate" id="enddate" value="" placeholder="Please select a end date" />
                                </p>
                            </div>
                            <div id="dateYear">
                                <p>Please enter a year:<br/>
                                    <input type="text" class="frm-input" name="yearDate" id="yearDate" value="" placeholder="Please select a Year" maxlength="4" />
                                </p>
                            </div>
                            <div id="dateOvrAll">
                            <p class="warn">*You have selected to run the Coupons Overall report; This may take a long time to process!</p>
                            </div>

                            <p><button type="submit" id="genRpt" name="genRpt" title="Generate Report" class="frm-bt">Generate Report</button></p>
                            </div>


                            <div>
                                <?php
                                if (isset($_GET["Rfinish"])) {
                                    $rpt_name = $_GET["rpt_name"];
                                    if ($_GET['rpt_name'] == '') {
                                        echo '<p class="rpt_name"></p>';
                                    } else if ($_GET['rpt_name'] != '') {
                                        echo '<p class="rpt_name"> Report <span style="color:red;">'. $rpt_name .'</span> has been successfully generated.</p>';
                                    }
                                }
                            ?>
                            </div>

                        <div id="grid">
                            <?php
                            if (isset($_GET["Rfinish"])) {
                                $Rfinish = $_GET["Rfinish"];
                                $sort_files = $_GET["sort-records"];
                            } else {
                                $Rfinish = "";
                                $sort_files = 0;
                            }
                            //Switch based on the report selected and executed
                            switch ($Rfinish) {
                                case "mcr": {
                                    $rptdir = 'by_month';
                                break;
                                }
                                case "ycr": {
                                    $rptdir = 'by_year';
                                break;
                                }
                                case "ocr": {
                                    $rptdir = 'overall';
                                break;
                                }
                                default: {
                                    $rptdir = "by_month";
                                break;
                                }
                            }
                            if (isset($_GET["Rfinish"])) {
                                $dir = ".";
                                $writeDir = "reports/";
                                $rpt_files = scandir($writeDir.$rptdir);
                                //Switch for sorting files
                                switch ($sort_files) {
                                    case 1:{
                                        sort($rpt_files);
                                        echo '<div id="col-a" title="File Name"><a href="create_reports.php?Rfinish='.$Rfinish.'&rpt_name='.$rpt_name.'&sort-records=2" class="hcsv"><i class="fas fa-sort-amount-down-alt fa-lg"></i></a> File Name</div>';
                                        echo '<div id="col-b" title="Date Created">Date Created</div>';
                                        echo '<div id="col-c" title="Download">Download</div>';
                                    break;
                                    }
                                    case 2:{
                                        arsort($rpt_files);
                                        echo '<div id="col-a" title="File Name"><a href="create_reports.php?Rfinish='.$Rfinish.'&rpt_name='.$rpt_name.'&sort-records=1" class="hcsv"><i class="fas fa-sort-amount-up-alt fa-lg"></i></a> File Name</div>';
                                        echo '<div id="col-b" title="Date Created">Date Created</div>';
                                        echo '<div id="col-c" title="Download">Download</div>';
                                    break;
                                    }
                                    default:{
                                        sort($rpt_files);
                                        echo '<div id="col-a" title="File Name"><a href="create_reports.php?Rfinish='.$Rfinish.'&rpt_name='.$rpt_name.'&sort-records=2" class="hcsv"><i class="fas fa-sort-amount-down-alt fa-lg"></i></a> File Name</div>';
                                        echo '<div id="col-b" title="Date Created">Date Created</div>';
                                        echo '<div id="col-c" title="Download">Download</div>';
                                    }
                                }

                                //sort on
                            ?>
                                <!-- Column headers -->
                                <!-- <div id="col-a" title="File Name">File Name</div>
                                <div id="col-b" title="Date Created">Date Created</div>
                                <div id="col-c" title="Download">Download</div> -->
                                <!-- Reports List -->
                            <?php
                                // Set ignore items
                                $ignore = array(".", "..");
                                // Loop through the file list
                                foreach ($rpt_files as $row) {
                                    if (!in_array($row, $ignore)) {
                                        $file_date = date("F d Y", filemtime($writeDir.$rptdir."/".$row));
                                        //echo "<div id='rpt-a' title='".$row."'> </div>";
                                        echo "<div id='rpt-a' title='".$row."' style='text-align:left;padding-left:10px;'><i class='fas fa-file-csv fa-lg fcsv'></i> <a href='".$writeDir.$rptdir."/".$row."'>".$row."</a></div>";
                                        echo "<div id='rpt-a' title='".$file_date."'>".$file_date."</div>";
                                        echo "<div id='rpt-a' title='".$row."'><a href='".$writeDir.$rptdir."/".$row."'><i class='fas fa-file-download fa-lg'></i> download</a> | <a href='create_rpt_xls_files.php?filename=".$row."&rem=y&dir=".$rptdir."' class='rem'><i class='fas fa-trash-alt fa-lg'></i> Delete</a></div>";

                                    }
                                }
                            }

                             ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <!-- <img class="smokeL" src="img/Smoke_left.png"/> -->
        </footer>
    </body>
</html>
