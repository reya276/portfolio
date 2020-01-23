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
$getQueryA = "";
$orderResults = "";
$orderdata = array();
if (isset($getorder) && $getorder != "") {
    //get order query
    $getQueryA = "SELECT P.ID AS OrderID, oi.order_item_name as ItemName, P.post_status AS OrderStatus, P.post_type AS PostType, P.post_date AS OrderDate,
                	(SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_first_name') as 'FNBilling',
                	(SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_last_name') as 'LNBilling',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_1') as 'BAddress1',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_address_2') as 'BAddress2',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_city') as 'BCity',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_state') as 'BState',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_postcode') as 'BZipcode',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_country') as 'BCountry',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_billing_email') as 'BEmail',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_first_name') as 'FNShipping',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_last_name') as 'LNShipping',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_1') as 'SAddress1',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_address_2') as 'SAddress2',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_city') as 'SCity',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_state') as 'SState',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_postcode') as 'SZipcode',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_shipping_country') as 'SCountry',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_cart_discount') as 'ODiscount',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_shipping') as 'OShipping',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_tax') as 'OTax',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_order_total') as 'OTotal',
                    (SELECT meta_value FROM wp_postmeta M WHERE M.post_id=P.ID AND meta_key='_prices_include_tax') as 'Prices With Tax'
                FROM wp_posts P inner join wp_woocommerce_order_items as oi on P.id = oi.order_id
                WHERE (P.post_type='shop_order' OR P.post_type='shop_subscription') AND P.ID = '".$getorder."'
                GROUP BY P.ID, oi.order_item_name,P.post_status, P.post_type, P.post_date";


    //Check to see if data is returned
    if ($orderResults = $connProd->query($getQueryA)) {
        //while ($row = $orderResults->fetch_row()) {
            foreach($orderResults as $row) {
                $orderdata['status'] = 'ok';
                $orderdata['results'] = $row;
            }
        //}

    }
}
//Close DB connection
$connProd->close();
//encode data into json
echo json_encode($orderdata);
?>
