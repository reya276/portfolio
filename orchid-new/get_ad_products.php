<?php

//DB connection details
$servername = "localhost";
$username = "";
$password = "";
$dbschema = "";

//create the DB connection
$conn = new mysqli($servername, $username, $password, $dbschema);
//Check the DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Commercial Lines
$sqlD="SELECT * FROM `wp_ad_products` WHERE `visible` = 'y' ORDER BY `product_name` ASC limit 0,25";
$resultD = $conn->query($sqlD);
?>
<?php
//Loop through results
if ($resultD->num_rows > 0) {
?>
    <li>
        <input type="radio" id="filterby" name="filterby" class="filterby" value="0" title="All" onclick="prodChange();" checked /> <label for="filter-by">All</label>
    </li>
<?php
    while($row = $resultD->fetch_assoc()){
?>
    <li>
        <input type="radio" id="filterby" name="filterby" class="filterby" value="<?php echo $row["productid"]; ?>" onclick="prodChange();" title="<?php echo htmlspecialchars($row["product_name"]); ?>"/> <label for="filter-by"><?php echo htmlspecialchars($row["product_name"]); ?></label>
    </li>
<?php } ?>
<?php } else { ?>
    <li><i>No products found.</i></li>
<?php }
    $conn->close();
 ?>
