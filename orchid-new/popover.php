
<?php
global $wpdb;
$servername = "";
$username = "";
$password = "";
$dbschema = "";
//create variable with initial value from selected state list
$post_id = intval($_GET['post_id']);
//create the DB connection
$conn = new mysqli($servername, $username, $password, $dbschema);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Get the data via select statement
//Personal Lines
$sqlA="SELECT * FROM wp_postmeta WHERE  `meta_key` IN ('personal_lines1', 'personal_lines2')  AND post_id=".$post_id." Limit 0,100";
$resultA = $conn->query($sqlA);
//Commercial Lines
$sqlB="SELECT * FROM wp_postmeta WHERE  `meta_key` IN ('commercial_lines1', 'commercial_lines2')  AND post_id=".$post_id." Limit 0,100";
$resultB = $conn->query($sqlB);
//Specialty HNW
$sqlC="SELECT * FROM wp_postmeta WHERE  `meta_key` IN ('shnw1', 'shnw2')  AND post_id=".$post_id." Limit 0,100";
$resultC = $conn->query($sqlC);
//contacts_0_contact_name
$sqlD="SELECT * FROM wp_postmeta WHERE  `meta_key` IN ('contacts_0_contact_title', 'contacts_0_contact_name', 'contacts_0_contact_phone', 'contacts_0_contact_email')  AND post_id=".$post_id." Limit 0,100";
$resultD = $conn->query($sqlD);
//$results = $wpdb->get_results($sql);
//$wpdb->show_errors();
//Output pretty HTML with result set
 //echo "<h2>Quick Facts</h2>";
//Loop through the results with "WHILE"
if ($resultA->num_rows > 0){
    echo "<div style='width:98%;float:left;margin:6px 0px 0px 5px;border-bottom:1px solid #ccc;font-family: 'GothamBook', Arial, sans-serif;font-size:14px !important;font-weight:bold !important;color:#004EB4 !important;padding:10px 0px 5px 0px;'>E&S PERSONAL LINES</div>";
    while($row = $resultA->fetch_assoc()){
      echo "<div style='background:#ffffff;float:left;margin:6px 0px 0px 13px;;width:95%;font-size: 12px; color: #333;list-style:none;'>" . $row['meta_value'] . "</div>";

    }
}else{
  echo "0 results";
}
//Loop through the results with "WHILE"
if ($resultB->num_rows > 0){
    echo "<div style='width:98%;float:left;margin:6px 0px 0px 5px;border-bottom:1px solid #ccc;font-family: 'GothamBook', Arial, sans-serif;font-size:14px !important;font-weight:bold !important;color:#004EB4 !important;padding:10px 0px 5px 0px;'>COMMERCIAL LINES</div>";
    while($row = $resultB->fetch_assoc()){
      echo "<div style='background:#ffffff;float:left;margin:6px 0px 0px 13px;;width:95%;font-size: 12px; color: #333;list-style:none;'>" . $row['meta_value'] . "</div>";

    }
}else{
  echo "0 results";
}
//Loop through the results with "WHILE"
if ($resultC->num_rows > 0){
    echo "<div style='width:98%;float:left;margin:6px 0px 0px 5px;border-bottom:1px solid #ccc;font-family: 'GothamBook', Arial, sans-serif;font-size:14px !important;font-weight:bold !important;color:#004EB4 !important;padding:10px 0px 5px 0px;'>SPECIALTY HIGH NET WORTH</div>";
    while($row = $resultC->fetch_assoc()){

      echo "<div style='background:#ffffff;float:left;margin:6px 0px 0px 13px;width:95%; font-size: 12px; color: #333;list-style:none;'>" . $row['meta_value'] . "</div>";

    }
}else{
  echo "0 results";
}
//Loop through the results with "WHILE"
if ($resultD->num_rows > 0){
    echo "<div style='position:relative;top:5px;font-family: 'GothamBook', Arial, sans-serif;font-size:16px !important;font-weight:bold !important;color:#004EB4;padding:8px;'>Contact Information</div>";
    echo "<div style='position:relative;top:5px;border:1px solid #999;padding:5px;'>";
    while($row = $resultD->fetch_assoc()){
      echo "<div style='position:relative;top:5px;left:5px;width:98.5%;font-size: 12px; color: #333;list-style:none;'>" . $row['meta_value'] . "</div>";

    }
    echo "</div>";
}else{
  echo "0 results";
}
$conn->close();
 ?>
