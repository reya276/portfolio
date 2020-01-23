<?php

//DB connection details
$servername = "localhost";
$username = "";
$password = "";
$dbschema = ";

$sort = "";
$fstate = "";
//Sort form GET vars
$sort = $_GET['sort'];
$fstate = $_GET['fstate'];
//create the DB connection
$conn = new mysqli($servername, $username, $password, $dbschema);
//Check the DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Commercial Lines
if ($sort == 2 && $fstate != "all") {
    $sqlB="SELECT * FROM wp_tiles WHERE `type` = 'CL' AND `states` LIKE '%".$fstate."%' ORDER BY `tile_name` ASC, `tile_order` ASC LIMIT 0,50";
} elseif ($sort == 2 && $fstate == "all") {
    $sqlB="SELECT * FROM wp_tiles WHERE `type` = 'CL' ORDER BY `tile_name` ASC, `tile_order` DESC LIMIT 0,50";
} elseif ($sort == 1 && $fstate != "all") {
    $sqlB="SELECT * FROM wp_tiles WHERE `type` = 'CL' AND `states` LIKE '%".$fstate."%' ORDER BY `tile_name` DESC, `tile_order` DESC LIMIT 0,50";
} elseif ($sort == 1 && $fstate == "all") {
    $sqlB="SELECT * FROM wp_tiles WHERE `type` = 'CL' ORDER BY `tile_name` DESC, `tile_order` DESC LIMIT 0,50";
} else {
    $sqlB="SELECT * FROM wp_tiles WHERE `type` = 'CL' ORDER BY `tile_order` ASC LIMIT 0,50";
}

$resultB = $conn->query($sqlB);
?>
<?php
//Loop through results
if ($resultB->num_rows > 0) {
    while($row = $resultB->fetch_assoc()){
?>
<?php if ($row["occurring"] != 2) {
?>
    <div class="filterrowC" data-state="<?php echo $row["states"]; ?>" data-category="<?php echo $row["category"]; ?>">
        <div class="col-sm-4 ad-tile" data-sort="<?php echo $row["tile_sort"]; ?>">
            <div  name="footprintinfo" class="footprintinfo" style="position:absolute;left:122px;z-index:2147483647;"></div>
            <a href="#" onclick="getLine('<?php echo $row["getLine"]; ?>','<?php echo htmlspecialchars($row["tile_name"]); ?>','none');__gaTracker('send', 'event', 'outbound-widget', 'https://orchidinsurance.com/agentlogin/agency-dashboard/','<?php echo htmlspecialchars($row["tile_name"]); ?>');" class="href-nav" title="<?php echo htmlspecialchars($row["tile_name"]); ?>">
                <img src="http://castor.orchidinsurance.com/wp-content/themes/orchid-new/assets/img/<?php echo $row["image"]; ?>" class="ad-tileimg-a" title="<?php echo htmlspecialchars($row["tile_name"]); ?>"/>
                <div class="ad-tile-txt"><?php echo htmlspecialchars($row["tile_name"]); ?></div>
            </a>
        </div>
    </div>
<?php } elseif ($row["occurring"] == 2) { ?>
    <div class="filterrowC" data-state="<?php echo $row["states"]; ?>">
        <div class="col-sm-4 ad-tile" data-sort="<?php echo $row["tile_sort"]; ?>">
            <span class="ad-coming-soon">Coming Soon</span>
            <div  name="footprintinfo" class="footprintinfo" style="position:absolute;left:122px;z-index:2147483647;"></div>
            <a href="#" onclick="getLine('<?php echo $row["getLine"]; ?>','<?php echo htmlspecialchars($row["tile_name"]); ?>','none');__gaTracker('send', 'event', 'outbound-widget', 'https://orchidinsurance.com/agentlogin/agency-dashboard/','<?php echo htmlspecialchars($row["tile_name"]); ?>');" class="href-nav" title="<?php echo htmlspecialchars($row["tile_name"]); ?>">
                <img src="http://castor.orchidinsurance.com/wp-content/themes/orchid-new/assets/img/<?php echo $row["image"]; ?>" class="ad-tileimg-a" title="<?php echo htmlspecialchars($row["tile_name"]); ?>"/>
                <div class="ad-tile-txt"><?php echo htmlspecialchars($row["tile_name"]); ?></div>
            </a>
        </div>
    </div>
<?php } ?>
<?php } ?>
<?php } else { ?>
    <p>No commercial line tiles found.</p>
<?php }
    $conn->close();
 ?>
