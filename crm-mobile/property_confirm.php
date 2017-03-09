<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php if(empty($_GET['id'])){redirect('property.php');} ?>
<?php isset($_GET['page'])? $page = $_GET['page'] : $page = ""; ?>
<?php 
    $id = $_GET['id'];
    $property = Property::find_by_id($id);

    $property_images = Property_image::find_all_by_id($id);

 ?>
 <?php require_once("include/header.php"); ?>
    <div id="photo-id" data="<?php echo $id; ?>" style="display:none"></div>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include ("include/top-nav-left.php");?>
            <!-- Top Menu Items -->
            <?php include ("include/top-nav-right.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include ("include/side-nav.php");?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

            <!-- Portfolio Item Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">Property Confirm <?php echo $property->code;?>
                            <small></small>
                            </h2>

                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- Portfolio Item Row -->
                    <div class="row">

                        <div class="col-md-8">

                            <h4><?php echo $property->title; ?></h4>
                            <p>Location: <?php echo $property->location; ?></p>
                            <p><?php echo $property->description; ?></p>
                            
                            
                            <?php 
                                foreach ($property_images as $value) {
                                    $array[] = basename($value->filename);
                                } 
                                if(!in_array('thumnail.jpg', $array)){
                                    echo "<div class='alert alert-danger' role='alert'>Warning! there is no <b>thumnail.jpg</b> to show in front page. <br><small>(Tip: create filename thumnail.jpg size W:240px and extension file must be <b>.jpg not .JPG</b> then click add more image.)</small></div>";
                                }
                                else{
                                    echo "<h4>Images:</h4>"; 
                                }
                             ?>

                            <?php foreach($property_images as $property_image) :?>

                                <div class="col-md-4 user_image_box">
                                    <img class="img-responsive portfolio-item" src="../<?php echo $property_image->filename; ?>" alt="<?php echo $property_image->filename; ?>">
                                    <span><?php echo basename($property_image->filename); ?></span>
                                    <div class="pull-right">
                                        <a class="#" href="include/property_image_delete.php?id=<?php echo  $property_image->id; ?>&filename=<?php echo  $property_image->filename; ?> &p_id=<?php echo $id; ?>">remove</a>
                                    </div>
                                </div>
                            
                            <?php endforeach;?>

                            

                            <span class="add col-md-4">
                                <form action="" enctype="multipart/form-data">
                                    <span class="btn btn-default btn-file">
                                        Add more image + <input type="file" name="file[]" id="upload" multiple>
                                    </span>
                                    <input type="text" name="ref_id" value="<?php echo $id; ?>" hidden>
                                    <input type="text" name="property_code" value="<?php echo $property->code; ?>" hidden>
                                </form>
                            </span>
                            

                            <script>
                            $(document).ready(function(){
                                $('#upload').change(function(e){
                                    e.preventDefault(); // prevent default submission
                                    var formData = new FormData($(this).parents('form')[0]) //grap all form data
                                    $.ajax({
                                        url: 'include/ajax_upload.php',
                                        type: 'POST',
                                        data: formData, //data sent to server
                                        cache: false, // to unable request page to be cached
                                        contentType: false, //tell jquery not to set content type
                                        processData: false, // tell jquery not to process data
                                        success: function(data){ //alert of data success
                                            location.reload(true);
                                            // alert(data);
                                        }
                                        
                                    });
                                    return false;
                                });
                                
                                $('.remove').click(function(){
                                    return confirm("Are you sure want to remove");
                                });
                            });
                            </script>
  
                        </div>

                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item active">Property Details:</li>
                                <li id="property_code" data="<?php echo $property->code; ?>" class="list-group-item">Code: <b><?php echo $property->code; ?></b></li>
                                <li class="list-group-item">Type: <?php echo $property->type; ?></li>
                                <li class="list-group-item">Status: <?php echo $property->category; ?></li>
                                <li class="list-group-item">Price: <?php echo '$ ' . number_format($property->price, 2) ." ". $property->unit; ?></li>
                                <li class="list-group-item">Pricing Date: <?php echo $property->pricing_date; ?></li>
                                <li class="list-group-item">Land Size: <?php echo $property->land_size; ?></li>
                                <li class="list-group-item">House Size: <?php echo $property->house_size; ?></li>
                                <li class="list-group-item">Bed Room: <?php echo $property->bed_room; ?></li>
                                <li class="list-group-item">Bath Room: <?php echo $property->bath_room; ?></li>
                                <li class="list-group-item">Floor: <?php echo $property->floor; ?></li>
                                <li class="list-group-item">Year Built: <?php echo $property->year_built; ?></li>
                                <li class="list-group-item">Listed by: <span class="capital"><?php echo $property->listed_by; ?></span></li>
                                <li class="list-group-item">Listed Date: <?php echo $property->listed_date; ?></li>
                                <li class="list-group-item">Agent: 
                                <span class="capital">
                                    <?php 
                                        $agent = User::find_by_id($property->agent);
                                        echo $agent->first_name.' '.$agent->last_name;
                                    ?>
                                </span>
                                </li>
                                <li class="list-group-item">Owner: <?php echo $property->owner_number; ?></li>
                            </ul>

                            <a href="include/confirm.php?id=<?php echo $id; ?>&code=<?php echo $property->code;?>&page=<?php echo $page;?>" class="btn btn-primary col-md-4">Confirm</a>
                            <a href="property_edit.php?id=<?php echo $id; ?>&page=<?php echo $page;?>" class="btn">Edit</a>
                            <!-- <a href="" class="btn btn-danger pull-right">Cancel</a> -->

                        </div>



                    </div>
                    <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include ("include/footer.php"); ?>