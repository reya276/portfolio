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
$sqlD="SELECT * FROM `wp_ad_categories` WHERE `visible` = 'y' ORDER BY `category_name` ASC limit 0,25";
$resultD = $conn->query($sqlD);
?>
<?php
//Loop through results
if ($resultD->num_rows > 0) {
?>
    <li><input type="radio" class="catchk" checked id="filtercat_0" name="filtercat" data-category="0" value="0" onclick="setFilterAll(0);" /><label for='filtercat_0' style="padding-left:8px;">All</label></li>
<?php
    while($row = $resultD->fetch_assoc()){
?>
    <li><input type="radio" id="filtercat_<?php echo $row["categoryid"]; ?>" data-category="<?php echo $row["categoryid"]; ?>" class="catchk" name="filtercat" onclick="setFilter(<?php echo $row["categoryid"]; ?>);" value="<?php echo $row["categoryid"]; ?>" /></input><label for='filtercat_<?php echo $row["categoryid"]; ?>' style="padding-left:8px;"> <?php echo $row["category_name"]; ?></label></li>
<?php } ?>
<?php } else { ?>
    <li><i>No categories found.</i></li>
<?php }
    $conn->close();
 ?>
