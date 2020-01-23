<?php


if (!empty($_GET['getdb']) && $_GET['getdb'] == 1) {
    // DB connection
    include "db_conn_2.php";
} else if (!empty($_GET['getdb']) && $_GET['getdb'] == 2) {
    // DB connection
    include "db_conn_2.php";
} else if (empty($_GET['getdb'])){
    // DB connection
    include "db_conn.php";
}

//form Vars
$getorder = $_GET["order_id"];
//printf($getorder);
$getQueryD = "";
$couponsresults = "";
$coupondata = array();
if (isset($getorder) && $getorder != "") {
    //Get the Order items
        $getQueryD = "SELECT P.ID AS OrderID, oi.order_item_name AS coupon_name, wwoi.meta_value AS coupon_amt, SUM(wwoi.meta_value) AS coupon_tot
                    FROM wp_posts P
                    INNER JOIN wp_woocommerce_order_items AS oi ON P.id = oi.order_id
                    INNER JOIN wp_woocommerce_order_itemmeta wwoi ON oi.order_item_id = wwoi.order_item_id
                    WHERE oi.order_item_type = 'coupon' AND P.ID = '".$getorder."'
                    GROUP BY P.ID, oi.order_item_name";
    //Shipping
    if ($couponsresults = $connProd->query($getQueryD)) {

        foreach($couponsresults as $row) {
            $coupondata['status'] = 'ok';
            $coupondata[] = $row;
        }

    }
}
//Close DB connection
$connProd->close();
//encode data into json for items shipped
echo json_encode($coupondata);
?>
