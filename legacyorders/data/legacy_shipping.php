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
$getQueryB = "";
$itemshipping = "";
$itemsdata = array();
if (isset($getorder) && $getorder != "") {
    //Get the Order items
        $getQueryC = "SELECT wwoi.order_item_name,wwoi.order_item_type,wwoi.order_id,wwoi2.meta_key, wwoi2.meta_value AS cost
                        FROM wp_woocommerce_order_items wwoi
                        INNER JOIN wp_woocommerce_order_itemmeta wwoi2 ON wwoi.order_item_id = wwoi2.order_item_id
                        WHERE wwoi.order_id = ".$getorder." AND wwoi.order_item_type = 'shipping' AND wwoi2.meta_key = 'cost'";
    //Shipping
    if ($itemshipping = $connProd->query($getQueryC)) {

        foreach($itemshipping as $row) {
            $itemsship['status'] = 'ok';
            $itemsship[] = $row;
        }

    }
}
//Close DB connection
$connProd->close();
//encode data into json for items shipped
echo json_encode($itemsship);
?>
