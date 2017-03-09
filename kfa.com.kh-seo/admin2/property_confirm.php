<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php if(empty($_GET['id'])){redirect('property.php');} ?>
<?php isset($_GET['page'])? $page = $_GET['page'] : $page = 1; ?>
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
                            <h1 class="page-header">Property Confirm <?php echo $property->code;?>
                            <small></small>
                            </h1>

                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- Portfolio Item Row -->
                    <div class="row">

                        <div class="col-md-8">
                            <?php foreach($property_images as $property_image) :?>
                                <?php if(substr(basename($property_image->filename), -12)!='thumnail.JPG' OR substr(basename($property_image->filename), -12)!='thumnail.jpg'){
                                    echo "<div class='alert alert-info alert-danger'>There are no <b>thumnail.jpg</b></div>";
                                    }
                                    else{ ?>


                                <div class="col-md-4 user_image_box">
                                    <img class="img-responsive portfolio-item" src="../<?php echo $property_image->filename; ?>" alt="<?php echo $property_image->filename; ?>">
                                    <span><?php echo basename($property_image->filename); ?></span>
                                    <div class="pull-right">
                                        <a class="#" href="include/property_image_delete.php?id=<?php echo  $property_image->id; ?>&filename=<?php echo  $property_image->filename; ?> &p_id=<?php echo $id; ?>">remove</a>
                                    </div>
                                </div>
                                <?php } ?>
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

                            <h3><?php echo $property->title; ?></h3>
                            <p><?php echo $property->description; ?></p>
                            <h3>Property Details</h3>
                            <ul>
                                <li id="property_code" data="<?php echo $property->code; ?>">Code: <b><?php echo $property->code; ?></b></li>
                                <li>Type: <b><?php echo $property->type; ?></b></li>
                                <li>Status: <b><?php echo $property->category; ?></b></li>
                                <li>Price: <b><?php echo '$ ' . number_format($property->price, 2) ." ". $property->unit; ?></b></li>
                                <li>Pricing Date: <b><?php echo $property->pricing_date; ?></b></li>
                                <li>Land Size: <b><?php echo $property->land_size; ?></b></li>
                                <li>House Size: <b><?php echo $property->house_size; ?></b></li>
                                <li>Bed Room: <b><?php echo $property->bed_room; ?></b></li>
                                <li>Bath Room: <b><?php echo $property->bath_room; ?></b></li>
                                <li>Floor: <b><?php echo $property->floor; ?></b></li>
                                <li>Year Built: <b><?php echo $property->year_built; ?></b></li>
                                <li>Listed by: <b><span style="text-transform:capitalize"><?php echo $property->listed_by; ?></span></b></li>
                                <li>Listed Date: <b><?php echo $property->listed_date; ?></b></li>
                                <li>Agent: 
                                    <?php 
                                        $agent = Agent::find_by_id($property->agent);
                                        echo '<b>'.$agent->name.'</b>';
                                    ?>
                                </li>
                                
                            </ul>

                            <a href="include/confirm.php?id=<?php echo $id; ?>&code=<?php echo $property->code;  ?>" class="btn btn-primary col-md-4">Confirm</a>
                            <a href="property_edit.php?id=<?php echo $id; ?>&page=<?php echo $page; ?>" class="btn">Edit</a>
                            <a href="" class="btn btn-danger pull-right">Cancel</a>

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

