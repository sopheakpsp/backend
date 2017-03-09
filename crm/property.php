<?php require_once("include/init.php"); ?>
<?php if(!$session->is_signed_in()) { redirect("login.php");}?>
<?php $user_session = User::find_by_id($_SESSION['user_id']);
      $user_id = $user_session->id;
?>
<?php 
if(isset($_GET['latlng'])){
  $getlatlng = $_GET['latlng'];
  $explatlng = explode(',', $getlatlng);
  $getlat = $explatlng[0];
  $getlng = $explatlng[1];  
} 
?>
<?php 
$message = array();
if(isset($_POST['save'])){
  save_property("property_managing.php", $user_id);
}elseif(isset($_POST['save_and_new'])){
  save_property("property.php", $user_id);
}

function save_property($redirect, $user_id){
  global $session;
  $property = new Property();
   $property->title = $_POST['title'];
   $property->type = $_POST['type'];
   $property->category = $_POST['category'];
   //$property->price = $_POST['price'];
   //$property->unit = $_POST['unit'];
   $property->pricing_date = dateToDb($_POST['pricing_date']);
   $property->sale_price = $_POST['sale_price'];
   $property->rent_price = $_POST['rent_price'];
   // $property->vp = $_POST['vp'];
   $property->lp = $_POST['lp'];
   $property->bp = $_POST['bp'];
   $property->code = $property->get_code();
   //$property->location = $_POST['location'];
   $property->city = $_POST['city'];
   $property->district = $_POST['district'];
   $property->commune = $_POST['commune'];
   $property->road = $_POST['road'];
   $property->home = $_POST['home'];
   $property->lat = $_POST['lat'];
   $property->lng = $_POST['lng'];
   $property->land_size = $_POST['land_size'];
   $property->house_size = $_POST['house_size'];
   $property->bed_room = $_POST['bed_room'];
   $property->bath_room = $_POST['bath_room'];
   $property->floor = $_POST['floor'];
   $property->year_built = $_POST['year_built'];
   $property->title_deed = $_POST['title_deed'];
   $property->description = $_POST['description'];
   $property->user_note = $_POST['user_note'];
   $property->thumbnail = 'property/' . $property->get_code() . '/thumnail.jpg';
   $property->agent = $_POST['agent'];
   $property->owner_number = $_POST['owner_number'];
   $property->status = 2;
   $property->listed_by = $user_id;
   $property->listed_date = get_date();
   $property->time = get_time();
   // exit($property->pricing_date);

   if ($property->save()) {

        $ref_id = $property->id;

        $folder_create = PROPERTY_FOLDER . "/" . $property->code;

        if (file_exists($folder_create)) {
            $message[] = "{$property->code} folder is already exists.";
        }
        else{
            mkdir($folder_create, 0755);
        }

        for ($i=0; $i < count($_FILES['files']['name']); $i++) { 
            $property_image = new Property_image();
            $property_image->image_upload($_FILES['files'], $i, $property->code, $property->id);
        }

        $session->message("Add Successful.", "success");
        redirect($redirect);              
   }
   else{
        $session->message(mysql_error(), "danger");
        redirect("property.php");
   }
}



 ?>
<?php require_once("include/header.php"); ?>
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
                            Fill the Information
                        </h2>

                        <?php if(isset($session->message)){ ?>
                            <div class="alert alert-<?php echo $session->message_color;?>" role="alert"><?php echo $session->message; ?></div>
                        <?php } ?>

                        <form action="property.php" method="post" enctype="multipart/form-data" class="font">
                          
                          <div class="col-md-8">

                            <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea class="form-control" rows="15" name="description"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="user_note">User Note: (This note for your own personal use only)</label>
                              <textarea class="form-control" rows="8" name="user_note"></textarea>
                            </div>

                            <div>
                              <label for="">Google maps</label>
                              <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                              <div id="maps"></div>
                              <input type="text" name="lat" id="lat" value="<?php echo !empty($getlat)?$getlat:"";?>" required>
                              <input type="text" name="lng" id="lng" value="<?php echo !empty($getlng)?$getlng:"";?>">
                            </div><br>

                          </div>
                          <div class="col-md-4">
                          
                           <div class="from-group">
                              <label for="file">Drop files here to upload *</label>
                              <input type="file" name="files[]" class="dropzone" multiple required>
                            </div>

                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <strong>General Information</strong>
                              </div>
                              <div class="panel-body">
                                  <table class="table table-borderless">
                                    <tbody>
                                      <tr>
                                        <th>Type *</th>
                                        <td>
                                          <select class="form-control" name="type" required>
                                            <option></option>
                                              <?php 
                                                  $property_types = Property_type::find_all_asc();

                                                  foreach ($property_types as $property_type) :
                                              ?>
                                            <option value="<?php echo $property_type->id; ?>"><?php echo $property_type->type_name; ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Category *</th>
                                        <td>
                                          <select class="form-control" name="category" required>
                                            <option></option>
                                            <option value="Sale">Sale</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Sale/Rent">Sale/Rent</option>
                                          </select>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Land Size</th>
                                        <td><input type="text" name="land_size" class="form-control"></td>
                                      </tr>
                                      <tr>
                                        <th>House Size</th>
                                        <td><input type="text" name="house_size" class="form-control"></td>
                                      </tr>
                                      <tr>
                                        <th>Bed Room</th>
                                        <td><input type="text" name="bed_room" class="form-control"></td>
                                      </tr>
                                      <tr>
                                        <th>Bath Room</th>
                                        <td><input type="text" name="bath_room" class="form-control"></td>
                                      </tr>
                                      <tr>
                                        <th>Floor</th>
                                        <td><input type="text" name="floor" class="form-control"></td>
                                      </tr>
                                      <tr>
                                        <th>Year Built</th>
                                        <td><input type="text" name="year_built" class="form-control"></td>
                                      </tr>
                                      <tr>
                                        <th>Title Deed</th>
                                        <td>
                                          <select name="title_deed" class="form-control">
                                            <option value=""></option>
                                            <option value="Hard Title">Hard Title</option>
                                            <option value="Soft Title">Soft Title</option>
                                          </select>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>   
                              </div>
                          </div>

                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <strong>Location</strong>
                              </div>
                              <div class="panel-body">
                                  <table class="table table-borderless">
                                    <tbody>
                                      <tr>
                                        <th>Home #</th>
                                        <td><input type="text" name="home" class="form-control"></td>
                                      </tr>
                                      <tr>
                                        <th>Road #</th>
                                        <td><input type="text" name="road" class="form-control"></td>
                                      </tr>
                                      <tr>
                                        <th>City *</th>
                                        <td>
                                          <select class="form-control" name="city" id="city" required>
                                            <option></option>
                                              <?php 
                                                  $citys = City::find_all();

                                                  foreach ($citys as $city) :
                                              ?>
                                                  <option value="<?php echo $city->id; ?>"><?php echo $city->city_name; ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>District *</th>
                                        <td>
                                          <select class="form-control" name="district" id="district" required>
                                            <option value=""></option>
                                          </select>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th>Commune</th>
                                        <td>
                                          <select class="form-control" name="commune" id="commune">
                                            <option value=""></option>
                                          </select>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>   
                              </div>
                          </div>

                          <div class="panel panel-primary">
                            <div class="panel-heading">
                              <strong>Price</strong>
                            </div>
                            <div class="panel-body">
                              <table class="table table-borderless">
                                <tbody>
                                  <tr>
                                    <th>Sale Price</th>
                                    <td><input type="number" class="form-control" name="sale_price"></td>
                                  </tr>
                                  <tr>
                                    <th>Rent Price</th>
                                    <td><input type="number" class="form-control" name="rent_price"></td>
                                  </tr>
                                  <!-- <tr>
                                    <th>V.P</th>
                                    <td><input type="number" class="form-control" name="vp"></td>
                                  </tr> -->
                                  <tr>
                                    <th>L.P /sqm</th>
                                    <td><input type="number" class="form-control" name="lp"></td>
                                  </tr>
                                  <tr>
                                    <th>B.P /sqm</th>
                                    <td><input type="number" class="form-control" name="bp"></td>
                                  </tr>
                                  <tr>
                                    <th>Date *</th>
                                    <td><input type="text" class="form-control" name="pricing_date" id="datepicker" required></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>

                          <div class="panel panel-primary">
                            <div class="panel-heading">
                              <strong>Contact</strong>
                            </div>
                            <div class="panel-body">
                              <table class="table table-borderless">
                              <tbody>
                                
                                <tr class="<?php if($user_session->struc==3){echo "hidden";} ?>">
                                  <th>Agent *</th>
                                  <td>
                                    <select class="form-control" name="agent" required>
                                      <option value="<?php if($user_session->struc==3){echo $user_session->id;}?>"><?php if($user_session->struc==3){echo $user_session->first_name . " " . $user_session->last_name;}?></option>
                                      <?php 
                                          $agents = User::find_all();
                                          foreach($agents as $agent) :
                                              if($agent->struc==2 OR $agent->struc==3):
                                      ?>
                                          <option value="<?php echo $agent->id; ?>"><?php echo $agent->first_name.' '.$agent->last_name; ?></option>
                                      <?php
                                              endif; 
                                          endforeach; 
                                      ?>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <th>Owner *</th>
                                  <td><input type="text" class="form-control" name="owner_number" required></td>
                                </tr>

                              </tbody>
                            </table>
                            </div>
                          </div>
                            
                            
                          </div><!--end col md 4-->

                          <div class="col-md-8">
                            
                          </div>

                          <div class="col-md-4">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <strong>Save Panel</strong>
                              </div>
                              <div class="panel-body">
                                <label class="checkbox" style="margin-left:19px"><input type="checkbox" value="1" name="publish_request">Request for Publishing</label>
                                <input type="submit" class="btn btn-sm btn-primary" value="Save" name="save" >
                                <input type="submit" class="btn btn-sm btn-default" value="Save &amp; New" name="save_and_new">
                                <!-- <input type="submit" class="btn btn-sm btn-default" value="Save &amp; View Detail" name="save_and_detail"> -->
                              </div>
                            </div>
                          </div>
                           
                        </form>

                        <!-- end form -->
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

<!-- jqueryui -->
<script src="js/jquery-ui.js"></script>
<script src="js/jquery-ui.min.js"></script>

<script type="text/javascript">
$(document).ready(function($){

  $("#city").change(function(){
    var city_id = $(this).val();
    $.ajax({
      url: "ajax/search.php",
      method: "POST",
      data: {city_id:city_id},
      success: function(data){
        $("#district").html(data);
      },
      error: function(exception){
        alert('Exeption:'+exception);
      }
    });
  });

  $("#district").change(function(){
    var district_id = $(this).val();
    $.ajax({
      url: "ajax/search.php",
      method: "post",
      data: {district_id:district_id},
      success: function(data){
        $("#commune").html(data);
      }
    });
  });

  $(function(){
    $("#datepicker").datepicker();
  });

  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
}); 
</script>

<!-- maps api -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDVJxUFpgrLDakxjSquPl9Oujd4-JwZSjw&libraries=places"></script>
<script src="js/maps.js"></script>

<?php include ("include/footer.php"); ?>