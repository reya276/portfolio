<?php

    //If islogin is 2 then query by the URL userid
    switch(isset($_SESSION['islogin'])) {
        //Run query for admins
        case 1:
        if ( isset($_POST["lsearch"]) != "" ) {
            $lsearch = $_POST["lsearch"];
            $queryA = $connProd->prepare("SELECT o.order_date,
                            o.order_status,
                            o.post_title,
                            o.userid,
                            o.email,
                            o.customer_name,
                            o2.order_id,
                            o2.total,
                            o.name
                        FROM
                            OrdersByUsers o
                        INNER JOIN OrdersByTotals o2 ON
                            o.order_id = o2.order_id
                        WHERE
                            (o2.order_id = '".$lsearch."'
                            OR o.email LIKE '%".$lsearch."%'
                            OR o.name LIKE '%".$lsearch."%')
                        ORDER BY o2.order_id, o.order_date, o.order_status DESC");

                $resultsA = $connProd->query($queryA);

        }
        echo '<div id="testid">Session ID is: Admin-'.$_SESSION["islogin"].'- Searched for: '.$lsearch.'</div>';
        break;
        //Run query for cusomers
        case 2:
            $userid = $_SESSION['userid'];
            if ( isset($_POST['lsearch']) == "" ) {
                $queryA = $connProd->prepare("SELECT o.order_date,
                                o.order_status,
                                o.post_title,
                                o.userid,
                                o.email,
                                o.customer_name,
                                o2.order_id,
                                o2.total,
                                o.name
                            FROM
                                OrdersByUsers o
                            INNER JOIN OrdersByTotals o2 ON
                                o.order_id = o2.order_id
                            WHERE
                                (o.userid = '".$userid."')
                            ORDER BY o2.order_id, o.order_date, o.order_status DESC");
                    $resultsA = $connProd->query($queryA);

            } else if ( isset($_POST['lsearch']) != "" ) {
                $lsearch = $_POST['lsearch'];
                $queryA = $connProd->prepare("SELECT o.order_date,
                                o.order_status,
                                o.post_title,
                                o.userid,
                                o.email,
                                o.customer_name,
                                o2.order_id,
                                o2.total,
                                o.name
                            FROM
                                OrdersByUsers o
                            INNER JOIN OrdersByTotals o2 ON
                                o.order_id = o2.order_id
                            WHERE
                                (o2.order_id = '".$lsearch."'
                                OR o.email LIKE '%".$lsearch."%'
                                OR o.name LIKE '%".$lsearch."%') AND (o.userid = '".$userid."')
                            ORDER BY o2.order_id, o.order_date, o.order_status DESC");
                $resultsA = $connProd->query($queryA);
            }
            echo '<div id="testid">Session ID is: Customer-'.$_SESSION["islogin"].'- Searched for: '.$lsearch.'</div>';
        break;
    }








?>
