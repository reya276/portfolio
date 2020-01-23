<?php
// Start Database connection
$usrnameProd = '<username>';
$passwdProd = '<password>';
$dbnameProd = '<databasename>';
$serverIP = '0.0.0.0:3306';

$connProd = new mysqli($serverIP, $usrnameProd, $passwdProd, $dbnameProd);

//date_default_timezone_set("America/New_York");
$outputData = "";
$writeDate = date('Y-m-d');
$writeDir = "reports";
$monthdir = $writeDir."/by_month";
$yeardir = $writeDir."/by_year";
$overalldir = $writeDir."/overall";
//Delete File(s) from Directory
if ($_GET["filename"] !="" && $_GET["rem"] == 'y') {
    $filename = $_GET["filename"];
    switch ($_GET["dir"]) {
        case "by_month": {
            //Change directory
            chdir($monthdir);
            //Delete file
            if (!unlink($filename)) {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbreports/create_reports.php?Rfinish=mcr&rpt_name=". $fileNameA ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbreports/create_reports.php?Rfinish=mcr&rpt_name=". $fileNameA ."&sort-records=1"));
                }
            } else {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbreports/create_reports.php?Rfinish=mcr&rpt_name=". $fileNameA ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbreports/create_reports.php?Rfinish=mcr&rpt_name=". $fileNameA ."&sort-records=1"));
                }
            }
        break;
        }
        case "by_year": {
            //Change directory
            chdir($yeardir);
            //Delete file
            if (!unlink($filename)) {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbreports/create_reports.php?Rfinish=ycr&rpt_name=". $fileNameB ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbreports/create_reports.php?Rfinish=ycr&rpt_name=". $fileNameB ."&sort-records=1"));
                }
            } else {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbreports/create_reports.php?Rfinish=ycr&rpt_name=". $fileNameB ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbreports/create_reports.php?Rfinish=ycr&rpt_name=". $fileNameB ."&sort-records=1"));
                }
            }
        break;
        }
        case "overall": {
            //Change directory
            chdir($overalldir);
            //Delete file
            if (!unlink($filename)) {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbreports/create_reports.php?Rfinish=ycr&rpt_name=". $fileNameC ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbreports/create_reports.php?Rfinish=ycr&rpt_name=". $fileNameC ."&sort-records=1"));
                }
            } else {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbreports/create_reports.php?Rfinish=ocr&rpt_name=". $fileNameC ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbreports/create_reports.php?Rfinish=ocr&rpt_name=". $fileNameC ."&sort-records=1"));
                }
            }
        break;
        }
    }

}
//Switch based on the type of report selected
switch($_POST["rptSelect"]) {
    case "1": {
        //change Directory
        chdir($monthdir);
        $fileNameA = "Report_Coupon_Discounts_By_Month_".$writeDate.".csv";
        $randomGen = rand(10, 25);
        $increment = $randomGen;
        //Check to see if the file already exists and create a new one so it does not get overwriten
        if (file_exists($fileNameA)) {
            while (file_exists($fileNameA)) {
                $fileNameA = $increment .'-'. $fileNameA;
                $increment++;
            }
        }
    break;
    }
    case "2": {
        //change Directory
        chdir($yeardir);
        $fileNameB = "Report_Coupon_Discounts_By_Year_".$writeDate.".csv";
        $randomGen = rand(10, 25);
        $increment = $randomGen;
        //Check to see if the file already exists and create a new one so it does not get overwriten
        if (file_exists($fileNameB)) {
            while (file_exists($fileNameB)) {
                $fileNameB = $increment .'-'. $fileNameB;
                $increment++;
            }
        }
    break;
    }
    case "3": {
        //change Directory
        chdir($overalldir);
        $fileNameC = "Report_Coupon_Discounts_Overall_".$writeDate.".csv";
        $randomGen = rand(10, 25);
        $increment = $randomGen;
        //Check to see if the file already exists and create a new one so it does not get overwriten
        if (file_exists($fileNameC)) {
            while (file_exists($fileNameC)) {
                $fileNameC = $increment .'-'. $fileNameC;
                $increment++;
            }
        }
    break;
    }

}

//create file name from selected report
if (isset($_POST["rptstart"])) {
    $rptSelect = $_POST["rptSelect"];

    switch ($rptSelect) {
        //Coupon Report By Month(s)
        case "1": {
            $startMonth = $_POST["startdate"];
            $endMonth = $_POST["enddate"];
            // GET Coupon Report By Month
            if (isset($startMonth) && isset($endMonth)) {
                $queryA = "SELECT oi.order_item_name AS CouponName, sum(oim.meta_value) AS DiscountGiven, sum(oim.meta_value)*3 AS TotalAfterDiscount
                FROM wp_woocommerce_order_items AS oi INNER JOIN wp_woocommerce_order_itemmeta AS oim ON oi.order_item_id = oim.order_item_id INNER JOIN wp_posts AS pst ON oi.order_id = pst.id
                WHERE order_item_type = 'coupon' AND meta_key = 'discount_amount' AND (pst.post_date BETWEEN '".$startMonth."' AND '".$endMonth."') AND pst.post_status IN ('wc-processing', 'wc-completed')
                GROUP BY oi.order_item_name
                ORDER BY oi.order_item_name DESC";
                    //Start Report by month file write
                    if ($resultsA = $connProd->query($queryA)) {
                        $connProd->query($queryA);
                            //Change directory
                            chdir($monthdir);
                            //Set file permission
                            chmod($fileNameA, 0775);
                            //Create empty array
                            $outputData = array();
                            echo getcwd();
                            //Open file stream
                            fopen($fileNameA, 'w');
                                //Set headers
                                header('Content-Type: text/csv');
                                header('Content-Disposition: attachment; filename="'.$fileNameA.'"');
                                header('Pragma: no-cache');
                                header('Expires: 0');
                            //check to see if the file is writable
                            if (is_writable($fileNameA)) {

                                if (!$handle = fopen($fileNameA, 'a')) {
                                     echo "Cannot open file ($fileNameA)";
                                     //exit;
                                }
                                //Write the header columns
                                fwrite($handle, "CouponName,DiscountGiven,TotalAfterDiscount\n");
                                // Loop through records
                                while ($row = $resultsA->fetch_row()) {
                                    //$outputData = "$row[0],$row[1],$row[2]\n";
                                    foreach($resultsA as $row) {
                                        //Write as CSV
                                        fputcsv($handle,array_values($row));
                                    }
                                    // Write $outputData to our opened file.
                                    if (fwrite($handle, $outputData) === FALSE) {
                                        echo "Cannot write to file ($fileNameA)";
                                        //exit;
                                    }
                                }
                                echo "Success, wrote ($outputData) to file ($fileNameA)";
                                fclose($handle);

                            } else {
                                echo "The file $fileNameA is not writable";
                            }
                        /* free result set */
                        $resultsA->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='dbreports/create_reports.php?Rfinish=mcr&rpt_name=". $fileNameA ."&sort-records=1'</script>");
                        } else {
                              exit(header("Location: /dbreports/create_reports.php?Rfinish=mcr&rpt_name=". $fileNameA . "&sort-records=1"));
                        }
                    }
                // Close database connection
                $connProd->close();
            }
            echo "Run by month(s) - ".$startMonth. "-" .$endMonth;
        break;
        }
        //Coupons Report By Year
        case "2": {
            $startYear = $_POST["yearDate"];
            //Get Coupon Report By Year
            if (isset($startYear)) {
                $queryB = "SELECT oi.order_id AS OrderID,oi.order_item_name AS CouponName,oi.order_item_type AS OrderItemType, wwoi.meta_value AS DiscountGiven, pst.post_date AS PostDate, sum(wwoi.meta_value) AS TotalAfterDiscount
                FROM wp_woocommerce_order_items AS oi INNER JOIN wp_posts AS pst ON pst.ID = oi.order_id
                INNER JOIN wp_postmeta AS pm ON pm.post_id = pst.ID
                INNER JOIN wp_bang_us3.wp_woocommerce_order_itemmeta wwoi ON oi.order_item_id = wwoi.order_item_id
                WHERE oi.order_item_type = 'coupon' AND wwoi.meta_key LIKE '%_line_total%' AND wwoi.meta_value != 0 AND pst.post_date >= '".$startYear."'
                GROUP BY oi.order_id,oi.order_item_name,oi.order_item_type, wwoi.meta_value, pst.post_date
                ORDER BY pst.post_date DESC";
                //Start Report by year file write
                if ($resultsB = $connProd->query($queryB)) {
                    $connProd->query($queryB);
                        //Change directory
                        chdir($yeardir);
                        //Set file permission
                        chmod($fileNameB, 0775);
                        //Create empty array
                        $outputData = array();
                        echo getcwd();
                        //Open file stream
                        fopen($fileNameB, 'w');
                            //Set headers
                            header('Content-Type: text/csv');
                            header('Content-Disposition: attachment; filename="'.$fileNameB.'"');
                            header('Pragma: no-cache');
                            header('Expires: 0');
                        //Check to see if the file3 is writable
                        if (is_writable($fileNameB)) {

                            if (!$handle = fopen($fileNameB, 'a')) {
                                 echo "Cannot open file ($fileNameB)";
                                 //exit;
                            }
                            //Write the header columns
                            fwrite($handle, "OrderID,CouponName,OrderItemType,DiscountGiven,PostDate,TotalAfterDiscount\n");
                            // Loop through records
                            while ($row = $resultsB->fetch_row()) {
                                //$outputData = "$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]\n";
                                foreach($resultsB as $row) {
                                    //Write as csv
                                    fputcsv($handle,array_values($row));
                                }
                                // Write $outputData to our opened file.
                                if (fwrite($handle, $outputData) === FALSE) {
                                    echo "Cannot write to file ($fileNameB)";
                                    //exit;
                                }
                            }
                            echo "Success, wrote ($outputData) to file ($fileNameB)";
                            fclose($handle);

                        } else {
                            echo "The file $fileNameB is not writable";
                        }
                    /* free result set */
                    $resultsB->close();
                    //Redirect
                    if (headers_sent()) {
                          die("<script>window.location='dbreports/create_reports.php?Rfinish=ycr&rpt_name=". $fileNameB ."&sort-records=1'</script>");
                    } else {
                          exit(header("Location: /dbreports/create_reports.php?Rfinish=ycr&rpt_name=". $fileNameB ."&sort-records=1"));
                    }
                }
                // Close database connection
                $connProd->close();
            }
            echo "Run by year";
        break;
        }
        //Coupon Report Overall
        case "3": {
            $startOverall = "Yes";
            if (isset($startOverall)) {
                $queryC = "SELECT oi.order_id AS OrderID,oi.order_item_name AS CouponName,oi.order_item_type AS OrderItemType, wwoi.meta_value AS DiscountGiven, pst.post_date AS PostDate, sum(wwoi.meta_value) AS TotalAfterDiscount
                FROM wp_woocommerce_order_items AS oi INNER JOIN wp_posts AS pst ON pst.ID = oi.order_id
                INNER JOIN wp_postmeta AS pm ON pm.post_id = pst.ID
                INNER JOIN wp_bang_us3.wp_woocommerce_order_itemmeta wwoi ON oi.order_item_id = wwoi.order_item_id
                WHERE oi.order_item_type = 'coupon' AND wwoi.meta_key LIKE '%_line_total%' AND wwoi.meta_value != 0
                GROUP BY oi.order_id,oi.order_item_name,oi.order_item_type, wwoi.meta_value, pst.post_date
                ORDER BY pst.post_date DESC";
                //Start Report by year file write
                if ($resultsC = $connProd->query($queryC)) {
                    $connProd->query($queryC);
                        //Change directory
                        chdir($overalldir);
                        //Set file permission
                        chmod($fileNameC, 0775);
                        //Create empty array
                        $outputData = array();
                        echo getcwd();
                        //Open file stream
                        fopen($fileNameC, 'w');
                            //Set headers
                            header('Content-Type: text/csv');
                            header('Content-Disposition: attachment; filename="'.$fileNameC.'"');
                            header('Pragma: no-cache');
                            header('Expires: 0');
                            //check to see if the file is writable
                        if (is_writable($fileNameC)) {

                            if (!$handle = fopen($fileNameC, 'a')) {
                                 echo "Cannot open file ($fileNameC)";
                                 //exit;
                            }
                            //Write the header columns
                            fwrite($handle, "OrderID,CouponName,OrderItemType,DiscountGiven,PostDate,TotalAfterDiscount\n");
                            // Loop through records
                            while ($row = $resultsC->fetch_row()) {
                                //$outputData = "$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]\n";
                                foreach($resultsC as $row) {
                                    //Write as CSV
                                    fputcsv($handle,array_values($row));
                                }
                                // Write $outputData to our opened file.
                                if (fwrite($handle, $outputData) === FALSE) {
                                    echo "Cannot write to file ($fileNameC)";
                                    //exit;
                                }
                            }
                            echo "Success, wrote ($outputData) to file ($fileNameC)";
                            fclose($handle);

                        } else {
                            echo "The file $fileNameC is not writable";
                        }
                    /* free result set */
                    $resultsC->close();
                    //Redirect
                    if (headers_sent()) {
                          die("<script>window.location='dbreports/create_reports.php?Rfinish=ocr&rpt_name=". $fileNameC ."&sort-records=1'</script>");
                    } else {
                          exit(header("Location: /dbreports/create_reports.php?Rfinish=ocr&rpt_name=". $fileNameC ."&sort-records=1"));
                    }
                }
                // Close database connection
                $connProd->close();
            }
            echo "Run by overall";
        break;
        }
    }

}

 ?>
