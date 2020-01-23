
-- Start OrdersByTotals view
CREATE OR REPLACE
VIEW `OrdersByTotals` AS
select
    `wwoi`.`order_id` AS `order_id`,
    `wp2`.`meta_value` AS `total`
from
    ((`wp_posts` `wp`
join `wp_postmeta` `wp2` on
    ((`wp2`.`post_id` = `wp`.`ID`)))
join `wp_woocommerce_order_items` `wwoi` on
    ((`wp`.`ID` = `wwoi`.`order_id`)))
where
    (((`wp`.`post_type` = 'shop_order')
    or (`wp`.`post_type` = 'shop_subscription'))
    and (`wp2`.`meta_key` = '_order_total'))
group by
    `wwoi`.`order_id`;
-- END OrdersByTotals view

-- Start OrdersByUsers view
    CREATE OR REPLACE
    VIEW `OrdersByUsers` AS
    select
        `wp`.`ID` AS `order_id`,
        `wp`.`post_date_gmt` AS `order_date`,
        `wp`.`post_status` AS `order_status`,
        `wp`.`post_title` AS `post_title`,
        `wp2`.`meta_value` AS `userid`,
        `wu`.`user_email` AS `email`,
        `wu`.`user_nicename` AS `customer_name`,
        `wu`.`display_name` AS `name`
    from
        ((`wp_posts` `wp`
    join `wp_postmeta` `wp2` on
        ((`wp`.`ID` = `wp2`.`post_id`)))
    join `wp_users` `wu` on
        ((`wp2`.`meta_value` = `wu`.`ID`)))
    where
        (((`wp`.`post_type` = 'shop_order')
        or (`wp`.`post_type` = 'shop_subscription'))
        and (`wp2`.`meta_key` = '_customer_user'))
    group by
        `wp`.`ID`;
-- END OrdersByUsers view

-- Start SalesResults view
CREATE OR REPLACE
VIEW `sales_results` AS
SELECT `P`.`ID` AS `OrderID`, `oi`.`order_item_name` AS `ItemName`,
`P`.`post_status` AS `OrderStatus`, `P`.`post_date` AS `OrderDate`,
        ( select `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` =
        `P`.`ID`) and (`M`.`meta_key` = '_billing_first_name'))) AS `FirstName_Billing`,
        ( select `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` =
        `P`.`ID`) and (`M`.`meta_key` = '_billing_last_name'))) AS `LastName_Billing`, (
        select `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`)
        and (`M`.`meta_key` = '_billing_address_1'))) AS `Address1_Billing`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_billing_address_2'))) AS `Address2_Billing`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_billing_city'))) AS `City_Billing`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_billing_state'))) AS `State_Billing`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_billing_postcode'))) AS `Postcode_Billing`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_billing_country'))) AS `Country_Billing`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_billing_email'))) AS `Email_Billing`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_shipping_first_name'))) AS `FirstName_Shipping`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_shipping_last_name'))) AS `LastName_Shipping`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_shipping_address_1'))) AS `Address1_Shipping`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_shipping_address_2'))) AS `Address2_Shipping`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_shipping_city'))) AS `City_Shipping`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_shipping_state'))) AS `State_Shipping`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_shipping_postcode'))) AS `Postcode_Shipping`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_shipping_country'))) AS `Country_Shipping`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_cart_discount'))) AS `Discount_Order`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_order_shipping'))) AS `Shipping_Order`,  ( select
        `M`.`meta_value` from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and
        (`M`.`meta_key` = '_order_tax'))) AS `Tax_Order`,  ( select `M`.`meta_value`
        from `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and (`M`.`meta_key` =
        '_order_total'))) AS `Total_Order`,  ( select `M`.`meta_value` from
        `wp_postmeta` `M` where ((`M`.`post_id` = `P`.`ID`) and (`M`.`meta_key` =
        '_prices_include_tax'))) AS `PricesWithTax`
FROM (`wp_posts` `P` join `wp_woocommerce_order_items` `oi` on ((`P`.`ID` = `oi`.`order_id`)))
WHERE (`P`.`post_type` = 'shop_order')
GROUP BY `P`.`ID`, `oi`.`order_item_name`,
`P`.`post_status`, `P`.`post_date`
ORDER BY `P`.`post_date`, `P`.`ID` desc;
-- END SalesResults view
