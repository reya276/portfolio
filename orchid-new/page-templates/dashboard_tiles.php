<?php
/*
Template Name: DashboardTiles */
 ?>
<!-- Start Page main header -->
<?php get_header(); ?>
<?php
global $wpdb;

//check page access
if (current_user_can( 'administrator' ) || current_user_can( 'editor' )) {

    $results = $wpdb->get_results( 'SELECT * FROM wp_tiles ORDER BY tile_name ASC', OBJECT );
    //$resObj = json_encode($results);
    //$resObjstr =  (string)$resObj;

    $tile_id = $_GET["tile_id"];
    $rem = $_GET["remtile"];
    $addtile = $_POST["addtile"];


    //Add tile
    if ($addtile == 1){
        //Upload image file to Directory
        $tdir = "wp-content/themes/orchid-new/assets/img/";//<-Target directory
        $tfile = $tdir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imgFileType = strtolower(pathinfo($tfile,PATHINFO_EXTENSION));
        //Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                //echo "<script> alert('Tile file is an image - " . $check["mime"] . "');</script>";
                $uploadOk = 1;
            } else {
                echo "<script> alert('The tile image file selected is not an image!');</script>";
                $uploadOk = 0;
            }
            //Check file size to see if larger than 500KB
            if ($_FILES["image"]["size"] > 500000) {
                echo "<script> alert('Sorry, the tile image file is too large!');</script>";
                $uploadOk = 0;
            }
            //Check file to see if is a JPG/JPEG and PNG
            if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
                echo "<script>alert('Sorry, only JPG, JPEG and PNG files are allowed!');</script>";
                $uploadOk = 0;
            }
            //Check if file exists
            if (file_exists($tfile)) {
                echo "<script> alert('Sorry, tile image file already exists!');</script>";
                $uploadOk = 0;
            }
            //Check to see if $uploadOk is set to 0 by an error above
            if ($uploadOk === 0) {
                echo "<script>alert('Sorry, file was not uploaded!')</script>";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $tfile)) {
                    echo "<script> alert('The file". basename( $_FILES["image"]["name"]). " has been uploaded!')";
                } else {
                    echo "<script> alert('Sorry, there was an error uploading the tile image file!')</script>";
                }
            }
        }
        $tile_name = $_POST["tile_name"];
        $type = $_POST["type"];
        $detail = $_POST["detail"];
        $image = $_POST["image"];
        $providers = $_POST["providers"];
        $states = $_POST["states"];
        $coverage = $_POST["coverage"];
        $appurl = $_POST["app_url"];
        $occurring = $_POST["occurring"];
        //Update the record selected
        $addNewTile = $wpdb->prepare("INSERT INTO wp_tiles (tile_name,detail,image,providers,states,coverage,type,app_url,occurring) VALUES('$tile_name', '$detail', '$image','$providers','$states','$coverage','$type','$appurl', '$occurring')", OBJECT );
        if ($add_done == 1){
           echo "<script>return reloadAddTile(1)</script>";
        }
    }

    //Remove/Delete tile
    if ($rem == 1){
        $removetile = $wpdb->prepare( 'DELETE FROM wp_tiles WHERE id='.$tile_id, OBJECT );
        $rem_done = 1;
    }
    //$wpdb->close();
     ?>

     <?php if ($rem_done == 1){
        echo "<script>alert('You have successfully deteled the tile!');window.location='".$_PHP_SELF."?page_id=5073';</script>";
     } ?>

     <link rel="stylesheet" href="wp-content/themes/orchid-new/assets/css/jquery-ui.css">

    <script>
        function reloadAddTile(addsignal){
            if (addsignal == 1){
                alert('You have successfully added the tile!');
                //window.location='http://localhost/blog/?page_id=4901';
                window.location="<?php echo $_SERVER['REQUEST_URI'] ?>/?page_id=5073";
            }

        }
        function DelTiles(id){
            //console.log(id);
            if (id != 0){
                var signal;
                  if (confirm("Delete this tile?") == true) {
                      signal = 1;
                  } else {
                      signal = 2;
                  }
                 //Remove tile
                 if (signal == 1){
                     window.location="<?php echo $_SERVER['REQUEST_URI'] ?>/?page_id=5073&tile_id="+id+"&remtile="+signal;
                 }
            }
        }
        //Modify tile
        function modTile(id){
            var x = screen.width;
            var y = screen.height;
            var w = 600;
            var h = 500;
            var left = ((x / 2) - (w / 2));
            var top = ((y / 2) - (h / 2));
            if (id != '' || id != 0){
                window.open("<?php echo $_SERVER['REQUEST_URI'] ?>/?page_id=5071&tile_id="+id+"#tileprop", "ModifyTiles", "fullscreen=no,location=no,scrollbars=yes,status=yes,width=600,height=500,toolbar=no,resizable=yes,top="+top+",left="+left);
            }
        }
        // function activaTab(){
        //     $('.nav-tabs a[href="#' + tab + '"]').tab('show');
        //     console.log(tab);
        //     activaTab('modifytile');
        // };
    </script>

    <section class="main-content">
       <div class="container normal">
        <h1 class="h1-a">Dashboard Tiles</h1>
            <div class="row" style="padding-bottom:20px;">
                <div class="col-md-12">
                    <div class="fw-body">
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
                        #grid {
                          float:left;
                          width:100%;
                          height:450px;
                          border-bottom: 1px dotted #666666;
                          padding-bottom:8px;
                          overflow-y:visible; overflow-y: scroll;
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
                          .modTile{padding:3px;background:#42a5f5;color:#fff; border:0;border-radius: 4px;}
                          .modTile:hover{padding:3px;background:#0051aa;color:#fff; border:0;border-radius: 4px;}
                          .formtxt {color: #0051aa;font-size:14px;font-weight:600;}
                          th{cursor:pointer;font-size:11px;background-color: #eeeeee;}
                          th:hover{cursor:pointer;color:#0051aa;font-size:11px;background-color: #f2f2f2;}
                    </style>
                    <nav class="navbar">
                       <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </nav>
                    <div id="grid">
                            <table id="tiles" class="table table-striped table-bordered" width="100%" cellspacing="0" style="padding:0px;">
                                 <thead style="overflow-y: initial !important;">
                                    <tr >
                                      <th nowrap>ID <i class="fa fa-sort" aria-hidden="true" style="float:right;"></i></th>
                                      <th nowrap onclick="w3.sortHTML('#tiles','.item', 'td:nth-child(2)')">Name <i class="fa fa-sort" aria-hidden="true" style="float:right; width:15px;"></i></th>
                                      <th nowrap onclick="w3.sortHTML('#tiles','.item', 'td:nth-child(3)')">Details <i class="fa fa-sort" aria-hidden="true" style="float:right; width:15px;"></i></th>
                                      <th nowrap onclick="w3.sortHTML('#tiles','.item', 'td:nth-child(4)')">Image <i class="fa fa-sort" aria-hidden="true" style="float:right; width:15px;"></i></th>
                                      <th nowrap onclick="w3.sortHTML('#tiles','.item', 'td:nth-child(5)')">Carriers <i class="fa fa-sort" aria-hidden="true" style="float:right; width:15px;"></i></th>
                                      <th nowrap onclick="w3.sortHTML('#tiles','.item', 'td:nth-child(6)')">Type<i class="fa fa-sort" aria-hidden="true" style="float:right; width:15px;"></i></th>
                                      <th nowrap onclick="w3.sortHTML('#tiles','.item', 'td:nth-child(7)')">States <i class="fa fa-sort" aria-hidden="true" style="float:right; width:15px;"></i></th>
                                      <th nowrap onclick="w3.sortHTML('#tiles','.item', 'td:nth-child(8)')">Coming Soon <i class="fa fa-sort" aria-hidden="true" style="float:right; width:15px;"></i></th>
                                      <th></th>
                                    </tr>
                                  </thead>
                              <tbody id="tilesprop" class="rowP1" style="height: 400px;overflow-y: auto;">
                                  <?php foreach ($results as $row) {
                                    echo "<tr class='item' width='5%'><td>".$row->id."</td>";
                                    echo "<td><a href='#' onclick='modTile(".$row->id.");'>".$row->tile_name."</a></td>";
                                    echo "<td>".$row->detail."</td>";
                                    echo "<td><img src='wp-content/themes/orchid-new/assets/img/".$row->image."' width='138' height='80' style='border:1px solid #999;'/></td>";
                                    echo "<td>".$row->providers."</td>";
                                        if ($row->type == 'PL'){
                                            echo "<td class='txtalign'>Personal</td>";
                                        } else if ($row->type == 'CL'){
                                            echo "<td class='txtalign'>Commercial</td>";
                                        }
                                    echo "<td>".$row->states."</td>";
                                        if ($row->occurring == '2'){
                                            echo "<td class='txtalign'>Yes</td>";
                                        } else {
                                            echo "<td class='txtalign'>No</td>";
                                        }
                                    echo "<td style='width:9%;text-align:center;'><button type='button' class='modTile' onclick='modTile(".$row->id.");' title='Modify Tile'><i class='material-icons'>mode_edit</i></button> <button type='button' class='delTile' onclick='DelTiles(".$row->id.");' tile='Remove Tile'><i class='material-icons'>delete_forever</i></button></td></tr>";
                                    }
                                  ?>
                                <tr>
                                  <td colspan="8" title="">
                                  </td>
                                </tr>
                              </tbody>
                              <tr colspan="8">

                              </tr>
                            </table>
                    </div>
                    <div id="tilesfrm">
                        <div id="tileprop"><h3 class="h3-a"><i class="material-icons md-16">add_box</i> Add Tile</h3></div>
                            <!-- Add Tile -->
                                <form id="tprop" name="tprop" action="<?php echo $_PHP_SELF; ?>" method="post">
                                    <input type="hidden" name="addtile" id="addtile" value="1"/>
                                    <input type="hidden" name="states" id="states" value=""/>
                                     <div class="form-group">
                                        <label for="name" class="formtxt">Name:</label>
                                        <input type="text" name="tile_name" required  size="50" class="form-control" />
                                         <label>Personal</label>
                                         <input type="radio" name="type"  checked value="PL" />
                                         <label>Commercial</label>
                                         <input type="radio" name="type" checked='false' value="CL" />
                                      </div>
                                      <div class="form-group">
                                        <label for="detail" class="formtxt">Details:</label>
                                          <textarea rows="5" cols="80" name="detail" class="form-control" placeholder="Enter tile details here..."></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="image" class="formtxt">Image:</label>
                                          <input type="file" name="image" id="image" />
                                      </div>
                                      <div class="form-group">
                                        <label for="providers" class="formtxt">Providers:</label>
                                          <input type="text" name="providers" size="50" required  class="form-control" placeholder="Enter the tile providers here..." />
                                      </div>
                                      <div class="form-group">
                                        <label for="states" class="formtxt">States:</label><br/>
                                          <!-- <textarea rows="5" cols="80" name="states" size="50" required  class="form-control" placeholder="Enter the tile states here..."></textarea> -->
                                          <span id="statesA"><button type="button" title="Add state(s)" id="addstates" onclick="showStates();" class="btn btn-primary"><i class="material-icons md-16">add_box</i> Add states</button></span>
                                          <div id="statesB"></div>
                                      </div>
                                      <div class="form-group">
                                        <label for="coverage" class="formtxt">Coverage:</label>
                                          <input type="text" name="coverage" size="50" required  class="form-control" placeholder="Enter the tile coverage here..."/>
                                      </div>
                                      <div class="form-group">
                                        <label for="app_url" class="formtxt">Application(PDF/Link) URL:</label>
                                          <input type="text" name="app_url" size="50" class="form-control" placeholder="Enter the tile PDF/Link URL here..." value=""/>
                                      </div>
                                      <div class="form-group">
                                        <label for="occuring" class="formtxt">Occuring(Coming Soon) </label>
                                          <label for="occuring">Yes:</label>
                                          <input type="radio" name="occuring" checked='false' value="1" />
                                          <label for="occuring">No:</label>
                                          <input type="radio" name="occuring" checked='true' value="2" />
                                      </div>
                                      <div class="form-group">
                                         <button type="submit" class="btn btn-primary">Add Tile</button>
                                      </div>
                                </form>
                        </div>
                  </div>
                </div>
          </div>
      </div>
        <script>
            //Show states Modal
            function showStates(){
                //loop through States
                var statesArr = ['Alabama', 'Alaska', 'Arizona', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nevada', 'New Hampshire', 'New Jersey','New Yor', 'North Carolina', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'Tennessee', 'Texas','Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
                //var arrayLength =  statesArr.length;
                for (var i = 0; i < statesArr.length; i++){
                    $("#dispstates").append("<li style='color:#666;list-style:none;'><input type='checkbox' class='checkBoxClass' id='"+statesArr[i]+"' value='"+statesArr[i]+"'>&nbsp;"+statesArr[i]+"</li>");
                  console.log(statesArr[i]);
                }
                $("#showstates").modal();
            }
            //Set the states
            function setStates(){
                $checks = $(":checkbox");
                $checks.on('change', function() {
                    var string = $checks.filter(":checked").map(function(i,v){
                        return this.value;
                    }).get().join(",");

                    if ($('#dispstates :checkbox:checked').length > 0){
                        $("#showmsg").removeClass('alert alert-danger');
                        $("#showmsg").removeClass('alert alert-warning');
                        $("#showmsg").addClass('alert alert-success');
                        $("#showmsg").html("<span>States have been added to the form!</span>");
                        $('#states').val(string);
                        $("#statesB").html("<span style='display:block;width:45%;height:auto;'>"+string+"</span>");
                    } else if ($('#dispstates :checkbox:checked').length <= 0) {
                        $("#showmsg").removeClass('alert alert-danger');
                        $("#showmsg").addClass('alert alert-warning');
                        $("#showmsg").html("<span>Please select a state(s)!</span>");
                    }
                }).trigger('change');

                $("#stbuttons").replaceWith("<button type='button' id='addst' onclick='setStates();' class='btn btn-primary' style='float:right;margin:-13px 3px 0px 0px;'>Add State(s)</button>&nbsp;<button type='button' class='btn btn-danger' style='float:right;margin:-13px 0px 0px 5px;'onclick='remStates();'>Remove State(s)</button>");

            }
            //Remove states
            function remStates(){
                $('#state0').attr('checked', false);
                $('.checkBoxClass').attr('checked', false);
                $('#states').val('');
                $("#statesB").html("");
                $("#showmsg").addClass('alert alert-danger');
                $("#showmsg").html("<span>States have been removed from the form!</span>");
                $("#stbuttons").replaceWith("<button type='button' id='addst' onclick='setStates();' class='btn btn-primary' style='float:right;margin:-13px 3px 0px 0px;'>Add State(s)</button>&nbsp;<button type='button' class='btn btn-danger' style='float:right;margin:-13px 0px 0px 5px;'onclick='remStates();'>Remove State(s)</button>");
            }
          $(document).ready(function(){
            $("#myInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#tilesprop tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
            var checkall = $("#state0").val();
            $("#state0").click(function () {
                $(".checkBoxClass").prop('checked', $(this).prop('checked'));
                if (checkall.indexOf("#state0") > -1){
                    $("#showmsg").removeClass('alert alert-warning');
                    $("#showmsg").addClass('alert alert-success');
                    $("#showmsg").html("<span>All states have been added to the form!</span>");
                } else if (checkall != 'all'){
                    $("#showmsg").removeClass('alert alert-success');
                    $("#showmsg").html("");
                }
            });


          });
        </script>
    </section>
    <?php get_footer(); ?>
    <!-- Start States Modal -->
      <div class="modal fade" id="showstates" role="dialog" style="overflow-y: initial !important;">
        <!-- Start modal -->
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="h3-a"style="text-align:center;color:#0057b8;font-weight:bold;">Add States</h3>
            </div>
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
            <form id='modalformA' name='loginFormA' Method="POST">
              <div id="stbuttons" style=""><button type='button' id='addst' onclick='setStates();' class='btn btn-primary' style='float:right;margin:-13px 3px 0px 0px;'>Add State(s)</button></div>
              <p id="showmsg"></p>
              <p><input type="checkbox" id="state0" /><label for="state0">All States</label></p>
              <div id="dispstates">

              </div>
            </form>
            </div>
            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clrInputs(2);">Close</button>
            </div>
          </div>
        </div>
      </div>
<?php } else {
        echo "<br/><br/><br/><br/><br/><p style='text-align:center;font-size:18px;'><img src='/wp-content/themes/orchid-new/assets/img/hesdead_jim_new.png' width='38' height='38'/><br/>Oh no He's dead Jim!<br/>You do not have access to this page sorry!</p>";
}
?>
