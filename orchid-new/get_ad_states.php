<?php

//DB connection details
$servername = "localhost";
$username = "";
$password = "";
$dbschema = "";

$fstate = "";
//get form post vars
$fstate = $_GET['fstate'];
//create the DB connection
$conn = new mysqli($servername, $username, $password, $dbschema);
//Check the DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//States list
if ($fstate != "all"){
    $sqlD="SELECT * FROM `wp_ad_states` WHERE `postid` NOT LIKE '0' AND `name` = '".$fstate."' ORDER BY name ASC LIMIT 0,52";
} else {
    $sqlD= "";
}

$sqlC="SELECT * FROM `wp_ad_states` WHERE `postid` NOT LIKE '0' ORDER BY name ASC LIMIT 0,52";

$resultC = $conn->query($sqlC);
$resultD = $conn->query($sqlD);
if ($resultD->num_rows > 0) {
    while ($row = $resultD->fetch_assoc()) {
        $choosenstate = $row["name"];
        if ($fstate != "all"){
            echo '<option value="'.$choosenstate.'" selected="true">'.$choosenstate.'</option>';
        } else {
            echo '<option value="all" selected>Choose the Property Location</option>';
        }
    }
} else {
    echo '<option value="all" selected>Choose the Property Location</option>';
}

?>
<?php
//Loop through results
if ($resultC->num_rows > 0) {

?>

    <option value="Caribbean" style="background:#f0f4c3;">Caribbean Properties</option>
<?php
    while($row = $resultC->fetch_assoc()){
?>
        <option value="<?php echo $row["name"]; ?>" data-postid="<?php echo $row["postid"]; ?>"><?php echo $row["name"]; ?></option>
<?php } ?>
<?php } else { ?>
        <option value="none" selected='true'>No states found</option>
<?php }
    $conn->close();
 ?>
