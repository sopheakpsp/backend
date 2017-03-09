<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php isset($_GET['id']) ? $id=$_GET['id'] : redirect('property_managing.php'); ?>
<?php $user_session = User::find_by_id($_SESSION['user_id']); ?>
<?php require_once("include/header.php"); ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDVJxUFpgrLDakxjSquPl9Oujd4-JwZSjw&libraries=places"></script>
<script src="js/map.js"></script>
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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Point in Google Maps
                        </h2>

<form action="" method="post">
<div class="pull-right">
<input type="submit" class="btn btn-primary" value="Submit & Review">
<a href="" class="btn">Back to Property Information</a>
</div>
    <div class="form-inline">
        <div class="form-group">
    <label for="select city">* Select City</label>
        <select class="form-control" name="city" id="city" required>
        <option value=""></option>
        <?php 
            $citys = City::find_all_asc();
            foreach($citys as $city):
         ?>
            <option value="<?php echo $city->id; ?>"><?php echo $city->city_name; ?></option>
        <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="district">* Select District</label>
        <select name="district" id="district" class="form-control" required>
            <option value=""></option>
        </select>
    </div>
    </div>
</form>
<br>
<label>Right Click to Create New Marker</label>
<input type="text" id="ref_id" value="<?php echo $id;?>" hidden>
<input id="pac-input" class="controls" type="text" placeholder="Search Box">
<div id="google_map"></div>


                       
                  
                    </div> 
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<script>
$(document).ready(function($) {
    $("#city").change(function() {
        var search_id = $(this).val();
        $.ajax({
            url: "include/dropbox_search.php",
            method: "post",
            data: {search_id:search_id},
            success: function(data){
                $("#district").html(data);
            }
        });

        // $.post('search.php', {search_id: search_id}, function(data) {
        //  $("#district").html(data);
        // });
    });
});
</script>
<?php include ("include/footer.php"); ?>

