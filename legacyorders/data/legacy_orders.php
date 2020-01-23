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
$itemresults = "";
$itemshipping = "";
$itemsdata = array();
if (isset($getorder) && $getorder != "") {
    //Get the Order items
        $getQueryB = "SELECT o2.order_id,
                        o2.itemid,
                        o2.OIName,
                        o2.order_item_id,
                        o2.line_tot,
                        o.OQty,
                        SUM(o.OQty) AS QtyAmt
                     FROM
                        OrdersQty o
                     INNER JOIN OrdersLineTot o2 ON
                        o.order_id = o2.order_id
                     WHERE
                        o.order_id = '".$getorder."'
                     GROUP BY o2.itemid
                     ORDER BY o2.OIName ASC";
    //Items
    if ($itemresults = $connProd->query($getQueryB)) {

        foreach($itemresults as $row) {
            $itemsdata['status'] = 'ok';
            $itemsdata[] = $row;
        }

    }

}
//Close DB connection
$connProd->close();
//encode data into json for items
echo json_encode($itemsdata);
?>
