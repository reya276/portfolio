<?php
/*
Template Name: DashboardModTiles */
global $wpdb;
 ?>
 <!-- Start Page main header -->
 <!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/base.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="wp-content/themes/orchid-new/assets/css/bootstrap-tour.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/base.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri();?>/assets/js/jquery.mobile.custom.min.js"></script>
    <script src="wp-content/themes/orchid-new/assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="wp-content/themes/orchid-new/assets/css/jquery-ui.css">

<?php
//Check page access
 if (current_user_can( 'administrator' ) || current_user_can( 'editor' )) {
    $tile_id = $_GET["tile_id"];
    $id = $_POST["id"];
    $modtile = 0;
    $handle = "";
    $updateOk = 0;
    $test = 0;
    //GET Single Tile
    if ($tile_id != 0 || $tile_id != ''){
        $resultsUpd = $wpdb->get_results( 'SELECT * FROM wp_tiles WHERE id='.$tile_id, OBJECT );
    } else if ($id != 0 || $id != ''){
        $resultsUpd = $wpdb->get_results( 'SELECT * FROM wp_tiles WHERE id='.$id, OBJECT );
    }
    if(isset($_POST['modtile'])){
        $id = $_POST["id"];
        $tile_name = $_POST["tile_name"];
        $type = $_POST["type"];
        $detail = $_POST["detail"];
        $image = $_FILES["image"]["name"];
        $providers = $_POST["providers"];
        $states = $_POST["states"];
        $coverage = $_POST["coverage"];
        $appurl = $_POST["app_url"];
        $occurring = $_POST["occurring"];

        $sqlA = "UPDATE wp_tiles SET tile_name='$tile_name', detail='$detail', image='$image', states='$states', occurring='$occurring', coverage='$coverage', type='$type', app_url='$appurl', providers='$providers' WHERE id='$id'";
    }

    if ($wpdb->query($sqlA) === TRUE) {
        echo "<script>window.onunload = refreshParent;function refreshParent() {window.opener.location.reload(true);window.close();}</script>";

    }

    $wpdb->close();
     ?>
    </head>

    <body>
    <section class="main-content">
       <div class="container normal">
           <style>
               .h1-a{float:left;width:100%;color: #0051aa;font-size: 24px;font-family: 'gothamlight', Arial,sans-serif;line-height: 1.4;font-weight: normal;padding-bottom:2px;border-bottom:1px solid #004eb4;}
               .h3-a{color:#666;font-size:20px;font-family: 'gothamlight', Arial,sans-serif;line-height: 1.4;font-weight:500;padding: 10px 0px 0px 0px;}
               a:hover, a:focus {
                   color: #000;
                   text-decoration: none;
                   text-decoration-color: currentcolor;
                   text-decoration-line: none;
                   text-decoration-style: solid;
               }
               a:link{
                   text-decoration: none;
               }
               a:active, a:hover {
                   outline: 0;
                   text-decoration: none;
               }
                 #tilesfrm {
                   float:left;
                   width:100%;
                   height:auto;
                 }

                 #tileprop {
                   width:98%;
                   padding:10px 0px 3px 0px;
                   border-bottom:1px solid #004eb4;
                 }
                 #tiles{height:auto;}
                 #tprop {
                   float:left;
                   width:98.5%;
                   padding:8px;
                 }
                 .pager li{border:1px solid #666;}
                 .pagination li{border:1px solid #666;}
                 .txtalign{text-align: center;}
                 .material-icons.md-16{float:left;margin:2px 2px 0px 0px;font-size:16px;}
                 .delTile{padding:3px;background:#ffcdd2;color:#999; border:0;border-radius: 4px;}
                 .delTile:hover{padding:3px;background:#f44336;color:#fff; border:0;border-radius: 4px;}
                 .formtxt {color: #0051aa;font-size:14px;font-weight:600;}
           </style>
        <div id="tilesfrm">
            <div id="tileprop"><h3 class="h3-a"><?php foreach ($resultsUpd as $row) { echo $row->tile_name; }?></h3></div>
            <?php foreach ($resultsUpd as $row) { ?>
            <form id="tprop" name="tprop" action="<?php $_PHP_SELF ?>" method="POST"  enctype="multipart/form-data">
                <input type='hidden' name="modtile" id="modtile" value="1"/>
                    <input type='hidden' name="id" value="<?php echo $row->id; ?>"/>
                 <div class="form-group">
                    <label for="name" class="formtxt">Name:</label>
                    <input type="text" name="tile_name" required size="50" class="form-control" value="<?php echo $row->tile_name ?>" />
                    <?php if ($row->type == 'PL'){ ?>
                         <label>Personal</label>
                         <input type="radio" name="type" checked='true' value="PL" />
                         <label>Commercial</label>
                         <input type="radio" name="type" value="CL" />
                    <?php } elseif ($row->type == 'CL') { ?>
                        <label>Personal</label>
                        <input type="radio" name="type"  value="PL" />
                        <label>Commercial</label>
                        <input type="radio" name="type" checked='true' value="CL" />
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="detail" class="formtxt">Details:</label>
                      <textarea rows="5" cols="80" name="detail" class="form-control" placeholder="Enter tile details here..."><?php echo $row->detail ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="image" class="formtxt">Image(<?php echo $row->image ?>):</label>
                      <input type="file" name="image" /><span style="padding-top:5px;display:block;"><img src="wp-content/themes/orchid-new/assets/img/<?php echo $row->image ?>" width="138" height="80" border="0" style="border:1px solid #999;"/></span>
                  </div>
                  <div class="form-group">
                    <label for="providers" class="formtxt">Carriers:</label>
                      <input type="text" name="providers" size="50" class="form-control" placeholder="Enter the tile providers here..." value="<?php echo $row->providers ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="states" class="formtxt">States:</label>
                      <textarea rows="5" cols="80" name="states" size="50" class="form-control" placeholder="Enter the tile states here..."><?php echo $row->states ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="coverage" class="formtxt">Coverage:</label>
                      <input type="text" name="coverage" size="50" class="form-control" placeholder="Enter the tile coverage here..." value="<?php echo $row->coverage ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="app_url" class="formtxt">Application(PDF/Link) URL:</label>
                      <input type="text" name="app_url" size="50" class="form-control" placeholder="Enter the tile coverage here..." value="<?php echo $row->app_url ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="occuring" class="formtxt">Occuring(Coming Soon) </label>
                        <?php if ($row->occurring == 2){ ?>
                            <label for="occuring">Yes:</label>
                            <input type="radio" name="occurring" checked='true' value="2" />
                            <label for="occuring">No:</label>
                            <input type="radio" name="occurring" value="1" />
                        <?php } elseif ($row->occurring == 1) { ?>
                            <label for="occuring">Yes:</label>
                            <input type="radio" name="occurring" value="2" />
                            <label for="occuring">No:</label>
                            <input type="radio" name="occurring" checked='true' value="1" />
                        <?php } ?>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary" id="upd-bt">Update Tile</button>
                  </div>
            </form>
        <?php } ?>
        </div>
    </div>
    </section>
<?php } else {
        echo "<br/><br/><br/><br/><br/><p style='text-align:center;font-size:18px;'><img src='/wp-content/themes/orchid-new/assets/img/hesdead_jim_new.png' width='38' height='38'/><br/>Oh no He's dead Jim!<br/>You do not have access to this page sorry!</p>";
}
?>
</body>
</html>
