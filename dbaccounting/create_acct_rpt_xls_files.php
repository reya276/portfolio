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
$filename = '';
$rem = '';
//Check for filename
if (isset($_GET["filename"])) {
    $filename = $_GET["filename"];
    $rem = $_GET["rem"];
} else if (isset($_POST["filename"])) {
    $filename = $_POST["filename"];
    $rem = $_POST["rem"];
}

//Delete File(s) from Directory
if ($filename != '' && $rem == 'y') {
    //Switch on direcrory
    switch ($_GET["dir"]) {
        case "by_month":{
            chdir($monthdir);
            //Delete file
            if (!unlink($filename)) {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbaccounting/create_acct_rpt.php?Rfinish=mcr&rpt_name=". $fileNameE ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbaccounting/create_acct_rpt.php?Rfinish=mcr&rpt_name=". $fileNameE ."&sort-records=1"));
                }
            } else {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbaccounting/create_acct_rpt.php?Rfinish=mcr&rpt_name=". $fileNameE ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbaccounting/create_acct_rpt.php?Rfinish=mcr&rpt_name=". $fileNameE ."&sort-records=1"));
                }
            }
        break;
        }
        case "by_year":{
            chdir($yeardir);
            //Delete file
            if (!unlink($filename)) {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbaccounting/create_acct_rpt.php?Rfinish=ycr&rpt_name=". $fileNameE ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbaccounting/create_acct_rpt.php?Rfinish=ycr&rpt_name=". $fileNameE ."&sort-records=1"));
                }
            } else {
                //Redirect
                if (headers_sent()) {
                      die("<script>window.location='dbaccounting/create_acct_rpt.php?Rfinish=ycr&rpt_name=". $fileNameE ."&sort-records=1'</script>");
                } else {
                      exit(header("Location: /dbaccounting/create_acct_rpt.php?Rfinish=ycr&rpt_name=". $fileNameE ."&sort-records=1"));
                }
            }
        break;
        }
    }


}

//Switch based on the type of report selected
    switch ($_POST["rptSelect"]) {
        case "1":{
            //change directory
            chdir($monthdir);
            $fileNameE = "Report_Sales_By_Month_no_productname_" .$writeDate. ".csv";
            $randomGen = rand(10, 25);
            $increment = $randomGen;
            //Check to see if the file already exists and create a new one so it does not get overwriten
            if (file_exists($fileNameE)) {
                while (file_exists($fileNameE)) {
                    $fileNameE = $increment .'-'. $fileNameE;
                    $increment++;
                }
            }
        break;
        }
        case "2":{
            //change directory
            chdir($monthdir);
            $fileNameE = "Report_Sales_By_Month_with_productname_".$writeDate.".csv";
            $randomGen = rand(10, 25);
            $increment = $randomGen;
            //Check to see if the file already exists and create a new one so it does not get overwriten
            if (file_exists($fileNameE)) {
                while (file_exists($fileNameE)) {
                    $fileNameE = $increment .'-'. $fileNameE;
                    $increment++;
                }
            }
        break;
        }
        case "3":{
            //change directory
            chdir($yeardir);
            $fileNameF = "Report_Sales_By_Year_no_productname_".$writeDate.".csv";
            $randomGen = rand(10, 25);
            $increment = $randomGen;
            //Check to see if the file already exists and create a new one so it does not get overwriten
            if (file_exists($fileNameF)) {
                while (file_exists($fileNameF)) {
                    $fileNameF = $increment .'-'. $fileNameF;
                    $increment++;
                }
            }
        break;
        }
        case "4":{
            //change directory
            chdir($yeardir);
            $fileNameF = "Report_Sales_By_Year_with_productname_".$writeDate.".csv";
            $randomGen = rand(10, 25);
            $increment = $randomGen;
            //Check to see if the file already exists and create a new one so it does not get overwriten
            if (file_exists($fileNameF)) {
                while (file_exists($fileNameF)) {
                    $fileNameF = $increment .'-'. $fileNameF;
                    $increment++;
                }
            }
        break;
        }
    }


//create file name from selected report
if (isset($_POST["rptstart"])) {
    $rptSelect = $_POST["rptSelect"];
    //Switch on the report selected
    switch ($rptSelect){
        case "1":{
            $startMonth = $_POST["startdate"];
            $endMonth = $_POST["enddate"];
            //echo $startMonth . "-" .$endMonth;
            // GET Coupon Report By Month
            if (isset($startMonth) && isset($endMonth)) {
                $queryE = "SELECT P.ID AS OrderID,P.post_status AS OrderStatus, P.post_date AS OrderDate,
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_first_name') as 'First Name (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_last_name') as 'Last Name (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_1') as 'Address 1 (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_2') as 'Address 2 (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_city') as 'City (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_state') as 'State (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_postcode') as 'Postcode (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_country') as 'Country (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_email') as 'Email (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_first_name') as 'First Name (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_last_name') as 'Last Name (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_1') as 'Address 1 (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_2') as 'Address 2 (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_city') as 'City (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_state') as 'State (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_postcode') as 'Postcode (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_country') as 'Country (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_cart_discount') as 'Discount (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_shipping') as 'Shipping (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_tax') as 'Tax (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_total') as 'Total (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_prices_include_tax') as 'Prices With Tax'
                FROM wp_posts AS P
                where P.post_date BETWEEN cast('".$startMonth."' as DATE) and CAST('".$endMonth."' as DATE) AND P.post_type='shop_order'
                GROUP BY P.ID,P.post_status, P.post_date
                order by P.post_date, P.ID DESC";

                //start sales report by month
                if ($resultsE = $connProd->query($queryE)) {
                    $connProd->query($queryE);
                    //Change directory
                    chdir($monthdir);
                    //Set file permission
                    chmod($fileNameE, 0775);
                    //Create empty array
                    $outputData = array();
                    echo getcwd();
                    //Open file stream
                    fopen($fileNameE, "w");
                        //Set headers
                        header('Content-Type: text/csv');
                        header('Content-Disposition: attachment; filename="'.$fileNameE.'"');
                        header('Pragma: no-cache');
                        header('Expires: 0');
                    //check to see if the file is writable
                    if (is_writable($fileNameE)) {

                        if (!$handle = fopen($fileNameE, 'a')) {
                             echo "Cannot open file ($fileNameE)";
                             //exit;
                        }
                        //Write the header columns
                        fwrite($handle, "OrderID, OrderStatus, OrderDate, First_Name(Billing), Last_Name(Billing), Address1(Billing), Address2(Billing), City(Billing), State(Billing), Postcode(Billing), Country(Billing), Email(Billing), First_Name(Shipping),Last_Name(Shipping), Address1(Shipping), Address2(Shipping), City(Shipping), State(Shipping), Postcode(Shipping), Country(Shipping), Discount(Order), Shipping(Order), Tax(Order), Total(Order), Prices_With_Tax\n");
                        // Loop through records
                        while ($row = $resultsE->fetch_row()) {
                            //$outputData = "$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14],$row[15],$row[16],$row[17],$row[18],$row[19],$row[20],$row[21],$row[22],$row[23],$row[24]\n";
                            foreach($resultsE as $row) {
                                //write as CSV
                                fputcsv($handle,array_values($row));
                            }
                            // Write $outputData to our opened file.
                            if (fwrite($handle, $outputData) === FALSE) {
                                echo "Cannot write to file ($fileNameE)";
                                //exit;
                            }
                        }
                        echo "Success, wrote ($outputData) to file ($fileNameE)";
                        fclose($handle);

                    } else {
                        echo "The file $fileNameE is not writable";
                    }
                    /* free result set */
                    $resultsE->close();
                    //Redirect
                    if (headers_sent()) {
                          die("<script>window.location='dbaccounting/create_acct_rpt.php?Rfinish=mcr&rpt_name=". $fileNameE ."&sort-records=1'</script>");
                    } else {
                          exit(header("Location: /dbaccounting/create_acct_rpt.php?Rfinish=mcr&rpt_name=". $fileNameE ."&sort-records=1"));
                    }
                }
                // Close database connection
                $connProd->close();
            }
            echo "Run by month(s) without product name";
        break;
        }
        case "2":{
            $startMonth = $_POST["startdate"];
            $endMonth = $_POST["enddate"];
            //echo $startMonth . "-" .$endMonth;
            // GET Coupon Report By Month
            if (isset($startMonth) && isset($endMonth)) {
                $queryE = "SELECT P.ID AS OrderID, oi.order_item_name as ItemName, P.post_status AS OrderStatus, P.post_date AS OrderDate,
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_first_name') as 'First Name (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_last_name') as 'Last Name (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_1') as 'Address 1 (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_2') as 'Address 2 (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_city') as 'City (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_state') as 'State (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_postcode') as 'Postcode (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_country') as 'Country (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_email') as 'Email (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_first_name') as 'First Name (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_last_name') as 'Last Name (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_1') as 'Address 1 (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_2') as 'Address 2 (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_city') as 'City (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_state') as 'State (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_postcode') as 'Postcode (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_country') as 'Country (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_cart_discount') as 'Discount (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_shipping') as 'Shipping (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_tax') as 'Tax (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_total') as 'Total (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_prices_include_tax') as 'Prices With Tax'
                FROM wp_posts P inner join wp_woocommerce_order_items as oi on P.id = oi.order_id
                WHERE P.post_date BETWEEN cast('".$startMonth."' as DATE) and CAST('".$endMonth."' as DATE) AND P.post_type='shop_order'
                GROUP BY P.ID, oi.order_item_name,P.post_status, P.post_date
                ORDER BY P.post_date, P.ID DESC";

                //start sales report by month
                if ($resultsE = $connProd->query($queryE)) {
                    $connProd->query($queryE);
                    //Change directory
                    chdir($monthdir);
                    //Set file permission
                    chmod($fileNameE, 0775);
                    //Create empty array
                    $outputData = array();
                    echo getcwd();
                    //Open file stream
                    fopen($fileNameE, "w");
                        //Set headers
                        header('Content-Type: text/csv');
                        header('Content-Disposition: attachment; filename="'.$fileNameE.'"');
                        header('Pragma: no-cache');
                        header('Expires: 0');
                    //check to see if the file is writable
                    if (is_writable($fileNameE)) {

                        if (!$handle = fopen($fileNameE, 'a')) {
                             echo "Cannot open file ($fileNameE)";
                             //exit;
                        }

                        //Write the header columns
                        fwrite($handle, "OrderID, ItemName, OrderStatus, OrderDate, First_Name(Billing), Last_Name(Billing), Address1(Billing), Address2(Billing), City(Billing), State(Billing), Postcode(Billing), Country(Billing), Email(Billing), First_Name(Shipping),Last_Name(Shipping), Address1(Shipping), Address2(Shipping), City(Shipping), State(Shipping), Postcode(Shipping), Country(Shipping), Discount(Order), Shipping(Order), Tax(Order), Total(Order), Prices_With_Tax\n");
                        // Loop through records
                        while ($row = $resultsE->fetch_row()) {
                            foreach($resultsE as $row) {
                                //$outputData = array("$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14],$row[15],$row[16],$row[17],$row[18],$row[19],$row[20],$row[21],$row[22],$row[23],$row[24],$row[25]");
                                //write as CSV
                                fputcsv($handle,array_values($row));
                            }
                            // Write $outputData to our opened file.
                            if (fwrite($handle,  $outputData) === FALSE) {
                                echo "Cannot write to file ($fileNameE)";
                                //exit;
                            }
                        }
                        echo "Success, wrote ($outputData) to file ($fileNameE)";
                        fclose($handle);

                    } else {
                        echo "The file $fileNameE is not writable";
                    }
                    /* free result set */
                    $resultsE->close();
                    //Redirect
                    if (headers_sent()) {
                          die("<script>window.location='dbaccounting/create_acct_rpt.php?Rfinish=mcrc&rpt_name=". $fileNameE ."&sort-records=1'</script>");
                    } else {
                          exit(header("Location: /dbaccounting/create_acct_rpt.php?Rfinish=mcrc&rpt_name=". $fileNameE ."&sort-records=1"));
                    }
                }
                // Close database connection
                $connProd->close();
            }
            echo "Run by month(s) with product name";
        break;
        }
        case "3": {
            $startYear = $_POST["yearDate"];
            //echo $startYear;
            //exit;
            //Get Coupon Report By Year
            if (isset($startYear)) {
                $queryF = "SELECT P.ID AS OrderID, P.post_status AS OrderStatus, P.post_date AS OrderDate,
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_first_name') as 'First Name (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_last_name') as 'Last Name (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_1') as 'Address 1 (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_2') as 'Address 2 (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_city') as 'City (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_state') as 'State (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_postcode') as 'Postcode (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_country') as 'Country (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_email') as 'Email (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_first_name') as 'First Name (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_last_name') as 'Last Name (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_1') as 'Address 1 (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_2') as 'Address 2 (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_city') as 'City (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_state') as 'State (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_postcode') as 'Postcode (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_country') as 'Country (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_cart_discount') as 'Discount (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_shipping') as 'Shipping (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_tax') as 'Tax (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_total') as 'Total (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_prices_include_tax') as 'Prices With Tax'
                FROM wp_posts P inner join wp_woocommerce_order_items as oi on P.id = oi.order_id
                WHERE P.post_date LIKE '%".$startYear."%' AND P.post_type='shop_order'
                GROUP BY P.ID, P.post_status, P.post_date
                ORDER BY P.post_date, P.ID DESC";
                //Start Report by year file write
                if ($resultsF = $connProd->query($queryF)) {
                    $connProd->query($queryF);
                        //Change directory to "reports"
                        chdir($yeardir);
                        echo getcwd();
                        //Set file permission
                        chmod($fileNameF, 0775);
                        //Create empty array
                        $outputData = array();
                        //Open file stream
                        fopen($fileNameF, 'w');
                        //Set headers
                        header('Content-Type: text/csv');
                        header('Content-Disposition: attachment; filename="'.$fileNameF.'"');
                        header('Pragma: no-cache');
                        header('Expires: 0');
                        //check to see if the file is writable
                        if (is_writable($fileNameF)) {

                            if (!$handle = fopen($fileNameF, 'a')) {
                                 echo "Cannot open file ($fileNameF)";
                                 //exit;
                            }
                            //Write the header columns
                            fwrite($handle, "OrderID, OrderStatus, OrderDate, First_Name(Billing), Last_Name(Billing), Address1(Billing), Address2(Billing), City(Billing), State(Billing), Postcode(Billing), Country(Billing), Email(Billing), First_Name(Shipping),Last_Name(Shipping), Address1(Shipping), Address2(Shipping), City(Shipping), State(Shipping), Postcode(Shipping), Country(Shipping), Discount(Order), Shipping(Order), Tax(Order), Total(Order), Prices_With_Tax\n");
                            // Loop through records
                            while ($row = $resultsF->fetch_row()) {
                                //$outputData = "$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14],$row[15],$row[16],$row[17],$row[18],$row[19],$row[20],$row[21],$row[22],$row[23],$row[24]\n";
                                foreach($resultsF as $row) {
                                    //write as CSV
                                    fputcsv($handle,array_values($row));
                                }
                                // Write $outputData to our opened file.
                                if (fwrite($handle, $outputData) === FALSE) {
                                    echo "Cannot write to file ($fileNameF)";
                                    //exit;
                                }
                            }
                            echo "Success, wrote ($outputData) to file ($fileNameF)";
                            fclose($handle);

                        } else {
                            echo "The file $fileNameF is not writable";
                        }
                    /* free result set */
                    $resultsF->close();
                    //Redirect
                    if (headers_sent()) {
                          die("<script>window.location='dbaccounting/create_acct_rpt.php?Rfinish=ycr&rpt_name=". $fileNameF ."&sort-records=1'</script>");
                    } else {
                          exit(header("Location: /dbaccounting/create_acct_rpt.php?Rfinish=ycr&rpt_name=". $fileNameF ."&sort-records=1"));
                    }
                }
                // Close database connection
                $connProd->close();
            }
            echo "Run by year without product name";
        break;
        }
        case "4": {
            $startYear = $_POST["yearDate"];
            //Get Coupon Report By Year
            if (isset($startYear)) {
                $queryF = "SELECT P.ID AS OrderID, oi.order_item_name as ItemName, P.post_status AS OrderStatus, P.post_date AS OrderDate,
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_first_name') as 'First Name (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_last_name') as 'Last Name (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_1') as 'Address 1 (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_2') as 'Address 2 (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_city') as 'City (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_state') as 'State (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_postcode') as 'Postcode (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_country') as 'Country (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_email') as 'Email (Billing)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_first_name') as 'First Name (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_last_name') as 'Last Name (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_1') as 'Address 1 (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_2') as 'Address 2 (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_city') as 'City (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_state') as 'State (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_postcode') as 'Postcode (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_country') as 'Country (Shipping)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_cart_discount') as 'Discount (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_shipping') as 'Shipping (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_tax') as 'Tax (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_total') as 'Total (Order)',
                (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_prices_include_tax') as 'Prices With Tax'
                FROM wp_posts P inner join wp_woocommerce_order_items as oi on P.id = oi.order_id
                WHERE P.post_date LIKE '%".$startYear."%' AND P.post_type='shop_order'
                GROUP BY P.ID, oi.order_item_name,P.post_status, P.post_date
                ORDER BY P.post_date, P.ID DESC";
                //Start Report by year file write
                if ($resultsF = $connProd->query($queryF)) {
                    $connProd->query($queryF);
                        //Change directory to "reports"
                        chdir($yeardir);
                        echo getcwd();
                        //Set file permission
                        chmod($fileNameF, 0775);
                        //Create empty array
                        $outputData = array();
                        //Open file stream
                        fopen($fileNameF, 'w');
                        //Set headers
                        header('Content-Type: text/csv');
                        header('Content-Disposition: attachment; filename="'.$fileNameF.'"');
                        header('Pragma: no-cache');
                        header('Expires: 0');
                        //check to see if the file is writable
                        if (is_writable($fileNameF)) {
                            if (!$handle = fopen($fileNameF, 'a')) {
                                 echo "Cannot open file ($fileNameF)";
                                 //exit;
                            }
                            //Write the header columns
                            fwrite($handle, "OrderID, ItemName, OrderStatus, OrderDate, First_Name(Billing), Last_Name(Billing), Address1(Billing), Address2(Billing), City(Billing), State(Billing), Postcode(Billing), Country(Billing), Email(Billing), First_Name(Shipping),Last_Name(Shipping), Address1(Shipping), Address2(Shipping), City(Shipping), State(Shipping), Postcode(Shipping), Country(Shipping), Discount(Order), Shipping(Order), Tax(Order), Total(Order), Prices_With_Tax\n");
                            // Loop through records
                            while ($row = $resultsF->fetch_row()) {
                                //$outputData = "$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14],$row[15],$row[16],$row[17],$row[18],$row[19],$row[20],$row[21],$row[22],$row[23],$row[24],$row[25]\n";
                                foreach($resultsF as $row) {
                                    //write as CSV
                                    fputcsv($handle,array_values($row));
                                }
                                // Write $outputData to our opened file.
                                if (fwrite($handle, $outputData) === FALSE) {
                                    echo "Cannot write to file ($fileNameF)";
                                    //exit;
                                }
                            }
                            echo "Success, wrote ($outputData) to file ($fileNameF)";
                            fclose($handle);

                        } else {
                            echo "The file $fileNameF is not writable";
                        }
                    /* free result set */
                    $resultsF->close();
                    //Redirect
                    if (headers_sent()) {
                          die("<script>window.location='dbaccounting/create_acct_rpt.php?Rfinish=ycrc&rpt_name=". $fileNameF ."&sort-records=1'</script>");
                    } else {
                          exit(header("Location: /dbaccounting/create_acct_rpt.php?Rfinish=ycrc&rpt_name=". $fileNameF ."&sort-records=1"));
                    }
                }
                // Close database connection
                $connProd->close();
            }
            echo "Run by year with product name";
        break;
        }
    }
}
?>
