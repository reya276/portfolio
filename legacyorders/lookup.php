<?php
//Start the session
session_start();

//Set currency format
setlocale(LC_MONETARY, 'en_US');

if (!empty($_GET['getdb']) && $_GET['getdb'] == 1) {
  // DB connection
  include "data/db_conn_2.php";
  echo 'dbconn 1 - legacy';
  echo $_GET['getdb'];
} else if (!empty($_GET['getdb']) && $_GET['getdb'] == 2) {
  // DB connection
  include "data/db_conn_2.php";
  echo 'dbconn 2 - Production';
  echo $_GET['getdb'];
} else if (empty($_GET['getdb'])){
  // DB connection
  include "data/db_conn.php";
  echo 'dbconn 1 - legacy';
  echo $_GET['getdb'];
}

//Set the session expire time
$duration = 30;
//check if the session has expired
if (isset($_SESSION['lastactive'])) {
    //check how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['lastactive'];
    //COnvert minutes to seconds
    $expireAfterSeconds = $duration * 60;
    //Check if they have been inactive too long
    if($secondsInactive >= $expireAfterSeconds) {
        //Kill the session fpr the user
        session_unset();
        session_destroy();
        header('Location:  customer_login.php?errmsg=ER3');
    }
}
// $_POST["lsearch"] = "";
$queryA = "";
$resultsA = "";
$userid = '';
//Check to see if a search was requested
if ( isset($_GET['lsearch']) ) {
    $lsearch = $_GET['lsearch'];
} else {
    $lsearch = "";
}
if (isset($_GET['sortby'])) {
    switch ($_GET['sortby']) {
        case 1:
            $sortsql = "o2.order_id ASC";
            $sortby = 2;
        break;
        case 2:
            $sortsql = "o2.order_id DESC";
            $sortby  = 1;
        break;
        case 3:
            $sortsql = "o.order_date ASC";
            $sortby = 4;
        break;
        case 4:
            $sortsql = "o.order_date DESC";
            $sortby  = 3;
        break;
        case 5:
            $sortsql = "o.order_status ASC";
            $sortby = 6;
        break;
        case 6:
            $sortsql = "o.order_status DESC";
            $sortby  = 5;
        break;
        case 7:
            $sortsql = "o.post_title ASC";
            $sortby = 6;
        break;
        case 8:
            $sortsql = "o.post_title DESC";
            $sortby  = 5;
        break;
        case 9:
            $sortsql = "o2.total ASC";
            $sortby = 10;
        break;
        case 10:
            $sortsql = "o2.total DESC";
            $sortby  = 9;
        break;
        case 11:
            $sortsql = "o.post_type ASC";
            $sortby = 12;
        break;
        case 12:
            $sortsql = "o.post_type DESC";
            $sortby  = 11;
        break;
        default:
            $sortsql = "o2.order_id DESC";
            $sortby = 2;
        break;
    }
}
//Check to see if the session userid was set
if ( isset($_SESSION["userid"]) ) {
        //If islogin is 2 then query by the URL userid
        if ( $_SESSION["islogin"] == 2 ) {
                $userid = $_SESSION['userid'];
                if ( $lsearch != ""  && $_SESSION["islogin"] == 2) {
                    $queryA = "SELECT o.order_date,
                                    o.order_status,
                                    o.post_title,
                                    o.post_type,
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
                                ORDER BY $sortsql";

                } else {
                    $queryA = "SELECT o.order_date,
                                    o.order_status,
                                    o.post_title,
                                    o.post_type,
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
                                ORDER BY $sortsql";

                    //echo '<div id="testid">Session ID is: Customer - '.$_SESSION["islogin"].'- Searched for: '.$lsearch.'</div>';
                }

                $resultsA = $connProd->query($queryA);
                //printf("Sorting by: ".$sortsql);

        } else if ( $_SESSION["islogin"] == 1 ) {
            if ( $lsearch != ""  && $_SESSION["islogin"] == 1) {

                $queryA = "SELECT o.order_date,
                                o.order_status,
                                o.post_title,
                                o.post_type,
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
                            ORDER BY $sortsql";

            } else {
                $userid = $_SESSION["userid"];
                $queryA = "SELECT o.order_date,
                                o.order_status,
                                o.post_title,
                                o.post_type,
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
                            WHERE (o.userid = '".$userid."')
                            ORDER BY $sortsql";

                //echo '<div id="testid">Session ID is: Admin - '.$_SESSION["islogin"].'- Searched for: '.$lsearch.'</div>';


            }
            $resultsA = $connProd->query($queryA);
            //printf("Sorting by: ".$sortsql);
            // $resultsList = $resultsA;
            // foreach($resultsList as $row) {
            //     $itemsList['status'] = 'ok';
            //     $itemsList[] = $row;
            // }
            // $listorders = json_encode($itemsList);
        }

}


//Set the current timestamp as user's last active
$_SESSION['lastactive'] = time();
//$_GET['getdb'];
 ?>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Legacy Orders - Bang-Energy</title>
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <meta http-equiv="refresh" content="900;url=http://10.220.0.4/rangeles/legacyorders/customer_logout.php?islogin=0" />
        <script>
        var getOrder;
        var server = location.hostname+"/bang-us/shop/";
        $(document).ready(function() {

            getOrder = function(orderidx) {
                    var order_id = orderidx;
                    var getdbx = <?php echo $_GET['getdb']; ?>;
                    console.log("Order_ID: "+order_id+" Get DB: "+getdbx);
                    //Order Customer Data
                    $.ajax({
                        type:'GET',
                        url:'data/get_order.php',
                        dataType: "json",
                        data:{order_id:order_id,getdb:getdbx},
                        success:function(orderdata){
                            console.log("Order Data From DB: " + JSON.stringify(orderdata.results));

                            if (orderdata.status == 'ok'){
                                $('#OrderID').text("#"+orderdata.results.OrderID);
                                //String split for item name
                                var str = orderdata.results.ItemName;
                                var ItemName = str.replace(" ", "-");
                                //Colorcode the status $output
                                switch (orderdata.results.OrderStatus) {
                                    case "wc-completed":
                                        $('#OrderStatus').html("Status: <br/><span style='color:#2e7d32;font-weight:500;'>" + orderdata.results.OrderStatus + "</span>");
                                    break;
                                    case "wc-cancelled":
                                        $('#OrderStatus').html("Status: <br/><span style='color:#d84315;font-weight:500;'>" + orderdata.results.OrderStatus + "</span>");
                                    break;
                                    case "wc-failed":
                                        $('#OrderStatus').html("Status: <br/><span style='color:#dd2c00;font-weight:500;'>" + orderdata.results.OrderStatus + "</span>");
                                    break;
                                    case "wc-on-hold":
                                        $('#OrderStatus').html("Status: <br/><span style='color:#1565c0;font-weight:500;'>" + orderdata.results.OrderStatus + "</span>");
                                    break;
                                    case "wc-processing":
                                        $('#OrderStatus').html("Status: <br/><span style='color:#ef6c00;font-weight:500;'>" + orderdata.results.OrderStatus + "</span>");
                                    break;
                                    case "wc-refunded":
                                        $('#OrderStatus').html("Status: <br/><span style='color:#d84315;font-weight:500;'>" + orderdata.results.OrderStatus + "</span>");
                                    break;
                                    default:
                                        $('#OrderStatus').html("Status: <br/><span style='color:#dd2c00;font-weight:500;'>No Data</span>");
                                }


                                if (orderdata.results.BAddress2 === null && orderdata.results.SAddress2 === null) {
                                    var BAddress2 = '';
                                    var SAddress2 = '';
                                    $('#DateCreated').text("Date Created: "+orderdata.results.OrderDate);
                                    $('#Billing').html(orderdata.results.FNBilling +" " +orderdata.results.LNBilling + "<br/>"+
                                    orderdata.results.BAddress1 + "<br/>" + BAddress2 +"<br/>"+ orderdata.results.BCity +", "+orderdata.results.BState + orderdata.results.BZipcode);
                                    $('#Shipping').html(orderdata.results.FNShipping +" " +orderdata.results.LNShipping + "<br/>"+
                                    orderdata.results.SAddress1 + "<br/>" + SAddress2 +"<br/>"+ orderdata.results.SCity +", "+orderdata.results.SState + orderdata.results.SZipcode);
                                    $('#EmailAddress').html("Email Address: <br/><a href='mailto:" + orderdata.results.BEmail + "'>" + orderdata.results.BEmail + "</a>");
                                    //$('#OrderItems').html("<a href='http://"+server+ItemName+"' target='_blank' title='"+orderdata.results.ItemName+"'>"+orderdata.results.ItemName+"</a>");
                                    $('#OrderCost').html("$"+orderdata.results.OTotal);
                                    $('#ItemCost').html("$"+orderdata.results.OTotal);
                                    $('#Customer').html("Customer: "+orderdata.results.FNBilling + " " +orderdata.results.LNBilling);
                                } else {
                                    $('#DateCreated').text("Date Created: "+orderdata.results.OrderDate);
                                    $('#Billing').html(orderdata.results.FNBilling +" " +orderdata.results.LNBilling + "<br/>"+
                                    orderdata.results.BAddress1 + "<br/>" + orderdata.results.BAddress2 +"<br/>"+ orderdata.results.BCity +", "+orderdata.results.BState + orderdata.results.BZipcode);
                                    $('#Shipping').html(orderdata.results.FNShipping +" " +orderdata.results.LNShipping + "<br/>"+
                                    orderdata.results.SAddress1 + "<br/>" + orderdata.results.SAddress2 +"<br/>"+ orderdata.results.SCity +", "+orderdata.results.SState + orderdata.results.SZipcode);
                                    $('#EmailAddress').html("Email Address: <br/><a href='mailto:" + orderdata.results.BEmail + "'>" + orderdata.results.BEmail + "</a>");
                                    //$('#OrderItems').html("<a href='http://"+server+ItemName+"' target='_blank' title='"+orderdata.results.ItemName+"'>"+orderdata.results.ItemName+"</a>");
                                    $('#OrderCost').html("$"+orderdata.results.OTotal);
                                    $('#ItemCost').html("$"+orderdata.results.OTotal);
                                    $('#Customer').html("Customer: "+orderdata.results.FNBilling + " " +orderdata.results.LNBilling);
                                }

                            } else {
                              console.log("Order Data From DB: " + JSON.stringify(orderdata.results));
                               alert("User not found...");
                            }
                        }
                    });
                    //Order Items Data
                    $.ajax({
                        type:'GET',
                        url:'data/legacy_orders.php',
                        dataType: "json",
                        data:{order_id:order_id,getdb:getdbx},
                        success:function(itemsdata){
                            console.log("Item Data From DB: [" + JSON.stringify(itemsdata) + "]");
                            var qtytot = itemsdata.QtyAmt;
                            if (itemsdata.status = 'ok') {
                                var items = "";
                                var ltot = "";
                                var qtys = "";
                                var qtytot = "";
                                console.log("WHAT IS THE VALUE OF: "+qtytot);
                                $.each(itemsdata, function (index, value) {
                                    //console.log(value);
                                    if (typeof value.itemid === 'undefined') {
                                        items += "<div id='0'>None</div>";
                                        ltot += "<div id='None'>0</div>";
                                        qtys += "<div id='None'>0</div>";
                                        console.log("Item Data From DB: [" + JSON.stringify(itemsdata) + "]");
                                    } else {
                                        items += value.OIName+" <br/>";
                                        ltot += "$"+value.line_tot+" <br/>";
                                        qtys += value.OQty+" <br/>";
                                        //qtytot = value.QtyAmt;
                                        console.log("Item Data From DB: [" + JSON.stringify(itemsdata) + "]");
                                        $('#OrderItems').html(items);
                                        $('#LItemCost').html(ltot);
                                        $('#OrderQTY').html(qtys);
                                        $('#OrderQTYToT').html(qtytot);
                                    }

                                });


                            }

                        },
                        beforeSend: function() {
                            $( "#loader" ).html('<div class="spinner-border text-success" role="status"><span class="sr-only">Loading...</span></div>').show();
                            $( '.modal-body').hide();
                        },
                        complete: function() {
                            $( "#loader" ).html('<div class="spinner-border text-success text-center" role="status"><span class="sr-only">Loading...</span></div>').hide();
                            $( '.modal-body').show();
                        }
                    });
                    //Shipping Data
                    $.ajax({
                        type:'GET',
                        url:'data/legacy_shipping.php',
                        dataType: "json",
                        data:{order_id:order_id,getdb:getdbx},
                        success:function(itemsship){
                            if (itemsship.status = 'ok') {
                                var itemname = "";
                                var shipping = "";
                                var shipqty = "";
                                $.each(itemsship, function (index, value) {
                                    //console.log(value);
                                    if (typeof value.order_item_name === 'undefined') {
                                        itemname += "<div id='OrderShipping'>None</div>";
                                        shipping += "<div id='ShippingCost'>$0.00</div>";
                                    } else {
                                        if ( value.order_item_name.indexOf("FedEx Home") || value.order_item_name.indexOf("FedEx")) {
                                            itemname += "<span style='background-color:red;color:#fff;'"+value.order_item_name+"</span><br/>";
                                        } else {
                                            itemname += value.order_item_name+" <br/>";
                                        }
                                        shipping += "$"+value.cost+" <br/>";
                                        //console.log("Item Data From DB: [" + JSON.stringify(itemsship) + "]");
                                        $('#OrderShipping').html(itemname);
                                        $('#ShipCost').html(shipping);
                                        $('#ShippingCost').html(shipping);
                                        $('#ShipQTY').html(shipqty);
                                    }

                                });


                            }
                        }
                    });
                    //Coupon Data
                    $.ajax({
                        type:'GET',
                        url:'data/legacy_coupons.php',
                        dataType: "json",
                        data:{order_id:order_id,getdb:getdbx},
                        success:function(coupondata){
                            if (coupondata.status = 'ok') {
                                //console.log("For Coupons: "+order_id);
                                var coupon_name = "";
                                var coupon_amt = "";
                                var OrderID = "";
                                var coupon_tot = "";
                                $.each(coupondata, function (index, value) {
                                    //console.log(value);
                                    if (typeof value.OrderID === 'undefined') {
                                        coupon_name += "<div>None</div>";
                                        coupon_amt += "<div>$0.00</div>";
                                        coupon_tot += "<div>$0.00</div>";
                                    } else {
                                        coupon_name += value.coupon_name;
                                        coupon_amt += value.coupon_amt;
                                        coupon_tot += value.coupon_tot;
                                        //console.log("Coupon Data From DB: [" + JSON.stringify(coupondata) + "]");
                                        $('#OrderCoupon').html(coupon_name);
                                        $('#CouponAmt').html("$"+coupon_amt);
                                        $('#CouponToT').html("$"+coupon_tot);
                                    }

                                });


                            }
                        }

                    });

                }
                //Print modal
                document.getElementById("btnPrint").onclick = function () {
                  printElement(document.getElementById("modal-content"));
                }

                function printElement(elem) {
                  var domClone = elem.cloneNode(true);

                  var $printSection = document.getElementById("printSection");

                  if (!$printSection) {
                      var $printSection = document.createElement("div");
                      $printSection.id = "printSection";
                      document.body.appendChild($printSection);
                  }

                  $printSection.innerHTML = "";
                  $printSection.appendChild(domClone);
                  window.print();
                }
        });

        </script>
    </head>
    <body>
        <form action="lookup.php" method="GET" id="form-login">
            <?php
                if ($_SESSION['islogin'] == 2) {
                    if ( isset($_GET['userid'])) {
                        echo '<input type="hidden" name="userid" id="userid" value="'.$_SESSION['userid'].'"/>';
                        echo '<input type="hidden" name="getdb" id="getdb" value="'.$_GET['getdb'].'"/>';
                        if (isset($_GET['sortby'])) {
                            echo '<input type="hidden" name="sortby" id="sortby" value="'.$_GET['sortby'].'"/>';
                        } else {
                            echo '<input type="hidden" name="sortby" id="sortby" value="1"/>';
                        }
                    }
                } else if ( $_SESSION['islogin'] == 1 ) {
                    echo '<input type="hidden" name="userid" id="userid" value="'.$_SESSION['userid'].'"/>';
                    echo '<input type="hidden" name="getdb" id="getdb" value="'.$_GET['getdb'].'"/>';
                    if (isset($_GET['sortby'])) {
                        echo '<input type="hidden" name="sortby" id="sortby" value="'.$_GET['sortby'].'"/>';
                    } else {
                        echo '<input type="hidden" name="sortby" id="sortby" value="1"/>';
                    }
                    if ($lsearch !="") {
                        //echo '<input type="hidden" name="lsearch" id="lsearch" value="'.$_POST['lsearch'].'"/>';
                        //print_r($lsearch);
                    }
                }
            ?>
            <input type="hidden" name="islogin" id="islogin" value="<?php echo $_SESSION['islogin']; ?>"/>
            <div id="header">
                <span id="bang-logo"></span>
                <h2 class="logout">
                    <span>
                        <a href="customer_logout.php?islogin=<?php echo $_SESSION["islogin"]; ?>" style="color:white;">Logout</a>
                    </span>
                </h2>
            </div>
            <div id="header-top"></div>
            <div id="header-img"></div>
            <div id="header-top"></div>
            <div id="sub-header">
                <div id="search">
                <?php if (isset($_SESSION['userid']) && $_SESSION['islogin'] == 1) { ?>
                    <div id="changedb" style="float:left;display:inline;">
                        <lable for="getdb">Change search location: </lable>
                        <select name="getdb" id="getdb" class="form-control">
                          <?php if ($_GET['getdb'] == 0) { ?>
                            <option value="0" selected>Select database</option>
                            <option value="1">Legacy</option>
                            <option value="2">Production</option>
                          <?php } else if ($_GET['getdb'] == 1) { ?>
                            <option value="1" selected>Legacy</option>
                            <option value="2">Production</option>
                          <?php } else if ($_GET['getdb'] == 2) { ?>
                            <option value="1">Legacy</option>
                            <option value="2" selected>Production</option>
                          <?php } else { ?>
                            <option value="0" selected>Select database</option>
                            <option value="1">Legacy</option>
                            <option value="2">Production</option>
                          <?php } ?>
                        </select>
                    </div>
                <?php } ?>
                <?php if ( isset($_GET['lsearch']) != ""){ ?>
                    <span class="search-txt">Order Search:</span>
                    <input type="text" id="input-search" name="lsearch" class="input-txt" value="<?php echo $_GET['lsearch']; ?>" required="yes" placeholder="Enter the order number or customer name" />
                <?php } else { ?>
                    <input type="text" id="input-search" name="lsearch" class="input-txt" value="" required="yes" placeholder="Enter the order number or customer name" />
                <?php } ?>
                    <button type="submit" title="Search" class="button-txt"><i class="fas fa-search fa-lg"></i> Search</button>
                </div>
                <div id="title">Legacy Orders</div>
            </div>
            <div id="errormsg"></div>
            <div id="grid-main">
                <div id="grid">
                    <!-- Grid Rows -->
                        <?php
                        //echo "<div>This is for Admin (".$_POST["lsearch"]." - User Session ".$_SESSION['islogin'].").</div>";
                            if ($resultsA = $connProd->query($queryA)) {
                                if ($resultsA->num_rows !== 0) {
                                    //Switch for sorting
                                    switch ($_GET['sortby']) {
                                        case 1:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=2&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=3&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=6&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=8&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 2:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=3&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=6&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=8&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 3:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=4&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=6&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=8&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 4:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=3&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=6&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=8&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 5:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=4&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=6&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=8&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 6:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=3&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=5&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=8&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 7:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=4&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=6&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=8&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 8:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=3&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=5&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=7&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 9:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=4&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=6&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=8&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 10:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=3&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=5&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=7&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=9&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        case 11:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=3&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=5&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=7&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=12&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=9&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                        default:
                                            echo '<div id="col-a" title="Order"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=1&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-file-invoice fa-lg"></i> Orders</a></div>';
                                            echo '<div id="col-a" title="Date"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=3&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-calendar-alt fa-lg"></i> Date</a></div>';
                                            echo '<div id="col-a" title="Status"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=6&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-check-circle fa-lg"></i> Status</a></div>';
                                            echo '<div id="col-a" title="Origin"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=8&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-map-pin fa-lg"></i> Origin</a></div>';
                                            echo '<div id="col-a" title="Type"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=11&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-folder fa-lg"></i> Type</a></div>';
                                            echo '<div id="col-a" title="Total"><a href="'.$_SERVER['PHP_SELF'].'?userid='.$_SESSION['userid'].'&sortby=10&getdb='.$_GET['getdb'].'&lsearch='.$_GET['lsearch'].'" style="color:white;"><i class="fas fa-dollar-sign fa-lg"></i> Total</a></div>';
                                        break;
                                    }
                                    //Loop thropugh the results sets
                                    while($row = $resultsA->fetch_row()) {
                                        echo '<div id="rows-a" style="text-align:left;color:#0074e8;" title="'.$row[7].'"><input type="button" class="button-link" data-toggle="modal" data-target="#usrDetail" name="orderNum" onclick="getOrder('.$row[7].');" value="'.$row[7].'"/></div>';
                                        echo '<div id="rows-a" style="text-align:center;" title="'.$row[0].'">'.$row[0].'</div>';
                                        echo '<div id="rows-a" style="text-align:center;" title="'.$row[1].'">'.$row[1].'</div>';
                                        echo '<div id="rows-a" style="text-align:left;" title="'.$row[2].'">'.$row[2].'</div>';
                                        echo '<div id="rows-a" style="text-align:left;" title="'.$row[3].'">'.$row[3].'</div>';
                                        echo '<div id="rows-a" style="text-align:right;color:#007239;" title="$'.$row[8].'">$'.$row[8].'</div>';

                                    }
                                } else if ($resultsA->num_rows === 0) {
                                    echo '<div id="query-msg">
                                        <p align="center" class="img-opy"><img src="assets/img/map-lost-icon2.png" width="250" /></p>
                                        <p style="text-align:center;font-weight:bold;font-size:2.1em;color:red;">No results found!</p>
                                        <p align="center">Your search returned nop results. Please try again.</p>
                                        </div>';

                                }
                            }
                            $connProd->close();
                        ?>
                </div>
                <!-- Begin fotter -->
                <div id="footer-top"></div>
                <div id="footer-main">
                    <span style="float:left;color:#fff;">Copyright &copy; 2019 Bang Energy | <a href="https://bang-energy.com" title="Bang Energy" style="color:#fff;" target="_blank">Bang Energy</a></span>
                    <span style="float:right;color:#fff;">All Rights Reserved Bang Energy</span>
                </div>
            </div>
        </form>

        <!-- Modal -->

        <div class="modal fade" id="usrDetail" tabindex="-1" role="dialog" aria-labelledby="usrDetailTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered mw-100 w-50" role="document">
            <div class="modal-content" id="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Order <span id="OrderID" style="color:red;"></span>  Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div id="loader" style="display:block; margin:50px auto;"></div>
              <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">General</th>
                            <th scope="col">Billing</th>
                            <th scope="col">Shipping</th>
                            <th scope="col"></th>
                            <th scope="col"scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    <thead>
                    <tr>
                        <td id="DateCreated" scope="row"></td>
                        <td id="Billing" scope="row"></td>
                        <td id="Shipping" scope="row"></td>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td id="OrderStatus"></td>
                        <td id="EmailAddress"></td>
                        <td id="Customer" scope="row"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <table class="table">
                                <thead>
                                    <th scope="col" width="460">Item</th>
                                    <th scope="col" width="123" class="text-right">Cost</th>
                                    <th scope="col" class="text-right">Qty</th>
                                    <th scope="col" class="text-right">Total</th>
                                </thead>
                                <tr>
                                    <td id="OrderItems"></td>
                                    <td id="LItemCost" align="right"></td>
                                    <td id="OrderQTY" align="right"></td>
                                    <td align="right"></td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="right"></td>
                                    <td id="OrderQTYToT" align="right"></td>
                                    <td id="OrderCost" align="right"></td>

                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6">
                            <table class="table">
                                <thead>
                                    <th scope="col" width="460">Shipping</th>
                                    <th scope="col" width="123" class="text-right">Shipping Cost</th>
                                    <th scope="col" class="text-right">Qty</th>
                                    <th scope="col" class="text-right">Total</th>
                                </thead>
                                <tr>
                                    <td id="OrderShipping"></td>
                                    <td id="ShipCost" align="right"></td>
                                    <td id="ShipQTY" align="right"></td>
                                    <td id="ShippingCost" align="right"></td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <table class="table">
                                <thead>
                                    <th scope="col" width="460">Coupon Name</th>
                                    <th scope="col"  class="text-right">Coupon Discount</th>
                                    <th scope="col" class="text-right">Total</th>
                                </thead>
                                <tr>
                                    <td id="OrderCoupon"></td>
                                    <td id="CouponAmt" align="right"></td>
                                    <td id="CouponToT" align="right"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-print="modal" id="btnPrint" title="Print"><i class="fas fa-print"></i> Print</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" title="Close"><i class="fas fa-times-circle"></i> Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
