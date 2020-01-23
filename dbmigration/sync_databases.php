<?php

//IF the migration process variable is set then start the process
if (isset($_POST["mstart"])) {
    var_dump($_POST);
    //Form POST Vars
    $gdate = $_POST["gdate"];
    $dbsource = $_POST["dbsource"];
    $dbtarget = $_POST["dbtarget"];
    $mstart = $_POST["mstart"];
    $wptables1 = 0;
    $wptables2 = 0;
    $wptables3 = 0;
    $wptables4 = 0;
    $wptables5 = 0;
    $wptables6 = 0;
    $wptables7 = 0;
    $resultsPst = 0;
    $resultsPM = 0;
    $resultsU = 0;
    $resultsUM = 0;
    $resultsOI = 0;
    $resultsOIM = 0;

    printf($gdate);
    //exit();
    if (isset($_POST["wptables0"])) {
        $allTbls = $_POST["wptables0"];
    } else {
        $allTbls="";
    }
    if (isset($_POST["truncatetbls0"])) {
        $truncateAllTbls = $_POST["truncatetbls0"];
    } else {
        $truncateAllTbls = "";
    }

    //echo $header_location;

    /*--- START Switch based on the selected data source value ---*/
    switch ($dbsource) {
        //For Production DBSOURCE
        case "prod": {

            //Database Credentials FROM server
            $usrnameProd = '<username>';
            $passwdProd = '<password>';
            $dbnameProd = '<database_name>';
            //Database Credentials FROM **PRODUCTION** server
            $connProd = new mysqli('0.0.0.0:3306', $usrnameProd, $passwdProd, $dbnameProd);
            /*---- Check connection -----*/
            /*if (mysqli_connect_errno()){
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }*/
            //SET AUTOCOMMIT FLAG
            //$connProd->autocommit(TRUE);
            /*------ START Create Select Statements ------*/
            switch ($allTbls) {
                case "all": {
                    //Table WP_POSTS
                    $wptables1 = $_POST["wptables1"];
                    $resultsPst = "SELECT ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count
                    FROM wp_posts WHERE post_date >'.$gdate.'";

                    //Table WP_POSTMETA
                    $wptables2 = $_POST["wptables2"];
                    $resultsPM = "SELECT pm.meta_id, pm.post_id, pm.meta_key, pm.meta_value FROM wp_postmeta as pm INNER JOIN wp_posts as pst ON pm.post_id = pst.ID
                                  WHERE pst.post_date >'.$gdate.'";

                    //Table WP_USERS
                    $wptables3 = $_POST["wptables3"];
                    $resultsU = "SELECT ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, spam, deleted FROM wp_users
                                 WHERE user_registered >'.$gdate.'";

                    //Table WP_USERMETA
                    $wptables4 = $_POST["wptables4"];
                    $resultsUM = "SELECT um.umeta_id, um.user_id, um.meta_key, um.meta_value FROM wp_usermeta as um INNER JOIN wp_users as u ON um.user_id = u.ID
                                  WHERE u.user_registered >'.$gdate.'";

                    //Table WP_WOOCOMMERCE_ORDER_ITEMS
                    $wptables5 = $_POST["wptables5"];
                    $resultsOI = "SELECT order_item_id, order_item_name, order_item_type, order_id FROM wp_woocommerce_order_items as oi INNER JOIN wp_posts as pst ON oi.order_id = pst.ID
                                  WHERE pst.post_date >'.$gdate.'";

                    //Table WP_WOOCOMMERCE_ORDER_ITEMMETA
                    $wptables6 = $_POST["wptables6"];
                    $resultsOIM = "SELECT oim.meta_id, oim.order_item_id, oim.meta_key, oim.meta_value FROM wp_woocommerce_order_itemmeta as oim INNER JOIN wp_woocommerce_order_items as oi ON oim.order_item_id = oi.order_item_id
                                   INNER JOIN wp_posts as pst ON oi.order_id = pst.ID WHERE pst.post_date >'.$gdate.'";

                    //Table WP_OPTIONS
                    // $wptables7 = $_POST["wptables7"];
                    // $resultsOP = "SELECT option_id, option_name, option_value, autoload
                    //               FROM wp_options;";
                break;
                }
                default: {
                    //Table WP_POSTS
                    if (isset($_POST["wptables1"]) && $gdate != ''){
                        $wptables1 = $_POST["wptables1"];
                        $resultsPst = "SELECT ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count
                        FROM wp_posts WHERE post_date >'.$gdate.'";
                    } else if (isset($_POST["wptables1"]) != 0){
                        $wptables1 = $_POST["wptables1"];
                        $resultsPst = "SELECT ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count
                        FROM wp_posts";
                    }
                    //Table WP_POSTMETA
                    if (isset($_POST["wptables2"]) && $gdate != ''){
                        $wptables2 = $_POST["wptables2"];
                        $resultsPM = "SELECT pm.meta_id, pm.post_id, pm.meta_key, pm.meta_value FROM wp_postmeta as pm INNER JOIN wp_posts as pst ON pm.post_id = pst.ID
                                      WHERE pst.post_date >'.$gdate.'";
                    } else if (isset($_POST["wptables2"]) != 0){
                        $wptables2 = $_POST["wptables2"];
                        $resultsPM = "SELECT pm.meta_id, pm.post_id, pm.meta_key, pm.meta_value FROM wp_postmeta as pm INNER JOIN wp_posts as pst ON pm.post_id = pst.ID";
                    }
                    //Table WP_USERS
                    if (isset($_POST["wptables3"]) && $gdate != ''){
                        $wptables3 = $_POST["wptables3"];
                        $resultsU = "SELECT ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, spam, deleted FROM wp_users
                                     WHERE user_registered >'.$gdate.'";
                    } else if (isset($_POST["wptables3"]) != 0) {
                        $wptables3 = $_POST["wptables3"];
                        $resultsU = "SELECT ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, spam, deleted FROM wp_users";
                    }

                    //Table WP_USERMETA
                    if (isset($_POST["wptables4"]) && $gdate != ''){
                        $wptables4 = $_POST["wptables4"];
                        $resultsUM = "SELECT um.umeta_id, um.user_id, um.meta_key, um.meta_value FROM wp_usermeta as um INNER JOIN wp_users as u ON um.user_id = u.ID
                                      WHERE u.user_registered >'.$gdate.'";
                    } else if (isset($_POST["wptables4"]) != 0) {
                        $wptables4 = $_POST["wptables4"];
                        $resultsUM = "SELECT um.umeta_id, um.user_id, um.meta_key, um.meta_value FROM wp_usermeta as um INNER JOIN wp_users as u ON um.user_id = u.ID";
                    }

                    //Table WP_WOOCOMMERCE_ORDER_ITEMS
                    if (isset($_POST["wptables5"]) && $gdate != ''){
                        $wptables5 = $_POST["wptables5"];
                        $resultsOI = "SELECT order_item_id, order_item_name, order_item_type, order_id FROM wp_woocommerce_order_items as oi INNER JOIN wp_posts as pst ON oi.order_id = pst.ID
                                      WHERE pst.post_date >'.$gdate.'";
                    } else if (isset($_POST["wptables5"]) != 0) {
                        $wptables5 = $_POST["wptables5"];
                        $resultsOI = "SELECT order_item_id, order_item_name, order_item_type, order_id FROM wp_woocommerce_order_items as oi INNER JOIN wp_posts as pst ON oi.order_id = pst.ID";
                    }

                    //Table WP_WOOCOMMERCE_ORDER_ITEMMETA
                    if (isset($_POST["wptables6"]) && $gdate != ''){
                        $wptables6 = $_POST["wptables6"];
                        $resultsOIM = "SELECT oim.meta_id, oim.order_item_id, oim.meta_key, oim.meta_value FROM wp_woocommerce_order_itemmeta as oim INNER JOIN wp_woocommerce_order_items as oi ON oim.order_item_id = oi.order_item_id
                                       INNER JOIN wp_posts as pst ON oi.order_id = pst.ID WHERE pst.post_date >'.$gdate.'";
                    } else if (isset($_POST["wptables6"]) != 0){
                        $wptables6 = $_POST["wptables6"];
                        $resultsOIM = "SELECT oim.meta_id, oim.order_item_id, oim.meta_key, oim.meta_value FROM wp_woocommerce_order_itemmeta as oim INNER JOIN wp_woocommerce_order_items as oi ON oim.order_item_id = oi.order_item_id
                                       INNER JOIN wp_posts as pst ON oi.order_id = pst.ID";
                    }
                    //Table WP_OPTIONS
                    if (isset($_POST["wptables7"])){
                        // $wptables7 = $_POST["wptables7"];
                        // $resultsOP = "SELECT option_id, option_name, option_value, autoload
                        //               FROM wp_options;";
                    }
                }
            }
            /*------ END Create select statements ------*/

            //START Migration Process for Target = Staging
            if (isset($dbtarget) && $dbtarget == 'stg') {

                //Database Credentials FROM server
                $usrnameStg = '<username>';
                $passwdStg = '<password>';
                $dbnameStg = '<database_name>';

                //Create DB Connection FROM STAGING server
                $connStg = new mysqli('0.0.0.0', $usrnameStg, $passwdStg, $dbnameStg);
                // /* check connection */
                 /*if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                     exit();
                }*/
                //SET AUTOCOMMIT FLAG
                //$connStg->autocommit(TRUE);
                /*------ START TRUNCATE statements (IF NEEDED!)-------*/
                $truncateP = "TRUNCATE TABLE wp_posts2";
                $truncatePM = "TRUNCATE TABLE wp_postmeta2";
                $truncateU = "TRUNCATE TABLE wp_users2";
                $truncateUM = "TRUNCATE TABLE wp_usermeta2";
                $truncateOI = "TRUNCATE TABLE wp_woocommerce_order_items2";
                $truncateOIM = "TRUNCATE TABLE wp_woocommerce_order_itemmeta2";
                //Truncate the table
                switch ($truncateAllTbls){
                    case "all": {
                        $connStg->query($truncateP);
                        $connStg->query($truncatePM);
                        $connStg->query($truncateU);
                        $connStg->query($truncateUM);
                        $connStg->query($truncateOI);
                        $connStg->query($truncateOIM);
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=trnk'</script>");
                        } else {
                              exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=trnk"));
                        }
                    break;
                    }
                    default: {
                        if (isset($_POST["truncatetbls1"]) && $_POST["truncatetbls1"] == 'yes'){
                            $connStg->query($truncateP);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=ta'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=ta"));
                            }
                        }
                        if (isset($_POST["truncatetbls2"]) && $_POST["truncatetbls2"] == 'yes'){
                            $connStg->query($truncatePM);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=tb'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=tb"));
                            }
                        }
                        if (isset($_POST["truncatetbls3"]) && $_POST["truncatetbls3"] == 'yes'){
                            $connStg->query($truncateU);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=tc'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=tc"));
                            }
                        }
                        if (isset($_POST["truncatetbls4"]) && $_POST["truncatetbls4"] == 'yes'){
                            $connStg->query($truncateUM);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=td'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=td"));
                            }
                        }
                        if (isset($_POST["truncatetbls5"]) && $_POST["truncatetbls5"] == 'yes'){
                            $connStg->query($truncateOI);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=te'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=te"));
                            }
                        }
                        if (isset($_POST["truncatetbls6"]) && $_POST["truncatetbls6"] == 'yes'){
                            $connStg->query($truncateOIM);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=tf'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=tf"));
                            }
                        }

                    }
                }
                /*------ END TRUNCATE statements -------*/
                //Check to see if data is returned for WP_POSTS query
                    if ($resultP = $connProd->query($resultsPst)) {
                      //Loop through the records
                      while ($row = $resultP->fetch_row()) {
                          printf ("%s (%s)\n", $row[0], $row[1]);
                          //echo "records:" . $row[0] . "," . $row[1] . "," . $row[2] . "\r\n";

                        /* Insert Records */

                          $queryInsrtPosts = "INSERT INTO wp_posts2(ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status,
                                              post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
                                              VALUES($row[0], $row[1], '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]',
                                              '$row[12]', '$row[13]', '$row[14]', '$row[15]', '$row[16]', $row[17], '$row[18]', $row[19], '$row[20]','$row[21]', $row[22])";
                          $connStg->query($queryInsrtPosts);
                          /*---- START Insert Records from Staging Server to Development Server ----*/

                      }
                      /* free result set */
                      $resultP->close();

                      if (headers_sent()) {
                            die("<script>window.location='db_migrate.php?Pdone=p'</script>");
                      } else {
                            exit(header("Location: /db_migrate.php?Pdone=p"));
                      }
                    }

                //Check to see if data is returned for WP_POSTMETA query
                    if ($resultPM = $connProd->query($resultsPM)) {
                        //Loop through the records
                        while ($row = $resultPM->fetch_row()) {
                            printf ("%s (%s)\n", $row[0], $row[1]);
                            /* Insert Records */
                             $queryInsrtPostmeta = "INSERT INTO wp_postmeta2(meta_id, post_id, meta_key, meta_value) VALUES($row[0], $row[1], '$row[2]', '$row[3]');";
                             $connStg->query($queryInsrtPostmeta);
                        }
                        /* free result set */
                        $resultPM->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=pm'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=pm"));
                        }

                    }

                //Check to see if data is returned for WP_USERS query
                    if ($resultU = $connProd->query($resultsU)) {
                        //Loop through the records
                        while ($row = $resultU->fetch_row()) {
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtUsers = "INSERT INTO wp_users2(ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, spam, deleted) VALUES($row[0], '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', $row[8], '$row[9]', $row[10], $row[11]);";
                            $connStg->query($queryInsrtUsers);
                        }
                        /* free result set */
                        $resultU->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=u'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=u"));
                        }
                    }
                //Check to see if data is returned for WP_USERMETA query
                    if ($resultUM = $connProd->query($resultsUM)) {
                        //Loop through the records
                        while ($row = $resultUM->fetch_row()) {
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtUsermeta = "INSERT INTO wp_usermeta2(umeta_id, user_id, meta_key, meta_value) VALUES($row[0], $row[1], '$row[3]', '$row[4]')";
                            $connStg->query($queryInsrtUsermeta);
                        }
                        /* free result set */
                        $resultUM->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=um'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=um"));
                        }
                    }

                //Check to see if data is returned for WP_ORDERITEMS query
                    if ($resultOI = $connProd->query($resultsOI)) {
                        //Loop through the records
                        while ($row = $resultOI->fetch_row()){
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtOrderItems = "INSERT INTO wp_woocommerce_order_items2(order_item_id, order_item_name, order_item_type, order_id) VALUES($row[0], '$row[1]', '$row[2]', $row[3]);";
                            $connStg->query($queryInsrtOrderItems);
                        }
                        /* free result set */
                        $resultOI->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=oi'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=oi"));
                        }
                    }

                //Check to see if data is returned for WP_ORDERITEMMETA query
                    if ($resultOIM = $connProd->query($resultsOIM)) {
                        //Loop through the records
                        while ($row = $resultOIM->fetch_row()){
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtOrderItemmeta = "INSERT INTO wp_woocommerce_order_itemmeta2(meta_id, order_item_id, meta_key, meta_value)VALUES($row[0], $row[1], '$row[2]', '$row[3]');";
                            $connStg->query($queryInsrtOrderItemmeta);
                        }
                        /* free result set */
                        $resultOIM->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=oim'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=oim"));
                        }
                    }


                //Close Database Connection
                $connStg->close();

                //START Migration Process for Target = Devlopment
            } else if (isset($dbtarget) && $dbtarget == 'dev') {

                
                //Database Credentials TO Server
                $usrnameDev = '<username>';
                $passwdDev = '<password>';
                $dbnameDev = '<database_name>';

                //Create DB Connection TO server
                $connDev = new mysqli('0.0.0.0:3306', $usrnameDev, $passwdDev, $dbnameDev);
                // /* check connection */
                 /*if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                     exit();
                }*/
                //SET AUTOCOMMIT FLAG
                //$connDev->autocommit(TRUE);
                /*------ START TRUNCATE statements (IF NEEDED!)-------*/
                $truncateP = "TRUNCATE TABLE wp_posts2";
                $truncatePM = "TRUNCATE TABLE wp_postmeta2";
                $truncateU = "TRUNCATE TABLE wp_users2";
                $truncateUM = "TRUNCATE TABLE wp_usermeta2";
                $truncateOI = "TRUNCATE TABLE wp_woocommerce_order_items2";
                $truncateOIM = "TRUNCATE TABLE wp_woocommerce_order_itemmeta2";
                //Truncate the table
                switch ($truncateAllTbls){
                    case "all": {
                        $connDev->query($truncateP);
                        $connDev->query($truncatePM);
                        $connDev->query($truncateU);
                        $connDev->query($truncateUM);
                        $connDev->query($truncateOI);
                        $connDev->query($truncateOIM);
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=trnk'</script>");
                        } else {
                              exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=trnk"));
                        }
                    break;
                    }
                    default: {
                        if (isset($_POST["truncatetbls1"]) && $_POST["truncatetbls1"] == 'yes'){
                            $connDev->query($truncateP);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=ta'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=ta"));
                            }
                        }
                        if (isset($_POST["truncatetbls2"]) && $_POST["truncatetbls2"] == 'yes'){
                            $connDev->query($truncatePM);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=tb'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=tb"));
                            }
                        }
                        if (isset($_POST["truncatetbls3"]) && $_POST["truncatetbls3"] == 'yes'){
                            $connDev->query($truncateU);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=tc'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=tc"));
                            }
                        }
                        if (isset($_POST["truncatetbls4"]) && $_POST["truncatetbls4"] == 'yes'){
                            $connDev->query($truncateUM);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=td'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=td"));
                            }
                        }
                        if (isset($_POST["truncatetbls5"]) && $_POST["truncatetbls5"] == 'yes'){
                            $connDev->query($truncateOI);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=te'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=te"));
                            }
                        }
                        if (isset($_POST["truncatetbls6"]) && $_POST["truncatetbls6"] == 'yes'){
                            $connDev->query($truncateOIM);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=tf'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=tf"));
                            }
                        }

                    }
                }
                /*------ END TRUNCATE statements -------*/
                //Check to see if data is returned for WP_POSTS query
                    if ($resultP = $connProd->query($resultsPst)) {
                      //Loop through the records
                      while ($row = $resultP->fetch_row()) {
                          printf ("%s (%s)\n", $row[0], $row[1]);
                          //echo "records:" . $row[0] . "," . $row[1] . "," . $row[2] . "\r\n";

                        /* Insert Records */

                          $queryInsrtPosts = "INSERT INTO wp_posts2(ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status,
                                              post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
                                              VALUES($row[0], $row[1], '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]',
                                              '$row[12]', '$row[13]', '$row[14]', '$row[15]', '$row[16]', $row[17], '$row[18]', $row[19], '$row[20]','$row[21]', $row[22])";
                          $connDev->query($queryInsrtPosts);
                          /*---- START Insert Records from Staging Server to Development Server ----*/

                      }
                      /* free result set */
                      $resultP->close();

                      if (headers_sent()) {
                            die("<script>window.location='db_migrate.php?Pdone=p'</script>");
                      } else {
                            exit(header("Location: /db_migrate.php?Pdone=p"));
                      }
                    }

                //Check to see if data is returned for WP_POSTMETA query
                    if ($resultPM = $connProd->query($resultsPM)) {
                        //Loop through the records
                        while ($row = $resultPM->fetch_row()) {
                            printf ("%s (%s)\n", $row[0], $row[1]);
                            /* Insert Records */
                             $queryInsrtPostmeta = "INSERT INTO wp_postmeta2(meta_id, post_id, meta_key, meta_value) VALUES($row[0], $row[1], '$row[2]', '$row[3]');";
                             $connDev->query($queryInsrtPostmeta);
                        }
                        /* free result set */
                        $resultPM->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=pm'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=pm"));
                        }

                    }

                //Check to see if data is returned for WP_USERS query
                    if ($resultU = $connProd->query($resultsU)) {
                        //Loop through the records
                        while ($row = $resultU->fetch_row()) {
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtUsers = "INSERT INTO wp_users2(ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, spam, deleted) VALUES($row[0], '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', $row[8], '$row[9]', $row[10], $row[11]);";
                            $connDev->query($queryInsrtUsers);
                        }
                        /* free result set */
                        $resultU->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=u'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=u"));
                        }
                    }
                //Check to see if data is returned for WP_USERMETA query
                    if ($resultUM = $connProd->query($resultsUM)) {
                        //Loop through the records
                        while ($row = $resultUM->fetch_row()) {
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtUsermeta = "INSERT INTO wp_usermeta2(umeta_id, user_id, meta_key, meta_value) VALUES($row[0], $row[1], '$row[3]', '$row[4]')";
                            $connDev->query($queryInsrtUsermeta);
                        }
                        /* free result set */
                        $resultUM->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=um'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=um"));
                        }
                    }

                //Check to see if data is returned for WP_ORDERITEMS query
                    if ($resultOI = $connProd->query($resultsOI)) {
                        //Loop through the records
                        while ($row = $resultOI->fetch_row()){
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtOrderItems = "INSERT INTO wp_woocommerce_order_items2(order_item_id, order_item_name, order_item_type, order_id) VALUES($row[0], '$row[1]', '$row[2]', $row[3]);";
                            $connDev->query($queryInsrtOrderItems);
                        }
                        /* free result set */
                        $resultOI->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=oi'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=oi"));
                        }
                    }

                //Check to see if data is returned for WP_ORDERITEMMETA query
                    if ($resultOIM = $connProd->query($resultsOIM)) {
                        //Loop through the records
                        while ($row = $resultOIM->fetch_row()){
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtOrderItemmeta = "INSERT INTO wp_woocommerce_order_itemmeta2(meta_id, order_item_id, meta_key, meta_value)VALUES($row[0], $row[1], '$row[2]', '$row[3]');";
                            $connDev->query($queryInsrtOrderItemmeta);
                        }
                        /* free result set */
                        $resultOIM->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=oim'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=oim"));
                        }
                    }


                //Close Database Connection
                $connDev->close();


            }

            //Close Database Connection
            //$connProd->close();

        break;
        }
        //For Staging DBSOURCE
        case "stg": {
            //FROM STAGING Server SSH Tunnel Connection
            $serverStg = ssh2_connect('0.0.0.0', 22); //<--- This opens the ssh connection
            ssh2_auth_password($serverStg, '<username>', '<password>'); //<--- Authenticate with a valid server user
            $tunnelStg = ssh2_tunnel($serverStg, '0.0.0.0', 3306); //<--- Create the SSH Tunnel
            $streamStg = ssh2_exec($serverStg, '/usr/local/bin/php -i'); //<--- Create and execute the connection stream


            //Database Credentials FROM server
            $usrnameStg = '<username>';
            $passwdStg = '<password>';
            $dbnameStg = '<database_name>';

            //Create DB Connection FROM STAGING server
            $connStg = new mysqli('0.0.0.0', $usrnameStg, $passwdStg, $dbnameStg);
            //echo $connStg;

            // /* check connection */
             /*if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                 exit();
            }*/
            //SET AUTOCOMMIT FLAG
            //$connStg->autocommit(TRUE);

            /*------ START Create Select Statements ------*/
            switch ($allTbls) {
                case "all": {
                    //Table WP_POSTS
                    $wptables1 = $_POST["wptables1"];
                    $resultsPst = "SELECT ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count
                    FROM wp_posts WHERE post_date >='.$gdate.'";

                    //Table WP_POSTMETA
                    $wptables2 = $_POST["wptables2"];
                    $resultsPM = "SELECT pm.meta_id, pm.post_id, pm.meta_key, pm.meta_value FROM wp_postmeta as pm INNER JOIN wp_posts as pst ON pm.post_id = pst.ID
                                  WHERE pst.post_date >='.$gdate.'";

                    //Table WP_USERS
                    $wptables3 = $_POST["wptables3"];
                    $resultsU = "SELECT ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, spam, deleted FROM wp_users
                                 WHERE user_registered >='.$gdate.'";

                    //Table WP_USERMETA
                    $wptables4 = $_POST["wptables4"];
                    $resultsUM = "SELECT um.umeta_id, um.user_id, um.meta_key, um.meta_value FROM wp_usermeta as um INNER JOIN wp_users as u ON um.user_id = u.ID
                                  WHERE u.user_registered >='.$gdate.'";

                    //Table WP_WOOCOMMERCE_ORDER_ITEMS
                    $wptables5 = $_POST["wptables5"];
                    $resultsOI = "SELECT order_item_id, order_item_name, order_item_type, order_id FROM wp_woocommerce_order_items as oi INNER JOIN wp_posts as pst ON oi.order_id = pst.ID
                                  WHERE pst.post_date >='.$gdate.'";

                    //Table WP_WOOCOMMERCE_ORDER_ITEMMETA
                    $wptables6 = $_POST["wptables6"];
                    $resultsOIM = "SELECT oim.meta_id, oim.order_item_id, oim.meta_key, oim.meta_value FROM wp_woocommerce_order_itemmeta as oim INNER JOIN wp_woocommerce_order_items as oi ON oim.order_item_id = oi.order_item_id
                                   INNER JOIN wp_posts as pst ON oi.order_id = pst.ID WHERE pst.post_date >='.$gdate.'";

                    //Table WP_OPTIONS
                    // $wptables7 = $_POST["wptables7"];
                    // $resultsOP = "SELECT option_id, option_name, option_value, autoload
                    //               FROM wp_options;";
                break;
                }
                default: {
                    //Table WP_POSTS
                    if (isset($_POST["wptables1"]) && $gdate != ''){
                        $wptables1 = $_POST["wptables1"];
                        $resultsPst = "SELECT ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count
                        FROM wp_posts WHERE post_date >='.$gdate.'";
                    } else if (isset($_POST["wptables1"]) != 0){
                        $wptables1 = $_POST["wptables1"];
                        $resultsPst = "SELECT ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count
                        FROM wp_posts";
                    }
                    //Table WP_POSTMETA
                    if (isset($_POST["wptables2"]) && $gdate != ''){
                        $wptables2 = $_POST["wptables2"];
                        $resultsPM = "SELECT pm.meta_id, pm.post_id, pm.meta_key, pm.meta_value FROM wp_postmeta as pm INNER JOIN wp_posts as pst ON pm.post_id = pst.ID
                                      WHERE pst.post_date >='.$gdate.'";
                    } else if (isset($_POST["wptables2"]) != 0){
                        $wptables2 = $_POST["wptables2"];
                        $resultsPM = "SELECT pm.meta_id, pm.post_id, pm.meta_key, pm.meta_value FROM wp_postmeta as pm INNER JOIN wp_posts as pst ON pm.post_id = pst.ID";
                    }
                    //Table WP_USERS
                    if (isset($_POST["wptables3"]) && $gdate != ''){
                        $wptables3 = $_POST["wptables3"];
                        $resultsU = "SELECT ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, spam, deleted FROM wp_users
                                     WHERE user_registered >='.$gdate.'";
                    } else if (isset($_POST["wptables3"]) != 0) {
                        $wptables3 = $_POST["wptables3"];
                        $resultsU = "SELECT ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, spam, deleted FROM wp_users";
                    }

                    //Table WP_USERMETA
                    if (isset($_POST["wptables4"]) && $gdate != ''){
                        $wptables4 = $_POST["wptables4"];
                        $resultsUM = "SELECT um.umeta_id, um.user_id, um.meta_key, um.meta_value FROM wp_usermeta as um INNER JOIN wp_users as u ON um.user_id = u.ID
                                      WHERE u.user_registered >='.$gdate.'";
                    } else if (isset($_POST["wptables4"]) != 0) {
                        $wptables4 = $_POST["wptables4"];
                        $resultsUM = "SELECT um.umeta_id, um.user_id, um.meta_key, um.meta_value FROM wp_usermeta as um INNER JOIN wp_users as u ON um.user_id = u.ID";
                    }

                    //Table WP_WOOCOMMERCE_ORDER_ITEMS
                    if (isset($_POST["wptables5"]) && $gdate != ''){
                        $wptables5 = $_POST["wptables5"];
                        $resultsOI = "SELECT order_item_id, order_item_name, order_item_type, order_id FROM wp_woocommerce_order_items as oi INNER JOIN wp_posts as pst ON oi.order_id = pst.ID
                                      WHERE pst.post_date >='.$gdate.'";
                    } else if (isset($_POST["wptables5"]) != 0) {
                        $wptables5 = $_POST["wptables5"];
                        $resultsOI = "SELECT order_item_id, order_item_name, order_item_type, order_id FROM wp_woocommerce_order_items as oi INNER JOIN wp_posts as pst ON oi.order_id = pst.ID";
                    }

                    //Table WP_WOOCOMMERCE_ORDER_ITEMMETA
                    if (isset($_POST["wptables6"]) && $gdate != ''){
                        $wptables6 = $_POST["wptables6"];
                        $resultsOIM = "SELECT oim.meta_id, oim.order_item_id, oim.meta_key, oim.meta_value FROM wp_woocommerce_order_itemmeta as oim INNER JOIN wp_woocommerce_order_items as oi ON oim.order_item_id = oi.order_item_id
                                       INNER JOIN wp_posts as pst ON oi.order_id = pst.ID WHERE pst.post_date >='.$gdate.'";
                    } else if (isset($_POST["wptables6"]) != 0){
                        $wptables6 = $_POST["wptables6"];
                        $resultsOIM = "SELECT oim.meta_id, oim.order_item_id, oim.meta_key, oim.meta_value FROM wp_woocommerce_order_itemmeta as oim INNER JOIN wp_woocommerce_order_items as oi ON oim.order_item_id = oi.order_item_id
                                       INNER JOIN wp_posts as pst ON oi.order_id = pst.ID";
                    }
                    //Table WP_OPTIONS
                    if (isset($_POST["wptables7"])){
                        // $wptables7 = $_POST["wptables7"];
                        // $resultsOP = "SELECT option_id, option_name, option_value, autoload
                        //               FROM wp_options;";
                    }
                }
            }


            /*------ END Create select statements ------*/
            //START Migration Process for Target = Devlopment
            if (isset($dbtarget) && $dbtarget == 'dev') {

                //TO DEVELOPMENT Server SSH Tunnel Connection
                $serverDev = ssh2_connect('0.0.0.0', 22); //<--- This opens the ssh connection
                ssh2_auth_password($serverDev, '<username>', '<password>'); //<--- Authenticate with a valid server user
                $tunnelDev = ssh2_tunnel($serverDev, '0.0.0.0', 3306); //<--- Create the SSH Tunnel
                $streamDev = ssh2_exec($serverDev, '/usr/local/bin/php -i'); //<--- Create and execute the connection stream

                //Database Credentials TO Server
                $usrnameDev = '<username>';
                $passwdDev = '<password>';
                $dbnameDev = '<database_name>';

                //Create DB Connection TO server
                $connDev = new mysqli('0.0.0.0', $usrnameDev, $passwdDev, $dbnameDev);
                // /* check connection */
                 /*if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                     exit();
                }*/
                //SET AUTOCOMMIT FLAG
                //$connDev->autocommit(TRUE);

                /*------ START TRUNCATE statements (IF NEEDED!)-------*/
                $truncateP = "TRUNCATE TABLE wp_posts2";
                $truncatePM = "TRUNCATE TABLE wp_postmeta2";
                $truncateU = "TRUNCATE TABLE wp_users2";
                $truncateUM = "TRUNCATE TABLE wp_usermeta2";
                $truncateOI = "TRUNCATE TABLE wp_woocommerce_order_items2";
                $truncateOIM = "TRUNCATE TABLE wp_woocommerce_order_itemmeta2";
                //Truncate the table
                switch ($truncateAllTbls){
                    case "all": {
                        $connDev->query($truncateP);
                        $connDev->query($truncatePM);
                        $connDev->query($truncateU);
                        $connDev->query($truncateUM);
                        $connDev->query($truncateOI);
                        $connDev->query($truncateOIM);
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=trnk'</script>");
                        } else {
                              exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=trnk"));
                        }
                    break;
                    }
                    default: {
                        if (isset($_POST["truncatetbls1"]) && $_POST["truncatetbls1"] == 'yes'){
                            $connDev->query($truncateP);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=ta'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=ta"));
                            }
                        }
                        if (isset($_POST["truncatetbls2"]) && $_POST["truncatetbls2"] == 'yes'){
                            $connDev->query($truncatePM);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=tb'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=tb"));
                            }
                        }
                        if (isset($_POST["truncatetbls3"]) && $_POST["truncatetbls3"] == 'yes'){
                            $connDev->query($truncateU);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=tc'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=tc"));
                            }
                        }
                        if (isset($_POST["truncatetbls4"]) && $_POST["truncatetbls4"] == 'yes'){
                            $connDev->query($truncateUM);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=td'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=td"));
                            }
                        }
                        if (isset($_POST["truncatetbls5"]) && $_POST["truncatetbls5"] == 'yes'){
                            $connDev->query($truncateOI);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=te'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=te"));
                            }
                        }
                        if (isset($_POST["truncatetbls6"]) && $_POST["truncatetbls6"] == 'yes'){
                            $connDev->query($truncateOIM);
                            //Redirect
                            if (headers_sent()) {
                                  die("<script>window.location='/<username>/dbsync/db_migrate.php?Pdone=tf'</script>");
                            } else {
                                  exit(header("Location: /<username>/dbsync/db_migrate.php?Pdone=tf"));
                            }
                        }

                    }
                }
                /*------ END TRUNCATE statements -------*/
                //Check to see if data is returned for WP_POSTS query
                      if ($resultP = $connStg->query($resultsPst)) {
                      //Loop through the records
                      while ($row = $resultP->fetch_row()) {
                          printf ("%s (%s)\n", $row[0], $row[1]);
                          //echo "records:" . $row[0] . "," . $row[1] . "," . $row[2] . "\r\n";

                        /* Insert Records */

                          $queryInsrtPosts = "INSERT INTO wp_posts2(ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status,
                                              post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
                                              VALUES($row[0], $row[1], '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]',
                                              '$row[12]', '$row[13]', '$row[14]', '$row[15]', '$row[16]', $row[17], '$row[18]', $row[19], '$row[20]','$row[21]', $row[22])";
                          $connDev->query($queryInsrtPosts);
                          /*---- START Insert Records from Staging Server to Development Server ----*/

                      }
                  /* free result set */
                  $resultP->close();

                  if (headers_sent()) {
                        die("<script>window.location='db_migrate.php?Pdone=p'</script>");
                  } else {
                        exit(header("Location: /db_migrate.php?Pdone=p"));
                  }
                }

                //Check to see if data is returned for WP_POSTMETA query
                    if ($resultPM = $connStg->query($resultsPM)) {
                        //Loop through the records
                        while ($row = $resultPM->fetch_row()) {
                            printf ("%s (%s)\n", $row[0], $row[1]);
                            /* Insert Records */
                             $queryInsrtPostmeta = "INSERT INTO wp_postmeta2(meta_id, post_id, meta_key, meta_value) VALUES($row[0], $row[1], '$row[2]', '$row[3]');";
                             $connDev->query($queryInsrtPostmeta);
                        }
                        /* free result set */
                        $resultPM->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=pm'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=pm"));
                        }

                    }

                //Check to see if data is returned for WP_USERS query
                    if ($resultU = $connStg->query($resultsU)) {
                        //Loop through the records
                        while ($row = $resultU->fetch_row()) {
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtUsers = "INSERT INTO wp_users2(ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, spam, deleted) VALUES($row[0], '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', $row[8], '$row[9]', $row[10], $row[11]);";
                            $connDev->query($queryInsrtUsers);
                        }
                        /* free result set */
                        $resultU->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=u'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=u"));
                        }
                    }
                //Check to see if data is returned for WP_USERMETA query
                    if ($resultUM = $connStg->query($resultsUM)) {
                        //Loop through the records
                        while ($row = $resultUM->fetch_row()) {
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtUsermeta = "INSERT INTO wp_usermeta2(umeta_id, user_id, meta_key, meta_value) VALUES($row[0], $row[1], '$row[3]', '$row[4]')";
                            $connDev->query($queryInsrtUsermeta);
                        }
                        /* free result set */
                        $resultUM->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=um'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=um"));
                        }
                    }

                //Check to see if data is returned for WP_ORDERITEMS query
                    if ($resultOI = $connStg->query($resultsOI)) {
                        //Loop through the records
                        while ($row = $resultOI->fetch_row()){
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtOrderItems = "INSERT INTO wp_woocommerce_order_items2(order_item_id, order_item_name, order_item_type, order_id) VALUES($row[0], '$row[1]', '$row[2]', $row[3]);";
                            $connDev->query($queryInsrtOrderItems);
                        }
                        /* free result set */
                        $resultOI->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=oi'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=oi"));
                        }
                    }

                //Check to see if data is returned for WP_ORDERITEMMETA query
                    if ($resultOIM = $connStg->query($resultsOIM)) {
                        //Loop through the records
                        while ($row = $resultOIM->fetch_row()){
                            printf ("%s (%s)\n", $row[0], $row[1], $row[2]);
                            /* Insert Records */
                            $queryInsrtOrderItemmeta = "INSERT INTO wp_woocommerce_order_itemmeta2(meta_id, order_item_id, meta_key, meta_value)VALUES($row[0], $row[1], '$row[2]', '$row[3]');";
                            $connDev->query($queryInsrtOrderItemmeta);
                        }
                        /* free result set */
                        $resultOIM->close();
                        //Redirect
                        if (headers_sent()) {
                              die("<script>window.location='db_migrate.php?Pdone=oim'</script>");
                        } else {
                              exit(header("Location: /db_migrate.php?Pdone=oim"));
                        }
                    }


                //Close Database Connection
                $connDev->close();

            }


            //Close Database Connection
            $connStg->close();

        break;
        }

    }
    /*--- END Switch based on the selected data source value ---*/


}
?>
